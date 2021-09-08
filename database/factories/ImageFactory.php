<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\User;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->value('id') ?: factory(User::class),
            'image_path' => $this->faker->image(),
            'description' => $this->faker->text(50),
            'created_at' => now(),
            'updated_at' =>now(),
        ];
    }
}
