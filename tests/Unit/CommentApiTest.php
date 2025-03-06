<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\BlogPost;
use App\Models\Comment;

class CommentApiTest extends TestCase {
    use RefreshDatabase;

    public function test_can_create_comment() {
        $blogPost = BlogPost::factory()->create();
        $data = [
            'blog_post_id' => $blogPost->id,
            'content' => 'This is a test comment.'
        ];

        $response = $this->postJson('/api/comments', $data);
        $response->assertStatus(201)->assertJsonFragment(['content' => 'This is a test comment.']);
    }

    public function test_can_get_comments_for_a_post() {
        $blogPost = BlogPost::factory()->create();
        Comment::factory(3)->create(['blog_post_id' => $blogPost->id]);

        $response = $this->getJson("/api/comments/post/{$blogPost->id}");
        $response->assertStatus(200)->assertJsonCount(3);
    }

    public function test_can_delete_comment() {
        $comment = Comment::factory()->create();

        $response = $this->deleteJson("/api/comments/{$comment->id}");
        $response->assertStatus(200);
        $this->assertDatabaseMissing('comments', ['id' => $comment->id]);
    }
}
