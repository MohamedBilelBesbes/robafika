<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Session;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Products;
use App\UsersProfiles;

class ProductProfileController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        //to make it work faster, you can use the 'with' instead of the 'join'
        $displayproducts = DB::table('users_profiles')
        ->join('users', 'users.id', '=', 'users_profiles.iduser')
        ->join('products', 'users.id', '=', 'products.idseller')
        ->get();
        //dd($displayproducts);
        // $displayproducts = Products::all();
        /*$prods = Products::all();
        foreach($prods as $prod){
            dd(UsersProfiles::where('iduser',$prod->seller()));
        }*/
        return view('display.displayproducts',compact('displayproducts'));
    }
    public function create()
    {
        return view('pages.productprofile');
    }
    public function toProductProfile()
    {
        return view('pages.productprofile');
    }


    public function prepareUpdate(Request $request){
        $product = Products::where('idprod',$request['idproduct'])->first();
        //dd($product);
        return view('pages.updateproduct',compact('product'));
    }

    public function destroy(Request $request){
        //dd($product);
        DB::table('offers')->where('idofprod' , '=' , $request->idproducte)->delete();
        DB::table('products')->where('idprod' , '=' , $request->idproducte)->delete();


        //dd($product);
        return redirect()->to('/productList')->with('message' , 'Product Deleted Successfully');
    }

    public function update(Request $request)
    {
        try{
            $productprofile = DB::table('products')
            ->where('idprod','=' , $request->idofproduct)
            ->update(['typeprod' => $request->typeprod ,
            'colour' => $request->colour ,
            'age' => $request->age ,
            'startbid' => $request->startbid
            ]);
            if (!(is_null($request->productupdatepic))) {
                //dd($request);
                $filenameWithExt = $request->file('productupdatepic')->getClientOriginalName();
                $filename = pathinfo( $filenameWithExt , PATHINFO_FILENAME);
                $extension = $request->file('productupdatepic')->getClientOriginalExtension();
                $filenameToStore = 'ProductNo'.(string)$request->idofproduct.'.'.time().'.'.$extension;
                //dd($filenameToStore);
                $request->file('productupdatepic')->storeAs('public/productspics' , $filenameToStore);
                $productprofile = DB::table('products')
                ->where('idprod','=' , $request->idofproduct)
                ->update(['typeprod' => $request->typeprod ,
                'colour' => $request->colour ,
                'age' => $request->age ,
                'startbid' => $request->startbid ,
                'productpic' => $filenameToStore
                ]);
            } else {
                $productprofile = DB::table('products')
                ->where('idprod','=' , $request->idofproduct)
                ->update(['typeprod' => $request->typeprod ,
                'colour' => $request->colour ,
                'age' => $request->age ,
                'startbid' => $request->startbid
                ]);
            }
            
            }catch(Exception $e){
                $e->getMessage();
            }   
            
            return redirect()->to('/home');
    }
    
    public function store(Request $req)
    {
        try{

        
        error_log($req->colour);
        $this->validate($req, [
            'typeprod' => 'required',
            'colour' => 'required',
            'age' => 'required' ,
            'startbid' => 'required' ,
            'productpic' => 'image|nullable'
        ]);

       
        $productprofile = new Products;
        $idseller = Auth::id();
        if (!(is_null($req->productpic))) {
        $filenameWithExt = $req->file('productpic')->getClientOriginalName();
        $filename = pathinfo( $filenameWithExt , PATHINFO_FILENAME);
        $extension = $req->file('productpic')->getClientOriginalExtension();
        $filenameToStore = 'product'.(string)$req->idprod.'.'.time().'.'.$extension;
        $req->file('productpic')->storeAs('public/productspics' , $filenameToStore);
        //dd($idseller);    
        $productprofile->typeprod = $req->typeprod;
        $productprofile->colour = $req->colour;
        $productprofile->age = $req->age;
        $productprofile->startbid = $req->startbid;
        $productprofile->idseller = $idseller;
        $productprofile->productpic = $filenameToStore;
        //dd($productprofile);
        $productprofile->save();
        } else {
            //dd($idseller);    
            $productprofile->typeprod = $req->typeprod;
            $productprofile->colour = $req->colour;
            $productprofile->age = $req->age;
            $productprofile->startbid = $req->startbid;
            $productprofile->idseller = $idseller;
            //dd($productprofile);
            $productprofile->save();
        }
    }catch(Exception $e){
        $e->getMessage();
    }   
    
        return redirect()->to('/home');
    }
    public function Funcdisplayproduct(Request $request){
        $product = DB::table('products')
        ->join('users', 'users.id', '=', 'products.idseller')
        ->join('users_profiles', 'users.id', '=', 'users_profiles.iduser')
        ->where('products.idprod',(integer)$request['idproduit'])->first();
        //dd($product);
        return view('display.displayproduct',compact('product'));
    }
}