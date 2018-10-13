@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <!--<h6 class="panel-title">Default panel</h6>-->
            <ul class="breadcrumb breadcrumb-caret position-right">
                <li><a href="{{('/admin/mainform')}}" style="color: #2577e1;"><span>@lang('string.mainForm')</span></a></li>
                <li class="active"><span>@lang('string.actionUsers')</span></li>
                {{--<li class="active">Default collapsible</li>--}}
            </ul>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
        </div>
            <div class="panel-heading" style="padding-top: 0px;">
                {{--<h6 class="panel-title">Highlighted tabs</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>--}}
                {{--<a class="heading-elements-toggle"><i class="icon-menu"></i></a>--}}
            </div>
            <div class="panel-body" style="padding: 25px 0;">
                <div class="tabbable">
                    <ul class="nav nav-tabs nav-tabs-highlight">
                        <li class="active"><a href="#highlighted_tab1" data-toggle="tab" aria-expanded="false">@lang('string.today')</a></li>
                        <li><a href="#highlighted-tab2" data-toggle="tab" aria-expanded="true">@lang('string.fineByDate')</a></li>
                        {{--<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#highlighted-tab3" data-toggle="tab">Dropdown tab</a></li>
                                <li><a href="#highlighted-tab4" data-toggle="tab">Another tab</a></li>
                            </ul>
                        </li>--}}
                    </ul>

                    <div class="tab-content">
                        {{---------------tap 1---------------}}
                        <div class="tab-pane active" id="highlighted_tab1">
                            <div class="panel-body">
                                <div class="dataTables_length" id="DataTables_Table_3_length" style="margin-top: 19px;">
                                    {{--<a class="btn btn-success" id="createTomNagn"><i class="icon-add position-left"></i>បង្កើតអ្នកប្រើប្រាស់ថ្មី</a>--}}
                                </div>
                                {{------ choose option ------}}
                                <div class="col-md-2">
                                    <span>@lang('string.chooseOption')</span>
                                    <div class="form-group">
                                        <select class="form-control" id="chooseInvoiceOrItemType1">
                                            <option selected="selected" value=""></option>
                                            <option value="1">@lang('string.invoice')</option>
                                            <option value="2">@lang('string.actionOfItemType')</option>
                                            <option value="3">@lang('string.users')</option>
                                            <option value="4">@lang('string.allItems')</option>
                                            <option value="18">@lang('string.TrackUserLoginAndLogout')</option>
                                        </select>
                                    </div>
                                </div>
                                {{------ show option invoice ------}}
                                <div class="col-md-2" style="display: none;" id="show_situation_invoice1">
                                    <span>@lang('string.situation')</span>
                                    <div class="form-group">
                                        <select class="form-control" id="history_invoice1">
                                            <option value="1">@lang('string.create')</option>
                                            <option value="2">@lang('string.update')</option>
                                            <option value="6">@lang('string.paymentRate')</option>
                                            <option value="7">@lang('string.paymentGrand-Total')</option>
                                            <option value="8">@lang('string.addMoreCost')</option>
                                        </select>
                                    </div>
                                </div>
                                {{------ show option item Type ------}}
                                <div class="col-md-2" style="display: none;" id="show_action_ItemType1">
                                    <span>@lang('string.situation')</span>
                                    <div class="form-group">
                                        <select class="form-control" id="history_action_itemType1">
                                            <option value="1">@lang('string.create')</option>
                                            <option value="2">@lang('string.update')</option>
                                            <option value="3">@lang('string.delete')</option>
                                            <option value="4">@lang('string.active')</option>
                                            <option value="5">@lang('string.deActive')</option>
                                        </select>
                                    </div>
                                </div>
                                {{------ show option item Type ------}}
                                <div class="col-md-2" style="display: none;" id="show_action_user1">
                                    <span>@lang('string.situation')</span>
                                    <div class="form-group">
                                        <select class="form-control" id="history_action_user1">
                                            <option value="1">@lang('string.create')</option>
                                            <option value="2">@lang('string.update')</option>
                                            <option value="3">@lang('string.delete')</option>
                                            <option value="4">@lang('string.active')</option>
                                            <option value="5">@lang('string.deActive')</option>
                                            <option value="13">@lang('string.changePass')</option>
                                        </select>
                                    </div>
                                </div>
                                {{----- show option situation items -----}}
                                <div class="col-md-2" style="display: none;" id="show_situation_itemType1">
                                    <span>@lang('string.situation')</span>
                                    <div class="form-group">
                                        <select class="form-control" id="history_itemType1">
                                            <option value="11">@lang('string.add')</option>
                                            <option value="10">@lang('string.sale')</option>
                                            <option value="12">@lang('string.lus_janh')</option>
                                        </select>
                                    </div>
                                </div>
                                {{------ show security user login and logout ------}}
                                <div class="col-md-2" style="display: none;" id="show_action_security_login_logout1">
                                    <span>@lang('string.situation')</span>
                                    <div class="form-group">
                                        <select class="form-control" id="history_security_login_logout1">
                                            <option value="14">@lang('string.login')</option>
                                            <option value="15">@lang('string.logout.')</option>
                                        </select>
                                    </div>
                                </div>
                                <a class="btn btn-primary btn_search_these_day" style="margin-top: 19px;"><i class="icon-search4 position-left"></i>@lang('string.search')</a>
                                <br/><br/>
                                <div class="datatable-header" style="margin-top: -19px;"></div>
                                <div class="datatable-scroll" style="overflow-x: hidden;">
                                    <div class="dataTables_scroll">
                                        <!--============ scroll body oy trov 1 header table ===============-->
                                        <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">
                                            <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_These_Day" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
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
                                    <div class="dataTables_info" id="DataTables_Table_3_info" role="status" aria-live="polite">ទំព័រ <b id="page"></b> មាន <b id="first"></b> ប្រវត្តិទៅដល់ <b id="last"></b> នៃចំនួនប្រវត្តិទាំងអស់គឺ <b id="all"></b> </div>
                                    <div class="dataTables_paginate paging_simple_numbers" id="">
                                        <a class="paginate_button previous_show_invoice_tap1" aria-controls="DataTables_Table_3" data-dt-idx="0" tabindex="0" id="Item_click_Back" style="display:none;">←</a>
                                        <span><a class="paginate_button current" id="Num_Page" aria-controls="DataTables_Table_3" data-dt-idx="1" tabindex="0"></a></span>
                                        <a class="paginate_button next_show_invoice_tap1" aria-controls="DataTables_Table_3" data-dt-idx="3" tabindex="0" id="Item_click_Next" style="display:none;">→</a>
                                    </div>
                                </div>
                                {{--====================== End footer of pagination ====================--}}
                                {{--==========================================================================================================--}}
                            </div>
                        </div>
                        {{---------------tap 2---------------}}
                        <div class="tab-pane" id="highlighted-tab2">
                            <div class="panel-body">
                                <div class="col-md-2">
                                    <span>@lang('string.startDate')</span><input type="date" class="form-control" id="start_date">
                                </div>
                                <div class="col-md-2">
                                    <span>@lang('string.startDateTo')</span><input type="date" class="form-control" id="to_date">
                                </div>
                                {{------ choose option ------}}
                                <div class="col-md-2">
                                    <span>@lang('string.chooseOption')</span>
                                    <div class="form-group">
                                        <select class="form-control" id="chooseInvoiceOrItemType">
                                            <option selected="selected" value=""></option>
                                            <option value="1">@lang('string.invoice')</option>
                                            <option value="2">@lang('string.actionOfItemType')</option>
                                            <option value="3">@lang('string.users')</option>
                                            <option value="4">@lang('string.allItems')</option>
                                            <option value="18">@lang('string.TrackUserLoginAndLogout')</option>
                                        </select>
                                    </div>
                                </div>
                                {{------ show option invoice ------}}
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
                                {{------ show option item Type ------}}
                                <div class="col-md-2" style="display: none;" id="show_action_ItemType">
                                    <span>@lang('string.situation')</span>
                                    <div class="form-group">
                                        <select class="form-control" id="history_action_itemType">
                                            <option value="1">@lang('string.create')</option>
                                            <option value="2">@lang('string.update')</option>
                                            <option value="3">@lang('string.delete')</option>
                                            <option value="4">@lang('string.active')</option>
                                            <option value="5">@lang('string.deActive')</option>
                                        </select>
                                    </div>
                                </div>
                                {{------ show option item Type ------}}
                                <div class="col-md-2" style="display: none;" id="show_action_user">
                                    <span>@lang('string.situation')</span>
                                    <div class="form-group">
                                        <select class="form-control" id="history_action_user">
                                            <option value="1">@lang('string.create')</option>
                                            <option value="2">@lang('string.update')</option>
                                            <option value="3">@lang('string.delete')</option>
                                            <option value="4">@lang('string.active')</option>
                                            <option value="5">@lang('string.deActive')</option>
                                            <option value="13">@lang('string.changePass')</option>
                                        </select>
                                    </div>
                                </div>
                                {{----- show option situation items -----}}
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
                                {{------ show security user login and logout ------}}
                                <div class="col-md-2" style="display: none;" id="show_action_security_login_logout">
                                    <span>@lang('string.situation')</span>
                                    <div class="form-group">
                                        <select class="form-control" id="history_security_login_logout">
                                            <option value="14">@lang('string.login')</option>
                                            <option value="15">@lang('string.logout.')</option>
                                        </select>
                                    </div>
                                </div>
                                <a class="btn btn-primary btn-Search" style="margin-top: 19px;"><i class="icon-search4 position-left"></i>@lang('string.search')</a>
                                <br/><br/>
                                <div class="datatable-header" style="margin-top: -19px;"></div>
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
        // ------------ onchange select history find these day -------------
        var select1 = document.getElementById('chooseInvoiceOrItemType1');
        select1.onchange = function() {
            var storeInvoiceStatus = $('#chooseInvoiceOrItemType1').val();
            if (Number(storeInvoiceStatus) === Number(chooseInvoice)) {
                $('#show_situation_invoice1').show(); // invoice
                $('#show_action_ItemType1').hide();   // itemType
                $('#show_action_user1').hide();       // action user
                $('#show_situation_itemType1').hide();// situation itemType
                $('#show_action_security_login_logout1').hide();// situation security login logout
            } else if (Number(storeInvoiceStatus) === Number(actionOfItemType)) {
                $('#show_situation_invoice1').hide();
                $('#show_action_ItemType1').show();
                $('#show_action_user1').hide();
                $('#show_situation_itemType1').hide();
                $('#show_action_security_login_logout1').hide();
            } else if (Number(storeInvoiceStatus) === Number(actionUser)){
                $('#show_situation_invoice1').hide();
                $('#show_action_ItemType1').hide();
                $('#show_action_user1').show();
                $('#show_situation_itemType1').hide();
                $('#show_action_security_login_logout1').hide();
            } else if (Number(storeInvoiceStatus) === Number(chooseItemTypeInvoice)){
                $('#show_situation_invoice1').hide();
                $('#show_action_ItemType1').hide();
                $('#show_action_user1').hide();
                $('#show_situation_itemType1').show();
                $('#show_action_security_login_logout1').hide();
            } else if (Number(storeInvoiceStatus) === Number(trackUserLoginLogOut)){
                $('#show_situation_invoice1').hide();
                $('#show_action_ItemType1').hide();
                $('#show_action_user1').hide();
                $('#show_situation_itemType1').hide();
                $('#show_action_security_login_logout1').show();
            } else if (!storeInvoiceStatus){
                $('#show_situation_invoice1').hide();
                $('#show_action_ItemType1').hide();
                $('#show_action_user1').hide();
                $('#show_situation_itemType1').hide();
                $('#show_action_security_login_logout1').hide();
            }
        };
        // ------------ define class constructor ---------------
        function HistoryTheseDay(methods, linkUrl) {
            this.method = methods;
            this.urls = linkUrl;
        }
        // ------------ ajax request to server -----------------
        HistoryTheseDay.prototype.reads =  function() {
            $.ajax({
                type: this.method,
                url: this.urls,
                success: function (ResponseJson) {
                    //console.log(ResponseJson);
                    ShowDataInTable_TheseDay(ResponseJson);
                }
            });
        };
        // ------------ click search these day ------------------
        var url1;
        $('.btn_search_these_day').on("click",function () {
            oldAutoIncrement1 = 0; // clear
            storeValueTheLastPage1 = 0; // clear
            var _startDate1 = new Date().toISOString().slice(0, 10); // choose date from pc
            var _chooseSearch1 = $('#chooseInvoiceOrItemType1').val();
            var _historyInvoice1 = $('#history_invoice1').val();
            var _historyActionItemType1 = $('#history_action_itemType1').val();
            var _historyActionUser1 = $('#history_action_user1').val();
            var _historyItemType1 = $('#history_itemType1').val();
            var _historyUserLoginOrLogOut1 = $('#history_security_login_logout1').val();
            // ---- condition have value search or not ----
            if (!_chooseSearch1){
                url1 = 'api/audit_trail/search?from_date='+_startDate1+'&to_date=&group=&action=&page_size=15';
                setToAjax1();
            } else {
                if (Number(_chooseSearch1) === chooseInvoice){
                    url1 = 'api/audit_trail/search?from_date='+_startDate1+'&to_date=&group='+_chooseSearch1+'&action='+_historyInvoice1+'&page_size=15';
                    setToAjax1();
                } else if (Number(_chooseSearch1) === actionOfItemType){
                    url1 = 'api/audit_trail/search?from_date='+_startDate1+'&to_date=&group='+_chooseSearch1+'&action='+_historyActionItemType1+'&page_size=15';
                    setToAjax1();
                } else if (Number(_chooseSearch1) === actionUser){
                    url1 = 'api/audit_trail/search?from_date='+_startDate1+'&to_date=&group='+_chooseSearch1+'&action='+_historyActionUser1+'&page_size=15';
                    setToAjax1();
                } else if (Number(_chooseSearch1) === chooseItemTypeInvoice){
                    url1 = 'api/audit_trail/search?from_date='+_startDate1+'&to_date=&group='+_chooseSearch1+'&action='+_historyItemType1+'&page_size=15';
                    setToAjax1();
                } else if (Number(_chooseSearch1) === trackUserLoginLogOut){
                    url1 = 'api/audit_trail/search?from_date='+_startDate1+'&to_date=&group='+_chooseSearch1+'&action='+_historyUserLoginOrLogOut1+'&page_size=15';
                    setToAjax1();
                }
            }
            function setToAjax1() {
                clearTimeout(timeout1);
                timeout1 = setTimeout(function () {
                    $('#Show_All_These_Day td').remove();
                    var searchHistoryTheseDay = new HistoryTheseDay("GET" , url1);
                    searchHistoryTheseDay.reads();
                }, 1000);
            }
        });
        // ------------ function show these day in table --------
        var ConvertAndStore1 , oldAutoIncrement1 = 0;
        function ShowDataInTable_TheseDay(getJsonValue) {
            ConvertAndStore1 = JSON.parse(getJsonValue);
            document.getElementById("page").innerHTML = ConvertAndStore1.data.current_page;
            document.getElementById("first").innerHTML = ConvertAndStore1.data.from;
            document.getElementById("last").innerHTML = ConvertAndStore1.data.to;
            document.getElementById("all").innerHTML = ConvertAndStore1.data.total;
            document.getElementById("Num_Page").innerHTML = ConvertAndStore1.data.current_page;

            if (ConvertAndStore1.data.last_page === 1) {
                $('.previous_show_invoice_tap1').hide();
                $('.next_show_invoice_tap1').hide();
            } else {
                $('.previous_show_invoice_tap1').show();
                $('.next_show_invoice_tap1').show();
            }
            for (var i = 0; i < ConvertAndStore1.data.data.length; i++){
                var short = ConvertAndStore1.data.data[i];
                var _tr = '<tr>' +
                    '<td>' + [oldAutoIncrement1+=1] + '</td>' +
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
                $('#Show_All_These_Day tbody').append(_tr);
            }
        }
        // ---- click back ---------------------
        var storeValueTheLastPage1 = 0, valueDefaultAuto = 15;
        $(".previous_show_invoice_tap1").click(function () {
            var url = ConvertAndStore1.data.prev_page_url;
            if (ConvertAndStore1.data.prev_page_url === null){
                alert('មិនអាចខ្លីកត្រលប់បានទេ ពីព្រោះគឺជាទំព័រដំបូង');
            }else {
                clearTimeout(timeout1);
                timeout1 = setTimeout(function () {
                    //  number auto from table make ល.រ
                    storeValueTheLastPage1 = oldAutoIncrement1 - Number(newAutoIncrement1);
                    storeValueTheLastPage1 += valueDefaultAuto;
                    oldAutoIncrement1 = oldAutoIncrement1 - storeValueTheLastPage1;
                    newAutoIncrement1 = oldAutoIncrement1;
                    storeValueTheLastPage1 = 0;
                    $('#Show_All_These_Day td').remove();
                    var clickBack = new HistoryTheseDay("GET" , url);
                    clickBack.reads();
                }, 500);
            }
        });
        // ---- click next --------------------
        var newAutoIncrement1;
        $(".next_show_invoice_tap1").click(function () {
            var url = ConvertAndStore1.data.next_page_url;
            if (ConvertAndStore1.data.next_page_url === null){
                alert('មិនអាចខ្លីកទៅទៀតបានទេ ពីព្រោះគឺជាទំព័រចុងក្រោយ');
            }else {
                clearTimeout(timeout1);
                timeout1 = setTimeout(function () {
                    newAutoIncrement1 = oldAutoIncrement1;
                    $('#Show_All_These_Day td').remove();
                    var clickNext = new HistoryTheseDay("GET" , url);
                    clickNext.reads();
                }, 500);
            }
        });
        // ------------ show data in table ---------------------
    //===============================================================================================
    //===============================================================================================
    //===============================================================================================
        // ------------ onchange select history find by day ----------------
        var select = document.getElementById('chooseInvoiceOrItemType');
        var chooseInvoice=1,actionOfItemType=2,actionUser=3,chooseItemTypeInvoice=4,trackUserLoginLogOut=18;
        select.onchange = function() {
            var storeInvoiceStatus = $('#chooseInvoiceOrItemType').val();
            if (Number(storeInvoiceStatus) === Number(chooseInvoice)) {
                $('#show_situation_invoice').show(); // invoice
                $('#show_action_ItemType').hide();   // itemType
                $('#show_action_user').hide();       // action user
                $('#show_situation_itemType').hide();// situation itemType
                $('#show_action_security_login_logout').hide();// situation security login logout
            } else if (Number(storeInvoiceStatus) === Number(actionOfItemType)) {
                $('#show_situation_invoice').hide();
                $('#show_action_ItemType').show();
                $('#show_action_user').hide();
                $('#show_situation_itemType').hide();
                $('#show_action_security_login_logout').hide();
            } else if (Number(storeInvoiceStatus) === Number(actionUser)){
                $('#show_situation_invoice').hide();
                $('#show_action_ItemType').hide();
                $('#show_action_user').show();
                $('#show_situation_itemType').hide();
                $('#show_action_security_login_logout').hide();
            } else if (Number(storeInvoiceStatus) === Number(chooseItemTypeInvoice)){
                $('#show_situation_invoice').hide();
                $('#show_action_ItemType').hide();
                $('#show_action_user').hide();
                $('#show_situation_itemType').show();
                $('#show_action_security_login_logout').hide();
            } else if (Number(storeInvoiceStatus) === Number(trackUserLoginLogOut)){
                $('#show_situation_invoice').hide();
                $('#show_action_ItemType').hide();
                $('#show_action_user').hide();
                $('#show_situation_itemType').hide();
                $('#show_action_security_login_logout').show();
            } else if (!storeInvoiceStatus){
                $('#show_situation_invoice').hide();
                $('#show_action_ItemType').hide();
                $('#show_action_user').hide();
                $('#show_situation_itemType').hide();
                $('#show_action_security_login_logout').hide();
            }
        };
        // ------------ model show in table --------------------
        var ConvertAndStore , oldAutoIncrement = 0;
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
                    '<td>' + [oldAutoIncrement+=1] + '</td>' +
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
        // ------------ click back -----------------------
        var storeValueTheLastPage = 0;
        $(".previous_show_invoice").click(function () {
            var url = ConvertAndStore.data.prev_page_url;
            if (ConvertAndStore.data.prev_page_url === null){
                alert('មិនអាចខ្លីកត្រលប់បានទេ ពីព្រោះគឺជាទំព័រដំបូង');
            }else {
                clearTimeout(timeout1);
                timeout1 = setTimeout(function () {
                    //  number auto from table make ល.រ
                    storeValueTheLastPage = oldAutoIncrement - Number(newAutoIncrement); //find row per page
                    storeValueTheLastPage += valueDefaultAuto; //make value per page + 15.
                    oldAutoIncrement = oldAutoIncrement - storeValueTheLastPage; //than we saw the value auto show back page again
                    newAutoIncrement = oldAutoIncrement; // set it to old value amount auto form table row again
                    storeValueTheLastPage = 0; // set it to 0 for use again
                    $('#Show_All_History td').remove();
                    var clickBack = new History("GET" , url);
                    clickBack.reads();
                }, 500);
            }
        });
        // ------------ click next -----------------------
        var newAutoIncrement;
        $(".next_show_invoice").click(function () {
            var url = ConvertAndStore.data.next_page_url;
            if (ConvertAndStore.data.next_page_url === null){
                alert('មិនអាចខ្លីកទៅទៀតបានទេ ពីព្រោះគឺជាទំព័រចុងក្រោយ');
            }else {
                clearTimeout(timeout1);
                timeout1 = setTimeout(function () {
                    newAutoIncrement = oldAutoIncrement;
                    $('#Show_All_History td').remove();
                    var clickNext = new History("GET" , url);
                    clickNext.reads();
                }, 500);
            }
        });
        // ------------ show all tap ---------------------
        (function () {
            // --------- show data by these day ----------
            var _startDate1 = new Date().toISOString().slice(0, 10);//choose date from pc
            var autoTheseDay = new HistoryTheseDay("GET",'api/audit_trail/search?from_date='+_startDate1+'&to_date=&group=&action=&page_size=15');
            autoTheseDay.reads();
            // --------- show data find by day -----------
            var auto = new History("GET",'api/audit_trail/search?from_date=&to_date=&group=&action=&page_size=15'); auto.reads();
        })();
        // ------------ function search history ----------------
        var url, timeout1 = null;
        $('.btn-Search').on("click", function () {
            oldAutoIncrement = 0; // clear
            storeValueTheLastPage = 0; // clear

            var _startDate = $('#start_date').val();
            var _toDate = $('#to_date').val();
            var _chooseSearch = $('#chooseInvoiceOrItemType').val();
            var _historyInvoice = $('#history_invoice').val();
            var _historyActionItemType = $('#history_action_itemType').val();
            var _historyActionUser = $('#history_action_user').val();
            var _historyItemType = $('#history_itemType').val();
            var _historyUserLoginOrLogOut = $('#history_security_login_logout').val();
            // ---- condition have value search or not ----
            if (!_chooseSearch){
                url = 'api/audit_trail/search?from_date='+_startDate+'&to_date='+_toDate+'&group=&action=&page_size=15';
                setToAjax();
            } else {
                if (Number(_chooseSearch) === chooseInvoice){
                    url = 'api/audit_trail/search?from_date='+_startDate+'&to_date='+_toDate+'&group='+_chooseSearch+'&action='+_historyInvoice+'&page_size=15';
                    setToAjax();
                } else if (Number(_chooseSearch) === actionOfItemType){
                    url = 'api/audit_trail/search?from_date='+_startDate+'&to_date='+_toDate+'&group='+_chooseSearch+'&action='+_historyActionItemType+'&page_size=15';
                    setToAjax();
                } else if (Number(_chooseSearch) === actionUser){
                    url = 'api/audit_trail/search?from_date='+_startDate+'&to_date='+_toDate+'&group='+_chooseSearch+'&action='+_historyActionUser+'&page_size=15';
                    setToAjax();
                } else if (Number(_chooseSearch) === chooseItemTypeInvoice){
                    url = 'api/audit_trail/search?from_date='+_startDate+'&to_date='+_toDate+'&group='+_chooseSearch+'&action='+_historyItemType+'&page_size=15';
                    setToAjax();
                } else if (Number(_chooseSearch) === trackUserLoginLogOut){
                    url = 'api/audit_trail/search?from_date='+_startDate+'&to_date='+_toDate+'&group='+_chooseSearch+'&action='+_historyUserLoginOrLogOut+'&page_size=15';
                    setToAjax();
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
    </script>
@endsection
