@extends('layouts.extrapp3')

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Review Offers That You Made , {{Auth::user()->name}} !</h4>
              <p class="card-category">This table contains products that you offered. Don't miss good chances !</p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>Name of Seller</th>
                    <th>Birthday</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Type</th>
                    <th>First Usage</th>
                    <th>Colour</th>
                    <th>Start bid</th>
                    <th>Offer Value</th>
                    <th>Added Value</th>
                    <th>All Bids</th>
                  </thead>
                  @foreach ($offers as $offer)
    <tbody>
        <tr>
            <td>{{$offer->name}}</td>
            <td>{{$offer->birthday}}</td>
            <td>{{$offer->gender}}</td>
            <td>{{$offer->email}}</td>
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
@endsection