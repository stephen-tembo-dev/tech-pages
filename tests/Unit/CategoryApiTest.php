<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Category;

class CategoryApiTest extends TestCase {
    use RefreshDatabase;

    public function test_can_create_category() {
        $data = ['name' => 'Laravel'];

        $response = $this->postJson('/api/categories', $data);
        $response->assertStatus(201)->assertJsonFragment(['name' => 'Laravel']);
    }

    public function test_can_get_categories() {
        Category::factory(3)->create();

        $response = $this->getJson('/api/categories');
        $response->assertStatus(200)->assertJsonCount(3);
    }

    public function test_can_show_category() {
        $category = Category::factory()->create();

        $response = $this->getJson("/api/categories/{$category->id}");
        $response->assertStatus(200)->assertJsonFragment(['name' => $category->name]);
    }

    public function test_can_update_category() {
        $category = Category::factory()->create();
        $newData = ['name' => 'Updated Category'];

        $response = $this->putJson("/api/categories/{$category->id}", $newData);
        $response->assertStatus(200);
        $this->assertDatabaseHas('categories', ['name' => 'Updated Category']);
    }

    public function test_can_delete_category() {
        $category = Category::factory()->create();

        $response = $this->deleteJson("/api/categories/{$category->id}");
        $response->assertStatus(200);
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }
}
