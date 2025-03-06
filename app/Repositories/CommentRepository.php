<?php

namespace App\Repositories;

use App\Models\Comment;
use App\Repositories\Contracts\CommentRepositoryInterface;
use Illuminate\Support\Collection;

class CommentRepository implements CommentRepositoryInterface {
    
    public function getAllByPost(int $blogPostId): Collection {
        return Comment::where('blog_post_id', $blogPostId)->whereNull('parent_id')->with('replies')->get();
    }

    public function create(array $data): Comment {
        return Comment::create($data);
    }

    public function delete(Comment $comment): bool {
        return $comment->delete();
    }
}
