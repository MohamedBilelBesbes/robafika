@extends('layouts.extrapp3')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="material-icons">person</i>
            </div>
            <p class="card-category">Number Of Users</p>
            <h3 class="card-title">{{count($users)}}</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">person_search</i>
              <a href="{{ route('users.list') }}">view our users</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
              <i class="material-icons">store</i>
            </div>
            <p class="card-category">Number Of Products</p>
            <h3 class="card-title">{{count($products)}}</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">shopping_basket</i><a href="{{ route('products.list') }}">view our products</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-danger card-header-icon">
            <div class="card-icon">
              <i class="material-icons">control_point_duplicate</i>
            </div>
            <p class="card-category">Number Of Offers</p>
            <h3 class="card-title">{{count($offers)}}</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">local_offer</i><a href="{{ route('offers.display') }}">view the existing offers</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-primary card-header-icon" >
            <div class="card-icon" style="background-color: #4267B2 !important">
              <i class="fa fa-facebook"></i>
            </div>
            <p class="card-category">Followers</p>
            <h3 class="card-title">+500</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">update</i> Just Updated
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="row">
    @foreach ($products as $prod)
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
  @guest
        <div class="container">
            
                  <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Do you want to join our family ? Register now!') }}</div>
            
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
            
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="name" style="margin-left: 206px" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="email" type="email" style="margin-left: 206px" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="password" style="margin-left: 206px" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" style="margin-left: 206px" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
            
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endguest
@endsection