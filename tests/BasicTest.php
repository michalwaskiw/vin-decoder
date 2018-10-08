<?php

namespace Decoder\Tests;

use PHPUnit\Framework\TestCase;
use Decoder\Decoder;

final class BasicTest extends TestCase
{
    public function testGetDecoderInstance(): void
    {
        $decoder = new Decoder();

        $this->assertTrue($decoder instanceof Decoder);
    }

    public function testBasic(): void
    {
        $this->assertTrue(true);
    }

    public function testModuloValue()
    {
        $decoder = new Decoder();
        $decoder->setCode("1M8GDM9AXKP042788");
        $this->assertTrue($decoder->isValid());
    }
}