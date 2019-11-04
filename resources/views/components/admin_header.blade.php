<!-- PAGE HEADER -->
<header class="page__header invert">
    <div class="logo-holder"><a href="/" class="logo-text d-none d-lg-block"><strong class="text-primary">#</strong>
            <strong></strong> UBS Online Banking</a> <a href="/" class="logo-text d-lg-none"><strong
                class="text-primary">#</strong><strong>RW</strong></a>
    </div>

    <div class="box-fluid"></div>
    <div class="box">
        <a href="{{ route('admin.settings.profile')}}" class="btn btn-light btn-icon"><span class="li-cog"></span></a>
        <a onclick="event.preventDefault(); document.querySelector('#logout-form').submit();"
            href="{{ route('admin.logout')}}" class="btn btn-light btn-icon mr-2"><span
                class="li-power-switch"></span></a>
    </div>
    <form id="logout-form" action="{{ route('admin.logout')}}" method="POST" style="display: none;">
        {{ csrf_field() }}</form>
</header>
<!-- //END PAGE HEADER -->