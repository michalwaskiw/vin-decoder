<?php

namespace Decoder;

use Decoder\Interfaces\ValidatorInterface;

class Validator implements ValidatorInterface
{
    public function isValid($vin): bool
    {
        $modulo = $this->calculateModulo($vin);
        if ($vin[Dictionary::CHECKSUM_CHAR_INDEX] == $modulo) {
            return true;
        } else {
            return $vin[Dictionary::CHECKSUM_CHAR_INDEX] == "X" && $modulo == 10;
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
