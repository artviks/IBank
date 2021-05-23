<?php

namespace App\Models;


class Currency
{
    private $code;
    private $amount;

    public function __construct(string $code, float $amount)
    {
        $this->code = $code;
        $this->amount = $amount;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }
}
