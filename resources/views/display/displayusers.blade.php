@extends('layouts.extrapp3')

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">These are the users on the platform , {{Auth::user()->name}} !</h4>
              <p class="card-category">Feel free to check their products !</p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>User Name</th>
                    <th>Gender</th>
                    <th>Birthday</th>
                    <th>Phone number</th>
                    <th>Email</th>
                    <th>Area</th>
                    <th>Products</th>
                  </thead>
                  @foreach ($displayusers as $user)
    <tbody>
        <tr>

            <td>{{$user->name}}</td>
            <td>{{$user->gender}}</td>
            <td>{{$user->birthday}}</td>
            <td>{{$user->phonenumber}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->area}}</td>
            <!--add view products buttons-->
            <td><form method="GET" action="{{route('user.products')}}">
                <input type="hidden" id="idutilisateur" value="{{$user->id}}" name="idutilisateur">
                <button type="submit" class="btn btn-success btn-sm @error('idutilisateur') is-invalid @enderror">
                    {{ __('View Products') }}
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
@endsection