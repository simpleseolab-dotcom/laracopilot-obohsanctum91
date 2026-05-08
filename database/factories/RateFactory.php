<?php

namespace Database\Factories;

use App\Models\Carrier;
use App\Models\Prefix;
use App\Models\Rate;
use Illuminate\Database\Eloquent\Factories\Factory;

class RateFactory extends Factory
{
    protected $model = Rate::class;

    public function definition()
    {
        return [
            'prefix_id' => Prefix::query()->inRandomOrder()->value('id'),
            'carrier_id' => Carrier::query()->inRandomOrder()->value('id'),
            'rate_per_minute' => $this->faker->randomFloat(4, 0.0010, 0.5000),
            'connection_fee' => $this->faker->randomFloat(4, 0, 0.0500),
            'billing_increment' => $this->faker->randomElement([1, 6, 30, 60]),
            'min_duration' => $this->faker->randomElement([0, 6, 30]),
            'effective_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['active', 'inactive'])
        ];
    }
}
