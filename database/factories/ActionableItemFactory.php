<?php

namespace Database\Factories;

use App\Models\ActionableItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActionableItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ActionableItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition($topic_id = 0)
    {
        return [
            'title' => $this->faker->sentence(rand(1, 5)),
            'topic_id' => $topic_id,
            'status_id' => 1,
            'list_order' => 1,
        ];
    }
}
