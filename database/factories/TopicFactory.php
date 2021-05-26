<?php

namespace Database\Factories;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

class TopicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Topic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition($team_id = 0)
    {
        return [
            'team_id' => $team_id,
            'title' => $this->faker->sentence(rand(1, 5)),
            'description' => $this->faker->paragraph,
            'created_by' => $this->faker->randomDigitNot(0),
            'status_id' => 1,
            'priority_status' => $this->faker->randomElement(['high', 'low', 'normal']),
            'list_order' => 1,
            'request_delete' => 0
        ];
    }
}
