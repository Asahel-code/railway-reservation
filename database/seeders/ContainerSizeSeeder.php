<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContainerSize;

class ContainerSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContainerSize::factory(3)->create();
    }
}
