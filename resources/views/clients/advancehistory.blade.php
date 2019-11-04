@extends('layouts.app')
@section('title', 'Advance Search')
@section('content')
<!-- PAGE CONTENT WRAPPER -->
<div class="page__content page-aside--hidden" id="page-content">
    <!-- PAGE CONTENT CONTAINER -->
    <div class="content" id="content">
        <!-- PAGE HEADING -->
        <div class="page-heading">
            <div class="page-heading__container">
                <h1 class="title">Welcome, {{ Auth::user()->first_name }}</h1>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('client.dashboard')}}">Dashboard</a></li>
                    {{-- <li class="breadcrumb-item">{{ Auth::user()->account_type }}</li> --}}
                    <li class="breadcrumb-item active">Transaction History</li>

                </ol>
            </nav>
        </div>
        <!-- //END PAGE HEADING -->
        <div class="container-fluid">
            <div class="row">

                <div class="col-12 col-lg-8">

                    <div class="card">
                        <div class="page-heading">
                            <div class="page-heading__container">
                                <h1 class="title">Transaction Activity</h1>
                            </div>
                            <div class="page-heading__container float-right d-none d-md-block">
                                <div class="input-group margin-bottom-0">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-university"></i></div>
                                    </div>
                                    <select class="custom-select">
                                        <option> {{ Auth::user()->account_type }} &dash;
                                            ******{{ substr(Auth::user()->account_number, 6) }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body padding-top-15 padding-bottom-15">
                            <div class="table-responsive">
                                <table class="table table-indent-rows margin-bottom-10" style="min-width: 500px">
                                    <tbody>
                                        @forelse ($transaction as $trans)
                                        <tr>
                                            @if ($trans->transaction_type == 'credit')
                                            <td width="40">
                                                <div class="icon-box icon-box--bordered icon-box--rounded bg-success">
                                                    <span class="fa fa-dollar"></span></div>
                                            </td>
                                            @else
                                            <td width="40">
                                                <div class="icon-box icon-box--bordered icon-box--rounded bg-danger">
                                                    <span class="fa fa-exchange"></span></div>
                                            </td>
                                            @endif
                                            <td><span class="text-muted">UBT/{{ $trans->transaction_id}}</span></td>
                                            <td><span class="text-muted">{{ $trans->transaction_type}}</span></td>
                                            <td><span class="text-muted">{{ $trans->comment}}</span></td>

                                            <td width="200"><span
                                                    class="text-muted">{{ $trans->transaction_date}}</span></td>

                                            @if ($trans->transaction_type == 'credit')
                                            <td width="100"><strong
                                                    class="text-success">&dollar;{{ number_format($trans->amount, 2)}}</strong>
                                            </td>

                                            @else
                                            <td width="100"><strong
                                                    class="text-danger">-&dollar;{{ number_format($trans->amount, 2)}}</strong>
                                            </td>
                                            @endif

                                            <td width="100"><span
                                                    class="text-muted">{{ number_format($trans->balance, 2)}}</span>
                                            </td>
                                        </tr>

                                        @empty

                                        @endforelse

                                    </tbody>
                                </table>
                            </div>

                        </div>


                    </div>
                    <div class="col-12 col-lg-12">
                        <nav role="navigation">
                            {{ $transaction->links('pagination.paginate') }}
                        </nav>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="page-heading">
                            <div class="page-heading__container">
                                <h1 class="title">Search Transaction</h1>
                            </div>
                            <div class="page-heading__container float-right invert">
                                <button class="btn btn-light btn-icon">
                                    <span class="fa fa-exchange"></span>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('search.submit')}}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Account</label>
                                            @error('account_type')
                                            <small class="alert-danger">{{ $message }}</small>
                                            @enderror
                                            <select class="custom-select @error('account_type') is-invalid @enderror"
                                                name="account_type">
                                                <option value=""> &dash; Selected prefered account &dash;
                                                </option>
                                                <option value="{{ Auth::user()->account_number }}">
                                                    {{ Auth::user()->account_type }} &dash;
                                                    ******{{ substr(Auth::user()->account_number, 6) }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Date From</label>
                                            @error('transaction_start_date')
                                            <small class="alert-danger">{{ $message }}</small>
                                            @enderror
                                            <div class="form-control-element form-control-element--right">
                                                <input type="text" name="transaction_start_date"
                                                    class="form-control @error('transaction_start_date') is-invalid @enderror"
                                                    placeholder="Choose your date..." value="" id="dr-example-single">
                                                <div
                                                    class="form-control-element__box form-control-element__box--pretify">
                                                    <span class="fa fa-calendar"></span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Date To</label>
                                            @error('transaction_end_date')
                                            <small class="alert-danger">{{ $message }}</small>
                                            @enderror
                                            <div class="form-control-element form-control-element--right">
                                                <input type="text" name="transaction_end_date"
                                                    class="form-control @error('transaction_end_date') is-invalid @enderror"
                                                    placeholder="Choose your date..." value="" id="dr-example-single2">
                                                <div
                                                    class="form-control-element__box form-control-element__box--pretify">
                                                    <span class="fa fa-calendar"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="form-group"><label>&nbsp;</label><button
                                                class="btn btn-secondary btn-block">Advance Search</button></div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>



                </div>
            </div>
        </div>
        <!-- //END PAGE CONTENT CONTAINER -->
    </div>
    <!-- //END PAGE CONTENT -->
</div>
<!-- //END PAGE WRAPPER -->
@endsection