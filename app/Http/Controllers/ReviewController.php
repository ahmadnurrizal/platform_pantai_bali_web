<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function getReview($id)
    {
        return Review::where('beach_id', $id)->get();
    }

    public function storeAPI(Request $request)
    {
        $reviewData = $request->all();
        $validate = Validator::make($reviewData, [
            'review' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'error_messages' => $validate->errors()->toArray()
            ]);
        }


        try {

            if (Session::has('user')) {
                $user_id = Session::get('user')->id;
            }
            // $user_id = 1;
            $review = Review::create([
                'user_id' => $user_id,
                'beach_id' => $request->beach_id,
                'review' => $request->review
            ]);
        } catch (Exception $e) {
            return response()->json(["error" => true, "error_messages" => $e->getMessage()]);
        }

        return response()->json([
            "error" => false,
            "message" => "Successfuly Add review!",
            "data" => $review
        ]);
    }


    public function update(Request $request)
    {
        $reviewData = $request->all();
        $validate = Validator::make($reviewData, [
            'review' => 'required',

        ]);

        if ($validate->fails()) {
            return response()->json([
                'error_messages' => $validate->errors()->toArray()
            ]);
        }


        try {
            $review = Review::where('user_id', Auth::user()->id)->where('beach_id', $request->beach_id)->first();
            $newReview = $review->update([
                'review' => $request->review
            ]);
        } catch (Exception $e) {
            return response()->json(["error" => true, "error_messages" => $e->getMessage()]);
        }

        return response()->json([
            "error" => false,
            "message" => "Successfuly update review!",
            "data" => $newReview
        ]);
    }
}
