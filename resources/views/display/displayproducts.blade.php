@extends('layouts.extrapp3')

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">These are the products on the platform , {{Auth::user()->name}} !</h4>
              <p class="card-category">Feel free to check them out !</p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>Seller Name</th>
                <th>Type</th>
                <th>Colour</th>
                <th>Start bid</th>
                <th>Area</th>
                <th>State</th>
                <th colspan="3">Action</th>
                  </thead>
                  @foreach ($displayproducts as $prod)
                  <tbody>
                      <tr>
                          <td>{{$prod->name}}</td>
                          <td>{{$prod->typeprod}}</td>
                          <td><button style="background-color: {{$prod->colour}}; color: {{$prod->colour}}; height: 16px; width:80px; margin-top:12px"></button></td>
                          <td>{{$prod->startbid}}</td>
                          <td>{{$prod->area}}</td>
                          @if ((string)$prod->sold == '1')
                          <td><font color="red">Sold</font></td>
                          @else
                          <td><font color="green">Unsold</font></td>
                          @endif
                          <td><form method="GET" action="{{route('product.onedisplay')}}">
                              <input type="hidden" id="idproduit" value="{{$prod->idprod}}" name="idproduit">
                              <button type="submit" class="btn btn-success btn-sm @error('idproduit') is-invalid @enderror">
                                  {{ __('View') }}
                              </button>
                              </form></td>
                          @if($prod->idseller == Auth::id() && (string)$prod->sold != '1')
                              <td><form method="GET" action="{{route('product.prepareUpdate')}}">
                                  <input type="hidden" id="idproduct" value="{{$prod->idprod}}" name="idproduct">
                                  <button type="submit" class="btn btn-warning btn-sm @error('idproduct') is-invalid @enderror">
                                      {{ __('Edit') }}
                                  </button>
                                  </form></td>
                              <td><form method="POST" action="{{route('product.delete')}}">
                                  @csrf
                                  <input type="hidden" id="idproducte" value="{{$prod->idprod}}" name="idproducte">
                                  <button type="submit" class="btn btn-danger btn-sm @error('idproducte') is-invalid @enderror">
                                      {{ __('Delete') }}
                                  </button>
                                  </form></td>
                          @else
                          <td><form method="GET" action="{{route('product.prepareUpdate')}}">
                              <input type="hidden" id="idproduct" value="{{$prod->idprod}}" name="idproduct">
                              <button type="submit" class="btn btn-warning btn-sm @error('idproduct') is-invalid @enderror" disabled>
                                  {{ __('Edit') }}
                              </button>
                              </form></td>
                          <td><form method="POST" action="{{route('product.delete')}}">
                              @csrf
                              <input type="hidden" id="idproducte" value="{{$prod->idprod}}" name="idproducte">
                              <button type="submit" class="btn btn-danger btn-sm @error('idproducte') is-invalid @enderror" disabled>
                                  {{ __('Delete') }}
                              </button>
                              </form></td>
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