@extends('layouts.admin')
@section('title', 'Message Logs')
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
                    <li class="breadcrumb-item active">Message Logs</li>
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
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Subject</th>
                                        <th>Complaints</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th width="30">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($messageList as $logs)
                                    <tr>
                                        <td>{{@$loop->iteration}}</td>
                                        <td>{{ $logs->client_name}}</td>
                                        <td>{{ $logs->department}}</td>
                                        <td>{{ $logs->subject}}</td>
                                        <td> @if ($logs->isRead ==1)
                                            <span class="badge badge-danger">Closed</span>
                                            @else
                                            <span class="badge badge-success">Open</span>
                                            @endif</td>
                                        <td>{{ $logs->client_complaints}}</td>
                                        <td>{{(new \Carbon\Carbon($logs->created_at))->diffForHumans()}}</td>
                                        <td>
                                            <div class="dropdown float-right">
                                                <div class="rw-btn rw-btn--card rw-btn--lg" data-toggle="dropdown">
                                                    <div></div>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="{{ route('admin.mark.read', $logs->id)}}"
                                                        class="dropdown-item text-bold">Mark Read</a>
                                                    <a href="{{ route('admin.mark.unread', $logs->id)}}"
                                                        class="dropdown-item text-bold">Mark Unread</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="{{ route('admin.msg.delete', $logs->id)}}"
                                                        class="dropdown-item text-bold">Delete Message</a>
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