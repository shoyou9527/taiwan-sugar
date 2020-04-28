@extends('layouts.main')

@section('app-content')
<div class="loginbg newheight01">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-push-7">
                <div class="weui-bgf weui-bod_r weui-mt20 loginbox denglv">
                    <form class="m-login__form m-form" method="POST" action="/login">
                        {!! csrf_field() !!}
                        <div class="weui-f18 weui-pl10 denl .title">登入</div>
                        <div class="weui-pt10 sign_relative">
                            <input class="form-control form" type="email" placeholder="帳號 (您的E-mail)" name="email" values="{{ old('email') }}" autocomplete="off">
                        </div>
                        <div class="weui-pt10 sign_relative">
                            <input class="form-control form" type="password" placeholder="密碼" name="password" id="password">
                        </div>
                        <div class="clearfix weui-pt20">
                            <span class="weui-fl sign_coln"><input type="checkbox" name="remember">記住我</span>
                            <a href="{!! url('password/reset') !!}" id="m_login_forget_password" class="weui-fr sign_coln"><img src="images/w_03.png">忘記密碼</a>
                        </div>
                        <p class="weui-pt30 weui-t_c weui-mt30">
                            <input type="submit" value="登入" id="m_login_signin_submit" class="btn login_btn">
                        </p>
                        <p class="weui-pt15 weui-t_c">還沒有帳號<a href="{!! url('register') !!}" id="m_login_signup" class="weui-t_d">免費註冊</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop