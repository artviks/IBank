<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\CurrencyRate;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Account::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number' => $this->faker->bankAccountNumber,
            'name' => $this->faker->text(50),
            'currency' => CurrencyRate::all()->pluck('code')->toArray()[random_int(0, 32)],
            'funds' => $this->faker->numberBetween(0, 1000)
        ];
    }
}
