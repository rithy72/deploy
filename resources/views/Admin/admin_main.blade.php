@extends('layouts.app')
@section('style')
    <style>
        /*tr:nth-child(even){background-color: rgba(245, 206, 231, 0.7)}*/
        #table_show_frontEnd {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table_show_frontEnd td, #table_show_frontEnd th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table_show_frontEnd tr:nth-child(even){background-color: #f2f2f2;}
        td {  height: 35px;  }
        #table_show_frontEnd tr:hover {background-color: #ddd;}

        #table_show_frontEnd th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #37474F;
            color: white;
        }
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
                <div class="panel" style="border-radius: 7px; background: #156b18b3;box-shadow: 1px 3px 13px;">
                    <h4 style="text-align: center;color: white;"><b>ទំនិញក្នុងឃ្លាំង</b></h4>
                    <h5 style="text-align: center;font-size: 50px;color: white;"><b>0</b></h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel" style="background: #3179f5cc; border-radius: 7px;box-shadow: 1px 3px 13px;">
                    <h4 style="text-align: center;color: white;"><b>ទំនិញចូល</b></h4>
                    <h5 style="text-align: center;font-size: 50px; color: white;"><b>0</b></h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel" style="border-radius: 7px;background: #993616e6;box-shadow: 1px 3px 13px;">
                    <h4 style="text-align: center;color: white;"><b>ទំនិញចេញ</b></h4>
                    <h5 style="text-align: center;font-size: 50px;color: white;"><b>0</b></h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel" style="border-radius: 7px;background: #f38b26cc;box-shadow: 1px 3px 13px;">
                    <h4 style="text-align: center;color: white;"><b>ចំណូល</b></h4>
                    <h5 style="text-align: center;font-size: 50px;color: white;"><b>0</b></h5>
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
            {{--<div class="col-md-12">
                <div class="table-responsive">
                    <table class="table" id="table_show_frontEnd">--}}{{--style="background: #9aa6abb3;color: black;"--}}{{--
                        <thead style="font-size: 15px;">
                        <tr class="bg-indigo-600">--}}{{--style="background: #37474F;color: #fcfcfc;"--}}{{--
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
            </div>--}}



            <div class="datatable-header" style="margin-top: -30px;"></div>
            <div class="datatable-scroll">
                <div class="dataTables_scroll">
                    <!--============ scroll body oy trov 1 header table ===============-->
                    <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">
                        <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_Country" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                            <thead style="background: #e3e3ea99;">
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending"><b>ការបរិច្ឆេត</b></th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending"><b>ទំនិញចូល</b></th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending"><b>ទំនិញចេញ</b></th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending"><b>ចំណូល </b></th>
                            </tr>
                            </thead>
                            <tbody>
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
            {{--========================= footer of pagination ====================--}}
            <div class="datatable-footer"><div class="dataTables_info" id="DataTables_Table_3_info" role="status" aria-live="polite">Showing 1 to 10 of 15 entries</div><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_3_paginate"><a class="paginate_button previous disabled" aria-controls="DataTables_Table_3" data-dt-idx="0" tabindex="0" id="DataTables_Table_3_previous">←</a><span><a class="paginate_button current" aria-controls="DataTables_Table_3" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="DataTables_Table_3" data-dt-idx="2" tabindex="0">2</a></span><a class="paginate_button next" aria-controls="DataTables_Table_3" data-dt-idx="3" tabindex="0" id="DataTables_Table_3_next">→</a></div></div>
            {{--====================== End footer of pagination ====================--}}
        </div>
    </div>

@endsection

@section('script')
    <script>

    </script>
@endsection
