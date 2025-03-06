<?php

namespace App\Repositories;

use App\Models\BlogPost;
use App\Repositories\Contracts\BlogPostRepositoryInterface;
use Illuminate\Support\Collection;

class BlogPostRepository implements BlogPostRepositoryInterface {
    public function getAll(): Collection {
        return BlogPost::with(['category', 'comments'])->get();
    }

    public function getById(int $id): ?BlogPost {
        return BlogPost::with(['category', 'comments'])->find($id);
    }

    public function create(array $data): BlogPost {
        return BlogPost::create($data);
    }

    public function update(BlogPost $blogPost, array $data): bool {
        return $blogPost->update($data);
    }

    public function delete(BlogPost $blogPost): bool {
        return $blogPost->delete();
    }
}




?>