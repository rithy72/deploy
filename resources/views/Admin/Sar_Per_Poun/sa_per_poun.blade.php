@extends('layouts.app')
@section('style')
    <style>

    </style>
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <!--<h6 class="panel-title">Default panel</h6>-->
            <ul class="breadcrumb breadcrumb-caret position-right">
                <li><a href="{{('/admin/mainform')}}" style="color: #2577e1;"><span>@lang('string.mainForm')</span></a></li>
                <li class="active"><span>@lang('string.inventory')</span></li>
                <li class="active"><span>@lang('string.inventoryItems')</span></li>
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



        <div class="panel-body" style="padding: 19px 0;">
            <div class="tabbable">
                <ul class="nav nav-tabs nav-tabs-highlight">
                    <li class="active"><a href="#highlighted_tab1" data-toggle="tab" aria-expanded="false">ទំនិញមិនទាន់លស់</a></li>
                    <li><a href="#highlighted_tab2" data-toggle="tab" aria-expanded="true">ទំនិញដាច់</a></li>
                    <li><a href="#highlighted_tab3" data-toggle="tab" aria-expanded="true">@lang('string.reportItems')</a></li>
                </ul>
                <div class="tab-content">
                    {{----- Merl Item min ton lus -----}}
                    <div class="tab-pane active" id="highlighted_tab1">
                        <div class="panel-body" style="padding: 10px;">
                            <div class="col-md-2">
                                <span>@lang('string.type')</span>
                                <div class="form-group">
                                    <select class="form-control" id="selectTomNanh" name="">
                                        <option selected="selected"></option>
                                        <option selected="selected">ម៉ូតូ</option>
                                        <option selected="selected">ឡាន</option>
                                        <option selected="selected">នាឡិការ</option>
                                        <option selected="selected">ផ្សេងៗ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2" style="display: flex;margin-top: 21px;">
                                <span>.</span><input type="text" class="form-control" placeholder="@lang('string.searchItems')">
                                <a class="btn btn-primary btn-Search"><i class="icon-filter3"></i></a>
                            </div>


                            <div class="dataTables_length">
                                <div class="btn-group" style="margin-top: 20px;">
                                    <button type="button" class="btn btn-success" id="createNewType">@lang('string.createNewItems')</button>
                                </div>
                            </div>

{{--==========================================================================================================--}}
                            <div class="datatable-header" style="margin-top: -19px;"></div>
                            <div class="datatable-scroll" style="overflow-x: hidden;">
                                <div class="dataTables_scroll">
                                    <!--============ scroll body oy trov 1 header table ===============-->
                                    <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">
                                        <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_Country" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                                            <thead style="background: #e3e3ea99;">
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.invoiceID')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.nameCustomer')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.phoneNumber')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.typeItems')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice1')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice2')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice3')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice4')</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>000005</td>
                                                <td>លុងសំបូរ</td>
                                                <td>012185000</td>
                                                <td>ឡាន</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                            </tr>
                                            <tr>
                                                <td>000003</td>
                                                <td>មេចមណ</td>
                                                <td>012185000</td>
                                                <td>សង់ការ៉េ</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                            </tr>
                                            <tr>
                                                <td>000009</td>
                                                <td>អាសំ</td>
                                                <td>016185590</td>
                                                <td>កង់បី</td>
                                                <td>..</td>
                                                <td>..</td>
                                                <td>..</td>
                                                <td>..</td>
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
                    {{----- Merl Item Derl duch gnai -----}}
                    <div class="tab-pane" id="highlighted_tab2">
                        <div class="panel-body" style="padding: 10px;">
                            <div class="col-md-2">
                                <span>@lang('string.typeItems')</span>
                                <div class="form-group">
                                    <select class="form-control" id="selectTomNanh1" name="">
                                        <option selected="selected"></option>
                                        <option selected="selected">ម៉ូតូ</option>
                                        <option selected="selected">ឡាន</option>
                                        <option selected="selected">នាឡិការ</option>
                                        <option selected="selected">ផ្សេងៗ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <span>@lang('string.situation')</span>
                                <div class="form-group">
                                    <select class="form-control" id="" name="">
                                        <option selected="selected"></option>
                                        <option selected="">@lang('string.all')</option>
                                        <option selected="">@lang('string.notYetSaleOut')</option>
                                        <option selected="">@lang('string.saleOut')</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2" style="display: flex;margin-top: 21px;">
                                <span>.</span><input type="text" class="form-control" placeholder="@lang('string.searchItems')">
                                <a class="btn btn-primary btn-Search"><i class="icon-filter3"></i></a>
                            </div>


                            <div class="dataTables_length">
                                <div class="btn-group" style="margin-top: 20px;">
                                    <button type="button" class="btn btn-success" id="createNewType">@lang('string.createNewItems')</button>
                                </div>
                            </div>

                            <div class="datatable-header" style="margin-top: -19px;"></div>
                            <div class="datatable-scroll" style="overflow-x: hidden;">
                                <div class="dataTables_scroll">
                                    <!--============ scroll body oy trov 1 header table ===============-->
                                    <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">
                                        <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_Country" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                                            <thead style="background: #e3e3ea99;">
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.invoiceID')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.nameCustomer')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.phoneNumber')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.typeItems')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice1')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice2')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice3')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice4')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.situation')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.actions')</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>000005</td>
                                                <td>លុងសំបូរ</td>
                                                <td>012185000</td>
                                                <td>ឡាន</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>មិនទានលស់</td>
                                                <td class="text-center">
                                                    <ul class="icons-list">
                                                        <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-uxpanded="false"><i class="icon-menu9"></i></a>
                                                            <ul class="dropdown-menu dropdown-menu-right">
                                                                <li id="ItemExpired"><a><i class="icon-cart-remove"></i>@lang('string.saleOut')</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>000003</td>
                                                <td>មេចមណ</td>
                                                <td>012185000</td>
                                                <td>សង់ការ៉េ</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>មិនទានលស់</td>
                                                <td class="text-center">
                                                    <ul class="icons-list">
                                                        <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-uxpanded="false"><i class="icon-menu9"></i></a>
                                                            <ul class="dropdown-menu dropdown-menu-right">
                                                                <li id="ItemExpired"><a><i class="icon-cart-remove"></i>@lang('string.saleOut')</a></li>
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
                    {{----- Merl Item All -----}}
                    <div class="tab-pane" id="highlighted_tab3">
                        <div class="panel-body" style="padding: 10px;">
                            <div class="col-md-2">
                                <span>@lang('string.typeItems')</span>
                                <div class="form-group">
                                    <select class="form-control" id="selectTomNanh2" name="">
                                        <option selected="selected"></option>
                                        <option selected="selected">ម៉ូតូ</option>
                                        <option selected="selected">ឡាន</option>
                                        <option selected="selected">នាឡិការ</option>
                                        <option selected="selected">ផ្សេងៗ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <span>@lang('string.situation')</span>
                                <div class="form-group">
                                    <select class="form-control" id="" name="">
                                        <option selected="selected"></option>
                                        <option selected="">@lang('string.all')</option>
                                        <option selected="">មិនទាន់លស់</option>
                                        <option selected="">@lang('string.saleAlready')</option>
                                        <option selected="">ដាច់</option>
                                        <option selected="">@lang('string.notYetSaleOut')</option>
                                        <option selected="">@lang('string.saleOut')</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2" style="display: flex;margin-top: 21px;">
                                <span>.</span><input type="text" class="form-control" placeholder="@lang('string.searchItems')">
                                <a class="btn btn-primary btn-Search"><i class="icon-filter3"></i></a>
                            </div>


                            <div class="dataTables_length">
                                <div class="btn-group" style="margin-top: 20px;">
                                    <button type="button" class="btn btn-success" id="createNewType">@lang('string.createNewItems')</button>
                                </div>
                            </div>

                            <div class="datatable-header" style="margin-top: -19px;"></div>
                            <div class="datatable-scroll" style="overflow-x: hidden;">
                                <div class="dataTables_scroll">
                                    <!--============ scroll body oy trov 1 header table ===============-->
                                    <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">
                                        <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_Country" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                                            <thead style="background: #e3e3ea99;">
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.invoiceID')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.nameCustomer')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.phoneNumber')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.typeItems')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice1')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice2')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice3')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice4')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.situation')</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>000005</td>
                                                <td>លុងសំបូរ</td>
                                                <td>012185000</td>
                                                <td>ឡាន</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>មិនទានលស់</td>
                                            </tr>
                                            <tr>
                                                <td>000003</td>
                                                <td>មេចមណ</td>
                                                <td>012185000</td>
                                                <td>សង់ការ៉េ</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>...</td>
                                                <td>មិនទានលស់</td>
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
                </div>
            </div>
        </div>
    </div>
    {{------------ dialog tver ka lok janh rol tom nanh derl dol ngai ------------}}
    <form role="form" action="" method="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="ExpieredItem" class="modal fade">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" id="close_update_rate" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">@lang('string.saleOutItemExpiredDate')</h5>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12">
                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">
                                <div class="datatable-header">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {{-- number invoice --}}
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.invoiceID')</label>
                                            <div class="col-lg-9" style="margin-bottom: 13px;">
                                                <input type="text" class="form-control" disabled="disabled" placeholder="....." style="border: 1px solid grey;">
                                            </div>
                                            {{-- type of item --}}
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.groupItem')</label>
                                            <div class="col-lg-9" style="margin-bottom: 13px;">
                                                <input type="text" class="form-control" disabled="disabled" placeholder="....." style="border: 1px solid grey;">
                                            </div>
                                            {{-- som kol 1 --}}
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.notice')</label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="....." name="" id="" class="form-control" style="border: 1px solid grey;" disabled="disabled">
                                                <br>
                                            </div>
                                            {{-- som kol 2 --}}
                                            <label class="control-label col-lg-3" style="font-size: 15px"></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="....." name="" id="" class="form-control" style="border: 1px solid grey;" disabled="disabled">
                                                <br>
                                            </div>
                                            {{-- som kol 3 --}}
                                            <label class="control-label col-lg-3" style="font-size: 15px"></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="....." name="" id="" class="form-control" style="border: 1px solid grey;" disabled="disabled">
                                                <br>
                                            </div>
                                            {{-- som kol 4 --}}
                                            <label class="control-label col-lg-3" style="font-size: 15px"></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="....." name="" id="" class="form-control" style="border: 1px solid grey;" disabled="disabled">
                                                <br>
                                            </div>
                                            {{-- som kol 4 --}}
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.priceSaleOut')</label>
                                            <div class="col-lg-9">
                                                <input type="number" placeholder="@lang('string.addPriceHere...')" name="" id="" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" id="close_update_rate" data-dismiss="modal" style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i class="icon-arrow-left12 position-left"></i>@lang('string.cancel')</button>
                        {{ csrf_field() }}
                        {{--<button type="submit" class="btn btn-primary" id="create_update_rate_dialog" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px; display: none"><b>??????</b></button>--}}
                        <button type="button" class="btn btn-primary btn_validate_Rate" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;"><b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{------------ dialog tver ka create new Type of item ------------}}
    <form role="form" action="" method="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="NewTypeDialog" class="modal fade">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" id="close_update_rate" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">@lang('string.createNewItem')</h5>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12">
                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">
                                <div class="datatable-header">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-lg-4" style="font-size: 15px;margin-top: 6px;">@lang('string.createItem')</label>
                                            <div class="col-lg-8" style="margin-bottom: 13px;">
                                                <input type="text" class="form-control" placeholder="@lang('string.writeNameOfItemHere...')" style="border: 1px solid grey;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" id="close_update_rate" data-dismiss="modal" style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i class="icon-arrow-left12 position-left"></i>@lang('string.cancel')</button>
                        {{ csrf_field() }}
                        {{--<button type="submit" class="btn btn-primary" id="create_update_rate_dialog" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px; display: none"><b>??????</b></button>--}}
                        <button type="button" class="btn btn-primary btn_validate_Rate" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;"><b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{------------ dialog tver ka serch notice ------------}}
    <form role="form" action="" method="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="dialogSearchNotice" class="modal fade">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" id="close_update_rate" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">@lang('string.fineByNotice')</h5>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12">
                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">
                                <div class="datatable-header">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-lg-4" style="font-size: 15px;margin-top: 6px;">@lang('string.notice')</label>
                                            <div class="col-lg-8" style="margin-bottom: 13px;">
                                                <input type="text" class="form-control" placeholder="@lang('string.itemNotice1')" style="border: 1px solid grey;"><br>
                                                <input type="text" class="form-control" placeholder="@lang('string.itemNotice2')" style="border: 1px solid grey;"><br>
                                                <input type="text" class="form-control" placeholder="@lang('string.itemNotice3')" style="border: 1px solid grey;"><br>
                                                <input type="text" class="form-control" placeholder="@lang('string.itemNotice4')" style="border: 1px solid grey;"><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" id="close_update_rate" data-dismiss="modal" style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i class="icon-arrow-left12 position-left"></i>@lang('string.cancel')</button>
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-primary btn_validate_Rate" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;"><b>@lang('string.search')</b><i class="icon-search4 position-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script>
        // dialog take item sell ot
        $(document).on("click","#ItemExpired",function(){
            $('#ExpieredItem').modal({
                backdrop: 'static'
            });
        });
        // create new item type
        $(document).on("click","#createNewType",function(){
            $('#NewTypeDialog').modal({
                backdrop: 'static'
            });
        });
        // filter search by notice
        $(document).on("click",".btn-Search",function(){
            $('#dialogSearchNotice').modal({
                backdrop: 'static'
            });
        });

        $("#selectTomNanh").select2({

        });
        $("#selectTomNanh1").select2({

        });
        $("#selectTomNanh2").select2({

        });
    </script>
@endsection
