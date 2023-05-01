<?php

namespace Emretnrvrd\Tckn\Services\TcknVerifier;

class TcknRequest
{
    /**
     * @var int
     */
    public int $tckn;
    /**
     * @var string
     */
    public string $name;
    /**
     * @var string
     */
    public string $lastname;
    /**
     * @var int
     */
    public int $birthyear;

    public function __construct(string $name, string $lastname, int $birthyear, int $tckn)
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->birthyear = $birthyear;
        $this->tckn = $tckn;
    }
}
