<?php

namespace App\Tests;

use App\Entity\Person;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    public function testIsTrue(): void
    {
        $person = new Person();

        $person->setName('name')
        ->setFirstName('firstName')
        ->setSlug('slug')
        ->setRole('role')
        ->setIsOffice(1)
        ->setPhotoName(null)
        ->setPhotoFile(null);

        $this->assertTrue($person->getFirstName() === 'firstName');
        $this->assertTrue($person->getName() === 'name');
        $this->assertTrue($person->getSlug() === 'slug');
        $this->assertTrue($person->getRole() === 'role');
        $this->assertTrue($person->getIsOffice() == 1);
        $this->assertTrue($person->getPhotoName() === null);
        $this->assertTrue($person->getPhotoFile() === null);



    }
    public function testIsFalse()
    {
        $person = new Person();

        $person->setName('name')
            ->setFirstName('firstName')
            ->setSlug('slug')
            ->setRole('role')
            ->setIsOffice(1)
            ->setPhotoName('imgName')
            ->setPhotoFile(null);;

        $this->assertFalse($person->getFirstName() === 'firstNames');
        $this->assertFalse($person->getName() === 'names');
        $this->assertFalse($person->getSlug() === 'slugS');
        $this->assertFalse($person->getRole() === 'roles');
        $this->assertFalse($person->getIsOffice() == 0);
        $this->assertFalse($person->getPhotoName() === 'img');

    }
    public function testEmpty()
    {
        $person = new Person();

        $this->assertEmpty($person->getId());
        $this->assertEmpty($person->getName());
        $this->assertEmpty($person->getFirstName());
        $this->assertEmpty($person->getArticles());
        $this->assertEmpty($person->getPublications());
        $this->assertEmpty($person->getSlug());
        $this->assertEmpty($person->getRole());
        $this->assertEmpty($person->getIsOffice());
        $this->assertEmpty($person->getPhotoFile());
        $this->assertEmpty($person->getPhotoName());



    }
}
