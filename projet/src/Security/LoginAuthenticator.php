<?php

namespace App\Security;

use App\Entity\LoginAttempt;
use App\Repository\AdminRepository;
use App\Repository\LoginAttemptRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Admin;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

class LoginAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app_login';

    private UrlGeneratorInterface $urlGenerator;
    private EntityManagerInterface $entityManager;
    private CsrfTokenManagerInterface $csrfTokenManager;
    private UserPasswordEncoderInterface $passwordEncoder;
    private LoginAttemptRepository $loginAttemptRepository;

    public function __construct(EntityManagerInterface $entityManager,
                                UrlGeneratorInterface $urlGenerator,
                                CsrfTokenManagerInterface $csrfTokenManager,
                                LoginAttemptRepository $loginAttemptRepository)
    {
        $this->entityManager = $entityManager;
        $this->urlGenerator = $urlGenerator;
        $this->csrfTokenManager = $csrfTokenManager;
        $this->loginAttemptRepository = $loginAttemptRepository;

    }

    public function getCredentials(Request $request)
    {
        $credentials = [
            'email' => $request->request->get('username'),
            'csrf_token' => $request->request->get('_csrf_token'),
        ];
        $request->getSession()->set(Security::LAST_USERNAME, $credentials['email']);

        // Début de notre modification: on sauvegarde une tentative de connexion
        $newLoginAttempt = new LoginAttempt($request->getClientIp(), $credentials['email']);

        $this->entityManager->persist($newLoginAttempt);
        $this->entityManager->flush();

        return $credentials;
    }
    public function authenticate(Request $request): Passport
    {
        $username = $request->request->get('username', '');

        $request->getSession()->set(Security::LAST_USERNAME, $username);

        $newLoginAttempt = new LoginAttempt($request->getClientIp(), $username);

        $this->entityManager->persist($newLoginAttempt);
        $this->entityManager->flush();

        // Verification si on a essayer plus de trois fois en 10min
        $this->checkCredentials($username);

        return new Passport(
            new UserBadge($username),
            new PasswordCredentials($request->request->get('password', '')),
            [
                new CsrfTokenBadge('authenticate', $request->request->get('_csrf_token')),
            ]

        );
    }

    public function checkCredentials($username){
        // Deuxième modification, la verif
        if($this->loginAttemptRepository->countRecentLoginAttempts($username) > 3){
            throw new CustomUserMessageAuthenticationException('Vous avez essayé de vous connecter avec un mot'
                .' de passe incorrect de trop nombreuses fois. Veuillez réessayer dans 10 min svp.');
        }
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            // Sup LoginAtt si valid OK
            $this->loginAttemptRepository->removeUserName($request->request->get('username'));
            return new RedirectResponse($targetPath);
        }

        return new RedirectResponse($this->urlGenerator->generate('admin'));
    }


    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}
