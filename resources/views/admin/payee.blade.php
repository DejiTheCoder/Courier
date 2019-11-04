@extends('layouts.admin')
@section('title', 'Payee Accounts')
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
                    <li class="breadcrumb-item active">Registered Payee Accounts</li>
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
                                        <th>Payee Account Name</th>
                                        <th>Payee Nickname</th>
                                        <th>Payee Address</th>
                                        <th>Payee Account Number</th>
                                        <th>Pay Account Phone</th>
                                        <th>Date</th>
                                        <th width="30">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($payeeList as $payee)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{@$payee->user->user_serial_number}}</td>
                                        <td>{{ $payee->pay_account_name}}</td>
                                        <td>{{$payee->pay_nickname}}</td>
                                        <td>{{$payee->pay_account_address}}</td>
                                        <td>{{ $payee->pay_account_number}}</td>
                                        <td>{{ $payee->pay_account_phone}}</td>
                                        <td>{{(new \Carbon\Carbon($payee->created_at))->diffForHumans()}}</td>
                                        <td>
                                            <div class="dropdown float-right">
                                                <div class="rw-btn rw-btn--card rw-btn--lg" data-toggle="dropdown">
                                                    <div></div>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="{{ route('admin.payee.delete', $payee->id)}}"
                                                        class="dropdown-item text-bold">Delete Account</a>
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