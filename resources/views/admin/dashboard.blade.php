@extends('layouts.admin')
@section('title', 'Administrator Dashboard')
@section('content')
<!-- PAGE CONTENT WRAPPER -->
<div class="page__content" id="page-content">
    <!-- PAGE CONTENT CONTAINER -->
    <div class="content" id="content">
        <!-- PAGE HEADING -->
        <div class="page-heading">
            <div class="page-heading__container">
                <h1 class="title">Welcome, Administrator</h1>
                <p class="caption">Your administrator online banking Dashboard</p>
            </div>
        </div>
        <!-- //END PAGE HEADING -->
        <div class="container-fluid">
            <div class="form-row">
                <div class="col-12 col-lg-12">
                    <div class="form-row">
                        <div class="col-12 col-lg-3 margin-bottom-20">
                            <div class="widget invert">
                                <div class="widget__icon_layer widget__icon_layer--right"><span
                                        class="li-shield-check"></span></div>
                                <div class="widget__container">
                                    <div class="widget__line">
                                        <div class="widget__icon"><span class="li-shield-check"></span></div>
                                        <div class="widget__title">Registered Members</div>
                                        <div class="widget__subtitle">Active / None Active</div>
                                    </div>
                                    <div class="widget__box widget__box--left">
                                        <div class="widget__informer">{{ $userCount}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 margin-bottom-20">
                            <div class="widget invert">
                                <div class="widget__icon_layer widget__icon_layer--right"><span class="li-tab"></span>
                                </div>
                                <div class="widget__container">
                                    <div class="widget__line">
                                        <div class="widget__icon"><span class="li-tab"></span></div>
                                        <div class="widget__title">Registered Transfers</div>
                                        <div class="widget__subtitle">Approved / Non Approved</div>
                                    </div>
                                    <div class="widget__box widget__box--left">
                                        <div class="widget__informer">{{ $transferCount}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 margin-bottom-20">
                            <div class="widget invert">
                                <div class="widget__icon_layer widget__icon_layer--right"><span
                                        class="li-cash-dollar"></span></div>
                                <div class="widget__container">
                                    <div class="widget__line">
                                        <div class="widget__icon"><span class="li-cash-dollar"></span></div>
                                        <div class="widget__title">Total External Accounts</div>
                                        <div class="widget__subtitle">Verified / Not Verified</div>
                                    </div>
                                    <div class="widget__box widget__box--left">
                                        <div class="widget__informer">{{ $payeeCount}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 margin-bottom-20">
                            <div class="widget invert">
                                <div class="widget__icon_layer widget__icon_layer--right"><span
                                        class="li-cash-dollar"></span></div>
                                <div class="widget__container">
                                    <div class="widget__line">
                                        <div class="widget__icon"><span class="li-cash-dollar"></span></div>
                                        <div class="widget__title">Total Registered Payee</div>
                                        <div class="widget__subtitle">Verified / Not Verified</div>
                                    </div>
                                    <div class="widget__box widget__box--left">
                                        <div class="widget__informer">{{ $azaCount}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="widget invert widget--items-middle">
                            <div class="widget__icon_layer widget__icon_layer--right"><span
                                    class="li-shield-check"></span></div>
                            <div class="widget__container">
                                <div class="widget__line">
                                    <div class="widget__icon"><span class="li-shield-check"></span></div>
                                    <div class="widget__title">Registered Members</div>
                                    <div class="widget__subtitle">Active / None Active</div>
                                </div>
                                <div class="widget__box">
                                    <button class="btn btn-outline-secondary btn-sm">View More</button></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-indent-rows margin-bottom-0">
                                    <thead>
                                        <tr>
                                            <th width="20">S/N</th>
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
                                            <td>{{$loop->iteration}}</td>
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
                                                @else
                                                <span class="badge badge-danger">pending</span>
                                                @endif
                                            </td>
                                            <td><a target="_blank"
                                                    href="{{ route('admin.member.info', $users->user_serial_number)}}"
                                                    class="btn btn-secondary btn-sm btn-icon">
                                                    <span class="text-white fa fa-external-link"></span>
                                                </a></td>
                                        </tr>
                                        @empty

                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    {{-- <div class="card">
                        <div class="widget invert widget--items-middle">
                            <div class="widget__icon_layer widget__icon_layer--right"><span class="li-tab"></span></div>
                            <div class="widget__container">
                                <div class="widget__line">
                                    <div class="widget__icon"><span class="li-tab"></span></div>
                                    <div class="widget__title">Registered Transfers</div>
                                    <div class="widget__subtitle">Approved / Non Approved</div>
                                </div>
                                <div class="widget__box">
                                    <button class="btn btn-outline-secondary btn-sm">View More</button></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-indent-rows margin-bottom-0">
                                    <thead>
                                        <tr>
                                            <th width="20">S/N</th>
                                            <th width="110">Date</th>
                                            <th>Transaction ID</th>
                                            <th>Beneficiary Bank</th>
                                            <th>Amount</th>
                                            <th width="120">IP</th>
                                            <th width="110">Status</th>
                                            <th width="40"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>12/02/2018</td>
                                            <td>Balogun Abiodun</td>
                                            <td>balogun.abbey28@gmail.com</td>
                                            <td>08162832467</td>
                                            <td>73.99.254.219</td>
                                            <td>
                                                <div class="btn btn-outline-danger btn-block disabled btn-sm">unapproved
                                                </div>
                                            </td>
                                            <td><button class="btn btn-secondary btn-sm btn-icon">
                                                    <span class="fa fa-external-link"></span>
                                                </button></td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> --}}


                    {{-- <div class="card">
                        <div class="widget invert widget--items-middle">
                            <div class="widget__icon_layer widget__icon_layer--right"><span
                                    class="li-cash-dollar"></span></div>
                            <div class="widget__container">
                                <div class="widget__line">
                                    <div class="widget__icon"><span class="li-cash-dollar"></span></div>
                                    <div class="widget__title">Total External Accounts</div>
                                    <div class="widget__subtitle">Verified / Not Verified</div>
                                </div>
                                <div class="widget__box">
                                    <button class="btn btn-outline-secondary btn-sm">View More</button></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-indent-rows margin-bottom-0">
                                    <thead>
                                        <tr>
                                            <th width="20">S/N</th>
                                            <th width="110">Date</th>
                                            <th>Beneficiary Bank</th>
                                            <th>Routing Number</th>
                                            <th>Account Number</th>
                                            <th width="120">IP</th>
                                            <th width="110">Status</th>
                                            <th width="40"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>12/02/2018</td>
                                            <td>balogun.abbey28@gmail.com</td>
                                            <td>08162832467</td>
                                            <td>08162832467</td>
                                            <td>73.99.254.219</td>
                                            <td>
                                                <div class="btn btn-outline-danger btn-block disabled btn-sm">unapproved
                                                </div>
                                            </td>
                                            <td><button class="btn btn-secondary btn-sm btn-icon">
                                                    <span class="fa fa-external-link"></span>
                                                </button></td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> --}}
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