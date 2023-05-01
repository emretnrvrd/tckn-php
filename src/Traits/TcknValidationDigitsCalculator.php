<?php

namespace Emretnrvrd\Tckn\Traits;

trait TcknValidationDigitsCalculator
{

    /**
     * Finds the tenth digit of the TCKN.
     *
     * @param string $tckn
     * @return int
     */
    private function calculateTenthDigit(string $tckn): int
    {
        /**
         *
         * There are two methods to determine the 10th digit of a number:
         *
         * Method 1: Add up the odd digits (1, 3, 5, 7, and 9), multiply the sum by 7, subtract the sum of the even digits (2, 4, 6, and 8), and then look at the ones digit of the result to get the 10th digit.
         * Method 2: Multiply the sum of the odd digits by 7, multiply the sum of the even digits by 9, add the two products together, and then look at the ones digit of the result to get the 10th digit.
         *
         * Both methods always give the same result. We prefer to use Method 1.
         *
         */

        $nineDigits = str_split(substr($tckn, 0, 9));

        $oddDigitsSum = $nineDigits[0] + $nineDigits[2] + $nineDigits[4] + $nineDigits[6] + $nineDigits[8];
        $evenDigitsSum = $nineDigits[1] + $nineDigits[3] + $nineDigits[5] + $nineDigits[7];

        return (($oddDigitsSum * 7) - ($evenDigitsSum)) % 10;
    }


    /**
     * Finds the eleventh digit of the TCKN.
     *
     * @param string $tckn
     * @return int
     */
    private function calculateEleventhDigit(string $tckn): int
    {
        /**
         *
         * There are two ways to determine the 11th digit of a number:
         *
         * Method 1: This method requires 10 digits. Add up the first 10 digits of the number, and then look at the ones digit of the sum to get the 11th digit.
         * Method 2: This method only requires 9 digits. Multiply the sum of the odd digits (1, 3, 5, 7, and 9) by 8, and then look at the ones digit of the result to get the 11th digit.
         *
         * Both methods always give the same result. We prefer to use Method 2.
         *
         */

        $nineDigits = str_split(substr($tckn, 0, 9));
        $oddDigitsSum = $nineDigits[0] + $nineDigits[2] + $nineDigits[4] + $nineDigits[6] + $nineDigits[8];

        return ($oddDigitsSum * 8) % 10;
    }
}
