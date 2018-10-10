<?php

namespace Decoder\Tests;

use ReflectionClass;
use Decoder\Validator;
use PHPUnit\Framework\TestCase;

final class ValidatorTest extends TestCase
{
    public function testCalculateModuloValid()
    {
        $validVinsWithModulos = [
            "1M8GDM9AXKP042788" => 10,
        ];

        $validatorInsance = new Validator();
        $reflector = new ReflectionClass(Validator::class);
        $method = $reflector->getMethod('calculateModulo');
        $method->setAccessible(true);

        foreach ($validVinsWithModulos as $vin => $modulo) {
            $result = $method->invokeArgs($validatorInsance, [$vin]);
            $this->assertEquals($modulo, $result);
        }
    }
}