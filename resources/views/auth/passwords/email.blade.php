{{--@extends('layouts.app')--}}

{{--@section('content')--}}
<html>
<header>
    <meta charset="UTF-8">
    <title>@lang('string.com_name')</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    {{--<link href="{{asset('/assets/css/icons/icomoon/styles.css')}}" rel="stylesheet">--}}
    {{--<link href="{{asset('/assets/css/bootstrap.css')}}" rel="stylesheet">--}}
    {{--<link href="{{asset('/assets/css/core.css')}}" rel="stylesheet">--}}
    {{--<link href="{{asset('/assets/css/components.css')}}" rel="stylesheet">--}}
    {{--<link href="{{asset('/assets/css/colors.css')}}" rel="stylesheet">--}}
    {{--<link rel="stylesheet" type="text/css" href="{{asset('/assets/css/extras/animate.min.css')}}">--}}
    {{--<link rel="stylesheet" href="{{ asset('/css/style.css') }}">--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    @yield('style')
    <style>
        .box {
            height: 90vh;
            overflow-y: auto;
        }
        body {
            font-family: 'Khmer OS Battambang', sans-serif; !important;
        }
    </style>
</header>
<body>
<div class="page-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

{{--@endsection--}}
