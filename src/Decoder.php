<?php

namespace Decoder;

use Decoder\Exceptions\InvalidVinException;

class Decoder
{
    protected $code;
    protected $validator;

    public function __construct()
    {
        $this->validator = new Validator();
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

    public function isValid()
    {
        try {
            $this->validator->isValid($this->getCode());
        } catch (InvalidVinException $exception) {
            echo "Invalid VIN provided.";
        }

        return true;
    }
}