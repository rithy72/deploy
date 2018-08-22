@extends('layouts.app')

@section('content')
    <div class="container-fluid m-0 p-0 mt-1">

        <div class="row col-lg-12 m-0 p-0">
            {{--Sidebar--}}
            @include('Admin.admin_sidebar.admin_sidebar')
            {{--Main--}}
            <main class="col-lg-12 ml-1 m-0 p-0" style="background-color: white !important;">
                <div class="col-lg-12 m-0 p-1 border-0">
                    <p>Welcome {{Auth::user()->role}}</p>
                </div>
            </main>

        </div>

    </div>


@endsection
