<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller {
    
    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService) {
        $this->categoryService = $categoryService;
    }

    public function index(): JsonResponse {
        return response()->json($this->categoryService->getAllCategories());
    }

    public function store(CategoryRequest $request): JsonResponse {
        return response()->json($this->categoryService->createCategory($request->validated()), 201);
    }

    public function show(int $id): JsonResponse {
        $category = $this->categoryService->getCategoryById($id);
        return $category ? response()->json($category) : response()->json(['message' => 'Not found'], 404);
    }

    public function update(CategoryRequest $request, Category $category): JsonResponse {
        return $this->categoryService->updateCategory($category, $request->validated())
            ? response()->json(['message' => 'Updated successfully'])
            : response()->json(['message' => 'Update failed'], 500);
    }

    public function destroy(Category $category): JsonResponse {
        return $this->categoryService->deleteCategory($category)
            ? response()->json(['message' => 'Deleted successfully'])
            : response()->json(['message' => 'Delete failed'], 500);
    }
}
