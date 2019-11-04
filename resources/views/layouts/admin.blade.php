@include('components.head')
@include('components.admin_header')
@include('components.admin_navheader')

@yield('content')


<!-- IMPORTANT SCRIPTS -->
<script type="text/javascript" src="{{ asset('static/backend/js/vendors/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('static/backend/js/vendors/jquery/jquery-migrate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('static/backend/js/vendors/bootstrap/bootstrap.bundle.min.js') }}">
</script>
<script type="text/javascript"
    src="{{ asset('static/backend/js/vendors/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<!-- END IMPORTANT SCRIPTS -->
<script type="text/javascript" src="{{ asset('static/backend/js/vendors/moment/moment-with-locales.min.js') }}">
</script>
<script type="text/javascript"
    src="{{ asset('static/backend/js/vendors/datetimepicker/bootstrap-datetimepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('static/backend/js/vendors/daterangepicker/daterangepicker.js') }}">
</script>
<script type="text/javascript" src="{{ asset('static/backend/js/vendors/knob/jquery.knob.js') }}"></script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
$("#dr-example-single").daterangepicker({
singleDatePicker: true,
"drops": "up"
});
});
</script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
                                                    $("#dp-example-default").datetimepicker();
                                                });
</script>
<!-- TEMPLATE SCRIPTS -->
<script type="text/javascript" src="{{ asset('static/backend/js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('static/backend/js/plugins.js') }}"></script>
<script type="text/javascript" src="{{ asset('static/backend/js/demo.js') }}"></script>
<script type="text/javascript" src="{{ asset('static/backend/js/settings.js') }}"></script>
<!-- END TEMPLATE SCRIPTS -->
<script type="text/javascript" src="{{ asset('static/backend/js/vendors/maskedinput/jquery.maskedinput.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('static/backend/js/vendors/datatables/datatables.min.js') }}"></script>
<script type="text/javascript"
    src="{{ asset('static/backend/js/vendors/datatables/extensions/dataTables.responsive.min.js') }}"></script>
<!-- Toast js -->
<script src="{{ asset('static/backend/js/toastr.min.js') }}"></script>
</div>
@include('alert.alert')
</body>

</html>