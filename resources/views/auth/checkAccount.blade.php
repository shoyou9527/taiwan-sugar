@extends('layouts.main')

@section('app-content')
    <div class="col-sm-12 col-xs-12 col-md-9 bgwf newheight03">
        <div class="l_zlxc">
            <div class="lytitle"><i></i>取消VIP</div>
            <div class="password_con01">
                <div class="m-login__head">
                    <h3 class="m-login__title">確認帳號密碼</h3>
                </div>
                <form class="m-login__form m-form" method="POST" action="/dashboard/cancelpay">
                    {!! csrf_field() !!}
                    <div class="form-group m-form__group">
                        <input class="form-control m-input" type="email" placeholder="帳號 (您的E-mail)" name="email" values="" autocomplete="off">
                    </div>
                    <div class="form-group m-form__group">
                        <input class="form-control m-input m-login__form-input--last" type="password" placeholder="密碼" name="password" id="password">
                    </div>
                    <div class="m-login__form-action">
                        <button type="submit" id="m_login_signin_submit" class="btn btn-danger m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                            確認
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop