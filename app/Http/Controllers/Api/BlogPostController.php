<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogPostRequest;
use App\Services\BlogPostService;
use App\Models\BlogPost;
use Illuminate\Http\JsonResponse;

class BlogPostController extends Controller {
    
    protected BlogPostService $blogPostService;

    public function __construct(BlogPostService $blogPostService) {
        $this->blogPostService = $blogPostService;
    }

    public function index(): JsonResponse {
        return response()->json($this->blogPostService->getAllPosts());
    }

    public function store(BlogPostRequest $request): JsonResponse {
        return response()->json($this->blogPostService->createPost($request->validated()), 201);
    }

    public function show(int $id): JsonResponse {
        $post = $this->blogPostService->getPostById($id);
        return $post ? response()->json($post) : response()->json(['message' => 'Not found'], 404);
    }

    public function update(BlogPostRequest $request, BlogPost $blogPost): JsonResponse {
        return $this->blogPostService->updatePost($blogPost, $request->validated())
            ? response()->json(['message' => 'Updated successfully'])
            : response()->json(['message' => 'Update failed'], 500);
    }

    public function destroy(BlogPost $blogPost): JsonResponse {
        return $this->blogPostService->deletePost($blogPost)
            ? response()->json(['message' => 'Deleted successfully'])
            : response()->json(['message' => 'Delete failed'], 500);
    }
}
