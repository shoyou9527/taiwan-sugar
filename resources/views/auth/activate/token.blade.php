@extends('layouts.main')

@section('app-content')
<style>
    .zlleftbg{background:white}
</style>
<div class="m-content wnheight nerbg">
    <div class="col-sm-12 col-xs-12 col-md-12">
        <div class="newsize newheight">
            <div class="lytitle"><i></i>Email驗證</div>
            <div class="pj_box">
                <h3>站長的話</h3>
                <p><a>驗證碼已經寄到你的email. <a style="color: red; font-weight: bold;">【{{ $user->email }}】</a>
                <br><a style="color: red; font-weight: bold;">如果沒收到認證信/認證失敗，</a>
                <a href="{!! url('contact') !!}" style="color: red; font-weight: bold;text-decoration:underline;">請點此聯繫站長。</a></p>
            </div>
        </div>
    </div>
</div>
@stop