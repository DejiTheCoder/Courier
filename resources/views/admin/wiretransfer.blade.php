@extends('layouts.admin')
@section('title', 'Wire Transfer')
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
                    <li class="breadcrumb-item active">International / Wire Transfer</li>
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
                                        <th>Beneficiary Name</th>
                                        <th>Beneficiary Bank</th>
                                        <th>Beneficiary AN</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th width="30">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($wireList as $wire)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{@$wire->user->user_serial_number}}</td>
                                        <td>{{ $wire->transaction_id}}</td>
                                        <td>{{ $wire->beneficiary_name}}</td>
                                        <td>{{$wire->beneficiary_bank}}</td>
                                        <td>{{$wire->beneficiary_account_number}}</td>
                                        <td>&dollar;{{ number_format($wire->pay_amount)}}</td>
                                        <td>@if ($wire->isVerified ==1)
                                            <span class="badge badge-success">Approved</span>
                                            @elseif ($wire->isVerified ==2)
                                            <span class="badge badge-primary">Declined</span>
                                            @else
                                            <span class="badge badge-danger">pending</span>
                                            @endif</td>
                                        <td>{{(new \Carbon\Carbon($wire->created_at))->diffForHumans()}}
                                        </td>
                                        <td>
                                            <div class="dropdown float-right">
                                                <div class="rw-btn rw-btn--card rw-btn--lg" data-toggle="dropdown">
                                                    <div></div>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a target="_blank"
                                                        href="{{ route('admin.member.info', $wire->user->user_serial_number)}}"
                                                        class="dropdown-item text-bold">View
                                                        Client
                                                        Profile</a>
                                                    <a href="{{ route('admin.wire.suspend', $wire->transaction_id)}}"
                                                        class="dropdown-item text-bold">Decline Payment</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="{{ route('admin.wire.delete', $wire->id)}}"
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