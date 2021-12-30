<?php

namespace Database\Factories;

use App\Models\Train;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Train::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $train_name = $this->faker->unique()->words($nb = 1, $asText = true);
        return [
            'number' => $this->faker->numberBetween(100, 1000),
            'name' => $train_name,
            'seat_no' => $this->faker->numberBetween(72, 720),
            'departure' => $this->faker->time(),
            'arrival' => $this->faker->time(),
            'date' => '2021-12-12'
        ];
    }
}
