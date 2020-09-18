@extends('layouts.extrapp3')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Product Profile') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              The Seller's Name
                              <span class="badge badge-primary badge-pill">{{$product->name}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Phone Number
                               <span class="badge badge-primary badge-pill">{{$product->phonenumber}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Email
                              <span class="badge badge-primary badge-pill">{{$product->email}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Seller's Gender
                              <span class="badge badge-primary badge-pill">{{$product->gender}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Seller's Age
                              <span class="badge badge-primary badge-pill">{{$product->birthday}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Area
                              <span class="badge badge-primary badge-pill">{{$product->area}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Product Type
                              <span class="badge badge-primary badge-pill">{{$product->typeprod}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Product Colour
                              <span class="badge badge-primary badge-pill" style="background-color:{{$product->colour}}"><p style="color:{{$product->colour}};">coli</p></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              First Usage's Date
                              <span class="badge badge-primary badge-pill">{{$product->age}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Starting Bidding Price
                              <span class="badge badge-primary badge-pill">{{$product->startbid}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">The Product's Picture :
                              <span class="badge">
                              <div class="col-md-6" style="margin-left: 15%">
                                  
                                      <img  height="90%" width="90%" class="img-thumbnail" src="storage/productspics/{{$product->productpic}}" alt="Picture Of {{ Auth::user()->name }} Product With ID {{$product->idprod}}" style="margin-left: 100%" >
                                
                              </div>
                              </span>
                            </li>
                            @if($product->idseller != Auth::id())
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Place Your Bid
                              <form method="POST" action="{{route('make.offer')}}">
                                @csrf
                                <input type="hidden" id="iddeproduit" value="{{$product->idprod}}" name="iddeproduit">
                                <input id="valueofoffer" type="number" class=" @error('valueofoffer') is-invalid @enderror" name="valueofoffer">
                                <br>
                                <button type="submit" class="btn btn-primary">
                                  {{ __('Offer') }}
                              </button>
                                </form>
                              <form method="GET" action="{{route('offers.display')}}">
                                <input type="hidden" id="idofproduit" value="{{$product->idprod}}" name="idofproduit">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('View Bids') }}
                                </button>
                                </form>
                            </li>
                            @else
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Bidding
                              <form method="GET" action="{{route('offers.display')}}">
                                <input type="hidden" id="idofproduit" value="{{$product->idprod}}" name="idofproduit">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('View Bids') }}
                                </button>
                                </form>
                            </li>
                            @endif
                        </ul>
            </div>
        </div>
    </div>
</div>
@endsection