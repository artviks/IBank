<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\CurrencyRate;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)
            ->has(Account::factory(2))
            ->create();

        Transaction::factory(20)->create();
    }
}
