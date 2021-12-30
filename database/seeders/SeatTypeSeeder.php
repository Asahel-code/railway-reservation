<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SeatType;

class SeatTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SeatType::factory(3)->create();
    }
}
