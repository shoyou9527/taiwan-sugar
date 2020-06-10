@extends('layouts.main')

@section('app-content')
<style>
@media (min-width:370px){
    .zlleftbg {min-height: 384px !important;}
}
@media (max-width: 720px){
    .nwpawod {min-height: 700px;}
}
@media (max-width: 420px){
    .nwpawod {min-height: 450px;}
}
</style>
    <div class="col-sm-12 col-xs-12 col-md-9 bgwf nwpawod">
        <div class="l_zlxc">
            <div class="lytitle"><i></i>取消VIP</div>
            <div class="password_con01">
                @php
                    $expiry = \App\Models\Vip::findById($user->id)->expiry;
                    $today = date("Y-m-d");
                    $expiryDate = date("Y-m-d", strtotime($expiry));
                    $d1 = strtotime($today);
                    $d2 = strtotime($expiryDate);
                    $countDays = round(($d2-$d1)/3600/24);
                @endphp
                @if($user->isVip() && !$user->isFreeVip() && ($expiryDate != '0000-00-00' && date("Y-m-d") < $expiryDate))
                    <div class="weui-p20">
                        <h3 class="weui-bb lo_title weui-pl10"><span class="weui-dnb">VIP剩餘天數</span></h3>
                        <h3>您還剩{{$countDays}}天的VIP權限，目前可以維持到 {{ date('Y年m月d日',strtotime($expiryDate)) }}</h3>
                    </div>
                @else
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
                @endif                
            </div>
        </div>
    </div>
@stop
