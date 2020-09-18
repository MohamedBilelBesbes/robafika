@extends('layouts.extrapp3')

@section('content')
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Put your info') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('product.update')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="idofproduct" value="{{$product->idprod}}" name="idofproduct">

                        <div class="form-group row">
                            <label for="typeprod" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                            <div class="col-md-6">
                            <select id="typeprod" type="text" class="form-control @error('typeprod') is-invalid @enderror" value="{{$product->typeprod}}" name="typeprod">
                                    <optgroup label="Clothing">
                                        <option value="headcover" @if($product->typeprod == 'headcover') selected @endif>Head Cover</option>
                                        <option value="jackets" @if($product->typeprod == 'jackets') selected @endif>Jackets</option>
                                        <option value="tshirts" @if($product->typeprod == 'tshirts') selected @endif>T Shirts</option>
                                        <option value="pants" @if($product->typeprod == 'pants') selected @endif>Pants</option>
                                        <option value="footwear" @if($product->typeprod == 'footwear') selected @endif>Foot Wear</option>
                                      </optgroup>
                                      <optgroup label="HouseItems">
                                        <option value="elec" @if($product->typeprod == 'elec') selected @endif>Electrics</option>
                                        <option value="furniture" @if($product->typeprod == 'furniture') selected @endif>Furniture</option>
                                      </optgroup>
                                      <optgroup label="Other">
                                        <option value="sports" @if($product->typeprod == 'sports') selected @endif>Sports Items</option>
                                        <option value="vehicules" @if($product->typeprod == 'vehicules') selected @endif>Vehicules</option>
                                      </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="colour" class="col-md-4 col-form-label text-md-right">{{ __('Colour') }}</label>

                            <div class="col-md-6">
                                <input id="colour" style="margin-left: 206px" type="color" class="form-control @error('colour') is-invalid @enderror" name="colour" value="{{$product->colour}}" required autocomplete="colour">
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
                                <input id="age" style="margin-left: 206px" type="date" class="form-control @error('age') is-invalid @enderror" value="{{$product->age}}" name="age">

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
                                <input id="startbid" style="margin-left: 206px" type="number" class="form-control @error('startbid') is-invalid @enderror" value="{{$product->startbid}}" name="startbid">
                                @error('startbid')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="productpic" class="col-md-4 col-form-label text-md-right">{{ __('Click HERE to Upload Updated Picture') }}</label>

                            <div class="col-md-6">
                                <input id="productupdatepic" type="file" class="form-control @error('productupdatepic') is-invalid @enderror" name="productupdatepic" value="{{$product->productpic}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="productpic" class="col-md-4 col-form-label text-md-right">{{ __('The Existing Picture') }}</label>

                            <div class="col-md-6" style="text-align: center">
                                
                                <input id="productpic" type="file" class="form-control @error('productpic') is-invalid @enderror" name="productupdatepic">    
                                <img  height="50%" width="50%" class="img-thumbnail" src="storage/productspics/{{$product->productpic}}" alt="Picture Of {{ Auth::user()->name }} Product With ID {{$product->idprod}}">
                              
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit Product') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
