@extends('layouts.app')
@section('title', 'Rewards & Deals')
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
                    <li class="breadcrumb-item active">Rewards &amp; Deals</li>
                </ol>
            </nav>
        </div>
        <!-- //END PAGE HEADING -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-12 mt-4">
                    <div class="card">
                        <div class="widget invert widget--items-middle">
                            <div class="widget__icon_layer widget__icon_layer--right"><span class="li-gift"></span>
                            </div>
                            <div class="widget__container">
                                <div class="widget__line">
                                    <div class="widget__icon"><span class="li-gift"></span></div>
                                    <div class="widget__title">Rewards &amp; Deals</div>
                                    <div class="widget__subtitle">
                                        Earn $300 with a new Virtual Wallet with Performance Select
                                        If you want rewards for your broader banking relationship
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <h2 class="margin-bottom-5"> Experience no fees on everyday banking and perks that add up.
                                Start with these three steps to get your $300 bonus</h2>

                            <div class="row">
                                <div class="col-12 col-lg-6 text-center mt-4">
                                    <img class="img-trim" src="{{ asset('static/backend/img/Hero_Image2.jpg')}}"
                                        width="100%">
                                </div>
                                <div class="col-12 col-lg-6 mt-4">
                                    <div class="row">
                                        <div class="col-9"><a
                                                href="mailto:support@example.com?subject=Email My Upgrade Code!&body=Hello UBS, kindly email my upgrade code. Thanks!"
                                                class="btn btn-secondary btn--icon btn--icon-stacked"><span
                                                    class="li-gift"></span> Email My Upgrade Code</a>
                                        </div>
                                    </div>
                                    <div class="card-inner-container margin-top-30">
                                        <h4>Our premium checking offering, with the highest level of rewards and
                                            benefits
                                        </h4>
                                        <p>Virtual Wallet with Performance Select includes all of the benefits Virtual
                                            Wallet has to offer, plus:
                                        </p>
                                        <ul>
                                            <li> No fees for using non-UBS ATMs. Other banks' surcharge fees are
                                                reimbursed.
                                            </li>
                                            <li>Up to 6 additional checking or savings accounts with no monthly service
                                                charge.</li>
                                            <li>Peace of mind with up to $10,000 in ID Theft reimbursement coverage.
                                            </li>
                                            <li>Free exclusive design checks or $12 discount on other select designs.
                                            </li>
                                            <li>Earn higher interest rates on your Growth account with our relationship
                                                rates.</li>
                                        </ul>
                                        <h4>Just 3 Simple Steps to Get $300</h4>
                                        <ol>
                                            <li> Open a new Virtual Wallet with Performance Select.
                                            </li>
                                            <li>Establish total qualifying direct deposit(s)[1] of $5,000 or more to
                                                your
                                                new account.</li>
                                            <li>Make at least 10 purchases with the UBS Bank Visa Debit Card linked to
                                                your
                                                new account</li>
                                        </ol>
                                    </div>
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

@endsection