@extends('layouts.extrapp3')

@section('content')
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modify your info') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('user.update')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <select id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ $updateuser->gender}}" required autocomplete="gender">
                                    <option value="male" @if($updateuser->gender == 'male') selected @endif>Male</option>
                                    <option value="female" @if($updateuser->gender == 'female') selected @endif>Female</option>
                                    <option value="other" @if($updateuser->gender == 'other') selected @endif>Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>

                            <div class="col-md-6">
                                <input id="birthday" style="margin-left: 206px" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ $updateuser->birthday }}" required autocomplete="birthday">

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
                                <input id="phonenumber" style="margin-left: 206px" type="tel" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" value="{{ $updateuser->phonenumber }}" pattern="/^+216(2\d|3\d|4\d|5\d||7\d||9\d|)\d{7}$/">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>

                            <div class="col-md-6">
                                <select id="area" type="text" class="form-control @error('area') is-invalid @enderror" name="area" value="{{ $updateuser->birthday }}">
                                    <optgroup label="NorthEast">
                                        <option value="tunis" @if($updateuser->area == 'tunis') selected @endif>Tunis</option>
                                        <option value="nabeul" @if($updateuser->area == 'nabeul') selected @endif>Nabeul</option>
                                        <option value="zaghouan" @if($updateuser->area == 'zaghouan') selected @endif>Zaghouan</option>
                                        <option value="bizerte" @if($updateuser->area == 'bizerte') selected @endif>Bizerte</option>
                                        <option value="mannouba" @if($updateuser->area == 'mannouba') selected @endif>Mannouba</option>
                                        <option value="benarous" @if($updateuser->area == 'benarous') selected @endif>Ben Arous</option>
                                        <option value="ariana" @if($updateuser->area == 'ariana') selected @endif>Ariana</option>
                                      </optgroup>
                                      <optgroup label="NorthWest">
                                        <option value="beja" @if($updateuser->area == 'beja') selected @endif>Béja</option>
                                        <option value="jendouba" @if($updateuser->area == 'jendouba') selected @endif>Jendouba</option>
                                        <option value="siliana" @if($updateuser->area == 'siliana') selected @endif>Siliana</option>
                                        <option value="kef" @if($updateuser->area == 'kef') selected @endif>Kèf</option>
                                      </optgroup>
                                      <optgroup label="CentreEast">
                                        <option value="sousse" @if($updateuser->area == 'sousse') selected @endif>Sousse</option>
                                        <option value="monastir" @if($updateuser->area == 'monastir') selected @endif>Monastir</option>
                                        <option value="mahdia" @if($updateuser->area == 'mahdia') selected @endif>Mahdia</option>
                                        <option value="sfax" @if($updateuser->area == 'sfax') selected @endif>Sfax</option>
                                      </optgroup>
                                      <optgroup label="CentreWest">
                                        <option value="kairouan" @if($updateuser->area == 'kairouan') selected @endif>Kairouan</option>
                                        <option value="sidibouzid" @if($updateuser->area == 'sidibouzid') selected @endif>Sidi Bouzid</option>
                                        <option value="kasserine" @if($updateuser->area == 'kasserine') selected @endif>Kasserine</option>
                                      </optgroup>
                                      <optgroup label="SouthEast">
                                        <option value="mednine" @if($updateuser->area == 'mednine') selected @endif>Mednine</option>
                                        <option value="gabes" @if($updateuser->area == 'gabes') selected @endif>Gabès</option>
                                        <option value="tataouine" @if($updateuser->area == 'tataouine') selected @endif>Tataouine</option>
                                      </optgroup>
                                      <optgroup label="SouthWest">
                                        <option value="tozeur" @if($updateuser->area == 'tozeur') selected @endif>Tozeur</option>
                                        <option value="kebili" @if($updateuser->area == 'kebili') selected @endif>Kebili</option>
                                        <option value="gafsa" @if($updateuser->area == 'gafsa') selected @endif>Gafsa</option>
                                      </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="userpic" class="col-md-4 col-form-label text-md-right">{{ __('Picture') }}</label>

                            <div class="col-md-6">
                                <input id="userupdatepic" type="file" class="form-control @error('userupdatepic') is-invalid @enderror" name="userupdatepic" value="{{$updateuser->userpic}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="userpic" class="col-md-4 col-form-label text-md-right">{{ __('Click HERE to Upload Updated Picture') }}</label>

                            <div class="col-md-6" style="text-align: center">
                                
                                <input id="userpic" type="file" class="form-control @error('userpic') is-invalid @enderror" name="userupdatepic">    
                                <img  height="50%" width="50%" class="img-thumbnail" src="storage/userspics/{{$updateuser->userpic}}" alt="Picture Of {{ Auth::user()->name }}">
                            
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
    <br><br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Delete Your Profile') }}</div>
                    <div class="card-body">
                        <div class="alert alert-danger" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <span class="sr-only">Error:</span>
                            <i class="fa fa-warning"></i>
                            Deleting your profile will result in the loss of all your products and offers, thus restoring your data is IMPOSSIBLE !
                          </div>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{route('user.destructor')}}">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm btn-danger">
                                <i class="fa fa-trash-o"></i>{{ __(' Delete Account') }}
                            </button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
