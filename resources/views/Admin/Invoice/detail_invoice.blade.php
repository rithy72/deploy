@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <!--<h6 class="panel-title">Default panel</h6>-->
            <ul class="breadcrumb breadcrumb-caret position-right">
                <li><a href="{{('/admin/MainForm')}}" style="color: #2577e1;"><span>ទំព័រដើម</span></a></li>
                <li><a href="{{('/admin/Invoice')}}" style="color: #2577e1;"><span>វិក្ក័យបត្រ</span></a></li>
                <li class="active"><span>ពណ៍មានលម្អិត</span></li>
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


        <div class="panel-body" style="padding: 0">
            {{-- Header show button and invoice id  --}}
            <div class="col-md-12" style="margin-bottom: 13px;margin-top: 6px;">
                <div class="col-md-8" style="margin-top: -6px;margin-bottom: 0;">
                    <div class="col-md-6">
                        <h3><b>លេខបង្កាន់ដៃ ៖ </b><b>FE-999999</b></h3>
                    </div>
                    <div class="col-md-6">
                        <h3><b>បង្កើតដោយ ៖ </b><b>Employee</b></h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dataTables_length" id="DataTables_Table_3_length" style="margin-top: 13px;margin-bottom: 0;">
                        <a href="{{('/admin/Invoice/CreateNewInvoice')}}" class="btn btn-success" id="" style="margin-bottom: 4px;"><i class="icon-add position-left" ></i>បង្កើតថ្មី</a> ||
                        <a href="{{('/admin/Invoice/UpdateInvoice')}}" class="btn btn-primary" id="" style="margin-bottom: 4px;"><i class="icon-pencil7 position-left"></i>កែប្រែ</a> ||
                        <a href="{{('/admin/Invoice/PaymentInvoice')}}" class="btn createNewCountry" id="add_item" style="background: #ff840d;color: white;margin-bottom: 4px;"><i class="icon-price-tag position-left"></i>បង់ប្រាក់</a>
                    </div>
                </div>
            </div>
            {{-- End --}}
            {{-- Show choose --}}
            <div class="tabbable">
                <ul class="nav nav-tabs nav-tabs-highlight">
                    <li class="active"><a href="#highlighted_tab1" data-toggle="tab" aria-expanded="false">ព៍ណមានទូទៅ</a></li>
                    <li><a href="#highlighted-tab2" data-toggle="tab" aria-expanded="true">ប្រតិបត្តីការ</a></li>
                    <li><a href="#highlighted-tab3" data-toggle="tab" aria-expanded="true">រំលស់ទំនិញចេញ</a></li>
                    <li><a href="#highlighted-tab4" data-toggle="tab" aria-expanded="true">ការកែប្រែវិក្ក័យប័ត្រ</a></li>
                </ul>

                <div class="tab-content">
                    {{----- Merl Detail bos Customer 1 -----}}
                    <div class="tab-pane active" id="highlighted_tab1">
                        <div class="panel-body">
                            <div class="col-xs-12 .col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" style="font-size: 15px">ឈ្មោះអតិថិជន ៖</label>
                                    <div class="col-md-9">
                                        <input type="text" placeholder="...." name="" id="" class="form-control" style="border: 1px solid grey;" disabled="disabled">
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 .col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" style="font-size: 15px">លេខទូរស័ព្ទ ៖</label>
                                    <div class="col-md-9">
                                        <input type="number" placeholder="...." name="" id="" class="form-control" style="border: 1px solid grey;" disabled="disabled">
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 .col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" style="font-size: 15px">ថ្ងៃទទួល ៖</label>
                                    <div class="col-md-9">
                                        <input type="date" name="" id="" class="form-control" style="border: 1px solid grey;" disabled="disabled">
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 .col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" style="font-size: 15px">ថ្ងៃផុតកំណត់ ៖</label>
                                    <div class="col-md-9">
                                        <input type="date" name="" id="" class="form-control" style="border: 1px solid grey;" disabled="disabled">
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 .col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" style="font-size: 15px">អត្រាការប្រាក់ ៖</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="" name="" disabled="disabled">
                                            <option selected="selected">....</option>
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
                        </div>
                        <div class="datatable-scroll" style="overflow-x: hidden;">
                            <div class="dataTables_scroll">
                                <!--============ scroll body oy trov 1 header table ===============-->
                                <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 250px; width: 100%;">
                                    <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_Country" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                                        <thead style="background: #e3e3ea99;">
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">លរ</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">ក្រុុមទំនិញ</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">កំណត់សម្កាល់ ១</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">កំណត់សម្កាល់ ២</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">កំណត់សម្កាល់ ៣</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">កំណត់សម្កាល់ ៤</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">ស្ថានភាព</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>ម៉ូតូ</td>
                                            <td>ខ្មៅ</td>
                                            <td>1GG 9999</td>
                                            <td>Dream 2018</td>
                                            <td>....</td>
                                            <td>មិនទាន់រំលួស</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>ឡាន</td>
                                            <td>ស</td>
                                            <td>1ZZ 9999</td>
                                            <td>Highlander</td>
                                            <td>....</td>
                                            <td>មិនទាន់រំលួស</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{--========================= footer of pagination ====================--}}
                        <div class="datatable-footer">
                            <div class="col-xs-12 .col-sm-12 col-md-12">
                                {{-- Price sa rob --}}
                                <div style="text-align: right;clear: both;">
                                    <label class="control-label col-md-6" style="font-size: 15px; margin-top: 6px;"><b>តម្លៃដើមសរុប</b></label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="...." name="" id="" class="form-control" style="border: 1px solid grey;" disabled="disabled">
                                        <br>
                                    </div>
                                </div>
                                {{-- Price bung ruch --}}
                                <div style="text-align: right;clear: both;">
                                    <label class="control-label col-md-6" style="font-size: 15px; margin-top: 6px;"><b>តម្លៃដើមបង់រួច</b></label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="...." name="" id="" class="form-control" style="border: 1px solid grey;" disabled="disabled">
                                        <br>
                                    </div>
                                </div>
                                {{-- Price nov sol --}}
                                <div style="text-align: right;clear: both;">
                                    <label class="control-label col-md-6" style="font-size: 15px; margin-top: 6px;"><b>តម្លៃដើមនៅសល់</b></label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="...." name="" id="" class="form-control" style="border: 1px solid grey;" disabled="disabled">
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {{----- Merl ka bong brak bos Customer -----}}
                    <div class="tab-pane" id="highlighted-tab2">
                        <div class="panel-body">
                            <div class="col-md-3">
                                <span>សកម្មភាព</span>
                                <select class="form-control" id="selectTomNanh1" name="">
                                    <option selected="selected"></option>
                                    <option selected="selected">បង់ប្រាក់ដើម</option>
                                    <option selected="selected">ថែមការប្រាក់</option>
                                    <option selected="selected">បង់ការប្រាក់</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <span>ជ្រើសរើសថ្ងៃចាប់ផ្តើម</span><input type="date" class="form-control" placeholder="ជ្រើសរើសថ្ងៃ">
                            </div>
                            <div class="col-md-3">
                                <span>ជ្រើសរើសថ្ងៃរហូតដល់</span><input type="date" class="form-control" placeholder="ជ្រើសរើសថ្ងៃ">
                            </div>
                            <a class="btn btn-primary btn-Search" style="margin-top: 19px;"><i class="icon-search4 position-left"></i>ធ្វើការស្វែងរក</a>
                            <br/><br/>

                            <div class="datatable-header" style="margin-top: -30px;"></div>
                            <div class="datatable-scroll" style="overflow-x: hidden;">
                                <div class="dataTables_scroll">
                                    <!--============ scroll body oy trov 1 header table ===============-->
                                    <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">
                                        <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_Country" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                                            <thead style="background: #e3e3ea99;">
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">កាលបរិច្ឆេត</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">សកម្មភាព</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">ទឹកប្រាក់</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">អ្នកទទួលប្រាក់</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>4/9/2018</td>
                                                <td>បង់ការប្រាក់</td>
                                                <td>10$</td>
                                                <td>Employee</td>
                                            </tr>
                                            <tr>
                                                <td>2/9/2018</td>
                                                <td>បង់ការប្រាក់</td>
                                                <td>5$</td>
                                                <td>Employee</td>
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
                {{----- Merl ka rom lus item janh bos Customer -----}}
                    <div class="tab-pane" id="highlighted-tab3">
                        <div class="panel-body">
                            <div class="col-md-3">
                                <span>ជ្រើសរើសថ្ងៃចាប់ផ្តើម</span><input type="date" class="form-control" placeholder="ជ្រើសរើសថ្ងៃ">
                            </div>
                            <div class="col-md-3">
                                <span>ជ្រើសរើសថ្ងៃរហូតដល់</span><input type="date" class="form-control" placeholder="ជ្រើសរើសថ្ងៃ">
                            </div>
                            <a class="btn btn-primary btn-Search" style="margin-top: 19px;"><i class="icon-search4 position-left"></i>ធ្វើការស្វែងរក</a>
                            <br/><br/>

                            <div class="datatable-header" style="margin-top: -30px;"></div>
                            <div class="datatable-scroll" style="overflow-x: hidden;">
                                <div class="dataTables_scroll">
                                    <!--============ scroll body oy trov 1 header table ===============-->
                                    <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">
                                        <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_Country" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                                            <thead style="background: #e3e3ea99;">
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">កាលបរិច្ឆេត</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">រំលស់ទំនិញ</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">អ្នកយកចេញ</th>
                                            </tr>
                                            </thead>
                                            <tbody>

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
                {{----- Merl ka update invoice bos Customer 1 -----}}
                    <div class="tab-pane" id="highlighted-tab4">
                        <div class="panel-body">
                            <div class="col-md-3">
                                <span>ជ្រើសរើសថ្ងៃចាប់ផ្តើម</span><input type="date" class="form-control" placeholder="ជ្រើសរើសថ្ងៃ">
                            </div>
                            <div class="col-md-3">
                                <span>ជ្រើសរើសថ្ងៃរហូតដល់</span><input type="date" class="form-control" placeholder="ជ្រើសរើសថ្ងៃ">
                            </div>
                            <a class="btn btn-primary btn-Search" style="margin-top: 19px;"><i class="icon-search4 position-left"></i>ធ្វើការស្វែងរក</a>
                            <br/><br/>

                            <div class="datatable-header" style="margin-top: -30px;"></div>
                            <div class="datatable-scroll" style="overflow-x: hidden;">
                                <div class="dataTables_scroll">
                                    <!--============ scroll body oy trov 1 header table ===============-->
                                    <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">
                                        <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_Country" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                                            <thead style="background: #e3e3ea99;">
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">កាលបរិច្ឆេត</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">សកម្មភាព</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">អ្នកធ្វើ</th>
                                            </tr>
                                            </thead>
                                            <tbody>

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
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>

    </script>
@endsection
