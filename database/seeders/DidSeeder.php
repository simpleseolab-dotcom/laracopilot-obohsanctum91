<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Did;

class DidSeeder extends Seeder
{
    public function run()
    {
        Did::factory()->count(20)->create();
    }
}