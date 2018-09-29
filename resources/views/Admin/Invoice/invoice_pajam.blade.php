@extends('layouts.app')
@section('style')
    <style>
        /*tr:nth-child(even){background-color: #efefefb3}*/
        /*#table_show_frontEnd {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table_show_frontEnd td, #table_show_frontEnd th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table_show_frontEnd tr:nth-child(even){background-color: #f2f2f2;}

        #table_show_frontEnd tr:hover {background-color: #ddd;}
        td {  height: 35px;  }
        #table_show_frontEnd th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #37474F;
            color: white;
        }*/
    </style>
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <!--<h6 class="panel-title">Default panel</h6>-->
            <ul class="breadcrumb breadcrumb-caret position-right">
                <li><a href="{{('/admin/mainform')}}" style="color: #2577e1;"><span>@lang('string.mainForm')</span></a></li>
                <li class="active"><span>@lang('string.invoice')</span></li>
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
                <span>@lang('string.searchBy')</span>
                <div class="form-group">
                    <select class="form-control" id="search_option" name="">
                        {{--<option selected="selected"></option>--}}
                        <option value="1">@lang('string.invoiceID')</option>
                        <option value="2">@lang('string.nameCustomer')</option>
                        <option value="3">@lang('string.phoneNumber')</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <span>@lang('string.situation')</span>
                <div class="form-group">
                    <select class="form-control" id="search_status" name="">
                        <option value="">ទាំអស់</option>
                        <option value="1">មិនទាន់លស់</option>
                        <option value="3">យកដាច់</option>
                        <option value="2">ទូទាត់ហើយ</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <span>.</span><input type="text" id="search" class="form-control" placeholder="ស្វែងរកវត្ថុ">
            </div>
            <a class="btn btn-primary btn-Search" style="margin-top: 19px;"><i class="icon-search4 position-left"></i>@lang('string.search')</a>


            <div class="dataTables_length" id="DataTables_Table_3_length" style="margin-top: 19px;">
                <a href="{{('/admin/invoice/create_new_invoice')}}" class="btn btn-success createNewCountry"><i class="icon-add position-left"></i>@lang('string.createNewInvoice')</a>
            </div>

            <br/><br/>

            <div class="datatable-header" style="margin-top: -30px;"></div>
            <div class="datatable-scroll" style="overflow-x: hidden;">
                <div class="dataTables_scroll">
                    <!--============ scroll body oy trov 1 header table ===============-->
                    <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">
                        <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_Invoice" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                            <thead style="background: #e3e3ea99;">
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.invoiceID')</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.nameCustomer')</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.phoneNumber')</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.money')</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">ការប្រាក់</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.item')</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.dayGetMoney')</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.expiredDay')</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.situation')</th>
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
                <div class="dataTables_info" id="DataTables_Table_3_info" role="status" aria-live="polite">ទំព័រ <b id="page1"></b> មាន <b id="first1"></b> វិក្ក័យបត្រទៅដល់ <b id="last1"></b> នៃចំនួនវិក្ក័យបត្រទាំងអស់គឺ <b id="all1"></b> </div>
                <div class="dataTables_paginate paging_simple_numbers" id="">
                    <a class="paginate_button previous_show_invoice" aria-controls="DataTables_Table_3" data-dt-idx="0" tabindex="0" id="Item_click_Back" style="display:none;">←</a>
                    <span><a class="paginate_button current" id="Num_Page1" aria-controls="DataTables_Table_3" data-dt-idx="1" tabindex="0"></a></span>
                    <a class="paginate_button next_show_invoice" aria-controls="DataTables_Table_3" data-dt-idx="3" tabindex="0" id="Item_click_Next" style="display:none;">→</a>
                </div>
            </div>
            {{--====================== End footer of pagination ====================--}}
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
        // ------------ store model of table -------------------
        var stringStatus , storeValue;
        function ModelShowInTable(getJsonValue) {
            storeValue = JSON.parse(getJsonValue);
            document.getElementById("page1").innerHTML = storeValue.data.current_page;
            document.getElementById("first1").innerHTML = storeValue.data.from;
            document.getElementById("last1").innerHTML = storeValue.data.to;
            document.getElementById("all1").innerHTML = storeValue.data.total;
            document.getElementById("Num_Page1").innerHTML = storeValue.data.current_page;

            if (storeValue.data.last_page === 1){ $('.previous_show_invoice').hide(); $('.next_show_invoice').hide();
            } else { $('.previous_show_invoice').show(); $('.next_show_invoice').show(); }

            for (var i = 0; i < storeValue.data.data.length; i++){

                if (storeValue.data.data[i].status === "1"){
                    stringStatus = '<td>មិនទាន់លស់</td>';
                } else if (storeValue.data.data[i].status === "2"){
                    stringStatus = '<td>ទូទាត់ហើយ</td>';
                } else if (storeValue.data.data[i].status === "3"){
                    stringStatus = '<td>យកដាច់</td>';
                }

                // ============= End Parse Json ===========================
                var _tr = '<tr role="row" class="odd">' +
                    '<td style="display:none;">' + storeValue.data.data[i].id + '</td>' +
                    '<td>' + storeValue.data.data[i].display_id + '</td>' +
                    '<td>' + storeValue.data.data[i].customer_name + '</td>' +
                    '<td>' + storeValue.data.data[i].customer_phone + '</td>' +
                    '<td>' + storeValue.data.data[i].grand_total+ "$" + '</td>' +
                    '<td>' + storeValue.data.data[i].interests_rate+ "%" + '</td>' +
                    '<td>' + storeValue.data.data[i].items + '</td>' +
                    '<td>' + storeValue.data.data[i].created_date_time + '</td>' +
                    '<td>' + storeValue.data.data[i].expired_date + '</td>' +
                    stringStatus  +
                    '<td class="text-center"> ' +
                    '<ul class="icons-list">'+
                    '<li class="dropdown">'+
                    '<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">'+
                    '<i class="icon-menu9"></i>'+
                    '</a>'+
                    '<ul class="dropdown-menu dropdown-menu-right">'+
                    '<li id="updates_invoice"><a href="{{('/admin/invoice/update_invoice')}}"><i class="icon-pencil7"></i>@lang('string.update')</a></li>' +
                    '<li id="payment_invoice"><a href="{{('/admin/invoice/invoice_payment')}}"><i class="icon-price-tag"></i>@lang('string.payment')</a></li>' +
                    '<li id="detail_invoice"><a><i class="icon-certificate"></i>@lang('string.details')</a></li>' +
                    '</ul>'+
                    '</li>'+
                    '</ul>'+
                    '</td>' +
                    '</tr>';
                $('#Show_All_Invoice tbody').append(_tr);
            }
        }
        // ------------ define class constructor ---------------
        function Invoice(methods, linkUrl) {
            this.method = methods;
            this.urls = linkUrl;
        }
        // ------------ ajax request to server -----------------
        Invoice.prototype.reads =  function() {
            $.ajax({
                type: this.method, // "GET"
                url: this.urls, // 'GetAllListCurrency'
                success: function (ResponseJson) {
                    //console.log(ResponseJson);
                    ModelShowInTable(ResponseJson);
                }
            });
        };
        // -------------- function show invoice ------------------------
        (function () {
            var showInvoiceInTable = new Invoice("GET" , 'api/invoice?search=&option=&status=&page_size=15');
            showInvoiceInTable.reads(); // invoke method show data in table
        })();
        // -------------- function search invoice ----------------------
        var timeout1 = null;
        $('.btn-Search').click(function () {
            var _getOption = $('#search_option').val();
            var _getStatus = $('#search_status').val();
            var _getSearch = $('#search').val();
            var url = 'api/invoice?search='+_getSearch+'&option='+_getOption+'&status='+_getStatus+'&page_size=15';

            clearTimeout(timeout1);
            timeout1 = setTimeout(function () {
                $('#Show_All_Invoice td').remove();
                var searchInvoiceInTable = new Invoice("GET" , url);
                searchInvoiceInTable.reads();
            }, 1000);
        });
        // --------------- click back -----------------------------------
        $(".previous_show_invoice").click(function () {
            var url = storeValue.data.prev_page_url;
            if (storeValue.data.prev_page_url === null){
                alert('មិនអាចខ្លីកត្រលប់បានទេ ពីព្រោះគឺជាទំព័រដំបូង');
            }else {
                $('#Show_All_Invoice td').remove();
                var clickBack = new Invoice("GET" , url);
                clickBack.reads();
            }
        });
        // --------------- click next -----------------------------------
        $(".next_show_invoice").click(function () {
            var url = storeValue.data.next_page_url;
            if (storeValue.data.next_page_url === null){
                alert('មិនអាចខ្លីកទៅទៀតបានទេ ពីព្រោះគឺជាទំព័រចុងក្រោយ');
            }else {
                $('#Show_All_Invoice td').remove();
                var clickNext = new Invoice("GET" , url);
                clickNext.reads();
            }
        });
        // ---------------- detail one invoice --------------------------
        $(document).on("click", "#detail_invoice", function () {
            var _tredite = $(this).closest('tr');
            var _idUnique = $(_tredite).find('td:eq(0)').text();
            $.cookie("KeyInvoice", btoa(_idUnique));// atob = decode from base64,  btoa = encode to base 64
            window.location.href = '{{('/admin/invoice/invoice_detail')}}';
        });
        // ---------------- update one invoice --------------------------
        $(document).on("click", "#updates_invoice", function () {
            var _tredite = $(this).closest('tr');
            var _idUnique = $(_tredite).find('td:eq(0)').text();
            $.cookie("KeyInvoice", btoa(_idUnique));// atob = decode from base64,  btoa = encode to base 64
            window.location.href = '{{('/admin/invoice/update_invoice')}}';
        });
    </script>
@endsection
