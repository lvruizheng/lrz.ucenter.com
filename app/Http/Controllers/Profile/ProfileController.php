<?php
namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Auth;
use Validator;
use DB;
use App\User;
use Storage;

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
        $file = $request->file('avatar');
        
        // 文件是否上传成功
        if ($file->isValid()) {
        
            // 获取文件相关信息
            $originalName = $file->getClientOriginalName(); // 文件原名
            $ext = $file->getClientOriginalExtension();     // 扩展名
            $realPath = $file->getRealPath();   //临时文件的绝对路径
            $type = $file->getClientMimeType();     // image/jpeg
        
            // 上传文件
            $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
            
            // 使用我们新建的uploads本地存储空间（目录）
            $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
            
        }
        
        $requests = $request->all();
        $requests['avatar'] = $filename;
        
        $validator = $this->validator($requests);
        
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = User::find(Auth::user()->id);
        $user->update($requests);
        
        return redirect()->route('profile');
    }
    
    //上传图片
    public function inputFile(Request $request){
        $request = $request->file('inputfile');
        var_dump($request);die;
    }
}
