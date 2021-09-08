<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\User;
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
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->value('id') ?: factory(User::class),
            'image_id' => Image::inRandomOrder()->value('id') ?: factory(Image::class),
            'content' => $this->faker->text(50),
            'created_at' => now(),
            'updated_at' =>now(),
        ];
    }
}
