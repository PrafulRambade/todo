<?php

namespace Database\Factories;
use App\Models\Todo;
use Illuminate\Database\Eloquent\Factories\Factory;

class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Todo::class;

    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'detail' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'status' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
