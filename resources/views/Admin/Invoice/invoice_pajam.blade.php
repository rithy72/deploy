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

            <div class="col-md-3">
                <span>ស្វែងរកតាមវិក័យបត្រ៖</span>
                <div class="form-group">
                    <select class="form-control" id="selectSaPerPoun" name="">
                        <option selected="selected"></option>
                        <option selected="selected">005586 SE</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <span>.</span><input type="text" class="form-control" placeholder="ស្វែងរកវត្ថុ">
            </div>
            <a class="btn btn-primary btn-Search" style="margin-top: 19px;"><i class="icon-search4 position-left"></i>ធ្វើការស្វែងរក</a>


            <div class="dataTables_length" id="DataTables_Table_3_length" style="margin-top: 19px;">
                <a class="btn btn-success createNewCountry"><i class="icon-add position-left"></i>បង្កើតវិក័យបត្រថ្មី</a>
            </div>


            <br/><br/>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table DataTables" id="table_show_frontEnd">{{--style="background: #9aa6abb3;color: black;"--}}
                        <thead style="font-size: 15px;">
                        <tr class="bg-indigo-600" >{{--style="background: #37474F;color: #fcfcfc;"--}}
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
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $("#selectSaPerPoun").select2({

        });
    </script>
@endsection
