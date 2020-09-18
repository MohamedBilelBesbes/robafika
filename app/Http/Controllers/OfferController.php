<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

use App\Products;
use App\User;
use App\Offers;
use App\Http\Controllers\Session;

class OfferController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function create()
    {
        return view('pages.offer');
    }
    
    public function store(Request $request)
    {
        try{


        $this->validate($request, []);

        $idofferer = Auth::id();
        $offer = new Offers;
        $offer->idofuser = $idofferer;
        $offer->idofprod = $request->iddeproduit;
        $offer->offervalue = $request->valueofoffer;
        //dd($offer);
        $offer->save();
    }catch(Exception $e){
        $e->getMessage();
    }   
    
        return redirect()->to('/productList');
    }
    public function Funcdisplayoffers(Request $request){
        $offers = DB::table('users_profiles')
        ->join('users', 'users_profiles.iduser', '=', 'users.id')
        ->join('offers', 'offers.idofuser', '=', 'users.id')
        ->join('products', 'offers.idofprod', '=', 'products.idprod')
        ->where('offers.idofprod',(integer)$request['idofproduit'])->get();
        //dd($offers);
        return view('display.displayproductoffers',compact('offers'));
    }
    public function Funcdisplaymyoffers(Request $request){
        $offers = DB::table('offers')
        ->join('products', 'offers.idofprod', '=', 'products.idprod')
        ->join('users', 'users.id', '=', 'products.idseller')
        ->join('users_profiles', 'users.id', '=', 'users_profiles.iduser')
        ->where('offers.idofuser',Auth::id())->get();
        //dd($offers);
        return view('display.displaymyoffers',compact('offers'));
    }
    public function Funcdisplayrecievedoffers(Request $request){
        $offers = DB::table('offers')
        ->join('products', 'offers.idofprod', '=', 'products.idprod')
        ->join('users', 'offers.idofuser', '=', 'users.id')
        ->join('users_profiles', 'users.id', '=', 'users_profiles.iduser')
        ->where('products.idseller',Auth::id())->get();
        //dd($offers);
        return view('display.displayrecievedoffers',compact('offers'));
    }
    public function update(Request $request)
    {
        try{

            
            //dd($request->theproductsid);
            $productaccept = DB::table('products')
            ->where('idprod','=' , $request->theproductsid)
            ->update([ 'sold' => true
            ]);
            $offer = DB::table('offers')
            ->where('idofprod','=' , $request->theproductsid)
            ->where('idofuser','=' , $request->theluckysid)
            ->update([ 'approved' => true
            ]);
            }catch(Exception $e){
                $e->getMessage();
            }   
            
            return redirect()->to('/home');
    }
}