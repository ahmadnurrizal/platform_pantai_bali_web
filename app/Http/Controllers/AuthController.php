<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\JsonResponse;
// use Symfony\Component\HttpFoundation\JsonResponse

class AuthController extends Controller
{
    private $headers = [
        'Content-Type' => 'application/json'
    ];

    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);

        // creating token
        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
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

    public function loginAction(Request $request)
    {
        $response = $this->login($request);
        // dd($response->content());
        dd(json_decode($response->content()));
        if (json_decode($response->content())->success) {
            $data = json_decode($response->content())->data;
            Session::put('token', $data->token);
            Session::put('user', $data->user);
        }
        return redirect()->intended('/');
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
