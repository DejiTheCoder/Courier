@extends('layouts.app') @section('title', 'External Accounts') @section('content')
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
                    <li class="breadcrumb-item active">External Accounts</li>
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
                                    <div class="widget__title">External Accounts</div>
                                    <div class="widget__subtitle"> It's easy to move funds between your checking and
                                        savings accounts.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">


                            <div class="rw-accordion">
                                <div class="rw-accordion__item open">
                                    <div class="rw-accordion__content">

                                        <form action="{{ route('external.dashboard.submit')}}" method="post">
                                            @csrf
                                            <div class="form-group row">


                                                <div class="col-md-3">
                                                    <label class="col-sm-12 col-form-label">
                                                        Account Type<sup>*</sup><br>
                                                        @error('bank_account_type')
                                                        <small class="alert-danger">{{ $message }}</small>
                                                        @enderror

                                                    </label>

                                                    <div class="col-sm-12 col-offset-2">
                                                        <select name="bank_account_type"
                                                            class="custom-select @error('bank_account_type') is-invalid @enderror">
                                                            <option value=""> &dash; Selected prefered option &dash;
                                                            </option>
                                                            <option value="Checking">Checking</option>
                                                            <option value="Savings">Savings</option>
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="col-sm-12 col-form-label">
                                                        Bank Name<sup>*</sup><br>
                                                        @error('bank_name')
                                                        <small class="alert-danger">{{ $message }}</small>
                                                        @enderror

                                                    </label>

                                                    <div class="col-sm-12 col-offset-2">
                                                        <input name="bank_name" type="text"
                                                            class="form-control @error('bank_name') is-invalid @enderror"
                                                            value="{{ old('bank_name') }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="col-sm-12 col-form-label">
                                                        Nickname<br>
                                                        @error('bank_nickname')
                                                        <small class="alert-danger">{{ $message }}</small>
                                                        @enderror

                                                    </label>

                                                    <div class="col-sm-12 col-offset-2">
                                                        <input name="bank_nickname" type="text"
                                                            class="form-control @error('bank_nickname') is-invalid @enderror"
                                                            value="{{ old('bank_nickname') }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="col-sm-12 col-form-label">
                                                        Account Number<sup>*</sup><br>
                                                        @error('bank_account_number')
                                                        <small class="alert-danger">{{ $message }}</small>
                                                        @enderror

                                                    </label>

                                                    <div class="col-sm-12 col-offset-2">
                                                        <input name="bank_account_number" type="text"
                                                            class="form-control @error('bank_account_number') is-invalid @enderror"
                                                            value="{{ old('bank_account_number') }}">
                                                    </div>
                                                </div>


                                                <div class="col-md-3">
                                                    <label class="col-sm-12 col-form-label">
                                                        Routing Number<sup>*</sup><br>
                                                        @error('bank_routing_number')
                                                        <small class="alert-danger">{{ $message }}</small>
                                                        @enderror

                                                    </label>

                                                    <div class="col-sm-12 col-offset-2">
                                                        <input name="bank_routing_number" type="text"
                                                            class="form-control @error('bank_routing_number') is-invalid @enderror"
                                                            value="{{ old('bank_routing_number') }}">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-12 col-lg-4 offset-md-4">
                                                <button class="btn btn-block btn-outline-secondary text-center">Add
                                                    External Account</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                                <div class="rw-accordion__item open mt-4">
                                    <div class="rw-accordion__header">
                                        <h4 class="rw-accordion__title">Enroled External Accounts</h4>
                                    </div>
                                    <div class="rw-accordion__content">
                                        <div class="table-responsive">
                                            <table class="table table-indent-rows margin-bottom-10"
                                                style="min-width: 500px">
                                                <tbody>
                                                    @forelse ($externalAza as $aza)
                                                    <tr>
                                                        <td width="40">
                                                            <div
                                                                class="icon-box icon-box--bordered icon-box--rounded bg-secondary">
                                                                <span class="fa fa-bank"></span></div>
                                                        </td>
                                                        <td><strong>Bank Name</strong><br>
                                                            <span class="text-muted">{{$aza->bank_name}}</span>
                                                        </td>
                                                        <td><strong>Account Nickname</strong><br>
                                                            <span class="text-muted">{{$aza->bank_nickname}}</span>
                                                        </td>
                                                        <td width="200"><strong>Account Type</strong><br><span
                                                                class="text-muted">{{$aza->bank_account_type}}</span>
                                                        </td>
                                                        <td width="200"><strong>Account Number</strong><br><span
                                                                class="text-muted">******{{substr($aza->bank_account_number, -4)}}</span>
                                                        </td>
                                                        <td width="200"><strong>Registered Date</strong><br><span
                                                                class="text-muted">{{(new \Carbon\Carbon($aza->created_at))->diffForHumans()}}</span>
                                                        </td>
                                                        <td>
                                                            @if ($aza->isVerified ==1)
                                                            <div
                                                                class="btn btn-outline-success btn-block disabled btn-sm">
                                                                Approved</div>
                                                            @else
                                                            <div
                                                                class="btn btn-outline-danger btn-block disabled btn-sm">
                                                                Pending</div>
                                                            @endif
                                                        </td>

                                                        <td>
                                                            {{-- <button class="btn btn-secondary btn-sm btn-icon"><span
                                                                    class="fa fa-external-link"></span></button> --}}
                                                            <a href="{{ route('client.external.delete', $aza->id)}}"
                                                                class="btn btn-danger btn-sm btn-icon"><span
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
    </div>
    <!-- //END PAGE CONTENT CONTAINER -->
</div>

@endsection