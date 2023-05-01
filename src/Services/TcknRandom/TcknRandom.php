<?php

namespace Emretnrvrd\Tckn\Services\TcknRandom;

use Emretnrvrd\Tckn\Traits\TcknValidationDigitsCalculator;

class TcknRandom
{

    use TcknValidationDigitsCalculator;

    /**
     * Generates a random TCKN.
     *
     * @return string
     */
    public function generate(): string
    {
        $randomNineDigit = (string)random_int(100_000_000, 999_999_999);
        $calculatedTenthDigit = $this->calculateTenthDigit($randomNineDigit);
        $calculatedEleventhDigit = $this->calculateEleventhDigit($randomNineDigit . $calculatedTenthDigit);

        return $randomNineDigit . $calculatedTenthDigit . $calculatedEleventhDigit;
    }
}
