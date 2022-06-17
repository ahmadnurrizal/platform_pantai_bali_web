<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function getReview($id)
    {
        return Review::where('beach_id', $id)->get();
    }

    public function getReviewAPI($id)
    {
        $reviews = json_decode(Http::get('https://review-pantai.herokuapp.com/api/review-beach/' . $id . ''));
        // $beach = json_decode(Http::get('http://127.0.0.1:8001/api/beach/beach-detail/' . $id . ''));

        if (!$reviews) {
            return response()->json([
                "status" => "error",
                "message" => "Beach not found"
            ]);
        }
        return response()->json([
            "status" => "success",
            "data" => $reviews
        ]);
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
            // $user_id = 1;
            $review = Review::create([
                'user_id' => $request->user_id,
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

    public function store(Request $req)
    {
        if (Session::has('user')) {
            $user_id = Session::get('user')->id;
        }

        // $response = Http::post('http://127.0.0.1:8001/api/storeAPI', [
        $response = Http::post('https://review-pantai.herokuapp.com/api/storeAPI', [
            'user_id' =>  $user_id,
            'beach_id' => $req->beach_id,
            'review' => $req->review,
        ]);


        return  $response;
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
