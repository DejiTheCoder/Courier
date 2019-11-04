@include('components.head')
@include('components.header')
{{-- @include('components.navheader') --}}

@yield('content')

@include('components.footer')

<!-- IMPORTANT SCRIPTS -->
@include('alert.alert')
<script type="text/javascript" src="{{ asset('static/homepage/js/jquery/jquery.js')}}"></script>
<script type="text/javascript" src="{{ asset('static/homepage/js/jquery/jquery-migrate.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('static/homepage/plugins/goodlayers-core/plugins/combine/script.js')}}">
</script>

<script>
	var gdlr_core_pbf = {
	        "admin": "",
	        "video": {
	            "width": "640",
	            "height": "360"
	        },
	        "ajax_url": ""
	    };
</script>
<script type="text/javascript" src="{{ asset('static/homepage/plugins/goodlayers-core/include/js/page-builder.js')}}">
</script>
<script type="text/javascript" src="{{ asset('static/homepage/js/jquery/jquery.blockUI.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('static/homepage/js/jquery/ui/effect.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('static/homepage/js/jquery.mmenu.js')}}"></script>
<script type="text/javascript" src="{{ asset('static/homepage/js/jquery.superfish.js')}}"></script>
<script type="text/javascript" src="{{ asset('static/homepage/js/plugins.js')}}"></script>
<script type="text/javascript" src="{{ asset('static/homepage/plugins/quform/js/plugins.js')}}"></script>
<script type="text/javascript" src="{{ asset('static/homepage/plugins/quform/js/scripts.js')}}"></script>
</body>

</html>