<?php

namespace Emretnrvrd\Tckn\Services\TcknValidator;

class TcknValidator extends TcknValidationCases implements TcknValidatorInterface
{
    /**
     * @var string
     */
    private string $value;

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
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
     * @param string|int $tckn
     */
    public function __construct(string $tckn = null)
    {
        if ($tckn != null) {
            $this->setValue($tckn);
        }
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
            throw new \Exception('TCKN value must not be null.');
        }
        return
            $this->validateIsNumber($this->value) &&
            $this->validateLength($this->value) &&
            $this->validateIsEven($this->value) &&
            $this->validateFirstDigit($this->value) &&
            $this->validateTenthDigit($this->value) &&
            $this->validateEleventhDigit($this->value);
    }
}
