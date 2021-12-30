<?php

namespace Database\Factories;

use App\Models\SeatType;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeatTypeFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SeatType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $seat_type_name = $this->faker->unique()->words($nb = 1, $asText = true);
        return [
            'name' => $seat_type_name,
            'price' => $this->faker->numberBetween(10, 500)
        ];
    }
}
