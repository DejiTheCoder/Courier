@extends('layouts.admin')
@section('title', 'Registered Clients')
@section('content')
<!-- PAGE CONTENT WRAPPER -->
<div class="page__content" id="page-content">
    <!-- PAGE CONTENT CONTAINER -->
    <div class="content" id="content">
        <!-- PAGE HEADING -->
        <div class="page-heading">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                    <li class="breadcrumb-item active">Administrator</li>
                    <li class="breadcrumb-item active">Registered Members</li>
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
                                        <th width="20">User S/N</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Email Address</th>
                                        <th>Phone Number</th>
                                        <th>Country</th>
                                        <th width="110">Date Created</th>
                                        <th width="110">Status</th>
                                        <th width="40"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($userList as $users)
                                    <tr>
                                        <td>{{$users->user_serial_number}}</td>
                                        <td>{{$users->first_name}}</td>
                                        <td>{{$users->middle_name}}</td>
                                        <td>{{$users->last_name}}</td>
                                        <td>{{$users->email}}</td>
                                        <td>{{$users->mobile_number}}</td>
                                        <td>{{$users->country}}</td>
                                        <td>{{(new \Carbon\Carbon($users->created_at))->diffForHumans()}}</td>
                                        <td>
                                            @if ($users->isVerified ==1)
                                            <span class="badge badge-success">Approved</span>
                                            @elseif ($users->isVerified ==2)
                                            <span class="badge badge-primary">Suspended</span>
                                            @else
                                            <span class="badge badge-danger">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown float-right">
                                                <div class="rw-btn rw-btn--card rw-btn--lg" data-toggle="dropdown">
                                                    <div></div>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a target="_blank"
                                                        href="{{ route('admin.member.info', $users->user_serial_number)}}"
                                                        class="dropdown-item text-bold">View
                                                        Account Info</a>
                                                    <a href="{{ route('admin.client.approved', $users->user_serial_number)}}"
                                                        class="dropdown-item text-bold">Approve
                                                        Account</a>
                                                    <a href="{{ route('admin.client.suspend', $users->user_serial_number)}}"
                                                        class="dropdown-item text-bold">Suspend Account</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="{{ route('admin.client.delete', $users->id)}}"
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
    <!-- //END PAGE CONTENT CONTAINER -->
</div>
<!-- //END PAGE CONTENT -->
@endsection