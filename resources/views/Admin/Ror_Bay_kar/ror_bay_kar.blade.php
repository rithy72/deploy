@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <!--<h6 class="panel-title">Default panel</h6>-->
            <ul class="breadcrumb breadcrumb-caret position-right">
                <li><a href="{{('/admin/mainform')}}" style="color: #2577e1;"><span>@lang('string.mainForm')</span></a></li>
                <li class="active"><span>@lang('string.reportHistory')</span></li>
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

            <div class="col-md-2">
                <span>@lang('string.startDate')</span><input type="date" class="form-control" id="start_date">
                <br>
            </div>
            <div class="col-md-2">
                <span>@lang('string.startDateTo')</span><input type="date" class="form-control" id="to_date">
                <br>
            </div>
            <div class="col-md-2">
            <a class="btn btn-primary btn-Search" style="margin-top: 19px;"><i class="icon-search4 position-left"></i>@lang('string.search')</a>
                <br>
            </div>
            <div class="col-md-3">
                <h5 style="display: inline-flex;margin-top: 21px;"><p>@lang('string.income') ៖</p><p id="in_come" style="margin-left: 5px;"></p></h5>
            </div>
            <div class="col-md-3">
                <h5 style="display: inline-flex;margin-top: 21px;"><p>@lang('string.pay') ៖</p><p id="out_come" style="margin-left: 5px;"></p></h5>
            </div>

            <br/><br/>
            <div class="datatable-header" style="margin-top: -19px;"></div>
            <div class="datatable-scroll" style="overflow-x: hidden;">
                <div class="dataTables_scroll">
                    <!--============ scroll body oy trov 1 header table ===============-->
                    <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">
                        <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_Daily_Report" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                            <thead style="background: #e3e3ea99;">
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.date')</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.itemIn')</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.itemOut')</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.pay')</th>
                                <th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 100px;">@lang('string.income')</th>
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
        // ------------ model show in table --------------------
        var ConvertJson;
        function ModelShowDailyReport(ResponseFromAjax) {
            ConvertJson = JSON.parse(ResponseFromAjax);
            document.getElementById("page1").innerHTML = ConvertJson.data.current_page;
            document.getElementById("first1").innerHTML = ConvertJson.data.from;
            document.getElementById("last1").innerHTML = ConvertJson.data.to;
            document.getElementById("all1").innerHTML = ConvertJson.data.total;
            document.getElementById("Num_Page1").innerHTML = ConvertJson.data.current_page;

            if (ConvertJson.data.last_page === 1){ $('.previous_show_invoice').hide(); $('.next_show_invoice').hide();
            } else { $('.previous_show_invoice').show(); $('.next_show_invoice').show(); }

            for (var i = 0; i < ConvertJson.data.data.length; i++){
                var _tr = '<tr>' +
                    '<td>' + ConvertJson.data.data[i].date + '</td>' +
                    '<td>' + ConvertJson.data.data[i].in_item + '</td>' +
                    '<td>' + ConvertJson.data.data[i].out_item + '</td>' +
                    '<td>' + ConvertJson.data.data[i].outcome+" $" + '</td>' +
                    '<td>' + ConvertJson.data.data[i].income+" $" + '</td>' +
                    '</tr>';
                $('#Show_All_Daily_Report tbody').append(_tr);
            }
        }
        // ------------ define class constructor ---------------
        function DailyReport(methods, linkUrl) {
            this.method = methods;
            this.urls = linkUrl;
        }
        // ------------ ajax request to server -----------------
        DailyReport.prototype.reads =  function() {
            $.ajax({
                type: this.method,
                url: this.urls,
                success: function (ResponseJson) {
                    //console.log(ResponseJson);
                    ModelShowDailyReport(ResponseJson);
                }
            });
        };
        // --------------------- function show income and out come -------------
        function showInComeAndOutCome(startDate,toDate) {
            $.ajax({
                type: "GET",
                url: 'api/daily_report/sum?from_date='+startDate+'&to_date='+toDate+'&page_size=15',
                success: function (response) {
                    var convertJson = JSON.parse(response);
                    $('#in_come').text(convertJson.data.sum_income+" $");
                    $('#out_come').text(convertJson.data.sum_expense+" $");
                }
            });
        }
        // ---------------------  show daily Report per day --------------------
        (function () {
            // ------------ show in come and out come --------------------------
            showInComeAndOutCome("","");
            // ------------ show in come and out come --------------------------
            var showDailyReport = new DailyReport("GET",'api/daily_report?from_date=&to_date=&page_size=15');
            showDailyReport.reads();
        })();
        // ---------------------  Search daily report ------------------
        var timeout1 = null;
        $(document).on("click",".btn-Search", function () {
           var startDate = $('#start_date').val();
           var toDate = $('#to_date').val();
           var url = 'api/daily_report?from_date='+startDate+'&to_date='+toDate+'&page_size=15';

            clearTimeout(timeout1);
            timeout1 = setTimeout(function () {
                // ------------ show in come and out come ---------------
                showInComeAndOutCome(startDate,toDate);
                // ------------ show ra bay kar in table ----------------
                $('#Show_All_Daily_Report td').remove();
                var searchInvoiceInTable = new DailyReport("GET" , url);
                searchInvoiceInTable.reads();
            }, 1000);
        });
        // --------------- click back -----------------------------------
        $(".previous_show_invoice").click(function () {
            var url = ConvertJson.data.prev_page_url;
            if (ConvertJson.data.prev_page_url === null){
                alert('មិនអាចខ្លីកត្រលប់បានទេ ពីព្រោះគឺជាទំព័រដំបូង');
            }else {
                $('#Show_All_Daily_Report td').remove();
                var clickBack = new DailyReport("GET" , url);
                clickBack.reads();
            }
        });
        // --------------- click next -----------------------------------
        $(".next_show_invoice").click(function () {
            var url = ConvertJson.data.next_page_url;
            if (ConvertJson.data.next_page_url === null){
                alert('មិនអាចខ្លីកទៅទៀតបានទេ ពីព្រោះគឺជាទំព័រចុងក្រោយ');
            }else {
                $('#Show_All_Daily_Report td').remove();
                var clickNext = new DailyReport("GET" , url);
                clickNext.reads();
            }
        });
    </script>
@endsection
