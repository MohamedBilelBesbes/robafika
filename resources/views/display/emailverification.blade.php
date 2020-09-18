@extends('layouts.extrapp3')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Email Verification') }}</div>

                <div class="card-body">
                    <div class="alert alert-danger" role="alert">
                        We sent to you a verification email. In order to continue your rgistration process, please care to check your inbox and click on the provided link
                      </div>
                    <form method="GET" action="{{ route('email.verification') }}">
                        @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Resend Email') }}
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