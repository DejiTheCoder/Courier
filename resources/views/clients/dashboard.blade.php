@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<!-- PAGE CONTENT WRAPPER -->
<div class="page__content page-aside--hidden" id="page-content">
    <!-- PAGE CONTENT CONTAINER -->
    <div class="content" id="content">
        <!-- PAGE HEADING -->
        <div class="page-heading">
            <div class="page-heading__container">
                <h1 class="title">Welcome, {{ Auth::user()->first_name }}</h1>
                <p class="caption">Your personal online banking account</p>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('client.dashboard')}}">Banking</a></li>
                    <li class="breadcrumb-item active">{{ Auth::user()->account_type }}</li>
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
                                <h1 class="title">Account Summary</h1>
                                <p class="caption">21/03/2018 - 29/03/2018</p>
                            </div>
                        </div>
                        <div class="card-body padding-top-15 padding-bottom-5">
                            <div class="table-responsive">
                                <table class="table table-indent-rows margin-bottom-10" style="min-width: 500px">
                                    <tbody>
                                        <tr>
                                            <td width="40">
                                                <div class="icon-box icon-box--lg"><span class="fa fa-bank"></span>
                                                </div>
                                            </td>

                                            <td><strong>{{ Auth::user()->account_type }} </strong><br>
                                                <strong
                                                    class="text-muted">******{{ substr(Auth::user()->account_number, 6) }}</strong>
                                            </td>

                                            <td><strong>Current Balance </strong><br>
                                                <strong
                                                    class="text-muted">&dollar;{{ number_format(Auth::user()->amount, 2) }}</strong>
                                            </td>

                                            <td><strong>Avalable Balance</strong><br>
                                                <strong
                                                    class="text-muted">&dollar;{{ number_format(Auth::user()->amount, 2) }}</strong>
                                            </td>

                                            <td width="50"><button class="btn btn-light btn-icon btn-sm"><span
                                                        class="fa fa-angle-double-right"></span></button></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="page-heading">
                            <div class="page-heading__container">
                                <h1 class="title">Recent activity</h1>
                                {{-- <p class="caption">21/03/2018 - 29/03/2018</p> --}}
                            </div>
                            <div class="page-heading__container float-right d-none d-md-block">
                                <div class="input-group margin-bottom-0">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-credit-card"></i></div>
                                    </div>
                                    <select class="custom-select">
                                        <option>******{{ substr(Auth::user()->account_number, 6) }}</option>
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
                                            @if ($trans->transaction_type == 'Credit')
                                            <td width="40">
                                                <div class="icon-box icon-box--bordered icon-box--rounded bg-success">
                                                    <span class="fa fa-exchange"></span></div>
                                            </td>
                                            @else
                                            <td width="40">
                                                <div class="icon-box icon-box--bordered icon-box--rounded bg-danger">
                                                    <span class="fa fa-exchange"></span></div>
                                            </td>
                                            @endif
                                            <td><strong class="text-muted">UBT/{{ $trans->transaction_id}}</strong></td>
                                            <td><strong class="text-muted">{{ $trans->transaction_type}}</strong></td>
                                            <td><strong class="text-muted">{{ $trans->comment}}</strong></td>

                                            <td width="200"><strong
                                                    class="text-muted">{{ $trans->transaction_date}}</strong></td>

                                            @if ($trans->transaction_type == 'Credit')
                                            <td width="100"><strong
                                                    class="text-success">&dollar;{{ number_format($trans->amount, 2)}}</strong>
                                            </td>

                                            @else
                                            <td width="100"><strong
                                                    class="text-danger">-&dollar;{{ number_format($trans->amount, 2)}}</strong>
                                            </td>
                                            @endif

                                            <td width="100"><strong
                                                    class="text-muted">&dollar;{{ number_format($trans->balance, 2)}}
                                                </strong>
                                            </td>
                                        </tr>

                                        @empty

                                        @endforelse
                                        {{-- <tr>
                                            <td width="40">
                                                <div class="icon-box icon-box--bordered icon-box--rounded bg-secondary">
                                                    <span class="fa fa-money"></span></div>
                                            </td>
                                            <td><strong>UBT-001-0738292</strong><br><span class="text-muted">Debit
                                                    Transaction</span></td>
                                            <td><strong>Pizza Best Pizza</strong><br><span class="text-muted">Street
                                                    name, 234 New York</span></td>
                                            <td width="200"><strong>25 March 2018</strong><br><span
                                                    class="text-muted">12:23:15 GMT</span></td>
                                            <td width="100"><strong class="text-danger">-$14.55</strong><br><span
                                                    class="text-muted">$1,959.22</span></td>
                                        </tr>

                                        <tr>
                                            <td width="40">
                                                <div class="icon-box icon-box--bordered icon-box--rounded bg-secondary">
                                                    <span class="fa fa-glass"></span></div>
                                            </td>
                                            <td><strong>UBT-001-0738292</strong><br><span class="text-muted">Debit
                                                    Transaction</span></td>
                                            <td><strong>Pizza Best Pizza</strong><br><span class="text-muted">Street
                                                    name, 234 New York</span></td>
                                            <td width="200"><strong>25 March 2018</strong><br><span
                                                    class="text-muted">12:23:15 GMT</span></td>
                                            <td width="100"><strong class="text-danger">-$14.55</strong><br><span
                                                    class="text-muted">$1,959.22</span></td>
                                        </tr>



                                        <tr>
                                            <td width="40">
                                                <div class="icon-box icon-box--bordered icon-box--rounded bg-secondary">
                                                    <span class="fa fa-shopping-basket"></span></div>
                                            </td>
                                            <td><strong>Products in ShopNmae</strong><br><span class="text-muted">Street
                                                    name, 234 New York</span></td>
                                            <td><strong>25 March 2018</strong><br><span class="text-muted">12:23:15
                                                    GMT</span></td>
                                            <td><strong class="text-danger">-$32.21</strong><br><span
                                                    class="text-muted">$2,054.99</span></td>
                                        </tr>
                                        <tr>
                                            <td width="40">
                                                <div class="icon-box icon-box--bordered icon-box--rounded bg-success">
                                                    <span class="fa fa-university"></span></div>
                                            </td>
                                            <td><strong>Income</strong><br><span class="text-muted">5523 **** ****
                                                    **23</span></td>
                                            <td><strong>25 March 2018</strong><br><span class="text-muted">12:23:15
                                                    GMT</span></td>
                                            <td><strong class="text-success">+$1000.00</strong><br><span
                                                    class="text-muted">$2,185.75</span></td>
                                        </tr>
                                        <tr>
                                            <td width="40">
                                                <div class="icon-box icon-box--bordered icon-box--rounded bg-secondary">
                                                    <span class="fa fa-shopping-bag"></span></div>
                                            </td>
                                            <td><strong>Online store purchase</strong><br><span
                                                    class="text-muted">http://domain.com/store/</span></td>
                                            <td><strong>25 March 2018</strong><br><span class="text-muted">12:23:15
                                                    GMT</span></td>
                                            <td><strong class="text-danger">-$520.00</strong><br><span
                                                    class="text-muted">$1,185.75</span></td>
                                        </tr>
                                        <tr>
                                            <td width="40">
                                                <div class="icon-box icon-box--bordered icon-box--rounded bg-danger">
                                                    <span class="fa fa-exchange"></span></div>
                                            </td>
                                            <td><strong>Transfer</strong><br><span class="text-muted">To your card
                                                    **21</span></td>
                                            <td><strong>25 March 2018</strong><br><span class="text-muted">12:23:15
                                                    GMT</span></td>
                                            <td><strong class="text-danger">-$100.00</strong><br><span
                                                    class="text-muted">$1,285.75</span></td>
                                        </tr>
                                        <tr>
                                            <td width="40">
                                                <div class="icon-box icon-box--bordered icon-box--rounded bg-danger">
                                                    <span class="fa fa-exchange"></span></div>
                                            </td>
                                            <td><strong>Transfer</strong><br><span class="text-muted">To your card
                                                    **21</span></td>
                                            <td><strong>25 March 2018</strong><br><span class="text-muted">12:23:15
                                                    GMT</span></td>
                                            <td><strong class="text-danger">-$100.00</strong><br><span
                                                    class="text-muted">$1,285.75</span></td>
                                        </tr>
                                        <tr>
                                            <td width="40">
                                                <div class="icon-box icon-box--bordered icon-box--rounded bg-danger">
                                                    <span class="fa fa-exchange"></span></div>
                                            </td>
                                            <td><strong>Transfer</strong><br><span class="text-muted">To your card
                                                    **21</span></td>
                                            <td><strong>25 March 2018</strong><br><span class="text-muted">12:23:15
                                                    GMT</span></td>
                                            <td><strong class="text-danger">-$100.00</strong><br><span
                                                    class="text-muted">$1,285.75</span></td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-12 text-right"><a href="{{ route('search.history')}}"
                                        class="btn btn-secondary text-white">View
                                        transactions history</a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="page-heading">
                            <div class="page-heading__container">
                                <h1 class="title">Registered External Accounts</h1>
                            </div>
                            <div class="page-heading__container float-right"><button class="btn btn-light btn-icon">
                                    <span class="fa fa-university"></span></button></div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-indent-rows margin-bottom-10">
                                    <tbody>
                                        @forelse ($externalAza as $aza)
                                        <tr>
                                            <td width="40">
                                                <div class="icon-box icon-box--bordered text-danger"><span
                                                        class="fa fa-university"></span></div>
                                            </td>
                                            <td><strong>{{$aza->bank_name}} - {{$aza->bank_nickname}}</strong><br>
                                                {{$aza->bank_account_type}} </td>
                                            <td width="100">
                                                <strong>{{(new \Carbon\Carbon($aza->created_at))->diffForHumans()}}</strong>
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
        <!-- //END PAGE CONTENT CONTAINER -->
    </div>
    <!-- //END PAGE CONTENT -->
</div>
<!-- //END PAGE WRAPPER -->
@endsection