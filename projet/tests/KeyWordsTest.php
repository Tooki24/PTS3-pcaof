<?php

namespace App\Tests;

use App\Entity\KeyWords;
use App\Entity\Person;
use PHPUnit\Framework\TestCase;

class KeyWordsTest extends TestCase
{
    public function testIsTrue(): void
    {
        $keyWord = new KeyWords();

        $keyWord->setWord('word');

        $this->assertTrue($keyWord->getWord() === 'word');

    }
    public function testIsFalse()
    {
        $keyWord = new KeyWords();

        $keyWord->setWord('word');

        $this->assertFalse($keyWord->getWord() === 'words');

    }
    public function testEmpty()
    {
        $keyWord = new KeyWords();

        $this->assertEmpty($keyWord->getId());
        $this->assertEmpty($keyWord->getWord());

    }
}
