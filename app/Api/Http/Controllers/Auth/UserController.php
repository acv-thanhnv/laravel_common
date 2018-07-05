<?php

namespace App\Api\Http\Controllers\Auth;

use App\Api\Http\Controllers\Controller;
use App\Core\Dao\SDB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Api\Models\User;
use JWTAuth;
class UserController extends Controller
{
    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    public function register(Request $request){
        $user = $this->user->create([
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'updated_at'=>now(),
            'created_at'=>now()
        ]);

        return response()->json([
            'status'=> 200,
            'message'=> 'User created successfully',
            'data'=>$user
        ]);
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        $token = null;
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['invalid_email_or_password'], 422);
            }
        } catch (JWTAuthException $e) {
            return response()->json(['failed_to_create_token'], 500);
        }
        return response()->json(compact('token'));
    }

    public function getUserInfo(Request $request){
        $result =  SDB::execSPs('ACL_GET_MODULES_LST');
        return response()->json(['result' => $result]);
    }
}
