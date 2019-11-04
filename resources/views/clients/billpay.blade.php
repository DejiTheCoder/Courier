@extends('layouts.app')
@section('title', 'Billpay Payments')
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
            font-weight: 600;
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
                    <li class="breadcrumb-item active">BillPay</li>
                    <li class="breadcrumb-item active">Schedule Payments</li>
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
                                    <div class="widget__title">Schedule Payments</div>
                                    <div class="widget__subtitle">Set up one-time or recurring payments with Bill Pay.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <p class="mb-4 large-type">To add Pay To account, enter the following information and click
                                <strong>Save</strong></p>

                            <div class="rw-accordion">
                                <div class="rw-accordion__item open">
                                    <div class="rw-accordion__content">
                                        <form action="{{ route('payee.billpay.submit')}}" method="POST">
                                            @csrf
                                            <div class="form-group row">

                                                <div class="col-12 col-lg-3">
                                                    <label class="col-form-label">
                                                        Pay From
                                                        @error('pay_source_account')
                                                        <small class="alert-danger">{{ $message }}</small>
                                                        @enderror
                                                    </label>
                                                    <select name="pay_source_account"
                                                        class="custom-select @error('pay_source_account') is-invalid @enderror">
                                                        <option value=""> &dash; Selected prefered option &dash;
                                                        </option>
                                                        <option value="{{ Auth::user()->account_number }}">
                                                            {{ Auth::user()->account_type }} &dash;
                                                            ******{{ substr(Auth::user()->account_number, 6) }}</option>
                                                    </select>
                                                </div>


                                                <div class="col-12 col-lg-3">
                                                    <label class="col-form-label">
                                                        Pay To
                                                        @error('pay_destination_account')
                                                        <small class="alert-danger">{{ $message }}</small>
                                                        @enderror
                                                    </label>
                                                    <select name="pay_destination_account"
                                                        class="custom-select @error('pay_source_account') is-invalid @enderror">
                                                        <option value=""> &dash; Selected prefered option &dash;
                                                        </option>
                                                        @foreach($payeeAza as $payee)
                                                        <option value="{{$payee->pay_account_number}}">
                                                            {{$payee->pay_nickname}}
                                                            &dash; *****{{substr($payee->pay_account_number, -4)}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-12 col-lg-3">
                                                    <label class="col-form-label">
                                                        Amount
                                                        @error('pay_amount')
                                                        <small class="alert-danger">{{ $message }}</small>
                                                        @enderror
                                                    </label>
                                                    <div class="form-control-element form-control-element--right">
                                                        <input type="nummber" name="pay_amount"
                                                            class="form-control @error('pay_amount') is-invalid @enderror"
                                                            value="{{ old('pay_amount')}}">
                                                        <div
                                                            class="form-control-element__box form-control-element__box--pretify">
                                                            <span class="fa fa-dollar"></span></div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-3">
                                                    <label class="col-form-label">
                                                        Deliver By
                                                        @error('pay_date_transaction')
                                                        <small class="alert-danger">{{ $message }}</small>
                                                        @enderror
                                                    </label>
                                                    <div class="form-control-element form-control-element--right">
                                                        <input type="text" name="pay_date_transaction"
                                                            class="form-control @error('pay_date_transaction') is-invalid @enderror"
                                                            placeholder="Choose your date..."
                                                            value="{{ old('pay_date_transaction')}}"
                                                            id="dr-example-single">
                                                        <div
                                                            class="form-control-element__box form-control-element__box--pretify">
                                                            <span class="fa fa-calendar"></span></div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-2" style="margin-top:40px;">
                                                    <button class="btn btn-block btn-secondary text-center">Make
                                                        Payment</button>
                                                </div>


                                            </div>

                                        </form>
                                    </div>
                                </div>
                                <div class="rw-accordion__item open mt-4">
                                    <div class="rw-accordion__header">
                                        <h4 class="rw-accordion__title">Scheduled Payment</h4>
                                    </div>
                                    <div class="rw-accordion__content">
                                        <div class="table-responsive">
                                            <table class="table table-indent-rows margin-bottom-10"
                                                style="min-width: 500px">
                                                <tbody>
                                                    @forelse ($billpay as $pay)
                                                    <tr>
                                                        <td width="40">
                                                            <div
                                                                class="icon-box icon-box--bordered icon-box--rounded bg-secondary">
                                                                <span class="fa fa-dollar"></span></div>
                                                        </td>
                                                        <td><strong>Confirmation Number</strong><br><span
                                                                class="text-muted">{{$pay->pay_transaction_id}}</span>
                                                        </td>
                                                        <td><strong>Source Account Number</strong><br><span
                                                                class="text-muted">{{$pay->pay_source_account}}</span>
                                                        </td>
                                                        <td><strong>Payee Account Number</strong><br><span
                                                                class="text-muted">{{$pay->pay_destination_account}}</span>
                                                        </td>
                                                        <td width="200"><strong>Issued Date</strong><br><span
                                                                class="text-muted">{{(new \Carbon\Carbon($payee->pay_date_transaction))->diffForHumans()}}</span>
                                                        </td>
                                                        <td width="100"><strong
                                                                class="text-secondary">Amount</strong><br><span
                                                                class="text-danger">${{number_format($pay->pay_amount)}}</span>
                                                        </td>

                                                        <td>
                                                            @if ($pay->pay_transaction_status ==1)
                                                            <div
                                                                class="btn btn-outline-success btn-block disabled btn-sm">
                                                                Approved</div>
                                                            @else
                                                            <div
                                                                class="btn btn-outline-danger btn-block disabled btn-sm">
                                                                Pending</div>
                                                            @endif
                                                            {{-- <div
                                                                class="btn btn-outline-success btn-block disabled btn-sm">
                                                                Paid</div> --}}
                                                        </td>

                                                        <td>
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
    </div>
    <!-- //END PAGE CONTENT CONTAINER -->
</div>

@endsection