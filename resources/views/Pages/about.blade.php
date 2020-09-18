@extends('layouts.extrapp3')

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Who Are We ?</h4>
          <p class="card-category">get to know us</p>
        </div>
        <div class="card-body">
          <div id="typography">
            <div class="row">
            <div class="col-md-8">
            <p style="font-size:18px;">We are a group of people who believe that second hand purchase is the best solution in Tunisia for various reasons; it is way less expensive and more profitable for both the governement and the consumer because it reduces costs of manifacturing, eliminates various environnemental hazards, and it provides a sustainable life cycle for the clothing items.</p>
            
            </div>
            <div class="col-md-4">
                <div style="padding-left:50px">
                <img  height="100px" width="200px" class="img-thumbnail" src="storage/staticdisplay/sdg12.jpg" alt="Picture">
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
              <h4 class="card-title">Meet Our Team</h4>
              <p class="card-category">Get To know Us !</p>
            </div>
            <div class="card-body">
              <div class="container">
          
                <div class="row">
                  <div class="col-md-4">
                    <div class="card card-chart">
                      <div class="card-header">
                        <div><img  height="150px" width="300px" class="img-thumbnail" src="storage/staticdisplay/teampic1.jpg" alt="Picture"></div>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">Jack Sparrow</h5>
                        <p class="card-category"><i class="fa fa-user"></i> Function: Full-Stack Developper</p>
                      </div>
                      <div class="card-footer">
                        <div class="stats">
                          <i class="material-icons">access_time</i> started last month
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card card-chart">
                      <div class="card-header">
                        <div><img  height="150px" width="300px" class="img-thumbnail" src="storage/staticdisplay/teampic2.jpg" alt="Picture"></div>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">Jack Black</h5>
                        <p class="card-category"><i class="fa fa-user"></i> Function: Back-end Developper</p>
                      </div>
                      <div class="card-footer">
                        <div class="stats">
                          <i class="material-icons">access_time</i> started last month
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card card-chart">
                      <div class="card-header">
                        <div><img  height="150px" width="300px" class="img-thumbnail" src="storage/staticdisplay/teampic3.jpg" alt="Picture"></div>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">jack Parker</h5>
                        <p class="card-category"><i class="fa fa-user"></i> Function: UI/UX Expert</p>
                      </div>
                      <div class="card-footer">
                        <div class="stats">
                          <i class="material-icons">access_time</i> started last month
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="row justify-content-center">
        <div class="col-md-10">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Our Activities</h4>
          <p class="card-category">Take a look at our activities</p>
        </div>
        <div class="card-body">
  <div id="carouselExampleCaptions" style="width: 90%; margin:0 auto;"  class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="storage/staticdisplay/conference1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Tunisia Conference</h5>
          <p>2020</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="storage/staticdisplay/conference2.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Italy Conference</h5>
          <p>2022</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="storage/staticdisplay/conference3.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Morocco Conference</h5>
          <p>2024</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
</div>
</div>
</div>
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