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
        ->setFirstName('firstName');

        $this->assertTrue($person->getFirstName() === 'firstName');
        $this->assertTrue($person->getName() === 'name');

    }
    public function testIsFalse()
    {
        $person = new Person();

        $person->setName('name')
            ->setFirstName('firstName');

        $this->assertFalse($person->getFirstName() === 'firstNames');
        $this->assertFalse($person->getName() === 'names');

    }
    public function testEmpty()
    {
        $person = new Person();

        $this->assertEmpty($person->getId());
        $this->assertEmpty($person->getName());
        $this->assertEmpty($person->getFirstName());
        $this->assertEmpty($person->getColloques());
        $this->assertEmpty($person->getArticles());
        $this->assertEmpty($person->getInterventions());
        $this->assertEmpty($person->getPublications());
    }
}
