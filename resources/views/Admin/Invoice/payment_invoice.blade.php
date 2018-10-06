@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <!--<h6 class="panel-title">Default panel</h6>-->
            <ul class="breadcrumb breadcrumb-caret position-right">
                <li><a href="{{('/admin/mainform')}}" style="color: #2577e1;"><span>@lang('string.mainForm')</span></a></li>
                <li><a href="{{('/admin/invoice')}}" style="color: #2577e1;"><span>@lang('string.invoice')</span></a></li>
                <li class="active"><span>@lang('string.payment')</span></li>
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
                <div class="col-md-10" style="margin-top: -20px;margin-bottom: 15px;">
                    <div class="col-md-4">
                        <h4><b>@lang('string.invoiceId') ៖ </b><b id="invoice_id"></b></h4>
                    </div>
                    <div class="col-md-4">
                        <h4><b>@lang('string.createBy') ៖ </b><b id="user_create"></b></h4>
                    </div>
                    <div class="col-md-4" style="color: red;display: none;" id="show_hide">
                        <h4><b>@lang('string.late')៖ </b><b id="late_day_invoice"></b></h4>
                    </div>
                </div>
                <div class="dataTables_length" id="DataTables_Table_3_length" style="margin-top: -13px;">
                    <button type="button" class="btn yok_duch" id="show_hide1" style="background: red;border-radius: 7px;color: white;border: 1px solid black;display: none;">យកដាច់</button>
                </div>
            </div>
            {{-- End --}}
            <div class="col-xs-12 .col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-3" style="font-size: 15px">@lang('string.nameCustomer')</label>
                    <div class="col-md-9">
                        <input type="text" placeholder="សរសេរឈ្មោះអតិថិជន...." id="customer_name" class="form-control" style="border: 1px solid grey;" disabled="disabled">
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 .col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-3" style="font-size: 15px">@lang('string.phoneNumber')</label>
                    <div class="col-md-9">
                        <input type="text" placeholder="@lang('string.writePhoneNumberHere...')" id="customer_phone_number" class="form-control" style="border: 1px solid grey;" disabled="disabled">
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 .col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-3" style="font-size: 15px">@lang('string.dayGetMoney')</label>
                    <div class="col-md-9">
                        <input type="date" id="create_date" class="form-control" style="border: 1px solid grey;" disabled="disabled">
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 .col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-3" style="font-size: 15px">@lang('string.expiredDay')</label>
                    <div class="col-md-9">
                        <input type="date" id="end_date" class="form-control" style="border: 1px solid grey;" disabled="disabled">
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 .col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-3" style="font-size: 15px">@lang('string.paymentTerm')</label>
                    <div class="col-md-9">
                        <select class="form-control" id="percent_rate" disabled="disabled">
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
            <div class="col-xs-12 .col-sm-6 col-md-6">
                <div class="form-group col-md-12" style="display: inline-flex;">
                    <p style="margin-top: 7px;">@lang('string.priceAmountPerMonth')</p>
                    <p style="margin-top: 6px;margin-left: 30px;" id="interests_value"></p>
                </div>
            </div>
        </div>

        <div class="datatable-header" style="margin-top: -25px;">
            <legend style="font-size: 17px;"><b style="margin-left: 16px;">ទំនិញបញ្ចាំ</b></legend>
            <div class="dataTables_length" id="DataTables_Table_3_length" style="margin-top: -14px;margin-bottom: 7px;margin-right: 13px;">
                <a class="btn btn-success" id="add_item"><i class="icon-add position-left"></i>បន្ថែមទំនិញ</a>
            </div>
        </div>
        <div class="datatable-scroll" style="overflow-x: hidden;">
            <div class="dataTables_scroll">
                <!--============ scroll body oy trov 1 header table ===============-->
                <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 250px; width: 100%;">
                    <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_Data_One_Invoice" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                        <thead style="background: #e3e3ea99;">
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.id')</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.groupItem')</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice1')</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice2')</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice3')</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.itemNotice4')</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.situation')</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">រំលស់</th>
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
            <div class="col-xs-12 .col-sm-12 col-md-12">
                <div style="text-align: right;clear: both;">
                    <label class="control-label col-md-6" style="font-size: 15px; margin-top: 6px;"><b>ប្រាក់ដើមសរុប</b></label>
                    <div class="col-md-6">
                        <input type="text" placeholder="...." id="amount_price" class="form-control" style="border: 1px solid grey;" disabled="disabled">
                        <br>
                    </div>
                </div>
                <div style="text-align: right;clear: both;">
                    <label class="control-label col-md-6" style="font-size: 15px; margin-top: 6px;"><b>ប្រាក់ដើមនៅសល់</b></label>
                    <div class="col-md-6">
                        <input type="text" placeholder="...." id="remain" class="form-control" style="border: 1px solid grey;" disabled="disabled">
                        <br>
                    </div>
                </div>
                <div style="text-align: right;clear: both;">
                    <label class="control-label col-md-6" style="font-size: 15px; margin-top: 6px;"><b>បង់ប្រាក់ដើម</b></label>
                    <div class="col-md-6">
                        {{--<input type="text" placeholder="...." id="payMoney" class="form-control" style="border: 1px solid grey;">--}}
                        <input type="number" placeholder=".... $" id="payMoney" onkeydown="javascript: return event.keyCode == 69 ? false : true" style="display: block;width: 98%;height: 36px;padding: 7px 12px;font-size: 13px;color: #333333;background-color: #fff;border: 1px solid #0003;border-radius: 3px;border: 1px solid grey;">
                        <br>
                    </div>
                </div>
                <div style="text-align: right;clear: both;">
                    <label class="control-label col-md-6" style="font-size: 15px; margin-top: 6px;"><b>ដក់ប្រាក់បន្ថែម  </b><input type="checkbox" id="checkme"></label>
                    <div class="col-md-6">
                        <input type="number" placeholder=".... $" id="takeOutPriceMore" disabled="disabled" onkeydown="javascript: return event.keyCode == 69 ? false : true" style="display: block;width: 98%;height: 36px;padding: 7px 12px;font-size: 13px;color: #333333;background-color: #fff;border: 1px solid #0003;border-radius: 3px;border: 1px solid grey;">
                        <br>
                    </div>
                </div>
                <div style="text-align: right;clear: both;">
                    <label class="control-label col-md-6" style="font-size: 15px; margin-top: 6px;"><b>បង់ការប្រាក់</b></label>
                    <div class="col-md-6">
                        <input type="number" placeholder=".... $" id="bong_kar" onkeydown="javascript: return event.keyCode == 69 ? false : true" style="display: block;width: 98%;height: 36px;padding: 7px 12px;font-size: 13px;color: #333333;background-color: #fff;border: 1px solid #0003;border-radius: 3px;border: 1px solid grey;">
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <div class="dataTables_length" id="DataTables_Table_3_length" style="margin-top: -14px;margin-bottom: 7px;margin-right: 13px;">
                    <button type="button" class="btn btn-primary payment_Money_of_one_invoice" style="width: 110px; border: 1px solid black;"><b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>
                </div>
                <div class="dataTables_length" id="DataTables_Table_3_length" style="margin-top: -14px;margin-bottom: 7px;margin-right: 13px;">
                    <a href="{{('/admin/invoice')}}" class="btn" style="border: 1px solid;width: 110px;"><i class="icon-arrow-left12 position-left"></i><b>@lang('string.cancel')</b></a>
                </div>
            </div>
        </div>
        {{--====================== End footer of pagination ====================--}}
    </div>
    {{--=================== dialog add more item type ====================--}}
    <form role="form" action="" method="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="add_more_item_to_invoice" class="modal fade">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" id="close_clear_dialog_itemType" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">@lang('string.addMoreItemsToInvoice')</h5>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12">
                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">
                                <div class="datatable-header" style="margin-top: -40px;">
                                    <div class="">
                                        <div class="form-group">
                                            {{--Group Of Items--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.groupItem')</label>
                                            <div class="col-lg-7" style="margin-bottom: 13px;">
                                                <select class="form-control" id="selectTomNanh">

                                                </select>
                                            </div>
                                            <div class="col-lg-2" style="margin-bottom: 13px;">
                                                <button type="button" class="btn btn-success btn-icon btn-rounded" title="បង្កើតប្រភេទទំនិញថ្មី" id="createNewTypeItem"><i class="icon-plus3"></i></button>
                                            </div>
                                            {{--Number som Kol--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.notice')</label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="@lang('string.itemNotice1')" name="" id="_notice1" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--full name--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px"></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="@lang('string.itemNotice2')" name="" id="_notice2" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--phone number--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px"></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="@lang('string.itemNotice3')" name="" id="_notice3" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--Cost--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px"></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="@lang('string.itemNotice4')" name="" id="_notice4" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" id="close_clear_dialog_itemType" data-dismiss="modal" style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i class="icon-arrow-left12 position-left"></i>@lang('string.cancel')</button>
                        {{ csrf_field() }}
                        {{--<button type="submit" class="btn btn-primary" id="create_update_rate_dialog" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px; display: none"><b>បោះបង់</b></button>--}}
                        <button type="button" class="btn btn-primary btn_add_more_itemType" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;"><b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-----   Create New Type Of Item   -----}}
    <form role="form" action="" method="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="createNewTomNanh" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content" style="box-shadow: -3px 50px 164px 110px #0006;">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" id="close_createNewItemType" data-dismiss="modal">&times;</button>
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
                                                <input type="text" placeholder="@lang('string.addNewTypeItemHere...')" id="create" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" id="close_createNewItemType" data-dismiss="modal" style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i class="icon-arrow-left12 position-left"></i>@lang('string.cancel')</button>
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-primary btn_create_new_item_type" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;"><b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>

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
                        return {id: value.id, text: value.type_name}
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
        // --- create new item type, and ,close dialog clear input ---
        $(document).on("click","#close_createNewItemType",function () {
            $('#create').val('');
        });
        $(document).on("click",".btn_create_new_item_type",function () {
            var storeInput = $('#create').val();
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
                            document.getElementById("close_createNewItemType").click();
                        } else if (convert.status === "301") {
                            alert('ឈ្មោះមានរួចហើយ សូមធ្វើការបញ្ចូលម្តងទៀត');
                        }
                    }
                });
            }
        });
        // --- show data in invoice ---
        function show_data_in_table(id,invoice_id,id_itemType,increment,name,notice1,notice2,notice3,notice4,status,checkBox) {
            var _tr = '<tr>' +
                '<td style="display:none;">' + id + '</td>' +
                '<td style="display:none;">' + invoice_id + '</td>' +
                '<td style="display:none;">' + id_itemType + '</td>' +
                '<td>' + increment + '</td>' +
                '<td>' + name + '</td>' +
                '<td>' + notice1 + '</td>' +
                '<td>' + notice2 + '</td>' +
                '<td>' + notice3 + '</td>' +
                '<td>' + notice4 + '</td>' +
                '<td>' + status + '</td>' +
                checkBox +
                '</tr>';
            $('#Show_All_Data_One_Invoice tbody').append(_tr);
        }
        var ConvertJson, ConvertJsonArray, storeAutoEncretment = 0;
        (function () {
            var _id = atob($.cookie("KeyInvoice")); // atob = decode from base64,  btoa = encode to base 64
            $.ajax({
                type: "GET",
                url: '../api/invoice/'+_id+'',
                success: function (response) {
                    //console.log(response);
                    ConvertJson = JSON.parse(response);
                    var a = ConvertJson.data;

                    $('#invoice_id').text(a.display_id);
                    $('#user_create').text(a.user_full_name);
                    $('#late_day_invoice').text(a.late_days);
                    // -- condition pel yok invoice duch or not --
                    if (a.is_late === false){
                        $('#show_hide').hide();
                        $('#show_hide1').hide();
                    } else if (a.is_late === true){
                        $('#show_hide').show();
                        $('#show_hide1').show();
                    }


                    $('#customer_name').val(a.customer_name);
                    $('#customer_phone_number').val(a.customer_phone);

                    const storeString = a.created_date;
                    const splitString = storeString.split(" ");
                    //document.getElementById("create_date").value = splitString[0];
                    $('#create_date').val(splitString[0]);
                    $('#end_date').val(a.expire_date);

                    $('#percent_rate').val(a.interests_rate);

                    $('#interests_value').text(a.interests_value+" $");
                    $('#amount_price').val(a.grand_total+" $");
                    $('#remain').val(a.remain+" $");

                    // ajax request to get data show in table invoiceUpdate
                    $.ajax({
                        type: "GET",
                        url: '../api/item/invoice/'+_id+'',
                        success: function (response) {
                            //console.log(response);
                            ConvertJsonArray = JSON.parse(response);
                            for (var i = 0; i < ConvertJsonArray.data.length; i++){
                                if (ConvertJsonArray.data[i].status === 1){
                                    storeAutoEncretment += 1; // store auto increment
                                    var short = ConvertJsonArray.data[i], notice1, notice2, notice3, notice4;
                                    // condition if notice null convert to empty
                                    if (short.first_feature === null){notice1 = "";}else{notice1 = short.first_feature}
                                    if (short.second_feature === null){notice2 = "";}else{notice2 = short.second_feature}
                                    if (short.third_feature === null){notice3 = "";}else{notice3 = short.third_feature}
                                    if (short.fourth_feature === null){notice4 = "";}else{notice4 = short.fourth_feature}
                                    show_data_in_table(short.id,short.invoice_id,short.item_type_id,storeAutoEncretment,short.item_type_name,notice1,notice2,notice3,notice4,short.display_status,'<td><input type="checkbox"></td>');
                                }
                            }
                        }
                    });
                }
            });
        })();
        // --- add more item type to table ---
        var NewArrayItemType = new Array();
        $('.btn_add_more_itemType').on("click", function () {
            var storePaymentMoney = $('#payMoney').val();
            const storeString = $('#remain').val();
            const splitString = storeString.split(" ");
            var storePrakDermNovSol = splitString[0];
            var storeSelect2_Value_id = $('#selectTomNanh').val();               // store value id from select2
            var storeSelect2_Text = $("#selectTomNanh option:selected").text();  // store text from select2
            var storeNotice1 = $('#_notice1').val();
            var storeNotice2 = $('#_notice2').val();
            var storeNotice3 = $('#_notice3').val();
            var storeNotice4 = $('#_notice4').val();
            function PushArray() {
                NewArrayItemType.push({
                    "item_type_id": Number(storeSelect2_Value_id),
                    "first_feature": storeNotice1,
                    "second_feature": storeNotice2,
                    "third_feature": storeNotice3,
                    "fourth_feature": storeNotice4
                });
            }
            if($('#takeOutPriceMore').val()){
                if (storeSelect2_Value_id === null) {
                    alert('ត្រូវជ្រើសរើសទំនិញជាមុនសិន');
                } else {
                    if (storeNotice1 === "") {
                        alert('សូមមេត្តាបញ្ជូលកំណត់សំគាល់យ៉ាងហោចណាស់ ១ នៅក្នុងកំណត់សំគាល់ទី១');
                    } else {
                        show_data_in_table("", "", storeSelect2_Value_id, storeAutoEncretment += 1, storeSelect2_Text, storeNotice1, storeNotice2, storeNotice3, storeNotice4, "", '<td></td>');
                        // -- clear input function --
                        clear();
                        // -- push new itemType to array --
                        PushArray();
                    }
                }
            } else {
                if (Number(storePaymentMoney) === Number(storePrakDermNovSol) || Number(storePaymentMoney) > Number(storePrakDermNovSol)) {
                    alert('មិនអាចបញ្ជូលទំនិញថ្មីបានទេ ពីព្រោះអតិថិជនធ្វើការបង់ប្រាក់គ្រប់ចំនួន');
                } else {
                    if (storeSelect2_Value_id === null) {
                        alert('ត្រូវជ្រើសរើសទំនិញជាមុនសិន');
                    } else {
                        if (storeNotice1 === "") {
                            alert('សូមមេត្តាបញ្ជូលកំណត់សំគាល់យ៉ាងហោចណាស់ ១ នៅក្នុងកំណត់សំគាល់ទី១');
                        } else {
                            show_data_in_table("", "", storeSelect2_Value_id, storeAutoEncretment += 1, storeSelect2_Text, storeNotice1, storeNotice2, storeNotice3, storeNotice4, "", '<td></td>');
                            // -- clear input function --
                            clear();
                            // -- push new itemType to array --
                            PushArray();
                        }
                    }
                }
            }
        });
        // --- close and clear input in dialog insert new item type ---
        function clear() {
            $('#selectTomNanh').val('').trigger('change');
            $('#selectTomNanh').text('').trigger('change');
            $('#_notice1').val('');
            $('#_notice2').val('');
            $('#_notice3').val('');
            $('#_notice4').val('');
        }
        $(document).on("click","#close_clear_dialog_itemType", function () {
            clear(); // clear input function
        });

        // --- Sent Data to server ---
        var deleteItemType = new Array(),takeOutPriceMore,bung_kar,storePrakDermNovSol1;
        $(document).on("click",".payment_Money_of_one_invoice",function () {
            bung_kar = $('#bong_kar').val();
            takeOutPriceMore = $('#takeOutPriceMore').val();
            var bung_tlay_derm = $('#payMoney').val();
            // split string have space
            const storeString = $('#remain').val();
            const splitString = storeString.split(" ");
            storePrakDermNovSol1 = splitString[0];

            $('#Show_All_Data_One_Invoice tbody tr').each(function (row, tr) {
                if ($(tr).find('input[type="checkbox"]').is(':checked') === true){
                    deleteItemType.push(Number($(tr).find('td:eq(0)').text()));
                }
            });
            // function model request to server
            function requestToServer(payMoneyRate,payGrandTotal,addMoreCost,ArrayNewItemType,ArrayDeleteItemType,InvoiceID) {
                var storeValue1 = {
                    "interests_payment": payMoneyRate,
                    "cost_payment": payGrandTotal,
                    "add_cost": addMoreCost,
                    "add_items": ArrayNewItemType,
                    "depreciate_items": ArrayDeleteItemType
                };
                console.log(JSON.stringify(storeValue1));
                $.ajax({
                    type: "PUT",
                    url: '../api/invoice/payment/' + InvoiceID + '',
                    data: storeValue1,
                    success: function (ResponseJson) {
                        var convert = JSON.parse(ResponseJson);
                        if (convert.status === "200") {
                            alert('ធ្វើការបង់ប្រាក់ជោគជ័យ');
                            window.location.href = '{{('/admin/invoice')}}';
                        } else if (convert.status === "300") {
                            alert('ធ្វើការបង់ប្រាក់ ទៅលើវិក្ក័យបត្រនេះ មិនបាននោះទេ');
                        }
                    }
                });
            }
            // -- condition when price is bigger or smaller than grand price --
            if (!takeOutPriceMore){ // value add more money is empty
                if (Number(bung_tlay_derm) === Number(storePrakDermNovSol1) || Number(bung_tlay_derm) > Number(storePrakDermNovSol1)){
                    // do not have item type
                    requestToServer(Number(bung_kar),Number(bung_tlay_derm),Number(takeOutPriceMore),[],deleteItemType,Number(ConvertJson.data.display_id));
                } else {
                    // have item type
                    requestToServer(Number(bung_kar),Number(bung_tlay_derm),Number(takeOutPriceMore),NewArrayItemType,deleteItemType,Number(ConvertJson.data.display_id));
                }
            } else {                               // value add money more not empty
                if (takeOutPriceMore > 0){         // money must bigger than 0
                    // have item type
                    requestToServer(Number(bung_kar),Number(bung_tlay_derm),Number(takeOutPriceMore),NewArrayItemType,deleteItemType,Number(ConvertJson.data.display_id));
                } else {
                    alert('បញ្ចូលចំនួន ប្រាក់បន្ថែម អោយធំជាង 0');
                }
            }
        });

        // --- yok invoice duch ---
        $(document).on("click",".yok_duch",function () {
            if(confirm('តើអ្នកច្បាស់ដែរឬទេក្នុងការយកវិក្ក័យបត្រនេះដាច់')) {
                $.ajax({
                    type: "PUT",
                    url: '../api/invoice/took/' + Number(ConvertJson.data.display_id) + '',
                    success: function (GetResponseJson) {
                        //console.log(GetResponseJson);
                        var convert = JSON.parse(GetResponseJson);
                        if (convert.status === "200") {
                            alert('វិក្ក័យបត្រនេះត្រូវបានយកជោគជ័យ');
                            window.location.href = '{{('/admin/invoice')}}';
                        } else if (convert.status === "300") {
                            alert('វិក្ក័យបត្រនេះ គឺមិនអាចយកបានទេ');
                        }
                    }
                });
            }
        });

        // ---- ready function if moneyPay > luy nov sol ----
        $("#payMoney").keyup(function() {
            var storeValuePayMoney = $('#payMoney').val();
            const storeString = $('#remain').val();
            const splitString = storeString.split(" ");
            var storePrakDermNovSol = splitString[0];
            if(Number(storeValuePayMoney) > Number(storePrakDermNovSol)){
                document.getElementById('payMoney').value = storePrakDermNovSol;
            }
        });
        // if check can take more price out of that invoice
        var checker = document.getElementById('checkme');
        var sendbtn = document.getElementById('takeOutPriceMore');
        // when unchecked or checked, run the function
        checker.onchange = function(){
            if(this.checked){
                sendbtn.disabled = false;
            } else {
                sendbtn.disabled = true;
            }
        };
    </script>
@endsection
