<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ticket_name = $this->faker->unique()->words($nb = 1, $asText = true);
        return [
            'name' => $ticket_name,
            'ticket_type' => $this->faker->numberBetween(1, 2),
            'passenger_id' => $this->faker->numberBetween(1, 3),
            'seat_id' => $this->faker->numberBetween(1, 3),
            'train_id' => $this->faker->numberBetween(1, 5),
            'source_id' => $this->faker->numberBetween(1, 10),
            'destination_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
