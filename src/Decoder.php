<?php

namespace Decoder;

use Decoder\Interfaces\DecoderInterface;
use Decoder\Interfaces\ValidatorInterface;
use Decoder\Dictionaries\Manufacturers;

class Decoder implements DecoderInterface
{
    protected $code;
    protected $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = strtoupper($code);
    }

    public function isValid($vin)
    {
        $this->setCode($vin);
        return $this->validator->isValid($this->getCode());
    }

    public function getManufacturer($vin)
    {
        foreach (Manufacturers::DATA as $wmi => $brand) {
            if (strpos($vin, $wmi) === 0) {
                return $brand;
            }
        }
    }
}
