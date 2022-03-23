<?php

namespace App\Http\Controllers;

use App\Models\Beach;
use Illuminate\Http\Request;

class BeachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    public function show(Beach $beach)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beach  $beach
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beach $beach)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beach  $beach
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beach $beach)
    {
        //
    }
}
