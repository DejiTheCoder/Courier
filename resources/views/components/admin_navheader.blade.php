<div class="page__container invert">
  <nav class="horizontal-navigation">
    <button class="btn btn-light btn--icon" data-action="horizontal-show">
      <span class="fa fa-bars"></span> Toggle navigation</button>
    <ul>
      <li><a href="{{ route('admin.dashboard')}}">
          <span class="icon li-wallet"></span>
          <span class="text">Dashboard</span>
        </a>
      </li>

      <li><a href="{{ route('admin.member')}}">
          <span class="icon li-shield-check"></span>
          <span class="text">Registered Members</span>
        </a>
      </li>

      <li><a href="#"><span class="icon li-tab"></span>
          <span class="text">Transfers</span>
        </a>
        <ul>
          <li><a href="{{ route('admin.ach.transfer')}}" class="no-icon">
              <span class="text">ACH Transfer</span>
            </a>
          </li>
          <li><a href="{{ route('admin.wire.transfer')}}" class="no-icon">
              <span class="text">International Transfers</span>
            </a>
          </li>
        </ul>
      </li>

      <li><a href="{{ route('admin.external.account')}}">
          <span class="icon li-database-upload"></span>
          <span class="text">External Accounts</span>
        </a>
      </li>

      <li><a href=""><span class="icon li-cash-dollar"></span> <span class="text">Pay Bills</span></a>
        <ul>
          <li><a href="{{ route('admin.registered.payee')}}" class="no-icon">
              <span class="text">Registered Payee</span></a>
          </li>
          <li><a href="{{ route('admin.payee')}}" class="no-icon">
              <span class="text">Billpay Payments</span>
            </a>
          </li>
        </ul>
      </li>


      <li><a href="{{ route('admin.message.log')}}">
          <span class="icon li-server"></span>
          <span class="text">Message Logs</span>
        </a>
      </li>

      <li><a href="{{ route('admin.register.client')}}"><span class="icon li-group-work"></span>
          <span class="text">Create New Account</span>
        </a>
      </li>


    </ul>
  </nav>
</div>
<!-- //END PAGE CONTAINER -->
<!-- PAGE CONTENT WRAPPER -->