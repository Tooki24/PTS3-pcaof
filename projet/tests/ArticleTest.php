<?php

namespace App\Tests;

use App\Entity\Article;
use App\Entity\Revue;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    public function testIsTrue(): void
    {
        $article = new Article();
        $revue = new Revue();
        $date = new \DateTime();

        $article->setTitle('Titre')
            ->setResume('Resume')
            ->setDatePubli($date)
            ->setSlug('slug')
            ->setFile('file/')
            ->setDocPDF('DocPDF')
            ->setRevue($revue);

        $this->assertTrue($article->getTitle() === 'Titre');
        $this->assertTrue($article->getResume() === 'Resume');
        $this->assertTrue($article->getDatePubli() === $date);
        $this->assertTrue($article->getSlug() === 'slug');
        $this->assertTrue($article->getFile() === 'file/');
        $this->assertTrue($article->getDocPDF() === 'DocPDF');
        $this->assertTrue($article->getRevue() === $revue);

    }
    public function testIsFalse()
    {
        $article = new Article();
        $revue = new Revue();
        $date = new \DateTime();

        $article->setTitle('Titre')
            ->setResume('Resume')
            ->setDatePubli($date)
            ->setSlug('slug')
            ->setFile('file/')
            ->setDocPDF('DocPDF')
            ->setRevue($revue);

        $this->assertFalse($article->getTitle() === 'Titres');
        $this->assertFalse($article->getDatePubli() === new \DateTime());
        $this->assertFalse($article->getResume() === 'Resumes');
        $this->assertFalse($article->getSlug() === 'Slugs');
        $this->assertFalse($article->getFile() === 'file/s');
        $this->assertFalse($article->getDocPDF() === 'DocPDFs');
        $this->assertFalse($article->getRevue() === new Revue());
    }
    public function testEmpty()
    {
        $article = new Article();

        $this->assertEmpty($article->getTitle());
        $this->assertEmpty($article->getResume());
        $this->assertEmpty($article->getDatePubli());
        $this->assertEmpty($article->getSlug());
        $this->assertEmpty($article->getFile());
        $this->assertEmpty($article->getDocPDF());
        $this->assertEmpty($article->getRevue());
        $this->assertEmpty($article->getId());
        $this->assertEmpty($article->getPeople());
    }
}
