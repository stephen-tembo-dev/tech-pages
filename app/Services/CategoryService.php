<?php


namespace App\Services;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Support\Collection;

class CategoryService {
    
    protected CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories(): Collection {
        return $this->categoryRepository->getAll();
    }

    public function getCategoryById(int $id): ?Category {
        return $this->categoryRepository->getById($id);
    }

    public function createCategory(array $data): Category {
        return $this->categoryRepository->create($data);
    }

    public function updateCategory(Category $category, array $data): bool {
        return $this->categoryRepository->update($category, $data);
    }

    public function deleteCategory(Category $category): bool {
        return $this->categoryRepository->delete($category);
    }
}
