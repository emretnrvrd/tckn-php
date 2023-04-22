<?php

namespace Emretnrvrd\TcknHelpers;

use Exception;

class Tckn
{
    /**
     * @var string
     */
    private string $value;

    /**
     * @param string|int|null $tckn
     */
    public function __construct(string $tckn = null)
    {
        if ($tckn != null) {
            $this->setValue($tckn);
        }
    }

    /**
     * Sets the value of the TCKN.
     *
     * @param string|int $value
     * @return void
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * Validates the TCKN.
     *
     * @return bool
     * @throws Exception
     */
    public function validate(): bool
    {
        if (!isset($this->value)) {
            throw new Exception('TCKN value must not be null.');
        }
        return $this->validateLength() &&
            $this->validateFirstNumber() &&
            $this->validateTenthNumber() &&
            $this->validateEleventhNumber();
    }

    /**
     * Generates a random TCKN.
     *
     * @return string
     */
    public function generate(): string
    {
        $random = (string)random_int(100_000_000, 999_999_999);
        $randomTenNumber = $random . $this->findTenthNumber($random);
        $randomElevenNumber = $randomTenNumber . $this->findEleventhNumber($randomTenNumber);

        return $this->value = $randomElevenNumber;
    }

    /**
     * Validates the first number of the TCKN.
     *
     * @return bool
     */
    private function validateFirstNumber(): bool
    {
        return substr($this->value, 0, 1 ) != "0";
//        return !str_starts_with($this->value, "0");
    }

    /**
     * Validates the length of the TCKN.
     *
     * @return bool
     */
    private function validateLength(): bool
    {
        return (is_numeric($this->value) && strlen($this->value) === 11);
    }

    /**
     * Validates the tenth number of the TCKN.
     *
     * @return bool
     */
    private function validateTenthNumber(): bool
    {
        $firstNineNumber = substr($this->value, 0, 9);
        $tenthNumber = substr($this->value, 9, 1);

        return $tenthNumber == $this->findTenthNumber($firstNineNumber);
    }

    /**
     * Validates the eleventh number of the TCKN.
     *
     * @return bool
     */
    private function validateEleventhNumber(): bool
    {
        $firstTenNumber = substr($this->value, 0, 10);
        $eleventhNumber = substr($this->value, 10, 1);

        return $eleventhNumber == $this->findEleventhNumber($firstTenNumber);
    }

    /**
     * Finds the tenth number of the TCKN.
     *
     * @param string $firstNineNumber
     * @return int
     */
    private function findTenthNumber(string $firstNineNumber): int
    {
        $firstNineNumberArray = str_split(substr($firstNineNumber, 0, 9));

        [$oddSum, $evenSum] = [0, 0];
        foreach ($firstNineNumberArray as $index => $number) {
            $numberOrder = $index + 1;

            if ($numberOrder % 2 === 0)
                $evenSum += $number;
            else
                $oddSum += $number;
        }

        return (($oddSum * 7) + ($evenSum * 9)) % 10;
    }

    /**
     * Finds the eleventh number of the TCKN.
     *
     * @param string $firstTenNumber
     * @return int
     */
    private function findEleventhNumber(string $firstTenNumber): int
    {
        return array_sum(str_split($firstTenNumber)) % 10;
    }
}

