<?php

namespace App\Api\Http\Controllers\Auth;

use App\Api\Http\Controllers\Controller;
use App\Core\Dao\SDB;
use App\Core\Helpers\CommonHelper;
use App\Core\Entities\DataResultCollection;
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
            'password' => Hash::make($request->get('password'))
        ]);

        $resultData =  new DataResultCollection();
        $resultData->status=\SDBStatusCode::OK;
        $resultData->data = $user;
        $resultData->message = 'User created successfully';
        return CommonHelper::JsonDataResult($resultData);
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        $token = null;
        $resultData =  new DataResultCollection();
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                $resultData->status = \SDBStatusCode::ApiError;
                $resultData->data = ['message'=>trans('invalid_email_or_password')];
                return CommonHelper::JsonDataResult($resultData);
            }
        } catch (JWTAuthException $e) {
            $resultData->status = \SDBStatusCode::Excep;
            $resultData->data = ['message'=>trans('false_to_create_token')];
        }
        $resultData->status=\SDBStatusCode::OK;
        $resultData->data=array('token'=>$token);
        return CommonHelper::JsonDataResult($resultData);
    }

    public function getUserInfo(Request $request){
        $result =  SDB::execSPsToDataResultCollection('ACL_GET_MODULES_LST');
        return CommonHelper::JsonDataResult($result);
    }
}
