@extends('layouts.app')
@section('title', 'Pay To Account')
@section('content')
<div class="page__content" id="page-content">
    <style>
        .widget__title {
            font-size: 18px !important;
            line-height: 1.18;
            color: #ff6000 !important;
            /* margin-bottom: 40px; */

        }

        p.large-type {
            font-size: 15px;
            line-height: 1.7;
            text-align: justify
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
                    <li class="breadcrumb-item">BillPay</li>
                    <li class="breadcrumb-item active">Pay To Account</li>
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
                                    <div class="widget__title">Payee Account</div>
                                    <div class="widget__subtitle">Set up one-time or recurring payments with Bill Pay.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <h2 id="rw-ac-pointer">Add a Payee Account: Enter information</h2>
                            <p class="mb-4 large-type">To add Payee account, enter the following information and click
                                <strong>Save</strong></p>
                            <div class="rw-accordion">
                                <div class="rw-accordion__item open">
                                    <div class="rw-accordion__content">
                                        <form action="{{ route('payee.enrol.submit')}}" method="post">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">
                                                    Payee Account Name<sup>*</sup><br>
                                                    @error('pay_account_name')
                                                    <small class="alert-danger">{{ $message }}</small>
                                                    @enderror
                                                </label>

                                                <div class="col-sm-4 col-offset-2">
                                                    <input type="text" name="pay_account_name"
                                                        class="form-control @error('pay_account_name') is-invalid @enderror"
                                                        value="{{ old('pay_account_name')}} ">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">
                                                    Payee Nickname <br>
                                                    @error('pay_nickname')
                                                    <small class="alert-danger">{{ $message }}</small>
                                                    @enderror
                                                </label>
                                                <div class="col-sm-4 col-offset-2">
                                                    <input type="text" name="pay_nickname"
                                                        class="form-control @error('pay_nickname') is-invalid @enderror"
                                                        value="{{ old('pay_nickname') }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">
                                                    Payee Account Address <sup>*</sup><br>
                                                    @error('pay_account_address')
                                                    <small class="alert-danger">{{ $message }}</small>
                                                    @enderror
                                                </label>
                                                <div class="col-sm-4 col-offset-2">
                                                    <input type="text" name="pay_account_address"
                                                        class="form-control @error('pay_account_address') is-invalid @enderror"
                                                        value="{{ old('pay_account_address') }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">
                                                    City / State / Zip Code <sup>*</sup><br>
                                                    @error('pay_city_state_zip')
                                                    <small class="alert-danger">{{ $message }}</small>
                                                    @enderror
                                                </label>
                                                <div class="col-sm-4 col-offset-2">
                                                    <input type="text" name="pay_city_state_zip"
                                                        class="form-control @error('pay_city_state_zip') is-invalid @enderror"
                                                        value="{{ old('pay_city_state_zip') }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">
                                                    Payee Account Account<sup>*</sup><br>
                                                    @error('pay_account_number')
                                                    <small class="alert-danger">{{ $message }}</small>
                                                    @enderror
                                                </label>
                                                <div class="col-sm-4 col-offset-2">
                                                    <input type="text" name="pay_account_number"
                                                        class="form-control @error('pay_account_number') is-invalid @enderror"
                                                        value="{{ old('pay_account_number') }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">
                                                    Payee Account Phone Number<sup>*</sup><br>
                                                    @error('pay_account_phone')
                                                    <small class="alert-danger">{{ $message }}</small>
                                                    @enderror
                                                </label>
                                                <div class="col-sm-4 col-offset-2">
                                                    <input type="text" name="pay_account_phone"
                                                        class="form-control @error('pay_account_phone') is-invalid @enderror"
                                                        value="{{ old('pay_account_phone') }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 col-lg-4 offset-md-4">
                                                    <button class="btn btn-block btn-secondary text-center">Save
                                                        Payee</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>


                            </div>

                            <div class="rw-accordion__item open mt-4">
                                <div class="rw-accordion__header">
                                    <h4 class="rw-accordion__title">Enroled Payee</h4>
                                </div>
                                <div class="rw-accordion__content">
                                    <div class="table-responsive">
                                        <table class="table table-indent-rows margin-bottom-10"
                                            style="min-width: 500px">
                                            <tbody>
                                                @forelse ($payeeAza as $payee)
                                                <tr>
                                                    <td width="40">
                                                        <div
                                                            class="icon-box icon-box--bordered icon-box--rounded bg-secondary">
                                                            <span class="fa fa-user"></span></div>
                                                    </td>
                                                    <td><strong>Payee Account Name</strong><br>
                                                        <span class="text-muted">{{$payee->pay_account_name}}</span>
                                                    </td>
                                                    <td><strong>Payee Nickname</strong><br>
                                                        <span class="text-muted">{{$payee->pay_nickname}}</span>
                                                    </td>
                                                    <td><strong>Payee Account Address</strong><br>
                                                        <span
                                                            class="text-muted">{{$payee->pay_account_address}},{{$payee->pay_city_state_zip}}</span>
                                                    </td>

                                                    <td width="120"><strong>Payee ACN</strong><br><span
                                                            class="text-muted">{{$payee->pay_account_number}}</span>
                                                    </td>
                                                    <td width="150"><strong>Payee Phone</strong><br><span
                                                            class="text-muted">{{$payee->pay_account_phone}}</span>
                                                    </td>
                                                    <td width="120"><strong>Issued Date</strong><br><span
                                                            class="text-muted">{{(new \Carbon\Carbon($payee->created_at))->diffForHumans()}}</span>
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('client.payee.delete', $payee->id )}}"
                                                            class="text-white btn btn-danger btn-sm btn-icon"><span
                                                                class="fa fa-trash"></span></a></td>

                                                </tr>
                                                @empty

                                                @endforelse
                                            </tbody>
                                        </table>
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