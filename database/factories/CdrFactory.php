<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Cdr;
use App\Models\Prefix;
use Illuminate\Database\Eloquent\Factories\Factory;

class CdrFactory extends Factory
{
    protected $model = Cdr::class;

    public function definition()
    {
        $duration = $this->faker->numberBetween(10, 3600);

        $billsec = max(
            0,
            $duration - $this->faker->numberBetween(0, 10)
        );

        $rate = $this->faker->randomFloat(4, 0.01, 0.30);

        $prefix = Prefix::inRandomOrder()->first();

        return [
            'account_id' => Account::query()->inRandomOrder()->value('id'),
            'call_id' => $this->faker->uuid(),
            'source' => $this->faker->numerify('1##########'),
            'destination' => $this->faker->numerify('##########'),
            'destination_prefix' => $prefix?->prefix ?? '880',
            'call_date' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'duration' => $duration,
            'billsec' => $billsec,
            'disposition' => $this->faker->randomElement([
                'ANSWERED',
                'NO ANSWER',
                'BUSY',
                'FAILED'
            ]),
            'cost' => round(($billsec / 60) * $rate, 4),
            'carrier_cost' => round(($billsec / 60) * ($rate * 0.7), 4)
        ];
    }
}
