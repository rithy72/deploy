@extends('layouts.app')

@section('content')
    <div class="container-fluid m-0 p-0 mt-1">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{json_encode(Auth::user())}}}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Front Desk
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
