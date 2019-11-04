<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Twitter -->
    <meta name="twitter:site" content="">
    <meta name="twitter:creator" content="">
    <meta name="twitter:card" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">

    <!-- Facebook -->
    <meta property="og:url" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">

    <meta property="og:image" content="">
    <meta property="og:image:secure_url" content="">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title') &#8211; Coast Parcel Delivery LLP &#8211;Logistics &amp; Supply Chain Solutions</title>
    <link rel=stylesheet
        href='https://fonts.googleapis.com/css?family=Assistant%3A200%2C300%2Cregular%2C600%2C700%2C800%7CKarla%3Aregular%2Citalic%2C700%2C700italic%7CPT+Sans%3Aregular%2Citalic%2C700%2C700italic&amp;subset=latin%2Chebrew%2Clatin-ext%2Ccyrillic-ext%2Ccyrillic&amp;ver=5.0.3'
        type=text/css media=all>

    <link href="{{ asset('static/backend/css/toastr.min.css')}}" rel="stylesheet">
    <link href="{{ asset('static/homepage/plugins/goodlayers-core/plugins/combine/style.css')}}" rel="stylesheet">
    <link href="{{ asset('static/homepage/plugins/goodlayers-core/include/css/page-builder.css')}}" rel="stylesheet">
    <link href="{{ asset('static/homepage/plugins/revslider/public/assets/css/settings.css')}}" rel="stylesheet">
    <link href="{{ asset('static/homepage/plugins/quform/css/base.css')}}" rel="stylesheet">
    <link href="{{ asset('static/homepage/css/style-core.css')}}" rel="stylesheet">
    <link href="{{ asset('static/homepage/css/custom.css')}}" rel="stylesheet">
</head>