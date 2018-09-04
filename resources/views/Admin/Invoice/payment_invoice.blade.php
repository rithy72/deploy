@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <!--<h6 class="panel-title">Default panel</h6>-->
            <ul class="breadcrumb breadcrumb-caret position-right">
                <li><a href="{{('/admin/MainForm')}}" style="color: #2577e1;"><span>ទំព័រដើម</span></a></li>
                <li><a href="{{('/admin/Invoice')}}" style="color: #2577e1;"><span>វិក្ក័យបត្រ</span></a></li>
                <li class="active"><span>ការបង់ប្រាក់</span></li>
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
            {{-- Header show button and invoice id  --}}
            <div class="col-md-12" style="margin-bottom: 13px;margin-top: 6px;">
                <div class="col-md-8" style="margin-top: -20px;margin-bottom: 15px;">
                    <div class="col-md-6">
                        <h3><b>លេខបង្កាន់ដៃ ៖ </b><b>FE-999999</b></h3>
                    </div>
                    <div class="col-md-6">
                        <h3><b>បង្កើតដោយ ៖ </b><b>Employee</b></h3>
                    </div>
                </div>
            </div>
            {{-- End --}}
            <div class="col-xs-12 .col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-3" style="font-size: 15px"><b>ឈ្មោះអតិថិជន ៖</b></label>
                    <div class="col-md-9">
                        <input type="text" placeholder="សរសេរឈ្មោះអតិថិជន...." name="" id="" class="form-control" style="border: 1px solid grey;">
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 .col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-3" style="font-size: 15px"><b>លេខទូរស័ព្ទ ៖</b></label>
                    <div class="col-md-9">
                        <input type="number" placeholder="សរសេរលេខទូរស័ព្ទ...." name="" id="" class="form-control" style="border: 1px solid grey;">
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 .col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-3" style="font-size: 15px"><b>ថ្ងៃទទួល ៖</b></label>
                    <div class="col-md-9">
                        <input type="date" name="" id="" class="form-control" style="border: 1px solid grey;">
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 .col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-3" style="font-size: 15px"><b>ថ្ងៃផុតកំណត់ ៖</b></label>
                    <div class="col-md-9">
                        <input type="date" name="" id="" class="form-control" style="border: 1px solid grey;">
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 .col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-3" style="font-size: 15px"><b>អត្រាការប្រាក់ ៖</b></label>
                    <div class="col-md-9">
                        <select class="form-control" id="" name="">
                            <option selected="selected"></option>
                            <option selected="">2 %</option>
                            <option selected="">3 %</option>
                            <option selected="">4 %</option>
                            <option selected="">5 %</option>
                            <option selected="">6 %</option>
                            <option selected="">7 %</option>
                            <option selected="">8 %</option>
                            <option selected="">9 %</option>
                            <option selected="">10 %</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="datatable-header" style="margin-top: -25px;">
            <legend style="font-size: 17px;"><b style="margin-left: 16px;">ទំនិញបញ្ចាំ</b></legend>
        </div>
        <div class="datatable-scroll" style="overflow-x: hidden;">
            <div class="dataTables_scroll">
                <!--============ scroll body oy trov 1 header table ===============-->
                <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 250px; width: 100%;">
                    <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_Country" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                        <thead style="background: #e3e3ea99;">
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending"><b>លរ</b></th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending"><b>ក្រុុមទំនិញ</b></th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending"><b>កំណត់សម្កាល់ ១</b></th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending"><b>កំណត់សម្កាល់ ២</b></th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending"><b>កំណត់សម្កាល់ ៣</b></th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending"><b>តម្លៃ</b></th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending"><b>ស្ថានភាព</b></th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending"><b>សកម្មភាព</b></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><b>1</b></td>
                            <td><b>ម៉ូតូ</b></td>
                            <td><b>ខ្មៅ</b></td>
                            <td><b>1GG 9999</b></td>
                            <td><b>Dream 2018</b></td>
                            <td><b>450</b></td>
                            <td><b>មិនទានរំលស់</b></td>
                            <td class="text-center">
                                <ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-uxpanded="false">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li id="update_item"><a><i class=""></i>រំលស់</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td><b>2</b></td>
                            <td><b>ឡាន</b></td>
                            <td><b>ស</b></td>
                            <td><b>1ZZ 9999</b></td>
                            <td><b>Highlander</b></td>
                            <td><b>1500</b></td>
                            <td><b>មិនទាន់រំលស់</b></td>
                            <td class="text-center">
                                <ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-uxpanded="false">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li id="update_item"><a><i class=""></i>រំលស់</a></li>
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
        <div class="datatable-footer">
            <div class="col-xs-12 .col-sm-12 col-md-12">
                <div style="text-align: right;clear: both;">
                    <label class="control-label col-md-6" style="font-size: 15px; margin-top: 6px;"><b>តម្លៃដើមសរុប</b></label>
                    <div class="col-md-6">
                        <input type="text" placeholder="...." name="" id="" class="form-control" style="border: 1px solid grey;" disabled="disabled">
                        <br>
                    </div>
                </div>
                <div style="text-align: right;clear: both;">
                    <label class="control-label col-md-6" style="font-size: 15px; margin-top: 6px;"><b>តម្លៃដើមនៅសល់</b></label>
                    <div class="col-md-6">
                        <input type="text" placeholder="...." name="" id="" class="form-control" style="border: 1px solid grey;" disabled="disabled">
                        <br>
                    </div>
                </div>
                <div style="text-align: right;clear: both;">
                    <label class="control-label col-md-6" style="font-size: 15px; margin-top: 6px;"><b>បង់ការប្រាក់</b></label>
                    <div class="col-md-6">
                        <input type="text" placeholder="...." name="" id="" class="form-control" style="border: 1px solid grey;">
                        <br>
                    </div>
                </div>
                <div style="text-align: right;clear: both;">
                    <label class="control-label col-md-6" style="font-size: 15px; margin-top: 6px;"><b>បង់ប្រាក់ដើម</b></label>
                    <div class="col-md-6">
                        <input type="text" placeholder="...." name="" id="" class="form-control" style="border: 1px solid grey;">
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <div class="dataTables_length" id="DataTables_Table_3_length" style="margin-top: -14px;margin-bottom: 7px;margin-right: 13px;">
                    <a href="" class="btn btn-primary createNewCountry" style="width: 110px; border: 1px solid black;"><b>ធ្វើការកែប្រែ</b><i class="icon-arrow-right13 position-right"></i></a>
                </div>
                <div class="dataTables_length" id="DataTables_Table_3_length" style="margin-top: -14px;margin-bottom: 7px;margin-right: 13px;">
                    <a href="" class="btn createNewCountry" style="border: 1px solid;width: 110px;"><i class="icon-arrow-left12 position-left"></i><b>បោះបង់</b></a>
                </div>
            </div>
        </div>
        {{--====================== End footer of pagination ====================--}}
    </div>
@endsection

@section('script')
    <script>
        // select group of item
        $("#selectTomNanh").select2({

        });
        // select item in one group
        $("#name_item_select").select2({

        });
    </script>
@endsection
