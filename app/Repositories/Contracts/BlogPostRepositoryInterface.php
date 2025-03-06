<?php


namespace App\Repositories\Contracts;

use App\Models\BlogPost;
use Illuminate\Support\Collection;

interface BlogPostRepositoryInterface {
    public function getAll(): Collection;
    public function getById(int $id): ?BlogPost;
    public function create(array $data): BlogPost;
    public function update(BlogPost $blogPost, array $data): bool;
    public function delete(BlogPost $blogPost): bool;
}


?>