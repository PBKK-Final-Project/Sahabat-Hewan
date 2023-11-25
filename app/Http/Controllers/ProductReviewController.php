<?php

namespace App\Http\Controllers;

use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function storeReview(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'review' => 'required',
        ]);

        $userId = auth()->user()->id;

        $productReview = ProductReview::create([
            'product_id'=> $request->product_id,
            'user_id'=> $userId,
            'review'=> $request->review,
        ]);

        return response()->json(
            [
                'status'=> 'success',
                'message'=> 'Review added',
                'data' => $productReview
            ], 200
        );
    }
}
