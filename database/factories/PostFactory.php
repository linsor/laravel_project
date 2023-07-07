<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->name(20),
            'content' => $this->faker->text,
            'image' => $this->faker->imageUrl(),
            'likes' => random_int(1, 200),
            'is_published' => random_int(0, 1),
            'category_id' =>  Category::get()->random()->id
        ];
    }
}
