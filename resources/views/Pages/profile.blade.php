@extends('layouts.extrapp3')

@section('content')
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Put your info') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('user.profile')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <select id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>

                            <div class="col-md-6">
                                <input id="birthday" style="margin-left: 206px" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" required autocomplete="birthday">

                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phonenumber" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phonenumber" style="margin-left: 206px" type="tel" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" pattern="/^+216(2\d|3\d|4\d|5\d||7\d||9\d|)\d{7}$/">                                
                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>

                            <div class="col-md-6">
                                <select id="area" type="text" class="form-control @error('area') is-invalid @enderror" name="area">
                                    <optgroup label="NorthEast">
                                        <option value="tunis">Tunis</option>
                                        <option value="nabeul">Nabeul</option>
                                        <option value="zaghouan">Zaghouan</option>
                                        <option value="bizerte">Bizerte</option>
                                        <option value="mannouba">Mannouba</option>
                                        <option value="benarous">Ben Arous</option>
                                        <option value="ariana">Ariana</option>
                                      </optgroup>
                                      <optgroup label="NorthWest">
                                        <option value="beja">Béja</option>
                                        <option value="jendouba">Jendouba</option>
                                        <option value="siliana">Siliana</option>
                                        <option value="kef">Kèf</option>
                                      </optgroup>
                                      <optgroup label="CentreEast">
                                        <option value="sousse">Sousse</option>
                                        <option value="monastir">Monastir</option>
                                        <option value="mahdia">Mahdia</option>
                                        <option value="sfax">Sfax</option>
                                      </optgroup>
                                      <optgroup label="CentreWest">
                                        <option value="kairouan">Kairouan</option>
                                        <option value="sidibouzid">Sidi Bouzid</option>
                                        <option value="kasserine">Kasserine</option>
                                      </optgroup>
                                      <optgroup label="SouthEast">
                                        <option value="mednine">Mednine</option>
                                        <option value="gabes">Gabès</option>
                                        <option value="tataouine">Tataouine</option>
                                      </optgroup>
                                      <optgroup label="SouthWest">
                                        <option value="tozeur">Tozeur</option>
                                        <option value="kebili">Kebili</option>
                                        <option value="gafsa">Gafsa</option>
                                      </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                                    <label for="userpic" class="col-md-4 col-form-label text-md-right">{{ __('Click HERE to Upload Picture') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="userpic" type="file" class="form-control @error('userpic') is-invalid @enderror" name="userpic">
                                    </div>
                                </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Commit') }}
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
