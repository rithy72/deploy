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
                        <a href="{{('/admin/invoice/update_invoice')}}" class="btn btn-primary" id="updates_invoice" style="margin-bottom: 4px;"><i class="icon-pencil7 position-left"></i>@lang('string.update')</a> ||
                        <a href="{{('/admin/invoice/invoice_payment')}}" class="btn createNewCountry" id="add_item" style="background: #ff840d;color: white;margin-bottom: 4px;"><i class="icon-price-tag position-left"></i>@lang('string.payment')</a>
                    </div>
                </div>
            </div>
            {{-- End --}}
            {{-- Show choose --}}
            <div class="tabbable">
                <ul class="nav nav-tabs nav-tabs-highlight">
                    <li class="active"><a href="#highlighted_tab1" data-toggle="tab" aria-expanded="false">@lang('string.generalInformation')</a></li>
                    <li><a href="#highlighted-tab2" data-toggle="tab" aria-expanded="true">@lang('string.operation')</a></li>
                    <li><a href="#highlighted-tab3" data-toggle="tab" aria-expanded="true">រំលស់ទំនិញចេញ</a></li>
                    <li><a href="#highlighted-tab4" data-toggle="tab" aria-expanded="true">@lang('string.updateInvoices')</a></li>
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
                        </div>
                        <div class="datatable-header" style="margin-top: -25px;">
                            <legend style="font-size: 17px;margin-top: -25px;"><b style="margin-left: 16px;">ទំនិញបញ្ចាំ</b></legend>
                        </div>
                        <div class="datatable-scroll" style="overflow-x: hidden;">
                            <div class="dataTables_scroll">
                                <!--============ scroll body oy trov 1 header table ===============-->
                                <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 250px; width: 100%;">
                                    <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_Invoice_Items" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
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
                            <div class="col-xs-12 .col-sm-12 col-md-12">
                                {{-- Price sa rob --}}
                                <div style="text-align: right;clear: both;">
                                    <label class="control-label col-md-6" style="font-size: 15px; margin-top: 6px;"><b>តម្លៃដើមសរុប</b></label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="...." name="" id="grand_total" class="form-control" style="border: 1px solid grey;" disabled="disabled">
                                        <br>
                                    </div>
                                </div>
                                {{-- Price bung ruch --}}
                                <div style="text-align: right;clear: both;">
                                    <label class="control-label col-md-6" style="font-size: 15px; margin-top: 6px;"><b>តម្លៃដើមបង់រួច</b></label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="...." name="" id="paid" class="form-control" style="border: 1px solid grey;" disabled="disabled">
                                        <br>
                                    </div>
                                </div>
                                {{-- Price nov sol --}}
                                <div style="text-align: right;clear: both;">
                                    <label class="control-label col-md-6" style="font-size: 15px; margin-top: 6px;"><b>តម្លៃដើមនៅសល់</b></label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="...." name="" id="luynovsol" class="form-control" style="border: 1px solid grey;" disabled="disabled">
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
                                <span>@lang('string.actions')</span>
                                <select class="form-control" id="selectTomNanh1" name="">
                                    <option selected="selected"></option>
                                    <option selected="selected">បង់ប្រាក់ដើម</option>
                                    <option selected="selected">ថែមការប្រាក់</option>
                                    <option selected="selected">បង់ការប្រាក់</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <span>@lang('string.startDate')</span><input type="date" class="form-control" placeholder="">
                            </div>
                            <div class="col-md-3">
                                <span>@lang('string.startDateTo')</span><input type="date" class="form-control" placeholder="">
                            </div>
                            <a class="btn btn-primary btn-Search" style="margin-top: 19px;"><i class="icon-search4 position-left"></i>@lang('string.search')</a>
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
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.actions')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.money')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.userGetMoney')</th>
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
                                <span>@lang('string.startDate')</span><input type="date" class="form-control" placeholder="ជ្រើសរើសថ្ងៃ">
                            </div>
                            <div class="col-md-3">
                                <span>@lang('string.startDateTo')</span><input type="date" class="form-control" placeholder="ជ្រើសរើសថ្ងៃ">
                            </div>
                            <a class="btn btn-primary btn-Search" style="margin-top: 19px;"><i class="icon-search4 position-left"></i>@lang('string.search')</a>
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
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.userTakeOutItem')</th>
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
                                <span>@lang('string.startDate')</span><input type="date" class="form-control" placeholder="ជ្រើសរើសថ្ងៃ">
                            </div>
                            <div class="col-md-3">
                                <span>@lang('string.startDateTo')</span><input type="date" class="form-control" placeholder="ជ្រើសរើសថ្ងៃ">
                            </div>
                            <a class="btn btn-primary btn-Search" style="margin-top: 19px;"><i class="icon-search4 position-left"></i>@lang('string.search')</a>
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
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.actions')</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.userDo')</th>
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
                    console.log(response);
                    getResponse = JSON.parse(response);
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

                    document.getElementById("grand_total").value = getResponse.data.grand_total+" $";
                    document.getElementById("paid").value = getResponse.data.paid+" $";
                    document.getElementById("luynovsol").value = getResponse.data.remain+" $";

                    $.ajax({
                       type: "GET",
                        url: '../api/item/invoice/'+ _ID +'',
                        success: function (response) {
                            //console.log(response);
                            var ConvertJson = JSON.parse(response);
                            for (var i = 0; i < ConvertJson.data.length; i++){
                                var short = ConvertJson.data[i], notice1, notice2, notice3, notice4;
                                if (short.first_feature === null){notice1 = "";}else{notice1 = short.first_feature}
                                if (short.second_feature === null){notice2 = "";}else{notice2 = short.second_feature}
                                if (short.third_feature === null){notice3 = "";}else{notice3 = short.third_feature}
                                if (short.fourth_feature === null){notice4 = "";}else{notice4 = short.fourth_feature}

                                var _tr = '<tr>' +
                                    '<td style="display:none;">' + ConvertJson.data[i].id + '</td>' +
                                    '<td>' + [i+1] + '</td>' +
                                    '<td>' + ConvertJson.data[i].item_type_name + '</td>' +
                                    '<td>' + notice1 + '</td>' +
                                    '<td>' + notice2 + '</td>' +
                                    '<td>' + notice3 + '</td>' +
                                    '<td>' + notice4 + '</td>' +
                                    '<td>' + ConvertJson.data[i].display_status + '</td>' +
                                    '</tr>';
                                $('#Show_All_Invoice_Items tbody').append(_tr);
                            }
                        }
                    });
                }
            });
        })();
        // ---------------- update one invoice --------------------------
        {{--$(document).on("click", "#updates_invoice", function () {--}}
           {{--// var dd = $.cookie("KeyInvoice", _ID);// atob = decode from base64,  btoa = encode to base 64--}}
            {{--$.cookie("KeyInvoice", btoa(getResponse.data.id));--}}
            {{--window.location.href = '{{('/admin/invoice/update_invoice')}}';--}}
        {{--});--}}
    </script>
@endsection
