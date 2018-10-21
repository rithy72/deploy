@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <!--<h6 class="panel-title">Default panel</h6>-->
            <ul class="breadcrumb breadcrumb-caret position-right">
                <li><a href="{{('/admin/mainform')}}" style="color: #2577e1;"><span>@lang('string.mainForm')</span></a></li>
                <li><a href="{{('/admin/user')}}" style="color: #2577e1;"><span>@lang('string.users')</span></a></li>
                <li class="active"><span>@lang('string.detail_user')</span></li>
                {{--<li class="active">Default collapsible</li>--}}
            </ul>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
        </div>


        <div class="panel-body" style="padding: 0">
            {{-- Header show button and invoice id  --}}
            <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 13px;margin-top: 6px;">
                {{--<div class="col-sm-5 col-md-7" style="margin-top: -6px;margin-bottom: 0;">--}}
                    {{--<div class="col-sm-12 col-md-6">--}}
                        {{--<h3><b>@lang('string.nameUser') ៖ </b><b id="name_user"></b></h3>--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-12 col-md-6">--}}
                        {{--<h3><b>តួរនាទី ៖ </b><b id="turnati"></b></h3>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div style="text-align: right;">
                    <div class="" style="margin-top: 13px;margin-bottom: 0;">
                        <a class="btn btn-success" id="createNewUser_tap3" style="margin-bottom: 4px;"><i class="icon-add position-left" ></i>@lang('string.createNew')</a> ||
                            <button type="button" class="btn btn-primary" id="update" style="margin-bottom: 4px;"><i class="icon-pencil7 position-left"></i>@lang('string.update')</button> ||
                        <div class="btn-group">
                            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                @lang('string.chooseOption')
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a id="reset_pass_user"><i class="icon-user-lock"></i>@lang('string.reset_password_user')</a></li>
                                <li id="link_active"><a id="active"><i class="icon-checkmark4"></i>@lang('string.active')</a></li>
                                <li id="link_deActive"><a id="deActive"><i class="icon-blocked"></i>@lang('string.deActive')</a></li>
                                <li id="link_delete"><a id="delete_User"><i class="icon-trash"></i>@lang('string.delete')</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End --}}
            {{-- Show choose --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="tabbable">
                    <ul class="nav nav-tabs nav-tabs-highlight">
                        <li class="active"><a href="#highlighted_tab1" data-toggle="tab" aria-expanded="false">@lang('string.generalInformation_user')</a></li>
                        <li id="show_click_tap2"><a href="#highlighted-tab2" data-toggle="tab" aria-expanded="true">@lang('string.history_of_admin_modify_to_user')</a></li>
                        <li id="show_click_tap3"><a href="#highlighted-tab4" data-toggle="tab" aria-expanded="true">@lang('string.audit_trail_of_user')</a></li>
                    </ul>

                <div class="tab-content">
                    {{--=========== Merl Detail bos User 1 ===============-----}}
                    <div class="tab-pane active" id="highlighted_tab1">
                        <div class="panel-body">
                            <legend class="text-semibold col-xs-12 col-sm-12 col-md-12" style="font-size: initial;">
                                <i class="icon-user position-left"></i>
                                @lang('string.user_information')
                            </legend>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group" style="font-size: 14px;">
                                    <label class="control-label col-sm-5 col-md-5" style="font-size: 14px">@lang('string.number') ៖</label>
                                    <div class="col-sm-7 col-md-7">
                                        <p id="User_No"></p>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group" style="font-size: 14px;">
                                    <label class="control-label col-sm-5 col-md-5" style="font-size: 14px">@lang('string.nameUser') ៖</label>
                                    <div class="col-sm-7 col-md-7">
                                        <p id="name_user"></p>

                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group" style="font-size: 14px;">
                                    <label class="control-label col-sm-5 col-md-5" style="font-size: 14px">@lang('string.phoneNumber') ៖</label>
                                    <div class="col-sm-7 col-md-7">
                                        <p id="phone_number"></p>

                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group" style="font-size: 14px;">
                                    <label class="control-label col-sm-5 col-md-5" style="font-size: 14px">@lang('string.email_real') ៖</label>
                                    <div class="col-sm-7 col-md-7">
                                        <p id="email"></p>

                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6" style="margin-right: 50%;">
                                <div class="form-group" style="font-size: 14px;">
                                    <label class="control-label col-sm-5 col-md-5" style="font-size: 14px">@lang('string.email') ៖</label>
                                    <div class="col-sm-7 col-md-7">
                                        <p id="show_username"></p>

                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group" style="font-size: 14px;">
                                    <label class="control-label col-sm-5 col-md-5" style="font-size: 14px">@lang('string.note') ៖</label>
                                    <div class="col-sm-7 col-md-7">
                                        <p id="note"></p>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <legend class="text-semibold col-xs-12 col-sm-12 col-md-12" style="font-size: initial;">
                                <i class="icon-user-check position-left"></i>
                                @lang('string.summary_history')
                            </legend>
                            <div class="col-sm-6 col-md-6" style=" margin-right: 50%;">
                                <div class="form-group" style="font-size: 14px;">
                                    <label class="control-label col-sm-5 col-md-5" style="font-size: 14px">@lang('string.situation') ៖</label>
                                    <div class="col-sm-7 col-md-7">
                                        <p id="status"></p>

                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group" style="font-size: 14px;">
                                    <label class="control-label col-sm-5 col-md-5" style="font-size: 14px">@lang('string.create_date') ៖</label>
                                    <div class="col-sm-7 col-md-7">
                                        <p id="create_date"></p>

                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group" style="font-size: 14px;">
                                    <label class="control-label col-sm-5 col-md-5" style="font-size: 14px">@lang('string.create_by') ៖</label>
                                    <div class="col-sm-7 col-md-7">
                                        <p id="create_by"></p>

                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group" style="font-size: 14px;">
                                    <label class="control-label col-sm-5 col-md-5" style="font-size: 14px">@lang('string.last_update_date') ៖</label>
                                    <div class="col-sm-7 col-md-7">
                                        <p id="last_create_date"></p>

                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group" style="font-size: 14px;">
                                    <label class="control-label col-sm-5 col-md-5" style="font-size: 14px">@lang('string.last_update_by') ៖</label>
                                    <div class="col-sm-7 col-md-7">
                                        <p id="last_create_by"></p>

                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--====== History create or modify by admin to user ====--}}
                    <div class="tab-pane" id="highlighted-tab2">
                        <div class="panel-body">
                            <div class="col-sm-3 col-md-2">
                                <span>@lang('string.startDate')</span><input type="date" class="form-control" id="start_date_tap2">
                            </div>
                            <div class="col-sm-3 col-md-2">
                                <span>@lang('string.startDateTo')</span><input type="date" class="form-control" id="to_date_tap2">
                            </div>
                            <div class="col-sm-3 col-md-3">
                                <span>@lang('string.actions')</span>
                                <div class="form-group">
                                    <select class="form-control" id="search_status_tap2">
                                        <option value="">@lang('string.all')</option>
                                        <option value="1">@lang('string.create')</option>
                                        <option value="2">@lang('string.update')</option>
                                        <option value="4">@lang('string.active')</option>
                                        <option value="5">@lang('string.deActive')</option>
                                        <option value="13">@lang('string.changePass')</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-1" style="text-align: center;">
                                <a class="btn btn-primary btn-Search-tap2" style="margin-top: 19px;margin-bottom: 5px;"><i class="icon-search4 position-left"></i>@lang('string.search')</a>
                            </div>
                            <br/><br/>

                            <div class="datatable-header" style="margin-top: -30px;"></div>
                            <div class="datatable-scroll" style="overflow-x: hidden;">
                                <div class="dataTables_scroll">
                                    <!--============ scroll body oy trov 1 header table ===============-->
                                    <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">
                                        <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_In_Tap2" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
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
                                    <a class="paginate_button previous_show_tap2" aria-controls="DataTables_Table_3" data-dt-idx="0" tabindex="0" id="Item_click_Back" style="display:none;">←</a>
                                    <span><a class="paginate_button current" id="Num_Page" aria-controls="DataTables_Table_3" data-dt-idx="1" tabindex="0"></a></span>
                                    <a class="paginate_button next_show_tap2" aria-controls="DataTables_Table_3" data-dt-idx="3" tabindex="0" id="Item_click_Next" style="display:none;">→</a>
                                </div>
                            </div>
                            {{--====================== End footer of pagination ====================--}}
                        </div>
                    </div>
                    {{--========== History all action of one user ===========--}}
                    <div class="tab-pane" id="highlighted-tab4">
                        <div class="panel-body">
                            <div class="col-sm-6 col-md-2">
                                <span>@lang('string.startDate')</span><input type="date" class="form-control" id="start_date_tap3">
                            </div>
                            <div class="col-sm-6 col-md-2">
                                <span>@lang('string.startDateTo')</span><input type="date" class="form-control" id="to_date_tap3">
                            </div>
                            {{------ choose option ------}}
                            <div class="col-sm-6 col-md-2">
                                <span>@lang('string.choose_audit_group')</span>
                                <div class="form-group">
                                    <select class="form-control" id="chooseInvoiceOrItemType1">
                                        <option selected="selected" value=""></option>
                                        <option value="1">@lang('string.invoice')</option>
                                        <option value="2">@lang('string.type')</option>
                                        <option value="4">@lang('string.item')</option>
                                        <option value="3">@lang('string.users')</option>
                                        <option value="18">@lang('string.TrackUserLoginAndLogout')</option>
                                    </select>
                                </div>
                            </div>
                            {{------ show option invoice ------}}
                            <div class="col-sm-3 col-md-2" style="display: none;" id="show_situation_invoice1">
                                <span>@lang('string.actions')</span>
                                <div class="form-group">
                                    <select class="form-control" id="history_user_tap3">
                                        <option value="1">@lang('string.create')</option>
                                        <option value="2">@lang('string.update')</option>
                                        <option value="6">@lang('string.paymentRate')</option>
                                        <option value="7">@lang('string.paymentGrand-Total')</option>
                                        <option value="8">@lang('string.addMoreCost')</option>
                                    </select>
                                </div>
                            </div>
                            {{------ show option item Type ------}}
                            <div class="col-sm-3 col-md-2" style="display: none;" id="show_action_ItemType1">
                                <span>@lang('string.actions')</span>
                                <div class="form-group">
                                    <select class="form-control" id="history_action_itemType_tap3">
                                        <option value="1">@lang('string.create')</option>
                                        <option value="2">@lang('string.update')</option>
                                        <option value="3">@lang('string.delete')</option>
                                        <option value="4">@lang('string.active')</option>
                                        <option value="5">@lang('string.deActive')</option>
                                    </select>
                                </div>
                            </div>
                            {{------ show option item Type ------}}
                            <div class="col-sm-3 col-md-2" style="display: none;" id="show_action_user1">
                                <span>@lang('string.actions')</span>
                                <div class="form-group">
                                    <select class="form-control" id="history_action_user_tap3">
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
                            <div class="col-sm-3 col-md-2" style="display: none;" id="show_situation_itemType1">
                                <span>@lang('string.actions')</span>
                                <div class="form-group">
                                    <select class="form-control" id="history_itemType_tap3">
                                        <option value="11">@lang('string.add')</option>
                                        <option value="10">@lang('string.sale')</option>
                                        <option value="12">@lang('string.lus_janh')</option>
                                    </select>
                                </div>
                            </div>
                            {{------ show security user login and logout ------}}
                            <div class="col-sm-3 col-md-2" style="display: none;" id="show_action_security_login_logout1">
                                <span>@lang('string.actions')</span>
                                <div class="form-group">
                                    <select class="form-control" id="history_security_login_logout_tap3">
                                        <option value="14">@lang('string.login')</option>
                                        <option value="15">@lang('string.logout.')</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-2" style="text-align: center;">
                                <a class="btn btn-primary btn_Search_tap3" style="margin-top: 19px;"><i class="icon-search4 position-left"></i>@lang('string.search')</a>
                            </div>
                            <br/><br/>

                            <div class="datatable-header" style="margin-top: -30px;"></div>
                            <div class="datatable-scroll" style="overflow-x: hidden;">
                                <div class="dataTables_scroll">
                                    <!--============ scroll body oy trov 1 header table ===============-->
                                    <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">
                                        <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_History_tap3" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
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
                                    <a class="paginate_button previous_show_tap3" aria-controls="DataTables_Table_3" data-dt-idx="0" tabindex="0" id="Item_click_Back" style="display:none;">←</a>
                                    <span><a class="paginate_button current" id="Num_Page1" aria-controls="DataTables_Table_3" data-dt-idx="1" tabindex="0"></a></span>
                                    <a class="paginate_button next_show_tap3" aria-controls="DataTables_Table_3" data-dt-idx="3" tabindex="0" id="Item_click_Next" style="display:none;">→</a>
                                </div>
                            </div>
                            {{--====================== End footer of pagination ====================--}}
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    {{---------   Dialog show detail history detail in tap2  -------}}
    <div id="show_detail_one_history_change_log_tap2" class="modal fade">
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
                                <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_One_Detail_in_dialog_tap2" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
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
    {{---------   Create New User   --------------------------------}}
    <form role="form" action="" method="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="createNewUser" class="modal fade">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" id="close_create_new_user" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">@lang('string.createNewUser')</h5>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12">
                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">
                                <div class="datatable-header" style="margin-top: -40px;">
                                    <div class="">
                                        <div class="form-group">
                                            {{--Number som Kol--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.number') ៖</label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="@lang('string.must_to_write')" id="user_no" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--full name--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.fullName') ៖</label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="@lang('string.must_to_write')" id="name_tap3" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--phone number--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.phoneNumber') ៖</label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="..." id="phoneNumber" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--Email--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.email_real')</label>
                                            <div class="col-lg-9">
                                                <input type="email" placeholder="..." id="email_tap3" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--Username--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.accounting')</label>
                                            <div class="col-lg-9">
                                                <input type="email" placeholder="@lang('string.must_to_write')" id="username_tap3" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--password 1--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.password') ៖</label>
                                            <div class="col-lg-9">
                                                <input type="password" placeholder="@lang('string.must_to_write')" id="password_User" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--password 2--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px;">@lang('string.confirm_pass')</label>
                                            <div class="col-lg-9">
                                                <input type="password" placeholder="@lang('string.must_to_write')" id="confirm_pass_user" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.note') ៖</label>
                                            <div class="col-lg-9">
                                                <textarea rows="3" cols="3" class="form-control" placeholder="..." style="border: 1px solid grey;" id="note_tap3"></textarea>
                                            </div>
                                            <div class="col-lg-12">
                                                <hr>
                                                <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.pass_admin') ៖</label>
                                                <div class="col-lg-9">
                                                    <input type="password" placeholder="@lang('string.must_to_write')" id="pass_admin" class="form-control" style="border: 1px solid grey;">
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" id="close_create_new_user" data-dismiss="modal" style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i class="icon-arrow-left12 position-left"></i>@lang('string.cancel')</button>
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-primary btn_create_new_user" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;"><b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{---------   Update User   ------------------------------------}}
    <form role="form" action="" method="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="update_user" class="modal fade">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" id="close_update_rate" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">@lang('string.updateUser')</h5>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12" style="margin-top: -6px;margin-bottom: 0;">
                            <div class="col-sm-6 col-md-6">
                                <h5 style="display: inline-flex;"><p>@lang('string.name') ៖</p><p id="show_name_dialog_update" style="margin-left: 5px;"></p></h5>
                                <br>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <h5 style="display: inline-flex;"><p>@lang('string.number') ៖</p><p id="show_user_no_dialog_update" style="margin-left: 5px;"></p></h5>
                                <br>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">
                                <div class="datatable-header" style="margin-top: -40px;">
                                    <div class="">
                                        <div class="form-group">
                                            {{--Number som Kol--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.number') ៖</label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="@lang('string.must_to_write')" id="user_no_update" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--full name--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.fullName') ៖</label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="@lang('string.must_to_write')" id="name_update" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--phone number--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.phoneNumber') ៖</label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="..." id="phoneNumber_update" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--Eamil--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.email_real')</label>
                                            <div class="col-lg-9">
                                                <input type="email" placeholder="..." id="email_update" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--Username--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.accounting')</label>
                                            <div class="col-lg-9">
                                                <input type="email" placeholder="@lang('string.must_to_write')" id="username_update" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.note') ៖</label>
                                            <div class="col-lg-9">
                                                <textarea rows="3" cols="3" class="form-control" placeholder="..." style="border: 1px solid grey;" id="note_update"></textarea>
                                            </div>
                                            <div class="col-lg-12">
                                                <hr>
                                                <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.pass_admin') ៖</label>
                                                <div class="col-lg-9">
                                                    <input type="password" placeholder="@lang('string.must_to_write')" id="pass_admin_update" class="form-control" style="border: 1px solid grey;">
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" id="" data-dismiss="modal" style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i class="icon-arrow-left12 position-left"></i>@lang('string.cancel')</button>
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-primary btn_update_to_server" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;"><b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{---------   Dialog delete user   -----------------------------}}
    <form role="form" action="" method="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="show_dialog_delete" class="modal fade">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal" id="close_dialog_delete">&times;</button>
                        <h5 class="modal-title">@lang('string.delete_User')</h5>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12" style="margin-top: -6px;margin-bottom: 0;">
                            <div class="col-sm-6 col-md-6">
                                <h5 style="display: inline-flex;"><p>@lang('string.name') ៖</p><p id="show_name_dialog_delete" style="margin-left: 5px;"></p></h5>
                                <br>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <h5 style="display: inline-flex;"><p>@lang('string.number') ៖</p><p id="show_user_no_dialog_delete" style="margin-left: 5px;"></p></h5>
                                <br>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">
                                <div class="datatable-header" style="margin-top: -40px;">
                                    <div class="">
                                        <div class="form-group">
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.pass_admin') ៖</label>
                                            <div class="col-lg-9">
                                                <input type="password" placeholder="@lang('string.must_to_write')" id="password_admin_delete" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" id="close_dialog_delete" data-dismiss="modal" style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i class="icon-arrow-left12 position-left"></i>@lang('string.cancel')</button>
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-primary btn_delete_User" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;"><b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{---------   Dialog deActive user   ---------------------------}}
    <form role="form" action="" method="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="show_dialog_deActive_user" class="modal fade">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal" id="close_dialog_deActive">&times;</button>
                        <h5 class="modal-title">@lang('string.stopUser')</h5>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12" style="margin-top: -6px;margin-bottom: 0;">
                            <div class="col-sm-6 col-md-6">
                                <h5 style="display: inline-flex;"><p>@lang('string.name') ៖</p><p id="show_name_dialog_deActive" style="margin-left: 5px;"></p></h5>
                                <br>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <h5 style="display: inline-flex;"><p>@lang('string.number') ៖</p><p id="show_user_no_dialog_deActive" style="margin-left: 5px;"></p></h5>
                                <br>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">
                                <div class="datatable-header" style="margin-top: -40px;">
                                    <div class="">
                                        <div class="form-group">
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.pass_admin') ៖</label>
                                            <div class="col-lg-9">
                                                <input type="password" placeholder="@lang('string.must_to_write')" id="password_admin_deActive" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" id="close_dialog_deActive" data-dismiss="modal" style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i class="icon-arrow-left12 position-left"></i>@lang('string.cancel')</button>
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-primary btn_deActive_user" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;"><b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{---------   Activate User   ----------------------------------}}
    <form role="form" action="" method="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="show_activate_user" class="modal fade">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" id="close_activate_user" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">@lang('string.active_user')</h5>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12" style="margin-top: -6px;margin-bottom: 0;">
                            <div class="col-sm-6 col-md-6">
                                <h5 style="display: inline-flex;"><p>@lang('string.name') ៖</p><p id="show_name_dialog_active" style="margin-left: 5px;"></p></h5>
                                <br>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <h5 style="display: inline-flex;"><p>@lang('string.number') ៖</p><p id="show_user_no_dialog_active" style="margin-left: 5px;"></p></h5>
                                <br>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">
                                <div class="datatable-header" style="margin-top: -40px;">
                                    <div class="">
                                        <div class="form-group">
                                            {{--password 1--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.password') ៖</label>
                                            <div class="col-lg-9">
                                                <input type="password" placeholder="@lang('string.must_to_write')" id="password_User_active" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--password 2--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px;margin-top: 6px;">@lang('string.confirm_pass')</label>
                                            <div class="col-lg-9">
                                                <input type="password" placeholder="@lang('string.must_to_write')" id="confirm_pass_user_active" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--password admin--}}
                                            <div class="col-lg-12">
                                                <hr>
                                                <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.pass_admin') ៖</label>
                                                <div class="col-lg-9">
                                                    <input type="password" placeholder="@lang('string.must_to_write')" id="pass_admin_active" class="form-control" style="border: 1px solid grey;">
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" id="close_activate_user" data-dismiss="modal" style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i class="icon-arrow-left12 position-left"></i>@lang('string.cancel')</button>
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-primary btn_activate_user" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;"><b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{---------   Dialog Reset user   ------------------------------}}
    <form role="form" action="" method="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="show_dialog_reset_password_user" class="modal fade">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal" id="close_dialog_reset_user">&times;</button>
                        <h5 class="modal-title">@lang('string.reset_password_user_')</h5>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12" style="margin-top: -6px;margin-bottom: 0;">
                            <div class="col-sm-6 col-md-6">
                                <h5 style="display: inline-flex;"><p>@lang('string.name') ៖</p><p id="show_name_dialog_reset_Pass" style="margin-left: 5px;"></p></h5>
                                <br>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <h5 style="display: inline-flex;"><p>@lang('string.number') ៖</p><p id="show_user_no_dialog_reset_Pass" style="margin-left: 5px;"></p></h5>
                                <br>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">
                                <div class="datatable-header" style="margin-top: -40px;">
                                    <div class="">
                                        <div class="form-group">
                                            {{--password 1--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.new_password') ៖</label>
                                            <div class="col-lg-9">
                                                <input type="password" placeholder="@lang('string.must_to_write')" id="password_User_reset" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--password 2--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px;margin-top: 6px;">@lang('string.confirm_pass')</label>
                                            <div class="col-lg-9">
                                                <input type="password" placeholder="@lang('string.must_to_write')" id="confirm_pass_user_reset" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--password admin--}}
                                            <div class="col-lg-12">
                                                <hr>
                                                <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.pass_admin') ៖</label>
                                                <div class="col-lg-9">
                                                    <input type="password" placeholder="@lang('string.must_to_write')" id="pass_admin_reset" class="form-control" style="border: 1px solid grey;">
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" id="close_dialog_reset_user" data-dismiss="modal" style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i class="icon-arrow-left12 position-left"></i>@lang('string.cancel')</button>
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-primary btn_reset_User" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;"><b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>
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
        // -------------- show detail auto --------------
        var _ID , ConvertJson;
        (function () {
            _ID = atob($.cookie("KeyUser"));
            $.ajax({
                type: "GET",
                url: '../api/user/find/' + _ID + '',
                success: function (ResponseJson) {
                    ConvertJson = JSON.parse(ResponseJson);
                    // show button delete if true
                    ConvertJson.data.delete_able === true ? $('#link_delete').show() : $('#link_delete').hide();
                    // show button if active or deActive
                    ConvertJson.data.status === 1 ? $('#link_active').hide() && $('#link_deActive').show() : $('#link_active').show() && $('#link_deActive').hide();
                    // show text active or deActive
                    var texts = ConvertJson.data.status === 1 ? '<span class="label label-success" style="font-size: 13px;">@lang('string.active')</span>' : '<span class="label label-default" style="font-size: 13px;">@lang('string.deActive')</span>';
                    $('#status').html(texts);
                    $('#name_user').text(ConvertJson.data.name);
                    $('#turnati').text(ConvertJson.data.display_role);
                    $('#User_No').text(ConvertJson.data.user_no);
                    $('#phone_number').text(ConvertJson.data.phone_number);
                    $('#email').text(ConvertJson.data.email);
                    $('#create_date').text(ConvertJson.data.created_date);
                    $('#create_by').text(ConvertJson.data.created_by);
                    $('#last_create_date').text(ConvertJson.data.last_update_date);
                    $('#last_create_by').text(ConvertJson.data.last_update_by);
                    $('#note').text(ConvertJson.data.note);
                    $('#show_username').text(ConvertJson.data.username);
                    // ------------------- show user in table tape 2 -----------------
                    var ShowAuto_tap2 = new ShowHistoryTap2("GET",'../api/user/user_history/'+_ID+'?from_date=&to_date=&action=&page_size=15');
                    ShowAuto_tap2.reads();
                    // ------------------- show user in table tape 3 -----------------
                    var ShowAuto_tap3 = new ShowHistoryTap3("GET",'../api/user/action_history/'+_ID+'?from_date=&to_date=&group=&action=&page_size=15');
                    ShowAuto_tap3.reads();
                }
            })
        })();
        // ------------ define class constructor ------------------
        function ShowHistoryTap2(methods, linkUrl) {
            this.method = methods;
            this.urls = linkUrl;
        }
        // ------------ ajax request to server --------------------
        ShowHistoryTap2.prototype.reads =  function() {
            $.ajax({
                type: this.method,
                url: this.urls,
                success: function (ResponseJson) {
                    //console.log(ResponseJson);
                    ModelShowInTableTap2(ResponseJson);
                }
            });
        };
        // ------------- show data in table tap2 ------------------
        var ConvertAndStore, oldAutoIncrement = 0;
        function ModelShowInTableTap2(getJsonValue) {
            ConvertAndStore = JSON.parse(getJsonValue);
            document.getElementById("page").innerHTML = ConvertAndStore.data.current_page;
            document.getElementById("first").innerHTML = ConvertAndStore.data.from;
            document.getElementById("last").innerHTML = ConvertAndStore.data.to;
            document.getElementById("all").innerHTML = ConvertAndStore.data.total;
            document.getElementById("Num_Page").innerHTML = ConvertAndStore.data.current_page;

            if (ConvertAndStore.data.last_page === 1) {
                $('.previous_show_tap2').hide();
                $('.next_show_tap2').hide();
            } else {
                $('.previous_show_tap2').show();
                $('.next_show_tap2').show();
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
                $('#Show_All_In_Tap2 tbody').append(_tr);
            }
        }
        // ---------------- search tap2 ------------------
        var timeout1 = null;
        $('.btn-Search-tap2').on("click",function () {
            oldAutoIncrement = 0;
            storeValueTheLastPage = 0;
            var start_date = $('#start_date_tap2').val();
            var to_date = $('#to_date_tap2').val();
            var status = $('#search_status_tap2').val();

            clearTimeout(timeout1);
            timeout1 = setTimeout(function () {
                $('#Show_All_In_Tap2 td').remove();
                var searchHistoryTap2 = new ShowHistoryTap2("GET" , '../api/user/user_history/'+_ID+'?from_date='+start_date+'&to_date='+to_date+'&action='+status+'&page_size=15');
                searchHistoryTap2.reads();
            }, 1000);
        });
        // ------------ click back tap2 ---------------------
        var storeValueTheLastPage = 0, valueDefaultAuto = 15;
        $(".previous_show_tap2").click(function () {
            var url = ConvertAndStore.data.prev_page_url;
            if (ConvertAndStore.data.prev_page_url === null){
                alert('មិនអាចខ្លីកត្រលប់បានទេ ពីព្រោះគឺជាទំព័រដំបូង');
            }else {
                clearTimeout(timeout1);
                timeout1 = setTimeout(function () {
                    storeValueTheLastPage = oldAutoIncrement - Number(newAutoIncrement);
                    storeValueTheLastPage += valueDefaultAuto;
                    oldAutoIncrement = oldAutoIncrement - storeValueTheLastPage;
                    newAutoIncrement = oldAutoIncrement;
                    storeValueTheLastPage = 0;
                    $('#Show_All_In_Tap2 td').remove();
                    var clickBack = new ShowHistoryTap2("GET" , url);
                    clickBack.reads();
                }, 500);
            }
        });
        // ------------ click next tap2 --------------------
        var newAutoIncrement;
        $(".next_show_tap2").click(function () {
            var url = ConvertAndStore.data.next_page_url;
            if (ConvertAndStore.data.next_page_url === null){
                alert('មិនអាចខ្លីកទៅទៀតបានទេ ពីព្រោះគឺជាទំព័រចុងក្រោយ');
            }else {
                clearTimeout(timeout1);
                timeout1 = setTimeout(function () {
                    newAutoIncrement = oldAutoIncrement;
                    $('#Show_All_In_Tap2 td').remove();
                    var clickNext = new ShowHistoryTap2("GET" , url);
                    clickNext.reads();
                }, 500);
            }
        });
        // ---- click show dialog detail history in tap2 ----
        $(document).on("click","#detail_invoice",function () {
            $('#show_detail_one_history_change_log_tap2').modal({ backdrop: 'static' });
            var _selectRow = $(this).closest('tr');
            $('#Show_One_Detail_in_dialog_tap2 td').remove();
            var storeDescribe = $(_selectRow).find('td:eq(2)').text();
            var storeName = $(_selectRow).find('td:eq(1)').text();
            const splitString = storeDescribe.split(" - ");
            const splitStringName = storeName.split(" - ");
            (function(){
                $('#name').text(splitStringName[1]);
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
                    $('#Show_One_Detail_in_dialog_tap2 tbody').append(_tr);
                }
            })();
        });
    // ============================== tap3 ==================================================
    // ============================== tap3 ==================================================
    // ============================== tap3 ==================================================
        // ------------ onchange select history find these day -------------
        var select1 = document.getElementById('chooseInvoiceOrItemType1');
        var chooseInvoice=1,actionOfItemType=2,actionUser=3,chooseItemTypeInvoice=4,trackUserLoginLogOut=18;
        select1.onchange = function() {
            var storeInvoiceStatus = $('#chooseInvoiceOrItemType1').val();
            if (Number(storeInvoiceStatus) === Number(chooseInvoice)) {
                $('#show_situation_invoice1').show();
                $('#show_action_ItemType1').hide();
                $('#show_action_user1').hide();
                $('#show_situation_itemType1').hide();
                $('#show_action_security_login_logout1').hide();
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
        function ShowHistoryTap3(methods, linkUrl) {
            this.method = methods;
            this.urls = linkUrl;
        }
        // ------------ ajax request to server -----------------
        ShowHistoryTap3.prototype.reads =  function() {
            $.ajax({
                type: this.method,
                url: this.urls,
                success: function (ResponseJson) {
                    //console.log(ResponseJson);
                    ShowDataInTableTap3(ResponseJson);
                }
            });
        };
        // ------------ search in tap3 -------------------------
        var url1;
        $('.btn_Search_tap3').on("click",function () {
            oldAutoIncrement1 = 0;
            storeValueTheLastPage1 = 0;

            var _startDate = $('#start_date_tap3').val();
            var _toDate = $('#to_date_tap3').val();

            var _chooseSearch_by_User = $('#chooseInvoiceOrItemType1').val();
            var _historyInvoice_by_User = $('#history_user_tap3').val();
            var _historyActionItemType_by_User = $('#history_action_itemType_tap3').val();
            var _historyActionUser_by_User = $('#history_action_user_tap3').val();
            var _historyItemType_by_User = $('#history_itemType_tap3').val();
            var _historyUserLoginOrLogOut_by_User = $('#history_security_login_logout_tap3').val();
            // ---- condition have value search or not ----
            if (!_chooseSearch_by_User){
                url1 = '../api/user/action_history/'+_ID+'?from_date='+_startDate+'&to_date='+_toDate+'&group=&action=&page_size=15';
                setToAjax1();
            } else {
                if (Number(_chooseSearch_by_User) === chooseInvoice){
                    url1 = '../api/user/action_history/'+_ID+'?from_date='+_startDate+'&to_date='+_toDate+'&group='+_chooseSearch_by_User+'&action='+_historyInvoice_by_User+'&page_size=15';
                    setToAjax1();
                } else if (Number(_chooseSearch_by_User) === actionOfItemType){
                    url1 = '../api/user/action_history/'+_ID+'?from_date='+_startDate+'&to_date='+_toDate+'&group='+_chooseSearch_by_User+'&action='+_historyActionItemType_by_User+'&page_size=15';
                    setToAjax1();
                } else if (Number(_chooseSearch_by_User) === actionUser){
                    url1 = '../api/user/action_history/'+_ID+'?from_date='+_startDate+'&to_date='+_toDate+'&group='+_chooseSearch_by_User+'&action='+_historyActionUser_by_User+'&page_size=15';
                    setToAjax1();
                } else if (Number(_chooseSearch_by_User) === chooseItemTypeInvoice){
                    url1 = '../api/user/action_history/'+_ID+'?from_date='+_startDate+'&to_date='+_toDate+'&group='+_chooseSearch_by_User+'&action='+_historyItemType_by_User+'&page_size=15';
                    setToAjax1();
                } else if (Number(_chooseSearch_by_User) === trackUserLoginLogOut){
                    url1 = '../api/user/action_history/'+_ID+'?from_date='+_startDate+'&to_date='+_toDate+'&group='+_chooseSearch_by_User+'&action='+_historyUserLoginOrLogOut_by_User+'&page_size=15';
                    setToAjax1();
                }
            }
            function setToAjax1() {
                clearTimeout(timeout1);
                timeout1 = setTimeout(function () {
                    $('#Show_All_History_tap3 td').remove();
                    var searchHistoryTheseDay = new ShowHistoryTap3("GET" , url1);
                    searchHistoryTheseDay.reads();
                }, 1000);
            }
        });
        // ------------ model show in table --------------------
        var ConvertAndStore1 , oldAutoIncrement1 = 0;
        function ShowDataInTableTap3(getJsonValue) {
            ConvertAndStore1 = JSON.parse(getJsonValue);
            document.getElementById("page1").innerHTML = ConvertAndStore1.data.current_page;
            document.getElementById("first1").innerHTML = ConvertAndStore1.data.from;
            document.getElementById("last1").innerHTML = ConvertAndStore1.data.to;
            document.getElementById("all1").innerHTML = ConvertAndStore1.data.total;
            document.getElementById("Num_Page1").innerHTML = ConvertAndStore1.data.current_page;

            if (ConvertAndStore1.data.last_page === 1) {
                $('.previous_show_tap3').hide();
                $('.next_show_tap3').hide();
            } else {
                $('.previous_show_tap3').show();
                $('.next_show_tap3').show();
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
                $('#Show_All_History_tap3 tbody').append(_tr);
            }
        }
        // ------------ click back tap3 ------------------------
        var storeValueTheLastPage1 = 0;
        $(".previous_show_tap3").click(function () {
            var url = ConvertAndStore1.data.prev_page_url;
            if (ConvertAndStore1.data.prev_page_url === null){
                alert('មិនអាចខ្លីកត្រលប់បានទេ ពីព្រោះគឺជាទំព័រដំបូង');
            }else {
                clearTimeout(timeout1);
                timeout1 = setTimeout(function () {
                    storeValueTheLastPage1 = oldAutoIncrement1 - Number(newAutoIncrement1);
                    storeValueTheLastPage1 += valueDefaultAuto;
                    oldAutoIncrement1 = oldAutoIncrement1 - storeValueTheLastPage1;
                    newAutoIncrement1 = oldAutoIncrement1;
                    storeValueTheLastPage1 = 0;
                    $('#Show_All_History_tap3 td').remove();
                    var clickBack = new ShowHistoryTap3("GET" , url);
                    clickBack.reads();
                }, 500);
            }
        });
        // ------------ click next tap3 ------------------------
        var newAutoIncrement1;
        $(".next_show_tap3").click(function () {
            var url = ConvertAndStore1.data.next_page_url;
            if (ConvertAndStore1.data.next_page_url === null){
                alert('មិនអាចខ្លីកទៅទៀតបានទេ ពីព្រោះគឺជាទំព័រចុងក្រោយ');
            }else {
                clearTimeout(timeout1);
                timeout1 = setTimeout(function () {
                    newAutoIncrement1 = oldAutoIncrement1;
                    $('#Show_All_History_tap3 td').remove();
                    var clickNext = new ShowHistoryTap3("GET" , url);
                    clickNext.reads();
                }, 500);
            }
        });
    // ============================== admin can do ===========================================
    // ============================== admin can do ===========================================
    // ============================== admin can do ===========================================
        // ------------------- create new User --------------------
        $(document).on("click","#createNewUser_tap3",function(){$('#createNewUser').modal({backdrop: 'static'});});
        $('.btn_create_new_user').on("click",function () {
            var user_no = $('#user_no').val();
            var name = $('#name_tap3').val();
            var phone_number = $('#phoneNumber').val();
            var email_user = $('#email_tap3').val();
            var username = $('#username_tap3').val();
            var password_User = $('#password_User').val();
            var confirm_password_user = $('#confirm_pass_user').val();
            var note = $('#note_tap3').val();
            var password_admin = $('#pass_admin').val();
            if (!user_no){
                alert('បំពេញលេខសំគាល់អ្នកប្រើប្រាស់សិន');
            } else {
                if (!name){
                    alert('បំពេញឈ្មោះអ្នកប្រើប្រាស់សិន');
                } else {
                    if (!username){
                        alert('បំពេញគណនេយ្យអ្នកប្រើប្រាស់សិន');
                    } else {
                        if (!password_User || !confirm_password_user){
                            alert('បំពេញ លេខសំងាត់ និង លេខសំងាត់ម្តងទៀត ជាមុនសិន');
                        } else {
                            if (password_User !== confirm_password_user){
                                alert('លេខសំងាត់ និង លេខសំងាត់ម្តងទៀត ត្រូវតែដូចគ្នា');
                            } else {
                                if (!password_admin){
                                    alert('បំពេញលេខសំងាត់អេតមីុនជាមុនសិន ទើបធ្វើការបង្កើតអ្នកប្រើប្រាស់បាន');
                                } else {
                                    var storeModel = {
                                        "admin_password": password_admin,
                                        "user_info": {
                                            "user_no": user_no,
                                            "name": name,
                                            "phone_number": phone_number,
                                            "note": note,
                                            "email": email_user,
                                            "username" : username,
                                            "password": password_User
                                        }
                                    };
                                    // ------------- request -------------
                                    $.ajax({
                                        type:"POST",
                                        url: '../api/user/create',
                                        data: storeModel,
                                        success: function (Response) {
                                            var ConvertResponse = JSON.parse(Response);
                                            if (ConvertResponse.status === "200"){
                                                alert('បង្កើតអ្នកប្រើប្រាស់ជោគជ័យ');
                                                window.location.href = '{{('/admin/user/detail_user')}}';
                                            } else if (ConvertResponse.status === "300"){
                                                alert('គណនេយ្យមានរួចម្តងមកហើយ');
                                            } else if (ConvertResponse.status === "301"){
                                                alert('លេខសំគាលអ្នកប្រើប្រាស់មានម្តងមកហើយ');
                                            } else if (ConvertResponse.status === "400"){
                                                alert('ព័ត៌មានបំពេញទៅមិនគ្រប់គ្រាន់');
                                            } else if (ConvertResponse.status === "401"){
                                                alert('មិនមែនជាអេតមីុន ឬក៌ លេខសំងាត់អេតមីុនមិនត្រឹមត្រូវ');
                                            }
                                        }
                                    });
                                }
                            }
                        }
                    }
                }
            }
        });
        $(document).on("click","#close_create_new_user",function () {
            $('#user_no').val('');
            $('#name_tap3').val('');
            $('#phoneNumber').val('');
            $('#email_tap3').val('');
            $('#password_User').val('');
            $('#confirm_pass_user').val('');
            $('#note_tap3').val('');
            $('#pass_admin').val('');
        });
        // ------------------- update User -----------------------
        $(document).on("click","#update",function(){$('#update_user').modal({ backdrop: 'static' });
            (function(){
                ConvertJson.data.delete_able === "true" ? $( "#user_no_update" ).prop( "disabled", false ) : $( "#user_no_update" ).prop( "disabled", true );
                $('#user_no_update').val(ConvertJson.data.user_no);
                $('#name_update').val(ConvertJson.data.name);
                $('#phoneNumber_update').val(ConvertJson.data.phone_number);
                $('#email_update').val(ConvertJson.data.email);
                $('#note_update').val(ConvertJson.data.note);
                $('#username_update').val(ConvertJson.data.username);

                $('#show_user_no_dialog_update').text(ConvertJson.data.user_no);
                $('#show_name_dialog_update').text(ConvertJson.data.name);
            })();
        });
        $('.btn_update_to_server').on("click",function () {
            var user_no_update = $('#user_no_update').val();
            var name_update = $('#name_update').val();
            var phone_number_update = $('#phoneNumber_update').val();
            var email_user_update = $('#email_update').val();
            var username_update = $('#username_update').val();
            var note_update = $('#note_update').val();
            var password_admin_update = $('#pass_admin_update').val();
            // condition
            if(user_no_update) {
                if(name_update){
                    if(username_update){
                        if(password_admin_update){
                            var updateModel = {
                                "admin_password": password_admin_update,
                                "user_info": {
                                    "user_no": user_no_update,
                                    "name": name_update,
                                    "phone_number": phone_number_update,
                                    "note": note_update,
                                    "email": email_user_update,
                                    "username" : username_update
                                }
                            };
                            // request
                            $.ajax({
                                type:"PUT",
                                url: '../api/user/edit/'+_ID+'',
                                data: updateModel,
                                success:function (ResponseJson) {
                                    var ConvertResponse = JSON.parse(ResponseJson);
                                    if (ConvertResponse.status === "200"){
                                        alert('កែប្រែអ្នកប្រើប្រាស់ជោគជ័យ');
                                        window.location.href = '{{('/admin/user/detail_user')}}';
                                    } else if (ConvertResponse.status === "300"){
                                        alert('គណនេយ្យមានរួចម្តងមកហើយ');
                                    } else if (ConvertResponse.status === "301"){
                                        alert('លេខសំគាលអ្នកប្រើប្រាស់មានម្តងមកហើយ');
                                    } else if (ConvertResponse.status === "400"){
                                        alert('ព័ត៌មានបំពេញទៅមិនគ្រប់គ្រាន់');
                                    } else if (ConvertResponse.status === "401"){
                                        alert('មិនមែនជាអេតមីុន ឬក៌ លេខសំងាត់អេតមីុនមិនត្រឹមត្រូវ');
                                    }
                                }
                            });
                        } else {alert('បំពេញលេខសំងាត់អេតមីុនជាមុនសិន ទើបធ្វើការកែប្រែអ្នកប្រើប្រាស់បាន');}
                    } else {alert('បំពេញគណនេយ្យអ្នកប្រើប្រាស់សិន');}
                } else {alert('បំពេញឈ្មោះអ្នកប្រើប្រាស់សិន');}
            } else {alert('បំពេញលេខសំគាល់អ្នកប្រើប្រាស់សិន');}
        });
        // ------------------- delete User -----------------------
        $(document).on("click","#delete_User",function(){$('#show_dialog_delete').modal({ backdrop: 'static' });
            (function () {
                $('#show_user_no_dialog_delete').text(ConvertJson.data.user_no);
                $('#show_name_dialog_delete').text(ConvertJson.data.name);
            })();
        });
        $(document).on("click","#close_dialog_delete",function () {$('#password_admin_delete').val('');});
        $('.btn_delete_User').on("click",function(){
            var storePasswordAdminToDeleteUser = $('#password_admin_delete').val();
            if(storePasswordAdminToDeleteUser){
                var modelDelete = { "admin_password":storePasswordAdminToDeleteUser };
                $.ajax({
                    type:"DELETE",
                    url: '../api/user/delete/'+_ID+'',
                    data: modelDelete,
                    success:function (ResponseDelete) {
                        var ConvertResponse = JSON.parse(ResponseDelete);
                        if (ConvertResponse.status === "200"){
                            alert('ធ្វើការលុបអ្នកប្រើប្រាស់ជោគជ័យ');
                            window.location.href = '{{('/admin/user')}}';
                        } else if (ConvertResponse.status === "400"){
                            alert('មិនអាចលុបអ្នកប្រើប្រាស់បានទេ');
                        } else if (ConvertResponse.status === "401"){
                            alert('មិនមែនជាអេតមីុន ឬក៌ លេខសំងាត់អេតមីុនមិនត្រឹមត្រូវ');
                        }
                    }
                })
            } else {alert('បំពេញលេខសំងាត់អេតមីុនជាមុនសិន ទើបធ្វើការលុបអ្នកប្រើប្រាស់បាន');}
        });
        // ------------------- DeActivate user -------------------
        $(document).on("click","#deActive",function(){$('#show_dialog_deActive_user').modal({ backdrop: 'static' });
            (function () {
                $('#show_user_no_dialog_deActive').text(ConvertJson.data.user_no);
                $('#show_name_dialog_deActive').text(ConvertJson.data.name);
            })();
        });
        $(document).on("click","#close_dialog_deActive",function () {$('#password_admin_deActive').val('');});
        $('.btn_deActive_user').on("click",function(){
            var storePasswordAdminToDeActiveUser = $('#password_admin_deActive').val();
            if(storePasswordAdminToDeActiveUser){
                var modelDeActiveUser = { "admin_password":storePasswordAdminToDeActiveUser };
                $.ajax({
                    type:"PUT",
                    url: '../api/user/deactivate/'+_ID+'',
                    data: modelDeActiveUser,
                    success:function (ResponseDeActivate) {
                        var ConvertResponse = JSON.parse(ResponseDeActivate);
                        if (ConvertResponse.status === "200"){
                            alert('ធ្វើការផ្អាកដំណើរការអ្នកប្រើប្រាស់ជោគជ័យ');
                            window.location.href = '{{('/admin/user/detail_user')}}';
                        } else if (ConvertResponse.status === "401"){
                            alert('មិនមែនជាអេតមីុន ឬក៌ លេខសំងាត់អេតមីុនមិនត្រឹមត្រូវ');
                        }
                    }
                })
            } else {alert('បំពេញលេខសំងាត់អេតមីុនជាមុនសិន ទើបផ្មាកដំណើរការអ្នកប្រើប្រាស់បាន');}
        });
        // ------------------- activate user ----------------------
        $(document).on("click","#active",function(){$('#show_activate_user').modal({ backdrop: 'static' });
            (function () {
                $('#show_user_no_dialog_active').text(ConvertJson.data.user_no);
                $('#show_name_dialog_active').text(ConvertJson.data.user_no);
            })();
        });
        $(document).on("click","#close_activate_user",function () {
            $('#password_User_active').val('');
            $('#confirm_pass_user_active').val('');
            $('#pass_admin_active').val('');
        });
        $('.btn_activate_user').on("click",function(){
            var passwordUser = $('#password_User_active').val();
            var confirmPassUser = $('#confirm_pass_user_active').val();
            var pass_admin = $('#pass_admin_active').val();
            var storeModelActivate = {
                "admin_password": pass_admin,
                "user_info": {
                    "new_password": passwordUser
                }
            };
            if(passwordUser && confirmPassUser){
                if(passwordUser === confirmPassUser){
                    if(pass_admin){
                        $.ajax({
                            type:"PUT",
                            url: '../api/user/activate/'+_ID+'',
                            data: storeModelActivate,
                            success:function (ResponseDeActivate) {
                                var ConvertResponse = JSON.parse(ResponseDeActivate);
                                if (ConvertResponse.status === "200"){
                                    alert('ដំណើរការអ្នកប្រើប្រាស់វិញបានជោគជ័យ');
                                    window.location.href = '{{('/admin/user/detail_user')}}';
                                } else if (ConvertResponse.status === "401"){
                                    alert('មិនមែនជាអេតមីុន ឬក៌ លេខសំងាត់អេតមីុនមិនត្រឹមត្រូវ');
                                }
                            }
                        })
                    } else {alert('បំពេញលេខសំងាត់អេតមីុនជាមុនសិន ទើបដំណើរការអ្នកប្រើប្រាស់វិញបាន');}
                } else {alert('លេខសំងាត់ និង លេខសំងាត់ម្តងទៀត ត្រូវតែដូចគ្នា');}
            } else {alert('បំពេញ លេខសំងាត់ និង លេខសំងាត់ម្តងទៀត ជាមុនសិន');}
        });
        // ------------------- reset password dialog --------------
        $(document).on("click","#reset_pass_user",function(){
            $('#show_dialog_reset_password_user').modal({backdrop: 'static'});
            (function () {
                $('#show_user_no_dialog_reset_Pass').text(ConvertJson.data.user_no);
                $('#show_name_dialog_reset_Pass').text(ConvertJson.data.name);
            })();
        });
        $(document).on("click","#close_dialog_reset_user",function () {
            $('#password_User_reset').val('');
            $('#confirm_pass_user_reset').val('');
            $('#pass_admin_reset').val('');
        });
        $('.btn_reset_User').on("click",function(){
            var passwordUser = $('#password_User_reset').val();
            var confirmPassUser = $('#confirm_pass_user_reset').val();
            var pass_admin = $('#pass_admin_reset').val();
            var storeModelResetPassUser = {
                "admin_password": pass_admin,
                "user_info": {
                    "new_password": passwordUser
                }
            };
            if(passwordUser && confirmPassUser){
                if(passwordUser === confirmPassUser){
                    if(pass_admin){
                        $.ajax({
                            type:"PUT",
                            url: '../api/user/admin_reset_user_password/'+_ID+'',
                            data: storeModelResetPassUser,
                            success:function (ResponseDeActivate) {
                                var ConvertResponse = JSON.parse(ResponseDeActivate);
                                if (ConvertResponse.status === "200"){
                                    alert('ផ្លាស់ប្តូរលេខសំងាត់របស់អ្នកប្រើប្រាស់បានជោគជ័យ');
                                    window.location.href = '{{('/admin/user/detail_user')}}';
                                } else if (ConvertResponse.status === "401"){
                                    alert('មិនមែនជាអេតមីុន ឬក៌ លេខសំងាត់អេតមីុនមិនត្រឹមត្រូវ');
                                }
                            }
                        })
                    } else {alert('បំពេញលេខសំងាត់អេតមីុនជាមុនសិន ទើបផ្លាស់ប្តូរលេខសំងាត់អ្នកប្រើប្រាស់បាន');}
                } else {alert('លេខសំងាត់ និង លេខសំងាត់ម្តងទៀត ត្រូវតែដូចគ្នា');}
            } else {alert('បំពេញ លេខសំងាត់ និង លេខសំងាត់ម្តងទៀត ជាមុនសិន');}
        });
    </script>
@endsection