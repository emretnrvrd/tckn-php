<?php

namespace Emretnrvrd\Tckn\Services\TcknValidator;

interface TcknValidatorInterface
{
    public function getValue(): string;

    public function setValue(string $value): void;

    public function validate(): bool;
}
