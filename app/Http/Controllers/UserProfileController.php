<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Session;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\UsersProfiles;

class UserProfileController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function toUserProfile()
    {
        return view('pages.profile');
    }

    public function index()
    {
        $displayusers = DB::table('users_profiles')
        ->join('users', 'users.id', '=', 'users_profiles.iduser')
        ->get();
        return view('display.displayusers')->with('displayusers',$displayusers);
    }
    public function create()
    {
        return view('pages.profile');
    }
    
    public function store(Request $request)
    {
        try{

        
        error_log($request->area);
        $this->validate($request, [
            'phonenumber' => 'required' ,
            'userpic' => 'image|nullable'
        ]);
        //dd($request);
        if (!(is_null($request->userpic))) {
        $user_id = Auth::id();
        $filenameWithExt = $request->file('userpic')->getClientOriginalName();
        $filename = pathinfo( $filenameWithExt , PATHINFO_FILENAME);
        $extension = $request->file('userpic')->getClientOriginalExtension();
        $filenameToStore = 'user'.(string)$user_id.'.'.time().'.'.$extension;
        //dd($filenameToStore);
        $request->file('userpic')->storeAs('public/userspics' , $filenameToStore);
        $user = new UsersProfiles;
        $user->iduser = $user_id;
        $user->gender = $request->gender;
        $user->birthday = $request->birthday;
        $user->phonenumber = $request->phonenumber;
        $user->area = $request->area;
        $user->userpic = $filenameToStore;
        $user->save();
        }else {
            $user_id = Auth::id();
            $user = new UsersProfiles;
            $user->iduser = $user_id;
            $user->gender = $request->gender;
            $user->birthday = $request->birthday;
            $user->phonenumber = $request->phonenumber;
            $user->area = $request->area;
            $user->save();
        }
        //UsersProfiles::create(request(['gender', 'birthday', 'phonenumber' , 'area' , $filenameToStore]));
        }catch(Exception $e){
            $e->getMessage();
        }   
        
        return redirect()->to('/home');
    }
    public function getuser()
    {
        $updateuser = UsersProfiles::where('iduser',Auth::id())->first();
        //dd($updateuser);
        return view ('pages.updateuser',compact('updateuser'));
    }
    public function update(Request $request)
    {
        try{
            $currentUser = Auth::id();
            //dd($request->userupdatepic);
            if (!(is_null($request->userupdatepic))) {
            $filenameWithExt = $request->file('userupdatepic')->getClientOriginalName();
            $filename = pathinfo( $filenameWithExt , PATHINFO_FILENAME);
            $extension = $request->file('userupdatepic')->getClientOriginalExtension();
            $filenameToStore = 'userNumber'.(string)$currentUser.'.'.time().'.'.$extension;
            //dd($filenameToStore);
            $request->file('userupdatepic')->storeAs('public/userspics' , $filenameToStore);
            $userprofile = DB::table('users_profiles')
            ->where('iduser','=' , $currentUser)
            ->update(['gender' => $request->gender ,
            'birthday' => $request->birthday ,
            'phonenumber' => $request->phonenumber ,
            'area' => $request->area ,
            'userpic' => $filenameToStore
            ]);
        } else {
            $userprofile = DB::table('users_profiles')
            ->where('iduser','=' , $currentUser)
            ->update(['gender' => $request->gender ,
            'birthday' => $request->birthday ,
            'phonenumber' => $request->phonenumber ,
            'area' => $request->area
            ]);
        }
            }catch(Exception $e){
                $e->getMessage();
            }   
            
            return redirect()->to('/home');
    }
    public function Funcdisplayproducts(Request $request){
        $products = DB::table('products')
        ->join('users', 'users.id', '=', 'products.idseller')
        ->where('products.idseller',(integer)$request['idutilisateur'])->get();
        //dd($products);
        return view('display.displayuserproducts',compact('products'));
    }
    public function Funcdisplaymyproducts(){
        $products = DB::table('products')
        ->join('users', 'users.id', '=', 'products.idseller')
        ->where('products.idseller',Auth::id())->get();
        //dd($products);
        return view('display.displaymyproducts',compact('products'));
    }
}
