<?php

namespace App\Tests;

use App\Entity\Publication;
use PHPUnit\Framework\TestCase;

class PublicationTest extends TestCase
{
    public function testIsTrue(): void
    {
        $publication = new Publication();
        $date = new \DateTime();

        $publication->setTitle('desc')
            ->setResume('resume')
            ->setSlug('slug')
            ->setDatePubli($date)
        ->setOnLine(1)
        ->setPdfName('PDFName')
        ->setImageName('ImgName')
        ->setPdfFile(null);

        $this->assertTrue($publication->getTitle() === 'desc');
        $this->assertTrue($publication->getResume() === 'resume');
        $this->assertTrue($publication->getSlug() === 'slug');
        $this->assertTrue($publication->getDatePubli() === $date);
        $this->assertTrue($publication->getOnLine() == 1);
        $this->assertTrue($publication->getPdfName() === 'PDFName');
        $this->assertTrue($publication->getImageName() === 'ImgName');
        $this->assertTrue($publication->getPdfFile() === null);


    }
    public function testIsFalse()
    {
        $publication = new Publication();
        $date = new \DateTime();

        $publication->setTitle('desc')
            ->setResume('resume')
            ->setSlug('slug')
            ->setDatePubli($date)
            ->setOnLine(1)
            ->setPdfName('PDFName')
            ->setImageName('ImgName')
            ->setPdfFile(null);;

        $this->assertFalse($publication->getTitle() === 'descs');
        $this->assertFalse($publication->getResume() === 'resumes');
        $this->assertFalse($publication->getSlug() === 'slugs');
        $this->assertFalse($publication->getDatePubli() === new \DateTime());
        $this->assertFalse($publication->getOnLine() == 0);
        $this->assertFalse($publication->getPdfName() === 'PDFNames');
        $this->assertFalse($publication->getImageName() === 'ImgNames');

    }
    public function testEmpty()
    {
        $publication = new Publication();

        $this->assertEmpty($publication->getId());
        $this->assertEmpty($publication->getTitle());
        $this->assertEmpty($publication->getResume());
        $this->assertEmpty($publication->getSlug());
        $this->assertEmpty($publication->getDatePubli());
        $this->assertEmpty($publication->getOnLine());
        $this->assertEmpty($publication->getPdfFile());
        $this->assertEmpty($publication->getImageName());
        $this->assertEmpty($publication->getPdfName());
        $this->assertEmpty($publication->getKeyWords());
        $this->assertEmpty($publication->getPeople());
    }
}
