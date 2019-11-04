@extends('layouts.admin')
@section('title', 'Registered Client Information')
@section('content')
<!-- PAGE CONTENT WRAPPER -->
<div class="page__content" id="page-content">
    <!-- PAGE CONTENT CONTAINER -->
    <div class="content" id="content">
        <!-- PAGE HEADING -->
        <div class="page-heading">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Administrator</li>
                    <li class="breadcrumb-item active">{{ $userInfo->first_name}} &nbsp;{{ $userInfo->last_name}}</li>
                </ol>
            </nav>
        </div>
        <!-- //END PAGE HEADING -->
        <div class="container-fluid p-0">
            <div class="form-row">
                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <h4 class="text-danger">Important Information</h4>
                                    <p class="subtitle margin-bottom-0">Use the action button to access other functions
                                    </p>
                                </div>
                                <div class="col-3">
                                    <div class="dropdown float-right">
                                        <div class="rw-btn rw-btn--card rw-btn--lg" data-toggle="dropdown">
                                            <div></div>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            @if ($userInfo->isUpdated ==0)
                                            <a href="{{ route('admin.member.update', $userInfo->user_serial_number)}}"
                                                class="dropdown-item text-bold">Update
                                                Account</a>
                                            @else
                                            <a href="{{ route('admin.client.approved', $userInfo->user_serial_number)}}"
                                                class="dropdown-item text-bold">Approve
                                                Account</a>
                                            <a href="{{ route('admin.client.suspend', $userInfo->user_serial_number)}}"
                                                class="dropdown-item text-bold">Suspend
                                                Account</a>
                                            <a href="{{ route('admin.member.update', $userInfo->user_serial_number)}}"
                                                class="dropdown-item text-bold">Update
                                                Account</a>
                                            @endif

                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item text-bold" data-demo-action="remove">Delete
                                                Account</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="divider-text margin-top-0 margin-bottom-0">Personal Information</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 col-lg-3"><strong>First Name</strong><br>{{ $userInfo->first_name}}
                                </div>
                                <div class="col-6 col-lg-3"><strong>Last Name</strong><br>{{ $userInfo->last_name}}
                                </div>
                                <div class="col-6 col-lg-3"><strong>Middle Name</strong><br>{{ $userInfo->middle_name}}
                                </div>
                                <div class="col-6 col-lg-3"><strong>Phone
                                        Number</strong><br>{{ $userInfo->mobile_number}}
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-6 col-lg-3"><strong>Email Address</strong><br>{{ $userInfo->email}}
                                </div>
                                <div class="col-6 col-lg-3"><strong>Date Of Birth</strong><br>{{ $userInfo->dob}}
                                </div>
                                <div class="col-6 col-lg-3"><strong>Gender</strong><br>{{ $userInfo->gender}}</div>
                                <div class="col-6 col-lg-3"><strong>Country</strong><br>{{ $userInfo->country}}</div>

                            </div>

                            <div class="row mt-4">
                                <div class="col-6 col-lg-6"><strong>Address</strong><br>{{ $userInfo->home_address}}
                                </div>
                                <div class="col-6 col-lg-3"><strong>Postal
                                        Code</strong><br>{{ $userInfo->postal_address}}
                                </div>
                            </div>
                        </div>

                        <div class="divider-text margin-top-0 margin-bottom-0">Other Information</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 col-lg-3"><strong>Security
                                        Question</strong><br>{{ $userInfo->account_sq}}</div>
                                <div class="col-6 col-lg-3"><strong>Answer</strong><br>{{ $userInfo->sq_answer}}</div>
                                <div class="col-6 col-lg-3"><strong>Welcome
                                        Message</strong><br>{{ $userInfo->welcome_message}}
                                </div>
                                <div class="col-6 col-lg-3"><strong>US Residency</strong><br>{{ $userInfo->residency}}
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-6 col-lg-3"><strong>Occupation</strong><br>{{ $userInfo->occupation}}
                                </div>
                                <div class="col-6 col-lg-3"><strong>Witness</strong><br>-</div>
                                <div class="col-6 col-lg-3"><strong>Next Of kin</strong><br>{{ $userInfo->next_of_kin}}
                                </div>
                                <div class="col-6 col-lg-3"><strong>Registered
                                        Date</strong><br>{{(new \Carbon\Carbon($userInfo->created_at))->diffForHumans()}}
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-6 col-lg-3"><strong>Account
                                        Status</strong><br>
                                    @if ($userInfo->isVerified ==1)
                                    <span class="badge badge-success">Approved</span>
                                    @elseif ($userInfo->isVerified ==2)
                                    <span class="badge badge-primary">Suspended</span>
                                    @else
                                    <span class="badge badge-danger">Pending</span>
                                    @endif
                                </div>


                                <div class="col-6 col-lg-3"><strong>Last
                                        Login</strong><br>{{(new \Carbon\Carbon($userInfo->last_login_at))->diffForHumans()}}
                                </div>
                                <div class="col-6 col-lg-3"><strong>Last Login
                                        IP</strong><br>{{ $userInfo->last_login_ip}}
                                </div>
                            </div>
                        </div>


                        <div class="divider-text margin-top-0 margin-bottom-0">Account Information</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 col-lg-4"><strong>Account
                                        Balance</strong><br>${{ number_format($userInfo->amount, 2)}}</div>
                                <div class="col-6 col-lg-4"><strong>Account
                                        Number</strong><br>{{ $userInfo->account_number}}</div>
                                <div class="col-6 col-lg-4"><strong>Account
                                        Type</strong><br>{{ $userInfo->account_type}}
                                </div>
                            </div>
                        </div>


                        <div class="divider-text margin-top-0 margin-bottom-0">Login Information</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 col-lg-4"><strong>Online ID / Member
                                        ID</strong><br>{{ $userInfo->email}}
                                </div>
                                <div class="col-6 col-lg-4"><strong>Passcode</strong><br>{{ $userInfo->vnv}}<br><sup
                                        class="text-danger">This is encrypted but only visible to you </sup></div>
                                <div class="col-6 col-lg-4"><strong>Token</strong><br>{{ $userInfo->token}}</div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4>Update Transaction History</h4>
                            <form action="{{ route('admin.member.transaction.submit', $userInfo->user_serial_number)}}"
                                method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input id="radio1" name="transaction_type" type="radio"
                                            class="custom-control-input" checked="checked" value="Debit">
                                        <label class="custom-control-label" for="radio1">Debit Transaction</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="radio2" name="transaction_type" type="radio"
                                            class="custom-control-input" value="Credit">
                                        <label class="custom-control-label" for="radio2">Credit Transaction</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Transaction Date<span>*</span>
                                            @error('transaction_date')
                                            <small class="alert-danger">{{ $message }}</small>
                                            @enderror
                                        </label>
                                        <div class="form-control-element form-control-element--right">
                                            <input name="transaction_date" type="text" class="form-control"
                                                placeholder="Choose your date..." value="02/01/2018"
                                                id="dp-example-default">
                                            <div class="form-control-element__box form-control-element__box--pretify">
                                                <span class="fa fa-calendar"></span></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Amount<span>*</span>
                                            @error('amount')
                                            <small class="alert-danger">{{ $message }}</small>
                                            @enderror
                                        </label>
                                        <div class="form-control-element form-control-element--right">
                                            <input name="amount" type="text" class="form-control">
                                            <div class="form-control-element__box form-control-element__box--pretify">
                                                <span class="fa fa-money"></span></div>
                                        </div>
                                    </div>

                                </div>


                                <div class="form-group">
                                    <label>Transaction Comment <span>*</span>
                                        @error('comment')
                                        <small class="alert-danger">{{ $message }}</small>
                                        @enderror
                                    </label>
                                    <input name="comment" type="text" class="form-control">
                                </div>



                                <button class="btn btn-block btn-secondary">Update Account</button>
                            </form>


                        </div>
                        <div class="divider-text margin-top-0 margin-bottom-0">Account History</div>
                        <div class="card-body padding-right-10">
                            <table id="dt-example-responsive" class="table table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th width="20">S/N</th>
                                        <th>Transaction No</th>
                                        <th>Transaction Description</th>
                                        <th>Amount</th>
                                        <th>Balance</th>
                                        <th width="80">Transaction Type</th>
                                        <th width="80">Transaction Date</th>
                                        {{-- <th width="40"></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($history as $list)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$list->transaction_id}}</td>
                                        <td>{{$list->comment}}</td>
                                        <td>&dollar;{{number_format($list->amount, 2)}}</td>
                                        <td>&dollar;{{number_format($list->balance, 2)}}</td>
                                        <td>{{$list->transaction_type}}</td>
                                        <td>{{(new \Carbon\Carbon($list->transaction_date))->diffForHumans()}}</td>
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
        </div>
    </div>
    <!-- //END PAGE CONTENT CONTAINER -->
</div>
<!-- //END PAGE CONTENT -->
@endsection