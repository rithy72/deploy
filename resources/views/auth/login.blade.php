<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login User</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pawn Shop</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href = {{ asset("bootstrap/css/bootstrap.css") }} rel="stylesheet" />

    <link href="{{asset('/assets/css/icons/icomoon/styles.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/core.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/components.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/colors.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/extras/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>
<body>

</body>
</html>

<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top: 55px;">
            <div class="card" style="box-shadow: 0px 1px 7px 0px;">
                @if(!empty(\Illuminate\Support\Facades\Auth::user()))
                    @if(\Illuminate\Support\Facades\Auth::user()->just_updated)
                        <div class="alert alert-success alert-dismissible fade in">
                            <a class="close" data-dismiss="alert" aria-label="close" style="margin-right: 24px">x</a>
                            <p style="margin-top: 5px">@lang('string.profile_been_change_login_again')</p>
                        </div>
                    @endif
                @endif
                    <div class="card-header">{{ __('ចូលប្រើប្រាស់ប្រព័ន្ឋ') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('ចូលប្រើប្រាស់ប្រព័ន្ឋ') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('គណនេយ្យ') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('លេខសម្ងាត់') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{----}}

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ចូលប្រើប្រាស់') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
