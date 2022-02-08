<?php

namespace App\Tests;

use App\Entity\Revue;
use PHPUnit\Framework\TestCase;

class RevueTest extends TestCase
{
    public function testIsTrue(): void
    {
        $revue = new Revue();
        $date = new \DateTime();

        $revue->setTitle('desc')
            ->setResume('resume')
            ->setFile('file')
            ->setSlug('slug')
            ->setDatePubli($date);

        $this->assertTrue($revue->getTitle() === 'desc');
        $this->assertTrue($revue->getResume() === 'resume');
        $this->assertTrue($revue->getSlug() === 'slug');
        $this->assertTrue($revue->getFile() === 'file');
        $this->assertTrue($revue->getDatePubli() === $date);

    }
    public function testIsFalse()
    {
        $revue = new Revue();
        $date = new \DateTime();

        $revue->setTitle('desc')
            ->setResume('resume')
            ->setFile('file')
            ->setSlug('slug')
            ->setDatePubli($date);

        $this->assertFalse($revue->getTitle() === 'descs');
        $this->assertFalse($revue->getResume() === 'resumes');
        $this->assertFalse($revue->getSlug() === 'slugs');
        $this->assertFalse($revue->getFile() === 'files');
        $this->assertFalse($revue->getDatePubli() === new \DateTime());

    }
    public function testEmpty()
    {
        $revue = new Revue();

        $this->assertEmpty($revue->getId());
        $this->assertEmpty($revue->getTitle());
        $this->assertEmpty($revue->getResume());
        $this->assertEmpty($revue->getSlug());
        $this->assertEmpty($revue->getFile());
        $this->assertEmpty($revue->getDatePubli());
    }
}
