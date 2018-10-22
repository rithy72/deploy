<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@lang('string.com_name')</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
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
        }
        body {
            font-family: 'Khmer OS Battambang', sans-serif; !important;
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
                <a class="sidebar-control sidebar-main-toggle hidden-xs" data-popup="tooltip" title="Collapse main"
                   data-placement="bottom" data-container="body">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
            <li><p style="margin-top: 9px;"><b style="font-size: 16px;margin-left: 42px;" id="showTime"> </b></p></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">

            <li class="dropdown dropdown-user">
                @if(\Illuminate\Support\Facades\Auth::user())
                <a class="dropdown-toggle" data-toggle="dropdown">
                    {{--<img src="assets/images/placeholder.jpg" alt="">--}}
                    <span>{{ Auth::user()->user_no.' - '.Auth::user()->name }}</span>
                    <i class="caret"></i>
                </a>
                @endif

                <ul class="dropdown-menu dropdown-menu-right">
                    <li>
                        <a id="ChangePassword">
                            <i class=" icon-user-check">
                                @lang('string.changePass')
                            </i>
                        </a>
                    </li>
                    <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i
                                    class="icon-switch2">
                                @lang('string.logout')
                            </i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
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
                                <li
                                        @if ($active_form == \App\Http\Controllers\Forms\Forms::DASHBOARD) class="active" @endif
                                        style="border: 0.1px solid grey;border-left: 0px;border-right: 0px;"
                                >
                                    <a
                                            href="{{('/admin/mainform')}}"><i class="icon-home4"></i>
                                        <span> @lang('string.desboard') </span>
                                    </a>
                                </li>
                            @endif
                            <li
                                    @if ($active_form == \App\Http\Controllers\Forms\Forms::INVOICE) class="active" @endif
                                    style="border: 0.1px solid grey;border-left: 0px;border-right: 0px;border-top: 0px;"
                            >
                                <a href="{{('/admin/invoice')}}"><i class="icon-copy"></i>
                                    <span>@lang('string.invoice')</span>
                                </a>
                            </li>
                            <li
                                    @if ($active_form == \App\Http\Controllers\Forms\Forms::INVENTORY_ITEM_TYPE
                                    || $active_form == \App\Http\Controllers\Forms\Forms::INVENTORY_ITEMS
                                    )
                                    class="active"
                                    @endif
                                    style="border: 0.1px solid grey;border-left: 0px;border-right: 0px;border-top: 0px;"
                            >
                                <a>
                                    <i class="icon-store"></i> <span>{{__('auth.inventory')}}</span>
                                </a>
                                <ul>
                                    <li
                                            @if ($active_form == \App\Http\Controllers\Forms\Forms::INVENTORY_ITEMS)
                                            class="active"
                                            @endif
                                    >
                                        <a href="{{('/admin/inventory')}}" id="layout3">
                                            @lang('string.inventoryItems')
                                        </a>
                                    </li>
                                    <li
                                            @if ($active_form == \App\Http\Controllers\Forms\Forms::INVENTORY_ITEM_TYPE)
                                            class="active"
                                            @endif
                                    >
                                        <a href="{{('/admin/item_type')}}" id="layout3">
                                            @lang('string.typeItems')
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @if(\Illuminate\Support\Facades\Auth::user()->role == \App\Http\Controllers\Base\Model\Enum\UserRoleEnum::ADMIN)
                                <li
                                        @if ($active_form == \App\Http\Controllers\Forms\Forms::USER)
                                        class="active"
                                        @endif
                                        style="border: 0.1px solid grey;border-left: 0px;border-right: 0px;border-top: 0px;"
                                >
                                    <a href="{{('/admin/user')}}">
                                        <i class="icon-user"></i>
                                        <span>@lang('string.users')</span>
                                    </a>
                                </li>

                                <li
                                        @if ($active_form == \App\Http\Controllers\Forms\Forms::AUDIT_TRAIL)
                                        class="active"
                                        @endif
                                        style="border: 0.1px solid grey;border-left: 0px;border-right: 0px;border-top: 0px;"
                                >
                                    <a href="{{('/admin/history_user')}}">
                                        <i class="icon-clipboard3"></i>
                                        <span>@lang('string.actionUsers')</span>
                                    </a>
                                </li>
                                <li
                                        @if ($active_form == \App\Http\Controllers\Forms\Forms::DAILY_REPORT)
                                        class="active"
                                        @endif
                                        style="border: 0.1px solid grey;border-left: 0px;border-right: 0px;border-top: 0px;"
                                >
                                    <a href="{{('/admin/report')}}">
                                        <i class="icon-stack-text"></i>
                                        <span>@lang('string.reportHistory')</span>
                                    </a>
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
                @if ($errors->has('email') || $errors->has('username'))
                    <div class="alert alert-danger alert-dismissible fade in">
                        <a class="close" data-dismiss="alert" aria-label="close" style="margin-right: 24px">x</a>
                        <p style="margin-top: 5px">{{ $errors->first('email') }}{{ $errors->first('username') }}</p>
                    </div>
                @endif
                @if ($errors->has('password'))
                    <div class="alert alert-danger alert-dismissible fade in">
                        <a class="close" data-dismiss="alert" aria-label="close" style="margin-right: 24px">x</a>
                        <p style="margin-top: 5px">{{ $errors->first('password') }}</p>
                    </div>
                @endif
                @if(session('status'))
                    <div class="alert alert-success alert-dismissible fade in">
                        <a class="close" data-dismiss="alert" aria-label="close" style="margin-right: 24px">x</a>
                        <p style="margin-top: 5px">{{session('status')}}</p>
                    </div>
            @endif
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
<form role="form" action="{{ route('password.request') }}" method="POST">
    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
    @csrf
    <div id="changePassword" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">@lang('string.changePassword')</h5>
                </div>
                <input type="hidden" name="token" value="{{\Illuminate\Support\Facades\Auth::user()->remember_token}}">
                {{--Change Password Modal--}}
                <div class="modal-body" style="padding: 5px;">

                        <div class="dataTables_wrapper no-footer">
                            <div class="datatable-header">
                                {{--Username--}}
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-sm-5 col-md-5"
                                               style="font-size: 15px">@lang('string.username')</label>
                                        <div class="col-sm-7 col-md-7">
                                            <input name="username" id="username" type="text"
                                                   placeholder=""
                                                   class="form-control" style="border: 1px solid grey;" required
                                                   autocomplete="">
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                {{--Current Password--}}
                                <div class="col-sm-12 col-md-12">
                                    <label class="control-label col-sm-5 col-md-5"
                                           style="font-size: 15px">@lang('string.oldPassword')</label>
                                    <div class="col-sm-7 col-md-7" style="display: flex;">
                                        <input type="text" placeholder=""
                                               id="cur_password"
                                               class="form-control" style="border: 1px solid grey;" required
                                               autocomplete="">
                                        {{--Check Button--}}
                                        <a class="btn btn-success btn_clear_select2_2" id="check_button"
                                           title="@lang('string.changePass')">
                                            <i class="icon-checkmark4 icon-checked"></i></a>
                                        <br>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12" style="margin-bottom: 20px;margin-top: 20px;">
                                    <div id="warning_div">
                                        <p id="reset_password_warning"
                                           style="color: red;">
                                            @lang('string.reset_password_guide')
                                        </p>
                                    </div>
                                </div>
                                {{--New Password--}}
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-sm-5 col-md-5"
                                               style="font-size: 15px">@lang('string.newPassword')</label>
                                        <div class="col-sm-7 col-md-7">
                                            <input name="password" id="password" type="password"
                                                   placeholder="" autocomplete=""
                                                   class="form-control" style="border: 1px solid grey;" disabled required>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                {{--Confrim New Password--}}
                                <div class="col-sm-12 col-md-12" style="margin-bottom: 15px;">
                                    <div class="form-group">
                                        <label class="control-label col-sm-5 col-md-5"
                                               style="font-size: 15px">@lang('string.confirmPassword')</label>
                                        <div class="col-sm-7 col-md-7">
                                            <input name="password_confirmation" id="password-confirm" type="password"
                                                   placeholder="" autocomplete=""
                                                   class="form-control" style="border: 1px solid grey;" disabled
                                                   required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>

                {{--{{ csrf_field() }}--}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal"
                            style="border: 1px solid #eca5a5;margin-top: 12px;margin-bottom: -9px;"><i
                                class="icon-arrow-left12 position-left"></i>@lang('string.cancel')</button>
                    <button type="submit" class="btn btn-primary btn_validate_Rate"
                            style="border: 1px solid #0a0a0a;margin-top: 12px;margin-bottom: -9px;" id="submit_button"
                            disabled>
                        <b>@lang('string.save')</b><i class="icon-arrow-right13 position-right"></i></button>
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

{{--<!-- core JS Grape -->--}}
{{--<script src="{{'https://code.highcharts.com/highcharts.js'}}"></script>--}}
{{--<script src="{{'https://code.highcharts.com/modules/exporting.js'}}"></script>--}}
{{--<script src="{{'https://code.highcharts.com/modules/export-data.js'}}"></script>--}}

<script src="{{asset('/assets/js/jquerysession.js')}}"></script>
<script src="{{asset('/assets/js/site.js')}}"></script>

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
        var Am_or_Pm = h >= 12 ? 'PM' : 'AM';
        h = h % 12;
        h = h ? h : 12; // the hour '0' should be '12'
        var m = today.getMinutes();
        var s = today.getSeconds();
        // add a zero in front of numbers<10
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('showTime').innerHTML = date + "/" + month + "/" + year + "  " + h + ":" + m + ":" + s + " " + Am_or_Pm;
        t = setTimeout(function () {
            startTime()
        }, 500);
    }

    startTime();

    //Check User
    function checkUsernamePassword() {
        var username = $('#username').val();
        var password = $('#cur_password').val();
        console.log(username+" , "+password);
        var result = setTimeout(function () {
            $.ajax({
                type: "POST",
                url: "api/user/check_current_secure",
                data: {
                    'username': username,
                    'password': password
                },
                success: function (ResponseJson) {
                    var obj = JSON.parse(ResponseJson);
                    var status = obj.status;
                    console.log(ResponseJson);
                    switchWarning(username, password, status);
                    enabler(status);
                }
            });
        });
    }

    //Switch Warning
    function switchWarning(username, password, status) {
        var color = "#FF0000";
        var component = '<p id =' + '"reset_password_warning"' + 'class="control-label"' + 'style="margin-bottom:' +
            '20px;' + 'color: ' + color + '"' + '>' + '@lang('string.reset_password_guide') </p>';
        if (username !== "" && password !== "") {
            if (status === "200") {
                color = "#00FF00";
                component = '<p id =' + '"reset_password_warning"' + 'class="control-label"' + 'style="margin-bottom:' +
                    '20px;' + 'color: ' + color + '"' + '>' + '@lang('auth.can_reset_password') </p>';
            } else {
                color = "#FF0000";
                component = '<p id =' + '"reset_password_warning"' + 'class="control-label"' + 'style="margin-bottom:' +
                    '20px;' + 'color: ' + color + '"' + '>' + '@lang('auth.can_not_reset_password') </p>';
            }
        }
        //
        $("#reset_password_warning").detach(); // clear in dev
        $("#warning_div").append(component); // add new component from condition if above
        $('#reset_password_warning').css('color', color); // than set color to it from condition true or false
    }

    //Check New And Confirmation Password
    function checkNewPassword() {
        var newPassword = $('#password').val();
        var confirmNewPassword = $('#password-confirm').val();
        var enable = true;
        //
        if (newPassword.length > 6 || newPassword.length === 6) {
            enable = (newPassword === confirmNewPassword) ? false : true;
        }
        //
        $('#submit_button').prop('disabled', enable);
    }

    //Enable Input and Button
    function enabler(status) {
        var enable = (status !== "200") ? true : false;
        $('#password').prop('disabled', enable);
        $('#password-confirm').prop('disabled', enable);
    }

    //current password input enter key event
    $('#cur_password').keypress(function (event) {
        if (event.which === 13) {
            checkUsernamePassword();
        }
    });

    //email input enter key event
    $('#email').keypress(function (event) {
        if (event.which === 13) {
            checkUsernamePassword();
        }
    });

    //Check new password
    $('#password').on('input', function (event) {
        checkNewPassword()
    });

    //Check Confirm Password
    $('#password-confirm').on('input', function (event) {
        checkNewPassword()
    });

    //Check Button On click
    $("#check_button").click(function () {
        checkUsernamePassword()
    });

    // dialog chang password user and admin
    $(document).on("click", "#ChangePassword", function () {
        $('#changePassword').modal({
            backdrop: 'static'
        });
    });

</script>
</html>
