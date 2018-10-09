<?php

namespace Decoder\Tests;

use PHPUnit\Framework\TestCase;
use Decoder\Decoder;

final class DecoderTest extends TestCase
{
    public function testGetDecoderInstance(): void
    {
        $decoder = new Decoder();

        $this->assertTrue($decoder instanceof Decoder);
    }

    public function testValidVin()
    {
        $decoder = new Decoder();
        $decoder->setCode("1M8GDM9AXKP042788");
        $this->assertTrue($decoder->isValid());
    }

    public function testInvalidVin()
    {
        $decoder = new Decoder();
        $decoder->setCode("1M8GDM9AZKP042788");
        $this->assertFalse($decoder->isValid());
    }
}