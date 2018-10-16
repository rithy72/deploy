@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <!--<h6 class="panel-title">Default panel</h6>-->
            <ul class="breadcrumb breadcrumb-caret position-right">
                <li><a href="{{('/admin/mainform')}}" style="color: #2577e1;"><span>@lang('string.mainForm')</span></a></li>
                <li class="active"><span>@lang('string.users')</span></li>
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
            <div class="dataTables_length" id="DataTables_Table_3_length" style="margin-top: 19px;">
                <a class="btn btn-success" id="createTomNagn"><i class="icon-add position-left"></i>@lang('string.createNewUser')</a>
            </div>

            <div class="col-md-2">
                <span>@lang('string.fine')</span>
                <div class="form-group">
                    <select class="form-control" id="find_user_way">
                        <option value="1">@lang('string.number')</option>
                        <option value="2">@lang('string.nameUser')</option>
                        <option value="3">@lang('string.phoneNumber')</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <span>@lang('string.situation')</span>
                <div class="form-group">
                    <select class="form-control" id="find_status_user">
                        <option value="">@lang('string.all')</option>
                        <option value="1">@lang('string.active')</option>
                        <option value="0">@lang('string.deActive')</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <span>.</span><input type="text" id="search_input" class="form-control" placeholder="@lang('string.searchItems')">
            </div>
            <a class="btn btn-primary btn_search_user" style="margin-top: 19px;"><i class="icon-search4 position-left"></i>@lang('string.search')</a>
            <br/><br/>
            <div class="datatable-header" style="margin-top: -19px;"></div>
            <div class="datatable-scroll" style="overflow-x: hidden;">
                <div class="dataTables_scroll">
                    <!--============ scroll body oy trov 1 header table ===============-->
                    <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">
                        <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_User_In_Table" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                            <thead style="background: #e3e3ea99;">
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.number')</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.fullName')</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.phoneNumber')</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">តួនាទី</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.situation')</th>
                                <th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 100px;">@lang('string.actions')</th>
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
                <div class="dataTables_info" id="DataTables_Table_3_info" role="status" aria-live="polite">ទំព័រ <b id="page1"></b> មាន <b id="first1"></b> បញ្ជីអ្នកប្រើប្រាស់ទៅដស់ <b id="last1"></b> នៃបញ្ជីអ្នកប្រើប្រាស់ទាំងអស់គឺ <b id="all1"></b> </div>
                <div class="dataTables_paginate paging_simple_numbers" id="">
                    <a class="paginate_button previous_show_user" aria-controls="DataTables_Table_3" data-dt-idx="0" tabindex="0" id="Item_click_Back" style="display:none;">←</a>
                    <span><a class="paginate_button current" id="Num_Page1" aria-controls="DataTables_Table_3" data-dt-idx="1" tabindex="0"></a></span>
                    <a class="paginate_button next_show_user" aria-controls="DataTables_Table_3" data-dt-idx="3" tabindex="0" id="Item_click_Next" style="display:none;">→</a>
                </div>
            </div>
            {{--====================== End footer of pagination ====================--}}
        </div>
    </div>

    {{-----   Create New User   -----}}
    <form role="form" action="" method="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="createNewTomNanh" class="modal fade">
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
                                                <input type="text" placeholder="@lang('string.must_to_write')" id="name" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                        {{--phone number--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.phoneNumber') ៖</label>
                                            <div class="col-lg-9">
                                                <input type="text" placeholder="@lang('string.writeHere...')" id="phoneNumber" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--Account--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.accounting')</label>
                                            <div class="col-lg-9">
                                                <input type="email" placeholder="@lang('string.must_to_write')" id="email" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--password 1--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.password') ៖</label>
                                            <div class="col-lg-9">
                                                <input type="password" placeholder="@lang('string.must_to_write')" id="password_User" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--password 2--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px;margin-top: 6px;">@lang('string.confirm_pass')</label>
                                            <div class="col-lg-9">
                                                <input type="password" placeholder="@lang('string.must_to_write')" id="confirm_pass_user" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.note') ៖</label>
                                            <div class="col-lg-9">
                                                <textarea rows="3" cols="3" class="form-control" placeholder="@lang('string.writeHere...')" style="border: 1px solid grey;" id="note"></textarea>
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
    {{-----   Update User   -----}}
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
                                                <input type="text" placeholder="@lang('string.writeHere...')" id="phoneNumber_update" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            {{--Account--}}
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.accounting')</label>
                                            <div class="col-lg-9">
                                                <input type="email" placeholder="@lang('string.must_to_write')" id="email_update" class="form-control" style="border: 1px solid grey;">
                                                <br>
                                            </div>
                                            <label class="control-label col-lg-3" style="font-size: 15px">@lang('string.note') ៖</label>
                                            <div class="col-lg-9">
                                                <textarea rows="3" cols="3" class="form-control" placeholder="@lang('string.writeHere...')" style="border: 1px solid grey;" id="note_update"></textarea>
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
    {{-----   Dialog delete user   -----}}
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
    {{-----   Activate User   -----}}
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
    {{-----   Dialog deActive user   -----}}
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
    {{-----   Dialog Reset user   -----}}
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
        // ------------ define class constructor ------------------
        function ShowUserInTable(methods, linkUrl) {
            this.method = methods;
            this.urls = linkUrl;
        }
        // ------------ ajax request to server --------------------
        ShowUserInTable.prototype.reads =  function() {
            $.ajax({
                type: this.method,
                url: this.urls,
                success: function (ResponseJson) {
                    //console.log(ResponseJson);
                    ModelShowInTable(ResponseJson);
                }
            });
        };
        var ConvertJson, stringStatus, stringShowDeActiveOrActive, deleteUser;
        function ModelShowInTable(getJsonValue) {
            ConvertJson = JSON.parse(getJsonValue);
            document.getElementById("page1").innerHTML = ConvertJson.data.current_page;
            document.getElementById("first1").innerHTML = ConvertJson.data.from;
            document.getElementById("last1").innerHTML = ConvertJson.data.to;
            document.getElementById("all1").innerHTML = ConvertJson.data.total;
            document.getElementById("Num_Page1").innerHTML = ConvertJson.data.current_page;

            if (ConvertJson.data.last_page === 1){ $('.previous_show_user').hide(); $('.next_show_user').hide();
            } else { $('.previous_show_user').show(); $('.next_show_user').show(); }

            for (var i = 0; i < ConvertJson.data.data.length; i++){
                var short = ConvertJson.data.data[i];
                if (short.status === 1){
                    //Active
                    stringStatus = '<span class="label label-success" style="font-size: 12px;">@lang('string.active')</span>';
                    stringShowDeActiveOrActive = '<li id="deActive"><a><i class="icon-blocked"></i>@lang('string.deActive')</a></li>';
                }else if (short.status === 0){
                    //Deactive
                    stringStatus = '<span class="label label-default" style="font-size: 12px;">@lang('string.deActive')</span>';
                    stringShowDeActiveOrActive = '<li id="active"><a><i class="icon-checkmark4"></i>@lang('string.active')</a></li>';
                }
                // --- if delete true can delete ---
                if(short.delete_able === true){
                    deleteUser = '<li id="delete_User"><a><i class="icon-trash"></i>@lang('string.delete')</a></li>';
                } else {deleteUser ="";}

                var _tr = '<tr>' +
                    '<td style="display:none;">' + short.id + '</td>' +
                    '<td>' + short.user_no + '</td>' +
                    '<td>' + short.name + '</td>' +
                    '<td>' + short.phone_number + '</td>' +
                    '<td>' + short.display_role + '</td>' +
                    '<td>' + stringStatus + '</td>' +
                    '<td style="display:none;">' + short.note + '</td>' +
                    '<td style="display:none;">' + short.email + '</td>' +
                    '<td style="display:none;">' + short.delete_able + '</td>' +
                    '<td class="text-center"> ' +
                    '<ul class="icons-list">'+
                    '<li class="dropdown">'+
                    '<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">'+
                    '<i class="icon-menu9"></i>'+
                    '</a>'+
                    '<ul class="dropdown-menu dropdown-menu-right">'+
                    '<li id="update"><a><i class="icon-pencil7"></i>@lang('string.update')</a></li>'+
                    stringShowDeActiveOrActive +
                    deleteUser +
                    '<li id="detail_one_user"><a><i class="icon-certificate"></i>@lang('string.details')</a></li>' +
                    '<li id="reset_pass_user"><a><i class="icon-user-lock"></i>@lang('string.reset_password_user')</a></li>' +
                    '</ul>'+
                    '</li>'+
                    '</ul>'+
                    '</td>'+
                    '</tr>';
                $('#Show_User_In_Table tbody').append(_tr);
            }
        }
        // ------------------- show user in table -----------------
        (function () {
            var ShowAuto = new ShowUserInTable("GET",'api/user/search?search_option=&search=&status=&page_size=15');
            ShowAuto.reads();
        })();
        // ------------------- btn search user --------------------
        var timeout1 = null;
        $('.btn_search_user').on("click",function () {
           var searchUserWay = $('#find_user_way').val();
           var searchStatusUser = $('#find_status_user').val();
           var search = $('#search_input').val();
            clearTimeout(timeout1);
            timeout1 = setTimeout(function () {
                $('#Show_User_In_Table td').remove();
                var ShowAuto = new ShowUserInTable("GET",'api/user/search?search_option='+searchUserWay+'&search='+search+'&status='+searchStatusUser+'&page_size=15');
                ShowAuto.reads();
            }, 1000);
        });
        // ------------------- create new User --------------------
        $('.btn_create_new_user').on("click",function () {
            var user_no = $('#user_no').val();
            var name = $('#name').val();
            var phone_number = $('#phoneNumber').val();
            var email_user = $('#email').val();
            var password_User = $('#password_User').val();
            var confirm_password_user = $('#confirm_pass_user').val();
            var note = $('#note').val();
            var password_admin = $('#pass_admin').val();
            if (!user_no){
                alert('បំពេញលេខសំគាល់អ្នកប្រើប្រាស់សិន');
            } else {
                if (!name){
                    alert('បំពេញឈ្មោះអ្នកប្រើប្រាស់សិន');
                } else {
                    if (!email_user){
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
                                            "password": password_User
                                        }
                                    };
                                    // ------------- request -------------
                                    $.ajax({
                                        type:"POST",
                                        url: 'api/user/create',
                                        data: storeModel,
                                        success: function (Response) {
                                            var ConvertResponse = JSON.parse(Response);
                                            if (ConvertResponse.status === "200"){
                                                alert('បង្កើតអ្នកប្រើប្រាស់ជោគជ័យ');
                                                window.location.href = '{{('/admin/user')}}';
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
        // ------------------- update User ------------------------
        var _selectRow;
        $(document).on("click","#update",function(){
            $('#update_user').modal({ backdrop: 'static' });
            _selectRow = $(this).closest('tr');
            (function(){
                $(_selectRow).find('td:eq(8)').text() === "true" ? $( "#user_no_update" ).prop( "disabled", false ) : $( "#user_no_update" ).prop( "disabled", true );
                $('#user_no_update').val($(_selectRow).find('td:eq(1)').text());
                $('#name_update').val($(_selectRow).find('td:eq(2)').text());
                $('#phoneNumber_update').val($(_selectRow).find('td:eq(3)').text());
                $('#email_update').val($(_selectRow).find('td:eq(7)').text());
                $('#note_update').val($(_selectRow).find('td:eq(6)').text());
            })();
        });
        $('.btn_update_to_server').on("click",function () {
            var user_no_update = $('#user_no_update').val();
            var name_update = $('#name_update').val();
            var phone_number_update = $('#phoneNumber_update').val();
            var email_user_update = $('#email_update').val();
            var note_update = $('#note_update').val();
            var password_admin_update = $('#pass_admin_update').val();
            // condition
            if(user_no_update) {
                if(name_update){
                    if(email_user_update){
                        if(password_admin_update){
                            var updateModel = {
                                "admin_password": password_admin_update,
                                "user_info": {
                                    "user_no": user_no_update,
                                    "name": name_update,
                                    "phone_number": phone_number_update,
                                    "note": note_update,
                                    "email": email_user_update
                                }
                            };
                            // request
                            $.ajax({
                               type:"PUT",
                                url: 'api/user/edit/'+$(_selectRow).find('td:eq(0)').text()+'',
                                data: updateModel,
                                success:function (ResponseJson) {
                                    var ConvertResponse = JSON.parse(ResponseJson);
                                    if (ConvertResponse.status === "200"){
                                        alert('កែប្រែអ្នកប្រើប្រាស់ជោគជ័យ');
                                        window.location.href = '{{('/admin/user')}}';
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
        // ------------------- delete user ------------------------
        $(document).on("click","#delete_User",function(){
            $('#show_dialog_delete').modal({ backdrop: 'static' });
            _selectRow = $(this).closest('tr'); // make closet with table row for delete
        });
        $('.btn_delete_User').on("click",function(){
            var storePasswordAdminToDeleteUser = $('#password_admin_delete').val();
            if(storePasswordAdminToDeleteUser){
                var modelDelete = { "admin_password":storePasswordAdminToDeleteUser };
                $.ajax({
                    type:"DELETE",
                    url: 'api/user/delete/'+$(_selectRow).find('td:eq(0)').text()+'',
                    data: modelDelete,
                    success:function (ResponseDelete) {
                        var ConvertResponse = JSON.parse(ResponseDelete);
                        if (ConvertResponse.status === "200"){
                            alert('ធ្វើការលុបអ្នកប្រើប្រាស់ជោគជ័យ');
                            $(_selectRow).closest('tr').remove();
                            $('#close_dialog_delete').click();
                        } else if (ConvertResponse.status === "400"){
                            alert('មិនអាចលុបអ្នកប្រើប្រាស់បានទេ');
                        } else if (ConvertResponse.status === "401"){
                            alert('មិនមែនជាអេតមីុន ឬក៌ លេខសំងាត់អេតមីុនមិនត្រឹមត្រូវ');
                        }
                    }
                })
            } else {alert('បំពេញលេខសំងាត់អេតមីុនជាមុនសិន ទើបធ្វើការលុបអ្នកប្រើប្រាស់បាន');}
        });
        $(document).on("click","#close_dialog_delete",function () {
            $('#password_admin_delete').val('');
        });
        // ------------------- activate user ----------------------
        $(document).on("click","#active",function(){
            $('#show_activate_user').modal({ backdrop: 'static' });
            _selectRow = $(this).closest('tr');
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
                            url: 'api/user/activate/'+$(_selectRow).find('td:eq(0)').text()+'',
                            data: storeModelActivate,
                            success:function (ResponseDeActivate) {
                                var ConvertResponse = JSON.parse(ResponseDeActivate);
                                if (ConvertResponse.status === "200"){
                                    alert('ដំណើរការអ្នកប្រើប្រាស់វិញបានជោគជ័យ');
                                    window.location.href = '{{('/admin/user')}}';
                                } else if (ConvertResponse.status === "401"){
                                    alert('មិនមែនជាអេតមីុន ឬក៌ លេខសំងាត់អេតមីុនមិនត្រឹមត្រូវ');
                                }
                            }
                        })
                    } else {alert('បំពេញលេខសំងាត់អេតមីុនជាមុនសិន ទើបដំណើរការអ្នកប្រើប្រាស់វិញបាន');}
                } else {alert('លេខសំងាត់ និង លេខសំងាត់ម្តងទៀត ត្រូវតែដូចគ្នា');}
            } else {alert('បំពេញ លេខសំងាត់ និង លេខសំងាត់ម្តងទៀត ជាមុនសិន');}
        });
        // ------------------- DeActivate user --------------------
        $(document).on("click","#deActive",function(){
            $('#show_dialog_deActive_user').modal({ backdrop: 'static' });
            _selectRow = $(this).closest('tr');
        });
        $(document).on("click","#close_dialog_deActive",function () {
            $('#password_admin_deActive').val('');
        });
        $('.btn_deActive_user').on("click",function(){
            var storePasswordAdminToDeActiveUser = $('#password_admin_deActive').val();
            if(storePasswordAdminToDeActiveUser){
                var modelDeAtiveUser = { "admin_password":storePasswordAdminToDeActiveUser };
                $.ajax({
                    type:"PUT",
                    url: 'api/user/deactivate/'+$(_selectRow).find('td:eq(0)').text()+'',
                    data: modelDeAtiveUser,
                    success:function (ResponseDeActivate) {
                        var ConvertResponse = JSON.parse(ResponseDeActivate);
                        if (ConvertResponse.status === "200"){
                            alert('ធ្វើការផ្អាកដំណើរការអ្នកប្រើប្រាស់ជោគជ័យ');
                            window.location.href = '{{('/admin/user')}}';
                        } else if (ConvertResponse.status === "401"){
                            alert('មិនមែនជាអេតមីុន ឬក៌ លេខសំងាត់អេតមីុនមិនត្រឹមត្រូវ');
                        }
                    }
                })
            } else {alert('បំពេញលេខសំងាត់អេតមីុនជាមុនសិន ទើបផ្មាកដំណើរការអ្នកប្រើប្រាស់បាន');}
        });
        // -------------- clear dialog create new user ------------
        $(document).on("click","#close_create_new_user",function () {
            $('#user_no').val('');
            $('#name').val('');
            $('#phoneNumber').val('');
            $('#email').val('');
            $('#password_User').val('');
            $('#confirm_pass_user').val('');
            $('#note').val('');
            $('#pass_admin').val('');
        });
        // ------------------- Click back  ------------------------
        $(".previous_show_user").click(function () {
            var url = ConvertJson.data.prev_page_url;
            if (ConvertJson.data.prev_page_url === null){
                alert('មិនអាចខ្លីកត្រលប់បានទេ ពីព្រោះគឺជាទំព័រដំបូង');
            }else {
                $('#Show_User_In_Table td').remove();
                var clickBack = new ShowUserInTable("GET" , url);
                clickBack.reads();
            }
        });
        // ------------------- Click next  ------------------------
        $(".next_show_user").click(function () {
            var url = ConvertJson.data.next_page_url;
            if (ConvertJson.data.next_page_url === null){
                alert('មិនអាចខ្លីកទៅទៀតបានទេ ពីព្រោះគឺជាទំព័រចុងក្រោយ');
            }else {
                $('#Show_User_In_Table td').remove();
                var clickNext = new ShowUserInTable("GET" , url);
                clickNext.reads();
            }
        });


        // dialog show create new user
        $(document).on("click","#createTomNagn",function(){
            $('#createNewTomNanh').modal({
                backdrop: 'static'
            });
        });


        // ------------------- reset password dialog --------------
        $(document).on("click","#reset_pass_user",function(){
            $('#show_dialog_reset_password_user').modal({backdrop: 'static'});
            _selectRow = $(this).closest('tr');
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
                            url: 'api/user/admin_reset_user_password/'+$(_selectRow).find('td:eq(0)').text()+'',
                            data: storeModelResetPassUser,
                            success:function (ResponseDeActivate) {
                                var ConvertResponse = JSON.parse(ResponseDeActivate);
                                if (ConvertResponse.status === "200"){
                                    alert('ផ្លាស់ប្តូរលេខសំងាត់របស់អ្នកប្រើប្រាស់បានជោគជ័យ');
                                    window.location.href = '{{('/admin/user')}}';
                                } else if (ConvertResponse.status === "401"){
                                    alert('មិនមែនជាអេតមីុន ឬក៌ លេខសំងាត់អេតមីុនមិនត្រឹមត្រូវ');
                                }
                            }
                        })
                    } else {alert('បំពេញលេខសំងាត់អេតមីុនជាមុនសិន ទើបផ្លាស់ប្តូរលេខសំងាត់អ្នកប្រើប្រាស់បាន');}
                } else {alert('លេខសំងាត់ និង លេខសំងាត់ម្តងទៀត ត្រូវតែដូចគ្នា');}
            } else {alert('បំពេញ លេខសំងាត់ និង លេខសំងាត់ម្តងទៀត ជាមុនសិន');}
        });
        // ---------------- go to detail user blade -----------------
        $(document).on("click","#detail_one_user",function () {
            _selectRow = $(this).closest('tr');
            var _idUnique_user = $(_selectRow).find('td:eq(0)').text();
            $.cookie("KeyUser", btoa(_idUnique_user));// atob = decode from base64,  btoa = encode to base 64
            window.location.href = '{{('/admin/user/detail_user')}}';
        });
    </script>
@endsection
