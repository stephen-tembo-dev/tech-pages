<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\BlogPost;
use App\Models\Category;

class BlogPostApiTest extends TestCase {

    use RefreshDatabase; // Resets DB after each test

    public function test_can_create_blog_post() {

        $category = Category::factory()->create();

        $data = [
            'title' => 'Test Blog Post',
            'content' => 'This is a test content.',
            'category_id' => $category->id,
        ];

        $response = $this->postJson('/api/blog-posts', $data);
        $response->assertStatus(201)->assertJsonFragment(['title' => 'Test Blog Post']);
    }

    public function test_can_get_blog_posts() {
        
        BlogPost::factory(3)->create();

        $response = $this->getJson('/api/blog-posts');
        $response->assertStatus(200)->assertJsonCount(3);
    }

    public function test_can_show_blog_post() {

        $blogPost = BlogPost::factory()->create();

        $response = $this->getJson("/api/blog-posts/{$blogPost->id}");
        $response->assertStatus(200)->assertJsonFragment(['title' => $blogPost->title]);
    }

    public function test_can_update_blog_post() {

        $blogPost = BlogPost::factory()->create();
        $newData = ['title' => 'Updated Title'];

        $response = $this->putJson("/api/blog-posts/{$blogPost->id}", $newData);
        $response->assertStatus(200);
        $this->assertDatabaseHas('blog_posts', ['title' => 'Updated Title']);
    }

    public function test_can_delete_blog_post() {

        $blogPost = BlogPost::factory()->create();

        $response = $this->deleteJson("/api/blog-posts/{$blogPost->id}");
        $response->assertStatus(200);
        $this->assertDatabaseMissing('blog_posts', ['id' => $blogPost->id]);
    }
}
