<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence;
        $body = $this->faker->paragraphs(rand(5, 10), true);
        $excerpt = substr($this->faker->text(200), 0, 200);
        $slug = Str::slug($title);

        return [
            'title' => $title,
            'category_id' => $this->faker->numberBetween(1, 5),
            'user_id' => $this->faker->numberBetween(1, 5),
            'slug' => $slug,
            'excerpt' => $excerpt,
            'body' => $body,
            'image' => null,
        ];
    }
}
