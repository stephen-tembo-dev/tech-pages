<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Services\CommentService;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller {
    
    protected CommentService $commentService;

    public function __construct(CommentService $commentService) {
        $this->commentService = $commentService;
    }

    public function index(int $blogPostId): JsonResponse {
        return response()->json($this->commentService->getCommentsByPost($blogPostId));
    }

    public function store(CommentRequest $request): JsonResponse {
        return response()->json($this->commentService->createComment($request->validated()), 201);
    }

    public function destroy(Comment $comment): JsonResponse {
        return $this->commentService->deleteComment($comment)
            ? response()->json(['message' => 'Deleted successfully'])
            : response()->json(['message' => 'Delete failed'], 500);
    }
}
