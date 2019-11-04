<!DOCTYPE html>
<html lang="en">

<head>
    <title>Success - UBS Online</title>
    <!-- META SECTION -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- END META SECTION -->
    <!-- css include -->
    <link rel="stylesheet" href="{{ asset('static/backend/css/styles.css')}}">
    <!-- Toast CSS -->
    <link href="{{ asset('static/backend/css/toastr.min.css')}}" rel="stylesheet">
    <style>
        .success-image {
            background-position: 50%;
            background-size: cover;
            background-repeat: no-repeat;
            height: 250px;
            width: 250px;
            justify-content: center;
            margin: 0 auto;
            margin-bottom: 50px;
        }

        .success-wrapper {
            padding: 20px;
            border: 1px dotted #428c01;
        }

        .success-wrapper p {
            padding: 0px 20px;
            color: #141414 !important;
            font-weight: 500;
            animation: changeOpacity 3.5s infinite;
            font-size: 14px;
            letter-spacing: 0.8px;
        }
    </style>
</head>


<body>
    <!-- PAGE WRAPPER -->
    <div class="page">
        <!-- PAGE CONTENT WRAPPER -->
        <div class="page__content" id="page-content">
            <!-- PAGE LOGIN CONTAINER -->
            <div class="important-container login-container" style="background: #FCFCFF;">
                <div class="login-container__buttons login-container__buttons--right"><a href="pages-registration.html"
                        class="btn btn-outline-primary btn--icon btn--icon-right">Back to homepage <span
                            class="fa fa-angle-right"></span></a></div>
                <div class="content justify-content-center">
                    <div class="success-image" style="background-image:url('{{ asset('static/backend/img/yes.gif')}}')">
                    </div>
                    <div class="form-group margin-bottom-30">
                        <div class="form-row">
                            <div class="col-12 success-wrapper">
                                <p class="text-success">Congratulations! Your application was successful and
                                    subjected to verification
                                    within 24-72hrs. You will be notified when approved.</p>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="form-group text-center">
                        <div class="form-row">
                            <div class="col-4"><a href="#" class="text-muted">Privacy</a></div>
                            <div class="col-4"><a href="#" class="text-muted">Disclaimer</a></div>
                            <div class="col-4"><a href="#" class="text-muted">Prudential disclosures</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PAGE LOGIN CONTAINER -->
            <!-- PAGE CONTENT CONTAINER -->
            <div class="content d-none d-lg-block" id="content"
                style="background: url('{{ asset('static/backend/img/bridge.jpg')}}') left center no-repeat; background-size: cover;">
            </div>
            <!-- //END PAGE CONTENT CONTAINER -->
        </div>
        <!-- //END PAGE CONTENT -->
    </div>
    <!-- //END PAGE WRAPPER -->

    <!-- IMPORTANT SCRIPTS -->
    <script type="text/javascript" src="{{ asset('static/backend/js/vendors/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('static/backend/js/vendors/jquery/jquery-migrate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('static/backend/js/vendors/bootstrap/bootstrap.bundle.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('static/backend/js/vendors/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- END IMPORTANT SCRIPTS -->
    <!-- TEMPLATE SCRIPTS -->
    <script type="text/javascript" src="{{ asset('static/backend/js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('static/backend/js/plugins.js') }}"></script>
    <script type="text/javascript" src="{{ asset('static/backend/js/demo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('static/backend/js/settings.js') }}"></script>
    <!-- END TEMPLATE SCRIPTS -->
    </div>
</body>