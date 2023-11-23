<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request, $id)
    {
        $user = auth()->user();

        $rating = Rating::where('user_id', $user->id)->where('product_id', $id)->first();

        if($rating)
        {
            $rating->rating = $request->rating;
            $rating->save();

            return response()->json([
                'data' => $rating,
            ]);
        }

        $rating = new Rating();
        $rating->user_id = $user->id;
        $rating->product_id = $id;
        $rating->rating = $request->rating;
        $rating->save();

        return response()->json([
            'data' => $rating,
        ]);
    }
}
