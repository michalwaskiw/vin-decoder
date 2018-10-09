<?php

namespace Decoder;

use Decoder\Exceptions\InvalidVinException;

class Validator
{
    public function isValid($vin): bool
    {
        $result = $this->calculateModulo($vin);
        if ($vin[Dictionary::CHECKSUM_CHAR_INDEX] == $result) {
            return true;
        } else {
            if (
                $vin[Dictionary::CHECKSUM_CHAR_INDEX] == "X" &&
                $result == 10
            ) {
                return true;
            } else {
                throw new InvalidVinException("VIN Invalid");
            }
        }
    }

    private function calculateModulo($vin): int
    {
        $sum = 0;

        for ($i = 0; $i < strlen($vin); ++$i) {
            $sum += Dictionary::LETTER_VALUES[$vin[$i]] * Dictionary::MULTIPLIERS[$i];
        }

        return $sum % Dictionary::MODULO_DIVIDER;
    }
}