<?php

namespace Database\Factories;

use App\Models\ContainerSize;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContainerSizeFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContainerSize::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $container_size_name = $this->faker->unique()->words($nb = 1, $asText = true);
        return [
            'name' => $container_size_name,
            'price' => $this->faker->numberBetween(10, 500)
        ];
    }
}
