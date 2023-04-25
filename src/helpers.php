<?php

if(!function_exists('validateTckn')) {
    /**
     * @param string|int $tckn
     * @return bool
     */
    function validateTckn(string $tckn): bool
    {
        return (new Emretnrvrd\TcknHelpers\Tckn($tckn))->validate();
    }
}

if(!function_exists('randomTckn')) {
    /**
     * @return string
     */
    function randomTckn(): string
    {
        return (new Emretnrvrd\TcknHelpers\Tckn())->random();
    }
}
