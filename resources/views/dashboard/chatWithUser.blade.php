@extends('layouts.main2d')

@section('app-content')
<style>
    .container{
        box-sizing: border-box;
    }
    .textBox{
        font-size: 16px;
        border-bottom: 0;
    }

    .textBox li {
        font-size: 14px;
        overflow: hidden;
        margin-bottom: 15px;
    }

    .textBox li .imgInfo{
        height: 40px;
        width: 40px;
        display: inline-block;
        overflow: hidden;
        border-radius: 50%;
        vertical-align: top;
    }

    .textBox li .textInfo{
        width: 76%;
        display: inline-block;
        position: relative;
        margin-left: 10px;
        margin-right: 5px;
    }

    .textBox li .textInfo label{
        font-size: 12px;
        font-weight: 100;
        display: inline-block;
        color: #999;
        position: absolute;
        right: -35px;
        bottom: 0px;
        margin-bottom: 0;
    }

    .textBox li .textInfo p{
        margin: 0;
        background: #f7f6fb;
        border-radius: 5px;
        padding: 5px 10px;
        max-width: 80%;
        display: inline-block;
        position: relative;
    }

    .text_2n {
        text-align: right;
    }
    
    .text_2n .imgInfo {
        float: right;
        margin-left: 5px;
    }
    
    .text_2n .textInfo {
        text-align: right;
        color: #fff;
    }
    
    .text_2n .textInfo p {
        background: #d5c2a4 !important;
        margin-top: 4px;
        text-align: left;
    }
    
    .text_2n .textInfo label {
        position: absolute;
        left: -32px;
        right: 0;
    }
    
    .text_2n .arrow_icon {
        position: absolute;
        top: 8px !important;
        right: -19px !important;
        left: inherit !important;
        border-color: transparent transparent transparent #d5c2a4 !important;
    }
    
    .textBox li .textInfo .arrow_icon {
        position: absolute;
        top: 10px;
        left: -20px;
        border-color: transparent #f7f6fb transparent transparent;
    }
    
    .arrow_icon {
        border-width: 4px 10px 10px 10px;
        border-style: solid;
    }
    
    @media (max-width: 330px) {
        .textBox li .textInfo {
            width: 75%;
            display: inline-block;
            position: relative;
            margin-left: 10px;
            margin-right: 5px;
        }
        .textBox li .textInfo p {
            font-size: 12px;
        }
    }
</style>
<div class="col-sm-12 col-xs-12 col-md-9 messagebg">
    <div class="m-content">
        <div class="container_02">
            <p class=" weui-f20 weui-white weui-pt20 weui-pb10">信件夾</p>
            <div class="xjj weui-bgf weui-bod_r  weui-f16">
                <div class="xjj_header">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="media">
                                <div class="media-left">
                                    <a href="/dashboard/viewuser/{{$to->id}}"><img class="media-object weui-bod_r" style="  width: 100px;" src="{{$to->meta_()->pic}}" onerror="this.src='/img/female-avatar.png'" alt="..."></a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading weui-f24"><span class="weui-v_t">{{$to->name}}</span> </h4>
                                    <div class="ponewicon">
                                        <li><form action="/dashboard/fav" method="POST">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="userId" value="{{$user->id}}">
                                                <input type="hidden" name="to" value="{{$to->id}}}">
                                                <button type="submit" style="background: none; border: none; padding: 0">
                                                <img src="/images/icon_14.png" class="popicon"><span>收藏</span>
                                                </button>
                                        </form></li>
                                        <li><form action="/dashboard/report" class="m-nav__link" method="POST">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="userId" value="{{$user->id}}">
                                            <input type="hidden" name="to" value="{{$to->id}}}">
                                            <button type="submit" style="background: none; border: none; padding: 0">
                                            <img src="/images/new_03.png" class="popicon"><span>檢舉</span>
                                            </button>
                                        </form></li>
                                        @php $isBlocked = \App\Models\Blocked::isBlocked($user->id, $to->id); @endphp
                                        @if($isBlocked)
                                            <li><form action="/dashboard/unblock" class="m-nav__link" method="POST">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="userId" value="{{$user->id}}">
                                                <input type="hidden" name="to" value="{{$to->id}}}">
                                                <button type="submit" style="background: none; border: none; padding: 0">
                                                <img src="/images/new_05.png" class="popicon"><span>解除封鎖</span>
                                                </button>
                                            </form></li>
                                        @else
                                            <li><form action="/dashboard/block" class="m-nav__link" method="POST">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="userId" value="{{$user->id}}">
                                                <input type="hidden" name="to" value="{{$to->id}}}">
                                                <button type="submit" style="background: none; border: none; padding: 0">
                                                <img src="/images/new_05.png" class="popicon"><span>封鎖</span>
                                                </button>
                                            </form></li>
                                         @endif
                                        <li><a href="{{ url()->previous() }}"><img src="/images/new_07.png" class="popicon"><span>返回</span></a></li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="weui-pl30 weui-pr30 ltk" style="padding: 15px 15px 30px">
                    <div class=" weui-pl30 weui-pb30 weui-bb weui-b_t" style="padding: 15px 15px 30px">
                        <div class="weui-pb15">
                            <div class="row">
                                <ul class="textBox">
                                    @php
                                        $date_temp='';
                                    @endphp
                                    @if(!empty($messages))
                                        @foreach ($messages as $message)
                                            @php
                                                $msgUser = \App\Models\User::findById($message->from_id);
                                                \App\Models\Message::read($message, $user->id);
                                            @endphp
                                            <li @if($message['from_id'] == $user->id) class="text_2n" @endif>
                                                @if($date_temp != substr($message['created_at'],0,10))
                                                <p style="text-align: center;font-size: #999;font-size: 14px;">
                                                    {{substr($message['created_at'],0,10)}}
                                                </p>
                                                @endif
                                                
                                                <div class="imgInfo">
                                                    @if($message['from_id'] == $user->id)
                                                        <img src="{{$user->meta_()->pic}}" height="40" width="40" onerror="this.src=@if ($user->engroup == 1) '/img/male-avatar.png' @else '/img/female-avatar.png' @endif">
                                                    @else
                                                        <img src="{{$msgUser->meta_()->pic}}" height="40" width="40" onerror="this.src=@if ($msgUser->engroup == 1) '/img/male-avatar.png' @else '/img/female-avatar.png' @endif">
                                                    @endif
                                                </div>

@if($message['read'] == "Y" && $message['from_id'] == $user->id) 已讀 @elseif($message['read'] == "N" && $message['from_id'] == $user->id) 未讀 @endif
                                                <div class="textInfo">
                                                <p>{!! nl2br($message['content']) !!}<label>{{ substr($message['created_at'],11,5) }}</label></p>
                                                <i class="arrow_icon"></i>
                                                </div>
                                            </li>
                                            @php
                                                $date_temp = substr($message['created_at'],0,10);
                                            @endphp
                                        @endforeach
                                    @endif
                                </ul>
                                <form class="m-form m-form--label-align-right" method="POST" action="/dashboard/chat">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="userId" value="{{ $user->id }}">
                                    <input type="hidden" name="to" value="{{$to->id}}">
                                    <div class="col-md-12">
                                        <textarea class="form-control m-input " rows="4" id="msg" required name="msg" maxlength="500" placeholder="我們可以出來見面吃飯聊天"></textarea>
                                    </div>
                                    <div class="col-md-12 weui-t_r a1">
                                        <div class="chuansong"> <input id="msgsnd" type="submit" class="btn btn-danger m-btn m-btn--air m-btn--custom  btn-more weui-f18" value="傳送"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop