<?php

namespace Database\Factories;
;
use App\Models\Teams;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TeamsFactory extends Factory
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
        $company = $this->faker->company;
        return [
            'title' => $company,
            'description' => $this->faker->paragraph,
            'slug' => Str::slug($company),
        ];
    }
}
