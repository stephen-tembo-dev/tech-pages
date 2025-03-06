<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Support\Collection;

class CategoryRepository implements CategoryRepositoryInterface {
    
    public function getAll(): Collection {
        return Category::with('blogPosts')->get();
    }

    public function getById(int $id): ?Category {
        return Category::with('blogPosts')->find($id);
    }

    public function create(array $data): Category {
        return Category::create($data);
    }

    public function update(Category $category, array $data): bool {
        return $category->update($data);
    }

    public function delete(Category $category): bool {
        return $category->delete();
    }
}
