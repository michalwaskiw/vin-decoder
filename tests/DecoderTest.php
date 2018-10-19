<?php

namespace Decoder\Tests;

use Decoder\Interfaces\DecoderInterface;
use Decoder\Validator;
use PHPUnit\Framework\TestCase;
use Decoder\Decoder;

final class DecoderTest extends TestCase
{
    const VALID_VINS = [
        "1M8GDM9AXKP042788",
        "WAUZZZ4G7GN195890",
        "TMBJB7NEXG0053505",
    ];

    const INVALID_VINS = [
        "1M8GDM9AZKP042788",
        "WF0LXXGCBLDC61007",
    ];

    const VALID_VINS_WITH_MANUFACTURER = [
        "WAUZZZ4G7GN195890" => "Audi",
        "TMBJB7NEXG0053505" => "Skoda",
    ];

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
        foreach (self::VALID_VINS as $vin) {
            $this->assertTrue($this->decoder->isValid($vin));
        }
    }

    public function testInvalidVin()
    {
        foreach (self::INVALID_VINS as $vin) {
            $this->assertFalse($this->decoder->isValid($vin));
        }
    }

    public function testGetManufacturer()
    {
        foreach (self::VALID_VINS_WITH_MANUFACTURER as $vin => $manufacturer) {
            $this->assertEquals($this->decoder->getManufacturer($vin), $manufacturer);
        }
    }
}