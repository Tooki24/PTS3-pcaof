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
            ->setSlug('slug')
            ->setDatePubli($date)
            ->setOnLine(1)
            ->setImageName('ImgName')
            ->setTheme('theme')
            ->setImageFile(null);

        $this->assertTrue($revue->getTitle() === 'desc');
        $this->assertTrue($revue->getResume() === 'resume');
        $this->assertTrue($revue->getSlug() === 'slug');
        $this->assertTrue($revue->getDatePubli() === $date);
        $this->assertTrue($revue->getOnLine() == 1);
        $this->assertTrue($revue->getImageName() === 'ImgName');
        $this->assertTrue($revue->getTheme() === 'theme');
        $this->assertTrue($revue->getImageFile() === null);


    }
    public function testIsFalse()
    {
        $revue = new Revue();
        $date = new \DateTime();

        $revue->setTitle('desc')
            ->setResume('resume')
            ->setSlug('slug')
            ->setDatePubli($date)
            ->setOnLine(1)
            ->setImageName('ImgName')
            ->setTheme('theme')
            ->setImageFile(null);

        $this->assertFalse($revue->getTitle() === 'descs');
        $this->assertFalse($revue->getResume() === 'resumes');
        $this->assertFalse($revue->getSlug() === 'slugs');
        $this->assertFalse($revue->getDatePubli() === new \DateTime());
        $this->assertFalse($revue->getOnLine() == 0);
        $this->assertFalse($revue->getImageName() === 'ImgNames');
        $this->assertFalse($revue->getTheme() === 'themes');

    }
    public function testEmpty()
    {
        $revue = new Revue();

        $this->assertEmpty($revue->getId());
        $this->assertEmpty($revue->getTitle());
        $this->assertEmpty($revue->getResume());
        $this->assertEmpty($revue->getSlug());
        $this->assertEmpty($revue->getImageFile());
        $this->assertEmpty($revue->getTheme());
        $this->assertEmpty($revue->getImageName());
        $this->assertEmpty($revue->getOnLine());
        $this->assertEmpty($revue->getColloques());
        $this->assertEmpty($revue->getArticles());
        $this->assertEmpty($revue->getDatePubli());
    }
}
