@extends('layouts.admin')
@section('title', 'ACH Transfer')
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
                    <li class="breadcrumb-item active">ACH Transfer</li>
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
                                        <th>S/N</th>
                                        <th>Account Holder</th>
                                        <th>Transaction ID</th>
                                        <th>Transfer Type</th>
                                        <th>Funding Account</th>
                                        <th>Recieving Account</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th width="30">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($achList as $ach)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{@$ach->user->user_serial_number}}</td>
                                        <td>{{ $ach->transaction_id}}</td>
                                        <td>@if ($ach->transfer_type == '3BT')
                                            <span class="text-muted text-success">3 Business days</span>
                                            @elseif ($ach->transfer_type == 'NBT')
                                            <span class="text-muted text-success">Next business day</span>
                                            @else
                                            <span class="text-muted text-success">Same business day</span>
                                            @endif</td>
                                        <td>{{$ach->sender_account}}</td>
                                        <td>{{$ach->receiver_account}}</td>
                                        <td>&dollar;{{ number_format($ach->amount, 2)}}</td>
                                        <td>@if ($ach->isVerified ==1)
                                            <span class="badge badge-success">Approved</span>
                                            @elseif ($ach->isVerified ==2)
                                            <span class="badge badge-primary">Declined</span>
                                            @else
                                            <span class="badge badge-danger">pending</span>
                                            @endif</td>
                                        <td>{{(new \Carbon\Carbon($ach->schedule_date_transaction))->diffForHumans()}}
                                        </td>
                                        <td>
                                            <div class="dropdown float-right">
                                                <div class="rw-btn rw-btn--card rw-btn--lg" data-toggle="dropdown">
                                                    <div></div>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a target="_blank"
                                                        href="{{ route('admin.member.info', $ach->user->user_serial_number)}}"
                                                        class="dropdown-item text-bold">View
                                                        Client
                                                        Profile</a>
                                                    <a href="{{ route('admin.ach.suspend', $ach->transaction_id)}}"
                                                        class="dropdown-item text-bold">Decline Payment</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="{{ route('admin.ach.delete', $ach->id)}}"
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