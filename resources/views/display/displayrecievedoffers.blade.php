@extends('layouts.extrapp3')

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Review Offers That You Recieved , {{Auth::user()->name}} !</h4>
              <p class="card-category">This table contains offers that you recieved. Don't miss good chances !</p>
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
                  @foreach ($offers as $offer)
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
@endsection