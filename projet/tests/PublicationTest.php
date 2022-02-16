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
            ->setFile('file')
            ->setSlug('slug')
            ->setDatePubli($date);

        $this->assertTrue($publication->getTitle() === 'desc');
        $this->assertTrue($publication->getResume() === 'resume');
        $this->assertTrue($publication->getSlug() === 'slug');
        $this->assertTrue($publication->getFile() === 'file');
        $this->assertTrue($publication->getDatePubli() === $date);

    }
    public function testIsFalse()
    {
        $publication = new Publication();
        $date = new \DateTime();

        $publication->setTitle('desc')
            ->setResume('resume')
            ->setFile('file')
            ->setSlug('slug')
            ->setDatePubli($date);

        $this->assertFalse($publication->getTitle() === 'descs');
        $this->assertFalse($publication->getResume() === 'resumes');
        $this->assertFalse($publication->getSlug() === 'slugs');
        $this->assertFalse($publication->getFile() === 'files');
        $this->assertFalse($publication->getDatePubli() === new \DateTime());

    }
    public function testEmpty()
    {
        $publication = new Publication();

        $this->assertEmpty($publication->getId());
        $this->assertEmpty($publication->getTitle());
        $this->assertEmpty($publication->getResume());
        $this->assertEmpty($publication->getSlug());
        $this->assertEmpty($publication->getFile());
        $this->assertEmpty($publication->getDatePubli());
        $this->assertEmpty($publication->getPeople());
    }
}
