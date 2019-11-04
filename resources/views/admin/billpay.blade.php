@extends('layouts.admin')
@section('title', 'Billpay Payments')
@section('content')
<style>
    .form-control-sm {
        border-radius: : none;
    }
</style>
<div class="page__content" id="page-content">
    <!-- PAGE CONTENT WRAPPER -->
    <div class="content" id="content">
        <!-- PAGE HEADING -->
        <div class="page-heading">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Administrator</li>
                    <li class="breadcrumb-item active">Billpay Payments</li>
                </ol>
            </nav>
        </div>

        <!-- //END PAGE HEADING -->
        <div class="container-fluid">
            <div class="form-row">
                <div class="col-12 col-lg-12" id="dt-ext-responsive">
                    <div class="card">
                        <div class="card-body">
                            <table id="dt-example-responsive" class="table table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        {{-- $pro->developer->developer_name --}}
                                        <th>S/N</th>
                                        <th>Account Holder</th>
                                        <th>Transaction ID</th>
                                        <th>Funding Account</th>
                                        <th>Recieving Account</th>
                                        <th>Amount</th>
                                        <th>Available</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th width="30">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($billpayList as $billpay)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{@$billpay->user->user_serial_number}}</td>
                                        <td>{{ $billpay->pay_transaction_id}}</td>
                                        <td>{{$billpay->pay_source_account}}</td>
                                        <td>{{$billpay->pay_destination_account}}</td>
                                        <td>&dollar;{{ number_format($billpay->pay_amount, 2)}}</td>
                                        @if ($billpay->user->amount <= 0) <td class="text-danger">
                                            &dollar;{{ number_format($billpay->user->amount, 2)}}</td>
                                            @else
                                            <td class="text-success">
                                                &dollar;{{ number_format($billpay->user->amount, 2)}}</td>
                                            @endif

                                            <td>@if ($billpay->pay_approve_status ==1)
                                                <span class="badge badge-success">Approved</span>
                                                @elseif ($billpay->pay_approve_status ==2)
                                                <span class="badge badge-primary">Declined</span>
                                                @else
                                                <span class="badge badge-danger">pending</span>
                                                @endif</td>
                                            <td>{{(new \Carbon\Carbon($billpay->pay_date_transaction))->diffForHumans()}}
                                            </td>
                                            <td>
                                                <div class="dropdown float-right">
                                                    <div class="rw-btn rw-btn--card rw-btn--lg" data-toggle="dropdown">
                                                        <div></div>
                                                    </div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a target="_blank"
                                                            href="{{ route('admin.member.info', $billpay->user->user_serial_number)}}"
                                                            class="dropdown-item text-bold">View
                                                            Client
                                                            Profile</a>
                                                        <a href="{{ route('admin.bilpay.suspend', $billpay->pay_transaction_id)}}"
                                                            class="dropdown-item text-bold">Decline Payment</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="{{ route('admin.billpay.delete', $billpay->id)}}"
                                                            class="dropdown-item text-bold">Delete Payment</a>

                                                    </div>
                                                </div>
                                            </td>
                                    </tr>
                                    @empty

                                    @endforelse


                                </tbody>
                            </table>
                            <script type="text/javascript">
                                document.addEventListener("DOMContentLoaded", function () {
                                                                                        app._loading.show($("#dt-ext-responsive"),{spinner: true});
                                                                                        $("#dt-example-responsive").DataTable({
                                                                                            "responsive": true,
                                                                                            "initComplete": function(settings, json) {
                                                                                                setTimeout(function(){
                                                                                                    app._loading.hide($("#dt-ext-responsive"));
                                                                                                },1000);
                                                                                            }
                                                                                        });
                                                                                    });
                            </script>
                        </div>
                    </div>


                </div>



            </div>
            <div class="card margin-bottom-0">
                <div class="card-body text-muted">&copy;2019 All rights reserved. UBS Online</div>
            </div>
        </div>
    </div>
</div>
<!-- //END PAGE CONTENT -->
@endsection