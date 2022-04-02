<?php

namespace App\Http\Controllers;

use App\Models\Beach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd("prankkkk");
        $beach =  Beach::all();
        return response()->json([
            "status" => "success",
            "data" => $beach
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'beach_name' => 'required',
            'beach_description' => 'required',
            'beach_location' => 'required',
        ]);

        // insert data to beach table
        $beach = Beach::create($request->all());

        return response()->json([
            "status" => "success",
            "data" => $beach,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beach  $beach
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $beach = Beach::find($id); // find data by id

        // $user = auth()->user();

        if (!$beach) {
            return response()->json([
                "status" => "error",
                "message" => "Beach not found"
            ]);
        }

        return response()->json([
            "status" => "success",
            "data" => $beach,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beach  $beach
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $beach = Beach::find($id);
        if (!$beach) {
            return response()->json([
                "status" => "error",
                "message" => "beach not found"
            ]);
        }

        // $user = auth()->user();
        $data = $request->all();

        // if ($beach->user_id != $user->id) { // check user can update beach or not (only user which create the beach can update)
        //     return response()->json([
        //         "status" => "error",
        //         "message" => "user can't update beach"
        //     ]);
        // }

        $beach->update($request->all()); // update  data

        return response()->json([
            "status" => "success",
            "data" => $beach
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beach  $beach
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $beach = Beach::find($id);
        // $user = auth()->user();

        // if ($beach->user_id != $user->id) { // check user can delete beach or not (only user which create the beach can delete)
        //     return response()->json([
        //         "status" => "error",
        //         "message" => "user can't delete beach"
        //     ]);
        // }

        if (!$beach) {
            return response()->json([
                "status" => "error",
                "message" => "beach not found",
            ], 404);
        }

        $beach->delete();

        return response()->json([
            "status" => "success",
            "message" => "beach deleted"
        ]);
    }

    public function search($beach_name)
    {
        // $beach = Beach::where('beach_name', 'like', '%' . $beach_name . '%')
        //     ->where('status', 'public')->get(); // search data by title
        $beach = Beach::select("beach_name")
            ->where(DB::raw('lower(beach_name)'), 'like', '%' . strtolower($beach_name) . '%')
            ->get();

        if ($beach->isEmpty()) {
            return response()->json([
                "status" => "error",
                "message" => "beach not found",
            ], 404);
        }

        return response()->json([
            "status" => "success",
            "data" => $beach
        ]);
    }
}
