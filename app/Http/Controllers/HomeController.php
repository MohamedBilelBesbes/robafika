<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Offers;
use App\Products;
use App\UsersProfiles;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Session;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $displayproducts = DB::table('users_profiles')
        ->join('users', 'users.id', '=', 'users_profiles.iduser')
        ->join('products', 'users.id', '=', 'products.idseller')
        ->get();
        $myoffers = DB::table('offers')
        ->join('products', 'offers.idofprod', '=', 'products.idprod')
        ->join('users', 'users.id', '=', 'products.idseller')
        ->join('users_profiles', 'users.id', '=', 'users_profiles.iduser')
        ->where('offers.idofuser',Auth::id())->get();
        $recievedoffers = DB::table('offers')
        ->join('products', 'offers.idofprod', '=', 'products.idprod')
        ->join('users', 'offers.idofuser', '=', 'users.id')
        ->join('users_profiles', 'users.id', '=', 'users_profiles.iduser')
        ->where('products.idseller',Auth::id())->get();
        $offersiwon = DB::table('offers')
        ->join('products', 'offers.idofprod', '=', 'products.idprod')
        ->join('users', 'users.id', '=', 'products.idseller')
        ->join('users_profiles', 'users.id', '=', 'users_profiles.iduser')
        ->where('offers.idofuser',Auth::id())
        ->where('offers.approved',1)
        ->get();
        return view('home',compact('displayproducts' , 'myoffers' , 'recievedoffers' , 'offersiwon'));
    }
    public function destroy()
{
    
    Offers::where('idofuser' ,  Auth::id())->delete();
    Products::where('idseller', Auth::id())->delete();
    User::where('id', Auth::id())->delete();
    
    return redirect()->to('/register');
}
}
