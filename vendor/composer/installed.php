<?php return array(
    'root' => array(
        'pretty_version' => '1.0.0+no-version-set',
        'version' => '1.0.0.0',
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'reference' => NULL,
        'name' => '__root__',
        'dev' => true,
    ),
    'versions' => array(
        '__root__' => array(
            'pretty_version' => '1.0.0+no-version-set',
            'version' => '1.0.0.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'reference' => NULL,
            'dev_requirement' => false,
        ),
        'psr/container' => array(
            'pretty_version' => '2.0.2',
            'version' => '2.0.2.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../psr/container',
            'aliases' => array(),
            'reference' => 'c71ecc56dfe541dbd90c5360474fbc405f8d5963',
            'dev_requirement' => false,
        ),
        'psr/container-implementation' => array(
            'dev_requirement' => false,
            'provided' => array(
                0 => '1.1|2.0',
            ),
        ),
        'psr/event-dispatcher' => array(
            'pretty_version' => '1.0.0',
            'version' => '1.0.0.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../psr/event-dispatcher',
            'aliases' => array(),
            'reference' => 'dbefd12671e8a14ec7f180cab83036ed26714bb0',
            'dev_requirement' => false,
        ),
        'psr/event-dispatcher-implementation' => array(
            'dev_requirement' => false,
            'provided' => array(
                0 => '1.0',
            ),
        ),
        'psr/log' => array(
            'pretty_version' => '3.0.0',
            'version' => '3.0.0.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../psr/log',
            'aliases' => array(),
            'reference' => 'fe5ea303b0887d5caefd3d431c3e61ad47037001',
            'dev_requirement' => false,
        ),
        'psr/log-implementation' => array(
            'dev_requirement' => false,
            'provided' => array(
                0 => '1.0|2.0|3.0',
            ),
        ),
        'symfony/config' => array(
            'pretty_version' => 'v6.0.3',
            'version' => '6.0.3.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/config',
            'aliases' => array(),
            'reference' => 'c14f32ae4cd2a3c29d8825c5093463ac08ade7d8',
            'dev_requirement' => false,
        ),
        'symfony/dependency-injection' => array(
            'pretty_version' => 'v6.0.3',
            'version' => '6.0.3.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/dependency-injection',
            'aliases' => array(),
            'reference' => 'bf53dbf6e8f3eec14f44c53fa4c3b4905ab19ee4',
            'dev_requirement' => false,
        ),
        'symfony/deprecation-contracts' => array(
            'pretty_version' => 'v3.0.0',
            'version' => '3.0.0.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/deprecation-contracts',
            'aliases' => array(),
            'reference' => 'c726b64c1ccfe2896cb7df2e1331c357ad1c8ced',
            'dev_requirement' => false,
        ),
        'symfony/error-handler' => array(
            'pretty_version' => 'v6.0.3',
            'version' => '6.0.3.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/error-handler',
            'aliases' => array(),
            'reference' => '20343b3bad7ebafa38138ddcb97290a24722b57b',
            'dev_requirement' => false,
        ),
        'symfony/event-dispatcher' => array(
            'pretty_version' => 'v6.0.3',
            'version' => '6.0.3.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/event-dispatcher',
            'aliases' => array(),
            'reference' => '6472ea2dd415e925b90ca82be64b8bc6157f3934',
            'dev_requirement' => false,
        ),
        'symfony/event-dispatcher-contracts' => array(
            'pretty_version' => 'v3.0.0',
            'version' => '3.0.0.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/event-dispatcher-contracts',
            'aliases' => array(),
            'reference' => 'aa5422287b75594b90ee9cd807caf8f0df491385',
            'dev_requirement' => false,
        ),
        'symfony/event-dispatcher-implementation' => array(
            'dev_requirement' => false,
            'provided' => array(
                0 => '2.0|3.0',
            ),
        ),
        'symfony/filesystem' => array(
            'pretty_version' => 'v6.0.3',
            'version' => '6.0.3.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/filesystem',
            'aliases' => array(),
            'reference' => '6ae49c4fda17322171a2b8dc5f70bc6edbc498e1',
            'dev_requirement' => false,
        ),
        'symfony/http-foundation' => array(
            'pretty_version' => 'v6.0.3',
            'version' => '6.0.3.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/http-foundation',
            'aliases' => array(),
            'reference' => 'ad157299ced81a637fade1efcadd688d6deba5c1',
            'dev_requirement' => false,
        ),
        'symfony/http-kernel' => array(
            'pretty_version' => 'v6.0.4',
            'version' => '6.0.4.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/http-kernel',
            'aliases' => array(),
            'reference' => '9dce179ce52b0f4f669c07fd5e465e5d809a5d3b',
            'dev_requirement' => false,
        ),
        'symfony/polyfill-ctype' => array(
            'pretty_version' => 'v1.24.0',
            'version' => '1.24.0.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-ctype',
            'aliases' => array(),
            'reference' => '30885182c981ab175d4d034db0f6f469898070ab',
            'dev_requirement' => false,
        ),
        'symfony/polyfill-mbstring' => array(
            'pretty_version' => 'v1.24.0',
            'version' => '1.24.0.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-mbstring',
            'aliases' => array(),
            'reference' => '0abb51d2f102e00a4eefcf46ba7fec406d245825',
            'dev_requirement' => false,
        ),
        'symfony/polyfill-php81' => array(
            'pretty_version' => 'v1.24.0',
            'version' => '1.24.0.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-php81',
            'aliases' => array(),
            'reference' => '5de4ba2d41b15f9bd0e19b2ab9674135813ec98f',
            'dev_requirement' => false,
        ),
        'symfony/service-contracts' => array(
            'pretty_version' => 'v3.0.0',
            'version' => '3.0.0.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/service-contracts',
            'aliases' => array(),
            'reference' => '36715ebf9fb9db73db0cb24263c79077c6fe8603',
            'dev_requirement' => false,
        ),
        'symfony/service-implementation' => array(
            'dev_requirement' => false,
            'provided' => array(
                0 => '1.1|2.0|3.0',
            ),
        ),
        'symfony/var-dumper' => array(
            'pretty_version' => 'v6.0.3',
            'version' => '6.0.3.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/var-dumper',
            'aliases' => array(),
            'reference' => '7b701676fc64f9ef11f9b4870f16b48f66be4834',
            'dev_requirement' => false,
        ),
        'symfonycasts/reset-password-bundle' => array(
            'pretty_version' => 'v1.12.0',
            'version' => '1.12.0.0',
            'type' => 'symfony-bundle',
            'install_path' => __DIR__ . '/../symfonycasts/reset-password-bundle',
            'aliases' => array(),
            'reference' => 'ade9fad9f4355268aec1bd40773601f872a1672b',
            'dev_requirement' => false,
        ),
    ),
);
