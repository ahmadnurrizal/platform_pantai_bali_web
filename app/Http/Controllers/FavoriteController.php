<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    // public function getUserFavorite()
    // {
    //     return Favorite::where('user_id', Auth::user()->id)->get();
    // }

    public function countBeachFavorite($beach_id)
    {
        return Favorite::where('beach_id', $beach_id)->get()->count();
    }

    public function store(Request $request)
    {
        try {
            $user = Auth::user();
            $favorite = Favorite::create([
                'user_id' => $user->id,
                'beach_id' => $request->beach_id
            ]);
        } catch (Exception $e) {
            return response()->json(["error" => true, "error_messages" => $e->getMessage()]);
        }

        return response()->json([
            "error" => false,
            "message" => "Successfuly add favorite!",
            "data" => $favorite
        ]);
    }
    public function destroy($id)
    {
        try {
            Favorite::where('user_id', Auth::user()->id)->where('beach_id', $id)->first()->delete();
        } catch (Exception $e) {
            return response()->json(["error" => true, "error_messages" => $e->getMessage()]);
        }

        return response()->json(["error" => false, "message" => "Successfuly Deleted favorite!"]);
    }
}
