<?php

namespace Database\Factories;

use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostFactory extends Factory
{
    protected $model = BlogPost::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'category_id' => Category::factory(), 
        ];
    }
}
