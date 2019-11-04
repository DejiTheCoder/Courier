@extends('layouts.admin')
@section('title', 'Website Configuration')
@section('content')
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
            /* color: #4a4a4a; */
            letter-spacing: 0.65px;
        }
    </style>

    <!-- SIDEPANEL -->

    <!-- //END SIDEPANEL -->
    <!-- PAGE CONTENT CONTAINER -->
    <div class="content" id="content">
        <div class="page-heading">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Administrator</li>
                    <li class="breadcrumb-item active">Website Configuration</li>
                </ol>
            </nav>
        </div>
        <div class="container-fluid">
            <div class="row">


                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-center mb-4">Website Information</h4>
                            <form action="{{ route('admin.bank.info')}}" method="post">
                                @csrf
                                <div class="form-group  form-row">
                                    <div class="col-12 col-lg-12">
                                        <label class="col-form-label">
                                            Phone Number<sup class="text-danger">*</sup><br>
                                            @error('bank_phone')
                                            <small class="alert-danger">{{ $message }}</small>
                                            @enderror
                                        </label>
                                        <div class="form-control-element form-control-element--right">
                                            <input name="bank_phone" type="text"
                                                class="form-control @error('bank_phone') is-invalid @enderror"
                                                value="{{ $setting->bank_phone}}">
                                            <div class="form-control-element__box form-control-element__box--pretify">
                                                <span class="fa fa-mobile"></span></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-12">
                                        <label class="col-form-label">
                                            Bank Name<sup class="text-danger">*</sup><br>
                                            @error('bank_name')
                                            <small class="alert-danger">{{ $message }}</small>
                                            @enderror
                                        </label>
                                        <div class="form-control-element form-control-element--right">
                                            <input name="bank_name" type="text"
                                                class="form-control @error('bank_name') is-invalid @enderror"
                                                value="{{ $setting->bank_name}}">
                                            <div class="form-control-element__box form-control-element__box--pretify">
                                                <span class="fa fa-bank"></span></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-12">
                                        <label class="col-form-label">
                                            Bank Email Address<sup class="text-danger">*</sup><br>
                                            @error('bank_email')
                                            <small class="alert-danger">{{ $message }}</small>
                                            @enderror
                                        </label>
                                        <div class="form-control-element form-control-element--right">
                                            <input name="bank_email" type="text"
                                                class="form-control @error('bank_email') is-invalid @enderror"
                                                value="{{ $setting->bank_email}}">
                                            <div class="form-control-element__box form-control-element__box--pretify">
                                                <span class="fa fa-envelope"></span></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="form-group"><label>&nbsp;</label>
                                            <button type="submit" class="btn btn-secondary btn-block">Update
                                                Website Information</button></div>
                                    </div>
                                </div>
                            </form>

                        </div>



                    </div>


                </div>

                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-center mb-4">Update Password</h4>
                            <form action="{{ route('admin.password.update')}}" method="post">
                                @csrf
                                <div class="form-group  form-row">
                                    <div class="col-12 col-lg-12">
                                        <label class="col-form-label">
                                            Old Password <sup class="text-danger">*</sup><br>
                                            @error('old')
                                            <small class="alert-danger">{{ $message }}</small>
                                            @enderror
                                        </label>
                                        <div class="form-control-element form-control-element--right">
                                            <input name="old" type="password"
                                                class="form-control @error('welcome_message') is-invalid @enderror"
                                                value="">
                                            <div class="form-control-element__box form-control-element__box--pretify">
                                                <span class="fa fa-lock"></span></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-12">
                                        <label class="col-form-label">
                                            New Password<sup class="text-danger">*</sup><br>
                                            @error('new')
                                            <small class="alert-danger">{{ $message }}</small>
                                            @enderror
                                        </label>
                                        <div class="form-control-element form-control-element--right">
                                            <input name="new" type="password"
                                                class="form-control @error('welcome_message') is-invalid @enderror"
                                                value="">
                                            <div class="form-control-element__box form-control-element__box--pretify">
                                                <span class="fa fa-lock"></span></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-12">
                                        <label class="col-form-label">
                                            Confirm New Password<sup class="text-danger">*</sup><br>
                                            @error('newconfirm')
                                            <small class="alert-danger">{{ $message }}</small>
                                            @enderror
                                        </label>
                                        <div class="form-control-element form-control-element--right">
                                            <input name="newconfirm" type="password"
                                                class="form-control @error('welcome_message') is-invalid @enderror"
                                                value="">
                                            <div class="form-control-element__box form-control-element__box--pretify">
                                                <span class="fa fa-lock"></span></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="form-group"><label>&nbsp;</label>
                                            <button type="submit" class="btn btn-secondary btn-block">Change
                                                Password</button></div>
                                    </div>
                                </div>
                            </form>

                        </div>



                    </div>


                </div>

                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-center mb-4">Bank Address</h4>
                            <form action="{{ route('admin.bank.address')}}" method="post">
                                @csrf
                                <div class="form-group  form-row">
                                    <div class="col-12 col-lg-12">
                                        <label class="col-form-label">
                                            Address 1<sup class="text-danger">*</sup><br>
                                            @error('bank_address_1')
                                            <small class="alert-danger">{{ $message }}</small>
                                            @enderror
                                        </label>
                                        <div class="form-control-element form-control-element--right">
                                            <input name="bank_address_1" type="text"
                                                class="form-control @error('bank_address_1') is-invalid @enderror"
                                                value="{{ $setting->bank_address_1}}">
                                            <div class="form-control-element__box form-control-element__box--pretify">
                                                <span class="fa fa-map-marker"></span></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-12">
                                        <label class="col-form-label">
                                            Address 2<sup class="text-danger">*</sup><br>
                                            @error('bank_address_2')
                                            <small class="alert-danger">{{ $message }}</small>
                                            @enderror
                                        </label>
                                        <div class="form-control-element form-control-element--right">
                                            <input name="bank_address_2" type="text"
                                                class="form-control @error('bank_address_2') is-invalid @enderror"
                                                value="{{ $setting->bank_address_2}}">
                                            <div class="form-control-element__box form-control-element__box--pretify">
                                                <span class="fa fa-map-marker"></span></div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-12">
                                        <label class="col-form-label">
                                            Address 3<sup class="text-danger">*</sup><br>
                                            @error('bank_address_3')
                                            <small class="alert-danger">{{ $message }}</small>
                                            @enderror
                                        </label>
                                        <div class="form-control-element form-control-element--right">
                                            <input name="bank_address_3" type="text"
                                                class="form-control @error('bank_address_3') is-invalid @enderror"
                                                value="{{ $setting->bank_address_3}}">
                                            <div class="form-control-element__box form-control-element__box--pretify">
                                                <span class="fa fa-map-marker"></span></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="form-group"><label>&nbsp;</label>
                                            <button type="submit" class="btn btn-secondary btn-block">Update
                                                Address</button></div>
                                    </div>
                                </div>
                            </form>

                        </div>



                    </div>


                </div>

            </div>
        </div>
    </div> <!-- //END PAGE CONTENT CONTAINER -->
</div>

@endsection