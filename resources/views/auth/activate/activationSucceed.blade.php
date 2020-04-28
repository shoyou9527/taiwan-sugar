@extends('layouts.main')

@section('app-content')
<style>
    .zlleftbg{background:white}
</style>
<div class="m-content wnheight nerbg">
    <div class="col-sm-12 col-xs-12 col-md-12">
        <div class="newsize newheight">
            <div class="lytitle"><i></i>驗證成功</div>
            <div class="pj_box">
                <h3>{{ $user->name }}註冊完成</h3>
                <p>請再次確認您的帳號為：
                    <span style="color:rgba(244, 164, 164, 0.7)">{{ $user->email }}</span> </p>
                <p>現在您可以正常使用您的帳號了，<a href="{!! url('login') !!}" style="color:rgb(244, 164, 164)"> 按這裡登入</a>，以開始您的第一步。
                </p>
            </div>
        </div>
    </div>
</div>
@stop