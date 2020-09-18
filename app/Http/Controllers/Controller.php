<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\User;
use App\Offers;
use App\Products;
use App\UsersProfiles;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function toWelcome()
    {
        $products = DB::table('users_profiles')
        ->join('users', 'users.id', '=', 'users_profiles.iduser')
        ->join('products', 'users.id', '=', 'products.idseller')
        ->get();
        $offers = DB::table('offers')->get();
        $users = DB::table('users')->get();
        return view('welcome' , compact('products' , 'offers' , 'users'));
    }
    public function toAbout()
    {
        return view('pages.about');
    }
    public function FuncEmailVerified()
    {
        return view('display.emailverified');
    }
    public function FuncEmailVerification()
    {
        return view('display.emailverification');
    }
    public function sendEmail()
    {
        return view('email.verification');
    }

}
