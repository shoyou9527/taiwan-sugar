@extends('layouts.main')

@section('app-content')
<div class="m-content wnheightdl nerbg">
    <div class="col-sm-12 col-xs-12 col-md-12">
        <div class="newsize newheight">
            <div class="lytitle"><i></i>修改密碼</div>
            <div class="m-portlet__body liuyana1 password_con">
                <form class="m-login__form m-form" method="POST" action="/password/reset">
                    {!! csrf_field() !!}
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group m-form__group">
                        <input class="form-control m-input weui-mb15" type="email" placeholder="帳號 (您的E-mail)" name="email" values="{{ old('email') }}" autocomplete="off">
                        <input name="password" id="password" class="form-control m-input weui-mb15" type="password" placeholder="密碼" values="" autocomplete="off">
                        <input name="password_confirmation" id="password_confirmation" class="form-control m-input" type="password" placeholder="密碼確認" values="" autocomplete="off">
                    </div>
                    <div class="m-login__form-action">
                        <button type="submit" class="btn btn-danger m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary"> 變更密碼 </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@section('javascript')
<script>
    var password = document.getElementById("password")
        , confirm_password = document.getElementById("password_confirmation");

    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("密碼確認與上述密碼不相符");
        } else {
            confirm_password.setCustomValidity('');
        }
    }
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>
@stop
