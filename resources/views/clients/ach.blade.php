@extends('layouts.app')
@section('title', 'Transfer Funds')
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

        .alert.alert-info {
            background: #ced1d2;
        }

        .alert.alert-info p {
            color: #141414;
            font-size: 15px;
            letter-spacing: 0.65px;
        }

        .alert.alert-info a {
            color: #ff6000;
            font-weight: 600;
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
                    <li class="breadcrumb-item active">ACH Payments</li>
                </ol>
            </nav>
        </div>
        <!-- //END PAGE HEADING -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-12 mt-4">

                    <div class="card">
                        <div class="widget invert widget--items-middle">
                            <div class="widget__icon_layer widget__icon_layer--right"><span class="li-tab"></span>
                            </div>
                            <div class="widget__container">
                                <div class="widget__line">
                                    <div class="widget__icon"><span class="li-tab"></span></div>
                                    <div class="widget__title">External Transfer</div>
                                    <div class="widget__subtitle">Make quick and easy transfers.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body justify-content-center">
                            <div class="alert alert-info margin-bottom-30" role="alert">
                                <p class="text-center">Go <a href="{{ route('external.dashboard') }}">Manage
                                        Accounts</a>
                                    section to add
                                    external accounts
                                    for
                                    external transfer.</p>

                            </div>
                            <form action="{{ route('ach.dashboard.submit')}}" method="post">
                                @csrf
                                <div class="form-group row">

                                    <div class="col-12 col-lg-3">
                                        <label class="col-form-label">Funding Account<sup>*</sup>
                                            <br>
                                            @error('sender_account')
                                            <small class="alert-danger">{{ $message }}</small>
                                            @enderror
                                        </label>
                                        <select name="sender_account"
                                            class="custom-select @error('sender_account') is-invalid @enderror">
                                            <option value=""> &dash; Selected prefered option &dash;</option>
                                            @foreach($externalAza as $aza)
                                            <option value="{{$aza->bank_account_number}}">
                                                {{$aza->bank_nickname}}
                                                &dash;
                                                {{$aza->bank_account_type}} &dash;
                                                *****{{substr($aza->bank_account_number, -4)}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-3">
                                        <label class="col-form-label">Receiving Account<sup>*</sup>
                                            <br>
                                            @error('receiver_account')
                                            <small class="alert-danger">{{ $message }}</small>
                                            @enderror
                                        </label>

                                        <select name="receiver_account"
                                            class="custom-select @error('receiver_account') is-invalid @enderror">
                                            <option value=""> &dash; Selected prefered option &dash;</option>
                                            <option value="{{ Auth::user()->account_number }}">
                                                {{ Auth::user()->account_type }} &dash;
                                                ******{{ substr(Auth::user()->account_number, 6) }}</option>
                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-3">
                                        <label class="col-form-label">
                                            Amount<sup>*</sup><br>
                                            @error('amount')
                                            <small class="alert-danger">{{ $message }}</small>
                                            @enderror

                                        </label>

                                        <div class="form-control-element form-control-element--right">
                                            <input name="amount" type="text"
                                                class="form-control @error('amount') is-invalid @enderror"
                                                value="{{ old('amount') }}">
                                            <div class="form-control-element__box form-control-element__box--pretify">
                                                <span class="fa fa-dollar"></span></div>
                                        </div>

                                    </div>

                                    <div class="col-12 col-lg-3">
                                        <label class="col-form-label">
                                            Send On<sup>*</sup><br>
                                            @error('schedule_date_transaction')
                                            <small class="alert-danger">{{ $message }}</small>
                                            @enderror

                                        </label>

                                        <div class="form-control-element form-control-element--right">
                                            <input type="text" name="schedule_date_transaction"
                                                class="form-control @error('schedule_date_transaction') is-invalid @enderror"
                                                placeholder="Choose your date..."
                                                value="{{ old('schedule_date_transaction')}}" id="dr-example-single">
                                            <div class="form-control-element__box form-control-element__box--pretify">
                                                <span class="fa fa-calendar"></span></div>
                                        </div>
                                    </div>

                                </div>


                                <fieldset class="form-group">
                                    <div class="form-row">
                                        <div class="col-lg-8 offset-md-2">
                                            <div class="card-inner-container margin-top-30">
                                                <h4>Learn more about your delivery speed types, fees and limits</h4>
                                                <div
                                                    class="form-check mt-4 {{ $errors->has('transfer_type') ? ' has-error' : '' }}">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio"
                                                            name="transfer_type" value="3BT"
                                                            {{ (old('transfer_type') == '3BT') ? 'checked' : '' }}> 3
                                                        business days, $3 fee, ACH Transfer,
                                                        8PM ET
                                                        cutoff time</label>

                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio"
                                                            name="transfer_type" value="NBT"
                                                            {{ (old('transfer_type') == 'NBT') ? 'checked' : '' }}>
                                                        Next
                                                        business day, $10 fee, ACH Transfer,
                                                        8PM
                                                        ET cutoff time</label>

                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio"
                                                            name="transfer_type" value="SWT"
                                                            {{ (old('transfer_type') == 'SWT') ? 'checked' : '' }}>
                                                        Same
                                                        business day, $30 fee, Wire
                                                        Transfer,
                                                        5PM ET cutoff time, mostly often required for real estate
                                                        closings;
                                                        money not recoverable; similar to using a cashier's check to get
                                                        final funds to a recipient.</label>

                                                    @error('transfer_type')
                                                    <small class="alert-danger">{{ $message }}</small>
                                                    @enderror

                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </fieldset>
                                <div class="col-12 col-lg-4 offset-md-4">
                                    <button class="btn btn-block btn-outline-secondary text-center">Approve
                                        Transfer</button>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            <div class="rw-accordion">
                                <div class="rw-accordion__item open mt-4">
                                    <div class="rw-accordion__header">
                                        <h4 class="rw-accordion__title">Scheduled Transfers</h4>
                                    </div>
                                    <div class="rw-accordion__content">
                                        <div class="table-responsive">
                                            <table class="table table-indent-rows margin-bottom-10"
                                                style="min-width: 500px">
                                                <tbody>

                                                    @forelse ($achPayment as $ach)
                                                    {{-- $newstring = substr($dynamicstring, -7); --}}
                                                    <tr>
                                                        <td width="40">
                                                            <div
                                                                class="icon-box icon-box--bordered icon-box--rounded bg-secondary">
                                                                <span class="fa fa-dollar"></span></div>
                                                        </td>
                                                        <td><strong>Confirmation Number</strong><br><span
                                                                class="text-muted">{{$ach->transaction_id}}</span>
                                                        </td>
                                                        <td><strong>Funding Account</strong><br>
                                                            <span
                                                                class="text-muted">******{{substr($ach->sender_account, -4)}}
                                                            </span>
                                                        </td>
                                                        <td><strong>Beneficiary Account</strong><br>
                                                            <span class="text-muted">{{$ach->receiver_account}}
                                                            </span>
                                                        </td>
                                                        <td width="200"><strong>Delivery Type</strong><br>
                                                            @if ($ach->transfer_type == '3BT')
                                                            <span class="text-muted">3 Business days</span>
                                                            @elseif ($ach->transfer_type == 'NBT')
                                                            <span class="text-muted">Next business day</span>
                                                            @else
                                                            <span class="text-muted">Same business day</span>
                                                            @endif
                                                        </td>
                                                        <td width="200"><strong>Scheduled Date</strong><br><span
                                                                class="text-muted">{{(new \Carbon\Carbon($ach->created_at))->diffForHumans()}}</span>
                                                        </td>
                                                        <td width="100"><strong
                                                                class="text-mute">Amount</strong><br><span
                                                                class="text-danger">${{number_format($ach->amount)}}</span>
                                                        </td>

                                                        <td>
                                                            @if ($ach->isVerified ==1)
                                                            <div
                                                                class="btn btn-outline-success btn-block disabled btn-sm">
                                                                Approved</div>
                                                            @elseif ($ach->isVerified ==2)
                                                            <div
                                                                class="btn btn-outline-primary btn-block disabled btn-sm">
                                                                Declined</div>
                                                            @else
                                                            <div
                                                                class="btn btn-outline-danger btn-block disabled btn-sm">
                                                                Pending</div>
                                                            @endif
                                                        </td>
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