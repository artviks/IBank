<?php

namespace App\Console\Commands;

use App\Services\Currencies\CurrencyRateService;
use Illuminate\Console\Command;

class ImportCurrencyRatesCommand extends Command
{
    protected $signature = 'import:currency';
    protected $description = 'Import currency rates';

    private $service;

    public function __construct(CurrencyRateService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    public function handle(): void
    {
        $this->service->update();
    }
}
