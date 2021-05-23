<?php


namespace App\Services\Currencies;


use App\Models\Currency;
use App\Models\CurrencyRate;
use Illuminate\Support\Facades\Cache;

class CurrencyRateService implements CurrencyRateInterface
{
    public function get(Currency $currency): CurrencyRate
    {
        $rates = Cache::remember('currency_rates', 900, function () {
            $this->update();
            return CurrencyRate::all();
        });

        return $rates->where('code', $currency->getCode())->first();
    }

    public function update(): void
    {
        $xmlString = file_get_contents('https://www.bank.lv/vk/ecb.xml');
        $xmlObject = simplexml_load_string($xmlString);

        $json = json_encode($xmlObject);
        $currencies = json_decode($json, true)['Currencies']['Currency'];

        foreach ($currencies as $currency) {
            CurrencyRate::updateOrCreate(
                ['code' => $currency['ID']],
                ['rate' => $currency['Rate']]
            );
        }
        CurrencyRate::updateOrCreate([
            'code' => 'EUR',
            'rate' => 1
        ]);
    }
}
