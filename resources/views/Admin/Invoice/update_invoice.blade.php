@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <!--<h6 class="panel-title">Default panel</h6>-->
            <ul class="breadcrumb breadcrumb-caret position-right">
                <li><a href="{{('/admin/mainform')}}" style="color: #2577e1;"><span>@lang('string.mainForm')</span></a></li>
                <li><a href="{{('/admin/invoice')}}" style="color: #2577e1;"><span>@lang('string.invoice')</span></a></li>
                <li class="active"><span>@lang('string.updateInvoice')</span></li>
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
                <div class="col-sm-12 col-md-8" style="margin-top: -20px;margin-bottom: 15px;">
                    <div class="col-sm-6 col-md-6">
                        <h3><b>@lang('string.invoiceId') ៖ </b><b id="invoice_id"></b></h3>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <h3><b>@lang('string.createBy') ៖ </b><b id="user_create"></b></h3>
                    </div>
                </div>
            </div>
            {{-- End --}}
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="control-label col-sm-3 col-md-3" style="font-size: 15px">@lang('string.nameCustomer')</label>
                    <div class="col-sm-9 col-md-9">
                        <input type="text" placeholder="@lang('string.writeCustomerNameHere...')" name="" id="customer_name" class="form-control" style="border: 1px solid grey;">
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="control-label col-sm-3 col-md-3" style="font-size: 15px">@lang('string.phoneNumber')</label>
                    <div class="col-sm-9 col-md-9">
                        <input type="text" placeholder="@lang('string.writePhoneNumberHere...')" name="" id="customer_phone_number" class="form-control" style="border: 1px solid grey;">
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="control-label col-sm-3 col-md-3" style="font-size: 15px">@lang('string.dayGetMoney')</label>
                    <div class="col-sm-9 col-md-9">
                        {{--<input type="date" name="" id="create_date" class="form-control" style="border: 1px solid grey;">--}}
                        <p id="create_date"></p>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="control-label col-sm-3 col-md-3" style="font-size: 15px">@lang('string.expiredDay')</label>
                    <div class="col-sm-9 col-md-9">
                        {{--<input type="date" name="" id="end_date" class="form-control" style="border: 1px solid grey;">--}}
                        <p id="end_date"></p>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="control-label col-sm-3 col-md-3" style="font-size: 15px">@lang('string.paymentTerm')</label>
                    <div class="col-sm-9 col-md-9">
                        <select class="form-control" id="percent_rate" name="">
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
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group col-md-12" style="display: inline-flex;">
                    <p style="margin-top: 7px;">@lang('string.priceAmountPerMonth')</p>
                    <p style="margin-top: 6px;margin-left: 30px;" id="interests_value"></p>
                </div>
            </div>
        </div>
        <div class="datatable-header" style="margin-top: -25px;">
            <legend style="font-size: 17px;margin-top: -25px;"><b style="margin-left: 16px;">ទំនិញបញ្ចាំ</b></legend>

            <div class="dataTables_length" id="DataTables_Table_3_length" style="margin-top: -14px;margin-bottom: 7px;margin-right: 13px;">
                <a class="btn btn-success createNewCountry" id="add_item"><i class="icon-add position-left" ></i>{{__('auth.addMoreItems')}}</a>
            </div>
        </div>
        <div class="datatable-scroll" style="overflow-x: hidden;">
            <div class="dataTables_scroll">
                <!--============ scroll body oy trov 1 header table ===============-->
                <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 250px; width: 100%;">
                    <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_ItemType" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                        <thead style="background: #e3e3ea99;">
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.id')</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.typeItems')</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice1')</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice2') </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice3')</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice4')</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.actions')</th>
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

                {{--<div style="text-align: right;clear: both;">
                    <label class="control-label col-md-6" style="font-size: 15px; margin-top: 6px;margin-right: 5px;"><b>@lang('string.amountPrice')</b></label>
                    <div class="col-md-6">
                        <input type="text" placeholder="@lang('string.addPriceHere...')" name="" id="amount_price" class="form-control" style="border: 1px solid grey;" disabled="disabled">
                        <br>
                    </div>
                </div>--}}

                <div style="text-align: right;clear: both;">
                    <div class="col-xs-0 col-sm-3 col-md-6"></div>
                    <div class="col-xs-12 col-sm-9 col-md-6" style="display: flex;">
                        <label class="control-label" style="font-size: 15px; margin-top: 6px;margin-right: 5px;"><b>@lang('string.amountPrice')</b></label>
                        <input type="text" placeholder="បញ្ចូលតំលៃទីនេះ..." name="" id="amount_price" class="form-control" style="border: 1px solid grey;" disabled="disabled">
                        <br>
                    </div>
                </div>
            </div>

            {{--<div class="col-md-12">
                <hr>
                <div class="dataTables_length" id="DataTables_Table_3_length" style="margin-top: -14px;margin-bottom: 7px;margin-right: 13px;">
                    <button type="button" class="btn btn-primary update_invoice" style="width: 110px; border: 1px solid black;"><b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>
                </div>
                <div class="dataTables_length" id="DataTables_Table_3_length" style="margin-top: -14px;margin-bottom: 7px;margin-right: 13px;">
                    <a href="{{('/admin/invoice')}}" class="btn createNewCountry" style="border: 1px solid;width: 110px;"><i class="icon-arrow-left12 position-left"></i><b>@lang('string.cancel')</b></a>
                </div>
            </div>--}}

            <div class="col-xs-12 col-sm-12 col-md-12">
                <hr>
                <div style="margin-top: -14px;margin-bottom: 7px;float: right;">
                    <a href="{{('/admin/invoice')}}" class="btn createNewCountry" style="border: 1px solid;width: 110px;"><i class="icon-arrow-left12 position-left"></i><b>@lang('string.cancel')</b></a>
                    <button type="button" class="btn btn-primary update_invoice" style="width: 110px; border: 1px solid black;"><b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>
                </div>
            </div>
        </div>
        {{--====================== End footer of pagination ====================--}}
        <input type="button" class="btn_show_invoice_numbers" id="btn_show_invoice_numbers" style="display: none;">
    </div>

    {{--====================== add more item to invoice ====================--}}
    <div id="add_more_item_to_invoice" class="modal fade">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close close_update_rate1" id="close_update_rate1" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">@lang('string.addMoreItemsToInvoice')</h5>
                </div>

                <div class="modal-body">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">
                            <div class="datatable-header" style="margin-top: -40px;">
                                <div class="">
                                    <div class="form-group">
                                        {{--Group Of Items--}}
                                        <label class="control-label col-md-3" style="font-size: 15px">@lang('string.groupItem')</label>
                                        <div class="col-md-9" style="margin-bottom: 13px;display: flex;">
                                            <select class="form-control" id="selectTomNanh" name="">

                                            </select>
                                            <button type="button" class="btn btn-success btn-icon btn-rounded" title="បង្កើតប្រភេទទំនិញថ្មី" id="createNewTypeItem"><i class="icon-plus3"></i></button>
                                        </div>
                                        {{--Number som Kol--}}
                                        <label class="control-label col-md-3" style="font-size: 15px">@lang('string.notice')</label>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="@lang('string.itemNotice1')" name="" id="notice1" class="form-control" style="border: 1px solid grey;">
                                            <br>
                                        </div>
                                        {{--full name--}}
                                        <label class="control-label col-md-3" style="font-size: 15px"></label>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="@lang('string.itemNotice2')" name="" id="notice2" class="form-control" style="border: 1px solid grey;">
                                            <br>
                                        </div>
                                        {{--phone number--}}
                                        <label class="control-label col-md-3" style="font-size: 15px"></label>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="@lang('string.itemNotice3')" name="" id="notice3" class="form-control" style="border: 1px solid grey;">
                                            <br>
                                        </div>
                                        {{--Cost--}}
                                        <label class="control-label col-md-3" style="font-size: 15px"></label>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="@lang('string.itemNotice4')" name="" id="notice4" class="form-control" style="border: 1px solid grey;">
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link close_update_rate1" id="close_update_rate1" data-dismiss="modal" style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i class="icon-arrow-left12 position-left"></i>@lang('string.cancel')</button>
                    {{ csrf_field() }}
                    <button type="button" class="btn btn-primary btn_add_item_type_to_table" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;"><b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>
                </div>
            </div>
        </div>
    </div>
    {{--====================== update item to invoice ======================--}}
    <form role="form" action="" method="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="update_item_in_invoice" class="modal fade">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close close_update_rate1" id="close_update_rate1" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">@lang('string.updateItemsOfInvoice')</h5>
                    </div>

                    <div class="modal-body">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">
                                <div class="datatable-header" style="margin-top: -40px;">
                                    <div class="">
                                        <div class="form-group">
                                            {{--Group Of Items--}}
                                            <label class="control-label col-md-3" style="font-size: 15px">@lang('string.groupItem')</label>
                                            <div class="col-md-9" style="margin-bottom: 13px;display: flex;">
                                                <select class="form-control" id="selectTomNanh1" name="">

                                                </select>
                                                <button type="button" class="btn btn-success btn-icon btn-rounded" title="បង្កើតប្រភេទទំនិញថ្មី" id="createNewTypeItem"><i class="icon-plus3"></i></button>
                                            </div>
                                            {{--Number som Kol--}}
                                            <label class="control-label col-md-3" style="font-size: 15px">@lang('string.notice')</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="@lang('string.itemNotice1')" name="" id="notice_1" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--<input type="text" id="numberAuto" style="display: none;">
                                            <input type="text" id="storeNameITemType" style="display: none;">
                                            <input type="text" id="storeUniqueIDItemType" style="display: none;">--}}
                                            {{--<input type="text" id="storeID" style="display: none;">
                                            <input type="text" id="num_conditions" style="display: none;">--}}
                                            {{--full name--}}
                                            <label class="control-label col-md-3" style="font-size: 15px"></label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="@lang('string.itemNotice2')" name="" id="notice_2" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--phone number--}}
                                            <label class="control-label col-md-3" style="font-size: 15px"></label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="@lang('string.itemNotice3')" name="" id="notice_3" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--Cost--}}
                                            <label class="control-label col-md-3" style="font-size: 15px"><b></b></label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="@lang('string.itemNotice4')" name="" id="notice_4" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link close_update_rate1" id="close_update_rate1" data-dismiss="modal" style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i class="icon-arrow-left12 position-left"></i>@lang('string.cancel')</button>
                        {{ csrf_field() }}
                        {{--<button type="submit" class="btn btn-primary" id="create_update_rate_dialog" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px; display: none"><b>បោះបង់</b></button>--}}
                        <button type="button" class="btn btn-primary btn_item_type_update" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;"><b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{--====================== Create New Type Of Item  ====================--}}
    <form role="form" action="" method="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div id="createNewTomNanh" class="modal fade">
        <div class="modal-dialog ">
            <div class="modal-content" style="box-shadow: -3px 50px 164px 110px #0006;">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" id="close_createNewItem" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">@lang('string.createNewItems')</h5>
                </div>

                <div class="modal-body">
                    <div class="col-md-12">
                        <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">
                            <div class="datatable-header" style="margin-top: -40px;">
                                <div class="">
                                    <div class="form-group">
                                        <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.newTypeItem')</label>
                                        <div class="col-lg-9">
                                            <input type="text" placeholder="@lang('string.addNewTypeItemHere...')" name="" id="new_item_type" class="form-control" style="border: 1px solid grey;">
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <a type="button" class="btn btn-link" id="close_createNewItem" data-dismiss="modal" style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i class="icon-arrow-left12 position-left"></i>@lang('string.cancel')</a>
                    {{ csrf_field() }}
                    {{--<button type="submit" class="btn btn-primary" id="create_update_rate_dialog" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px; display: none"><b>បោះបង់</b></button>--}}
                    <button type="button" class="btn btn-primary btn_create_new_item_type" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;"><b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>
                </div>
            </div>
        </div>
    </div>
    </form>

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
        $( document ).ajaxStart(function() {
            $( "#loading" ).show();
        });
        $( document ).ajaxStop(function() {
            $( "#loading" ).hide();
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // dialog add item to invoice
        $(document).on("click","#add_item",function(){
            $('#add_more_item_to_invoice').modal({
                backdrop: 'static'
            });
        });
        // dialog show create new item
        $(document).on("click","#createNewTypeItem",function(){
            $('#createNewTomNanh').modal({
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
            ajax: {
                method: "GET",
                url: "../api/item_group?page_size=15",
                delay: 1000,
                data: function (params) {
                    if (params.term){ // if have user input key in input text it work the statement
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
                        return {id: value.id, text: value.item_type_name}
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
        // select item in one group
        $("#selectTomNanh1").select2({
            ajax: {
                method: "GET",
                url: "../api/item_group?page_size=15",
                delay: 1000,
                data: function (params) {
                    if (params.term){ // if have user input key in input text it work the statement
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
                        return {id: value.id, text: value.item_type_name}
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

        //create new item type, and ,close dialog clear input
        $(document).on("click","#close_createNewItem",function () {
            $('#new_item_type').val('');
        });
        $(document).on("click",".btn_create_new_item_type",function () {
            var storeInput = $('#new_item_type').val();
            if (storeInput === ""){
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
                            document.getElementById("close_createNewItem").click();
                        } else if (convert.status === "301") {
                            alert('ឈ្មោះមានរួចហើយ សូមធ្វើការបញ្ចូលម្តងទៀត');
                        }
                    }
                });
            }
        });
        // ------------------ show data show in form update first ------------------
        // create function push data into table
        function show_data_in_table(id,id_itemtype,increment,name,notice1,notice2,notice3,notice4,conditionUpdate,conditionAddNew) {
            var _tr = '<tr>' +
                '<td style="display:none;">' + id + '</td>' +
                '<td style="display:none;">' + id_itemtype + '</td>' +
                '<td>' + increment + '</td>' +
                '<td>' + name + '</td>' +
                '<td>' + notice1 + '</td>' +
                '<td>' + notice2 + '</td>' +
                '<td>' + notice3 + '</td>' +
                '<td>' + notice4 + '</td>' +
                '<td class="text-center"> ' +
                '<ul class="icons-list">'+
                '<li class="dropdown">'+
                '<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">'+
                '<i class="icon-menu9"></i>'+
                '</a>'+
                '<ul class="dropdown-menu dropdown-menu-right">'+
                '<li id="update_item"><a><i class="icon-pencil7"></i>@lang('string.update')</a></li>'+
                '<li id="delete_item"><a><i class="icon-trash"></i>@lang('string.delete')</a></li>' +
                '</ul>'+
                '</li>'+
                '</ul>'+
                '</td>'+
                '<td style="display:none;">' + conditionUpdate + '</td>' +
                '<td style="display:none;">' + conditionAddNew + '</td>' +
                '</tr>';
            $('#Show_All_ItemType tbody').append(_tr);
        }
        // declare variable
        var ConvertJson, ConvertJsonArray, storeAutoEncretment = 0, storeOldArrayForDelete = new Array(), updateItemType = new Array();
        // function show data for update
        (function () {
            var _id = atob($.cookie("KeyInvoice")); // atob = decode from base64,  btoa = encode to base 64
            $.ajax({
                type: "GET",
                url: '../api/invoice/'+_id+'',
                success: function (response) {
                    //console.log(response);
                    ConvertJson = JSON.parse(response);
                    var a = ConvertJson.data; // store it short easy look

                    $('#invoice_id').text(a.display_id);
                    $('#user_create').text(a.user_full_name);

                    $('#customer_name').val(a.customer_name);
                    $('#customer_phone_number').val(a.customer_phone);

                    //const storeString = a.created_date;
                    //const splitString = storeString.split(" ");
                    //document.getElementById("create_date").value = splitString[0];
                    $('#create_date').text(a.created_date);
                    $('#end_date').text(a.expire_date);

                    $('#percent_rate').val(a.interests_rate);
                    $('#interests_value').text(a.interests_value+" $");
                    $('#amount_price').val(a.grand_total+" $");

                    // make array updateItemType have value
                    updateItemType.push({ "id": "", "item_type_id": "", "first_feature": "", "second_feature": "", "third_feature": "", "fourth_feature": "" });
                    // ajax request to get data show in table invoiceUpdate
                    $.ajax({
                        type: "GET",
                        url: '../api/item/invoice/'+_id+'',
                        success: function (response) {
                            console.log(response);
                            ConvertJsonArray = JSON.parse(response);
                            for (var i = 0; i < ConvertJsonArray.data.length; i++){
                                var short = ConvertJsonArray.data[i], notice1, notice2, notice3, notice4;
                                if (short.status === 1) {
                                storeAutoEncretment +=1; // store auto increment
                                // condition if null convert to empty
                                if (short.first_feature === null){notice1 = "";}else{notice1 = short.first_feature}
                                if (short.second_feature === null){notice2 = "";}else{notice2 = short.second_feature}
                                if (short.third_feature === null){notice3 = "";}else{notice3 = short.third_feature}
                                if (short.fourth_feature === null){notice4 = "";}else{notice4 = short.fourth_feature}
                                show_data_in_table(short.id,short.item_type_id,storeAutoEncretment,short.item_type_name,notice1,notice2,notice3,notice4,1,"");
                            }
                                // push to array make coditoin delete
                                storeOldArrayForDelete.push({"id":short.id});
                            }
                        }
                    });
                }
            });
        })();
        // ------------------- add more item type into table invoice ------------------
        var addMoreItemType = new Array();
        var number = 0;
        $(document).on("click",".btn_add_item_type_to_table",function () {
            if ($('#selectTomNanh').val() === null){
                alert('បញ្ចូលនិងជ្រើសរើសឈ្មោះទំនិញ');
            } else {
                if ($('#notice1').val() === ""){
                    alert('សូមមេត្តាបញ្ជូលកំណត់សំគាល់យ៉ាងហោចណាស់ ១');
                } else {
                    var storeID = $('#selectTomNanh').val();     // store value from select 2
                    var storeSelectText = $("#selectTomNanh option:selected").text();     // store text from select 2
                    var _Notice1 = $('#notice1').val();
                    var _Notice2 = $('#notice2').val();
                    var _Notice3 = $('#notice3').val();
                    var _Notice4 = $('#notice4').val();

                    show_data_in_table("",storeID,[storeAutoEncretment+=1],storeSelectText,_Notice1,_Notice2,_Notice3,_Notice4,2,number+=1);

                    $('#selectTomNanh').val('').trigger('change');
                    $('#selectTomNanh').text('').trigger('change');
                    $('#notice1').val('');
                    $('#notice2').val('');
                    $('#notice3').val('');
                    $('#notice4').val('');

                    addMoreItemType.push({
                        "item_type_id": storeID,
                        "first_feature": _Notice1,
                        "second_feature": _Notice2,
                        "third_feature": _Notice3,
                        "fourth_feature": _Notice4,
                        "condition": number
                    });
                    //console.log(JSON.stringify(addMoreItemType));
                }
            }
        });
        // ------------ close update and insert item type in table -----------------
        $(document).on("click","#close_update_rate1", function () {
            // clear insert item type
            $('#selectTomNanh').val('').trigger('change');
            $('#selectTomNanh').text('').trigger('change');
            $('#notice1').val('');
            $('#notice2').val('');
            $('#notice3').val('');
            $('#notice4').val('');

            // clear update item type
            $('#selectTomNanh1').val('').trigger('change');
            $('#selectTomNanh1').text('').trigger('change');
            //$('#numberAuto').val('');
            $('#notice_1').val('');
            $('#notice_2').val('');
            $('#notice_3').val('');
            $('#notice_4').val('');
        });
        // -------------- update item type of invoice -------------------------------
        var _selectRow = null;
        $(document).on("click","#update_item",function () {
            _selectRow = $(this).closest('tr');
            //var _storeID = $(_selectRow).find('td:eq(0)').text();
            var _storeIDItemType = $(_selectRow).find('td:eq(1)').text();

            var _storeNumberAuto = $(_selectRow).find('td:eq(2)').text();
            var _storeNameItemType = $(_selectRow).find('td:eq(3)').text();
            var _storeNotice1 = $(_selectRow).find('td:eq(4)').text();
            var _storeNotice2 = $(_selectRow).find('td:eq(5)').text();
            var _storeNotice3 = $(_selectRow).find('td:eq(6)').text();
            var _storeNotice4 = $(_selectRow).find('td:eq(7)').text();
            //var _condition = $(_selectRow).find('td:eq(9)').text();

            (function(){
                var $option = $("<option selected></option>").val(_storeIDItemType).text(_storeNameItemType);
                $('#selectTomNanh1').append($option).trigger('change');
                $('#notice_1').val(_storeNotice1);
                $('#notice_2').val(_storeNotice2);
                $('#notice_3').val(_storeNotice3);
                $('#notice_4').val(_storeNotice4);
            })();
        });
        // ----------------- button update -----------------------
        var storeSelect2, storeSelectText;
        $(document).on("click",".btn_item_type_update",function () {
            if ($('#notice_1').val() === ""){
                alert('សូមមេត្តាបញ្ជូលកំណត់សំគាល់យ៉ាងហោចណាស់ ១');
            } else {
                if ($('#selectTomNanh1').val() === null){
                    storeSelect2 = $(_selectRow).find('td:eq(1)').text();     // store id from item type
                    storeSelectText = $(_selectRow).find('td:eq(3)').text();     // store text from item type
                } else {
                    storeSelect2 = $('#selectTomNanh1').val();     // store value from select 2
                    storeSelectText = $("#selectTomNanh1 option:selected").text();     // store text from select 2
                }

                var id = $(_selectRow).find('td:eq(0)').text();                     // store id item
                var NumberCondition = $(_selectRow).find('td:eq(9)').text(); // store number condition
                var _Store_C_itemType = $(_selectRow).find('td:eq(10)').text(); // store condition make insert new item type in update
                var _AutoNumber = $(_selectRow).find('td:eq(2)').text();         // store auto increment
                var _Notice1 = $('#notice_1').val();
                var _Notice2 = $('#notice_2').val();
                var _Notice3 = $('#notice_3').val();
                var _Notice4 = $('#notice_4').val();


                //--- create new function store value into table invoice ---
                function storeDataIntoTable() {
                    $(_selectRow).find('td:eq(0)').text(id);
                    $(_selectRow).find('td:eq(1)').text(storeSelect2);
                    $(_selectRow).find('td:eq(2)').text(_AutoNumber);
                    $(_selectRow).find('td:eq(3)').text(storeSelectText);
                    $(_selectRow).find('td:eq(4)').text(_Notice1);
                    $(_selectRow).find('td:eq(5)').text(_Notice2);
                    $(_selectRow).find('td:eq(6)').text(_Notice3);
                    $(_selectRow).find('td:eq(7)').text(_Notice4);
                    $(_selectRow).find('td:eq(9)').text(NumberCondition);
                    $(_selectRow).find('td:eq(10)').text(_Store_C_itemType);
                }

                if (NumberCondition === "1"){  // if = 1
                    for (var i = 0; i < updateItemType.length; i++) {
                        if (updateItemType[i].id === id) {
                            updateItemType[i].id = id ;
                            updateItemType[i].item_type_id = storeSelect2 ;
                            updateItemType[i].first_feature = _Notice1 ;
                            updateItemType[i].second_feature = _Notice2 ;
                            updateItemType[i].third_feature = _Notice3 ;
                            updateItemType[i].fourth_feature = _Notice4 ;

                            storeDataIntoTable();
                            $('.close_update_rate1').click();
                            //console.log(JSON.stringify(updateItemType));
                            //console.log(JSON.stringify(addMoreItemType));
                            return false;
                        }
                    }
                    updateItemType.push({
                        "id": id,
                        "item_type_id": storeSelect2,
                        "first_feature": _Notice1,
                        "second_feature": _Notice2,
                        "third_feature": _Notice3,
                        "fourth_feature": _Notice4
                    });
                    storeDataIntoTable();
                    $('.close_update_rate1').click();
                    //console.log(JSON.stringify(updateItemType));
                    //console.log(JSON.stringify(addMoreItemType));

                } else if (NumberCondition === "2"){ // if = 2
                    for (var i = 0; i < addMoreItemType.length; i++){
                        if (Number(addMoreItemType[i].condition) === Number(_Store_C_itemType)){
                            addMoreItemType[i].item_type_id = storeSelect2 ;
                            addMoreItemType[i].first_feature = _Notice1 ;
                            addMoreItemType[i].second_feature = _Notice2 ;
                            addMoreItemType[i].third_feature = _Notice3 ;
                            addMoreItemType[i].fourth_feature = _Notice4 ;
                            addMoreItemType[i].condition = _Store_C_itemType ;

                            storeDataIntoTable();
                            $('.close_update_rate1').click();
                            //console.log(JSON.stringify(updateItemType));
                            //console.log(JSON.stringify(addMoreItemType));
                            return false;
                        }
                    }
                }
            }
        });
        // delete item type in table
        var deleteItemType = new Array();
        $(document).on("click","#delete_item", function () {
            if(confirm('តើអ្នកច្បាស់ដែរឬទេក្នុងការលុបវាចោល')){
                // =========== delete item in json array =================
                var _selectRow = $(this).closest('tr').remove();
                var _condition_old_value = $(_selectRow).find('td:eq(0)').text();  // store id of item ( not unique id )
                var _condition_new_or_old = $(_selectRow).find('td:eq(9)').text(); // condition new or old item type
                var _condition_delete_new = $(_selectRow).find('td:eq(10)').text();// condition delete when have new item

                if (_condition_new_or_old === "1"){
                    for (var i = 0; i < storeOldArrayForDelete.length; i++){
                        if (Number(storeOldArrayForDelete[i].id) === Number(_condition_old_value)){
                            storeOldArrayForDelete.splice(i,1); // delete from array storeOldArrayForDelete
                            deleteItemType.push(_condition_old_value); // push id into array delete item type
                            // loop delete item type that have in array updateItemType
                            for (var i = 0; i < updateItemType.length; i++){
                                if (Number(updateItemType[i].id) === Number(_condition_old_value)){
                                    updateItemType.splice(i,1); // delete from array updateItemType
                                }
                            }
                        }
                    }

                    //console.log(JSON.stringify(updateItemType));
                    //console.log(JSON.stringify(deleteItemType));
                    //console.log(JSON.stringify(addMoreItemType));
                    return false;

                } else if (_condition_new_or_old === "2"){
                    for (var i = 0; i < addMoreItemType.length; i++){
                        if (Number(addMoreItemType[i].condition) === Number(_condition_delete_new)){
                            addMoreItemType.splice(i,1);
                        }
                    }

                    //console.log(JSON.stringify(updateItemType));
                    //console.log(JSON.stringify(deleteItemType));
                    //console.log(JSON.stringify(addMoreItemType));
                    return false;

                }
            }
        });
        // ------------------- sent to server -----------------------
        var storeNewItemType = new Array(), storeUpdateItemType = new Array();
        $(document).on("click",".update_invoice",function () {
            var customerName = $('#customer_name').val();
            var customerPhoneNumber = $('#customer_phone_number').val();
            var invoiceRate = $('#percent_rate').val();

            if (!customerName){
                alert("សូមមេត្តាបំពេញ ឈ្មោះអតិថិជន ជាមុនសិន");
            } else {
                // array create new item type
                for (var i = 0; i < addMoreItemType.length; i++){
                    storeNewItemType.push({
                        "item_type_id": addMoreItemType[i].item_type_id,
                        "first_feature": addMoreItemType[i].first_feature,
                        "second_feature": addMoreItemType[i].second_feature,
                        "third_feature": addMoreItemType[i].third_feature,
                        "fourth_feature": addMoreItemType[i].fourth_feature
                    });
                }
                // array update item type
                for (var i = 0; i < updateItemType.length; i++){
                    if (updateItemType[i].id !== ""){
                        storeUpdateItemType.push({
                            "id":Number(updateItemType[i].id),
                            "item_type_id": Number(updateItemType[i].item_type_id),
                            "first_feature": updateItemType[i].first_feature,
                            "second_feature": updateItemType[i].second_feature,
                            "third_feature": updateItemType[i].third_feature,
                            "fourth_feature": updateItemType[i].fourth_feature
                        });
                    }
                }
                // json sent to server
                var JsonSentToServer = {
                    "customer_name":customerName,
                    "customer_phone":customerPhoneNumber,
                    "interests_rate":Number(invoiceRate),
                    "new_items":storeNewItemType,
                    "modify_items":storeUpdateItemType,
                    "delete_items":deleteItemType
                };

                var idInvoice = atob($.cookie("KeyInvoice"));

                $.ajax({
                   type: "PUT",
                    url: '../api/invoice/'+Number(idInvoice)+'',
                    data: JsonSentToServer,
                    success: function (ResponseRequest) {
                        var convert = JSON.parse(ResponseRequest);
                        if (convert.status === "200"){
                            alert('ធ្វើការកែប្រែជោគជ័យ');
                            window.location.href = '{{('/admin/invoice')}}';
                        } else if (convert.status === "401"){
                            alert('ធ្វើការកែប្រែទៅលើ វិក្ក័យបត្រ មិនជោគជ័យ');
                        }
                    }
                });
            }
        });
    </script>
@endsection
