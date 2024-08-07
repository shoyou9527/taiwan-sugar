@extends('layouts.main')

@section('app-content')
<style type="text/css">
    .nse_img {
        background: #ffffff;
    }
</style>
<div class="col-md-9 zlrightbg" style="background:#ffffff">
    <div class="p100">
        <div class="lytitle"><i></i>收件夾
            <span style="float:right;margin-top:-3px; margin-right:10px" class="m-portlet__head-text">
                <form style="display:inline;" method="post" action="{!! route('deleteAll', ['uid' => $user->id]) !!}">
                    {!! csrf_field() !!}
                    <input type="submit" class="btn btn-cs weui-f18" value="刪除全部" />
                </form>
            </span>
        </div>
        <div class="m-portlet__body" style="color:#575962;height:calc(100% - 2.2rem - 2.2rem);padding: 1.5rem .3rem;">
            <div id="user-list" class="m-widget3 col-lg-12" style="display:inline-block;margin-bottom:10px; width:100%;padding: 0;">
                @forelse ($messages as $message)
                    @php
                        //顯示對方資料
                        if($message['to_id'] == $user->id) {
                            $msgUser = \App\Models\User::findById($message['from_id']);
                        }elseif($message['from_id'] == $user->id) {
                            $msgUser = \App\Models\User::findById($message['to_id']);
                        }
                        $t = explode(" ",$message['created_at']);
                    @endphp
                    @if(isset($msgUser))
                    <div class="m-widget3__item" style="margin:10px;box-shadow: 0 1px 15px 1px rgba(244, 164, 164, 0.7); padding: 14px 28px;
                        {{--未讀且是不是我發出的訊息 顯示粉紅底--}}
                        @if($message['read']=='N' AND $message['from_id'] != $user->id)background-color: rgba(244, 164, 164, 0.7);@endif">
                        <div class="m-widget3__header clearfix">
                            <div class="nse_left">
                                <a href="{{ route('chatWithUser', $msgUser->id) }}" class="nse_img">
                                    <img src="@if($msgUser->meta_()->isAvatarHidden) {{ 'makesomeerror' }} @else {{$msgUser->meta_()->pic}} @endif" 
                                    onerror="this.src=@if ($msgUser->engroup == 1) '/img/male-avatar.png' @else '/img/female-avatar.png' @endif" alt="">
                                </a>
                            </div>
                            <div class="widget3_text">
                                <div class="m-widget3__info chat_name_center">
                                    <a class="chat_name_a" href="{{ route('chatWithUser', $msgUser->id) }}">
                                        <span class="m-widget3__username">{{ mb_substr($msgUser->name, 0, 7) }}</span>
                                    </a>
                                    <div style="margin-left: 110px;width: auto;border-bottom: #eeeeee 1px solid !important;"></div>
                                </div>
                                <a class="chat_content_a" href="{{ route('chatWithUser', $msgUser->id) }}">
                                    <p class="word_text" style="padding-left: 10px;">{{ $message['content'] }}</p>
                                </a>
                                <div class="m-widget3__sj">
                                    <p>{{ $t['0'] }}</p>
                                    <span class="jmstime">{{ $t['1'] }}</span>
                                </div>
                                <form method="post" action="{!! route('deleteBetween', ['uid' => $user->id, 'sid' => $msgUser->id]) !!}">
                                    {!! csrf_field() !!}
                                    <input type="submit" class="btn btn-danger m-btn m-btn--air m-btn--custom widget3_textbit" value="刪除" />
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                @empty
                    沒有資料!!
                @endforelse
            </div>
            <nav aria-label="Page navigation" style="text-align: center; font-size:14px">
                {!! $messages->appends(request()->all())->render() !!}
            </nav>
        </div>
    </div>
</div>
@stop

@section ('javascript')
    <script>
        $(document).ready(function() {

        $('#msg').on('keyup', function() {
            if ($('#msg').val().length > 0) {
                $('#msgsnd').prop('disabled', false);
            } else {
                $('#msgsnd').prop('disabled', true);
            }
        });

        $("#showhide").click(function() {
            if ($("user-list").isHidden()) {
                $("user-list").show();
            } else {
                $("user-list").hide();
            }
        });

        setTimeout(function() {
            window.location.reload();
        }, 80000);
        });
    </script>
@stop