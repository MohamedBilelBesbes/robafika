@extends('layouts.extrapp3')

@section('content')
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Put your info') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('product.profile')}}" enctype="multipart/form-data">
                        @csrf

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
                                <input id="colour" style="margin-left: 206px" type="color" class="form-control @error('colour') is-invalid @enderror" name="colour" value="{{ old('colour') }}" required autocomplete="colour">
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
                                <input id="startbid" style="margin-left: 206px" type="number" class="form-control @error('startbid') is-invalid @enderror" name="startbid">
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
</div>
@endsection
