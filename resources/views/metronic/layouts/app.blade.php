<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') | {{ config('settings.system_title') }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <link rel="canonical" href="http://preview.keenthemes.comapps/file-manager/folders.html" />
    <link rel="shortcut icon" href="{{ asset('metronic_8.2.6/media/logos/favicon.ico') }}" />

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('metronic_8.2.6/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('metronic_8.2.6/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('metronic_8.2.6/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    {{-- <link rel="stylesheet" href="{{ asset('css/digidocu-custom.css') }}"> --}}
    @yield('css')
</head>


<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">

    {{-- @section('scripts') --}}
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    {{-- @stop --}}

    @if (!Auth::guest())
        <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
            <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
                @include('metronic.layouts.sidebar')

                <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                    @include('metronic.layouts.menu')
                    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                        @yield('content')
                        @include('metronic.layouts.footer')
                    </div>
                </div>

            </div>
        </div>
    @else
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{!! url('/') !!}">
                        InfyOm Generator
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{!! url('/home') !!}">Home</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <li><a href="{!! url('/login') !!}">Login</a></li>
                        <li><a href="{!! url('/register') !!}">Register</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    @endif

    <script>
        var hostUrl = "{{ asset('metronic_8.2.6') }}/";
    </script>

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('metronic_8.2.6/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('metronic_8.2.6/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('metronic_8.2.6/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('metronic_8.2.6/js/custom/apps/file-manager/list.js') }}"></script>
    <script src="{{ asset('metronic_8.2.6/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('metronic_8.2.6/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('metronic_8.2.6/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('metronic_8.2.6/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('metronic_8.2.6/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('metronic_8.2.6/js/custom/utilities/modals/users-search.js') }}"></script>
    <!--end::Custom Javascript-->
    {{-- <script src="{{ asset('js/digidocu-custom.js') }}"></script> --}}
    @yield('scripts')
    <script>
        // alert(hostUrl);
    </script>
    <!--end::Javascript-->
</body>

</html>
