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
            <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 13px;margin-top: 6px;text-align: center;">
                {{--<div class="col-md-8" style="margin-top: -6px;margin-bottom: 0;">--}}
                    {{--<div class="col-md-6">--}}
                        {{--<h3><b>@lang('string.nameUser') ៖ </b><b id="name_user"></b></h3>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-6">--}}
                        {{--<h3><b>តួរនាទី ៖ </b><b id="turnati"></b></h3>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-4">--}}
                    <div class="dataTables_length" id="DataTables_Table_3_length" style="margin-top: 13px;margin-bottom: 0;">
                        <a class="btn btn-success" id="create_new_item_type" style="margin-bottom: 4px;"><i class="icon-add position-left" ></i>@lang('string.createNew')</a> ||
                        <button type="button" class="btn btn-primary" id="update_item_type" style="margin-bottom: 4px;"><i class="icon-pencil7 position-left"></i>@lang('string.update')</button> ||
                        <div class="btn-group">
                            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                @lang('string.chooseOption')
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li id="link_active"><a id="Active"><i class="icon-checkmark4"></i>@lang('string.active')</a></li>
                                <li id="link_deActive"><a id="deActive"><i class="icon-blocked"></i>@lang('string.deActive')</a></li>
                                <li id="link_delete"><a id="deleteItem"><i class="icon-trash"></i>@lang('string.delete')</a></li>
                            </ul>
                        </div>
                    </div>
                {{--</div>--}}
            </div>
            {{-- End --}}
            {{-- Show choose --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="tabbable">
                <ul class="nav nav-tabs nav-tabs-highlight">
                    <li class="active"><a href="#highlighted_tab1" data-toggle="tab" aria-expanded="false">@lang('string.generalInformation_user')</a></li>
                    <li id="show_click_tap2"><a href="#highlighted-tab2" data-toggle="tab" aria-expanded="true">@lang('string.history_of_admin_modify_to_user')</a></li>
                </ul>

                <div class="tab-content">
                    {{--=========== Merl Detail bos User 1 ===============-----}}
                    <div class="tab-pane active" id="highlighted_tab1">
                        <div class="panel-body">
                            <legend class="text-semibold col-xs-12 col-sm-12 col-md-12" style="font-size: initial;">
                                <i class="icon-file-text position-left"></i>
                                ពត៌មានប្រភេទទំនិញ
                            </legend>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group" style="font-size: 14px;">
                                    <label class="control-label col-sm-5 col-md-4" style="font-size: 14px">@lang('string.name_itemType')</label>
                                    <div class="col-sm-7 col-md-8">
                                        <p id="name_ItemType"></p>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group" style="font-size: 14px;">
                                    <label class="control-label col-sm-5 col-md-4" style="font-size: 14px">@lang('string.situation') ៖</label>
                                    <div class="col-sm-7 col-md-8">
                                        <p id="situation"></p>

                                    </div>
                                    <br>
                                </div>
                            </div>
                            <legend class="text-semibold col-xs-12 col-sm-12 col-md-12" style="font-size: initial;">
                                <i class="icon-drawer3 position-left"></i>
                                សម្កាល់សម្រាប់ចំណាំ
                            </legend>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group" style="font-size: 14px;">
                                    <label class="control-label col-sm-5 col-md-4" style="font-size: 14px">@lang('string.itemType_notice_1')</label>
                                    <div class="col-sm-7 col-md-8">
                                        <p id="show_notice1"></p>

                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group" style="font-size: 14px;">
                                    <label class="control-label col-sm-5 col-md-4" style="font-size: 14px">@lang('string.itemType_notice_2')</label>
                                    <div class="col-sm-7 col-md-8">
                                        <p id="show_notice2"></p>

                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group" style="font-size: 14px;">
                                    <label class="control-label col-sm-5 col-md-4" style="font-size: 14px">@lang('string.itemType_notice_3')</label>
                                    <div class="col-sm-7 col-md-8">
                                        <p id="show_notice3"></p>

                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group" style="font-size: 14px;">
                                    <label class="control-label col-sm-5 col-md-4" style="font-size: 14px">@lang('string.itemType_notice_4')</label>
                                    <div class="col-sm-7 col-md-8">
                                        <p id="show_notice4"></p>

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
                                <span>@lang('string.startDate')</span><input type="date" class="form-control" id="start_date">
                            </div>
                            <div class="col-sm-3 col-md-2">
                                <span>@lang('string.startDateTo')</span><input type="date" class="form-control" id="to_date">
                            </div>
                            <div class="col-sm-3 col-md-3">
                                <span>@lang('string.actions')</span>
                                <div class="form-group">
                                    <select class="form-control" id="status_itemType">
                                        <option selected="selected" value="">@lang('string.all')</option>
                                        <option value="1">@lang('string.create')</option>
                                        <option value="2">@lang('string.update')</option>
                                        <option value="4">@lang('string.active')</option>
                                        <option value="5">@lang('string.deActive')</option>
                                        <option value="3">@lang('string.delete')</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2" style="text-align: center;">
                                <a class="btn btn-primary btn-Search-History-ItemType" style="margin-top: 19px;"><i class="icon-search4 position-left"></i>@lang('string.search')</a>
                            </div>
                            <br/><br/>

                            <div class="datatable-header" style="margin-top: -30px;"></div>
                            <div class="datatable-scroll" style="overflow-x: hidden;">
                                <div class="dataTables_scroll">
                                    <!--============ scroll body oy trov 1 header table ===============-->
                                    <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">
                                        <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_History_Of_One_ItemType" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
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
                                    <a class="paginate_button previous_show_history_ItemType" aria-controls="DataTables_Table_3" data-dt-idx="0" tabindex="0" id="Item_click_Back" style="display:none;">←</a>
                                    <span><a class="paginate_button current" id="Num_Page" aria-controls="DataTables_Table_3" data-dt-idx="1" tabindex="0"></a></span>
                                    <a class="paginate_button next_show_history_ItemType" aria-controls="DataTables_Table_3" data-dt-idx="3" tabindex="0" id="Item_click_Next" style="display:none;">→</a>
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
    {{---------   Create New Type Of Item   ------------------------}}
    <form role="form" action="" method="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="createNewItemType" class="modal fade">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal" id="close_create_new_dialog">&times;</button>
                        <h5 class="modal-title">@lang('string.createNewItem')</h5>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12">
                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">
                                <div class="datatable-header" style="margin-top: -40px;">
                                    <div class="">
                                        <div class="form-group">
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.typeItems')</label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="@lang('string.addNewTypeItemHere...')" name="" id="new_item_type" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.notice')</label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="@lang('string.itemType_notice1')" id="notice_itemType_1" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-3" style="font-size: 15px"></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="@lang('string.itemType_notice2')" id="notice_itemType_2" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-3" style="font-size: 15px"></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="@lang('string.itemType_notice3')" id="notice_itemType_3" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-3" style="font-size: 15px"></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="@lang('string.itemType_notice4')" id="notice_itemType_4" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal" id="close_create_new_dialog" style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i class="icon-arrow-left12 position-left"></i>@lang('string.cancel')</button>
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-primary btn_create_new_item_type_dialog" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;"><b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{---------   Update ItemType   ----------------------------}}
    <form role="form" action="" method="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="dialog_update_item_type" class="modal fade">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" id="close_update_rate" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">@lang('string.updateItemType')</h5>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12">
                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer">
                                <div class="datatable-header" style="margin-top: -40px;">
                                    <div class="">
                                        <div class="form-group">
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.typeItems')</label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="@lang('string.addOldItemForUpdate')" name="" id="updateItem" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.notice')</label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="@lang('string.itemType_notice1')" id="notice_itemType_update_1" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-3" style="font-size: 15px"></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="@lang('string.itemType_notice2')" id="notice_itemType_update_2" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-3" style="font-size: 15px"></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="@lang('string.itemType_notice3')" id="notice_itemType_update_3" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-3" style="font-size: 15px"></label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="@lang('string.itemType_notice4')" id="notice_itemType_update_4" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" id="close_update_rate" data-dismiss="modal" style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i class="icon-arrow-left12 position-left"></i>@lang('string.cancel')</button>
                        {{ csrf_field() }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="button" class="btn btn-primary btn_update_item_type" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;"><b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{---------   Dialog show detail history detail in tap2  -------}}
    <div id="show_detail_change_log_history_itemType" class="modal fade">
        <div class="modal-dialog modal-full" style="margin-left: auto;margin-right: auto;width: 79%;">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h5 class="modal-title">@lang('string.showDetailOneHistory')</h5>
                </div>

                <div class="modal-body">
                    <div class="datatable-header" style="margin-top: -30px;">
                        <div class="col-md-8" style="margin-top: -6px;margin-bottom: 0;">
                            <div class="col-sm-6 col-md-6">
                                <h5 style="display: inline-flex;"><p>@lang('string.UserAction') ៖</p><p id="name" style="margin-left: 5px;"></p></h5>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <h5 style="display: inline-flex;"><p>@lang('string.do') ៖</p><p id="do_action" style="margin-left: 5px;"></p></h5>
                            </div>
                        </div>
                    </div>
                    <div class="datatable-scroll" style="overflow-x: hidden;">
                        <div class="dataTables_scroll">
                            <!--============ scroll body oy trov 1 header table ===============-->
                            <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">
                                <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Table_Detail_history_itemType" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // ------------ show detail one ItemType ------------------------------
        var storeJsonDetailItemType, _ID;
        (function () {
            _ID = atob($.cookie("KeyItemType")); // convert id unique from base64
            $.ajax({
                type: "GET",
                url: '../api/item_group/'+_ID+'',
                success: function (response) {
                    storeJsonDetailItemType = JSON.parse(response);
                    $('#name_ItemType').text(storeJsonDetailItemType.data.item_type_name);
                    // show delete if ItemType is not transaction
                    storeJsonDetailItemType.data.delete_able === 1 ? $('#link_delete').show() : $('#link_delete').hide();
                    // show if ItemType is active or deActive
                    if (storeJsonDetailItemType.data.status === 1){
                        $('#link_active').hide(); $('#link_deActive').show();
                    } else { $('#link_active').show()&&$('#link_deActive').hide() }
                    // display text color show active or deActive
                    var texts = storeJsonDetailItemType.data.status === 1 ? '<span class="label label-success" style="font-size: 13px;">@lang('string.active')</span>' : '<span class="label label-default" style="font-size: 13px;">@lang('string.deActive')</span>';
                    $('#situation').html(texts);
                    $('#show_notice1').html(storeJsonDetailItemType.data.first_note);
                    $('#show_notice2').html(storeJsonDetailItemType.data.second_note);
                    $('#show_notice3').html(storeJsonDetailItemType.data.third_note);
                    $('#show_notice4').html(storeJsonDetailItemType.data.fourth_note);
                    // ----------- request to get history of one itemType ----------
                    var RequestToGetItemTypeHistory = new ShowDetailHistoryOfOneItemType("GET",'../api/item_group/history/'+_ID+'?from_date=&to_date=&action=&page_size=15');
                    RequestToGetItemTypeHistory.reads();
                }
            });
        })();
        // ------------ define class constructor ------------------------------
        function ShowDetailHistoryOfOneItemType(methods, linkUrl) {
            this.method = methods;
            this.urls = linkUrl;
        }
        // ------------ ajax request to server --------------------------------
        ShowDetailHistoryOfOneItemType.prototype.reads =  function() {
            $.ajax({
                type: this.method,
                url: this.urls,
                success: function (ResponseJson) {
                    //console.log(ResponseJson);
                    ModelShowHitosryOneItemTypeInTable(ResponseJson);
                }
            });
        };
        // ------------- function search itemType history ---------------------
        $('.btn-Search-History-ItemType').on("click",function () {
            storeValueTheLastPage = 0; oldAutoIncrement = 0; // clear variable to 0
            var start_date = $('#start_date').val();
            var to_date = $('#to_date').val();
            var status = $('#status_itemType').val();

            clearTimeout(timeout1);
            timeout1 = setTimeout(function () {
                $('#Show_All_History_Of_One_ItemType td').remove();
                var SearchHistory_Of_OneItemType = new ShowDetailHistoryOfOneItemType("GET" , '../api/item_group/history/'+_ID+'?from_date='+start_date+'&to_date='+to_date+'&action='+status+'&page_size=15');
                SearchHistory_Of_OneItemType.reads();
            }, 1000);
        });
        // ------------- show data in table tap2 ------------------------------
        var ConvertAndStore, oldAutoIncrement = 0;
        function ModelShowHitosryOneItemTypeInTable(getJsonValue) {
            ConvertAndStore = JSON.parse(getJsonValue);
            document.getElementById("page").innerHTML = ConvertAndStore.data.current_page;
            document.getElementById("first").innerHTML = ConvertAndStore.data.from;
            document.getElementById("last").innerHTML = ConvertAndStore.data.to;
            document.getElementById("all").innerHTML = ConvertAndStore.data.total;
            document.getElementById("Num_Page").innerHTML = ConvertAndStore.data.current_page;

            if (ConvertAndStore.data.last_page === 1) {
                $('.previous_show_history_ItemType').hide();
                $('.next_show_history_ItemType').hide();
            } else {
                $('.previous_show_history_ItemType').show();
                $('.next_show_history_ItemType').show();
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
                $('#Show_All_History_Of_One_ItemType tbody').append(_tr);
            }
        }
        // ------------ click back history itemType ---------------------------
        var storeValueTheLastPage = 0, valueDefaultAuto = 15;
        $(".previous_show_history_ItemType").click(function () {
            var url = ConvertAndStore.data.prev_page_url;
            if (ConvertAndStore.data.prev_page_url === null){
                alert('មិនអាចខ្លីកត្រលប់បានទេ ពីព្រោះគឺជាទំព័រដំបូង');
            } else {
                clearTimeout(timeout1);
                timeout1 = setTimeout(function () {
                    storeValueTheLastPage = oldAutoIncrement - Number(newAutoIncrement);
                    storeValueTheLastPage += valueDefaultAuto;
                    oldAutoIncrement = oldAutoIncrement - storeValueTheLastPage;
                    newAutoIncrement = oldAutoIncrement;
                    storeValueTheLastPage = 0;
                    $('#Show_All_History_Of_One_ItemType td').remove();
                    var clickBack_show_History_one_itemType = new ShowDetailHistoryOfOneItemType("GET" , url);
                    clickBack_show_History_one_itemType.reads();
                }, 500);
            }
        });
        // ------------ click next history itemType ---------------------------
        var newAutoIncrement, timeout1 = null;
        $(".next_show_history_ItemType").click(function () {
            var url = ConvertAndStore.data.next_page_url;
            if (ConvertAndStore.data.next_page_url === null){
                alert('មិនអាចខ្លីកទៅទៀតបានទេ ពីព្រោះគឺជាទំព័រចុងក្រោយ');
            } else {
                clearTimeout(timeout1);
                timeout1 = setTimeout(function () {
                    newAutoIncrement = oldAutoIncrement;
                    $('#Show_All_History_Of_One_ItemType td').remove();
                    var clickNext_show_History_one_itemType = new ShowDetailHistoryOfOneItemType("GET" , url);
                    clickNext_show_History_one_itemType.reads();
                }, 500);
            }
        });
        // ------------ create new ItemType -----------------------------------
                    //-- show dialog create --
        $(document).on("click","#create_new_item_type",function(){
            $('#createNewItemType').modal({
                backdrop: 'static'
            });
        });
                    //-- function clear --
        function clears() {
            $('#new_item_type').val('');
            $('#notice_itemType_1').val('');
            $('#notice_itemType_2').val('');
            $('#notice_itemType_3').val('');
            $('#notice_itemType_4').val('');}
                    //-- close dialog and clear --
        $(document).on("click","#close_create_new_dialog",function () {clears();});
                    //-- ajax request --
        $('.btn_create_new_item_type_dialog').on("click",function () {
            var storeInput = $('#new_item_type').val();
            var store_notice1 = $('#notice_itemType_1').val();
            var store_notice2 = $('#notice_itemType_2').val();
            var store_notice3 = $('#notice_itemType_3').val();
            var store_notice4 = $('#notice_itemType_4').val();
            if (storeInput === ""){
                alert('បំពេញប្រភេទទំនិញសិន មុនពេលធ្វើការបង្កើត');
            } else {
                $.ajax({
                    type: "POST",
                    url: '../api/item_group',
                    data: {"item_type_name": storeInput,"first_note":store_notice1, "second_note":store_notice2, "third_note":store_notice3, "fourth_note":store_notice4},
                    success: function (response) {
                        var jsonObj = JSON.parse(response);
                        if (jsonObj.status === '200'){
                            alert('បង្កើតជោគជ័យ'); clears();
                        } else{ alert('ឈ្មោះមានរួចហើយ សូមធ្វើការកែប្រែម្តងទៀត'); }
                    }
                });
            }
        });
        // -------------- update itemType --------------------------------
                        //-- show dialog create --
        $(document).on("click","#update_item_type",function(){$('#dialog_update_item_type').modal({backdrop: 'static'});
            (function () {
                $('#updateItem').val(storeJsonDetailItemType.data.item_type_name);
                $('#notice_itemType_update_1').val(storeJsonDetailItemType.data.first_note);
                $('#notice_itemType_update_2').val(storeJsonDetailItemType.data.second_note);
                $('#notice_itemType_update_3').val(storeJsonDetailItemType.data.third_note);
                $('#notice_itemType_update_4').val(storeJsonDetailItemType.data.fourth_note);
            })();
        });
                        //-- ajax request --
        $(".btn_update_item_type").click(function () {
            var storeInput = $('#updateItem').val();
            var store_update_note_itemType_1 = $('#notice_itemType_update_1').val();
            var store_update_note_itemType_2 = $('#notice_itemType_update_2').val();
            var store_update_note_itemType_3 = $('#notice_itemType_update_3').val();
            var store_update_note_itemType_4 = $('#notice_itemType_update_4').val();
            if (storeInput === ""){
                alert('បំពេញប្រភេទទំនិញសិន មុនពេលធ្វើការបង្កើត');
            } else {
                $.ajax({
                    type: "PUT",
                    url: '../api/item_group/' + _ID + '',
                    data: {"item_type_name": storeInput,"first_note":store_update_note_itemType_1,"second_note":store_update_note_itemType_2, "third_note":store_update_note_itemType_3,"fourth_note":store_update_note_itemType_4},
                    success: function (response) {
                        var convert = JSON.parse(response);
                        if (convert.status === "200") {
                            alert('ធ្វើការកែប្រែជោគជ័យ');
                            window.location.href = '{{('/admin/item_type/detail_one_itemtype')}}';
                        } else if (convert.status === "301") {
                            alert('ឈ្មោះមានរួចហើយ សូមធ្វើការកែប្រែម្តងទៀត');
                        }
                    }
                });
            }
        });
        //្---------------- Delete item  --------------------------------------
        $(document).on("click","#deleteItem",function () {
            if (confirm('តើអ្នកច្បាស់ឬអតក្នុងការលុបទំនិញនេះ')) {
                $.ajax({
                    type: "DELETE",
                    url: '../api/item_group/' + _ID + '',
                    success: function (response) {
                        var convert = JSON.parse(response);
                        if (convert.status === "200"){
                            alert('ធ្វើការលុបជោគជ័យ');
                            window.location.href = '{{('/admin/item_type')}}';
                        } else if (convert.status === "210"){
                            alert('មិនអាចស្វែងរក ដើម្បីធ្វើការលុបបានឡើយ');
                        }
                    }
                });
            }
        });
        //្---------------- make deActive --------------------------------------
        $(document).on("click","#deActive",function () {
            if (confirm('តើអ្នកច្បាស់ឬអតក្នុងការ ផ្អាកដំណើរការទំនិញនេះ')) {
                $.ajax({
                    type: "PUT",
                    url: '../api/item_group/deactivate/' + _ID + '',
                    success: function (response) {
                        var convert = JSON.parse(response);
                        if (convert.status === "200") {
                            alert('ធ្វើការផ្អាកដំណើរការជោគជ័យ');
                            window.location.href = '{{('/admin/item_type/detail_one_itemtype')}}';
                        }
                    }
                });
            }
        });
        // ----------------- make Active ---------------------------------------
        $(document).on("click","#Active",function () {
            if (confirm('តើអ្នកច្បាស់ឬអតក្នុងការ ដំណើរការទំនិញឡើងវិញ')) {
                $.ajax({
                    type: "PUT",
                    url: '../api/item_group/activate/' + _ID + '',
                    success: function (response) {
                        var convert = JSON.parse(response);
                        if (convert.status === "200") {
                            alert('ដំណើរការឡើងវិញជោគជ័យ');
                            window.location.href = '{{('/admin/item_type/detail_one_itemtype')}}';
                        }
                    }
                });
            }
        });
        // ------------------ detail history of ItemType ------------------------
        $(document).on("click","#detail_invoice",function () {
            $('#show_detail_change_log_history_itemType').modal({ backdrop: 'static' });
            var _selectRow = $(this).closest('tr');
            $('#Table_Detail_history_itemType td').remove();
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
                    $('#Table_Detail_history_itemType tbody').append(_tr);
                }
            })();
        });
    </script>
@endsection