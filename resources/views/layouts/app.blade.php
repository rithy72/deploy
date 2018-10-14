<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@lang('string.com_name')</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{asset('/assets/css/icons/icomoon/styles.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/core.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/components.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/colors.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/extras/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    @yield('style')
    <style>
        .box {
            height: 90vh;
            overflow-y: auto;
            /*background-color: #333;
            color: #fff;*/
        }
    </style>
</head>

<body style="overflow: hidden;" class="sidebar-xs">
<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand"><p><b style="font-size: 26px;margin-left: -11px;">@lang('string.com_name')</b></p></a>

        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li>
                <a class="sidebar-control sidebar-main-toggle hidden-xs" data-popup="tooltip" title="Collapse main" data-placement="bottom" data-container="body">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
            <li><p style="margin-top: 9px;"><b style="font-size: 16px;margin-left: 42px;" id="showTime">  </b></p></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">

            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    {{--<img src="assets/images/placeholder.jpg" alt="">--}}
                    <span>{{ Auth::user()->name }}</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    {{--<li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>--}}
                    {{--<li><a href="#"><i class="icon-coins"></i> My balance</a></li>--}}
                    {{--<li><a href="#"><span class="badge bg-blue pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>--}}
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon-switch2"> @lang('string.logout') </i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    <li>
                        <a id="ChangePassword"><i class=" icon-user-check"> @lang('string.changePass') </i></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-main"><!--sidebar-default  =  change collor navbar-->
            <!--<div class="sidebar-fixed">-->
            <div class="sidebar-content" style="background: #37474F; height: 90vh;">
                <!-- Main navigation -->
                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-title h6">
                        <span>{{__('auth.chooseOption')}}</span>
                        <ul class="icons-list">
                            <li><a href="#" data-action="collapse"></a></li>
                        </ul>
                    </div>

                    <div class="category-content no-padding">
                        <ul class="navigation navigation-main navigation-accordion">

                            <!-- Main -->
                            @if(\Illuminate\Support\Facades\Auth::user()->role == \App\Http\Controllers\Base\Model\Enum\UserRoleEnum::ADMIN)
                            <li style="border: 0.1px solid grey;border-left: 0px;border-right: 0px;"><a href="{{('/admin/mainform')}}"><i class="icon-home4"></i> <span> @lang('string.desboard') </span></a></li>
                            @endif
                            <li style="border: 0.1px solid grey;border-left: 0px;border-right: 0px;border-top: 0px;">
                                <a href="{{('/admin/invoice')}}"><i class="icon-copy"></i> <span>@lang('string.invoice')</span></a>
                                {{--<ul>--}}
                                    {{--<li><a href="#">Boxed full width</a></li>--}}
                                {{--</ul>--}}
                            </li>
                            <li style="border: 0.1px solid grey;border-left: 0px;border-right: 0px;border-top: 0px;">
                                <a><i class="icon-store"></i> <span>{{__('auth.inventory')}}</span></a>
                                <ul>
                                    <li><a href="{{('/admin/inventory')}}" id="layout3">@lang('string.inventoryItems')</a></li>
                                    <li><a href="{{('/admin/item_type')}}" id="layout3">@lang('string.typeItems')</a></li>
                                </ul>
                            </li>
                            @if(\Illuminate\Support\Facades\Auth::user()->role == \App\Http\Controllers\Base\Model\Enum\UserRoleEnum::ADMIN)
                            <li style="border: 0.1px solid grey;border-left: 0px;border-right: 0px;border-top: 0px;">
                                <a href="{{('/admin/user')}}"><i class="icon-user"></i> <span>@lang('string.users')</span></a>
                                {{--<ul>
                                    <li><a href="#">Horizontal navigation</a></li>
                                    <li>
                                        <a href="#">1 columns</a>
                                        <ul>
                                            <li><a href="#">Dual sidebars</a></li>
                                            <li><a href="#">Double sidebars</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Ding dak ey te!!!</a></li>
                                </ul>--}}
                            </li>

                            <li style="border: 0.1px solid grey;border-left: 0px;border-right: 0px;border-top: 0px;">
                                <a href="{{('/admin/history_user')}}"><i class="icon-clipboard3"></i> <span>@lang('string.actionUsers')</span></a>
                                {{--<ul>
                                    <li><a href="#" id="layout3">Layout 1</a></li>
                                    <li><a href="#" id="layout4">Layout 2 <span class="label bg-warning-400">Current</span></a></li>
                                    <li class="disabled"><a href="#" id="layout5">Layout 3 <span class="label bg-slate-800">Coming soon</span></a></li>
                                </ul>--}}
                            </li>
                            <li style="border: 0.1px solid grey;border-left: 0px;border-right: 0px;border-top: 0px;">
                                <a href="{{('/admin/report')}}"><i class="icon-stack-text"></i> <span>@lang('string.reportHistory')</span></a>
                            </li>
                            <!-- /main -->
                            @endif
                        </ul>
                    </div>
                </div>
                <!-- /main navigation -->
            </div>
            <!--</div>-->
        </div>
        <!-- /main sidebar -->

        <!-- Main content -->
        <div class="content-wrapper">
            <div class="box"> {{--make scroll in content it the most powerful--}}
            <!-- Sidebars overview -->
             @yield('content')
            <!-- /sidebars overview -->
            </div>
        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->
{{--------- dialog change password user and admin ---------}}
<form role="form" action="" method="">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div id="changePassword" class="modal fade">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" id="close_update_rate" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">@lang('string.changePassword')</h5>
                </div>

                {{--Change Password Modal--}}
                <div class="modal-body">
                    <div class="col-md-12">
                        <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper no-footer" style="margin-top: -14px;">
                            <div class="datatable-header">
                                <div class="form-group">
                                    <label class="control-label col-lg-5" style="font-size: 15px">@lang('string.username')</label>
                                    <div class="col-lg-7">
                                        <input type="text" placeholder="@lang('string.writeYourUserNameHere...')" name="" id="" class="form-control" style="border: 1px solid grey;">
                                        <br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-5" style="font-size: 15px">@lang('string.oldPassword')</label>
                                    <div class="col-lg-7">
                                        <input type="text" placeholder="@lang('string.writeOldPasswordHere...')" name="" id="" class="form-control" style="border: 1px solid grey;">
                                        <br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-5" style="font-size: 15px">@lang('string.newPassword')</label>
                                    <div class="col-lg-7">
                                        <input type="text" placeholder="@lang('string.writeNewPasswordHere...')" name="" id="" class="form-control" style="border: 1px solid grey;">
                                        <br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-5" style="font-size: 15px">@lang('string.confirmPassword')</label>
                                    <div class="col-lg-7">
                                        <input type="text" placeholder="@lang('string.writeNewPasswordHere...')" name="" id="" class="form-control" style="border: 1px solid grey;">
                                        <br>
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
                    <button type="button" class="btn btn-primary btn_validate_Rate" style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;"><b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
<!-- Core JS files -->
<script src="{{asset('/assets/js/plugins/loaders/pace.min.js')}}"></script>
<script src="{{asset('/assets/js/core/libraries/jquery.min.js')}}"></script>
<script src="{{asset('/assets/js/core/libraries/bootstrap.min.js')}}"></script>
<script src="{{asset('/assets/js/plugins/loaders/blockui.min.js')}}"></script>
<script src="{{asset('/assets/js/plugins/ui/nicescroll.min.js')}}"></script>
<script src="{{asset('/assets/js/plugins/ui/drilldown.js')}}"></script>
<!-- /core JS files -->

<!-- core JS Grape -->
<script src="{{'https://code.highcharts.com/highcharts.js'}}"></script>
<script src="{{'https://code.highcharts.com/modules/exporting.js'}}"></script>
<script src="{{'https://code.highcharts.com/modules/export-data.js'}}"></script>

<script src="{{asset('/assets/js/jquerysession.js')}}"></script>
<script src="{{asset('/assets/js/site.js')}}"></script>
<!-- /core JS Grape -->

<!-- Theme JS Validation -->
<script src="{{asset('/assets/js/plugins/forms/validation/validate.min.js')}}"></script>
<script src="{{asset('/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('/assets/js/pages/login_validation.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/js/core/app.js')}}"></script>
<!-- /theme JS Validation -->

<!-- Theme JS files Crate User -->
<script src="{{asset('/assets/js/plugins/forms/selects/select2.min.js')}}"></script>
<script src="{{asset('/assets/js/pages/form_layouts.js')}}"></script>
<script src="{{asset('/assets/js/pages/form_select2.js')}}"></script>
<!-- /theme JS files create user -->

<!-- Theme JS files Datashort table -->
<script src="{{asset('/assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('/assets/js/pages/datatables_basic.js')}}"></script>
{{-- <script src="{{asset('/user')}}"></script> --}}
<!-- /theme JS files Data table -->

<!-- Theme JS files checkbox, redoi, input...ect -->
<script src="{{asset('/assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
<script src="{{asset('/assets/js/plugins/forms/styling/switch.min.js')}}"></script>
<!-- /theme JS files checkbox, redoi, input...ect -->

<!-- Theme JS files notify -->
<script src="{{asset('/assets/js/plugins/notifications/pnotify.min.js')}}"></script>
<!-- /theme JS files notify -->

<!-- Theme JS files -->
<script src="{{asset('/assets/js/plugins/forms/selects/bootstrap_select.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/js/core/app.js')}}"></script>
<script src="{{asset('/assets/js/pages/form_bootstrap_select.js')}}"></script>

<!-- Theme JS files -->
<script src="{{asset('/assets/js/plugins/notifications/jgrowl.min.js')}}"></script>
<script src="{{asset('/assets/js/plugins/ui/moment/moment.min.js')}}"></script>
<script src="{{asset('/assets/js/plugins/pickers/daterangepicker.js')}}"></script>
<script src="{{asset('/assets/js/plugins/pickers/anytime.min.js')}}"></script>
<script src="{{asset('/assets/js/plugins/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('/assets/js/plugins/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{asset('/assets/js/plugins/pickers/pickadate/picker.time.js')}}"></script>
<script src="{{asset('/assets/js/plugins/pickers/pickadate/legacy.js')}}"></script>
<script src="{{asset('/assets/js/pages/picker_date.js')}}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/plugins/uploaders/fileinput.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/pages/uploader_bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/pages/uploader_bootstrap.js') }}"></script>
<!-- /theme JS files -->

<!-- Theme JS files -->
<script src="{{asset('assets/js/src/jquery.table2excel.js')}}"></script>
<script src="{{asset('assets/js/layout_sidebar_sticky.js')}}"></script>
<!-- /theme JS files -->

<!--Button Component-->
<script type="text/javascript" src="{{asset('/assets/js/plugins/velocity/velocity.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/js/plugins/velocity/velocity.ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/js/plugins/buttons/spin.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/js/plugins/buttons/ladda.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/js/pages/components_buttons.js')}}"></script>

<script type="text/javascript" src="{{asset('/assets/js/plugins/notifications/pnotify.min.js')}}"></script>

@yield("script")
<script>
    // ------------------- show time live -----------------
    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }

    function startTime() {
        var today = new Date();
        var date = today.getDate();
        var month = today.getMonth() + 1;
        var year = today.getFullYear();
        var h = today.getHours();
        var Am_or_Pm = h >= 12 ? 'pm' : 'am';
        h = h % 12;
        h = h ? h : 12; // the hour '0' should be '12'
        var m = today.getMinutes();
        var s = today.getSeconds();
        // add a zero in front of numbers<10
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('showTime').innerHTML = date + "/" + month + "/" + year + "  " + h + ":" + m + ":" + s + " " + Am_or_Pm;
        t = setTimeout(function() {
            startTime()
        }, 500);
    }
    startTime();
    // dialog chang password user and admin
    $(document).on("click","#ChangePassword",function(){
        $('#changePassword').modal({
            backdrop: 'static'
        });
    });
</script>
</html>
