<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\PasswordResetRequest;
use App\Mail\ForgetPassword;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Register
    public function register(RegisterRequest $request) {


        $data = $request->only(['name', 'email', 'password']);
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);

        event(new Registered($user));

        return [
            'message' => 'User registered successfully',
            'data' => $user
        ];
    }

    // login
    public function login(LoginRequest $request) {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'exists:users'],
            'password' => ['required', 'min:8'],
        ]);

        if($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'data' => $validator->errors(),
            ], 422);
        } else {

        $req_data = request()->only('email', 'password');
            if(Auth::attempt($req_data)) {
                // $user = User::where('id',Auth::user()->id)->with('role')->first();
                $user = User::where('id',Auth::user()->id)->first();
                $data['access_token'] = $user->createToken('accessToken')->accessToken;
                $data['user'] = $user;
                return response()->json($data, 200,);
            }else{
                $data['message'] = 'user not exists!!';
                $data['data']['email'] = ['email or password incorrect'];
                $data['data']['password'] = ['email or password incorrect'];

                return response()->json($data, 401);
            }
        }
    }

    // Logout

    public function logout(Request $request) {

        // $request->auth()->user()->currentAccessToken()->delete();
        // $request->auth()->user()->withAccessToken()->delete();
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ], 200);
    }

    // Show all user in Admin panel
    public function all_user(Request $request)
    {
        $user_list = User::latest()->orderBy('id', 'DESC')->paginate(10);
        return response()->json($user_list, 200);
    }

    // Show Only Current user in Admin panel
    public function current_user(Request $request)
    {
        $user_current = auth()->user();
        // $user = Auth::user();
        return response()->json($user_current, 200);
    }
}
