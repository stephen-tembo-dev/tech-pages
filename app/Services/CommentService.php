<?php

namespace App\Services;

use App\Repositories\Contracts\CommentRepositoryInterface;
use App\Models\Comment;
use Illuminate\Support\Collection;

class CommentService {
    
    protected CommentRepositoryInterface $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository) {
        $this->commentRepository = $commentRepository;
    }

    public function getCommentsByPost(int $blogPostId): Collection {
        return $this->commentRepository->getAllByPost($blogPostId);
    }

    public function createComment(array $data): Comment {
        return $this->commentRepository->create($data);
    }

    public function deleteComment(Comment $comment): bool {
        return $this->commentRepository->delete($comment);
    }
}
