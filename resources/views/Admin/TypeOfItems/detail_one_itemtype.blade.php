@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <!--<h6 class="panel-title">Default panel</h6>-->
            <ul class="breadcrumb breadcrumb-caret position-right">
                <li><a href="{{('/admin/mainform')}}" style="color: #2577e1;"><span>@lang('string.mainForm')</span></a></li>
                <li><a href="{{('/admin/item_type')}}" style="color: #2577e1;"><span>@lang('string.inventory')</span></a></li>
                <li><a href="{{('/admin/item_type')}}" style="color: #2577e1;"><span>@lang('string.type')</span></a></li>
                <li class="active"><span>@lang('string.detail_itemType')</span></li>
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
            <div class="col-md-12" style="margin-bottom: 13px;margin-top: 6px;">
                <div class="col-md-8" style="margin-top: -6px;margin-bottom: 0;">
                    <div class="col-md-6">
                        <h3><b>@lang('string.nameUser') ៖ </b><b id="name_user"></b></h3>
                    </div>
                    <div class="col-md-6">
                        <h3><b>តួរនាទី ៖ </b><b id="turnati"></b></h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dataTables_length" id="DataTables_Table_3_length" style="margin-top: 13px;margin-bottom: 0;">
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
            <div class="tabbable">
                <ul class="nav nav-tabs nav-tabs-highlight">
                    <li class="active"><a href="#highlighted_tab1" data-toggle="tab" aria-expanded="false">@lang('string.generalInformation_user')</a></li>
                    <li id="show_click_tap2"><a href="#highlighted-tab2" data-toggle="tab" aria-expanded="true">@lang('string.history_of_admin_modify_to_user')</a></li>
                </ul>

                <div class="tab-content">
                    {{--=========== Merl Detail bos User 1 ===============-----}}
                    <div class="tab-pane active" id="highlighted_tab1">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <div class="form-group" style="font-size: 18px;">
                                    <label class="control-label col-md-4" style="font-size: 18px">@lang('string.number') ៖</label>
                                    <div class="col-md-8">
                                        <p id="User_No"></p>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="font-size: 18px;">
                                    <label class="control-label col-md-4" style="font-size: 18px">@lang('string.phoneNumber') ៖</label>
                                    <div class="col-md-8">
                                        <p id="phone_number"></p>

                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="font-size: 18px;">
                                    <label class="control-label col-md-4" style="font-size: 18px">@lang('string.email') ៖</label>
                                    <div class="col-md-8">
                                        <p id="email"></p>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="font-size: 18px;">
                                    <label class="control-label col-md-4" style="font-size: 18px">@lang('string.situation') ៖</label>
                                    <div class="col-md-8">
                                        <p id="status"></p>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="font-size: 18px;">
                                    <label class="control-label col-md-4" style="font-size: 18px">@lang('string.create_date') ៖</label>
                                    <div class="col-md-8">
                                        <p id="create_date"></p>

                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="font-size: 18px;">
                                    <label class="control-label col-md-4" style="font-size: 18px">@lang('string.create_by') ៖</label>
                                    <div class="col-md-8">
                                        <p id="create_by"></p>

                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="font-size: 18px;">
                                    <label class="control-label col-md-4" style="font-size: 18px">@lang('string.last_update_date')៖</label>
                                    <div class="col-md-8">
                                        <p id="last_create_date"></p>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="font-size: 18px;">
                                    <label class="control-label col-md-4" style="font-size: 18px">@lang('string.last_update_by') ៖</label>
                                    <div class="col-md-8">
                                        <p id="last_create_by"></p>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="font-size: 18px;">
                                    <label class="control-label col-md-4" style="font-size: 18px">@lang('string.note') ៖</label>
                                    <div class="col-md-8">
                                        <p id="note"></p>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--====== History create or modify by admin to user ====--}}
                    <div class="tab-pane" id="highlighted-tab2">
                        <div class="panel-body">
                            <div class="col-md-2">
                                <span>@lang('string.startDate')</span><input type="date" class="form-control" id="start_date_tap2">
                            </div>
                            <div class="col-md-2">
                                <span>@lang('string.startDateTo')</span><input type="date" class="form-control" id="to_date_tap2">
                            </div>
                            <div class="col-md-3">
                                <span>@lang('string.situation')</span>
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
                            <a class="btn btn-primary btn-Search-tap2" style="margin-top: 19px;"><i class="icon-search4 position-left"></i>@lang('string.search')</a>
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
{{--@section('content')--}}
    {{--<div class="panel panel-default">--}}
        {{--<div class="panel-heading">--}}
            {{--<!--<h6 class="panel-title">Default panel</h6>-->--}}
            {{--<ul class="breadcrumb breadcrumb-caret position-right">--}}
                {{--<li><a href="{{('/admin/mainform')}}" style="color: #2577e1;"><span>@lang('string.mainForm')</span></a></li>--}}
                {{--<li><a href="{{('/admin/user')}}" style="color: #2577e1;"><span>@lang('string.users')</span></a></li>--}}
                {{--<li class="active"><span>@lang('string.detail_user')</span></li>--}}
                {{--<li class="active">Default collapsible</li>--}}
            {{--</ul>--}}
            {{--<div class="heading-elements">--}}
                {{--<ul class="icons-list">--}}
                    {{--<li><a data-action="collapse"></a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<a class="heading-elements-toggle"><i class="icon-menu"></i></a>--}}
        {{--</div>--}}


        {{--<div class="panel-body" style="padding: 0">--}}
            {{--<div class="col-xs-12 col-sm-12 col-md-12" style="text-align: center;">--}}
                {{--<div class="dataTables_length" style="margin-top: 13px;margin-bottom: 0;">--}}
                    {{--<a class="btn btn-success" id="createNewUser_tap3" style="margin-bottom: 4px;"><i class="icon-add position-left" ></i>@lang('string.createNew')</a> ||--}}
                    {{--<button type="button" class="btn btn-primary" id="update" style="margin-bottom: 4px;"><i class="icon-pencil7 position-left"></i>@lang('string.update')</button> ||--}}
                    {{--<div class="btn-group">--}}
                        {{--<a class="btn btn-default dropdown-toggle" data-toggle="dropdown">--}}
                            {{--@lang('string.chooseOption')--}}
                            {{--<span class="caret"></span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu dropdown-menu-right">--}}
                            {{--<li><a id="reset_pass_user"><i class="icon-user-lock"></i>@lang('string.reset_password_user')</a></li>--}}
                            {{--<li id="link_active"><a id="active"><i class="icon-checkmark4"></i>@lang('string.active')</a></li>--}}
                            {{--<li id="link_deActive"><a id="deActive"><i class="icon-blocked"></i>@lang('string.deActive')</a></li>--}}
                            {{--<li id="link_delete"><a id="delete_User"><i class="icon-trash"></i>@lang('string.delete')</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    {{--<br><br>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-sm-12 col-md-12">--}}
                {{--<div class="sol-sm-2 col-md-2">--}}
                    {{--<span>@lang('string.startDate')</span><input type="date" class="form-control" id="start_date">--}}
                {{--</div>--}}
                {{--<div class="sol-sm-2 col-md-2">--}}
                    {{--<span>@lang('string.startDateTo')</span><input type="date" class="form-control" id="to_date">--}}
                {{--</div>--}}
                {{------ choose option ------}}
                {{--<div class="sol-sm-2 col-md-2">--}}
                    {{--<span>@lang('string.chooseOption')</span>--}}
                    {{--<div class="form-group">--}}
                        {{--<select class="form-control" id="choose_status_itemType">--}}
                            {{--<option selected="selected" value=""></option>--}}
                            {{--<option value="1">@lang('string.create')</option>--}}
                            {{--<option value="2">@lang('string.update')</option>--}}
                            {{--<option value="3">@lang('string.delete')</option>--}}
                            {{--<option value="4">@lang('string.active')</option>--}}
                            {{--<option value="5">@lang('string.deActive')</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-12 col-md-2" style="text-align: center;">--}}
                {{--<a class="btn btn-primary btn_Search_tap3" style="margin-top: 19px;margin-bottom: 14px;"><i class="icon-search4 position-left"></i>@lang('string.search')</a>--}}
                    {{--<br>--}}
                {{--</div>--}}
            {{--</div>--}}
                {{--<div class="datatable-header" style="margin-top: -30px;"></div>--}}
                {{--<div class="datatable-scroll" style="overflow-x: hidden;">--}}
                    {{--<div class="dataTables_scroll">--}}
                        {{--<!--============ scroll body oy trov 1 header table ===============-->--}}
                        {{--<div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">--}}
                            {{--<table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_History_tap3" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">--}}
                                {{--<thead style="background: #e3e3ea99;">--}}
                                {{--<tr role="row">--}}
                                    {{--<th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.id')</th>--}}
                                    {{--<th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.UserAction')</th>--}}
                                    {{--<th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.actions')</th>--}}
                                    {{--<th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.describe')</th>--}}
                                    {{--<th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.date')</th>--}}
                                    {{--<th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending" style="text-align: center;">@lang('string.detail')</th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}

                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--========================= footer of pagination ====================--}}
                {{--<div class="datatable-footer">--}}
                    {{--<div class="dataTables_info" id="DataTables_Table_3_info" role="status" aria-live="polite">ទំព័រ <b id="page1"></b> មាន <b id="first1"></b> ប្រវត្តិទៅដល់ <b id="last1"></b> នៃចំនួនប្រវត្តិទាំងអស់គឺ <b id="all1"></b> </div>--}}
                    {{--<div class="dataTables_paginate paging_simple_numbers" id="">--}}
                        {{--<a class="paginate_button previous_show_tap3" aria-controls="DataTables_Table_3" data-dt-idx="0" tabindex="0" id="Item_click_Back" style="display:none;">←</a>--}}
                        {{--<span><a class="paginate_button current" id="Num_Page1" aria-controls="DataTables_Table_3" data-dt-idx="1" tabindex="0"></a></span>--}}
                        {{--<a class="paginate_button next_show_tap3" aria-controls="DataTables_Table_3" data-dt-idx="3" tabindex="0" id="Item_click_Next" style="display:none;">→</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--====================== End footer of pagination ====================--}}
        {{--</div>--}}
    {{--</div>--}}
    {{---------   Dialog show detail history detail in tap2  -------}}
    {{--<div id="show_detail_one_history_change_log_tap2" class="modal fade">--}}
        {{--<div class="modal-dialog modal-full" style="margin-left: auto;margin-right: auto;width: 79%;">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header bg-primary">--}}
                    {{--<button type="button" class="close" data-dismiss="modal">×</button>--}}
                    {{--<h5 class="modal-title">@lang('string.showDetailOneHistory')</h5>--}}
                {{--</div>--}}

                {{--<div class="modal-body">--}}
                    {{--<div class="datatable-header" style="margin-top: -30px;">--}}
                        {{--<div class="col-md-8" style="margin-top: -6px;margin-bottom: 0;">--}}
                            {{--<div class="col-md-6">--}}
                                {{--<h5 style="display: inline-flex;"><p>@lang('string.UserAction') ៖</p><p id="name" style="margin-left: 5px;"></p></h5>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<h5 style="display: inline-flex;"><p>@lang('string.do') ៖</p><p id="do_action" style="margin-left: 5px;"></p></h5>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="datatable-scroll" style="overflow-x: hidden;">--}}
                        {{--<div class="dataTables_scroll">--}}
                            {{--<!--============ scroll body oy trov 1 header table ===============-->--}}
                            {{--<div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">--}}
                                {{--<table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_One_Detail_in_dialog_tap2" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">--}}
                                    {{--<thead style="background: #e3e3ea99;">--}}
                                    {{--<tr role="row">--}}
                                        {{--<th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.id')</th>--}}
                                        {{--<th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.actionUsers')</th>--}}
                                        {{--<th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.on')</th>--}}
                                        {{--<th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.newValue')</th>--}}
                                        {{--<th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.oldValue')</th>--}}
                                    {{--</tr>--}}
                                    {{--</thead>--}}
                                    {{--<tbody>--}}

                                    {{--</tbody>--}}
                                {{--</table>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--========================= footer of pagination ====================--}}
                    {{--<div class="datatable-footer"></div>--}}
                    {{--====================== End footer of pagination ====================--}}
                {{--</div>--}}
                {{--<div class="modal-footer"></div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div id="loading" style="display: none;--}}
    {{--width: 249px;--}}
    {{--height: 120px;--}}
    {{--position: fixed;--}}
    {{--top: 50%;--}}
    {{--left: 50%;--}}
    {{--text-align:center;--}}
    {{--margin-left: -123px;--}}
    {{--margin-top: -100px;--}}
    {{--z-index:2;--}}
    {{--overflow: auto;">--}}
        {{--<div style="max-width: 255px;max-height: 120px;display: inline-flex;background: #fff;">--}}
            {{--<img style="max-height: 100px;max-width: 100px;" src="/assets/images/newLoading.gif"/>--}}
            {{--<p style="font-size: 30px;margin-top: 28px;">@lang('string.Loading...')</p>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endsection--}}

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
//        (function () {
//            var _ID = atob($.cookie("KeyItemType")); // convert id unique from base64
//            $.ajax({
//                type: "GET",
//                url: 'api/item_group/'+_ID+'',
//                success: function (response) {
//                    console.log(response);
//                }
//            });
//        })();

//        (function () {
//            var _ID = atob($.cookie("KeyItemType")); // convert id unique from base64
//            $.ajax({
//                type: "GET",
//                url: 'api/item_group/history/'+_ID+'?from_date=&to_date=&action=&page_size=15',
//                success: function (response) {
//                    console.log(response);
//                }
//            });
//        })();
    </script>
@endsection