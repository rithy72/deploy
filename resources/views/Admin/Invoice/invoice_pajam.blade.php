@extends('layouts.app')
@section('style')
    <style>
        /*tr:nth-child(even){background-color: #efefefb3}*/
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

        #table_show_frontEnd tr:hover {background-color: #ddd;}
        td {  height: 35px;  }
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
    <div class="panel panel-default">
        <div class="panel-heading">
            <!--<h6 class="panel-title">Default panel</h6>-->
            <ul class="breadcrumb breadcrumb-caret position-right">
                <li><a href="{{('/admin/MainForm')}}" style="color: #2577e1;"><span>ទំព័រដើម</span></a></li>
                <li class="active"><span>វិក័យបត្រ</span></li>
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

            <div class="col-md-2">
                <span>ស្វែងរកតាម ៖</span>
                <div class="form-group">
                    <select class="form-control" id="" name="">
                        <option selected="selected"></option>
                        <option selected="">លេខវិក្ក័យបត្រ</option>
                        <option selected="">ឈ្មោះអតិថិជន</option>
                        <option selected="">លេខទូរស័ព្ទ</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <span>ស្ថានភាព ៖</span>
                <div class="form-group">
                    <select class="form-control" id="" name="">
                        <option selected="selected"></option>
                        <option selected="">មិនទាន់លួួស</option>
                        <option selected="">ដាច់</option>
                        <option selected="">ទូទាត់រួច</option>
                        <option selected="">ទាំអស់</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <span>.</span><input type="text" class="form-control" placeholder="ស្វែងរកវត្ថុ">
            </div>
            <a class="btn btn-primary btn-Search" style="margin-top: 19px;"><i class="icon-search4 position-left"></i>ធ្វើការស្វែងរក</a>


            <div class="dataTables_length" id="DataTables_Table_3_length" style="margin-top: 19px;">
                <a href="{{('/admin/Invoice/CreateNewInvoice')}}" class="btn btn-success createNewCountry"><i class="icon-add position-left"></i>បង្កើតវិក័្កយបត្រថ្មី</a>
            </div>


            <br/><br/>
            {{--<div class="col-md-12">
                <div class="table-responsive">
                    <table class="table DataTables" id="table_show_frontEnd">--}}{{--style="background: #9aa6abb3;color: black;"--}}{{--
                        <thead style="font-size: 15px;">
                        <tr class="bg-indigo-600" >--}}{{--style="background: #37474F;color: #fcfcfc;"--}}{{--
                            <th><b>វិក័យបត្រ</b></th>
                            <th><b>ឈ្មោះអតិថិជន</b></th>
                            <th><b>លេខទូរសព្ទ័</b></th>
                            <th><b>ទឹកប្រាក់</b></th>
                            <th><b>ការប្រាក់</b></th>
                            <th><b>ទំនិញ</b></th>
                            <th><b>ថ្ងៃទទួល</b></th>
                            <th><b>ថ្ងៃផុតកំណត់</b></th>
                            <th><b>ស្ថានភាព</b></th>
                            <th><b>សកម្មភាព</b></th>
                        </tr>
                        </thead>
                        <tbody style="font-size: 14px;">
                        <tr>
                            <td><b>000002</b></td>
                            <td><b>កុយ</b></td>
                            <td><b>012185693</b></td>
                            <td><b>20$</b></td>
                            <td><b>10%</b></td>
                            <td><b>2</b></td>
                            <td><b>2/9/2018</b></td>
                            <td><b>2/10/2018</b></td>
                            <td><b>មិនទាន់ទូទាត់</b></td>
                            <td class="text-center">
                                <ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-uxpanded="false">
                                        <i class="icon-menu9"></i>
                                        </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li id="updates_currency"><a><i class="icon-pencil7"></i>កែប្រែ</a></li>
                                        <li id="updateRateChange"><a><i class="icon-price-tag"></i>បង់ប្រាក់</a></li>
                                        <li id="detail_currency"><a><i class="icon-certificate"></i>ចូលមើល</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td><b>000003</b></td>
                            <td><b>កុយចេះ</b></td>
                            <td><b>012185000</b></td>
                            <td><b>25$</b></td>
                            <td><b>15%</b></td>
                            <td><b>5</b></td>
                            <td><b>5/9/2018</b></td>
                            <td><b>5/10/2018</b></td>
                            <td><b>ទូទាត់រួច</b></td>
                            <td class="text-center">
                                <ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-uxpanded="false">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li id="updates_currency"><a><i class="icon-pencil7"></i>កែប្រែ</a></li>
                                            <li id="updateRateChange"><a><i class="icon-price-tag"></i>បង់ប្រាក់</a></li>
                                            <li id="detail_currency"><a><i class="icon-certificate"></i>ចូលមើល</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>--}}


            <div class="datatable-header" style="margin-top: -30px;"></div>
            <div class="datatable-scroll" style="overflow-x: hidden;">
                <div class="dataTables_scroll">
                    <!--============ scroll body oy trov 1 header table ===============-->
                    <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">
                        <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_Country" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                            <thead style="background: #e3e3ea99;">
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">វិក័យបត្រ</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">ឈ្មោះអតិថិជន</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">លេខទូរសព្ទ័</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">ទឹកប្រាក់</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">ការប្រាក់</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">ទំនិញ</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">ថ្ងៃទទួល</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">ថ្ងៃផុតកំណត់</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">ស្ថានភាព</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">សកម្មភាព</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>000002</td>
                                <td>កុយ</td>
                                <td>012185693</td>
                                <td>20$</td>
                                <td>10%</td>
                                <td>2</td>
                                <td>2/9/2018</td>
                                <td>2/10/2018</td>
                                <td>មិនទាន់ទូទាត់</td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-uxpanded="false">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li id="updates_currency"><a href="{{('/admin/Invoice/UpdateInvoice')}}"><i class="icon-pencil7"></i>កែប្រែ</a></li>
                                                <li id="updateRateChange"><a href="{{('/admin/Invoice/PaymentInvoice')}}"><i class="icon-price-tag"></i>បង់ប្រាក់</a></li>
                                                <li id="detail_currency"><a href="{{('/admin/Invoice/DetailInvoice')}}"><i class="icon-certificate"></i>ចូលមើល</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>000003</td>
                                <td>កុយចេះ</td>
                                <td>012185000</td>
                                <td>25$</td>
                                <td>15%</td>
                                <td>5</td>
                                <td>5/9/2018</td>
                                <td>5/10/2018</td>
                                <td>ទូទាត់រួច</td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-uxpanded="false">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li id="updates_currency"><a href="{{('/admin/Invoice/UpdateInvoice')}}"><i class="icon-pencil7"></i>កែប្រែ</a></li>
                                                <li id="updateRateChange"><a href="{{('/admin/Invoice/PaymentInvoice')}}"><i class="icon-price-tag"></i>បង់ប្រាក់</a></li>
                                                <li id="detail_currency"><a href="{{('/admin/Invoice/DetailInvoice')}}"><i class="icon-certificate"></i>ចូលមើល</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
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
        /*$("#selectSaPerPoun").select2({

        });*/
    </script>
@endsection
