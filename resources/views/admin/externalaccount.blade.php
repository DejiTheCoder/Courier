@extends('layouts.admin')
@section('title', 'Registered External Accounts')
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
                    <li class="breadcrumb-item active">External Accounts</li>
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
                                        <th>Bank Name</th>
                                        <th>Account Nickname </th>
                                        <th>Account Type</th>
                                        <th>Account Number</th>
                                        <th>Routing Number</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th width="30">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($azaList as $aza)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{@$aza->user->user_serial_number}}</td>
                                        <td>{{$aza->bank_name}}</td>
                                        <td>{{$aza->bank_nickname}}</td>
                                        <td>{{$aza->bank_account_type}}</td>
                                        <td>{{$aza->bank_account_number}}</td>
                                        <td>{{$aza->bank_routing_number}}</td>
                                        <td>@if ($aza->isVerified ==1)
                                            <span class="badge badge-success">Approved</span>
                                            @else
                                            <span class="badge badge-danger">pending</span>
                                            @endif</td>
                                        <td>{{(new \Carbon\Carbon($aza->created_at))->diffForHumans()}}
                                        </td>
                                        <td>
                                            <div class="dropdown float-right">
                                                <div class="rw-btn rw-btn--card rw-btn--lg" data-toggle="dropdown">
                                                    <div></div>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="{{ route('admin.account.approved', $aza->bank_account_number)}}"
                                                        class="dropdown-item text-bold">Approve Account</a>
                                                    <a href="{{ route('admin.account.suspend', $aza->bank_account_number)}}"
                                                        class="dropdown-item text-bold">Reject Account</a>
                                                    <a href="{{ route('admin.external.delete', $aza->id)}}"
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