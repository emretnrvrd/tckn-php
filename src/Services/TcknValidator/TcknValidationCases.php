<?php

namespace Emretnrvrd\Tckn\Services\TcknValidator;

use Emretnrvrd\Tckn\Traits\TcknValidationDigitsCalculator;

abstract class TcknValidationCases
{
    use TcknValidationDigitsCalculator;

    /**
     * Validate the is numeric of the TCKN.
     * @var string
     * @return bool
     */
    protected function validateIsNumber(string $value): bool
    {
        return is_numeric($value);
    }
    /**
     * Validate the length of the TCKN.
     * @var string
     * @return bool
     */
    protected function validateLength(string $value): bool
    {
        return strlen($value) === 11;
    }

    /**
     * Validate the is even of the TCKN.
     * @var string
     * @return bool
     */
    protected function validateIsEven(string $value): bool
    {
        return ((int)$value) % 2 === 0;
    }

    /**
     * Validate the first digit of the TCKN.
     * @var string
     * @return bool
     */
    protected function validateFirstDigit(string $value): bool
    {
        return substr($value, 0, 1) != "0";
    }

    /**
     * Validate the tenth digit of the TCKN.
     * @var string
     * @return bool
     */
    protected function validateTenthDigit(string $value): bool
    {
        $nineDigits = substr($value, 0, 9);
        $tenthDigit = substr($value, 9, 1);

        return $tenthDigit == $this->calculateTenthDigit($nineDigits);
    }

    /**
     * Validate the eleventh digit of the TCKN.
     * @var string
     * @return bool
     */
    protected function validateEleventhDigit(string $value): bool
    {
        $tenDigits = substr($value, 0, 10);
        $eleventhDigit = substr($value, 10, 1);

        return $eleventhDigit == $this->calculateEleventhDigit($tenDigits);
    }
}
