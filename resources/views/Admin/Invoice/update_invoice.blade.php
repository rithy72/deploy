@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <!--<h6 class="panel-title">Default panel</h6>-->
            <ul class="breadcrumb breadcrumb-caret position-right">
                <li><a href="{{('/admin/MainForm')}}" style="color: #2577e1;"><span>ទំព័រដើម</span></a></li>
                <li><a href="{{('/admin/Invoice')}}" style="color: #2577e1;"><span>វិក្ក័យបត្រ</span></a></li>
                <li class="active"><span>កែប្រែវិក្ក័យបត្រ</span></li>
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
                    <label class="control-label col-md-3" style="font-size: 15px">ឈ្មោះអតិថិជន ៖</label>
                    <div class="col-md-9">
                        <input type="text" placeholder="សរសេរឈ្មោះអតិថិជន...." name="" id="" class="form-control" style="border: 1px solid grey;">
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 .col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-3" style="font-size: 15px">លេខទូរស័ព្ទ ៖</label>
                    <div class="col-md-9">
                        <input type="number" placeholder="សរសេរលេខទូរស័ព្ទ...." name="" id="" class="form-control" style="border: 1px solid grey;">
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 .col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-3" style="font-size: 15px">ថ្ងៃទទួល ៖</label>
                    <div class="col-md-9">
                        <input type="date" name="" id="" class="form-control" style="border: 1px solid grey;">
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 .col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-3" style="font-size: 15px">ថ្ងៃផុតកំណត់ ៖</label>
                    <div class="col-md-9">
                        <input type="date" name="" id="" class="form-control" style="border: 1px solid grey;">
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 .col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-3" style="font-size: 15px">អត្រាការប្រាក់ ៖</label>
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
            <div class="col-xs-12 .col-sm-6 col-md-6">
                <div class="form-group col-md-12">
                <p style="margin-top: 7px;">តម្លៃប្រាក់ការក្នុង ១ ខែ ៖ ........</p>
                </div>
            </div>
        </div>
        <div class="datatable-header" style="margin-top: -25px;">
            <legend style="font-size: 17px;margin-top: -25px;"><b style="margin-left: 16px;">ទំនិញបញ្ចាំ</b></legend>

            <div class="dataTables_length" id="DataTables_Table_3_length" style="margin-top: -14px;margin-bottom: 7px;margin-right: 13px;">
                <a class="btn btn-success createNewCountry" id="add_item"><i class="icon-add position-left" ></i>បន្ថែមទំនិញ</a>
            </div>
        </div>
        <div class="datatable-scroll" style="overflow-x: hidden;">
            <div class="dataTables_scroll">
                <!--============ scroll body oy trov 1 header table ===============-->
                <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 250px; width: 100%;">
                    <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_Country" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                        <thead style="background: #e3e3ea99;">
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">លរ</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">ប្រភេទទំនិញ</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">កំណត់សម្កាល់ ១</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">កំណត់សម្កាល់ ២</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">កំណត់សម្កាល់ ៣</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">កំណត់សម្កាល់ ៤</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">សកម្មភាព</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>ម៉ូតូ</td>
                            <td>ខ្មៅ</td>
                            <td>1GG 9999</td>
                            <td>....</td>
                            <td>....</td>
                            <td class="text-center">
                                <ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-uxpanded="false">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li id="update_item"><a><i class="icon-pencil7"></i>កែប្រែ</a></li>
                                            <li id=""><a><i class="icon-trash"></i>លុបចោល</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>ឡាន</td>
                            <td>1ZZ 9999</td>
                            <td>ស</td>
                            <td>....</td>
                            <td>....</td>
                            <td class="text-center">
                                <ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-uxpanded="false">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li id="update_item"><a><i class="icon-pencil7"></i>កែប្រែ</a></li>
                                            <li id=""><a><i class="icon-trash"></i>លុបចោល</a></li>
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
                    <label class="control-label col-md-6" style="font-size: 15px; margin-top: 6px;"><b>តម្លៃសរុប</b></label>
                    <div class="col-md-6">
                        <input type="text" placeholder="បញ្ចូលតំលៃទីនេះ..." name="" id="" class="form-control" style="border: 1px solid grey;">
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

    {{--====================== add more item to invoice ====================--}}
    <form role="form" action="" method="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="add_more_item_to_invoice" class="modal fade">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" id="close_update_rate" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">បន្ថែមសារពើភ័ណ្ឌទៅលើវិក័្កយបត្រ</h5>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12">
                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">
                                <div class="datatable-header" style="margin-top: -40px;">
                                    <div class="">
                                        <div class="form-group">
                                            {{--Group Of Items--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px">ក្រុមទំនិញ ៖</label>
                                            <div class="col-lg-9" style="margin-bottom: 13px;">
                                                <select class="form-control" id="selectTomNanh" name="">
                                                    <option selected="selected"></option>
                                                    <option selected="selected">ម៉ូតូ</option>
                                                    <option selected="selected">ឡាន</option>
                                                    <option selected="selected">ទូរស័ព្ទ</option>
                                                </select>
                                            </div>
                                            {{--Name of Item--}}
                                            {{--<label class="control-label col-lg-3" style="font-size: 15px"><b>ឈ្មោះទំនិញ ៖</b></label>
                                            <div class="col-lg-9" style="margin-bottom: 13px;">
                                                <select class="form-control" id="name_item_select" name="">
                                                    <option selected="selected"></option>
                                                    <option selected="selected">Honda</option>
                                                    <option selected="selected">Scoopy</option>
                                                </select>
                                            </div>--}}
                                            {{--Number som Kol--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px">លក្ខណៈសំម្គាល់ ៖</label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="លក្ខណៈសំម្គាល់ទី ១" name="" id="" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--full name--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px"></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="លក្ខណៈសំម្គាល់ទី ២" name="" id="" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--phone number--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px"></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="លក្ខណៈសំម្គាល់ទី ៣" name="" id="" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--Cost--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px"><b></b></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="លក្ខណៈសំម្គាល់ទី ៤" name="" id="" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" id="close_update_rate" data-dismiss="modal" style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i class="icon-arrow-left12 position-left"></i>បោះបង់</button>
                        {{ csrf_field() }}
                        {{--<button type="submit" class="btn btn-primary" id="create_update_rate_dialog" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px; display: none"><b>បោះបង់</b></button>--}}
                        <button type="button" class="btn btn-primary btn_validate_Rate" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;"><b>រក្សាទុក</b><i class="icon-arrow-right13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{--====================== add more item to invoice ====================--}}
    <form role="form" action="" method="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="update_item_in_invoice" class="modal fade">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" id="close_update_rate" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">ធ្វើការកែប្រែសារពើភ័ណ្ឌទៅលើវិក័្កយបត្រ</h5>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12">
                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">
                                <div class="datatable-header" style="margin-top: -40px;">
                                    <div class="">
                                        <div class="form-group">
                                            {{--Group Of Items--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px">ក្រុមទំនិញ ៖</label>
                                            <div class="col-lg-9" style="margin-bottom: 13px;">
                                                <select class="form-control" id="selectTomNanh1" name="">
                                                    <option selected="selected"></option>
                                                    <option selected="selected">ម៉ូតូ</option>
                                                    <option selected="selected">ឡាន</option>
                                                    <option selected="selected">ទូរស័ព្ទ</option>
                                                </select>
                                            </div>
                                            {{--Name of Item--}}
                                            {{--<label class="control-label col-lg-3" style="font-size: 15px"><b>ឈ្មោះទំនិញ ៖</b></label>
                                            <div class="col-lg-9" style="margin-bottom: 13px;">
                                                <select class="form-control" id="name_item_select" name="">
                                                    <option selected="selected"></option>
                                                    <option selected="selected">Honda</option>
                                                    <option selected="selected">Scoopy</option>
                                                </select>
                                            </div>--}}
                                            {{--Number som Kol--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px">លក្ខណៈសំម្គាល់ ៖</label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="លក្ខណៈសំម្គាល់ទី ១" name="" id="" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--full name--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px"></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="លក្ខណៈសំម្គាល់ទី ២" name="" id="" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--phone number--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px"></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="លក្ខណៈសំម្គាល់ទី ៣" name="" id="" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--Cost--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px"><b></b></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="លក្ខណៈសំម្គាល់ទី ៤" name="" id="" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" id="close_update_rate" data-dismiss="modal" style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i class="icon-arrow-left12 position-left"></i>បោះបង់</button>
                        {{ csrf_field() }}
                        {{--<button type="submit" class="btn btn-primary" id="create_update_rate_dialog" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px; display: none"><b>បោះបង់</b></button>--}}
                        <button type="button" class="btn btn-primary btn_validate_Rate" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;"><b>ធ្វើការកែប្រែ</b><i class="icon-arrow-right13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script>
        // dialog add item to invoice
        $(document).on("click","#add_item",function(){
            $('#add_more_item_to_invoice').modal({
                backdrop: 'static'
            });
        });
        // dialog update ka add item to invoice
        $(document).on("click","#update_item",function(){
            $('#update_item_in_invoice').modal({
                backdrop: 'static'
            });
        });
        // select group of item
        $("#selectTomNanh").select2({

        });
        // select item in one group
        $("#selectTomNanh1").select2({

        });
    </script>
@endsection
