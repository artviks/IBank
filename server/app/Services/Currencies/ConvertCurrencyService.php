<?php


namespace App\Services\Currencies;


use App\Models\Currency;

class ConvertCurrencyService
{
    private $rateService;

    public function __construct(CurrencyRateService $rateService)
    {
        $this->rateService = $rateService;
    }

    public function execute(Currency $curIn, Currency $curOut): Currency
    {
        $rateIn = $this->rateService->get($curIn)->rate;
        $rateOut = $this->rateService->get($curOut)->rate;
        $amount = $curIn->getAmount() / $rateIn * $rateOut;
        $curOut->setAmount($amount);

        return $curOut;
    }
}
