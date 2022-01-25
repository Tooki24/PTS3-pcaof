<?php

namespace App\Tests;

use App\Entity\Colloque;
use App\Entity\Intervention;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Constraints\Date;

class InterventionTest extends TestCase
{
    public function testIsTrue(): void
    {
        $intervention = new Intervention();
        $colloque = new Colloque();
        $date = new \DateTime();

        $intervention->setDescription('desc')
        ->setDate($date)
        ->setHourD($date)
        ->setHourF($date)
        ->setColloques($colloque);

        $this->assertTrue($intervention->getDescription() === 'desc');
        $this->assertTrue($intervention->getDate() === $date);
        $this->assertTrue($intervention->getHourD() === $date);
        $this->assertTrue($intervention->getHourF() === $date);
        $this->assertTrue($intervention->getColloques() === $colloque);

    }
    public function testIsFalse()
    {
        $intervention = new Intervention();
        $colloque = new Colloque();
        $date = new \DateTime();

        $intervention->setDescription('desc')
            ->setDate($date)
            ->setHourD($date)
            ->setHourF($date)
            ->setColloques($colloque);

        $this->assertFalse($intervention->getDescription() === 'descs');
        $this->assertFalse($intervention->getDate() === new \DateTime());
        $this->assertFalse($intervention->getHourD() === new \DateTime());
        $this->assertFalse($intervention->getHourF() === new \DateTime());
        $this->assertFalse($intervention->getColloques() === new Colloque());

    }
    public function testEmpty()
    {
        $intervention = new Intervention();

        $this->assertEmpty($intervention->getDescription());
        $this->assertEmpty($intervention->getDate());
        $this->assertEmpty($intervention->getHourD());
        $this->assertEmpty($intervention->getHourF());
        $this->assertEmpty($intervention->getColloques());
        $this->assertEmpty($intervention->getId());
        $this->assertEmpty($intervention->getPeople());
    }
}
