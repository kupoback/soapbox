<?php

namespace Database\Factories;
;
use App\Models\Teams;
use App\Models\Topics;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TopicsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Topics::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition($team_id = 0)
    {
        return [
            'title' => $this->faker->title,
            'description' => $this->faker->paragraph,
            'team_id' => $team_id,
            'created_by' => $this->faker->randomDigit,
            'status_id' => 1,
            'priority_status' => 'normal',
            'list_order' => 1,
            'request_delete' => 0
        ];
    }
}
