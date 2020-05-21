@extends('layouts.main')

@section('app-content')
<div class="m-content wnheightdl nerbg">
    <div class="col-sm-12 col-xs-12 col-md-12">
        <div class="newsize newheight">
            <div class="lytitle"><i></i>忘記密碼</div>
            <div class="m-portlet__body liuyana1 password_con">
                <form class="m-login__form m-form" method="POST" action="/password/email">
                    {!! csrf_field() !!}
                    <div class="form-group m-form__group">
                        <input class="form-control m-input weui-mb15" type="email" placeholder="帳號 (您的E-mail)" name="email" values="{{ old('email') }}" autocomplete="off">
                    </div>
                    <p style="color:red; font-size:20px; font-weight:bold;">
                        請注意：<br>
                        1. 每次更改密碼連結的有效時間為60分鐘，請務必把握時間。<br>
                        2. 若您收到多封更改密碼的信件，請以最新那封為主，舊的信都會失效。
                    </p>
                    <div class="m-login__form-action">
                        <button type="submit" class="btn btn-danger m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                        發送信件
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
