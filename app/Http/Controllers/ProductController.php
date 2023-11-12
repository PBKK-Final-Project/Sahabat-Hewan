<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['categories', 'types', 'product_reviews'])->get();
        
        return view('shop.index', ['products' => $products]);
    }

    public function getAllProducts()
    {
        $products = Product::with(['categories', 'types', 'product_reviews'])->get();
        
        return response()->json([
            'data' => $products,
        ]);
    }

    public function show($id)
    {
        $product = Product::with(['categories', 'types', 'product_reviews.users'])->find($id);

        return view('shop.product-detail', ['product' => $product]);
    }

    public function showByCategoryAndType($categoryId, $typeId)
    {
        $products = Product::with(['categories', 'types', 'product_reviews'])->where('category_id', $categoryId)->where('type_id', $typeId)->get();

        return response()->json([
            'data' => $products,
        ]);
    }

    public function search($keyword)
    {
        if($keyword == null)
        {
            $products = Product::with(['categories', 'types', 'product_reviews'])->get();

            return response()->json([
                'data' => $products,
            ]);
        }

        $productsByName = Product::with(['categories', 'types', 'product_reviews'])
            ->where('name', 'like', '%' . $keyword . '%')
            ->get();

        $productsByDescription = Product::with(['categories', 'types', 'product_reviews'])
            ->where('description', 'like', '%' . $keyword . '%')
            ->get();

        $productsByShortname = Product::with(['categories', 'types', 'product_reviews'])
            ->where('shortname', 'like', '%' . $keyword . '%')
            ->get();

        $productsByCondition = Product::with(['categories', 'types', 'product_reviews'])
            ->where('condition', 'like', '%' . $keyword . '%')
            ->get();

        $productsByCategory = Product::with(['categories', 'types', 'product_reviews'])
            ->whereHas('categories', function ($query) use ($keyword) {
                $query->where('category', 'like', '%' . $keyword . '%');
            })->get();

        $productsByType = Product::with(['categories', 'types', 'product_reviews'])
            ->whereHas('types', function ($query) use ($keyword) {
                $query->where('type', 'like', '%' . $keyword . '%');
            })->get();

        $productsByReview = Product::with(['categories', 'types', 'product_reviews'])
            ->whereHas('product_reviews', function ($query) use ($keyword) {
                $query->where('review', 'like', '%' . $keyword . '%');
            })->get();

        $products = $productsByName->concat($productsByDescription)
            ->concat($productsByShortname)
            ->concat($productsByCondition)
            ->concat($productsByCategory)
            ->concat($productsByType)
            ->concat($productsByReview)
            ->unique();

        // return products
        return response()->json([
            'data' => $products,
        ]);
    }

    public function sort($sort)
    {
        if($sort == '1' || $sort == 1)
        {
            $products = Product::with(['categories', 'types', 'product_reviews'])->orderBy('created_at', 'desc')->get();
            return response()->json([
                'data'=> $products
                ]);
        }else 
        {
            $products = Product::with(['categories', 'types', 'product_reviews'])->orderBy('created_at', 'asc')->get();   
            return response()->json([
                'data'=> $products
                ]);
        }

    }
}
