<?php

namespace App\Tests;

use App\Entity\Colloque;
use App\Entity\Revue;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\VarDumper\Cloner\Data;

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
            ->setLieu('LR')
            ->setRevues($revue);

        $this->assertTrue($colloque->getName() === 'Titre');
        $this->assertTrue($colloque->getDescription() === 'desc');
        $this->assertTrue($colloque->getDateD() === $date);
        $this->assertTrue($colloque->getDateF() === $date);
        $this->assertTrue($colloque->getSlug() === 'slug');
        $this->assertTrue($colloque->getLieu() === 'LR');
        $this->assertTrue($colloque->getRevues() === $revue);

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
            ->setLieu('LR')
            ->setRevues($revue);

        $this->assertFalse($colloque->getName() === 'Titres');
        $this->assertFalse($colloque->getDescription() === 'descs');
        $this->assertFalse($colloque->getDateD() === new \DateTime());
        $this->assertFalse($colloque->getDateF() === new \DateTime());
        $this->assertFalse($colloque->getSlug() === 'slugs');
        $this->assertFalse($colloque->getLieu() === 'LRs');
        $this->assertFalse($colloque->getRevues() === new Revue());
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
        $this->assertEmpty($article->getPeople());
    }
}
