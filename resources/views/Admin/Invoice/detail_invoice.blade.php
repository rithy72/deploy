@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <!--<h6 class="panel-title">Default panel</h6>-->
            <ul class="breadcrumb breadcrumb-caret position-right">
                <li><a href="{{('/admin/mainform')}}" style="color: #2577e1;"><span>@lang('string.mainForm')</span></a></li>
                <li><a href="{{('/admin/invoice')}}" style="color: #2577e1;"><span>@lang('string.invoice')</span></a></li>
                <li class="active"><span>@lang('string.detail')</span></li>
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
                        <h3><b>@lang('string.invoiceId') ៖ </b><b id="id_invoice"></b></h3>
                    </div>
                    <div class="col-md-6">
                        <h3><b>@lang('string.createBy') ៖ </b><b id="employee_name"></b></h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dataTables_length" id="DataTables_Table_3_length" style="margin-top: 13px;margin-bottom: 0;">
                        <a href="{{('/admin/invoice/create_new_invoice')}}" class="btn btn-success" id="" style="margin-bottom: 4px;"><i class="icon-add position-left" ></i>@lang('string.createNew')</a> ||
                        @if(\Illuminate\Support\Facades\Auth::user()->role == \App\Http\Controllers\Base\Model\Enum\UserRoleEnum::ADMIN)
                        <button type="button" class="btn btn-primary" id="update_invoice" style="margin-bottom: 4px;" disabled="disabled"><i class="icon-pencil7 position-left"></i>@lang('string.update')</button> ||
                        @endif
                        <button type="button" class="btn" id="payment_invoice" style="background: #ff840d;color: white;margin-bottom: 4px;" disabled="disabled"><i class="icon-price-tag position-left"></i>@lang('string.payment')</button>
                    </div>
                </div>
            </div>
            {{-- End --}}
            {{-- Show choose --}}
            <div class="tabbable">
                <ul class="nav nav-tabs nav-tabs-highlight">
                    <li class="active"><a href="#highlighted_tab1" data-toggle="tab" aria-expanded="false">@lang('string.generalInformation')</a></li>
                    <li><a href="#highlighted-tab2" data-toggle="tab" aria-expanded="true">ទំនិញបញ្ចាំ</a></li>
                    <li><a href="#highlighted-tab4" data-toggle="tab" aria-expanded="true">@lang('string.history')</a></li>
                </ul>

                <div class="tab-content">
                    {{----- Merl Detail bos Customer 1 -----}}
                    <div class="tab-pane active" id="highlighted_tab1">
                        <div class="panel-body">
                            <div class="col-xs-12 .col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" style="font-size: 15px">@lang('string.nameCustomer')</label>
                                    <div class="col-md-9">
                                        <p id="customer_name"></p>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 .col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" style="font-size: 15px">@lang('string.phoneNumber')</label>
                                    <div class="col-md-9">
                                        <p id="phone_number"></p>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 .col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" style="font-size: 15px">@lang('string.dayGetMoney')</label>
                                    <div class="col-md-9">
                                        <p id="date_in"></p>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 .col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" style="font-size: 15px">@lang('string.expiredDay')</label>
                                    <div class="col-md-9">
                                        <p id="date_out"></p>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 .col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3" style="font-size: 15px">@lang('string.paymentTerm')</label>
                                    <div class="col-md-9">
                                        <p id="payment_term"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 .col-sm-6 col-md-6">
                                <div class="form-group col-md-12" style="display: inline-flex;">
                                    <p style="margin-top: 7px;">@lang('string.priceAmountPerMonth')</p>
                                    <p style="margin-top: 6px;margin-left: 30px;" id="interests_value"></p>
                                </div>
                            </div>
                            <div class="col-xs-12 .col-sm-6 col-md-6">
                                <div class="form-group col-md-12" style="display: inline-flex;">
                                    <p style="margin-top: 7px;">តម្លៃដើមសរុប</p>
                                    <p style="margin-top: 6px;margin-left: 30px;" id="grand_total"></p>
                                </div>
                            </div>
                            <div class="col-xs-12 .col-sm-6 col-md-6">
                                <div class="form-group col-md-12" style="display: inline-flex;">
                                    <p style="margin-top: 7px;">@lang('string.situation')</p>
                                    <p style="margin-top: 6px;margin-left: 30px;" id="status"></p>
                                </div>
                            </div>
                            <div class="col-xs-12 .col-sm-6 col-md-6">
                                <div class="form-group col-md-12" style="display: inline-flex;">
                                    <p style="margin-top: 7px;">តម្លៃដើមបង់រួច</p>
                                    <p style="margin-top: 6px;margin-left: 30px;" id="paid"></p>
                                </div>
                            </div>
                            <div class="col-xs-12 .col-sm-6 col-md-6">
                                <div class="form-group col-md-12" style="display: inline-flex;">
                                    <p style="margin-top: 7px;">@lang('string.createBy')</p>
                                    <p style="margin-top: 6px;margin-left: 30px;" id="createByUser"></p>
                                </div>
                            </div>
                            <div class="col-xs-12 .col-sm-6 col-md-6">
                                <div class="form-group col-md-12" style="display: inline-flex;">
                                    <p style="margin-top: 7px;">តម្លៃដើមនៅសល់</p>
                                    <p style="margin-top: 6px;margin-left: 30px;" id="luynovsol"></p>
                                </div>
                            </div>
                        </div>

                        {{--========================= footer of pagination ====================--}}
                        {{--<div class="datatable-footer">
                            <div class="col-xs-12 .col-sm-12 col-md-12">
                                --}}{{-- Price sa rob --}}{{--
                                <div style="text-align: right;clear: both;">
                                    <label class="control-label col-md-6" style="font-size: 15px; margin-top: 6px;"><b>តម្លៃដើមសរុប</b></label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="...." name="" id="grand_total" class="form-control" style="border: 1px solid grey;" disabled="disabled">
                                        <br>
                                    </div>
                                </div>
                                --}}{{-- Price bung ruch --}}{{--
                                <div style="text-align: right;clear: both;">
                                    <label class="control-label col-md-6" style="font-size: 15px; margin-top: 6px;"><b>តម្លៃដើមបង់រួច</b></label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="...." name="" id="paid" class="form-control" style="border: 1px solid grey;" disabled="disabled">
                                        <br>
                                    </div>
                                </div>
                                --}}{{-- Price nov sol --}}{{--
                                <div style="text-align: right;clear: both;">
                                    <label class="control-label col-md-6" style="font-size: 15px; margin-top: 6px;"><b>តម្លៃដើមនៅសល់</b></label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="...." name="" id="luynovsol" class="form-control" style="border: 1px solid grey;" disabled="disabled">
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>--}}
                    </div>
                {{----- Merl ka bong brak bos Customer -----}}
                    <div class="tab-pane" id="highlighted-tab2">
                        <div class="panel-body">
                            <div class="col-md-3">
                                <span>@lang('string.situation')</span>
                                <div class="form-group">
                                    <select class="form-control" id="search_status">
                                        <option value="">@lang('string.all')</option>
                                        <option value="1">@lang('string.payYet')</option>
                                        <option value="3">@lang('string.took')</option>
                                        <option value="2">@lang('string.saleAlready')</option>
                                        <option value="4">@lang('string.saleOut')</option>
                                    </select>
                                </div>
                            </div>
                            <a class="btn btn-primary btn-Search" style="margin-top: 19px;"><i class="icon-search4 position-left"></i>@lang('string.search')</a>
                            <br/><br/>

                            <div class="datatable-header" style="margin-top: -30px;"></div>
                            <div class="datatable-scroll" style="overflow-x: hidden;">
                                <div class="dataTables_scroll">
                                    <!--============ scroll body oy trov 1 header table ===============-->
                                    <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">
                                        <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_itemType_OneInvoice" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                                            <thead style="background: #e3e3ea99;">
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.id')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.groupItem')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice1')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice2')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice3')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice4')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.situation')</th>
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

                            </div>
                            {{--====================== End footer of pagination ====================--}}
                        </div>
                    </div>
                {{----- Merl ka update invoice bos Customer 1 -----}}
                    <div class="tab-pane" id="highlighted-tab4">
                        <div class="panel-body">
                            <div class="col-md-2">
                                <span>@lang('string.startDate')</span><input type="date" class="form-control" id="start_date">
                            </div>
                            <div class="col-md-2">
                                <span>@lang('string.startDateTo')</span><input type="date" class="form-control" id="to_date">
                            </div>
                            <div class="col-md-2">
                                <span>@lang('string.chooseOption')</span>
                                <div class="form-group">
                                    <select class="form-control" id="chooseInvoiceOrItemType">
                                        <option selected="selected" value=""></option>
                                        <option value="1">@lang('string.invoice')</option>
                                        <option value="4">@lang('string.itemOfInvoice')</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2" style="display: none;" id="show_situation_invoice">
                                <span>@lang('string.situation')</span>
                                <div class="form-group">
                                    <select class="form-control" id="history_invoice">
                                        <option value="1">@lang('string.create')</option>
                                        <option value="2">@lang('string.update')</option>
                                        <option value="6">@lang('string.paymentRate')</option>
                                        <option value="7">@lang('string.paymentGrand-Total')</option>
                                        <option value="8">@lang('string.addMoreCost')</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2" style="display: none;" id="show_situation_itemType">
                                <span>@lang('string.situation')</span>
                                <div class="form-group">
                                    <select class="form-control" id="history_itemType">
                                        <option value="11">@lang('string.add')</option>
                                        <option value="10">@lang('string.sale')</option>
                                        <option value="12">@lang('string.lus_janh')</option>
                                    </select>
                                </div>
                            </div>
                            <a class="btn btn-primary btn_Search1" style="margin-top: 19px;"><i class="icon-search4 position-left"></i>@lang('string.search')</a>
                            <br/><br/>

                            <div class="datatable-header" style="margin-top: -30px;"></div>
                            <div class="datatable-scroll" style="overflow-x: hidden;">
                                <div class="dataTables_scroll">
                                    <!--============ scroll body oy trov 1 header table ===============-->
                                    <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">
                                        <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_History" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                                            <thead style="background: #e3e3ea99;">
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.id')</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.UserAction')</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.actions')</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.describe')</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.date')</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending" style="text-align: center;">@lang('string.detail')</th>
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
                                <div class="dataTables_info" id="DataTables_Table_3_info" role="status" aria-live="polite">ទំព័រ <b id="page1"></b> មាន <b id="first1"></b> ប្រវត្តិទៅដល់ <b id="last1"></b> នៃចំនួនប្រវត្តិទាំងអស់គឺ <b id="all1"></b> </div>
                                <div class="dataTables_paginate paging_simple_numbers" id="">
                                    <a class="paginate_button previous_show_invoice" aria-controls="DataTables_Table_3" data-dt-idx="0" tabindex="0" id="Item_click_Back" style="display:none;">←</a>
                                    <span><a class="paginate_button current" id="Num_Page1" aria-controls="DataTables_Table_3" data-dt-idx="1" tabindex="0"></a></span>
                                    <a class="paginate_button next_show_invoice" aria-controls="DataTables_Table_3" data-dt-idx="3" tabindex="0" id="Item_click_Next" style="display:none;">→</a>
                                </div>
                            </div>
                            {{--====================== End footer of pagination ====================--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-----  Dialog show detail history detail  -----}}
    <div id="show_detail_one_history_change_log" class="modal fade">
        <div class="modal-dialog modal-full" style="margin-left: auto;margin-right: auto;width: 79%;">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h5 class="modal-title">@lang('string.showDetailOneHistory')</h5>
                </div>

                <div class="modal-body">
                    <div class="datatable-header" style="margin-top: -30px;">
                        <div class="col-md-8" style="margin-top: -6px;margin-bottom: 0;">
                            <div class="col-md-6">
                                <h5 style="display: inline-flex;"><p>@lang('string.UserAction') ៖</p><p id="name" style="margin-left: 5px;"></p></h5>
                            </div>
                            <div class="col-md-6">
                                <h5 style="display: inline-flex;"><p>@lang('string.do') ៖</p><p id="do_action" style="margin-left: 5px;"></p></h5>
                            </div>
                        </div>
                    </div>
                    <div class="datatable-scroll" style="overflow-x: hidden;">
                        <div class="dataTables_scroll">
                            <!--============ scroll body oy trov 1 header table ===============-->
                            <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">
                                <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_One_Detail" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                                    <thead style="background: #e3e3ea99;">
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.id')</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.actionUsers')</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.on')</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.newValue')</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.oldValue')</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{--========================= footer of pagination ====================--}}
                    <div class="datatable-footer"></div>
                    {{--====================== End footer of pagination ====================--}}
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>


    <div id="loading" style="display: none;
    width:100px;
    height: 100px;
    position: fixed;
    top: 50%;
    left: 50%;
    text-align:center;
    margin-left: -50px;
    margin-top: -100px;
    z-index:2;
    overflow: auto;">
        <img src="/assets/images/ajax_loader.gif" alt=""/>
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
        // ------------------ show data for detail ----------------------
        var getResponse;
        (function () {
            var _ID = atob($.cookie("KeyInvoice")); // convert id unique from base64
            $.ajax({
               type: "GET",
                url: '../api/invoice/'+_ID+'',
                success: function (response) {
                    //console.log(response);
                    getResponse = JSON.parse(response);
                    var updateButton = document.getElementById('update_invoice');

                    if (getResponse.data.status === "1"){
                        if (updateButton !== null) document.getElementById('update_invoice').disabled = false;
                        document.getElementById('payment_invoice').disabled = false;
                    } else {
                        if (updateButton !== null) document.getElementById('update_invoice').disabled = true;
                        document.getElementById('payment_invoice').disabled = true;
                    }

                    document.getElementById("id_invoice").innerHTML = getResponse.data.display_id;
                    document.getElementById("employee_name").innerHTML = getResponse.data.user_full_name;

                    document.getElementById("customer_name").innerHTML = getResponse.data.customer_name;
                    document.getElementById("phone_number").innerHTML = getResponse.data.customer_phone;

                    //document.getElementById("date_in").innerHTML = getResponse.data.created_date.slice(0, 10); // best
                    document.getElementById("date_in").innerHTML = getResponse.data.created_date;
//                    const storeString = getResponse.data.created_date;
//                    const splitString = storeString.split(" ");
//                    document.getElementById("date_in").innerHTML = splitString[0];

                    document.getElementById("date_out").innerHTML = getResponse.data.expire_date;
                    document.getElementById("payment_term").innerHTML = getResponse.data.interests_rate+" %";
                    document.getElementById("interests_value").innerHTML = getResponse.data.interests_value+" $";
                    document.getElementById("status").innerHTML = getResponse.data.display_status;
                    document.getElementById("createByUser").innerHTML = getResponse.data.user_full_name;

                    document.getElementById("grand_total").innerHTML = getResponse.data.grand_total+" $";
                    document.getElementById("paid").innerHTML = getResponse.data.paid+" $";
                    document.getElementById("luynovsol").innerHTML = getResponse.data.remain+" $";
                    // ---------- show itemType of one invoice ---------
                    var showInvoiceInTable = new ItemTypeForOneInvoice("GET" , '../api/item/invoice/'+ _ID +'');
                    showInvoiceInTable.reads();
                    // ---------- show history of invoice --------------
                    var showHistoryInvoice = new History("GET" , '../api/invoice/transaction_history/'+ getResponse.data.id +'?from_date=&to_date=&action=&group=&page_size=15');
                    showHistoryInvoice.reads();
                }
            });
        })();
        // ------------ show table itemType of one invoice -----
        var ConvertJson;
        function ModelShowInTable(getJsonValue) {
            ConvertJson = JSON.parse(getJsonValue);
            for (var i = 0; i < ConvertJson.data.length; i++){
                var short = ConvertJson.data[i];
                var _tr = '<tr>' +
                    '<td>' + [i+1] + '</td>' +
                    '<td>' + ConvertJson.data[i].item_type_name + '</td>' +
                    '<td>' + short.first_feature + '</td>' +
                    '<td>' + short.second_feature + '</td>' +
                    '<td>' + short.third_feature + '</td>' +
                    '<td>' + short.fourth_feature + '</td>' +
                    '<td>' + ConvertJson.data[i].display_status + '</td>' +
                    '</tr>';
                $('#Show_All_itemType_OneInvoice tbody').append(_tr);
            }
        }
        // ------------ define class constructor ---------------
        function ItemTypeForOneInvoice(methods, linkUrl) {
            this.method = methods;
            this.urls = linkUrl;
        }
        // ------------ ajax request to server -----------------
        ItemTypeForOneInvoice.prototype.reads =  function() {
            $.ajax({
                type: this.method, // "GET"
                url: this.urls, // 'GetAllListCurrency'
                success: function (ResponseJson) {
                    //console.log(ResponseJson);
                    ModelShowInTable(ResponseJson);
                }
            });
        };
        // ------------ click button search in detail ----------
        var timeout1 = null;
        $('.btn-Search').on("click",function () {
            var _searchStatus = $('#search_status').val();
            var url = '../api/item/invoice/'+ getResponse.data.id +'?status='+_searchStatus;

            clearTimeout(timeout1);
            timeout1 = setTimeout(function () {
                $('#Show_All_itemType_OneInvoice td').remove();
                var searchInvoiceInTable = new ItemTypeForOneInvoice("GET" , url);
                searchInvoiceInTable.reads();
            }, 1000);
        });
        // ------------ onchange select history ----------------
        var select = document.getElementById('chooseInvoiceOrItemType');
        var chooseInvoice = 1, chooseItemTypeInvoice = 4; // declare var make condition
        select.onchange = function(){
            var storeInvoiceStatus = $('#chooseInvoiceOrItemType').val();
            if (Number(storeInvoiceStatus) === Number(chooseInvoice)){
                $('#show_situation_invoice').show();
                $('#show_situation_itemType').hide();
            } else if (Number(storeInvoiceStatus) === Number(chooseItemTypeInvoice)){
                $('#show_situation_itemType').show();
                $('#show_situation_invoice').hide();
            } else if (!storeInvoiceStatus){
                $('#show_situation_itemType').hide();
                $('#show_situation_invoice').hide();
            }
        };

        // ------------ define class constructor ---------------
        function History(methods, linkUrl) {
            this.method = methods;
            this.urls = linkUrl;
        }
        // ------------ ajax request to server -----------------
        History.prototype.reads =  function() {
            $.ajax({
                type: this.method,
                url: this.urls,
                success: function (ResponseJson) {
                    //console.log(ResponseJson);
                    ShowDataInTable(ResponseJson);
                }
            });
        };
        // ------------ function search history ----------------
        var url; //,_chooseSearch,_historyInvoice,_historyItemType
        $('.btn_Search1').on("click", function () {
            autoIncrement = 0;
            var _startDate = $('#start_date').val();
            var _toDate = $('#to_date').val();
            var _chooseSearch = $('#chooseInvoiceOrItemType').val();
            var _historyInvoice = $('#history_invoice').val();
            var _historyItemType = $('#history_itemType').val();
            // ---- condition have value search or not ----
            if (!_chooseSearch){
                url = '../api/invoice/transaction_history/'+ getResponse.data.id +'?from_date='+_startDate+'&to_date='+_toDate+'&action=&group=&page_size=15';
                setToAjax();
            } else {
                if (Number(_chooseSearch) === chooseInvoice){
                    url = '../api/invoice/transaction_history/'+ getResponse.data.id +'?from_date='+_startDate+'&to_date='+_toDate+'&action='+_historyInvoice+'&group='+_chooseSearch+'&page_size=15';
                    setToAjax();
                } else if (Number(_chooseSearch) === chooseItemTypeInvoice){
                    url = '../api/invoice/transaction_history/'+ getResponse.data.id +'?from_date='+_startDate+'&to_date='+_toDate+'&action='+_historyItemType+'&group='+_chooseSearch+'&page_size=15';
                    setToAjax()
                }
            }
            function setToAjax() {
                clearTimeout(timeout1);
                timeout1 = setTimeout(function () {
                    $('#Show_All_History td').remove();
                    var searchHistoryInvoice = new History("GET" , url);
                    searchHistoryInvoice.reads();
                }, 1000);
            }
        });
        // ---- model table ----
        var ConvertAndStore , autoIncrement = 0;
        function ShowDataInTable(getJsonValue) {
            ConvertAndStore = JSON.parse(getJsonValue);
            document.getElementById("page1").innerHTML = ConvertAndStore.data.current_page;
            document.getElementById("first1").innerHTML = ConvertAndStore.data.from;
            document.getElementById("last1").innerHTML = ConvertAndStore.data.to;
            document.getElementById("all1").innerHTML = ConvertAndStore.data.total;
            document.getElementById("Num_Page1").innerHTML = ConvertAndStore.data.current_page;

            if (ConvertAndStore.data.last_page === 1) {
                $('.previous_show_invoice').hide();
                $('.next_show_invoice').hide();
            } else {
                $('.previous_show_invoice').show();
                $('.next_show_invoice').show();
            }
            for (var i = 0; i < ConvertAndStore.data.data.length; i++){
                var short = ConvertAndStore.data.data[i];
                var _tr = '<tr>' +
                    '<td>' + [autoIncrement+=1] + '</td>' +
                    '<td>' + short.name + '</td>' +
                    '<td>' + short.display_audit + '</td>' +
                    '<td>' + short.description + '</td>' +
                    '<td>' + short.date_time + '</td>' +
                    '<td class="text-center"> ' +
                    '<ul class="icons-list">'+
                    '<li class="dropdown">'+
                    '<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">'+
                    '<i class="icon-menu9"></i>'+
                    '</a>'+
                    '<ul class="dropdown-menu dropdown-menu-right">'+
                    '<li id="detail_invoice"><a><i class="icon-certificate"></i>@lang('string.details')</a></li>' +
                    '</ul>'+
                    '</li>'+
                    '</ul>'+
                    '</td>'+
                    '<td style="display:none;">' + short.change_log + '</td>' +
                    '</tr>';
                $('#Show_All_History tbody').append(_tr);
            }
        }
        // ---- click back ---------------------
        $(".previous_show_invoice").click(function () {
            var url = ConvertAndStore.data.prev_page_url;
            if (ConvertAndStore.data.prev_page_url === null){
                alert('មិនអាចខ្លីកត្រលប់បានទេ ពីព្រោះគឺជាទំព័រដំបូង');
            }else {
                clearTimeout(timeout1);
                timeout1 = setTimeout(function () {
                    autoIncrement -= 2; // minus number auto increment
                    $('#Show_All_History td').remove();
                    var clickBack = new History("GET" , url);
                    clickBack.reads();
                }, 500);
            }
        });
        // ---- click next --------------------
        $(".next_show_invoice").click(function () {
            var url = ConvertAndStore.data.next_page_url;
            if (ConvertAndStore.data.next_page_url === null){
                alert('មិនអាចខ្លីកទៅទៀតបានទេ ពីព្រោះគឺជាទំព័រចុងក្រោយ');
            }else {
                clearTimeout(timeout1);
                timeout1 = setTimeout(function () {
                    $('#Show_All_History td').remove();
                    var clickNext = new History("GET" , url);
                    clickNext.reads();
                }, 500);
            }
        });
        // ---- click show dialog detail history ----
        $(document).on("click","#detail_invoice",function () {
            $('#show_detail_one_history_change_log').modal({ backdrop: 'static' }); // show dialog
            var _selectRow = $(this).closest('tr'); // close set tr
            $('#Show_One_Detail td').remove();      // clear data in table detail dailog
            var storeDescribe = $(_selectRow).find('td:eq(2)').text();
            const splitString = storeDescribe.split("-");
            (function(){
                $('#name').text($(_selectRow).find('td:eq(1)').text());
                $('#do_action').text(splitString[0]);
                var short = JSON.parse($(_selectRow).find('td:eq(6)').text());
                 for(var j = 0; j < short.length; j++){
                 var _tr = '<tr>' +
                 '<td>' + [j+1] + '</td>' +
                 '<td>' + short[j].action + '</td>' +
                 '<td>' + short[j].showName + '</td>' +
                 '<td>' + short[j].newValue + '</td>' +
                 '<td>' + short[j].oldValue + '</td>' +
                 '</tr>';
                 $('#Show_One_Detail tbody').append(_tr);
                 }
            })();
        });
        // ---- button update on invoice -----
        $(document).on("click","#update_invoice",function () {
            window.location.href = '{{('/admin/invoice/update_invoice')}}';
        });
        // ---- button payment on invoice ----
        $(document).on("click","#payment_invoice",function () {
            window.location.href = '{{('/admin/invoice/invoice_payment')}}';
        });
    </script>
@endsection
