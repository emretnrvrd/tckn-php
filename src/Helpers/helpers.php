<?php

use Emretnrvrd\Tckn\Services\TcknVerifier\TcknVerifier;

if(!function_exists('validateTckn')) {
    /**
     * @param string|int $tckn
     * @return bool
     */
    function validateTckn(string $tckn): bool
    {
        return (new \Emretnrvrd\Tckn\Services\TcknValidator\TcknValidator($tckn))->validate();
    }
}

if(!function_exists('randomTckn')) {
    /**
     * @return string
     */
    function generateTckn(): string
    {
        return (new \Emretnrvrd\Tckn\Services\TcknRandom\TcknRandom)->generate();
    }
}

if(!function_exists('verifyTckn')) {
    /**
     * @var string $name
     * @var string $lastname
     * @var int $birthyear
     * @var int $tckn
     * @return bool
     */
    function verifyTckn(string $name, string $lastname, int $birthyear, int $tckn): bool
    {
        $tcknVerifier = new Emretnrvrd\Tckn\Services\TcknVerifier\TcknVerifier(
            $name, $lastname, $birthyear, $tckn
        );
        return $tcknVerifier->verify();
    }
}
