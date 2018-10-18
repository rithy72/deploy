@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <!--<h6 class="panel-title">Default panel</h6>-->
            <ul class="breadcrumb breadcrumb-caret position-right">
                <li><a href="{{('/admin/mainform')}}" style="color: #2577e1;"><span>@lang('string.mainForm')</span></a>
                </li>
                <li class="active"><span>@lang('string.inventory')</span></li>
                <li class="active"><span>@lang('string.inventoryItems')</span></li>
                {{--<li class="active">Default collapsible</li>--}}
            </ul>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
        </div>

        <div class="panel-body" style="padding: 19px 0;">
            <div class="tabbable">
                <ul class="nav nav-tabs nav-tabs-highlight">
                    <li class="active" id="tab_show_itemType_notYetPay"><a href="#highlighted_tab1" data-toggle="tab"
                                                                           aria-expanded="false">ទំនិញមិនទាន់លស់</a>
                    </li>
                    <li id="tab_show_took_itemType"><a href="#highlighted_tab2" data-toggle="tab" aria-expanded="true">ទំនិញដាច់</a>
                    </li>
                    <li id="tab_show_reportItemType"><a href="#highlighted_tab3" data-toggle="tab"
                                                        aria-expanded="true">@lang('string.reportItems')</a></li>
                </ul>
                <div class="tab-content">
                    {{----- Merl Item min ton lus -----}}
                    <div class="tab-pane active" id="highlighted_tab1">
                        <div class="panel-body" style="padding: 10px;">
                            <div class="col-sm-4 col-md-3" style="display: flex;">
                                <div class="form-group" style="width: 100%;">
                                    <span>@lang('string.type')</span>
                                    {{--<div style="display: flex;"></div>--}}
                                    <select class="form-control" id="selectTomNanh">

                                    </select>
                                </div>
                                <a class="btn btn-danger btn_clear_select2_1"
                                   style="margin-top: 20px;margin-bottom: 20px;"
                                   title="@lang('string.clearItemType')"><i class="icon-cross3"></i></a>
                            </div>
                            <div class="col-sm-5 col-md-5" style="display: flex;margin-top: 21px;">
                                <input type="text" class="form-control" placeholder="@lang('string.searchItems')"
                                       id="store_search" disabled="disabled">
                                <a class="btn btn-primary btn-Search"><i class="icon-filter3"></i></a>
                            </div>
                            <div class="col-sm-2 col-md-2"
                                 style="margin-top: 1px;text-align: center;margin-bottom: 5px;">
                                <a class="btn btn-primary search_item_notYetPay" style="margin-top: 20px;"><i
                                            class="icon-search4 position-left"></i>@lang('string.search')</a>
                            </div>
                            {{--<div class="dataTables_length">--}}
                            {{--<div class="btn-group" style="margin-top: 20px;">--}}
                            {{--<button type="button" class="btn btn-success" id="createNewType">@lang('string.createNewItems')</button>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            {{--==========================================================================================================--}}
                            <div class="datatable-header" style="margin-top: -19px;"></div>
                            <div class="datatable-scroll" style="overflow-x: hidden;">
                                <div class="dataTables_scroll">
                                    <!--============ scroll body oy trov 1 header table ===============-->
                                    <div class="dataTables_scrollBody"
                                         style="position: relative; overflow: auto; height: 400px; width: 100%;">
                                        <table class="table datatable-scroll-y table-hover dataTable no-footer"
                                               width="100%" id="Show_All_Item_Pay_Yet" role="grid"
                                               aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                                            <thead style="background: #e3e3ea99;">
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="First Name: activate to sort column descending">@lang('string.invoiceID')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Last Name: activate to sort column ascending">@lang('string.typeItems')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice1')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice2')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice3')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice4')</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{--========================= footer of pagination ====================--}}
                            <div class="datatable-footer">
                                <div class="dataTables_info" id="DataTables_Table_3_info" role="status"
                                     aria-live="polite">ទំព័រ <b id="page1"></b> មាន <b id="first1"></b> ទំនិញទៅដល់ <b
                                            id="last1"></b> នៃចំនួនទំនិញទាំងអស់គឺ <b id="all1"></b></div>
                                <div class="dataTables_paginate paging_simple_numbers">
                                    <a class="paginate_button previous_show_invoice" aria-controls="DataTables_Table_3"
                                       data-dt-idx="0" tabindex="0" id="Item_click_Back" style="display:none;">←</a>
                                    <span><a class="paginate_button current" id="Num_Page1"
                                             aria-controls="DataTables_Table_3" data-dt-idx="1" tabindex="0"></a></span>
                                    <a class="paginate_button next_show_invoice" aria-controls="DataTables_Table_3"
                                       data-dt-idx="3" tabindex="0" id="Item_click_Next" style="display:none;">→</a>
                                </div>
                            </div>
                            {{--====================== End footer of pagination ====================--}}
                            {{--==========================================================================================================--}}
                        </div>
                    </div>
                    {{----- Merl Item Derl duch gnai -----}}
                    <div class="tab-pane" id="highlighted_tab2">
                        <div class="panel-body" style="padding: 10px;">
                            <div class="col-sm-3 col-md-3" style="display: flex;">
                                <div class="form-group" style="width: 100%;">
                                    <span>@lang('string.typeItems')</span>
                                    <select class="form-control" id="selectTomNanh1">

                                    </select>
                                </div>
                                <a class="btn btn-danger btn_clear_select2_2"
                                   style="margin-top: 20px;margin-bottom: 20px;"
                                   title="@lang('string.clearItemType')"><i class="icon-cross3"></i></a>
                            </div>
                            <div class="col-sm-2 col-md-2">
                                <span>@lang('string.situation')</span>
                                <div class="form-group">
                                    <select class="form-control" id="select_status">
                                        <option selected="selected" value="3,4">@lang('string.all')</option>
                                        <option value="3">@lang('string.notYetSaleOut')</option>
                                        <option value="4">@lang('string.saleOut')</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-4" style="display: flex;margin-top: 21px;">
                                <span>.</span><input type="text" id="show_search_notice" class="form-control"
                                                     placeholder="@lang('string.searchItems')" disabled="disabled">
                                <a class="btn btn-primary searchItemTakeOut"><i class="icon-filter3"></i></a>
                                {{--<a class="btn btn-primary search_item_notYetPay" style="margin-left: 15px;"><i class="icon-search4 position-left"></i>@lang('string.search')</a>--}}
                            </div>
                            <div class="col-sm-4 col-md-2" style="text-align: center;margin-bottom: 5px;">
                                <a class="btn btn-primary search_item_took" style="margin-top: 21px;"><i
                                            class="icon-search4 position-left"></i>@lang('string.search')</a>
                            </div>
                            {{--<div class="dataTables_length">--}}
                            {{--<div class="btn-group" style="margin-top: 20px;">--}}
                            {{--<button type="button" class="btn btn-success" id="createNewType">@lang('string.createNewItems')</button>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            <div class="datatable-header" style="margin-top: -19px;"></div>
                            <div class="datatable-scroll" style="overflow-x: hidden;">
                                <div class="dataTables_scroll">
                                    <!--============ scroll body oy trov 1 header table ===============-->
                                    <div class="dataTables_scrollBody"
                                         style="position: relative; overflow: auto; height: 400px; width: 100%;">
                                        <table class="table datatable-scroll-y table-hover dataTable no-footer"
                                               width="100%" id="Show_All_ItemOut" role="grid"
                                               aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                                            <thead style="background: #e3e3ea99;">
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="First Name: activate to sort column descending">@lang('string.invoiceID')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Last Name: activate to sort column ascending">@lang('string.typeItems')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice1')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice2')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice3')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice4')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Last Name: activate to sort column ascending">@lang('string.situation')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Last Name: activate to sort column ascending">@lang('string.actions')</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{--========================= footer of pagination ====================--}}
                            <div class="datatable-footer">
                                <div class="dataTables_info" id="DataTables_Table_3_info" role="status"
                                     aria-live="polite">ទំព័រ <b id="page2"></b> មាន <b id="first2"></b> ទំនិញទៅដល់ <b
                                            id="last2"></b> នៃចំនួនទំនិញទាំងអស់គឺ <b id="all2"></b></div>
                                <div class="dataTables_paginate paging_simple_numbers">
                                    <a class="paginate_button previous_show_invoice2" aria-controls="DataTables_Table_3"
                                       data-dt-idx="0" tabindex="0" style="display:none;">←</a>
                                    <span><a class="paginate_button current" id="Num_Page2"
                                             aria-controls="DataTables_Table_3" data-dt-idx="1" tabindex="0"></a></span>
                                    <a class="paginate_button next_show_invoice2" aria-controls="DataTables_Table_3"
                                       data-dt-idx="3" tabindex="0" style="display:none;">→</a>
                                </div>
                            </div>
                            {{--====================== End footer of pagination ====================--}}

                        </div>
                    </div>
                    {{----- Merl Item All -----}}
                    <div class="tab-pane" id="highlighted_tab3">
                        <div class="panel-body" style="padding: 10px;">
                            <div class="col-sm-3 col-md-3" style="display: flex;">
                                <div class="form-group" style="width: 100%;">
                                    <span>@lang('string.typeItems')</span>
                                    <select class="form-control" id="selectTomNanh2">

                                    </select>
                                </div>
                                <a class="btn btn-danger btn_clear_select2_3"
                                   style="margin-top: 20px;margin-bottom: 20px;"
                                   title="@lang('string.clearItemType')"><i class="icon-cross3"></i></a>
                            </div>
                            <div class="col-sm-2 col-md-2">
                                <span>@lang('string.situation')</span>
                                <div class="form-group">
                                    <select class="form-control" id="select_status_all">
                                        <option selected="selected" value="">@lang('string.all')</option>
                                        <option value="1">@lang('string.payYet')</option>
                                        <option value="2">@lang('string.saleAlready')</option>
                                        <option value="3">@lang('string.took')</option>
                                        <option value="4">@lang('string.saleOut')</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-4" style="display: flex;margin-top: 21px;">
                                <span>.</span><input type="text" class="form-control"
                                                     placeholder="@lang('string.searchItems')" id="all_notice_show"
                                                     disabled="disabled">
                                <a class="btn btn-primary btn_search_all_items"><i class="icon-filter3"></i></a>
                            </div>
                            <div class="col-sm-4 col-md-2"
                                 style="margin-top: 1px;text-align: center;margin-bottom: 5px;">
                                <a class="btn btn-primary search_item_history_oneInvoice" style="margin-top: 20px;"><i
                                            class="icon-search4 position-left"></i>@lang('string.search')</a>
                            </div>

                            {{--<div class="dataTables_length">--}}
                            {{--<div class="btn-group" style="margin-top: 20px;">--}}
                            {{--<button type="button" class="btn btn-success" id="createNewType">@lang('string.createNewItems')</button>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            <div class="datatable-header" style="margin-top: -19px;"></div>
                            <div class="datatable-scroll" style="overflow-x: hidden;">
                                <div class="dataTables_scroll">
                                    <!--============ scroll body oy trov 1 header table ===============-->
                                    <div class="dataTables_scrollBody"
                                         style="position: relative; overflow: auto; height: 400px; width: 100%;">
                                        <table class="table datatable-scroll-y table-hover dataTable no-footer"
                                               width="100%" id="Show_All_Items_Status" role="grid"
                                               aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                                            <thead style="background: #e3e3ea99;">
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="First Name: activate to sort column descending">@lang('string.invoiceID')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Last Name: activate to sort column ascending">@lang('string.typeItems')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice1')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice2')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice3')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice4')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Last Name: activate to sort column ascending">@lang('string.situation')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Last Name: activate to sort column ascending">@lang('string.actions')</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{--========================= footer of pagination ====================--}}
                            <div class="datatable-footer">
                                <div class="dataTables_info" id="DataTables_Table_3_info" role="status"
                                     aria-live="polite">ទំព័រ <b id="page3"></b> មាន <b id="first3"></b> ទំនិញទៅដល់ <b
                                            id="last3"></b> នៃចំនួនទំនិញទាំងអស់គឺ <b id="all3"></b></div>
                                <div class="dataTables_paginate paging_simple_numbers">
                                    <a class="paginate_button previous_show_invoice3" aria-controls="DataTables_Table_3"
                                       data-dt-idx="0" tabindex="0" style="display:none;">←</a>
                                    <span><a class="paginate_button current" id="Num_Page3"
                                             aria-controls="DataTables_Table_3" data-dt-idx="1" tabindex="0"></a></span>
                                    <a class="paginate_button next_show_invoice3" aria-controls="DataTables_Table_3"
                                       data-dt-idx="3" tabindex="0" style="display:none;">→</a>
                                </div>
                            </div>
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
                                            <label class="control-label col-lg-3"
                                                   style="font-size: 15px">@lang('string.invoiceID')</label>
                                            <div class="col-lg-9" style="margin-bottom: 13px;">
                                                <input type="text" class="form-control" disabled="disabled"
                                                       placeholder="....." style="border: 1px solid grey;"
                                                       id="setInvoiceId">
                                            </div>
                                            {{-- type of item --}}
                                            <label class="control-label col-lg-3"
                                                   style="font-size: 15px">@lang('string.groupItem')</label>
                                            <div class="col-lg-9" style="margin-bottom: 13px;">
                                                <input type="text" class="form-control" disabled="disabled"
                                                       placeholder="....." style="border: 1px solid grey;"
                                                       id="setNameItemType">
                                            </div>
                                            {{-- som kol 1 --}}
                                            <label class="control-label col-lg-3"
                                                   style="font-size: 15px">@lang('string.notice')</label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="....." class="form-control"
                                                       style="border: 1px solid grey;" disabled="disabled"
                                                       id="setFirstNotice">
                                                <br>
                                            </div>
                                            {{-- som kol 2 --}}
                                            <label class="control-label col-lg-3" style="font-size: 15px"></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="....." class="form-control"
                                                       style="border: 1px solid grey;" disabled="disabled"
                                                       id="setSecondNotice">
                                                <br>
                                            </div>
                                            {{-- som kol 3 --}}
                                            <label class="control-label col-lg-3" style="font-size: 15px"></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="....." class="form-control"
                                                       style="border: 1px solid grey;" disabled="disabled"
                                                       id="setThirdNotice">
                                                <br>
                                            </div>
                                            {{-- som kol 4 --}}
                                            <label class="control-label col-lg-3" style="font-size: 15px"></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="....." class="form-control"
                                                       style="border: 1px solid grey;" disabled="disabled"
                                                       id="setFourthNotice">
                                                <br>
                                            </div>
                                            {{-- som kol 4 --}}
                                            <label class="control-label col-lg-3"
                                                   style="font-size: 15px">@lang('string.priceSaleOut')</label>
                                            <div class="col-lg-9">
                                                <input type="number" placeholder="@lang('string.addPriceHere...')"
                                                       id="price_sale_out" class="form-control"
                                                       style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" id="close_update_price" data-dismiss="modal"
                                style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i
                                    class="icon-arrow-left12 position-left"></i>@lang('string.cancel')</button>
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-primary btn_Sale_Out_ItemType"
                                style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;">
                            <b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{------------ dialog tver ka create new itemType ------------}}
    {{--<form role="form" action="" method="">--}}
    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
    {{--<div id="NewTypeDialog" class="modal fade">--}}
    {{--<div class="modal-dialog ">--}}
    {{--<div class="modal-content">--}}
    {{--<div class="modal-header bg-primary">--}}
    {{--<button type="button" class="close" id="close_createNewItem" data-dismiss="modal">&times;</button>--}}
    {{--<h5 class="modal-title">@lang('string.createNewItem')</h5>--}}
    {{--</div>--}}

    {{--<div class="modal-body">--}}
    {{--<div class="col-md-12">--}}
    {{--<div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">--}}
    {{--<div class="datatable-header">--}}
    {{--<div class="col-md-12">--}}
    {{--<div class="form-group">--}}
    {{--<label class="control-label col-lg-4" style="font-size: 15px;margin-top: 6px;">@lang('string.createItem')</label>--}}
    {{--<div class="col-lg-8" style="margin-bottom: 13px;">--}}
    {{--<input type="text" class="form-control" placeholder="@lang('string.writeNameOfItemHere...')" style="border: 1px solid grey;" id="itemType">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="modal-footer">--}}
    {{--<button type="button" class="btn btn-link" id="close_createNewItem" data-dismiss="modal" style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i class="icon-arrow-left12 position-left"></i>@lang('string.cancel')</button>--}}
    {{--{{ csrf_field() }}--}}
    {{--<button type="submit" class="btn btn-primary" id="create_update_rate_dialog" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px; display: none"><b>??????</b></button>--}}
    {{--<button type="button" class="btn btn-primary btn_create_new_item_type" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;"><b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</form>--}}

    {{------------ dialog search Item not Pay yet ------------}}
    <form>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="dialogSearchNotice" class="modal fade">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal">&times;
                        </button>
                        <h5 class="modal-title">@lang('string.ItemPayYet')</h5>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12">
                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">
                                <div class="datatable-header">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-lg-4"
                                                   style="font-size: 15px;margin-top: 6px;">@lang('string.invoiceID')</label>
                                            <div class="col-lg-8" style="margin-bottom: 13px;">
                                                {{--<input type="number" placeholder="@lang('string.SearchInvoiceID')" id="search_invoice" onkeydown="javascript: return event.keyCode == 69 ? false : true" style="display: block;width: 98%;height: 36px;padding: 7px 12px;font-size: 13px;color: #333333;background-color: #fff;border: 1px solid #0003;border-radius: 3px;border: 1px solid grey;margin-bottom: 5px;">--}}
                                                <input type="text" placeholder="@lang('string.SearchInvoiceID')"
                                                       id="search_invoice" class="form-control"
                                                       style="border: 1px solid grey;">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4"
                                                   style="font-size: 15px;margin-top: 6px;">@lang('string.notice')</label>
                                            <div class="col-lg-8" style="margin-bottom: 13px;">
                                                <input type="text" class="form-control"
                                                       placeholder="@lang('string.itemNotice1')"
                                                       style="border: 1px solid grey;" id="notice1"><br>
                                                <input type="text" class="form-control"
                                                       placeholder="@lang('string.itemNotice2')"
                                                       style="border: 1px solid grey;" id="notice2"><br>
                                                <input type="text" class="form-control"
                                                       placeholder="@lang('string.itemNotice3')"
                                                       style="border: 1px solid grey;" id="notice3"><br>
                                                <input type="text" class="form-control"
                                                       placeholder="@lang('string.itemNotice4')"
                                                       style="border: 1px solid grey;" id="notice4"><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal"
                                style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i
                                    class="icon-arrow-left12 position-left"></i>@lang('string.cancel')</button>
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-primary btn_search_Item_notYetPay"
                                style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;">
                            <b>@lang('string.search')</b><i class="icon-search4 position-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{------------ dialog search Item Take out ---------------}}
    <form>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="dialogSearchItemTakeOut" class="modal fade">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">@lang('string.ItemTookOut')</h5>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12">
                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">
                                <div class="datatable-header">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-lg-4"
                                                   style="font-size: 15px;margin-top: 6px;">@lang('string.invoiceID')</label>
                                            <div class="col-lg-8" style="margin-bottom: 13px;">
                                                {{--<input type="number" placeholder="@lang('string.SearchInvoiceID')" id="search_invoice1" onkeydown="javascript: return event.keyCode == 69 ? false : true" style="display: block;width: 98%;height: 36px;padding: 7px 12px;font-size: 13px;color: #333333;background-color: #fff;border: 1px solid #0003;border-radius: 3px;border: 1px solid grey;margin-bottom: 5px;">--}}
                                                <input type="text" placeholder="@lang('string.SearchInvoiceID')"
                                                       id="search_invoice1" class="form-control"
                                                       style="border: 1px solid grey;">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4"
                                                   style="font-size: 15px;margin-top: 6px;">@lang('string.notice')</label>
                                            <div class="col-lg-8" style="margin-bottom: 13px;">
                                                <input type="text" class="form-control"
                                                       placeholder="@lang('string.itemNotice1')"
                                                       style="border: 1px solid grey;" id="notice1_takeOut"><br>
                                                <input type="text" class="form-control"
                                                       placeholder="@lang('string.itemNotice2')"
                                                       style="border: 1px solid grey;" id="notice2_takeOut"><br>
                                                <input type="text" class="form-control"
                                                       placeholder="@lang('string.itemNotice3')"
                                                       style="border: 1px solid grey;" id="notice3_takeOut"><br>
                                                <input type="text" class="form-control"
                                                       placeholder="@lang('string.itemNotice4')"
                                                       style="border: 1px solid grey;" id="notice4_takeOut"><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal"
                                style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i
                                    class="icon-arrow-left12 position-left"></i>@lang('string.cancel')</button>
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-primary btn_Search_item_takeOut"
                                id="btn_Search_item_takeOut"
                                style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;">
                            <b>@lang('string.search')</b><i class="icon-search4 position-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{------------ dialog search Item All status -------------}}
    <form>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="dialogSearchAllStatus" class="modal fade">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal">&times;
                        </button>
                        <h5 class="modal-title">@lang('string.SearchItemAllStatus')</h5>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12">
                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">
                                <div class="datatable-header">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-lg-4"
                                                   style="font-size: 15px;margin-top: 6px;">@lang('string.invoiceID')</label>
                                            <div class="col-lg-8" style="margin-bottom: 13px;">
                                                {{--<input type="number" placeholder="@lang('string.SearchInvoiceID')" id="search_invoice2" onkeydown="javascript: return event.keyCode == 69 ? false : true" style="display: block;width: 98%;height: 36px;padding: 7px 12px;font-size: 13px;color: #333333;background-color: #fff;border: 1px solid #0003;border-radius: 3px;border: 1px solid grey;margin-bottom: 5px;">--}}
                                                <input type="text" placeholder="@lang('string.SearchInvoiceID')"
                                                       id="search_invoice2" class="form-control"
                                                       style="border: 1px solid grey;">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4"
                                                   style="font-size: 15px;margin-top: 6px;">@lang('string.notice')</label>
                                            <div class="col-lg-8" style="margin-bottom: 13px;">
                                                <input type="text" class="form-control"
                                                       placeholder="@lang('string.itemNotice1')"
                                                       style="border: 1px solid grey;" id="notice1_all"><br>
                                                <input type="text" class="form-control"
                                                       placeholder="@lang('string.itemNotice2')"
                                                       style="border: 1px solid grey;" id="notice2_all"><br>
                                                <input type="text" class="form-control"
                                                       placeholder="@lang('string.itemNotice3')"
                                                       style="border: 1px solid grey;" id="notice3_all"><br>
                                                <input type="text" class="form-control"
                                                       placeholder="@lang('string.itemNotice4')"
                                                       style="border: 1px solid grey;" id="notice4_all"><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal"
                                style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i
                                    class="icon-arrow-left12 position-left"></i>@lang('string.cancel')</button>
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-primary btn_Search_item_All_Status"
                                style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;">
                            <b>@lang('string.search')</b><i class="icon-search4 position-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-----  Dialog show detail history detail  -----}}
    <div id="show_detail_one_history_change_log" class="modal fade">
        <div class="modal-dialog modal-full" style="margin-left: auto;margin-right: auto;width: 79%;">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h5 class="modal-title">@lang('string.showDetailItemTypeInOneInvoice')</h5>
                </div>

                <div class="modal-body">
                    <div>
                        <div class="col-sm-12 col-md-10 col-md-offset-1" style="margin-top: -6px;margin-bottom: 0;">
                            <div class="col-sm-6 col-md-6">
                                <h5 style="display: inline-flex;"><p>@lang('string.invoiceID') ៖</p>
                                    <p id="invoiceID_" style="margin-left: 5px;"></p></h5>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <h5 style="display: inline-flex;"><p>@lang('string.type') ៖</p>
                                    <p id="type_" style="margin-left: 5px;"></p></h5>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <h5 style="display: inline-flex;"><p>@lang('string.notice') </p>
                                    <p id="notice_" style="margin-left: 5px;"></p></h5>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <h5 style="display: inline-flex;"><p>@lang('string.situationItemTypeOfOneInvoice') ៖</p>
                                    <p id="situationItemType_" style="margin-left: 5px;"></p></h5>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <h5 style="display: inline-flex;"><p>@lang('string.takeOutWithPrice') ៖</p>
                                    <p id="price_" style="margin-left: 5px;"></p></h5>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <h5 style="display: inline-flex;"><p>@lang('string.dayTakeIn') ៖</p>
                                    <p id="day_in_" style="margin-left: 5px;"></p></h5>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <h5 style="display: inline-flex;"><p>@lang('string.by') ៖</p>
                                    <p id="by1_" style="margin-left: 5px;"></p></h5>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <h5 style="display: inline-flex;"><p>@lang('string.dayTakeOut') ៖</p>
                                    <p id="day_out_" style="margin-left: 5px;"></p></h5>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <h5 style="display: inline-flex;"><p>@lang('string.by') ៖</p>
                                    <p id="by2_" style="margin-left: 5px;"></p></h5>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>

    <div id="loading" style="display: none;
    width: 249px;
    height: 120px;
    position: fixed;
    top: 50%;
    left: 50%;
    text-align:center;
    margin-left: -123px;
    margin-top: -100px;
    z-index:2;
    overflow: auto;">
        <div style="max-width: 255px;max-height: 120px;display: inline-flex;background: #fff;">
            <img style="max-height: 100px;max-width: 100px;" src="/assets/images/newLoading.gif"/>
            <p style="font-size: 30px;margin-top: 28px;">@lang('string.Loading...')</p>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ajaxStart(function () {
            $("#loading").show();
        });
        $(document).ajaxStop(function () {
            $("#loading").hide();
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // dialog take item sell ot
        $(document).on("click", "#ItemExpired", function () {
            $('#ExpieredItem').modal({
                backdrop: 'static'
            });
        });
        // create new item type
        //        $(document).on("click","#createNewType",function(){
        //            $('#NewTypeDialog').modal({
        //                backdrop: 'static'
        //            });
        //        });
        // filter search by notice
        $(document).on("click", ".btn-Search", function () {
            $('#dialogSearchNotice').modal({
                backdrop: 'static'
            });
        });
        // filter search ITem Take Out
        $(document).on("click", ".searchItemTakeOut", function () {
            $('#dialogSearchItemTakeOut').modal({
                backdrop: 'static'
            });
        });
        // filter search ITem All status
        $(document).on("click", ".btn_search_all_items", function () {
            $('#dialogSearchAllStatus').modal({
                backdrop: 'static'
            });
        });
        // ---- select 2 ----
        $("#selectTomNanh").select2({
            ajax: {
                method: "GET",
                url: "api/item_group?page_size=15",
                delay: 1000,
                data: function (params) {
                    if (params.term) { // if have user input key in input text it work the statement
                        query = {
                            search: params.term
                        };
                    } else {
                        query = {
                            search: ""
                        };
                    }
                    return query;
                },
                processResults: function (data) {
                    //console.log(data);
                    var GG = JSON.parse(data);
                    const result = $.map(GG.data.data, function (value) {
                        return {id: value.id, text: value.item_type_name, object: value}
                    });
                    return {
                        results: result,
                        "pagination": {
                            "more": false
                        }
                    }
                }
            }
        });
        $('#selectTomNanh').on('select2:select', function (e) {
            var data = e.params.data.object;
            updateNoticeInputPlaceHolder(data, FLAG.NOT_DEPRECIATION)
        });

        $("#selectTomNanh1").select2({
            ajax: {
                method: "GET",
                url: "api/item_group?page_size=15",
                delay: 1000,
                data: function (params) {
                    if (params.term) { // if have user input key in input text it work the statement
                        query = {
                            search: params.term
                        };
                    } else {
                        query = {
                            search: ""
                        };
                    }
                    return query;
                },
                processResults: function (data) {
                    //console.log(data);
                    var GG = JSON.parse(data);
                    const result = $.map(GG.data.data, function (value) {
                        return {id: value.id, text: value.item_type_name, object: value}
                    });
                    return {
                        results: result,
                        "pagination": {
                            "more": false
                        }
                    }
                }
            }
        });
        $('#selectTomNanh1').on('select2:select', function (e) {
            var data = e.params.data.object;
            updateNoticeInputPlaceHolder(data, FLAG.OUT_ITEM)
        });


        $("#selectTomNanh2").select2({
            ajax: {
                method: "GET",
                url: "api/item_group?page_size=15",
                delay: 1000,
                data: function (params) {
                    if (params.term) { // if have user input key in input text it work the statement
                        query = {
                            search: params.term
                        };
                    } else {
                        query = {
                            search: ""
                        };
                    }
                    return query;
                },
                processResults: function (data) {
                    //console.log(data);
                    var GG = JSON.parse(data);
                    const result = $.map(GG.data.data, function (value) {
                        return {id: value.id, text: value.item_type_name, object: value}
                    });
                    return {
                        results: result,
                        "pagination": {
                            "more": false
                        }
                    }
                }
            }
        });
        $('#selectTomNanh2').on('select2:select', function (e) {
            var data = e.params.data.object;
            updateNoticeInputPlaceHolder(data, FLAG.ALL_ITEM)
        });
        // ---- end select 2 ----
        //create new item type, and ,close dialog clear input
        /*$(document).on("click","#close_createNewItem",function () {
            $('#itemType').val('');
        });
        $(document).on("click",".btn_create_new_item_type",function () {
            var storeInput = $('#itemType').val();
            if (storeInput === ""){
                alert('បំពេញសិន មុនពេលធ្វើការបង្កើត');
            } else {
                $.ajax({
                    type: "POST",
                    url: 'api/item_group',
                    data: {"item_type_name": storeInput},
                    success: function (response) {
                        var convert = JSON.parse(response);
                        if (convert.status === "200") {
                            alert('ធ្វើការបង្កើតរួចរាល់');
                            document.getElementById("close_createNewItem").click();
                        } else if (convert.status === "301") {
                            alert('ឈ្មោះមានរួចហើយ សូមធ្វើការបញ្ចូលម្តងទៀត');
                        }
                    }
                });
            }
        });*/
        // ===================== All Function do ton nenh min ton lus only ===============================
        var storeValue;

        function ModelShowInTable(getJsonValue) {
            storeValue = JSON.parse(getJsonValue);
            document.getElementById("page1").innerHTML = storeValue.data.current_page;
            document.getElementById("first1").innerHTML = storeValue.data.from;
            document.getElementById("last1").innerHTML = storeValue.data.to;
            document.getElementById("all1").innerHTML = storeValue.data.total;
            document.getElementById("Num_Page1").innerHTML = storeValue.data.current_page;

            if (storeValue.data.last_page === 1) {
                $('.previous_show_invoice').hide();
                $('.next_show_invoice').hide();
            } else {
                $('.previous_show_invoice').show();
                $('.next_show_invoice').show();
            }

            for (var i = 0; i < storeValue.data.data.length; i++) {
                var _tr = '<tr>' +
                    '<td>' + storeValue.data.data[i].display_invoice_id + '</td>' +
                    '<td>' + storeValue.data.data[i].item_type_name + '</td>' +
                    '<td>' + storeValue.data.data[i].first_feature + '</td>' +
                    '<td>' + storeValue.data.data[i].second_feature + '</td>' +
                    '<td>' + storeValue.data.data[i].third_feature + '</td>' +
                    '<td>' + storeValue.data.data[i].fourth_feature + '</td>' +
                    '</tr>';
                $('#Show_All_Item_Pay_Yet tbody').append(_tr);
            }
        }

        // ------------ define class constructor ---------------
        function ItemPayYet(methods, linkUrl) {
            this.method = methods;
            this.urls = linkUrl;
        }

        // ------------ ajax request to server -----------------
        ItemPayYet.prototype.reads = function () {
            $.ajax({
                type: this.method,
                url: this.urls,
                success: function (ResponseJson) {
                    //console.log(ResponseJson);
                    ModelShowInTable(ResponseJson);
                }
            });
        };
        // ----------- function show item pay yet --------------
        (function () {
            var showItemNotYetPay = new ItemPayYet("GET", 'api/item?search=&item_type=&status=1&page_size=15');
            showItemNotYetPay.reads();
        })();
        // -------------- click tap ti 1 ----------------------
        /*$(document).on("click","#tab_show_itemType_notYetPay",function () {
            clearTimeout(timeout1);
            timeout1 = setTimeout(function () {
                $('#Show_All_Item_Pay_Yet td').remove();
                var showItemNotYetPay = new ItemPayYet("GET" , 'api/item?search=&item_type=&status=1&page_size=15');
                showItemNotYetPay.reads();
            }, 500);
        });*/
        // -------------- search btn when select2 choose --------------
        $(document).on("click", ".search_item_notYetPay", function () {
            var storeItemType = $('#selectTomNanh').val();
            if (storeItemType === null) {
                storeID_ItemType = ""
            } else {
                storeID_ItemType = storeItemType
            }
            var storeInvoiceId = $('#search_invoice').val();
            var storeNotice1 = $('#notice1').val();
            var storeNotice2 = $('#notice2').val();
            var storeNotice3 = $('#notice3').val();
            var storeNotice4 = $('#notice4').val();
            var plusNoticeAll = '' + storeInvoiceId + ',' + storeNotice1 + ',' + storeNotice2 + ',' + storeNotice3 + ',' + storeNotice4 + '';
            var url = 'api/item?search=' + plusNoticeAll + '&item_type=' + storeID_ItemType + '&status=1&page_size=15';
            clearTimeout(timeout1);
            timeout1 = setTimeout(function () {
                $('#Show_All_Item_Pay_Yet td').remove();
                var searchItemPayYet = new ItemPayYet("GET", url);
                searchItemPayYet.reads();
            }, 1000);
        });
        // -------------- button search notice all itemType -----------
        var timeout1 = null, storeID_ItemType, ID, n1, n2, n3, n4;
        $(document).on("click", ".btn_search_Item_notYetPay", function () {
            var storeItemType = $('#selectTomNanh').val();
            if (storeItemType === null) {
                storeID_ItemType = ""
            } else {
                storeID_ItemType = storeItemType
            }
            var storeInvoiceId = $('#search_invoice').val();
            var storeNotice1 = $('#notice1').val();
            var storeNotice2 = $('#notice2').val();
            var storeNotice3 = $('#notice3').val();
            var storeNotice4 = $('#notice4').val();
            var plusNoticeAll = '' + storeInvoiceId + ',' + storeNotice1 + ',' + storeNotice2 + ',' + storeNotice3 + ',' + storeNotice4 + '';

            if (!storeInvoiceId) {
                ID = "";
            } else {
                ID = " " + storeInvoiceId + ",";
            }
            if (!storeNotice1) {
                n1 = "";
            } else {
                n1 = " " + storeNotice1 + ",";
            }
            if (!storeNotice2) {
                n2 = "";
            } else {
                n2 = " " + storeNotice2 + ",";
            }
            if (!storeNotice3) {
                n3 = "";
            } else {
                n3 = " " + storeNotice3 + ",";
            }
            if (!storeNotice4) {
                n4 = "";
            } else {
                n4 = " " + storeNotice4 + ",";
            }
            $('#store_search').val(ID + n1 + n2 + n3 + n4);

            var url = 'api/item?search=' + plusNoticeAll + '&item_type=' + storeID_ItemType + '&status=1&page_size=15';
            clearSearchNotice();
            clearTimeout(timeout1);
            timeout1 = setTimeout(function () {
                $('#Show_All_Item_Pay_Yet td').remove();
                var searchItemPayYet = new ItemPayYet("GET", url);
                searchItemPayYet.reads();
            }, 1000);
        });
        // --------------- click back -----------------------------------
        $(".previous_show_invoice").click(function () {
            var url = storeValue.data.prev_page_url;
            if (storeValue.data.prev_page_url === null) {
                alert('មិនអាចខ្លីកត្រលប់បានទេ ពីព្រោះគឺជាទំព័រដំបូង');
            } else {
                $('#Show_All_Item_Pay_Yet td').remove();
                var clickBack = new ItemPayYet("GET", url);
                clickBack.reads();
            }
        });
        // --------------- click next -----------------------------------
        $(".next_show_invoice").click(function () {
            var url = storeValue.data.next_page_url;
            if (storeValue.data.next_page_url === null) {
                alert('មិនអាចខ្លីកទៅទៀតបានទេ ពីព្រោះគឺជាទំព័រចុងក្រោយ');
            } else {
                $('#Show_All_Item_Pay_Yet td').remove();
                var clickNext = new ItemPayYet("GET", url);
                clickNext.reads();
            }
        });

        // --------------- clear input text notice ---------------------
        function clearSearchNotice() {
            $('#close_search_notice').click();
            $('#close_itemTakeOut').click();
            $('#close_item_all_status').click();
        }


        // ===================== All Function do ton nenh duch only ==========================================
        // ------------ show in table --------------------------
        var ConvertJson, StoreElement;

        function ModelShowItemExpired(getJsonValue) {
            ConvertJson = JSON.parse(getJsonValue);
            document.getElementById("page2").innerHTML = ConvertJson.data.current_page;
            document.getElementById("first2").innerHTML = ConvertJson.data.from;
            document.getElementById("last2").innerHTML = ConvertJson.data.to;
            document.getElementById("all2").innerHTML = ConvertJson.data.total;
            document.getElementById("Num_Page2").innerHTML = ConvertJson.data.current_page;

            if (ConvertJson.data.last_page === 1) {
                $('.previous_show_invoice2').hide();
                $('.next_show_invoice2').hide();
            } else {
                $('.previous_show_invoice2').show();
                $('.next_show_invoice2').show();
            }

            for (var i = 0; i < ConvertJson.data.data.length; i++) {
                // ---- condition if item not yet sel out or not ----
                if (ConvertJson.data.data[i].status === 2 || ConvertJson.data.data[i].status === 4) {
                    StoreElement = "";
                } else {
                    StoreElement = '<li id="ItemExpired"><a><i class="icon-cart-remove"></i>@lang('string.saleOut')</a></li>';
                }
                var _tr = '<tr>' +
                    '<td style="display:none;">' + ConvertJson.data.data[i].id + '</td>' +
                    '<td>' + ConvertJson.data.data[i].display_invoice_id + '</td>' +
                    '<td>' + ConvertJson.data.data[i].item_type_name + '</td>' +
                    '<td>' + ConvertJson.data.data[i].first_feature + '</td>' +
                    '<td>' + ConvertJson.data.data[i].second_feature + '</td>' +
                    '<td>' + ConvertJson.data.data[i].third_feature + '</td>' +
                    '<td>' + ConvertJson.data.data[i].fourth_feature + '</td>' +
                    '<td>' + ConvertJson.data.data[i].display_status + '</td>' +
                    '<td class="text-center"> ' +
                    '<ul class="icons-list">' +
                    '<li class="dropdown">' +
                    '<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">' +
                    '<i class="icon-menu9"></i>' +
                    '</a>' +
                    '<ul class="dropdown-menu dropdown-menu-right">' +
                        @if(\Illuminate\Support\Facades\Auth::user()->role == \App\Http\Controllers\Base\Model\Enum\UserRoleEnum::ADMIN)
                            StoreElement +
                        @endif
                            '</ul>' +
                    '</li>' +
                    '</ul>' +
                    '</td>' +
                    '</tr>';
                $('#Show_All_ItemOut tbody').append(_tr);
            }
        }

        // ------------ define class constructor ---------------
        function ItemExpired(methods, linkUrl) {
            this.method = methods;
            this.urls = linkUrl;
        }

        // ------------ ajax request to server -----------------
        ItemExpired.prototype.reads = function () {
            $.ajax({
                type: this.method,
                url: this.urls,
                success: function (ResponseJson) {
                    //console.log(ResponseJson);
                    ModelShowItemExpired(ResponseJson);
                }
            });
        };
        (function () {
            var showItemExpired = new ItemExpired("GET", 'api/item?search=&item_type=&status=3,4&page_size=15');
            showItemExpired.reads();
        })();
        // ------- function show item out click tap ti 2 -------
        /*$(document).on("click","#tab_show_took_itemType",function () {
            clearTimeout(timeout1);
            timeout1 = setTimeout(function () {
                $('#Show_All_ItemOut td').remove();
                var showItemExpired = new ItemExpired("GET" , 'api/item?search=&item_type=&status=3,4&page_size=15');
                showItemExpired.reads();
            }, 500);
        });*/
        // ------------- search btn took -----------------------
        $(document).on("click", ".search_item_took", function () {
            var storeSelectItemType_Id = $('#selectTomNanh1').val();
            var storeStatus = $('#select_status').val();
            if (storeSelectItemType_Id === null) {
                ItemType_ID = ""
            } else {
                ItemType_ID = storeSelectItemType_Id
            }
            var storeInvoiceID = $('#search_invoice1').val();
            var storeNotice_1 = $('#notice1_takeOut').val();
            var storeNotice_2 = $('#notice2_takeOut').val();
            var storeNotice_3 = $('#notice3_takeOut').val();
            var storeNotice_4 = $('#notice4_takeOut').val();
            var NoticeAll = '' + storeInvoiceID + ',' + storeNotice_1 + ',' + storeNotice_2 + ',' + storeNotice_3 + ',' + storeNotice_4 + '';
            var url = 'api/item?search=' + NoticeAll + '&item_type=' + ItemType_ID + '&status=' + storeStatus + '&page_size=15';
            clearTimeout(timeout1);
            timeout1 = setTimeout(function () {
                $('#Show_All_ItemOut td').remove();
                var searchItemTookOut = new ItemExpired("GET", url);
                searchItemTookOut.reads();
            }, 1000);
        });
        // ------------- search item take out ------------------
        var ItemType_ID, _ID, _n1, _n2, _n3, _n4;
        $(document).on("click", ".btn_Search_item_takeOut", function () {
            var storeSelectItemType_Id = $('#selectTomNanh1').val();
            if (storeSelectItemType_Id === null) {
                ItemType_ID = ""
            } else {
                ItemType_ID = storeSelectItemType_Id
            }
            var storeStatus = $('#select_status').val();
            var storeInvoiceID = $('#search_invoice1').val();
            var storeNotice_1 = $('#notice1_takeOut').val();
            var storeNotice_2 = $('#notice2_takeOut').val();
            var storeNotice_3 = $('#notice3_takeOut').val();
            var storeNotice_4 = $('#notice4_takeOut').val();
            var NoticeAll = '' + storeInvoiceID + ',' + storeNotice_1 + ',' + storeNotice_2 + ',' + storeNotice_3 + ',' + storeNotice_4 + '';

            if (!storeInvoiceID) {
                _ID = "";
            } else {
                _ID = " " + storeInvoiceID + ",";
            }
            if (!storeNotice_1) {
                _n1 = "";
            } else {
                _n1 = " " + storeNotice_1 + ",";
            }
            if (!storeNotice_2) {
                _n2 = "";
            } else {
                _n2 = " " + storeNotice_2 + ",";
            }
            if (!storeNotice_3) {
                _n3 = "";
            } else {
                _n3 = " " + storeNotice_3 + ",";
            }
            if (!storeNotice_4) {
                _n4 = "";
            } else {
                _n4 = " " + storeNotice_4 + ",";
            }
            $('#show_search_notice').val(_ID + _n1 + _n2 + _n3 + _n4);

            var url = 'api/item?search=' + NoticeAll + '&item_type=' + ItemType_ID + '&status=' + storeStatus + '&page_size=15';
            clearSearchNotice(); // clear input when search already in dialog
            clearTimeout(timeout1);
            timeout1 = setTimeout(function () {
                $('#Show_All_ItemOut td').remove();
                var searchItemTookOut = new ItemExpired("GET", url);
                searchItemTookOut.reads();
            }, 1000);
        });
        // --------------- click back -----------------------------------
        $(".previous_show_invoice2").click(function () {
            var url = ConvertJson.data.prev_page_url;
            if (ConvertJson.data.prev_page_url === null) {
                alert('មិនអាចខ្លីកត្រលប់បានទេ ពីព្រោះគឺជាទំព័រដំបូង');
            } else {
                $('#Show_All_ItemOut td').remove();
                var clickBack = new ItemExpired("GET", url);
                clickBack.reads();
            }
        });
        // --------------- click next -----------------------------------
        $(".next_show_invoice2").click(function () {
            var url = ConvertJson.data.next_page_url;
            if (ConvertJson.data.next_page_url === null) {
                alert('មិនអាចខ្លីកទៅទៀតបានទេ ពីព្រោះគឺជាទំព័រចុងក្រោយ');
            } else {
                $('#Show_All_ItemOut td').remove();
                var clickNext = new ItemExpired("GET", url);
                clickNext.reads();
            }
        });
        // --------------- button sale item out -------------------------
        var _selectRow = null;
        $(document).on("click", "#ItemExpired", function () {
            _selectRow = $(this).closest('tr');
            var _storeIDInvoice = $(_selectRow).find('td:eq(1)').text();
            var _storeNameItemType = $(_selectRow).find('td:eq(2)').text();
            var _storeNotice1 = $(_selectRow).find('td:eq(3)').text();
            var _storeNotice2 = $(_selectRow).find('td:eq(4)').text();
            var _storeNotice3 = $(_selectRow).find('td:eq(5)').text();
            var _storeNotice4 = $(_selectRow).find('td:eq(6)').text();
            (function () {
                $('#setInvoiceId').val(_storeIDInvoice);
                $('#setNameItemType').val(_storeNameItemType);
                $('#setFirstNotice').val(_storeNotice1);
                $('#setSecondNotice').val(_storeNotice2);
                $('#setThirdNotice').val(_storeNotice3);
                $('#setFourthNotice').val(_storeNotice4);
            })();
        });
        $(document).on("click", ".btn_Sale_Out_ItemType", function () {
            var storePrice = $('#price_sale_out').val();
            var storeIdItemType = $(_selectRow).find('td:eq(0)').text();
            if (storePrice > 0) {
                var storeJson = {"sale_price": storePrice};
                $.ajax({
                    type: "PUT",
                    url: 'api/item/sale/' + storeIdItemType + '',
                    data: storeJson,
                    success: function (Response) {
                        var Json = JSON.parse(Response);
                        if (Json.status === "200") {
                            alert('ធ្វើការលក់ចេញជោគជ័យ');
                            $('#btn_Search_item_takeOut').click();
                            $('#close_update_price').click();
                        } else if (Json.status === "300") {
                            alert('ទំនិញនេះមិនអាចលក់ចេញបានទេ');
                        }
                    }
                });
            } else {
                alert('បញ្ចូលតំលៃ អោយធំជាង 0');
            }
        });
        // ---- clear all input text when sell item out ----
        $(document).on("click", "#close_update_price", function () {
            $('#setInvoiceId').val('');
            $('#setNameItemType').val('');
            $('#setFirstNotice').val('');
            $('#setSecondNotice').val('');
            $('#setThirdNotice').val('');
            $('#setFourthNotice').val('');
            $('#price_sale_out').val(''); // clear input price sale out
        });

        // ===================== All Function notice all item  =============================================
        // ------------ show in table -----------------------------------
        var ConvertJsons;

        function ModelShowItemAllStatus(getJsonValue) {
            ConvertJsons = JSON.parse(getJsonValue);
            document.getElementById("page3").innerHTML = ConvertJsons.data.current_page;
            document.getElementById("first3").innerHTML = ConvertJsons.data.from;
            document.getElementById("last3").innerHTML = ConvertJsons.data.to;
            document.getElementById("all3").innerHTML = ConvertJsons.data.total;
            document.getElementById("Num_Page3").innerHTML = ConvertJsons.data.current_page;

            if (ConvertJsons.data.last_page === 1) {
                $('.previous_show_invoice3').hide();
                $('.next_show_invoice3').hide();
            } else {
                $('.previous_show_invoice3').show();
                $('.next_show_invoice3').show();
            }

            for (var i = 0; i < ConvertJsons.data.data.length; i++) {
                var _tr = '<tr>' +
                    '<td style="display:none;">' + ConvertJsons.data.data[i].in_date + '</td>' +
                    '<td style="display:none;">' + ConvertJsons.data.data[i].in_user + '</td>' +
                    '<td style="display:none;">' + ConvertJsons.data.data[i].out_date + '</td>' +
                    '<td style="display:none;">' + ConvertJsons.data.data[i].user_id + '</td>' +
                    '<td style="display:none;">' + ConvertJsons.data.data[i].sale_price + '</td>' +
                    '<td>' + ConvertJsons.data.data[i].display_invoice_id + '</td>' +
                    '<td>' + ConvertJsons.data.data[i].item_type_name + '</td>' +
                    '<td>' + ConvertJsons.data.data[i].first_feature + '</td>' +
                    '<td>' + ConvertJsons.data.data[i].second_feature + '</td>' +
                    '<td>' + ConvertJsons.data.data[i].third_feature + '</td>' +
                    '<td>' + ConvertJsons.data.data[i].fourth_feature + '</td>' +
                    '<td>' + ConvertJsons.data.data[i].display_status + '</td>' +
                    '<td class="text-center"> ' +
                    '<ul class="icons-list">' +
                    '<li class="dropdown">' +
                    '<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">' +
                    '<i class="icon-menu9"></i>' +
                    '</a>' +
                    '<ul class="dropdown-menu dropdown-menu-right">' +
                    '<li id="detail_invoice"><a><i class="icon-certificate"></i>@lang('string.details')</a></li>' +
                    '</ul>' +
                    '</li>' +
                    '</ul>' +
                    '</td>' +
                    '</tr>';
                $('#Show_All_Items_Status tbody').append(_tr);
            }
        }

        // ------------ define class constructor ---------------
        function ItemAllStatus(methods, linkUrl) {
            this.method = methods;
            this.urls = linkUrl;
        }

        // ------------ ajax request to server -----------------
        ItemAllStatus.prototype.reads = function () {
            $.ajax({
                type: this.method,
                url: this.urls,
                success: function (ResponseJson) {
                    //console.log(ResponseJson);
                    ModelShowItemAllStatus(ResponseJson);
                }
            });
        };
        (function () {
            var showItemStatus = new ItemAllStatus("GET", 'api/item?search=&item_type=&status=&page_size=15');
            showItemStatus.reads();
        })();
        // ------- function show item all click tap ti 3 --------
        /*$(document).on("click","#tab_show_reportItemType",function () {
            clearTimeout(timeout1);
            timeout1 = setTimeout(function () {
                $('#Show_All_Items_Status td').remove();
                var showItemStatus = new ItemAllStatus("GET" , 'api/item?search=&item_type=&status=&page_size=15');
                showItemStatus.reads();
            }, 500);
        });*/
        // ------- search btn search history -------------------
        $(document).on("click", ".search_item_history_oneInvoice", function () {
            var storeSelectItemType_Id_all = $('#selectTomNanh2').val();
            if (storeSelectItemType_Id_all === null) {
                ItemType_ID_all = ""
            } else {
                ItemType_ID_all = storeSelectItemType_Id_all
            }
            var storeStatus_all = $('#select_status_all').val();
            var storeInvoice_ID = $('#search_invoice2').val();
            var storeNotice_1_all = $('#notice1_all').val();
            var storeNotice_2_all = $('#notice2_all').val();
            var storeNotice_3_all = $('#notice3_all').val();
            var storeNotice_4_all = $('#notice4_all').val();
            var Notice_all = '' + storeInvoice_ID + ',' + storeNotice_1_all + ',' + storeNotice_2_all + ',' + storeNotice_3_all + ',' + storeNotice_4_all + '';
            var url = 'api/item?search=' + Notice_all + '&item_type=' + ItemType_ID_all + '&status=' + storeStatus_all + '&page_size=15';
            clearTimeout(timeout1);
            timeout1 = setTimeout(function () {
                $('#Show_All_Items_Status td').remove();
                var searchItemAllStatus = new ItemAllStatus("GET", url);
                searchItemAllStatus.reads();
            }, 1000);
        });
        // ------------- search all status ---------------------
        var ItemType_ID_all, _ID_, _n1_, _n2_, _n3_, _n4_;
        $(document).on("click", ".btn_Search_item_All_Status", function () {
            var storeSelectItemType_Id_all = $('#selectTomNanh2').val();
            if (storeSelectItemType_Id_all === null) {
                ItemType_ID_all = ""
            } else {
                ItemType_ID_all = storeSelectItemType_Id_all
            }
            var storeStatus_all = $('#select_status_all').val();
            var storeInvoice_ID = $('#search_invoice2').val();
            var storeNotice_1_all = $('#notice1_all').val();
            var storeNotice_2_all = $('#notice2_all').val();
            var storeNotice_3_all = $('#notice3_all').val();
            var storeNotice_4_all = $('#notice4_all').val();
            var Notice_all = '' + storeInvoice_ID + ',' + storeNotice_1_all + ',' + storeNotice_2_all + ',' + storeNotice_3_all + ',' + storeNotice_4_all + '';

            if (!storeInvoice_ID) {
                _ID_ = "";
            } else {
                _ID_ = " " + storeInvoice_ID + ",";
            }
            if (!storeNotice_1_all) {
                _n1_ = "";
            } else {
                _n1_ = " " + storeNotice_1_all + ",";
            }
            if (!storeNotice_2_all) {
                _n2_ = "";
            } else {
                _n2_ = " " + storeNotice_2_all + ",";
            }
            if (!storeNotice_3_all) {
                _n3_ = "";
            } else {
                _n3_ = " " + storeNotice_3_all + ",";
            }
            if (!storeNotice_4_all) {
                _n4_ = "";
            } else {
                _n4_ = " " + storeNotice_4_all + ",";
            }
            $('#all_notice_show').val(_ID_ + _n1_ + _n2_ + _n3_ + _n4_);

            var url = 'api/item?search=' + Notice_all + '&item_type=' + ItemType_ID_all + '&status=' + storeStatus_all + '&page_size=15';
            clearSearchNotice(); // clear input when search already in dialog
            clearTimeout(timeout1);
            timeout1 = setTimeout(function () {
                $('#Show_All_Items_Status td').remove();
                var searchItemAllStatus = new ItemAllStatus("GET", url);
                searchItemAllStatus.reads();
            }, 1000);
        });
        // --------------- click back -----------------------------------
        $(".previous_show_invoice3").click(function () {
            var url = ConvertJsons.data.prev_page_url;
            if (ConvertJsons.data.prev_page_url === null) {
                alert('មិនអាចខ្លីកត្រលប់បានទេ ពីព្រោះគឺជាទំព័រដំបូង');
            } else {
                $('#Show_All_Items_Status td').remove();
                var clickBack = new ItemAllStatus("GET", url);
                clickBack.reads();
            }
        });
        // --------------- click next -----------------------------------
        $(".next_show_invoice3").click(function () {
            var url = ConvertJsons.data.next_page_url;
            if (ConvertJsons.data.next_page_url === null) {
                alert('មិនអាចខ្លីកទៅទៀតបានទេ ពីព្រោះគឺជាទំព័រចុងក្រោយ');
            } else {
                $('#Show_All_Items_Status td').remove();
                var clickNext = new ItemAllStatus("GET", url);
                clickNext.reads();
            }
        });
        // ---- click show dialog detail history for item in one invoice ----
        $(document).on("click", "#detail_invoice", function () {
            $('#show_detail_one_history_change_log').modal({backdrop: 'static'}); // show dialog
            var _selectRow = $(this).closest('tr');
            var storeValueNoticeAll = '' + $(_selectRow).find('td:eq(7)').text() + ' , ' + $(_selectRow).find('td:eq(8)').text() + ' , ' + $(_selectRow).find('td:eq(9)').text() + ' , ' + $(_selectRow).find('td:eq(10)').text() + '';
            (function () {
                $('#invoiceID_').text($(_selectRow).find('td:eq(5)').text());
                $('#type_').text($(_selectRow).find('td:eq(6)').text());
                $('#notice_').text(storeValueNoticeAll);
                $('#situationItemType_').text($(_selectRow).find('td:eq(11)').text());
                $('#price_').text($(_selectRow).find('td:eq(4)').text());
                $('#day_in_').text($(_selectRow).find('td:eq(0)').text());
                $('#by1_').text($(_selectRow).find('td:eq(1)').text());
                $('#day_out_').text($(_selectRow).find('td:eq(2)').text());
                $('#by2_').text($(_selectRow).find('td:eq(3)').text());
            })();
        });

        // ------------ clear select 2 when user choose itemType all 3 tap --------
        $('.btn_clear_select2_1').on("click", function () {
            $('#selectTomNanh').val('').trigger('change');
            $('#selectTomNanh').text('').trigger('change');
            updateNoticeInputPlaceHolder({}, FLAG.NOT_DEPRECIATION);
        });
        $('.btn_clear_select2_2').on("click", function () {
            $('#selectTomNanh1').val('').trigger('change');
            $('#selectTomNanh1').text('').trigger('change');
            updateNoticeInputPlaceHolder({}, FLAG.OUT_ITEM);
        });
        $('.btn_clear_select2_3').on("click", function () {
            $('#selectTomNanh2').val('').trigger('change');
            $('#selectTomNanh2').text('').trigger('change');
            updateNoticeInputPlaceHolder({}, FLAG.ALL_ITEM);
        });

        //====================================== ADD BY SOTHEA =================================================================

        //Get Note Input Id
        const FLAG = {NOT_DEPRECIATION: 1, OUT_ITEM: 2, ALL_ITEM: 3};

        //Get Notice Input ID
        function getNoteInputId(flag) {
            //Default
            first_note_input = "notice1";
            second_note_input = "notice2";
            third_note_input = "notice3";
            fourth_note_input = "notice4";
            //
            if (flag === FLAG.OUT_ITEM || flag === FLAG.ALL_ITEM) {
                first_note_input = (flag === FLAG.OUT_ITEM) ? "notice1_takeOut" : "notice1_all";
                second_note_input = (flag === FLAG.OUT_ITEM) ? "notice2_takeOut" : "notice2_all";
                third_note_input = (flag === FLAG.OUT_ITEM) ? "notice3_takeOut" : "notice3_all";
                fourth_note_input = (flag === FLAG.OUT_ITEM) ? "notice4_takeOut" : "notice4_all";
            }
            //
            return [first_note_input, second_note_input, third_note_input, fourth_note_input];
        }

        //Update Notice Input Placeholder
        function updateNoticeInputPlaceHolder(object, flag) {
            let first = (object.first_note) ? object.first_note : "កំណត់សម្កាល់ 1";
            let second = (object.second_note) ? object.second_note : "កំណត់សម្កាល់ 2";
            let third = (object.third_note) ? object.third_note : "កំណត់សម្កាល់ 3";
            let fourth = (object.fourth_note) ? object.fourth_note : "កំណត់សម្កាល់ 4";
            notices = [first, second, third, fourth];
            console.log(notices);
            //
            inputIdArray = getNoteInputId(flag);
            //
            for (i = 0; i < inputIdArray.length; i++) {
                $('#' + inputIdArray[i]).attr('placeholder', notices[i]);
            }
        }
    </script>
@endsection
