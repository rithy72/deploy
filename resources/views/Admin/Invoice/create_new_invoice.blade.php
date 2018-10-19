@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <!--<h6 class="panel-title">Default panel</h6>-->
            <ul class="breadcrumb breadcrumb-caret position-right">
                <li><a href="{{('/admin/mainform')}}" style="color: #2577e1;"><span>@lang('string.mainForm')</span></a>
                </li>
                <li><a href="{{('/admin/invoice')}}" style="color: #2577e1;"><span>@lang('string.invoice')</span></a>
                </li>
                <li class="active"><span>@lang('string.createNew')</span></li>
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
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-3" style="font-size: 15px">@lang('string.nameCustomer') ៖</label>
                    <div class="col-md-9">
                        <input type="text" placeholder="@lang('string.writeCustomerNameHere...')" name=""
                               id="customer_name" class="form-control" style="border: 1px solid grey;">
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-3" style="font-size: 15px">@lang('string.phoneNumber') ៖</label>
                    <div class="col-md-9">
                        <input type="text" placeholder="@lang('string.writePhoneNumberHere...')" name=""
                               id="customer_phone_number" class="form-control" style="border: 1px solid grey;">
                        <br>
                    </div>
                </div>
            </div>
            {{--<div class="col-xs-12 .col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-3" style="font-size: 15px">@lang('string.dayGetMoney')</label>
                    <div class="col-md-9">
                        <input type="date" name="" id="" class="form-control" style="border: 1px solid grey;">
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 .col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-3" style="font-size: 15px">@lang('string.expiredDay')</label>
                    <div class="col-md-9">
                        <input type="date" name="" id="" class="form-control" style="border: 1px solid grey;">
                        <br>
                    </div>
                </div>
            </div>--}}
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-3" style="font-size: 15px">អត្រាការប្រាក់ ៖</label>
                    <div class="col-md-9">
                        <select class="form-control" id="kar_brak" name="">
                            <option selected="selected" value=""></option>
                            <option value="2">2 %</option>
                            <option value="3">3 %</option>
                            <option value="4">4 %</option>
                            <option value="5">5 %</option>
                            <option value="6">6 %</option>
                            <option value="7">7 %</option>
                            <option value="8">8 %</option>
                            <option value="9">9 %</option>
                            <option value="10">10 %</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="datatable-header" style="margin-top: -25px;">
            <legend style="font-size: 17px;"><b style="margin-left: 16px;">ទំនិញបញ្ចាំ</b></legend>

            <div class="dataTables_length" id="DataTables_Table_3_length"
                 style="margin-top: -14px;margin-bottom: 7px;margin-right: 13px;">
                <a class="btn btn-success" id="add_item"><i
                            class="icon-add position-left"></i>@lang('string.addMoreItems')</a>
            </div>
        </div>
        <div class="datatable-scroll" style="overflow-x: hidden;">
            <div class="dataTables_scroll">
                <!--============ scroll body oy trov 1 header table ===============-->
                <div class="dataTables_scrollBody"
                     style="position: relative; overflow: auto; height: 250px; width: 100%;">
                    <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%"
                           id="Show_Item_Type" role="grid" aria-describedby="DataTables_Table_3_info"
                           style="width: 100%;">
                        <thead style="background: #e3e3ea99;">
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="First Name: activate to sort column descending">@lang('string.id')</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1"
                                aria-label="Last Name: activate to sort column ascending">@lang('string.groupItem')</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1"
                                aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice1')</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1"
                                aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice2')</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1"
                                aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice3')</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1"
                                aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice4')</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1"
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
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div style="text-align: right;clear: both;">
                    <div class="col-xs-0 col-sm-3 col-md-5"></div>
                    <div class="col-xs-12 col-sm-9 col-md-7" style="display: flex;">
                        <label class="control-label col-xs-4 col-sm-4 col-md-4" style="font-size: 15px; margin-top: 6px;margin-right: 5px;"><b>@lang('string.amountPrice')៖</b></label>

                        <input type="text" placeholder="បញ្ចូលតំលៃទីនេះ..." name="" id="priceAmount" class="form-control col-xs-8 col-md-8" style="border: 1px solid grey;">
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <hr>
                <div  style="margin-top: -14px;margin-bottom: 7px;float:right;">
                    <a href="{{('/admin/invoice')}}" class="btn" style="border: 1px solid;width: 110px;"><i class="icon-arrow-left12 position-left"></i><b>@lang('string.cancel')</b></a>
                    <button type="button" class="btn btn-primary" id="btnSentToServer" style="width: 110px; border: 1px solid black;"><b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>
                </div>
                {{--<div class="dataTables_length" id="DataTables_Table_3_length" style="margin-top: -14px;margin-bottom: 7px;margin-right: 13px;">--}}
                    {{--<a href="{{('/admin/invoice')}}" class="btn" style="border: 1px solid;width: 110px;"><i class="icon-arrow-left12 position-left"></i><b>@lang('string.cancel')</b></a>--}}
                {{--</div>--}}
            </div>

            {{--<div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_3_paginate">
                <div class="col-xs-12 .col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="control-label col-md-3" style="font-size: 15px"><b>ថ្ងៃទទួល ៖</b></label>
                        <div class="col-md-9">
                            <input type="text" placeholder="បញ្ចូលតំលៃទីនេះ..." name="" id="" class="form-control" style="border: 1px solid grey;">
                            <br>
                        </div>
                    </div>
                </div>
            </div>--}}
        </div>
        {{--====================== End footer of pagination ====================--}}
        {{--btn hide and use javascript to click auto for show dialog create new item type--}}
        <input type="button" class="btn_show_invoice_numbers" id="btn_show_invoice_numbers" style="display: none;">
    </div>

    {{--====================== add more item to invoice ====================--}}
    <div id="add_more_item_to_invoice" class="modal fade">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close close_update_rate1" id="close_update_rate1" data-dismiss="modal">
                        &times;
                    </button>
                    <h5 class="modal-title">@lang('string.addMoreItemsToInvoice')</h5>
                </div>

                <div class="modal-body">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">
                            <div class="datatable-header" style="margin-top: -40px;">
                                <div class="">
                                    <div class="form-group">
                                        {{--Group Of Items--}}
                                        <label class="control-label col-md-3"
                                               style="font-size: 15px">@lang('string.groupItem')</label>
                                        <div class="col-md-9" style="margin-bottom: 13px;display: flex;">
                                            <select class="form-control" id="selectTomNanh">

                                            </select>
                                            <button type="button" class="btn btn-success btn-icon btn-rounded"
                                                    title="បង្កើតប្រភេទទំនិញថ្មី" id="createNewTypeItem"><i
                                                        class="icon-plus3"></i></button>
                                        </div>
                                        {{--<div class="col-lg-2" style="margin-bottom: 13px;">
                                            <button type="button" class="btn btn-success btn-icon btn-rounded" title="បង្កើតប្រភេទទំនិញថ្មី" id="createNewTypeItem"><i class="icon-plus3"></i></button>
                                        </div>--}}
                                        {{--Number som Kol--}}
                                        <label class="control-label col-md-3"
                                               style="font-size: 15px">@lang('string.notice')</label>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="@lang('string.itemNotice1')" name=""
                                                   id="notice1" class="form-control" style="border: 1px solid grey;">
                                            <br>
                                        </div>
                                        {{--full name--}}
                                        <label class="control-label col-md-3" style="font-size: 15px"></label>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="@lang('string.itemNotice2')" name=""
                                                   id="notice2" class="form-control" style="border: 1px solid grey;">
                                            <br>
                                        </div>
                                        {{--phone number--}}
                                        <label class="control-label col-md-3" style="font-size: 15px"></label>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="@lang('string.itemNotice3')" name=""
                                                   id="notice3" class="form-control" style="border: 1px solid grey;">
                                            <br>
                                        </div>
                                        {{--Cost--}}
                                        <label class="control-label col-md-3" style="font-size: 15px"></label>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="@lang('string.itemNotice4')" name=""
                                                   id="notice4" class="form-control" style="border: 1px solid grey;">
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link close_update_rate1" id="close_update_rate1"
                            data-dismiss="modal"
                            style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i
                                class="icon-arrow-left12 position-left"></i>@lang('string.cancel')</button>
                    {{ csrf_field() }}
                    <button type="button" class="btn btn-primary btn_add_item_type_to_table"
                            style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;">
                        <b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>
                </div>
            </div>
        </div>
    </div>
    {{--====================== update item to invoice ====================--}}
    <form role="form" action="" method="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="update_item_in_invoice" class="modal fade">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close close_update_rate1" id="close_update_rate1"
                                data-dismiss="modal">&times;
                        </button>
                        <h5 class="modal-title">@lang('string.updateItemsOfInvoice')</h5>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12">
                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">
                                <div class="datatable-header" style="margin-top: -40px;">
                                    <div class="">
                                        <div class="form-group">
                                            {{--Group Of Items--}}
                                            <label class="control-label col-md-3"
                                                   style="font-size: 15px">@lang('string.groupItem')</label>
                                            <div class="col-md-9" style="margin-bottom: 13px;display: flex;">
                                                <select class="form-control" id="selectTomNanh1" name="">

                                                </select>
                                                <button type="button" class="btn btn-success btn-icon btn-rounded"
                                                        title="បង្កើតប្រភេទទំនិញថ្មី" id="createNewTypeItem"><i
                                                            class="icon-plus3"></i></button>
                                            </div>
                                            {{--Number som Kol--}}
                                            <label class="control-label col-md-3"
                                                   style="font-size: 15px">@lang('string.notice')</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="@lang('string.itemNotice1')" name=""
                                                       id="notice_1" class="form-control"
                                                       style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            <input type="text" id="numberAuto" style="display: none;">
                                            <input type="text" id="storeNameITemType" style="display: none;">
                                            <input type="text" id="storeUniqueIDItemType" style="display: none;">
                                            {{--full name--}}
                                            <label class="control-label col-md-3" style="font-size: 15px"></label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="@lang('string.itemNotice2')" name=""
                                                       id="notice_2" class="form-control"
                                                       style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--phone number--}}
                                            <label class="control-label col-md-3" style="font-size: 15px"></label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="@lang('string.itemNotice3')" name=""
                                                       id="notice_3" class="form-control"
                                                       style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--Cost--}}
                                            <label class="control-label col-md-3"
                                                   style="font-size: 15px"><b></b></label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="@lang('string.itemNotice4')" name=""
                                                       id="notice_4" class="form-control"
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
                        <button type="button" class="btn btn-link close_update_rate1" id="close_update_rate1"
                                data-dismiss="modal"
                                style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i
                                    class="icon-arrow-left12 position-left"></i>@lang('string.cancel')</button>
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-primary btn_item_type_update"
                                style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;">
                            <b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-----   Create New Type Of Item   -----}}
    <form role="form" action="" method="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="createNewTomNanh" class="modal fade">
            <div class="modal-dialog ">
                <div class="modal-content" style="box-shadow: -3px 50px 164px 110px #0006;">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" id="close_createNewItem" data-dismiss="modal">&times;
                        </button>
                        <h5 class="modal-title">@lang('string.createNewItems')</h5>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12">
                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">
                                <div class="datatable-header" style="margin-top: -40px;">
                                    <div class="">
                                        <div class="form-group">
                                            <label class="control-label col-lg-3"
                                                   style="font-size: 15px">@lang('string.newTypeItem')</label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="@lang('string.addNewTypeItemHere...')"
                                                       name="" id="new_item_type" class="form-control"
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
                        <a type="button" class="btn btn-link" id="close_createNewItem" data-dismiss="modal"
                           style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i
                                    class="icon-arrow-left12 position-left"></i>@lang('string.cancel')</a>
                        {{ csrf_field() }}
                        {{--<button type="submit" class="btn btn-primary" id="create_update_rate_dialog" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px; display: none"><b>បោះបង់</b></button>--}}
                        <button type="button" class="btn btn-primary btn_create_new_item_type"
                                style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;">
                            <b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-----  Dialog show number of invoice   -----}}
    <div id="show_invoice_numbers" class="modal fade">
        <div class="modal-dialog ">
            <div class="modal-content" style="box-shadow: -3px 50px 164px 110px #0006;">
                <div class="modal-header bg-primary">
                    <button id="close_redirect" type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">@lang('string.createSuccess')</h5>
                </div>

                <div class="modal-body">
                    <div class="col-md-12">
                        <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">
                            <div class="datatable-header" style="margin-top: -40px;">
                                <div class="">
                                    <div class="form-group">
                                        <label class="control-label col-lg-6"
                                               style="font-size: 15px">@lang('string.This_Is_Invoice_Numbers')</label>
                                        <div class="col-lg-6">
                                            <h5 style="margin-top: 0px;"><b id="numberInvoice"></b></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                </div>
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
        // dialog add item to invoice
        $(document).on("click", "#add_item", function () {
            $('#add_more_item_to_invoice').modal({
                backdrop: 'static'
            });
        });
        // dialog update ka add item to invoice
        $(document).on("click", "#update_item", function () {
            $('#update_item_in_invoice').modal({
                backdrop: 'static'
            });
        });
        // dialog show invoice numbers
        $(document).on("click", "#btn_show_invoice_numbers", function () {
            $('#show_invoice_numbers').modal({
                backdrop: 'static'
            });
        });
        // dialog show create new item
        $(document).on("click", "#createNewTypeItem", function () {
            $('#createNewTomNanh').modal({
                backdrop: 'static'
            });
        });

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

        // select group of item
        $("#selectTomNanh").select2({
            ajax: {
                method: "GET",
                url: "../api/item_group?page_size=15",
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
            updateNoticeInputPlaceHolder(data, FLAG.ADD)
        });

        // select item in one group
        $("#selectTomNanh1").select2({
            ajax: {
                method: "GET",
                url: "../api/item_group?page_size=15",
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
            updateNoticeInputPlaceHolder(data, FLAG.UPDATE)
        });

        //create new item type, and ,close dialog clear input
        $(document).on("click", "#close_createNewItem", function () {
            $('#new_item_type').val('');
        });
        $(document).on("click", ".btn_create_new_item_type", function () {
            var storeInput = $('#new_item_type').val();
            if (storeInput === "") {
                alert('បំពេញសិន មុនពេលធ្វើការបង្កើត');
            } else {
                $.ajax({
                    type: "POST",
                    url: '../api/item_group',
                    data: {"item_type_name": storeInput},
                    success: function (response) {
                        var convert = JSON.parse(response);
                        if (convert.status === "200") {
                            alert('ធ្វើការបង្កើតរួចរាល់');
                            $('#new_item_type').val('');
                            document.getElementById("close_createNewItem").click();
                        } else if (convert.status === "301") {
                            alert('ឈ្មោះមានរួចហើយ សូមធ្វើការបញ្ចូលម្តងទៀត');
                        }
                    }
                });
            }
        });

        //Add Item Into Table
        var TableData = new Array();
        var ind = 0; // store auto increment in table
        $(document).on("click", ".btn_add_item_type_to_table", function () {
            if ($('#selectTomNanh').val() === null) {
                alert('បញ្ចូលនិងជ្រើសរើសឈ្មោះទំនិញ');
            } else {
                if ($('#notice1').val() === "") {
                    alert('សូមមេត្តាបញ្ជូលកំណត់សំគាល់យ៉ាងហោចណាស់ ១');
                } else {
                    var storeSelect2 = $('#selectTomNanh').val();     // store value from select 2
                    //var storeSelectText = $('#selectTomNanh').text();     // store text from select 2
                    var storeSelectText = $("#selectTomNanh option:selected").text();     // store text from select 2
                    var _Notice1 = $('#notice1').val();
                    var _Notice2 = $('#notice2').val();
                    var _Notice3 = $('#notice3').val();
                    var _Notice4 = $('#notice4').val();

                    var _tr = '<tr>' +
                        '<td style="display:none;">' + storeSelect2 + '</td>' +
                        '<td>' + [ind = ind + 1] + '</td>' +
                        '<td>' + storeSelectText + '</td>' +
                        '<td>' + _Notice1 + '</td>' +
                        '<td>' + _Notice2 + '</td>' +
                        '<td>' + _Notice3 + '</td>' +
                        '<td>' + _Notice4 + '</td>' +
                        '<td class="text-center"> ' +
                        '<ul class="icons-list">' +
                        '<li class="dropdown">' +
                        '<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">' +
                        '<i class="icon-menu9"></i>' +
                        '</a>' +
                        '<ul class="dropdown-menu dropdown-menu-right">' +
                        '<li id="update_item"><a><i class="icon-pencil7"></i>@lang('string.update')</a></li>' +
                        '<li id="delete_item"><a><i class="icon-trash"></i>@lang('string.delete')</a></li>' +
                        '</ul>' +
                        '</li>' +
                        '</ul>' +
                        '</td>' +
                        '</tr>';
                    $('#selectTomNanh').val('').trigger('change');
                    $('#selectTomNanh').text('').trigger('change');
                    //Clear Input
                    clearNoticeInput(FLAG.ADD);
                    //Update PlaceHolder
                    updateNoticeInputPlaceHolder({}, FLAG.ADD);
                    //
                    $('tbody').append(_tr);
                    $('tbody tr').each(function (row, tr) {
                        TableData[row] = {
                            "item_type_id": $(tr).find('td:eq(0)').text(),
                            "first_feature": $(tr).find('td:eq(3)').text(),
                            "second_feature": $(tr).find('td:eq(4)').text(),
                            "third_feature": $(tr).find('td:eq(5)').text(),
                            "fourth_feature": $(tr).find('td:eq(6)').text()
                        }
                    });
                    //console.log(JSON.stringify(TableData));
                }
            }
        });

        //Select Item and Pass Edit Paramter to Dialog
        var _selectRow = null;
        $(document).on("click", "#update_item", function () {
            _selectRow = $(this).closest('tr');
            var _storeID = $(_selectRow).find('td:eq(0)').text();
            var _storeNumberAuto = $(_selectRow).find('td:eq(1)').text();
            var _storeNameItemType = $(_selectRow).find('td:eq(2)').text();
            var _storeNotice1 = $(_selectRow).find('td:eq(3)').text();
            var _storeNotice2 = $(_selectRow).find('td:eq(4)').text();
            var _storeNotice3 = $(_selectRow).find('td:eq(5)').text();
            var _storeNotice4 = $(_selectRow).find('td:eq(6)').text();
            //updateNoticeInputPlaceHolder(itemTypeObj, FLAG.UPDATE);
            (function () {
                var $option = $("<option selected></option>").val(_storeID).text(_storeNameItemType);
                $('#selectTomNanh1').append($option).trigger('change');
                $('#selectTomNanh1').text(_storeNameItemType);
                $('#numberAuto').val(_storeNumberAuto); // store value auto ( hide it )
                $('#storeNameITemType').val(_storeNameItemType); // store value text from select2 for update ( hide it )
                $('#storeUniqueIDItemType').val(_storeID); // store unique id item type ( hide it )
                $('#notice_1').val(_storeNotice1);
                $('#notice_2').val(_storeNotice2);
                $('#notice_3').val(_storeNotice3);
                $('#notice_4').val(_storeNotice4);
                //Find Item Type, Then Update Place Holder
                findItemType(_storeID, function (e) {
                    updateNoticeInputPlaceHolder(e, FLAG.UPDATE);
                });
            })();
        });

        // update item type to table
        var storeSelect2, storeSelectText;
        $(document).on("click", ".btn_item_type_update", function () {
            // if ($('#selectTomNanh1').val() === null){
            //     alert('បញ្ចូលនិងជ្រើសរើសឈ្មោះទំនិញ');
            // } else {
            if ($('#notice_1').val() === "") {
                alert('សូមមេត្តាបញ្ជូលកំណត់សំគាល់យ៉ាងហោចណាស់ ១');
            } else {
                if ($('#selectTomNanh1').val() === null) {
                    storeSelect2 = $('#storeUniqueIDItemType').val();     // store id from select 2
                    storeSelectText = $('#storeNameITemType').val();     // store text from select 2
                } else {
                    storeSelect2 = $('#selectTomNanh1').val();     // store value from select 2
                    storeSelectText = $("#selectTomNanh1 option:selected").text();     // store text from select 2
                }


                var _AutoNumber = $('#numberAuto').val();   // store auto increment
                var _Notice1 = $('#notice_1').val();
                var _Notice2 = $('#notice_2').val();
                var _Notice3 = $('#notice_3').val();
                var _Notice4 = $('#notice_4').val();

                if (confirm('តើអ្នកច្បាស់ឬអតក្នុងការកែប្រែវា')) {
                    $(_selectRow).find('td:eq(0)').text(storeSelect2);
                    $(_selectRow).find('td:eq(1)').text(_AutoNumber);
                    $(_selectRow).find('td:eq(2)').text(storeSelectText);
                    $(_selectRow).find('td:eq(3)').text(_Notice1);
                    $(_selectRow).find('td:eq(4)').text(_Notice2);
                    $(_selectRow).find('td:eq(5)').text(_Notice3);
                    $(_selectRow).find('td:eq(6)').text(_Notice4);
                }

                //document.getElementById("close_update_rate").click(); // click cancel clear all input and select2
                $('.close_update_rate1').click();

                $('tbody tr').each(function (row, tr) {
                    TableData[row] = {
                        "item_type_id": $(tr).find('td:eq(0)').text(),
                        "first_feature": $(tr).find('td:eq(3)').text(),
                        "second_feature": $(tr).find('td:eq(4)').text(),
                        "third_feature": $(tr).find('td:eq(5)').text(),
                        "fourth_feature": $(tr).find('td:eq(6)').text()
                    }
                });
                //console.log(JSON.stringify(TableData));
            }
            // }
        });
        // close update and insert item type in table
        $(document).on("click", "#close_update_rate1", function () {
            // clear insert item type
            $('#selectTomNanh').val('').trigger('change');
            $('#selectTomNanh').text('').trigger('change');
            clearNoticeInput(FLAG.ADD);

            // clear update item type
            $('#selectTomNanh1').val('').trigger('change');
            $('#selectTomNanh1').text('').trigger('change');
            $('#numberAuto').val('');
            clearNoticeInput(FLAG.UPDATE);
        });
        // delete item type in table
        $(document).on("click", "#delete_item", function () {
            if (confirm('តើអ្នកច្បាស់ដែរឬទេក្នុងការលុបវាចោល')) {
                // =========== delete item in json array =================
                var _selectRow = $(this).closest('tr').remove();
                var _storeID = $(_selectRow).find('td:eq(0)').text();
                for (var i = 0; i < TableData.length; i++) {
                    if (TableData[i].item_type_id === _storeID) {
                        TableData.splice(i, 1);
                    }
                }
                //console.log(JSON.stringify(TableData));
            }
        });
        // btn sent to server
        $(document).on("click", '#btnSentToServer', function () {

            var customerName = $('#customer_name').val();
            var customerPhoneNumber = $('#customer_phone_number').val();
            var kar_brak = $('#kar_brak').val();
            var price_amount = $('#priceAmount').val();
            if (!customerName) {
                alert('ត្រួបំពេញឈ្មោះ អតិថិជន ជាមុនសិន');
            } else {
                var StoreJson = {
                    "customer_name": customerName,
                    "customer_phone": customerPhoneNumber,
                    "grand_total": price_amount,
                    "interests_rate": kar_brak,
                    "invoice_items": TableData
                };
                $.ajax({
                    type: "POST",
                    url: "../api/invoice",
                    data: StoreJson,
                    success: function (Response) {
                        //console.log(Response);
                        var ConvertJson = JSON.parse(Response);
                        if (ConvertJson.status === "200") {
                            document.getElementById("btn_show_invoice_numbers").click();
                            (function () {
                                document.getElementById("numberInvoice").innerHTML = ConvertJson.data;
                            })();
                        } else if (ConvertJson.status === "400") {
                            alert('ព័ណមានមិនគ្រប់គ្រាន់ទេ សូមពិនិត្រឡើងវិញ');
                        }
                    }
                });
            }
        });
        // close dialog show invoice ID
        $(document).on("click", "#close_redirect", function () {
            window.location.href = '{{('/admin/invoice')}}';
        });

//====================================== ADD BY SOTHEA =================================================================

        //Get Note Input Id
        const FLAG = {ADD: 1, UPDATE: 2};

        //Get Notice Input ID
        function getNoteInputId(flag) {
            let first_note_input = (flag === FLAG.ADD) ? "notice1" : "notice_1";
            let second_note_input = (flag === FLAG.ADD) ? "notice2" : "notice_2";
            let third_note_input = (flag === FLAG.ADD) ? "notice3" : "notice_3";
            let fourth_note_input = (flag === FLAG.ADD) ? "notice4" : "notice_4";
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
            for (i = 0; i < inputIdArray.length; i++){
                $('#'+inputIdArray[i]).attr('placeholder', notices[i]);
            }
        }

        //Clear All Input Text
        function clearNoticeInput(flag) {
            inputIdArray = getNoteInputId(flag);
            //
            for (i = 0; i < inputIdArray.length; i++){
                $('#'+inputIdArray[i]).val('');
            }
        }

        //Find Item Type By ID
        function findItemType(id, callback) {
            $.ajax({
                type: "GET",
                url:"../api/item_group/"+id,
                success: function(response){
                    jsonObj = JSON.parse(response);
                    //console.log(jsonObj.data);
                    obj = jsonObj.data;
                    callback(obj);
                }
            });
        }

    </script>
@endsection
