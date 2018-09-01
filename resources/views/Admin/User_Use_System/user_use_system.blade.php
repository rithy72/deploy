@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <!--<h6 class="panel-title">Default panel</h6>-->
            <ul class="breadcrumb breadcrumb-caret position-right">
                <li><a href="{{('/admin/MainForm')}}" style="color: #2577e1;"><span>ទំព័រដើម</span></a></li>
                <li class="active"><span>​អ្នកប្រើប្រាស់</span></li>
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
                <a class="btn btn-success" id="createTomNagn"><i class="icon-add position-left"></i>បង្កើតអ្នកប្រើប្រាស់ថ្មី</a>
            </div>

            <div class="col-md-2">
                <span>ស្វែងរកទាមរយៈ</span>
                <div class="form-group">
                    <select class="form-control" id="" name="">
                        <option selected="selected"></option>
                        <option selected="">លេខសំគាល់</option>
                        <option selected="">ឈ្មោះអតិថិជន</option>
                        <option selected="">លេខទូរស័ព្ទ</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <span>ស្ថានភាព</span>
                <div class="form-group">
                    <select class="form-control" id="" name="">
                        <option selected="selected"></option>
                        <option selected="">ទាំអស់</option>
                        <option selected="">ដំណើរការ</option>
                        <option selected="">ផ្អាកដំណើរការ</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <span>.</span><input type="text" class="form-control" placeholder="ស្វែងរកវត្ថុ">
            </div>
            <a class="btn btn-primary btn-Search" style="margin-top: 19px;"><i class="icon-search4 position-left"></i>ធ្វើការស្វែងរក</a>
            <br/><br/>
            <div class="datatable-header" style="margin-top: -19px;"></div>
            <div class="datatable-scroll">
                <div class="dataTables_scroll">
                    <!--============ scroll body oy trov 1 header table ===============-->
                    <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">
                        <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_Country" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                            <thead style="background: #e3e3ea99;">
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending"><b>លេខសំគាល់</b></th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending"><b>ឈ្មោះពេញ</b></th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending"><b>លេខទូរសព្ទ័</b></th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending"><b>ស្ថានភាព</b></th>
                                <th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 100px;"><b>សកម្មភាព</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><b>000003</b></td>
                                <td><b>លុងសូ</b></td>
                                <td><b>012185000</b></td>
                                <td><b>ដំណើរការ</b></td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li id="update"><a href="#"><i class="icon-pencil7"></i>កែប្រែ</a></li>
                                                <li><a href="#"><i class="icon-checkmark4"></i>ដំណើរការ</a></li>
                                                <li><a href="#"><i class="icon-blocked"></i>ផ្អាកដំណើរការ</a></li>
                                                <li><a href="#"><i class="icon-trash"></i>លុបចោល</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td><b>000004</b></td>
                                <td><b>ឆាយ</b></td>
                                <td><b>01218553696</b></td>
                                <td><b>ផ្អាកដំណើរការ</b></td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li id="update"><a href="#"><i class="icon-pencil7"></i>កែប្រែ</a></li>
                                                <li><a href="#"><i class="icon-checkmark4"></i>ដំណើរការ</a></li>
                                                <li><a href="#"><i class="icon-blocked"></i>ផ្អាកដំណើរការ</a></li>
                                                <li><a href="#"><i class="icon-trash"></i>លុបចោល</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td><b>000008</b></td>
                                <td><b>ឡាង</b></td>
                                <td><b>0121882001</b></td>
                                <td><b>ដំណើរការ</b></td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li id="update"><a href="#"><i class="icon-pencil7"></i>កែប្រែ</a></li>
                                                <li><a href="#"><i class="icon-checkmark4"></i>ដំណើរការ</a></li>
                                                <li><a href="#"><i class="icon-blocked"></i>ផ្អាកដំណើរការ</a></li>
                                                <li><a href="#"><i class="icon-trash"></i>លុបចោល</a></li>
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

    {{-----   Create New User   -----}}
    <form role="form" action="" method="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="createNewTomNanh" class="modal fade">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" id="close_update_rate" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title"><b>ការបង្កើតអ្នកប្រើបា្រស់ថ្មី</b></h5>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12">
                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">
                                <div class="datatable-header" style="margin-top: -40px;">
                                    <div class="">
                                        <div class="form-group">
                                        {{--Number som Kol--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px"><b>លេខសំម្គាល់ ៖</b></label>
                                            <div class="col-lg-9">
                                            <input type="text" placeholder="សរសេរនៅទីនេះ...." name="" id="" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                        {{--full name--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px"><b>ឈ្មោះពេញ ៖</b></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="សរសេរនៅទីនេះ...." name="" id="" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                        {{--phone number--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px"><b>លេខទូរស័ព្ទ ៖</b></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="សរសេរនៅទីនេះ...." name="" id="" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--Account--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px"><b>គណនេយ្យ ៖</b></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="សរសេរនៅទីនេះ...." name="" id="" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--password 1--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px"><b>លេខសម្ងាត់ ៖</b></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="សរសេរនៅទីនេះ...." name="" id="" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--password 2--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px"><b>បញ្ជាក់លេខសម្ងាត់៖</b></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="សរសេរនៅទីនេះ...." name="" id="" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
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

    {{-----   Update User   -----}}
    <form role="form" action="" method="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="update_user" class="modal fade">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" id="close_update_rate" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title"><b>ធ្វើការកែប្រែអ្នកប្រើប្រាស់</b></h5>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12">
                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">
                                <div class="datatable-header" style="margin-top: -40px;">
                                    <div class="">
                                        <div class="form-group">
                                            {{--Number som Kol--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px"><b>លេខសំម្គាល់ ៖</b></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="សរសេរនៅទីនេះ...." name="" id="" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--full name--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px"><b>ឈ្មោះពេញ ៖</b></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="សរសេរនៅទីនេះ...." name="" id="" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--phone number--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px"><b>លេខទូរស័ព្ទ ៖</b></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="សរសេរនៅទីនេះ...." name="" id="" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
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
        // dialog show create new user
        $(document).on("click","#createTomNagn",function(){
            $('#createNewTomNanh').modal({
                backdrop: 'static'
            });
        });
        // dialog show update user
        $(document).on("click","#update",function(){
            $('#update_user').modal({
                backdrop: 'static'
            });
        });
    </script>
@endsection
