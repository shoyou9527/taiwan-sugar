@extends('layouts.main')

@section('app-content')
<style>
  .zlleftbg{background:white}
</style>
<div class="m-content nerbg wnheight">
    <div class="col-sm-12 col-xs-12 col-md-12">
        <div class="newsize newheight">
            <div class="lytitle"><i></i>Email驗證</div>
            <div class="yanzheng">
                @if(isset($user))
                    <h4>帳號註冊成功(請到Email信箱收信驗證)</h4>
                    <p>您已註冊成功，以下是您所填寫的註冊資料：</p>
                    <ul>
                        <li><label>暱稱：</label>{{ $user->name }}</li>
                        <li><label>帳號類型：</label>@if($user->engroup == 2) 甜心寶貝 @else 甜心大哥 @endif</li>
                        <li><label>想說的一句話：</label>{{ $user->title }}</li>
                        <li><label>Email：</label>{{ $user->email }} (若Email填寫錯誤，請重新註冊)</li>
                        <li style="color:rgb(244, 164, 164)">若沒收到驗證信，請按下重新發送</li>
                    </ul>
                    <div style="text-align: center;margin: 15px 0 0;">
                        <button type="submit" class="btn btn-danger" onclick="location.href='{{ url('activate/send-token') }}'">重新發送</button>
                    </div>
                @elseif(isset($register))
                    <h3>註冊失敗</h3>
                    <br><a style="color: red; font-weight: bold;">系統無法找到您所填寫的資料，敬請重新註冊。</a>
                    <a href="{!! url('contact') !!}" style="color: red; font-weight: bold;text-decoration:underline;">敬請聯絡站長，謝謝。</a></p>
                @else
                    <h3>驗證失敗</h3>
                    <br><a style="color: red; font-weight: bold;">這個驗證碼已經無效或是您提供了錯誤的驗證碼，請先嘗試登入先前所註冊的Email，若問題仍舊存在，</a>
                    <a href="{!! url('contact') !!}" style="color: red; font-weight: bold;text-decoration:underline;">敬請聯絡站長，謝謝。</a></p>
                @endif
            </div>
        </div>
    </div>
</div>
@stop