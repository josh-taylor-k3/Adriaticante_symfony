<?php

namespace App\Tests;

use App\Entity\Feature;
use App\Entity\Property;
use PHPUnit\Framework\TestCase;

class FeatureUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $feature = new Feature();

        $feature->setName('true');


        $this->assertTrue($feature->getName() === 'true');

    }

    public function testIsFalse()
    {
        $feature = new Feature();

        $feature->setName('true');

        $this->assertFalse($feature->getName() === 'false');

    }

    public function testIsEmpty()
    {
        $feature = new Feature();

        $this->assertEmpty($feature->getName());

    }
}