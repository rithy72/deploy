@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <!--<h6 class="panel-title">Default panel</h6>-->
            <ul class="breadcrumb breadcrumb-caret position-right">
                <li><a href="{{('/admin/mainform')}}" style="color: #2577e1;"><span>@lang('string.mainForm')</span></a></li>
                <li class="active"><span>@lang('string.desboard')</span></li>
                {{--<li class="active">Default collapsible</li>--}}
            </ul>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
        </div>

        <div class="panel-body">
            <div class="col-md-12" style="margin-bottom: 12px;">
            <div class="col-md-2">
                <div class="panel" style="border-radius: 7px; background: #156b18b3;box-shadow: 1px 3px 13px;">
                    <h4 style="text-align: center;color: white;"><b>@lang('string.InventoryItems')</b></h4>
                    <h5 style="text-align: center;font-size: 31px;color: white;"><b id="item_in_inventory"></b></h5>
                </div>
            </div>
            <div class="col-md-2">
                <div class="panel" style="background: #3179f5cc; border-radius: 7px;box-shadow: 1px 3px 13px;">
                    <h4 style="text-align: center;color: white;"><b>@lang('string.itemIn')</b></h4>
                    <h5 style="text-align: center;font-size: 31px; color: white;"><b id="item_in"></b></h5>
                </div>
            </div>
            <div class="col-md-2">
                <div class="panel" style="border-radius: 7px;background: #3f2309cc;box-shadow: 1px 3px 13px;">
                    <h4 style="text-align: center;color: white;"><b>@lang('string.pay')</b></h4>
                    <h5 style="text-align: center;font-size: 31px;color: white;"><b id="pay"></b></h5>
                </div>
            </div>
            <div class="col-md-2">
                <div class="panel" style="border-radius: 7px;background: #993616e6;box-shadow: 1px 3px 13px;">
                    <h4 style="text-align: center;color: white;"><b>@lang('string.itemOut')</b></h4>
                    <h5 style="text-align: center;font-size: 31px;color: white;"><b id="item_out"></b></h5>
                </div>
            </div>
            <div class="col-md-2">
                <div class="panel" style="border-radius: 7px;background: #f38b26cc;box-shadow: 1px 3px 13px;">
                    <h4 style="text-align: center;color: white;"><b>@lang('string.income')</b></h4>
                    <h5 style="text-align: center;font-size: 31px;color: white;"><b id="income"></b></h5>
                </div>
            </div>
            </div>

            <legend style="font-size: 17px;"><b>@lang('string.invoiceExpired')</b></legend>

            <div class="datatable-header" style="margin-top: -30px;"></div>
            <div class="datatable-scroll" style="overflow-x: hidden;">
                <div class="dataTables_scroll">
                    <!--============ scroll body oy trov 1 header table ===============-->
                    <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">
                        <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_Invoice_Expired" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                            <thead style="background: #e3e3ea99;">
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.id')</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.invoiceID')</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.nameCustomer')</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.phoneNumber')</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.dayExpired')</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.expiredTime')</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending" style="text-align: center;">@lang('string.actions')</th>
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
        // ------------ table show invoice Expired --------------
        var ConvertJson , oldAutoIncrement = 0;
        function ModelShowInvoiceExpired(getJson) {
            ConvertJson = JSON.parse(getJson);
            document.getElementById("page1").innerHTML = ConvertJson.data.current_page;
            document.getElementById("first1").innerHTML = ConvertJson.data.from;
            document.getElementById("last1").innerHTML = ConvertJson.data.to;
            document.getElementById("all1").innerHTML = ConvertJson.data.total;
            document.getElementById("Num_Page1").innerHTML = ConvertJson.data.current_page;

            if (ConvertJson.data.last_page === 1){ $('.previous_show_invoice').hide(); $('.next_show_invoice').hide();
            } else { $('.previous_show_invoice').show(); $('.next_show_invoice').show(); }

            for (var i = 0; i < ConvertJson.data.data.length; i++){
                var _tr = '<tr>' +
                    '<td style="display:none;">' + ConvertJson.data.data[i].id + '</td>' +
                    '<td>' + [oldAutoIncrement += 1] + '</td>' +
                    '<td>' + ConvertJson.data.data[i].display_id + '</td>' +
                    '<td>' + ConvertJson.data.data[i].customer_name + '</td>' +
                    '<td>' + ConvertJson.data.data[i].customer_phone + '</td>' +
                    '<td>' + ConvertJson.data.data[i].expire_date + '</td>' +
                    '<td>' + ConvertJson.data.data[i].late_days+" @lang('string.day')" + '</td>' +
                    '<td class="text-center"> ' +
                    '<ul class="icons-list">'+
                    '<li class="dropdown">'+
                    '<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">'+
                    '<i class="icon-menu9"></i>'+
                    '</a>'+
                    '<ul class="dropdown-menu dropdown-menu-right">'+
                    '<li id="payment_invoice"><a><i class="icon-price-tag"></i>@lang('string.payment')</a></li>' +
                    '</ul>'+
                    '</li>'+
                    '</ul>'+
                    '</td>' +
                    '</tr>';
                $('#Show_All_Invoice_Expired tbody').append(_tr);
            }
        }
        // ------------ define class constructor ---------------
        function ShowInvoiceExpired(methods, linkUrl) {
            this.method = methods;
            this.urls = linkUrl;
        }
        // ------------ ajax request to server -----------------
        ShowInvoiceExpired.prototype.reads =  function() {
            $.ajax({
                type: this.method,
                url: this.urls,
                success: function (ResponseJson) {
                    //console.log(ResponseJson);
                    ModelShowInvoiceExpired(ResponseJson);
                }
            });
        };
        // --------------- click back -----------------------------------
        var storeValueTheLastPage = 0, valueDefaultAuto = 15;
        $(".previous_show_invoice").click(function () {
            var url = ConvertJson.data.prev_page_url;
            if (ConvertJson.data.prev_page_url === null){
                alert('មិនអាចខ្លីកត្រលប់បានទេ ពីព្រោះគឺជាទំព័រដំបូង');
            }else {
                //  number auto from table make ល.រ
                storeValueTheLastPage = oldAutoIncrement - Number(newAutoIncrement); //find row per page
                storeValueTheLastPage += valueDefaultAuto; //make value per page + 15.
                oldAutoIncrement = oldAutoIncrement - storeValueTheLastPage; //than we saw the value auto show back page again
                newAutoIncrement = oldAutoIncrement; // set it to old value amount auto form table row again
                storeValueTheLastPage = 0; // set it to 0 for use again
                $('#Show_All_Invoice_Expired td').remove();
                var clickBack = new ShowInvoiceExpired("GET" , url);
                clickBack.reads();
            }
        });
        // --------------- click next -----------------------------------
        var newAutoIncrement;
        $(".next_show_invoice").click(function () {
            var url = ConvertJson.data.next_page_url;
            if (ConvertJson.data.next_page_url === null){
                alert('មិនអាចខ្លីកទៅទៀតបានទេ ពីព្រោះគឺជាទំព័រចុងក្រោយ');
            }else {
                newAutoIncrement = oldAutoIncrement;
                $('#Show_All_Invoice_Expired td').remove();
                var clickNext = new ShowInvoiceExpired("GET" , url);
                clickNext.reads();
            }
        });
        // ---------------------  show status in des board --------------------
        (function () {
            // ---- request to get price or money income and out come and more ----
            $.ajax({
                type: "GET",
                url: 'api/daily_report/today',
                success: function (ResponseJson) {
                    //console.log(ResponseJson);
                    var ConvertJson = JSON.parse(ResponseJson);
                    $('#item_in_inventory').text(ConvertJson.data.items_in_warehouse);
                    $('#item_in').text(ConvertJson.data.in_item);
                    $('#pay').text(ConvertJson.data.outcome+" $");
                    $('#item_out').text(ConvertJson.data.out_item);
                    $('#income').text(ConvertJson.data.income+" $");
                }
            });
            // ---- request to get all invoice expired bigger than 60 day up -------
            var showItemExpired = new ShowInvoiceExpired("GET",'api/invoices/over_due?page_size=15');
            showItemExpired.reads();
        })();
        // ---------------- payment one invoice --------------------------
        $(document).on("click", "#payment_invoice", function () {
            var _tredite = $(this).closest('tr');
            var _idUnique = $(_tredite).find('td:eq(0)').text();
            $.cookie("KeyInvoice", btoa(_idUnique));// atob = decode from base64,  btoa = encode to base 64
            window.location.href = '{{('/admin/invoice/invoice_payment')}}';
        });
    </script>
@endsection
