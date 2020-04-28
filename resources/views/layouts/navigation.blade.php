@if (Auth::user() && Request::path() != '/activate' && Request::path() != '/activate/send-token')
	@include('partials.menu')
@else
<header class="header headerbg weui-pb10 weui-pt10 tophear">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid ">
            <div class="navbar-header topr">
                <a href="{!! url('/') !!}" class="weui-fl weui-pl10 weui-pt5"><img src="/images/homeicon.png"></a>
                <a href="{!! url('login') !!}" class="weui-fr weui-white weui-mr30 weui-pt15 toprig top_zc">登入</a>
                <a href="{!! url('register') !!}" class="weui-fr weui-white weui-mr15 weui-pt15">註冊</a>
            </div>
        </div>
    </nav>
</header>
@endif