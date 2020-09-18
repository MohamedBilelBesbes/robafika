@extends('layouts.extrapp3')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="text-align: left" class="card-header"><h4> back {{Auth::user()->name}} ! Do you want to add a product ?</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div style="text-align: left" >
                    <form method="GET" action="{{route('userprofile.direction')}}">
                        @csrf
                        <h5>Do It In Custom Page !</h5>
                        <button type="submit" class="btn btn-success btn-sm @error('idcurrentuser') is-invalid @enderror">
                            <i class="fa fa-plus"></i>   Add a Prod
                        </button>
                    </form>
                    </div>
                    <form method="POST" action="{{route('product.profile')}}" enctype="multipart/form-data">
                        @csrf
                        <br>
                        <div style="text-align: left" ><h5>Do It In Here !</h5></div>
                        <p>{{ $_SERVER['REQUEST_URI'] }}</p>
                        <div class="form-group row">
                            <label for="typeprod" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                            <div class="col-md-6">
                                <select id="typeprod" type="text" class="form-control @error('typeprod') is-invalid @enderror" name="typeprod">
                                    <optgroup label="Clothing">
                                        <option value="headcover">Head Cover</option>
                                        <option value="jackets">Jackets</option>
                                        <option value="tshirts">T Shirts</option>
                                        <option value="pants">Pants</option>
                                        <option value="footwear">Foot Wear</option>
                                      </optgroup>
                                      <optgroup label="HouseItems">
                                        <option value="elec">Electrics</option>
                                        <option value="furniture">Furniture</option>
                                      </optgroup>
                                      <optgroup label="Other">
                                        <option value="sports">Sports Items</option>
                                        <option value="vehicules">Vehicules</option>
                                      </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="colour" class="col-md-4 col-form-label text-md-right">{{ __('Colour') }}</label>

                            <div class="col-md-6">
                                <input id="colour" style="margin-left: 206px"  type="color" class="form-control @error('colour') is-invalid @enderror" name="colour" value="{{ old('colour') }}" required autocomplete="colour">
                                @error('colour')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('First Usage') }}</label>

                            <div class="col-md-6">
                                <input id="age" style="margin-left: 206px" type="date" class="form-control @error('age') is-invalid @enderror" name="age">

                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="startbid" class="col-md-4 col-form-label text-md-right">{{ __('Starting Bid') }}</label>

                            <div class="col-md-6">
                                <input id="startbid" style="margin-left: 206px"  type="number" class="form-control @error('startbid') is-invalid @enderror" name="startbid">
                                @error('startbid')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="productpic" class="col-md-4 col-form-label text-md-right">{{ __('Click HERE to Upload Picture') }}</label>

                            <div class="col-md-6">
                                <input id="productpic" type="file" class="form-control @error('productpic') is-invalid @enderror" name="productpic">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Post Product') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Review Offers That You Won {{Auth::user()->name}} !</h4>
                <p class="card-category">This table contains offers that you made and got accepted by the seller. Congrats !</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Name of Seller</th>
                      <th>Birthday</th>
                      <th>Gender</th>
                      <th>Phone Number</th>
                      <th>Type</th>
                      <th>First Usage</th>
                      <th>Colour</th>
                      <th>Start bid</th>
                      <th>Offer Value</th>
                      <th>Added Value</th>
                    </thead>
                    @foreach ($offersiwon as $offer)
                    <tbody>
                      <tr>
                          <td>{{$offer->name}}</td>
                          <td>{{$offer->birthday}}</td>
                          <td>{{$offer->gender}}</td>
                          <td>{{$offer->phonenumber}}</td>
                          <td>{{$offer->typeprod}}</td>
                          <td>{{$offer->age}}</td>
                          <td><button style="background-color: {{$offer->colour}}; color: {{$offer->colour}}; height: 16px; width:80px; margin-top:12px"></button></td>
                          <td>{{$offer->startbid}}</td>
                          <td>{{$offer->offervalue}}</td>
                          <td>{{$offer->offervalue - $offer->startbid}}</td>
                    </tbody>
                    @endforeach
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">View Products</h4>
                <p class="card-category">take a look on the existing products</p>
              </div>
              <div class="card-body">
                <div class="container">
            
                  <div class="row">
                    @foreach ($displayproducts as $prod)
                    <div class="col-md-4">
                      <div class="card card-chart">
                        <div class="card-header">
                          <div><img  height="150px" width="300px" class="img-thumbnail" src="storage/productspics/{{$prod->productpic}}" alt="Picture"></div>
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">ID {{$prod->idprod}}</h5>
                          <p class="card-category"><i class="fa fa-user"></i> Seller name: {{$prod->name}}</p>
                          <p class="card-category"><i class="fa fa-diamond"></i> Product Type: {{$prod->typeprod}}</p>
                          <p class="card-category"><i class="fa fa-phone"></i> Phone Number: {{$prod->phonenumber}}</p>
                          <p class="card-category"><i class="fa fa-map-marker"></i> Area : {{$prod->area}}</p>
                          <p class="card-category"><i class="fa fa-money"></i> Starting Bid : {{$prod->startbid}}</p>
                          <div class="d-flex justify-content-between align-items-center">
                            <form method="GET" action="{{route('product.onedisplay')}}">
                                <input type="hidden" id="idproduit" value="{{$prod->idprod}}" name="idproduit">
                                <button type="submit" class="btn btn-success btn-sm @error('idproduit') is-invalid @enderror">
                                    {{ __('View') }}
                                </button>
                                </form>
                                @if($prod->idseller == Auth::id() && (string)$prod->sold != '1')
                                <form method="GET" action="{{route('product.prepareUpdate')}}">
                                    <input type="hidden" id="idproduct" value="{{$prod->idprod}}" name="idproduct">
                                    <button type="submit" class="btn btn-warning btn-sm @error('idproduct') is-invalid @enderror">
                                        {{ __('Edit') }}
                                    </button>
                                    </form>
                                <form method="POST" action="{{route('product.delete')}}">
                                    @csrf
                                    <input type="hidden" id="idproducte" value="{{$prod->idprod}}" name="idproducte">
                                    <button type="submit" class="btn btn-danger btn-sm @error('idproducte') is-invalid @enderror">
                                        {{ __('Delete') }}
                                    </button>
                                    </form>
                            @else
                            <form method="GET" action="{{route('product.prepareUpdate')}}">
                                <input type="hidden" id="idproduct" value="{{$prod->idprod}}" name="idproduct">
                                <button type="submit" class="btn btn-warning btn-sm @error('idproduct') is-invalid @enderror" disabled>
                                    {{ __('Edit') }}
                                </button>
                                </form>
                            <form method="POST" action="{{route('product.delete')}}">
                                @csrf
                                <input type="hidden" id="idproducte" value="{{$prod->idprod}}" name="idproducte">
                                <button type="submit" class="btn btn-danger btn-sm @error('idproducte') is-invalid @enderror" disabled>
                                    {{ __('Delete') }}
                                </button>
                                </form>
                            @endif
                          </div>
                        </div>
                        <div class="card-footer">
                          <div class="stats">
                            <i class="material-icons">access_time</i> product posted on {{$prod->created_at}}
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Review Offers That You Made {{Auth::user()->name}} !</h4>
                  <p class="card-category">This table contains offers that you made. Don't miss good chances !</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>Name of Seller</th>
                        <th>Birthday</th>
                        <th>Gender</th>
                        <th>Phone Number</th>
                        <th>Type</th>
                        <th>First Usage</th>
                        <th>Colour</th>
                        <th>Start bid</th>
                        <th>Offer Value</th>
                        <th>Added Value</th>
                        <th>All Bids</th>
                      </thead>
                      @foreach ($myoffers as $offer)
                      <tbody>
                        <tr>
                            <td>{{$offer->name}}</td>
                            <td>{{$offer->birthday}}</td>
                            <td>{{$offer->gender}}</td>
                            <td>{{$offer->phonenumber}}</td>
                            <td>{{$offer->typeprod}}</td>
                            <td>{{$offer->age}}</td>
                            <td><button style="background-color: {{$offer->colour}}; color: {{$offer->colour}}; height: 16px; width:80px; margin-top:12px"></button></td>
                            <td>{{$offer->startbid}}</td>
                            <td>{{$offer->offervalue}}</td>
                            <td>{{$offer->offervalue - $offer->startbid}}</td>
                            <td><form method="GET" action="{{route('offers.display')}}">
                                <input type="hidden" id="idofproduit" value="{{$offer->idofprod}}" name="idofproduit">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('View Bids') }}
                                </button>
                                </form></td>
                        </tr>
                      </tbody>
                      @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Review Offers That You Recieved {{Auth::user()->name}} !</h4>
                  <p class="card-category">This table contains offers that you recived. Don't miss good chances !</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>Name of Bidder</th>
                        <th>Birthday</th>
                        <th>Gender</th>
                        <th>Phone Number</th>
                        <th>Prod ID</th>
                        <th>Type</th>
                        <th>Colour</th>
                        <th>Start bid</th>
                        <th>Offer Value</th>
                        <th>Added Value</th>
                        <th>Accept Offer ?</th>
                      </thead>
                      @foreach ($recievedoffers as $offer)
                      <tbody>
                          <tr>
                              <td>{{$offer->name}}</td>
                              <td>{{$offer->birthday}}</td>
                              <td>{{$offer->gender}}</td>
                              <td>{{$offer->phonenumber}}</td>
                              <td>{{$offer->idofprod}}</td>
                              <td>{{$offer->typeprod}}</td>
                              <td><button style="background-color: {{$offer->colour}}; color: {{$offer->colour}}; height: 16px; width:80px; margin-top:12px"></button></td>
                              <td>{{$offer->startbid}}</td>
                              <td>{{$offer->offervalue}}</td>
                              <td>{{$offer->offervalue - $offer->startbid}}</td>
                              @if ((string)$offer->sold != '1')
                              <td><form method="POST" action="{{route('offer.accept')}}">
                                  @csrf
                                  <input type="hidden" id="theproductsid" value="{{$offer->idofprod}}" name="theproductsid">
                                  <input type="hidden" id="theluckysid" value="{{$offer->idofuser}}" name="theluckysid">
                                  <br>
                                  <button type="submit" class="btn btn-primary">
                                    {{ __('Accept') }}
                                </button>
                                  </form></td>
                              @else
                              <td><font color="red">Sold</font></td>
                              @endif
                          </tr>
                      </tbody>
                      @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
@endsection
