<?php

namespace Database\Factories;

use App\Models\Cash;
use Illuminate\Database\Eloquent\Factories\Factory;

class CashFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cash::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number' => rand(1,20),
            'denomination' => $this->faker->randomElement([50, 100, 200, 500, 1000, 2000, 5000, 10000, 20000, 50000, 100000]),
        ];
    }
}
