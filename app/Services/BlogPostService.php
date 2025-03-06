<?php


namespace App\Services;

use App\Repositories\Contracts\BlogPostRepositoryInterface;
use App\Models\BlogPost;
use Illuminate\Support\Collection;

class BlogPostService {
    protected BlogPostRepositoryInterface $blogPostRepository;

    public function __construct(BlogPostRepositoryInterface $blogPostRepository) {
        $this->blogPostRepository = $blogPostRepository;
    }

    public function getAllPosts(): Collection {
        return $this->blogPostRepository->getAll();
    }

    public function getPostById(int $id): ?BlogPost {
        return $this->blogPostRepository->getById($id);
    }

    public function createPost(array $data): BlogPost {
        return $this->blogPostRepository->create($data);
    }

    public function updatePost(BlogPost $blogPost, array $data): bool {
        return $this->blogPostRepository->update($blogPost, $data);
    }

    public function deletePost(BlogPost $blogPost): bool {
        return $this->blogPostRepository->delete($blogPost);
    }
}





?>