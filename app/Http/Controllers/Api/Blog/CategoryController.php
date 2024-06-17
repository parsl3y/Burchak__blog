<?php

namespace App\Http\Controllers\Api\Blog;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{

    public function index(): JsonResponse
    {
        $categories = BlogCategory::all();

        return response()->json($categories);
    }


    public function show(string $id): JsonResponse
    {
        $category = BlogCategory::find($id);

        if (empty($category)) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        return response()->json($category);
    }
    public function create(BlogCategoryCreateRequest $request)
    {
        $data = $request->input(); //отримаємо масив даних, які надійшли з форми

        $item = (new BlogCategory())->create($data); //створюємо об'єкт і додаємо в БД
        return response()->json(['success' => 'Category created successfully', 'category' => $item], 201);
    }
    public function edit(Request $request, string $id): JsonResponse
    {
        $category = BlogCategory::find($id);

        if (empty($category)) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        $category->update($request->all());

        return response()->json(['success' => 'Category updated successfully', 'category' => $category]);
    }
}
