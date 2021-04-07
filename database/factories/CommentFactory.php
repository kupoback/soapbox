<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @param int $topic_id
     * @return array
     */
    public function definition($topic_id = 0)
    {
        return [
            'topic_id' => $topic_id,
            'comment' =>  $this->faker->sentences(rand(1, 5), true),
        ];
    }
}
