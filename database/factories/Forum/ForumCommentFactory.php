<?php

namespace Database\Factories\Forum;

use App\Models\Forum\ForumComment;
use Illuminate\Database\Eloquent\Factories\Factory;

class ForumCommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ForumComment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'forum_id' => 1,
            'body' => $this->faker->paragraph(10),
            'created_at' => now()->subDays($this->faker->numberBetween(1,30))
        ];
    }
}
