<?php

namespace Database\Factories;

use App\Models\Carrier;
use App\Models\Prefix;
use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\Factory;

class RouteFactory extends Factory
{
    protected $model = Route::class;

    public function definition()
    {
        return [
            'prefix_id' => Prefix::query()->inRandomOrder()->value('id'),
            'carrier_id' => Carrier::query()->inRandomOrder()->value('id'),
            'priority' => $this->faker->numberBetween(1, 10),
            'weight' => $this->faker->numberBetween(1, 100),
            'status' => $this->faker->randomElement(['active', 'inactive'])
        ];
    }
}
