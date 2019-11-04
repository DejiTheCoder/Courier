@extends('layouts.app')
@section('title','Contact Us')
@section('content')
<style>
    .card {
        box-shadow: 0 28px 65px 0 hsla(0, 0%, 73.7%, .25);
        padding: 20px 25px 40px;
    }

    .contact-us-form {
        /* padding: 50px 55px 80px;
        margin-top: 160px; */
        left: 200px;
        top: 90px;
        border-radius: 4px;
        position: absolute;
    }

    .contact-us-form h2 {
        color: #0076a8;
        margin: 20px;
        padding: 0 15px 0 15px;
    }

    .contacts h2 {
        font-size: 17px;
        padding: 11px 0 10px 0;
        text-align: center;
        color: #4a4a4a;
    }


    .contact-mail-wrap {
        margin: 20px auto;
        float: left;
        text-align: center;
    }

    .contact-mail>span {
        display: block;
        font-size: 14px;
        letter-spacing: -0.2px;
        font-weight: 400;
        line-height: 1.2;
        padding: 0 0 5px 0;
        color: #4a4a4a;
    }

    .contact-mail .contact-mail-address {
        color: #0076a8;
        padding: 0 15px 0 15px;
    }
</style>
<!-- PAGE CONTENT WRAPPER -->
<div class="page__content" id="page-content">

    <!-- SIDEPANEL -->
    <div class="page-sidepanel" id="page-sidepanel">
        <div class="page-sidepanel__content">
            <div class="content margin-bottom-0">
                <div class="contacts row">

                    <div class="col-md-12">
                        <div class="contact-mail-wrap">
                            <div class="contact-mail">
                                <span>General Correspondence</span>
                                <span class="contact-mail-address">UBS Fintech<br>
                                    PO Box 30416<br>
                                    Salt Lake City, UT 84130 </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="contact-mail-wrap">
                            <div class="contact-mail">
                                <span>For Retirement Purpose</span>
                                <span class="contact-mail-address">UBS Fintech<br>
                                    PO Box 30416<br>
                                    Salt Lake City, UT 84130 </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="contact-mail-wrap">
                            <div class="contact-mail">
                                <span>Cambodia Correspondence</span>
                                <span class="contact-mail-address">UBS Fintech<br>
                                    PO Box 30416<br>
                                    Salt Lake City, UT 84130 </span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="page-sidepanel__button page-sidepanel__button--lower" data-action="sidepanel-hide">
            <div></div>
        </div>
    </div>
    <!-- //END SIDEPANEL -->
    <!-- PAGE CONTENT CONTAINER -->
    <div class="content" id="content">
        <!-- PAGE HEADING -->
        <div class="page-heading">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('client.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Contact us</li>
                </ol>
            </nav>
        </div>
        <!-- //END PAGE HEADING -->
        <div id="google_contact" class="pull-left" style="width: 100%; height: 100%"></div>
        <div class="contact-us-form">

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('contact.dashboard.submit')}}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Department
                                    @error('department')
                                    <small class="alert-danger">{{ $message }}</small>
                                    @enderror
                                </label>
                                <select name="department" class="custom-select">
                                    <option selected="" value="Customer Contact and Care">Customer Contact and Care
                                    </option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Inquiry Labels
                                    @error('subject')
                                    <small class="alert-danger">{{ $message }}</small>
                                    @enderror
                                </label>
                                <select name="subject" class="custom-select @error('subject') is-invalid @enderror">
                                    <option value=""> &dash; Selected prefered option &dash;</option>
                                    <option value="General inquiry">General inquiry</option>
                                    <option value="Card inquiry">Card inquiry</option>
                                    <option value="Fee inquiry">Fee inquiry</option>
                                    <option value="Loan inquiry">Loan inquiry</option>
                                    <option value="Account/s inquiry">Account/s inquiry</option>
                                    <option value="e-banking inquiry">e-banking inquiry</option>
                                    <option value="Branch inquiry">Branch inquiry</option>
                                    <option value="Suggestions/Feedback">Suggestions/Feedback</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Full Name
                                    @error('client_name')
                                    <small class="alert-danger">{{ $message }}</small>
                                    @enderror
                                </label>
                                <input type="text" name="client_name"
                                    value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" readonly
                                    class="form-control @error('client_name') is-invalid @enderror">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Email Address
                                    @error('client_email')
                                    <small class="alert-danger">{{ $message }}</small>
                                    @enderror
                                </label>
                                <input type="text" name="client_email" value="{{ Auth::user()->email }}" readonly
                                    class="form-control @error('client_email') is-invalid @enderror">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="">Complaints / Suggestions
                                    @error('client_complaints')
                                    <small class="alert-danger">{{ $message }}</small>
                                    @enderror
                                </label>
                                <textarea class="form-control @error('client_complaints') is-invalid @enderror"
                                    name="client_complaints" rows="5"></textarea>
                            </div>

                        </div>

                        <button class="btn btn-secondary btn-block margin-top-10">Send Message</button>
                    </form>
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