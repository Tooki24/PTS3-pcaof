<?php

namespace App\Tests;

use App\Entity\Colloque;
use App\Entity\Revue;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\VarDumper\Cloner\Data;
use Symfony\Component\HttpFoundation\File\File;


class ColloqueTest extends TestCase
{
    public function testIsTrue(): void
    {
        $colloque = new Colloque();
        $revue = new Revue();
        $date = new \DateTime();

        $colloque->setName('Titre')
            ->setDescription('desc')
            ->setDateD($date)
            ->setDateF($date)
            ->setSlug('slug')
            ->setPlace('LR')
            ->setRevues($revue)
            ->setOnLine(1)
            ->setTheme('theme')
            ->setIsPcaof(1)
            ->setPlanningPdfName('PlanningName')
            ->setPlanningPdfFile(null);

        $this->assertTrue($colloque->getName() === 'Titre');
        $this->assertTrue($colloque->getDescription() === 'desc');
        $this->assertTrue($colloque->getDateD() === $date);
        $this->assertTrue($colloque->getDateF() === $date);
        $this->assertTrue($colloque->getSlug() === 'slug');
        $this->assertTrue($colloque->getPlace() === 'LR');
        $this->assertTrue($colloque->getRevues() === $revue);
        $this->assertTrue($colloque->getOnLine() == 1);
        $this->assertTrue($colloque->getTheme() === "theme");
        $this->assertTrue($colloque->getIsPcaof() == 1);
        $this->assertTrue($colloque->getPlanningPdfFile() === null);
        $this->assertTrue($colloque->getPlanningPdfName() === "PlanningName");



    }
    public function testIsFalse()
    {
        $colloque = new Colloque();
        $revue = new Revue();
        $date = new \DateTime();

        $colloque->setName('Titre')
            ->setDescription('desc')
            ->setDateD($date)
            ->setDateF($date)
            ->setSlug('slug')
            ->setPlace('LR')
            ->setRevues($revue)
            ->setOnLine(1)
            ->setTheme('theme')
            ->setIsPcaof(1)
            ->setPlanningPdfName('PlanningName')
            ->setPlanningPdfFile(null);

        $this->assertFalse($colloque->getName() === 'Titres');
        $this->assertFalse($colloque->getDescription() === 'descs');
        $this->assertFalse($colloque->getDateD() === new \DateTime());
        $this->assertFalse($colloque->getDateF() === new \DateTime());
        $this->assertFalse($colloque->getSlug() === 'slugs');
        $this->assertFalse($colloque->getPlace() === 'LRs');
        $this->assertFalse($colloque->getRevues() === new Revue());
        $this->assertFalse($colloque->getOnLine() === 0);
        $this->assertFalse($colloque->getTheme() === "themeS");
        $this->assertFalse($colloque->getIsPcaof() === 1);
        $this->assertFalse($colloque->getPlanningPdfName() === "PlanningNameS");
    }
    public function testEmpty()
    {
        $article = new Colloque();

        $this->assertEmpty($article->getName());
        $this->assertEmpty($article->getDescription());
        $this->assertEmpty($article->getDateD());
        $this->assertEmpty($article->getSlug());
        $this->assertEmpty($article->getDateF());
        $this->assertEmpty($article->getRevues());
        $this->assertEmpty($article->getId());
        $this->assertEmpty($article->getOnLine());
        $this->assertEmpty($article->getIsPcaof());
        $this->assertEmpty($article->getTheme());
        $this->assertEmpty($article->getPlanningPdfName());
        $this->assertEmpty($article->getPlanningPdfFile());
        $this->assertEmpty($article->getKeyWords());
        $this->assertEmpty($article->getPlace());




    }
}
