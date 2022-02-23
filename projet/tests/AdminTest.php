<?php

namespace App\Tests;

use App\Entity\Admin;
use PHPUnit\Framework\TestCase;

class AdminTest extends TestCase
{
    public function testIsTrue(): void
    {
        $person = new Admin();

        $person->setUsername('admin')
            ->setPassword('admin')
            ->setEMail('admin@example.com');

        $this->assertTrue($person->getUsername() === 'admin');
        $this->assertTrue($person->getUserIdentifier() === 'admin');
        $this->assertTrue($person->getPassword() === 'admin');
        $this->assertTrue($person->getEMail() === 'admin@example.com');

    }

    public function testIsFalse(): void
    {
        $person = new Admin();

        $person->setUsername('admin')
            ->setPassword('admin')
            ->setEMail('admin@example.com');

        $this->assertFalse($person->getUsername() === 'admins');
        $this->assertFalse($person->getUserIdentifier() === 'admins');
        $this->assertFalse($person->getPassword() === 'admins');
        $this->assertFalse($person->getEMail() === 'admin@example.coms');
    }

    public function testEmpty(): void
    {
        $person = new Admin();

        $this->assertEmpty($person->getUsername());
        $this->assertEmpty($person->getUserIdentifier());
        $this->assertEmpty($person->getEMail());
    }
}
