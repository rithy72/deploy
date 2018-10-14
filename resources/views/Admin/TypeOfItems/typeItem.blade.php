@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <!--<h6 class="panel-title">Default panel</h6>-->
            <ul class="breadcrumb breadcrumb-caret position-right">
                <li><a href="{{('/admin/mainform')}}" style="color: #2577e1;"><span>@lang('string.mainForm')</span></a></li>
                <li class="active"><span>@lang('string.inventory')</span></li>
                <li class="active"><span>@lang('string.type')</span></li>
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
                <a class="btn btn-success" id="createTomNagn"><i class="icon-add position-left"></i>@lang('string.createNewItems')</a>
            </div>

            <div class="col-md-3">
                <span>.</span><input type="text" class="form-control" id="search" placeholder="@lang('string.searchTypeItems')">
            </div>
            <div class="col-md-3">
                <span>@lang('string.chooseSituation')</span>
                <select class="form-control" id="statusSelect" name="">
                    <option value="">@lang('string.all')</option>
                    <option value="1">@lang('string.active')</option>
                    <option value="0">@lang('string.deActive')</option>
                </select>
            </div>
            <a class="btn btn-primary btn-Search" style="margin-top: 19px;"><i class="icon-search4 position-left"></i>@lang('string.search')</a>
            <br/><br/>
            <div class="datatable-header" style="margin-top: -19px;"></div>
            <div class="datatable-scroll" style="overflow-x: hidden;">
                <div class="dataTables_scroll">
                    <!--============ scroll body oy trov 1 header table ===============-->
                    <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">
                        <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_Items" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                            <thead style="background: #e3e3ea99;">
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.nameItem')</th>
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
                <div class="dataTables_info" id="DataTables_Table_3_info" role="status" aria-live="polite">ទំព័រ <b id="page1"></b> មាន <b id="first1"></b> វត្ថុដល់ <b id="last1"></b> នៃចំនួនវត្ថុទាំងអស់ <b id="all1"></b> </div>
                <div class="dataTables_paginate paging_simple_numbers" id="">
                    <a class="paginate_button previous_currency" aria-controls="DataTables_Table_3" data-dt-idx="0" tabindex="0" id="Item_click_Back" style="display:none;">←</a>
                    <span><a class="paginate_button current" id="Num_Page1" aria-controls="DataTables_Table_3" data-dt-idx="1" tabindex="0"></a></span>
                    <a class="paginate_button next_currency" aria-controls="DataTables_Table_3" data-dt-idx="3" tabindex="0" id="Item_click_Next" style="display:none;">→</a>
                </div>
            </div>
            {{--====================== End footer of pagination ====================--}}
            {{--==========================================================================================================--}}
        </div>
    </div>

    {{-----   Create New Type Of Item   -----}}
    <form role="form" action="" method="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="createNewTomNanh" class="modal fade">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" id="close_create_new">&times;</button>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" id="close_create_new" style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i class="icon-arrow-left12 position-left"></i>@lang('string.cancel')</button>
                        <button type="button" class="close_dialog_createNew" id="close_dialog_createNew" data-dismiss="modal" style="display: none">close dialog</button>
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-primary btn_create_new_item_type" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;"><b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-----   Update Type Of Item   -----}}
    <form role="form" action="" method="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="update_user" class="modal fade">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" id="close_update_rate" data-dismiss="modal" style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i class="icon-arrow-left12 position-left"></i>@lang('string.cancel')</button>
                        {{ csrf_field() }}
                        {{--<button type="submit" class="btn btn-primary" id="create_update_rate_dialog" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px; display: none"><b>បោះបង់</b></button>--}}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="button" class="btn btn-primary btn_update_item_type" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;"><b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>
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
        // dialog show create new user
        $(document).on("click","#createTomNagn",function(){
            $('#createNewTomNanh').modal({
                backdrop: 'static'
            });
        });
        // dialog show update user
        $(document).on("click","#update",function(){
            $('#update_user').modal({
                backdrop: 'static'
            });
        });


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
        //create new item type, and ,close dialog clear input
        var storeArrayItemType = [];
        $(document).on("click","#close_create_new",function () {
            if (storeArrayItemType.length > 0){
                $('#new_item_type').val('');
                $('.close_dialog_createNew').click();
                window.location.href = '{{('/admin/item_type')}}';
            } else {
                $('#new_item_type').val('');
                $('.close_dialog_createNew').click();
            }
        });
        $(document).on("click",".btn_create_new_item_type",function () {
            var storeInput = $('#new_item_type').val();
            if (storeInput === ""){
                alert('បំពេញសិន មុនពេលធ្វើការបង្កើត');
            } else {
                $('#new_item_type').val('');
                $.ajax({
                    type: "POST",
                    url: 'api/item_group',
                    data: {"item_type_name": storeInput},
                    success: function (response) {
                        //TODO: Alert Success Insert, or Duplicate Type Name
                        jsonObj = JSON.parse(response);
                        if (jsonObj.status === '200') storeArrayItemType.push(storeInput);
                        if (jsonObj.status === '301') alert('ឈ្មោះមានរួចហើយ សូមធ្វើការកែប្រែម្តងទៀត');
                    }
                });
            }
        });
        // ========== show item type ============
        // ------------ store model of table -------------------
        var stringStatus , stringDeletable , storeValue , stringShowDeActiveOrActive;
        function ModelShowInTable(getJsonValue) {
            storeValue = JSON.parse(getJsonValue);
            document.getElementById("page1").innerHTML = storeValue.data.current_page;
            document.getElementById("first1").innerHTML = storeValue.data.from;
            document.getElementById("last1").innerHTML = storeValue.data.to;
            document.getElementById("all1").innerHTML = storeValue.data.total;
            document.getElementById("Num_Page1").innerHTML = storeValue.data.current_page;

            if (storeValue.data.last_page === 1){ $('.previous_currency').hide(); $('.next_currency').hide();
            }else { $('.previous_currency').show(); $('.next_currency').show(); }

            for (var i = 0; i < storeValue.data.data.length; i++){
                if (storeValue.data.data[i].status === 1){
                    //Active
                    stringStatus = '<span class="label label-success A" style="font-size: 12px;">@lang('string.active')</span>';
                    stringShowDeActiveOrActive = '<li id="deActive"><a><i class="icon-blocked"></i>@lang('string.deActive')</a></li>';
                }else if (storeValue.data.data[i].status === 0){
                    //Deactive
                    stringStatus = '<span class="label label-default I" style="font-size: 12px;">@lang('string.deActive')</span>';
                    stringShowDeActiveOrActive = '<li id="active"><a><i class="icon-checkmark4"></i>@lang('string.active')</a></li>';
                }

                // ============ if deltetable == 1 show btn delete in table Actions ================
                if (storeValue.data.data[i].delete_able === 1){
                    stringDeletable = '<li id="deleteItem"><a><i class="icon-trash"></i>@lang('string.delete')</a></li>';
                }else if (storeValue.data.data[i].delete_able === 0){
                    stringDeletable = '';
                }

                // ============= End Parse Json ===========================
                var _tr = '<tr role="row" class="odd">' +
                    '<td style="display:none;">' + storeValue.data.data[i].id + '</td>' +
                    '<td>' + storeValue.data.data[i].item_type_name + '</td>' +
                    '<td>' + stringStatus + '</td>' +
                    '<td class="text-center"> ' +
                    '<ul class="icons-list">'+
                    '<li class="dropdown">'+
                    '<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">'+
                    '<i class="icon-menu9"></i>'+
                    '</a>'+
                    '<ul class="dropdown-menu dropdown-menu-right">'+
                    '<li id="update"><a><i class="icon-pencil7"></i>@lang('string.update')</a></li>'+
                    stringShowDeActiveOrActive +
                    stringDeletable +
                    '</ul>'+
                    '</li>'+
                    '</ul>'+
                    '</td>' +
                    '</tr>';
                $('#Show_All_Items tbody').append(_tr);
            }
        }
        // ------------ define class constructor ---------------
        function Constructor(methods, linkUrl) {
            this.method = methods;
            this.urls = linkUrl;
        }
        // ------------ ajax request to server -----------------
        Constructor.prototype.reads =  function() {
            $.ajax({
                type: this.method, // "GET"
                url: this.urls, // 'GetAllListCurrency'
                success: function (ResponseJson) {
                    //console.log(ResponseJson);
                    ModelShowInTable(ResponseJson); // response to another fucntion
                }
            });
        };
        // -------------- function main ------------------------
        (function () {
            var showDataInTable = new Constructor("GET" , 'api/item_group?search=&status=&page_size=15');
            showDataInTable.reads(); // invoke method show data in table
        })();
        // =============================== update item type ===================================
        $(document).on("click","#update",function () {
            var _selectRow = $(this).closest('tr');
            _storeID = $(_selectRow).find('td:eq(0)').text();
            var _storeNameItemType = $(_selectRow).find('td:eq(1)').text();
            (function(){
                $('#updateItem').val(_storeNameItemType);
            })();
        });
        var _storeID;
        $(".btn_update_item_type").click(function () {
            var storeInput = $('#updateItem').val();
            if (storeInput === ""){
                alert('បំពេញសិន មុនពេលធ្វើការកែប្រែ');
            } else {
                $.ajax({
                    type: "PUT",
                    url: 'api/item_group/' + _storeID + '',
                    data: {"item_type_name": storeInput},
                    success: function (response) {
                        var convert = JSON.parse(response);
                        if (convert.status === "200") {
                            alert('ធ្វើការកែប្រែរួចរាល់');
                            $('#updateItem').val('');
                            window.location.href = '{{('/admin/item_type')}}';
                        } else if (convert.status === "301") {
                            alert('ឈ្មោះមានរួចហើយ សូមធ្វើការកែប្រែម្តងទៀត');
                        }
                    }
                });
            }
        });
        //================================= make Active  =======================================
        $(document).on("click","#active",function () {
            var _selectRow = $(this).closest('tr');
            _storeID = $(_selectRow).find('td:eq(0)').text();
            $.ajax({
                type: "PUT",
                url: 'api/item_group/activate/' + _storeID + '',
                success: function (response) {
                    var convert = JSON.parse(response);
                    if (convert.status === "200") {
                        alert('ធ្វើអោយដំណើរការ');
                        window.location.href = '{{('/admin/item_type')}}';
                    }
                }
            });
        });
        //================================= make deActive  ======================================
        $(document).on("click","#deActive",function () {
            var _selectRow = $(this).closest('tr');
            _storeID = $(_selectRow).find('td:eq(0)').text();
            $.ajax({
                type: "PUT",
                url: 'api/item_group/deactivate/' + _storeID + '',
                success: function (response) {
                    var convert = JSON.parse(response);
                    if (convert.status === "200") {
                        alert('ធ្វើការផ្អាកដំណើរការ');
                        window.location.href = '{{('/admin/item_type')}}';
                    }
                }
            });
        });
        //================================= Delete item  =======================================
        $(document).on("click","#deleteItem",function () {
            var _selectRow = $(this).closest('tr');
            _storeID = $(_selectRow).find('td:eq(0)').text();
            $.ajax({
                type: "DELETE",
                url: 'api/item_group/' + _storeID + '',
                success: function (response) {
                    var convert = JSON.parse(response);
                    if (convert.status === "200"){
                        alert('ធ្វើការលុបរួចរាល់');
                        window.location.href = '{{('/admin/item_type')}}';
                    } else if (convert.status === "210"){
                        alert('មិនអាចស្វែងរក ដើម្បីធ្វើការលុបបានឡើយ');
                    }
                }
            });
        });
        //================================= Click back  ========================================
        $(".previous_currency").click(function () {
            var url = storeValue.data.prev_page_url;
            if (storeValue.data.prev_page_url === null){
                alert('មិនអាចខ្លីកត្រលប់បានទេ ពីព្រោះគឺជាទំព័រដំបូង');
            }else {
                $('#Show_All_Items td').remove();
                var clickBack = new Constructor("GET" , url);
                clickBack.reads();
            }
        });
        //================================= Click next  ========================================
        $(".next_currency").click(function () {
            var url = storeValue.data.next_page_url;
            if (storeValue.data.next_page_url === null){
                alert('មិនអាចខ្លីកទៅទៀតបានទេ ពីព្រោះគឺជាទំព័រចុងក្រោយ');
            }else {
                $('#Show_All_Items td').remove();
                var clickNext = new Constructor("GET" , url);
                clickNext.reads();
            }
        });
        //======================= Click button Search Item ========================================
        var timeout1 = null;
        $('.btn-Search').click(function () {
            var _getSearch = $('#search').val();
            var _getStatus = $('#statusSelect').val();
            var url = 'api/item_group?search='+_getSearch+'&status='+_getStatus+'&page_size=15';
            clearTimeout(timeout1);
            timeout1 = setTimeout(function () {
                $('#Show_All_Items td').remove();
                var searchItemType = new Constructor("GET" , url);
                searchItemType.reads();
            }, 1000);
        });
    </script>
@endsection
