<?php


namespace App\Services\Currencies;


use App\Models\Currency;
use App\Models\CurrencyRate;

interface CurrencyRateInterface
{
    public function get(Currency $currency): CurrencyRate;

    public function update(): void;
}
