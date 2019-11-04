@extends('layouts.app')
@section('title', 'Go Paperless')
@section('content')
<div class="page__content" id="page-content">
    <style>
        /* .widget__title {
           
        } */

        #rw-card-inner-container-up {
            text-align: left;
            font-size: 20px;
            line-height: 33px;
            color: #9a3d37
        }

        .widget__title {
            font-size: 18px !important;
            line-height: 1.18;
            color: #ff6000 !important;
            /* margin-bottom: 40px; */

        }

        .subtitle {
            color: #141414 !important;
            font-size: 14px;
            letter-spacing: 0.5px;
        }

        .form-group label,
        legend {
            margin-bottom: 15px;
            font-weight: 400;
            font-size: 13px;
            color: #323c47;
            color: #4a4a4a;
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
                    <li class="breadcrumb-item active">Go Paperless</li>
                </ol>
            </nav>
        </div>
        <!-- //END PAGE HEADING -->


        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-12 mt-4">
                    <div class="card">
                        <div class="widget invert widget--items-middle">
                            <div class="widget__icon_layer widget__icon_layer--right"><span class="li-document2"></span>
                            </div>
                            <div class="widget__container">
                                <div class="widget__line">
                                    <div class="widget__icon"><span class="li-document2"></span></div>
                                    <div class="widget__title">Statements &amp; Documents
                                        {{($paperless->general_statement == '')? 'checked':'none'}}
                                    </div>
                                    <div class="widget__subtitle">Go paperless for all eligible accounts and documents.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('paperless.submit')}}" method="post">
                                @csrf

                                <fieldset class="form-group">
                                    <div class="row">
                                        <legend class="col-sm-4">Statements</legend>
                                        <div class="col-sm-4">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio"
                                                        name="general_statement" value="1">
                                                    Online only (include check
                                                    images)
                                                    @error('general_statement')
                                                    <small class="alert-danger">{{ $message }}</small>
                                                    @enderror
                                                </label></div>
                                        </div>
                                        <div class=" col-sm-4">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio"
                                                        name="general_statement" value="2">
                                                    Online and by mail

                                                    @error('general_statement')
                                                    <small class="alert-danger">{{ $message }}</small>
                                                    @enderror

                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="form-group">
                                    <div class="row">
                                        <legend class="col-sm-4">Tax Statements</legend>
                                        <div class="col-sm-4">
                                            <div class="form-check">
                                                <label class="form-check-label">


                                                    <input class="form-check-input" type="radio" name="tax_statement"
                                                        value="1">

                                                    Online only
                                                    @error('tax_statement')
                                                    <small class="alert-danger">{{ $message }}</small>
                                                    @enderror
                                                </label></div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="tax_statement"
                                                        value="2">
                                                    Online and by mail
                                                    @error('tax_statement')
                                                    <small class="alert-danger">{{ $message }}</small>
                                                    @enderror
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="form-group">
                                    <div class="row">
                                        <legend class="col-sm-4">Account Notices</legend>
                                        <div class="col-sm-4">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="notification"
                                                        value="1">
                                                    Online only
                                                    @error('notification')
                                                    <small class="alert-danger">{{ $message }}</small>
                                                    @enderror
                                                </label></div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="notification"
                                                        value="2">
                                                    Online and by mail
                                                    @error('notification')
                                                    <small class="alert-danger">{{ $message }}</small>
                                                    @enderror
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <button style="background: #9a3d37; border:none;"
                                    class="btn btn-lg btn-primary mt-2">Update
                                    Settings</button>
                            </form>
                        </div>
                    </div>



                </div>

            </div>
        </div>





    </div>
    <!-- //END PAGE CONTENT CONTAINER -->
</div>

@endsection