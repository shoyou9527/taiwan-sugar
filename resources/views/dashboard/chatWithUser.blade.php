@extends('layouts.main')

@section('app-content')
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
                                    <a href="/dashboard/viewuser/{{$to->id}}">
                                        <img class="media-object weui-bod_r" style="width:100px;" src="{{$to->meta_()->pic}}" 
                                        onerror="this.src=@if($to->engroup==1) '/img/male-avatar.png' @else '/img/female-avatar.png' @endif">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading weui-f24"><span class="weui-v_t">{{$to->name}}</span> </h4>
                                    <div class="ponewicon">
                                        <li>
                                            <form action="/dashboard/fav" method="POST">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="userId" value="{{$user->id}}">
                                                <input type="hidden" name="to" value="{{$to->id}}}">
                                                <button type="submit" style="background: none; border: none; padding: 0">
                                                <img src="/images/icon_14.png" class="popicon"><span>收藏</span>
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                            <form action="/dashboard/report" class="m-nav__link" method="POST">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="userId" value="{{$user->id}}">
                                                <input type="hidden" name="to" value="{{$to->id}}}">
                                                <button type="submit" style="background: none; border: none; padding: 0">
                                                <img src="/images/new_03.png" class="popicon"><span>檢舉</span>
                                                </button>
                                            </form>
                                        </li>
                                        @php $isBlocked = \App\Models\Blocked::isBlocked($user->id, $to->id); @endphp
                                        @if($isBlocked)
                                            <li>
                                                <form action="/dashboard/unblock" class="m-nav__link" method="POST">
                                                    {!! csrf_field() !!}
                                                    <input type="hidden" name="userId" value="{{$user->id}}">
                                                    <input type="hidden" name="to" value="{{$to->id}}}">
                                                    <button type="submit" style="background: none; border: none; padding: 0">
                                                    <img src="/images/new_05_1.png" class="popicon"><span>解除封鎖</span>
                                                    </button>
                                                </form>
                                            </li>
                                        @else
                                            <li>
                                                <form action="/dashboard/block" class="m-nav__link" method="POST">
                                                    {!! csrf_field() !!}
                                                    <input type="hidden" name="userId" value="{{$user->id}}">
                                                    <input type="hidden" name="to" value="{{$to->id}}}">
                                                    <button type="submit" style="background: none; border: none; padding: 0">
                                                    <img src="/images/new_05.png" class="popicon"><span>封鎖</span>
                                                    </button>
                                                </form>
                                            </li>
                                         @endif
                                        <li>
                                            {{-- <a href="{{ url()->previous() }}"> --}}
                                            <a href="{!! url('dashboard/chat') !!}">
                                                <button type="submit" style="background: none; border: none; padding: 0">
                                                    <img src="/images/new_07.png" class="popicon">
                                                    <span>返回</span>
                                                </button>
                                            </a>
                                        </li>
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
                                                        <img src="{{$user->meta_()->pic}}" height="40" width="40"
                                                        onerror="this.src=@if($user->engroup==1) '/img/male-avatar.png' @else '/img/female-avatar.png' @endif">
                                                    @else
                                                        <img src="{{$msgUser->meta_()->pic}}" height="40" width="40" 
                                                        onerror="this.src=@if ($msgUser->engroup == 1) '/img/male-avatar.png' @else '/img/female-avatar.png' @endif">
                                                    @endif
                                                </div>
                                                <div class="textInfo">
                                                <p>
                                                    {!! nl2br($message['content']) !!}
                                                    <label>{{ substr($message['created_at'],11,5) }}</label>
                                                    @if($message['read'] == "Y" && $message['from_id'] == $user->id)
                                                        <label style="bottom: 12px;">已讀</label>
                                                    @elseif($message['read'] == "N" && $message['from_id'] == $user->id)
                                                        <label style="bottom: 12px;">未讀</label>
                                                    @endif
                                                </p>
                                                <i class="arrow_icon"></i>
                                                </div>
                                            </li>
                                            @php
                                                $date_temp = substr($message['created_at'],0,10);
                                            @endphp
                                        @endforeach
                                        <nav aria-label="Page navigation" class="se_page0 newpage" style="text-align: center;">
                                            {!! $messages->render() !!}
                                        </nav>
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