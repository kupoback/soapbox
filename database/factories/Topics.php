<?php

namespace Database\Factories;
;
use App\Models\Teams;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class Topics extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teams::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'description' => $this->faker->paragraph,
            'created_by' => $this->faker->randomDigit,
            'status_id' => 'open',
            'priority_status' => 'normal',
            'list_order' => 1,
        ];
    }
}
