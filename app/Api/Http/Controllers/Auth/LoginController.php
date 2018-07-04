<?php

namespace App\Api\Http\Controllers\Auth;

use App\Api\Http\Controllers\Controller;
use App\Auth\Models\User;
use App\Core\Dao\SDB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    public function username()
    {
        return 'email';
    }
    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $credentials = array('email' => $request->input('email'), 'password' => $request->input('password'), 'is_active' => 1);
        return $credentials;
    }
    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $result = array();
        if($request)
        if ($this->attemptLogin($request)) {
            $loginToken = $this->generateTokenLogin();

            Session::put('abc', $loginToken,10000);
            Session::save();
            echo( Session::get('abc'));
            $result['status']= 'OK';
            $result[\ApiConst::ApiLoginTokenName] = $loginToken;
            return json_encode($result);
        }
        $result['status']='false';
        return json_encode($result);
    }
    protected function generateTokenLogin(){
        $token_code = str_random();
        return $token_code;
    }
    public function abc(){

        echo( Session::get('abc'));
        die('ok');
    }
}
