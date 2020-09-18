@extends('layouts.extrapp3')

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              @if ( count($offers) != 0 )
              <h4 class="card-title ">These are the offers on product with ID {{$offers->first()->idprod}} , {{Auth::user()->name}}</h4>
              <p class="card-category">Feel free to check their offers</p>
            @else
            <h4 class="card-title ">There are no offers on this product , {{Auth::user()->name}}</h4>
            <p class="card-category">Feel free to make one</p>
            @endif
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    @if ( count($offers) != 0 )
                    <h3>Offers on product with ID {{$offers->first()->idprod}}</h3>
                    <br> 
                     <table class="table">
                         <thead>
                             <tr>
                                 <th>Name of Bidder</th>
                                 <th>Gender</th>
                                 <th>Phone Number</th>
                                 <th>Email</th>
                                 <th>Area</th>
                                 <th>Offer Value</th>
                                 <th>Bid time</th>
                             </tr>
                         </thead>
                     @foreach ($offers as $offer)
                     <tbody>
                         <tr>
                             <td>{{$offer->name}}</td>
                             <td>{{$offer->gender}}</td>
                             <td>{{$offer->phonenumber}}</td>
                             <td>{{$offer->email}}</td>
                             <td>{{$offer->area}}</td>
                             <td>{{$offer->offervalue}}</td>
                             <td>{{$offer->created_at}}</td>
                         </tr>
                     </tbody>
                     @endforeach
                 </table>
                    @else
                        <h1>No Offers !</h1>
                    @endif
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
@endsection