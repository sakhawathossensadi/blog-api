<?php

namespace Blog\Blog\Database\Factories;

use Blog\Blog\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    protected $model = Blog::class;

    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'description' => $this->faker->text(),
            'category' => ['Sport', 'Food', 'Travel'][random_int(0, 2)],
            'image_url' => null,
            'published_at' => now(),
        ];
    }
}
