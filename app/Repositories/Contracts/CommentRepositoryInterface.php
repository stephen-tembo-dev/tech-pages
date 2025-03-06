<?php

namespace App\Repositories\Contracts;

use App\Models\Comment;
use Illuminate\Support\Collection;

interface CommentRepositoryInterface {
    public function getAllByPost(int $blogPostId): Collection;
    public function create(array $data): Comment;
    public function delete(Comment $comment): bool;
}
