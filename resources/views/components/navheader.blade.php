<div class="page__container invert">
    <nav class="horizontal-navigation">
        <button class="btn btn-light btn--icon" data-action="horizontal-show">
            <span class="fa fa-bars"></span> Toggle navigation</button>
        <ul>
            <li><a href="{{ route('client.dashboard') }}"><span class="icon li-wallet"></span><span
                        class="text">Accounts</span></a>
            </li>

            <li><a href="{{ route('external.dashboard') }}"><span class="icon li-wallet"></span><span
                        class="text">External
                        Accounts</span></a>
            </li>

            <li><a href="#"><span class="icon li-tab"></span> <span class="text">Transfer
                        Funds</span></a>
                <ul>
                    <li><a href="{{ route('ach.dashboard')}}" class="no-icon"><span class="text">External
                                Transfer</span></a>
                    </li>
                    <li><a href="{{ route('md.dashboard')}}" class="no-icon"><span class="text">
                                Mobile Deposit</span></a>
                    </li>
                </ul>
            </li>
            <li><a href="{{ route('wire.dashboard')}}"><span class="icon li-wallet"></span><span
                        class="text">International
                        Transfer </span></a>
            </li>


            <li><a href="#"><span class="icon li-cash-dollar"></span> <span class="text">Pay Bills</span></a>
                <ul>
                    <li><a href="{{ route('payee.dashboard')}}" class="no-icon"><span class="text">Pay To
                                Account</span></a>
                    </li>
                    <li><a href="{{ route('billpay.dashboard')}}" class="no-icon"><span class="text">Schedule
                                Payment</span></a></li>
                </ul>

            </li>

            <li><a href="{{ route('deals.dashboard')}}"><span class="icon li-gift"></span> <span class="text">Rewards
                        and Deals</span></a></li>
            <li><a href="{{ route('goals.dashboard')}}"><span class=" icon li-vault"></span> <span class="text">Saving
                        Goals
                    </span></a></li>
            {{-- <li><a href=""><span class="icon li-bullhorn"></span> <span class="text">Alerts</span></a></li> --}}
            {{-- <li><a href="{{ route('paperless.dashboard') }}"><span class="icon li-document2"></span> <span
                class="text">eDocuments</span></a></li> --}}
            <li><a href="{{ route('contact.dashboard') }}"><span class="icon li-bubble-question"></span> <span
                        class="text">Help
                        Center</span></a></li>
        </ul>
    </nav>
</div>
<!-- //END PAGE CONTAINER -->
<!-- PAGE CONTENT WRAPPER -->