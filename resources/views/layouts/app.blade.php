<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{--<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pawn Shop</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href = {{ asset("bootstrap/css/bootstrap.css") }} rel="stylesheet" />

    <link href="{{asset('/assets/css/icons/icomoon/styles.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/core.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/components.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/colors.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/extras/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">--}}

    <meta charset="UTF-8">
    <title>Pawn Shop</title>
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
</head>

<body>
<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand"><p><b style="font-size: 26px;margin-left: -14px;">ហាងបញ្ចាំ ហុង ហ៊ីង</b></p></a>

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
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon-switch2"> {{ __('auth.logout') }}</i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form></li>
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
            <div class="sidebar-content" style="background: #37474F;height: 100vh;">
                <!-- Main navigation -->
                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-title h6">
                        <span>ជ្រើសរើសការធ្វើ</span>
                        <ul class="icons-list">
                            <li><a href="#" data-action="collapse"></a></li>
                        </ul>
                    </div>

                    <div class="category-content no-padding">
                        <ul class="navigation navigation-main navigation-accordion">

                            <!-- Main -->
                            <li style="border: 0.1px solid grey;border-left: 0px;border-right: 0px;"><a href="{{('/admin/MainForm')}}"><i class="icon-home4"></i> <span>ផ្ទាំងគ្រប់គ្រង</span></a></li>
                            <li style="border: 0.1px solid grey;border-left: 0px;border-right: 0px;border-top: 0px;">
                                <a href="{{('/admin/Invoice')}}"><i class="icon-copy"></i> <span>វិក្ក័យបត្រ</span></a>
                                {{--<ul>--}}
                                    {{--<li><a href="#">Boxed full width</a></li>--}}
                                {{--</ul>--}}
                            </li>
                            <li style="border: 0.1px solid grey;border-left: 0px;border-right: 0px;border-top: 0px;">
                                <a href="{{('/admin/SaPerPoun')}}"><i class="icon-store"></i> <span>សារពើភ័ណ្ឌ</span></a>
                                {{--<ul>--}}
                                    {{--<li><a href="#">Horizontal navigation</a></li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#">1 columns</a>--}}
                                        {{--<ul>--}}
                                            {{--<li><a href="#">Dual sidebars</a></li>--}}
                                            {{--<li><a href="#">Double sidebars</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="#">Ding dak ey te!!!</a></li>--}}
                                {{--</ul>--}}
                            </li>
                            <li style="border: 0.1px solid grey;border-left: 0px;border-right: 0px;border-top: 0px;">
                                <a href="#"><i class="icon-user"></i> <span>អ្នកប្រើប្រាស់</span></a>
                                <ul>
                                    <li><a href="#" id="layout3">Layout 1</a></li>
                                    <li><a href="#" id="layout4">Layout 2 <span class="label bg-warning-400">Current</span></a></li>
                                    <li class="disabled"><a href="#" id="layout5">Layout 3 <span class="label bg-slate-800">Coming soon</span></a></li>
                                </ul>
                            </li>
                            <li style="border: 0.1px solid grey;border-left: 0px;border-right: 0px;border-top: 0px;">
                                <a href="#"><i class="icon-collaboration"></i> <span>សក្មភាព</span></a>
                                {{--<ul>--}}
                                    {{--<li><a href="#" id="layout3">Layout 1</a></li>--}}
                                    {{--<li><a href="#" id="layout4">Layout 2 <span class="label bg-warning-400">Current</span></a></li>--}}
                                    {{--<li class="disabled"><a href="#" id="layout5">Layout 3 <span class="label bg-slate-800">Coming soon</span></a></li>--}}
                                {{--</ul>--}}
                            </li>
                            <!-- /main -->

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
            <!-- Page header -->
            <!-- /page header -->
            <!-- Sidebars overview -->
            @yield('content')

            <!-- /sidebars overview -->
        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

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
        var m = today.getMinutes();
        var s = today.getSeconds();
        // add a zero in front of numbers<10
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('showTime').innerHTML = date + "/" + month + "/" + year + "  " + h + ":" + m + ":" + s;
        t = setTimeout(function() {
            startTime()
        }, 500);
    }
    startTime();
</script>
</html>
