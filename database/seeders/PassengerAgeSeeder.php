<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PassengerAge;

class PassengerAgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PassengerAge::factory(3)->create();
    }
}
