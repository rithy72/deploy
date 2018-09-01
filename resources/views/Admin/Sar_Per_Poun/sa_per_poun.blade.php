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
                <li class="active"><span>សារពើភ័ណ្ឌ</span></li>
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
            <div class="dataTables_length" id="DataTables_Table_3_length" style="margin-top: 19px;">
                <a class="btn btn-success" id="createTomNagn"><i class="icon-add position-left"></i>បង្កើតប្រភេទទំនិញថ្មី</a>
            </div>

            <div class="col-md-2">
                <span>ប្រភេទទំនិញ៖</span>
                <div class="form-group">
                    <select class="form-control" id="selectTomNanh" name="">
                        <option selected="selected"></option>
                        <option selected="selected">005586 SE</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <span>ស្ថានភាព</span>
                <div class="form-group">
                    <select class="form-control" id="" name="">
                        <option selected="selected"></option>
                        <option selected="">ទាំអស់</option>
                        <option selected="">លួសហើយ</option>
                        <option selected="">មិនទានលួស</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <span>.</span><input type="text" class="form-control" placeholder="ស្វែងរកវត្ថុ">
            </div>
            <a class="btn btn-primary btn-Search" style="margin-top: 19px;"><i class="icon-search4 position-left"></i>ធ្វើការស្វែងរក</a>

            <br/><br/>

            {{--<div class="col-md-12">--}}
                {{--<div class="table-responsive">--}}
                    {{--<table class="table DataTables" id="table_show_frontEnd">--}}{{--style="background: #9aa6abb3;color: black;"--}}
                        {{--<thead style="font-size: 15px;">--}}
                        {{--<tr class="bg-indigo-600" >--}}{{--style="background: #37474F;color: #fcfcfc;"--}}
                            {{--<th><b>វិក័យបត្រ</b></th>--}}
                            {{--<th><b>ឈ្មោះអតិថិជន</b></th>--}}
                            {{--<th><b>លេខទូរសព្ទ័</b></th>--}}
                            {{--<th><b>ប្រភេទទំនិញ</b></th>--}}
                            {{--<th><b>កំនត់សំគាល់ ១</b></th>--}}
                            {{--<th><b>កំនត់សំគាល់ ២</b></th>--}}
                            {{--<th><b>កំនត់សំគាល់ ៣</b></th>--}}
                            {{--<th><b>ថ្ងៃចូល</b></th>--}}
                            {{--<th><b>ថ្ងៃចេញ</b></th>--}}
                            {{--<th><b>ស្ថានភាព</b></th>--}}
                            {{--<th><b>សកម្មភាព</b></th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody style="  font-size: 14px;">--}}
                        {{--<tr>--}}
                            {{--<td><b>000002</b></td>--}}
                            {{--<td><b>កុយ</b></td>--}}
                            {{--<td><b>012185693</b></td>--}}
                            {{--<td><b>ម៉ូតូ</b></td>--}}
                            {{--<td><b>ស្លាកលេខ</b></td>--}}
                            {{--<td><b>ព៌ណ</b></td>--}}
                            {{--<td><b>Dream 2017</b></td>--}}
                            {{--<td><b>2/10/2018</b></td>--}}
                            {{--<td><b>3/11/2019</b></td>--}}
                            {{--<td><b>មិនទាន់ទូទាត់</b></td>--}}
                            {{--<td class="text-center">--}}
                                {{--<ul class="icons-list">--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-uxpanded="false">--}}
                                            {{--<i class="icon-menu9"></i>--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu dropdown-menu-right">--}}
                                            {{--<li id="updates_currency"><a><i class="icon-arrow-up52"></i>លក់ចេញ</a></li>--}}
                                            {{--<li id="updateRateChange"><a><i class="icon-price-tag"></i>បង់ប្រាក់</a></li>--}}
                                            {{--<li id="detail_currency"><a><i class="icon-certificate"></i>ចូលមើល</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td><b>000003</b></td>--}}
                            {{--<td><b>កុយចេះ</b></td>--}}
                            {{--<td><b>012185000</b></td>--}}
                            {{--<td><b>ឡាន</b></td>--}}
                            {{--<td><b>ទំហំ</b></td>--}}
                            {{--<td><b>..</b></td>--}}
                            {{--<td><b>..</b></td>--}}
                            {{--<td><b>5/10/2018</b></td>--}}
                            {{--<td><b>6​/11/2018</b></td>--}}
                            {{--<td><b>ទូទាត់រួច</b></td>--}}
                            {{--<td class="text-center">--}}
                                {{--<ul class="icons-list">--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-uxpanded="false">--}}
                                            {{--<i class="icon-menu9"></i>--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu dropdown-menu-right">--}}
                                            {{--<li id="updates_currency"><a><i class="icon-arrow-up52"></i>លក់ចេញ</a></li>--}}
                                            {{--<li id="updateRateChange"><a><i class="icon-price-tag"></i>បង់ប្រាក់</a></li>--}}
                                            {{--<li id="detail_currency"><a><i class="icon-certificate"></i>ចូលមើល</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                        {{--</tbody>--}}
                    {{--</table>--}}
                {{--</div>--}}
            {{--</div>--}}
{{--==========================================================================================================--}}
            <div class="datatable-header" style="margin-top: -19px;"></div>
            <div class="datatable-scroll">
                <div class="dataTables_scroll">
                    <!--============ scroll body oy trov 1 header table ===============-->
                    <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">
                        <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_Country" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                            <thead style="background: #e3e3ea99;">
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending"><b>វិក័យបត្រ</b></th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending"><b>ឈ្មោះអតិថិជន</b></th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending"><b>លេខទូរសព្ទ័</b></th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending"><b>ប្រភេទទំនិញ </b></th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending"><b>កំនត់សំគាល់ ១</b></th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending"><b>កំនត់សំគាល់ ២</b></th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending"><b>កំនត់សំគាល់ ៣</b></th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending"><b>ថ្ងៃចូល</b></th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending"><b>ថ្ងៃចេញ</b></th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending"><b>ស្ថានភាព</b></th>
                                <th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 100px;"><b>សកម្មភាព</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><b>000005</b></td>
                                <td><b>លុងសំបូរ</b></td>
                                <td><b>012185000</b></td>
                                <td><b>ឡាន</b></td>
                                <td><b>..</b></td>
                                <td><b>..</b></td>
                                <td><b>..</b></td>
                                <td><b>5/10/2018</b></td>
                                <td><b>6​/11/2018</b></td>
                                <td><b>លស់</b></td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-uxpanded="false">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li id="updates_currency"><a><i class="icon-arrow-up52"></i>លក់ចេញ</a></li>
                                                {{--<li id="updateRateChange"><a><i class="icon-price-tag"></i>បង់ប្រាក់</a></li>--}}
                                                {{--<li id="detail_currency"><a><i class="icon-certificate"></i>ចូលមើល</a></li>--}}
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td><b>000003</b></td>
                                <td><b>មេចមណ</b></td>
                                <td><b>012185000</b></td>
                                <td><b>សង់ការ៉េ</b></td>
                                <td><b>..</b></td>
                                <td><b>..</b></td>
                                <td><b>..</b></td>
                                <td><b>5/11/2018</b></td>
                                <td><b>6​/12/2018</b></td>
                                <td><b>មិនទាន់លស់</b></td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-uxpanded="false">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li id="updates_currency"><a><i class="icon-arrow-up52"></i>លក់ចេញ</a></li>
                                                {{--<li id="updateRateChange"><a><i class="icon-price-tag"></i>បង់ប្រាក់</a></li>--}}
                                                {{--<li id="detail_currency"><a><i class="icon-certificate"></i>ចូលមើល</a></li>--}}
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td><b>000009</b></td>
                                <td><b>អាសំ</b></td>
                                <td><b>016185590</b></td>
                                <td><b>កង់បី</b></td>
                                <td><b>..</b></td>
                                <td><b>..</b></td>
                                <td><b>..</b></td>
                                <td><b>5/6/2018</b></td>
                                <td><b>6​/7/2018</b></td>
                                <td><b>លក់ចេញ</b></td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-uxpanded="false">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li id="updates_currency"><a><i class="icon-arrow-up52"></i>លក់ចេញ</a></li>
                                                {{--<li id="updateRateChange"><a><i class="icon-price-tag"></i>បង់ប្រាក់</a></li>--}}
                                                {{--<li id="detail_currency"><a><i class="icon-certificate"></i>ចូលមើល</a></li>--}}
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
{{--==========================================================================================================--}}
        </div>
    </div>

    <form role="form" action="" method="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="createNewTomNanh" class="modal fade">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" id="close_update_rate" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title"><b>ការបង្កើតប្រភេទទំនិញ</b></h5>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12">
                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">
                                <div class="datatable-header">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="font-size: 15px"><b>ឈ្មោះប្រភេទទំនិញ៖</b></label>
                                            <input type="text" placeholder="សរសេរនៅទីនេះ...." name="we_buy" id="we_buy" class="form-control" style="border: 1px solid grey;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" id="close_update_rate" data-dismiss="modal" style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;">បោះបង់</button>
                        {{ csrf_field() }}
                        {{--<button type="submit" class="btn btn-primary" id="create_update_rate_dialog" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px; display: none"><b>បោះបង់</b></button>--}}
                        <button type="button" class="btn btn-primary btn_validate_Rate" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;"><b>រក្សាទុក</b></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script>
        $(document).on("click","#createTomNagn",function(){
            $('#createNewTomNanh').modal({
                backdrop: 'static'
            });
        });
        $("#selectTomNanh").select2({

        });
    </script>
@endsection
