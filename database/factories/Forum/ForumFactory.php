<?php

namespace Database\Factories\Forum;

use App\Models\Forum\Forum;
use Illuminate\Database\Eloquent\Factories\Factory;

class ForumFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Forum::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'body' => $this->faker->paragraph(10),
            'created_at' => now()->subDays($this->faker->numberBetween(1,30))
        ];
    }
}