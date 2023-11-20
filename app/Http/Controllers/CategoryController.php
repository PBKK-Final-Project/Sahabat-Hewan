<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategory()
    {
        $categories = Category::all();

        return view('admin.create-category', ['categories' => $categories]);
    }

    public function updateCategory(Request $request, $id)
    {

        $id = (int) $id;
        $category = Category::findOrfail($id);
        
        $category->category = $request->category;
        $category->save();
        
        return response()->json([
            'success' => true,
            'message' => 'Category',
            'code' => 200,
            'data' => $category
        ], 200);
    }

    public function storeCategory(Request $request)
    {
        $category = Category::create([
            'category' => $request->category
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Category',
            'code' => 200,
            'data' => $category
        ], 200);
    }

    public function deleteCategory($id)
    {
        $id = (int) $id;
        $category = Category::findOrfail($id);
        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category',
            'code' => 200,
            'data' => $category
        ], 200);
    }
}
