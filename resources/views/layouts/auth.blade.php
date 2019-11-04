<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>UBS Online Services</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">

    <link rel="stylesheet" href="{{ asset('static/auth/css/wma-login.css') }}">
    <link rel="stylesheet" href="{{ asset('static/auth/css/neo-core-css.white.css') }}">
    <link rel="stylesheet" href="{{ asset('static/auth/css/neo-masthead.white.css') }}">
    <link rel="stylesheet" href="{{ asset('static/auth/css/neo-buttons.white.css') }}">
    <link rel="stylesheet" href="{{ asset('static/auth/css/neo-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('static/auth/css/ubs-notification.white.css') }}">
    <link rel="stylesheet" href="{{ asset('static/auth/css/ubs-flyouts.white.css') }}">
    <link rel="stylesheet" href="{{ asset('static/auth/css/wma-footer-view.css') }}">
    <!-- Toast CSS -->
    <link href="{{ asset('static/backend/css/toastr.min.css')}}" rel="stylesheet">
    <style>
        body.login footer {
            width: 1242px;
        }

        .form-row {
            display: flex;
            margin: 0 -10px;
            position: relative;
        }

        .form-row .form-holder {
            width: 50%;
            padding: 0 10px;
            margin-bottom: 17px;
            position: relative;
        }

        .form-row .form-holder fieldset {
            border: 2px solid #e5e5e5;
            border-radius: 4px;
            padding: 0 20px;
            margin-bottom: 0px;
        }

        .form-row .form-holder legend {
            font-size: 11px;
            font-weight: 700;
            color: #999;
        }

        .form-row .form-holder input,
        .inner .form-row .form-holder select {

            width: 100%;
            padding: 5px 0px 13px;
            border: none;
            appearance: unset;
            outline: none;
            font-weight: 600;
            font-size: 14px;
            box-sizing: border-box;
            border-radius: 4px;
        }

        .invalid-feedback {
            color: #f00;
        }
    </style>

</head>

<body class="login">
    <header role="banner">
        <nav class="masthead">
            <a class="brand" title="" href="/">Home</a>
        </nav>
    </header>
    <div class="wma">
        <section class="wma-login">
            <header>
                <div class="primary-column">
                    <div class="header-content">
                        <h1>Welcome to UBS Online Services</h1>
                        <p class="current-date">Tuesday, July 30, 2019</p>
                    </div>
                </div>
            </header>

            <main>
                @yield('content')
            </main>

            <footer>
            </footer>

        </section>
    </div>
    <footer>
        <div class="footer-content">
            <div class="contact-info">
                <p>Need assistance? Call 888-279-3343 or e-mail <a
                        href="mailto:onlineservices@ubs.com">onlineservices@ubs.com</a>. Outside the U.S., call collect
                    at 201-352-5257.</p>
                <p>Lost or stolen card?&nbsp;Call 800-762-1000. Outside the U.S., call collect at 201-352-5257.</p>
                <p>TTY Services: Call 844-612-0986 or outside the U.S., call 201-352-1495.</p>
            </div>

            <div class="copyright">
                <p>&copy; UBS 1998-<span class="year">2019</span>. All rights reserved. Wealth management services in
                    the United States are provided by UBS Financial Services Inc., which is registered with the U.S.
                    Securities Exchange Commission as a broker-dealer and investment adviser. Investment advisory and
                    brokerage services are separate and distinct, differ in material ways and are governed by different
                    laws and separate contracts. UBS Financial Services Inc. is also registered as a Futures Commission
                    Merchant with the U.S. Commodity Futures Trading Commission. Member <a
                        href="http://www.nfa.futures.org/" target="_blank">NFA</a>. UBS Financial Services Inc. is a
                    subsidiary of UBS AG. Investment, insurance and annuity products are not FDIC insured, are not
                    deposits of or guaranteed by a bank, and may lose value. Member <a href="http://www.finra.org"
                        target="_blank">FINRA</a>. Member <a href="http://www.sipc.org" target="_blank">SIPC</a>.</p>
            </div>
        </div>
    </footer>


    {{-- <script src="{{ asset('static/auth/js/ubs-flyouts.min.js') }}"></script> --}}
    <script type="text/javascript" src="{{ asset('static/backend/js/vendors/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('static/backend/js/toastr.min.js') }}"></script>
    @include('alert.alert')
</body>

</html>