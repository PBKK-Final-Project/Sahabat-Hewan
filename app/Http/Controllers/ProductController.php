<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function index()
    {

        $products = Cache::remember('products', 60, function () {
            return Product::with(['categories', 'types', 'product_reviews', 'ratings'])->get();
        });
        
        return view('shop.index', ['products' => $products]);
    }

    public function getAllProducts()
    {

        $products = Cache::remember('products', 60, function () {
            return Product::with(['categories', 'types', 'product_reviews', 'ratings'])->get();
        });
        
        return response()->json([
            'data' => $products,
        ]);
    }

    public function show($id)
    {
        $product = Product::with(['categories', 'types', 'product_reviews.users', 'ratings'])->find($id);

        // get average rating
        $ratings = $product->ratings;
        $totalRating = 0;
        foreach($ratings as $rating)
        {
            $totalRating += $rating->rating;
        }
        $averageRating = 0;
        if(count($ratings) > 0)
        {
            $averageRating = $totalRating / count($ratings);
        }

        // get user rating
        $user = auth()->user();
        $userRating = 0;
        if($user)
        {
            $userRating = $product->ratings()->where('user_id', $user->id)->first();
        }

        return view('shop.product-detail', ['product' => $product, 'averageRating' => $averageRating, 'userRating' => $userRating] );
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

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'category_id' => 'required',
                'type_id' => 'required',
                'stock' => 'required',
                'condition' => 'required',
                'shortname' => 'required',
            ]
        );

        $filename = '';
        if($request->file('image'))
        {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $filename = 'product' . time() . '_' . rand(0, 999) . '.' . $request->file('image')->extension();

            $request->file('image')->storeAs('/public/product/images', $filename);

        }

        $product = Product::create([
            'name' => $request->name,
            'description'=> $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'type_id' => $request->type_id,
            'image' => $filename,
            'stock' => $request->stock,
            'condition' => $request->condition,
            'shortname' => $request->shortname,
            'sold' => 0,
        ]);

        return redirect('/shop');
    }

    public function create()
    {
        $types = Type::all();
        $categories = Category::all();

        return view('admin.create-product', ['types' => $types, 'categories' => $categories]);
    }

    public function products()
    {
        $products = Product::with(['categories', 'types', 'product_reviews'])->get();
        
        return view('admin.products', ['products' => $products]);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('/products');
    }

    public function edit($id)
    {
        $product = Product::with(['categories', 'types', 'product_reviews'])->where('id', $id)->get()[0];
        // dd($product);
        $types = Type::all();
        $categories = Category::all();

        return view('admin.edit-product', ['product' => $product, 'types' => $types, 'categories' => $categories]);
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'category_id' => 'required',
                'type_id' => 'required',
                'stock' => 'required',
                'condition' => 'required',
                'shortname' => 'required',
            ]
        );

        $filename = '';
        if($request->file('image'))
        {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $filename = 'product' . time() . '_' . rand(0, 999) . '.' . $request->file('image')->extension();

            $request->file('image')->storeAs('/public/product/images', $filename);

        }

        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price =  $request->price;
        $product->category_id = $request->category_id;
        $product->type_id = $request->type_id;
        $product->stock = $request->stock;
        $product->condition = $request->condition;
        $product->shortname = $request->shortname;
        if($filename != '')
        {
            $oldImage = $product->image;
            if($oldImage != '')
            {
                unlink(storage_path('\app\public\product\images\\' . $oldImage));
            }
            $product->image = $filename;
        }
        $product->save();

        return redirect('/products');
    }
}
