<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Auth;
use Response;
use Validator;
use Crypt;
use Config;
use \Common\Common;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(array $data)
    {
        return Validator::make($data, [
            'mobile' => 'required|digits:11|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }
    
    /*
     * 提交登陆
     */
    public function login(Request $request)
    {
        if($request->ajax()){
            $arr = array('status'=>'1');
            $rules    = [
                'mobile' => 'required|digits:11',
                'password' => 'required' ,
                'redirectURL' => 'required'
            ];
    
            $v = Validator::make($request->all(), $rules);
    
            if ($v->fails()) {
                $arr['status'] = 3;
                $arr['msg'] = $v->messages()->first();
                return Response::json($arr);
            }
    
            $credentials = $request->only('mobile', 'password');
    
            if (Auth::attempt($credentials, $request->has('remember')))
            {
                //加密
                $user_cont = array('uid'=>Auth::user()->id,'nk'=>Auth::user()->name);
                $details = Crypt::encrypt($user_cont);
                $_secret = MD5($details.Common::$auth_secret);
                 
                return Response::json([
                    'status' => 1,
                    '_secret' => $_secret,
                    'details' => $details,
                    'redirectURL' => $request->input('redirectURL'),
                    'url1' => Config::get('constants.auth_url1'),
                    'url2' => Config::get('constants.auth_url2'),
                ]);
    
                //return redirect()->intended($this->redirectPath());
            }
             
            $arr['status'] = 2;
            $arr['msg'] = $this->getFailedLoginMessage();
            return Response::json($arr);
        }
    }
    
    //登陆页面
    public function showLoginForm(Request $request)
    {
        $redirectURL = $request->input('redirectURL');
        if(!$redirectURL){
            $redirectURL = Config::get('constants.redirectURL');
        }
        
        $param = array('redirectURL' => $redirectURL);
         
        if($request->input('logout') == 'true'){
            $param['logout'] = 'true';
            $param['url_logut1'] = Config::get('constants.auth_url_logout1');
            $param['url_logut2'] = Config::get('constants.auth_url_logout2');
        }
        return view('auth.login',$param);
    }
    
    /**
     * 登出
     */
    public function logout()
    {
        Auth::logout();
    
        return redirect()->route('login',['logout'=>'true']);
    }
}
