<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

// use Symfony\Component\HttpFoundation\JsonResponse

class AuthController extends Controller
{
    private $headers = [
        'Content-Type' => 'application/json'
    ];

    public function registerAPI(Request $request)
    {
        // $fields = $request->validate([
        //     'name' => 'required|string',
        //     'email' => 'required|string|unique:users,email',
        //     'password' => 'required|string',
        // ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // creating token
        // $token = $user->createToken('myapptoken')->plainTextToken;
        // $response = [
        //     'user' => $user,
        //     'token' => $token
        // ];
        return $user;
    }
    public function register(Request $req)
    {
        // var_dump($req);
        // $response = Http::post('http://127.0.0.1:8001/api/registerAPI', [
        $response = Http::post('https://review-pantai.herokuapp.com/api/registerAPI', [
            'name' => $req->name,
            'email' => $req->email,
            'password' => $req->password,
        ]);

        $req->session()->flash('success', 'Registration Successfull!! Please Login');
        return redirect()->intended('/login');
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // check email
        $user = User::where('email', $fields['email'])->first();

        // dd($user->password);

        // check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                "success" => false,
                'message' => 'Bed Creds'
            ], 401);
        }

        // creating token
        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        // return response($response, 201);
        return response()->json([
            'data' => $response,
            "success" => true,
        ], 200, $this->headers);
    }

    public function loginAction(Request $req)
    {
        // $response = $this->login($request);
        // $response = Http::post('http://127.0.0.1:8001/api/login', [
        $response = Http::post('https://review-pantai.herokuapp.com/api/beach', [
            'email' => $req->email,
            'password' => $req->password,
        ]);
        // dd($response->content());
        if (json_decode($response->body())->success) {
            $data = json_decode($response->body())->data;
            Session::put('token', $data->token);
            Session::put('user', $data->user);
            return redirect()->intended('/');
        } else {
            $req->session()->flash('fail_login', 'Please enter correct email/password');
            return back();
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete(); // Delete token (code is good, ignore error)
        return response(['message' => 'logged out']);
    }

    public function loginView(Request $request)
    {
        // $response = $this->login($request);
        return view('login');
    }

    public function registerView()
    {
        return view('register');
    }
}
