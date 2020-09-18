@extends('layouts.extrapp3')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Email Is Verified') }}</div>

                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        Your Email has been verified! Please care to continue the registration process by clicking the button below
                      </div>
                    <form method="GET" action="{{ route('get.userprofile') }}">
                        @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Make Profile') }}
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