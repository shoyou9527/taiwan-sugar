@if (Auth::user() && Request::path() != '/activate' && Request::path() != '/activate/send-token')
	@include('partials.menu')
	<style>
	    /*強制顯示右上角導航列*/
	    .toplink{ display: block}
	</style>
@else
	@include('partials.nav_login_register')
@endif