<?php
namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Auth;
use Validator;
use DB;
use App\User;

class ProfileController extends Controller
{
    public $module = 'profile';
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }
    
    /**
     * Get a validator for an incoming update request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'mobile' => 'required|digits:11',
            'email' => 'required|email|max:255',
            //'password' => 'required|min:6|confirmed',
        ]);
    }
    
    public function index(){
        
        return view('profile.index');
    }
    
    public function profile(){
        $user = DB::table('users')->where('id',Auth::user()->id)->first();
//         var_dump($user);die;
        
        return view('profile.profile',['user'=>$user]);
    }
    
    public function proEdit(Request $request){
        $validator = $this->validator($request->all());
        
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = User::find(Auth::user()->id);
        $user->update($request->all());
        
        return redirect()->route('profile');
    }
}
