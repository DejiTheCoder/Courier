@extends('layouts.app')
@section('title', 'Saving Goals')
@section('content')
<div class="page__content" id="page-content">
    <style>
        .widget__title {
            font-size: 18px !important;
            line-height: 1.18;
            color: #ff6000 !important;
            /* margin-bottom: 40px; */

        }

        .ubs-saving-goals {
            padding: 30px;
        }

        .ubs-saving-goals h3 {
            font-size: 18px;
            line-height: 32px;
        }

        .ubs-saving-goals h2 {
            font-size: 18px;
            line-height: 32px;
        }

        .ubs-saving-goals h2::after {
            background: #ebdecd;
            display: block;
            content: '';
            height: 5px;
            margin-bottom: 20px;
            margin-top: 10px;
            width: 40px;
        }

        .ubs-saving-goals p.large-type {
            font-size: 15px;
            line-height: 1.7;
            text-align: justify
        }

        .two-perc-shared-piggy-bank {
            display: block;
            margin: 30px auto;
            width: 75%;
        }

        .modal-window {
            position: fixed;
            background-color: rgba(6, 6, 6, 0.8);
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 999;
            visibility: hidden;
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s;
        }

        .modal-window:target {
            visibility: visible;
            opacity: 1;
            pointer-events: auto;
        }

        .modal-window>div {
            width: 450px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            padding: 2em;
            background: #ffffff;
        }

        .modal-window header {
            font-weight: bold;
        }

        .modal-window h2 {
            font-size: 35px;
            margin: 0 0 15px;
        }

        .modal-window p {
            font-size: 15px;
        }

        .modal-close {
            color: #aaa;
            line-height: 50px;
            font-size: 80%;
            position: absolute;
            right: 0;
            text-align: center;
            top: 0;
            width: 70px;
            text-decoration: none;
        }

        .modal-close:hover {
            color: black;
        }
    </style>

    <!-- SIDEPANEL -->

    <!-- //END SIDEPANEL -->
    <!-- PAGE CONTENT CONTAINER -->
    <div class="content" id="content">
        <!-- PAGE HEADING -->
        <div class="page-heading">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('client.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Saving Goals</li>
                </ol>
            </nav>
        </div>
        <!-- //END PAGE HEADING -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-12 mt-4">
                    <div class="card">
                        <div class="widget invert widget--items-middle">
                            <div class="widget__icon_layer widget__icon_layer--right"><span class="li-vault"></span>
                            </div>
                            <div class="widget__container">
                                <div class="widget__line">
                                    <div class="widget__icon"><span class="li-vault"></span></div>
                                    <div class="widget__title">Saving Goals</div>
                                    <div class="widget__subtitle">A Protected Goals Account is designed to help you save
                                        in
                                        a separate high-yield checking account, and is required to receive this bonus.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-8 ubs-saving-goals">
                                    <h2>At Simple we always have your interest(s) in mind </h2>
                                    <p class="large-type">We want you to feel confident with your money and be rewarded
                                        when
                                        you save. Whether
                                        you’re saving up for a house down payment, wedding, college fund, or just a
                                        rainy
                                        day, a Savings Goal - and great APY - makes it easier. Your savings lives close
                                        by,
                                        but in a separate account, so you won’t accidentally spend it. </p>

                                    <h3>Shared accounts are twice as nice</h3>
                                    <p class="large-type">When you and your partner open a Shared Protected Goals
                                        Account,
                                        your financial
                                        superpowers combine and give you another chance to save towards your goals and
                                        earn
                                        up to 2.02% APY, together. </p>
                                    <p class="large-type">In just a few clicks, you can be on your way to earning 2.02%
                                        APY
                                        on your Protected
                                        Goals Account.</p>

                                    <a href="#open-modal" style="background: #9a3d37; border:none;"
                                        class="btn btn-lg btn-primary mt-2">Get started
                                        today!</a>
                                </div>

                                <div class="col-md-4">
                                    <img class="two-perc-shared-piggy-bank"
                                        src="{{ asset('static/backend/img/2perc-shared-piggy-bank.png')}}"
                                        alt="Shared savings goal piggy bank">
                                </div>
                            </div>


                        </div>
                    </div>



                </div>

            </div>
        </div>





    </div>
    <!-- //END PAGE CONTENT CONTAINER -->
</div>
<!-- Modal-->
<div id="open-modal" class="modal-window">
    <div>
        <a href="#" title="Close" class="modal-close">Close</a>
        <h2 class="text-center">Hey Wait!</h2>
        <p class="text-center" style="text-align:justify">This feature is available to platinum business accounts
            holders only. You can visit our
            nearest branch or
            contact our customer care service for steps to upgrade.</p>
        <a class="text-center" href="{{ route('contact.dashboard')}}" target="_blank">👉 click to upgrade</a>
    </div>
</div>
</div>

@endsection