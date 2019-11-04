@extends('layouts.auth')
@section('title', 'User Authentication')
@section('content')
<div class="error-notification"></div>
<div class="login-form-wrapper float-left">
    {{-- @if($url = 'admin')
    <form action="{{ route('login/$url') }}" method="post" class="primary-column bottom-line upper-line login">
    @else
    <form action="{{ route('login') }}" method="post" class="primary-column bottom-line upper-line login">
        @endif --}}

        @isset($url)
        <form method="POST" action='{{ url("login/$url") }}' class="primary-column bottom-line upper-line login">
            @else
            <form method="POST" action="{{ route('login') }}" class="primary-column bottom-line upper-line login">
                @endisset


                {{-- <form action="{{ route('login') }}" method="post" class="primary-column bottom-line upper-line
                login">
                --}}
                @csrf
                <h2>{{ __('Login') }}</h2>
                <label>User Name<input tabindex="1" id="email" type="text"
                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                        value="{{ old('email') }}">

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif

                </label>
                <label class="checkbox-line">
                    <input tabindex="4" name="remember" id="rememberuser" type="checkbox"
                        {{ old('remember') ? 'checked' : '' }}>Remember my
                    User Name
                </label>
                <label>Password<input tabindex="2" id="password" type="password"
                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                        maxlength="64">



                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </label>
                <input id="submit" tabindex="3" type="submit" class="btn btn-primary" value="{{ __('Login') }}">

                <div class="flyout">
                    <div class="flyout-content">
                        <h3>UBS Online Services Login Security</h3>
                        <p>We understand how critical it is that your personal financial information is kept
                            confidential and
                            secure. To that end, access to UBS Online Services occurs over a secure connection
                            utilizing
                            industry-standard encryption technology to help protect the transmission of your data
                            from
                            unauthorized access. In addition, as your User Name and Password enable you to access
                            your
                            account(s), it is of utmost importance that you protect your User Name and Password from
                            unauthorized use and / or disclosure.</p>
                        <p><a href="/staticfiles/olspages/adobe/How_we_protect_you_online.pdf" target="_blank">Learn
                                more</a>
                            about UBS Online Services and how we safeguard your online experience.</p>
                    </div>
                </div>

                @if (Route::has('password.request'))
                <p id="forgotLinks" style="display: block;">Forgot your
                    <a tabindex="6" id="forgotusername" href="#forgotusername">User Name</a>
                    or
                    <a tabindex="7" id="forgotpassword" href="{{ route('password.request') }}">Password</a>?</p>
                @endif

            </form>
            <section class="primary-column register">
                <h3>Interested in online account access?</h3>
                <p>Get secure, 24/7 online access to your accounts</p>
                <button onclick="window.location.href = '{{ route('register') }}';" class="btn">Register
                    Now</button>
            </section>
</div>

<aside id="sidebar">
    <a id="podcast-banner" href="" target="new" style="display: none;"><img alt="Listen daily podcast"
            src="/staticfiles/olspages/images/MarketingImage.gif"></a>
    <section class="sidebar-content">
        <h3>Important information</h3>
        <div><span class="neo-icon-lock-alternate icon"></span><a
                href="/staticfiles/olspages/adobe/How_we_protect_you_online.pdf" target="_blank">How we protect you
                online</a></div>
        <div><span class="neo-icon-lock-alternate icon"></span><a
                href="/staticfiles/olspages/adobe/How_you_can_protect_your_online_security.pdf" target="_blank">How to
                protect yourself online</a></div>
        <div><span class="neo-icon-lock-alternate icon"></span><a href="http://brokercheck.finra.org/"
                target="_blank">Go to BrokerCheck</a></div>
    </section>
</aside>
<div class="clear"></div>
@endsection