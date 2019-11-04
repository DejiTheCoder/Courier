@extends('layouts.app') @section('title', 'Mobile Deposit') @section('content')
<div class="page__content" id="page-content">
    <style>
        .widget__title {
            font-size: 18px !important;
            line-height: 1.18;
            color: #ff6000 !important;
            /* margin-bottom: 40px; */
        }

        .payee__icon {
            font-size: 20px;
        }

        p.large-type {
            font-size: 15px;
            line-height: 1.7;
            text-align: justify
        }

        .form-group label {
            margin-bottom: 15px;
            font-weight: 500;
            font-size: 13px;
            color: #323c47;
            letter-spacing: 0.65px;
        }
    </style>

    <!-- SIDEPANEL -->

    <!-- //END SIDEPANEL -->
    <!-- PAGE CONTENT CONTAINER -->
    <div class="content" id="content">
        <!-- PAGE HEADING -->
        <div class="page-heading">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('client.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Transfer Funds</li>
                    <li class="breadcrumb-item active">Mobile Deposit</li>
                </ol>
            </nav>
        </div>
        <!-- //END PAGE HEADING -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-12 mt-4">

                    <div class="card">
                        <div class="widget invert widget--items-middle">
                            <div class="widget__icon_layer widget__icon_layer--right"><span
                                    class="li-cash-dollar"></span>
                            </div>
                            <div class="widget__container">
                                <div class="widget__line">
                                    <div class="widget__icon"><span class="li-cash-dollar"></span></div>
                                    <div class="widget__title">Mobile Deposit</div>
                                    <div class="widget__subtitle"> Online check payment made easy
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">


                            <div class="rw-accordion">
                                <div class="rw-accordion__item open">
                                    <div class="rw-accordion__content">
                                        <div class="under_construction-wrapper">
                                            <h2>Under Maintenance</h2>
                                            <img src="{{ asset('static/backend/assets/img/under_development.png')}}"
                                                alt="" />
                                        </div>



                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- //END PAGE CONTENT CONTAINER -->
</div>

@endsection