<!-- Title and Meta
================================================== -->
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
@if(!empty($seo))
<meta name="viewport" content="{{ $seo['viewport'] }}">
<meta name="description" content="{{ $seo['description'] }}">
<meta name="author" content="{{ $seo['author'] }}">
@else
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
@endif
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-5.1.1-dist/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/index.min.css') }}" />

<!-- Facebook Open Graph Meta
================================================== -->
@if(!empty($seo['og']))
<meta property="og:title" content="{{$seo['og:title']}}" />
<meta property="og:url" content="{{$seo['og:url']}}" />
<meta property="og:site_name" content="{{$seo['og:site_name']}}" />
<meta property="og:description" content="{{$seo['og:description']}}" />
<meta property="og:image" content="{{$seo['og:image']}}" />
@endif

<!-- Chrome, Firefox OS and Opera -->
{{-- <meta name="theme-color" content="#E3D6CA"> --}}

<!-- Windows Phone -->
{{-- <meta name="msapplication-navbutton-color" content="#E3D6CA"> --}}

<!-- iOS Safari -->
{{-- <meta name="apple-mobile-web-app-status-bar-style" content="#E3D6CA">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
<meta name="format-detection" content="telephone=no"> --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

<!--[if lt IE 9]>
<script src="{{asset('/common/html5shiv.min.js')}}"></script>
<script src="{{asset('/common/respond.min.js')}}"></script>
<![endif]-->

<!-- Bootstrap core CSS -->

<!-- Custom fonts for this template -->
{{-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet"> --}}

<!-- Custom styles for this template -->

