@extends('layouts.app')
@section('style')
    <style>
        tr:nth-child(even){background-color: #efefefb3}
    </style>
@endsection
@section('content')
    {{--<div class="container-fluid m-0 p-0 mt-1">
        <div class="row col-lg-12 m-0 p-0">
            --}}{{--Sidebar--}}{{--
            @include('Admin.admin_sidebar.admin_sidebar')
            --}}{{--Main--}}{{--
            <main class="col-lg-12 ml-1 m-0 p-0" style="background-color: white !important;">
                <div class="col-lg-12 m-0 p-1 border-0">
                    <p>Welcome {{Auth::user()->role}}</p>
                </div>
            </main>
        </div>
    </div>--}}
    <div class="panel panel-default">
        <div class="panel-heading">
            <!--<h6 class="panel-title">Default panel</h6>-->
            <ul class="breadcrumb breadcrumb-caret position-right">
                <li><a href="{{('/admin/MainForm')}}" style="color: #2577e1;"><span>ទំព័រដើម</span></a></li>
                <li class="active"><span>ផ្ទាំងគ្រប់គ្រង</span></li>
                {{--<li class="active">Default collapsible</li>--}}
            </ul>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    {{--<li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>--}}
                </ul>
            </div>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
        </div>

        <div class="panel-body">
            <div class="col-md-3">
                <div class="panel" style="border-radius: 7px; background: red;box-shadow: 1px 3px 13px;">
                    <h4 style="text-align: center;color: white;"><b>ទំនិញក្នុងឃ្លាំង</b></h4>
                    <h5 style="text-align: center;font-size: 50px;color: white;"><b>0</b></h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel" style="background: #4ec9ea; border-radius: 7px;box-shadow: 1px 3px 13px;">
                    <h4 style="text-align: center;"><b>ទំនិញចូល</b></h4>
                    <h5 style="text-align: center;font-size: 50px;"><b>0</b></h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel" style="border-radius: 7px;background: #c1fb3f;box-shadow: 1px 3px 13px;">
                    <h4 style="text-align: center;"><b>ទំនិញចេញ</b></h4>
                    <h5 style="text-align: center;font-size: 50px;"><b>0</b></h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel" style="border-radius: 7px;background: #ffac1d;box-shadow: 1px 3px 13px;">
                    <h4 style="text-align: center;"><b>ចំណូល</b></h4>
                    <h5 style="text-align: center;font-size: 50px;"><b>0</b></h5>
                </div>
            </div>

            <legend style="font-size: 17px;"><b>គំណត់ត្រារបាយការណ៌ប្រចាំថ្ងៃ</b></legend>
            <div class="col-md-3">
                <span>ជ្រើសរើសថ្ងៃចាប់ផ្តើម</span><input type="date" class="form-control" placeholder="ជ្រើសរើសថ្ងៃ">
            </div>
            <div class="col-md-3">
                <span>ជ្រើសរើសថ្ងៃរហូតដល់</span><input type="date" class="form-control" placeholder="ជ្រើសរើសថ្ងៃ">
            </div>
            <a class="btn btn-primary btn-Search" style="margin-top: 19px;"><i class="icon-search4 position-left"></i>ធ្វើការស្វែងរក</a>
            <br/><br/>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table" style="background: #9aa6abb3;color: black;" id="table_show_frontEnd">
                        <thead style="font-size: 15px;">
                        <tr class="bg-indigo-600" style="background: #37474F;color: #fcfcfc;">
                            <th><b>ការបរិច្ឆេត</b></th>
                            <th><b>ទំនិញចូល</b></th>
                            <th><b>ទំនិញចេញ</b></th>
                            <th><b>ចំណូល</b></th>
                        </tr>
                        </thead>
                        <tbody style="font-size: 14px;">
                        <tr>
                            <td><b>1/9/2018</b></td>
                            <td><b>0</b></td>
                            <td><b>0</b></td>
                            <td><b>0</b></td>
                        </tr>
                        <tr>
                            <td><b>30/8/2018</b></td>
                            <td><b>1</b></td>
                            <td><b>2</b></td>
                            <td><b>3</b></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>

    </script>
@endsection
