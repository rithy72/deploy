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
                    {{--<li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>--}}
                </ul>
            </div>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
        </div>
        {{--============================   Tab History ================================--}}
            {{--<div class="panel panel-flat">--}}
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
                            <div class="tab-pane active" id="highlighted_tab1">
                                <div class="panel-body">
                                    <div class="dataTables_length" id="DataTables_Table_3_length" style="margin-top: 19px;">
                                        {{--<a class="btn btn-success" id="createTomNagn"><i class="icon-add position-left"></i>បង្កើតអ្នកប្រើប្រាស់ថ្មី</a>--}}
                                    </div>

                                    <div class="col-md-3">
                                        <span>@lang('string.fine')</span>
                                        <div class="form-group">
                                            <select class="form-control" id="" name="">
                                                <option selected="selected"></option>
                                                <option selected="">@lang('string.IdOfUser')</option>
                                                <option selected="">@lang('string.nameUser')</option>
                                                <option selected="">@lang('string.phoneNumberUser')</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <span>@lang('string.situation')</span>
                                        <div class="form-group">
                                            <select class="form-control" id="" name="">
                                                <option selected="selected"></option>
                                                <option selected="">@lang('string.all')</option>
                                                <option selected="">@lang('string.createNewInvoice')</option>
                                                <option selected="">@lang('string.payment')</option>
                                                <option selected="">លួសទំនិញ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <span>.</span><input type="text" class="form-control" placeholder="@lang('string.fine')">
                                    </div>
                                    <a class="btn btn-primary btn-Search" style="margin-top: 19px;"><i class="icon-search4 position-left"></i>@lang('string.search')</a>
                                    <br/><br/>
                                    <div class="datatable-header" style="margin-top: -19px;"></div>
                                    <div class="datatable-scroll" style="overflow-x: hidden;">
                                        <div class="dataTables_scroll">
                                            <!--============ scroll body oy trov 1 header table ===============-->
                                            <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">
                                                <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_Country" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                                                    <thead style="background: #e3e3ea99;">
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.users')</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.actions')</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.detail')</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.invoiceID')</th>
                                                        <th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 100px;">@lang('string.date')</th>
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
                                    {{--==========================================================================================================--}}
                                </div>
                            </div>

                            <div class="tab-pane" id="highlighted-tab2">
                                <div class="panel-body">
                                    <div class="dataTables_length" id="DataTables_Table_3_length" style="margin-top: 19px;">
                                        {{--<a class="btn btn-success" id="createTomNagn"><i class="icon-add position-left"></i>បង្កើតអ្នកប្រើប្រាស់ថ្មី</a>--}}
                                    </div>

                                    <div class="col-md-3">
                                        <span>@lang('string.fine')</span>
                                        <div class="form-group">
                                            <select class="form-control" id="" name="">
                                                <option selected="selected"></option>
                                                <option selected="">@lang('string.IdOfUser')</option>
                                                <option selected="">@lang('string.nameUser')</option>
                                                <option selected="">@lang('string.phoneNumberUser')</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <span>@lang('string.startDate')</span><input type="date" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <span>@lang('string.startDateTo')</span><input type="date" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <span>.</span><input type="text" class="form-control" placeholder="@lang('string.fine')">
                                    </div>
                                    <a class="btn btn-primary btn-Search" style="margin-top: 19px;"><i class="icon-search4 position-left"></i>@lang('string.search')</a>
                                    <br/><br/>
                                    <div class="datatable-header" style="margin-top: -19px;"></div>
                                    <div class="datatable-scroll" style="overflow-x: hidden;">
                                        <div class="dataTables_scroll">
                                            <!--============ scroll body oy trov 1 header table ===============-->
                                            <div class="dataTables_scrollBody" style="position: relative; overflow: auto; height: 400px; width: 100%;">
                                                <table class="table datatable-scroll-y table-hover dataTable no-footer" width="100%" id="Show_All_Country" role="grid" aria-describedby="DataTables_Table_3_info" style="width: 100%;">
                                                    <thead style="background: #e3e3ea99;">
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('string.users')</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.situation')</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.detail')</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">@lang('string.invoiceID')</th>
                                                        <th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 100px;">@lang('string.date')</th>
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
                                    {{--==========================================================================================================--}}
                                </div>
                            </div>

                            {{--<div class="tab-pane" id="highlighted-tab3">
                                DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg whatever.
                            </div>

                            <div class="tab-pane" id="highlighted-tab4">
                                Aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthet.
                            </div>--}}
                        </div>
                    </div>
                </div>
            {{--</div>--}}
        {{--============================  End Tab History =============================--}}


    </div>

@endsection

@section('script')
    <script>

    </script>
@endsection
