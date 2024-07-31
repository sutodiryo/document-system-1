<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $data['title'] }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <link rel="shortcut icon" href="{{ asset('metronic_8.2.6/media/logos/favicon.ico') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ asset('metronic_8.2.6/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('metronic_8.2.6/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

    @yield('css')
</head>

<body id="kt_body" class="app-blank">
    {{-- <p>{{ $data['body'] }}</p> --}}

    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="d-flex flex-column flex-column-fluid">

            <div class="scroll-y flex-column-fluid px-10 py-10" data-kt-scroll="true" data-kt-scroll-activate="true"
                data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header_nav"
                data-kt-scroll-offset="5px" data-kt-scroll-save-state="true"
                style="background-color:#D5D9E2; --kt-scrollbar-color: #d9d0cc; --kt-scrollbar-hover-color: #d9d0cc">

                <style>
                    html,
                    body {
                        padding: 0;
                        margin: 0;
                        font-family: Inter, Helvetica, "sans-serif";
                    }

                    a:hover {
                        color: #009ef7;
                    }
                </style>
                <div id="#kt_app_body_content"
                    style="background-color:#D5D9E2; font-family:Arial,Helvetica,sans-serif; line-height: 1.5; min-height: 100%; font-weight: normal; font-size: 15px; color: #2F3044; margin:0; padding:0; width:100%;">
                    <div
                        style="background-color:#ffffff; padding: 45px 0 34px 0; border-radius: 24px; margin:40px auto; max-width: 600px;">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                            height="auto" style="border-collapse:collapse">
                            <tbody>
                                <tr>
                                    <td align="center" valign="center" style="text-align:center; padding-bottom: 0px">
                                        <div style="text-align:left; margin-bottom:5px">

                                            {{-- <div style="margin:0 60px 55px 60px">
                                                <a href="https://keenthemes.com" rel="noopener" target="_blank">
                                                    <img alt="Logo"
                                                        src="{{ URL::asset('metronic_8.2.6/media/email/logo-2.svg') }}"
                                                        style="height: 35px" />
                                                </a>
                                            </div> --}}

                                            <div style="font-size: 14px; font-weight: 500; margin:0 60px 30px 60px; font-family:Arial,Helvetica,sans-serif">
                                                <p
                                                    style="color:#181C32; font-size: 28px; font-weight:700; line-height:1.4; margin-bottom:24px">
                                                    Hello, here is a document waiting your approval:
                                                    {{-- <br />You have bundled topics togetherin the text structure you have set up --}}
                                                </p>
                                                <p style="margin-bottom:2px; color:#3F4254; line-height:1.6">Lots of
                                                    people make mistakes while creating paragraphs. Some writers just
                                                    put whitespace in their text in random places for aesthetic purposes
                                                    but don’t think about the coherence and structure of the text. In
                                                    many cases, the coherence within paragraphs and between paragraphs
                                                    remains unclear. These kinds of mistakes can mess up the structure
                                                    of your articles.</p>
                                            </div>
                                        </div>

                                        <a href="{{ route('documents.show', $data['document_id']) }}" target="_blank" style="background-color:#50cd89; margin-bottom: 70px; border-radius:6px;display:inline-block; margin-left:0px; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500; font-family:Arial,Helvetica,sans-serif;">
                                            Start approval {{ $data['file_name'] }}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="center"
                                        style="font-size: 13px; text-align:center; padding: 0 10px 10px 10px; font-weight: 500; color: #A1A5B7; font-family:Arial,Helvetica,sans-serif">
                                        <p style="color:#181C32; font-size: 16px; font-weight: 600; margin-bottom:9px">
                                            It’s all about customers!</p>
                                        <p style="margin-bottom:2px">Call our customer care number: +31 6 3344 55 56
                                        </p>
                                        <p style="margin-bottom:4px">You may reach us at
                                            <a href="https://devs.keenthemes.com" rel="noopener" target="_blank"
                                                style="font-weight: 600">devs.keenthemes.com</a>.
                                        </p>
                                        <p>We serve Mon-Fri, 9AM-18AM</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="center"
                                        style="font-size: 13px; padding:0 15px; text-align:center; font-weight: 500; color: #A1A5B7;font-family:Arial,Helvetica,sans-serif">
                                        <p>&copy; Copyright KeenThemes.
                                            <a href="https://keenthemes.com" rel="noopener" target="_blank"
                                                style="font-weight: 600;font-family:Arial,Helvetica,sans-serif">Unsubscribe</a>&nbsp;
                                            from newsletter.
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('metronic_8.2.6/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('metronic_8.2.6/js/scripts.bundle.js') }}"></script>
    @yield('scripts')
</body>

</html>
