<?php

namespace Decoder;

class Dictionary
{
    const LETTER_VALUES = [
        'A' => 1, 'B' => 2, 'C' => 3, 'D' => 4, 'E' => 5, 'F' => 6, 'G' => 7, 'H' => 8, 'J' => 1,
        'K' => 2, 'L' => 3, 'M' => 4, 'N' => 5, 'P' => 7, 'R' => 9, 'S' => 2, 'T' => 3, 'U' => 4,
        'V' => 5, 'W' => 6, 'X' => 7, 'Y' => 8, 'Z' => 9, '0' => 0, '1' => 1, '2' => 2, '3' => 3,
        '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9
    ];
    const CHECKSUM_CHAR_INDEX = 8;
    const MULTIPLIERS = [8, 7, 6, 5, 4, 3, 2, 10, 0, 9, 8, 7, 6, 5, 4, 3, 2];
    const MODULO_DIVIDER = 11;
}