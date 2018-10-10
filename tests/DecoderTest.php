<?php

namespace Decoder\Tests;

use Decoder\Interfaces\DecoderInterface;
use Decoder\Validator;
use PHPUnit\Framework\TestCase;
use Decoder\Decoder;

final class DecoderTest extends TestCase
{
    private $decoder;

    public function setUp()
    {
        $this->decoder = new Decoder(new Validator());
    }

    public function testGetDecoderInstance(): void
    {
        $this->assertInstanceOf(DecoderInterface::class, $this->decoder);
    }

    public function testValidVin()
    {
        $valid_vins = [
            "1M8GDM9AXKP042788",
            "WAUZZZ4G7GN195890",
            "TMBJB7NEXG0053505",
        ];

        foreach ($valid_vins as $vin) {
            $this->assertTrue($this->decoder->isValid($vin));
        }
    }

    public function testInvalidVin()
    {
        $invalid_vins = [
            "1M8GDM9AZKP042788",
            "WF0LXXGCBLDC61007",
        ];

        foreach ($invalid_vins as $vin) {
            $this->assertFalse($this->decoder->isValid($vin));
        }
    }
}