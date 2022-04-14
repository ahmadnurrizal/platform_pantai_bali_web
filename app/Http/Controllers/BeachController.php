<?php

namespace App\Http\Controllers;

use App\Models\Beach;
use App\Models\Favorite;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class BeachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('kkkk');
        // $allBeach =  Http::get(env('APP_DOMAIN') . '/api/beach/get-data');
        $allBeach =  json_decode(Http::get('https://review-pantai.herokuapp.com/api/get-data-beach'));
        // $allBeach =  $this->getData();
        // dd($allBeach);
        // $allBeach =  $this->getData();
        // $allBeach = new LengthAwarePaginator(
        //     $temp->data,
        //     $temp->total,
        //     $temp->per_page,
        //     $temp->current_page,
        //     ['path' => '/explore/fetch_data']
        // );
        // dd($allBeach[0]->images[1]->url);
        // dd($allBeach[0]->image[1]->url);
        // dd($allBeach);
        return view('explore', compact('allBeach'));
    }

    public function indexHome()
    {
        $temp =  json_decode(Http::get('https://review-pantai.herokuapp.com/api/get-data-beach'));
        for ($i = 0; $i < 4; $i++) {
            $allBeach[] = $temp[$i];
        }
        // dd($allBeach);

        return view('index', compact('allBeach'));
    }

    public function getDataAdmin()
    {
        // $beaches = $this->getData();
        $beaches =  json_decode(Http::get('https://review-pantai.herokuapp.com/api/get-data-beach'));
        // $beaches =  $this->getData();
        return view('admin.beach', compact('beaches'));
    }


    public function getData()
    {
        return Beach::with('images')->get();
    }


    function fetch_data(Request $request)
    {
        // dd($request->ajax());
        if ($request->ajax()) {
            $temp =  json_decode(Http::get('https://review-pantai.herokuapp.com/api/beach/get-data'));
            $allBeach = new LengthAwarePaginator(
                $temp->data,
                $temp->total,
                $temp->per_page,
                $temp->current_page,
                ['path' => '/explore/fetch_data']

            );
            return view('pagination_data', compact('allBeach'))->render();
            // dd($allBeach);
            // return $allBeach;
        }
        // dd($allBeach);
    }

    public function favoriteBeach()
    {
        $userFavorite = Beach::leftjoin('favorites', 'beaches.id', '=', 'favorites.beach_id')->where('user_id', Auth::user()->id)->get();
        return response()->json([
            "status" => "success",
            "beach" => $userFavorite,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        // var_dump($req);
        $req->validate([
            'beach_name' => 'required',
            'beach_description' => 'required',
            'beach_location' => 'required',
        ]);

        $beachData = $req->except('images');
        $beach = Beach::create($beachData);

        return response()->json([
            "status" => "success",
            "data" => $beach,
        ]);
    }

    public function imageAPI(Request $req)
    {
        Image::create([
            'beach_id' => $req->beach_id,
            'url' => $req->beach_id
        ]);
    }

    public function storeAPI(Request $req)
    {
        // insert data to beach table

        $response = Http::post('https://review-pantai.herokuapp.com/api/beach', [
            'beach_name' => $req->beach_name,
            'beach_location' => $req->beach_location,
            'beach_description' => $req->beach_description,
        ]);
        $beach_id = (json_decode($response->body())->data->id);
        $files = $req->file('images');
        $linkImages = array();
        foreach ($files as $imagefile) {
            $file_path = $imagefile->getPathName();
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', 'https://api.imgur.com/3/image', [
                'headers' => [
                    'authorization' => 'Client-ID ' . env('IMGUR_CLIENT_ID'),
                    'content-type' => 'application/x-www-form-urlencoded',
                ],
                'form_params' => [
                    'image' => base64_encode(file_get_contents($imagefile->path($file_path)))
                ],
            ]);
            $linkImage = json_decode($response->getBody())->data->link;
            array_push($linkImages,  $linkImage);
        }
        var_dump($beach_id);
        foreach ($linkImages as $url) {
            $response = Http::post('https://review-pantai.herokuapp.com/api/image', [
                'url' => $url,
                'beach_id' => $beach_id
            ]);
        }
        // return redirect()->intended('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beach  $beach
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd("kkkkk");
        $totalFavorite = (new FavoriteController)->countBeachFavorite($id);
        $reviews = (new ReviewController)->getReview($id);
        $beach = json_decode(Http::get('https://review-pantai.herokuapp.com/api/beach/beach-detail/' . $id . ''));
        // $beach = $this->getbeachById($id);
        // dd($beach);
        $images = $beach[1];
        $detailBeach = $beach[0];
        if (!$beach) {
            return response()->json([
                "status" => "error",
                "message" => "Beach not found"
            ]);
        }

        return view('beach-detail', compact('detailBeach', 'totalFavorite', 'reviews', 'images'));
    }

    public function getbeachById($id)
    {
        $beach = Beach::find($id); // find data by id
        $images = Image::where('beach_id', $id)->get()->toArray();
        $imageArray = [];
        foreach ($images as $image) {
            $imageArray[] = $image['url'];
        }
        // dd($imageArray)
        return [$beach, $imageArray];
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
        // $data = $request->all();

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
        // $beach_id =  (int)$id;
        $beach = Beach::find($id);

        if (!$beach) {
            return response()->json([
                "status" => "error",
                "message" => "beach not found",
            ], 404);
        }

        $beach->delete($id);

        return response()->json([
            "status" => "success",
            "message" => "beach deleted",
        ]);
    }

    public function destroyAPI($id)
    {
        $beach = json_decode(Http::get('https://review-pantai.herokuapp.com/api/beach/beach-detail/' . $id));
        var_dump($beach);
        if (!$beach[0] == NULL) {
            $apiURL = 'https://review-pantai.herokuapp.com/api/beach/delete/' . $id;
            $response = Http::post($apiURL);
            $responseBody = json_decode($response->getBody(), true);
            // $beach->delete($id);

            return response()->json([
                "status" => "success",
                "message" => "beach deleted",
                'response' => $responseBody
            ]);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "beach not found",
            ], 404);
        }
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
