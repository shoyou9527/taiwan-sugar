<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" >
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
		<title>@yield('title') 台灣甜心包養網，在這邊，許多 Daddy 與 Baby 甜蜜相遇。--Let Find Your Sugar Dating--台灣甜心網提供都會男女包養網站的甜蜜邂逅。</title>
		<meta name="Keywords" content="包養行情|包養故事|包養|包養網|甜心|甜心寶貝">
		<meta name="Description" content="我們提供都會優質男女交流的機遇。台灣甜心網是台灣最大的包養的媒合網站。">
		<link href="{{ asset('css/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
		<link href="{{ asset('css/iconfont.css') }}" type="text/css" rel="stylesheet">
		<link href="{{ asset('css/new_css.css') }}" type="text/css" rel="stylesheet">
		{{-- <link href="{{ asset('css/ts_css.css') }}" type="text/css" rel="stylesheet"> --}}
		<link href="{{ asset('css/style-new.css') }}" type="text/css" rel="stylesheet">
		<script src="{{ asset('js/jquery.min.js') }}"></script>
		@if (!str_contains(url()->current(), '/dashboard/search'))
		    {{-- 除搜尋頁外使用的css --}}
		    <style> h3,h2 {text-align: center;}</style>
		@endif
		@stack('style')
		@stack('header_script')
	</head>
	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-footer--push">
		{{-- @include('partials.menu') --}}
		@include('layouts.navigation')
		<div class="m-content h_shoujian">
        	{{-- 共用訊息提示 --}}
        	<div class="prompt"></div>
            @include('partials.errors')
            @include('partials.message')
		    <div class="m-content zlleftbg">
		        <div class="row">
		            {{-- 側邊欄規則 dashboard才有 但dashboard搜尋頁無--}}
		            @if(str_contains(url()->current(), '/dashboard') AND !str_contains(url()->current(), '/dashboard/search'))
		                @include('dashboard.panel')
		            @endif
		            @yield("app-content")
		        </div>
		    </div>
		</div>
		@include('partials.footer')
		@include('partials.scripts')
		@yield("javascript")
	</body>
</html>