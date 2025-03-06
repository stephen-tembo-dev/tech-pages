<?php

namespace Database\Factories;

use App\Models\BlogPost;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'blog_post_id' => BlogPost::factory(), // Create a related BlogPost
            'content' => $this->faker->text(200),  // Fake content for the comment
        ];
    }
}
