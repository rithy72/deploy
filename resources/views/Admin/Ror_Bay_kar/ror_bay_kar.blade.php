@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <!--<h6 class="panel-title">Default panel</h6>-->
            <ul class="breadcrumb breadcrumb-caret position-right">
                <li><a href="{{('/admin/MainForm')}}" style="color: #2577e1;"><span>ទំព័រដើម</span></a></li>
                <li class="active"><span>របាយការណ៌</span></li>
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
                <span>ជ្រើសរើសថ្ងៃចាប់ផ្តើម</span><input type="date" class="form-control" placeholder="ជ្រើសរើសថ្ងៃ">
            </div>
            <div class="col-md-2">
                <span>ជ្រើសរើសថ្ងៃរហូតដល់</span><input type="date" class="form-control" placeholder="ជ្រើសរើសថ្ងៃ">
            </div>
            <a class="btn btn-primary btn-Search" style="margin-top: 19px;"><i class="icon-search4 position-left"></i>ធ្វើការស្វែងរក</a>
            <br/><br/>
            <div class="datatable-header" style="margin-top: -19px;"></div>
            <div class="datatable-scroll" style="overflow-x: hidden;">
                <div class="dataTables_scroll">
                    <!--============ scroll body oy trov 1 header table ===============-->
                    <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">
                        <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_Country" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                            <thead style="background: #e3e3ea99;">
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">កាលបរិច្ឆែទ</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">ទំនិញចូល</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">ទំនិញចេញ</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">ចំណាយ</th>
                                <th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 100px;">ចំណូល</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>4/9/2018</td>
                                <td>ម៉ូតូ</td>
                                <td>ឡាន</td>
                                <td>500$</td>
                                <td>200$</td>
                            </tr>
                            <tr>
                                <td>2/9/2018</td>
                                <td>ម៉ូតូ</td>
                                <td>ឡាន</td>
                                <td>450$</td>
                                <td>250$</td>
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
                        <button type="button" class="btn btn-link" id="close_update_rate" data-dismiss="modal" style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i class="icon-arrow-left12 position-left"></i>បោះបង់</button>
                        {{ csrf_field() }}
                        {{--<button type="submit" class="btn btn-primary" id="create_update_rate_dialog" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px; display: none"><b>បោះបង់</b></button>--}}
                        <button type="button" class="btn btn-primary btn_validate_Rate" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;"><b>រក្សាទុក</b><i class="icon-arrow-right13 position-right"></i></button>
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

    </script>
@endsection
