@extends('layouts.main')

@section('app-content')
<style>
    .m-content{
        width:100%;
        display:table;
    }
    @media (max-width:320px){
    .pe_data li span{width: 32%;}
    }
</style>
<div class="col-sm-12 col-xs-12 col-md-9 zlrightbg" style="padding:50px 0; background:url(/images/09.png) center top no-repeat #ffffff;">
    <div class="container_03">
        <div class="col-md-3 m_none" style="padding:0;">
            @php
            if (!isset($to)) {
                $tometa = null;
            }else{
                $tometa = $to->meta_();
                if(isset($tometa->city)){
                    $tometa->city = explode(",",$tometa->city);
                    $tometa->area = explode(",",$tometa->area);
                }
            }
            if(!in_array($tometa->occupation, array('學生','待業','休學','打工','上班族'))){
            	$tometa->occupation = '上班族';
            }
            @endphp
            <div class="gezl"><img class="hypic" src="@if($tometa->isAvatarHidden == 1) {{ 'makesomeerror' }} @else {{$tometa->pic}} @endif" class="weui-bod_r weui-box_s gezl" onerror="this.src=@if ($to->engroup == 1) '/img/male-avatar.png' @else '/img/female-avatar.png' @endif"></div>
            <ul style="color:#575757;">
                <li class="weui-pt30 adwidth">
                       <img src="/images/3_14.png" class="ad_left"> 
                       <div class="weui-v_m weui-dnb weui-pl5">
                           <span class="vip_a">{{$be_fav_count}}</span>
                           <span class="">粉絲</span>
                       </div>
                </li>
                <li class="weui-pt30 adwidth">
                       <img src="/images/3_17.png" class="ad_left"> 
                       <div class="weui-v_m weui-dnb weui-pl5">
                           <span class="vip_a" >{{$be_visit_other_count}}</span>
                           <span class="">被瀏覽次數</span>
                       </div>
                </li>
                <li class="weui-pt30 adwidth">
                       <img src="/images/3_20.png" class="ad_left"> 
                       <div class="weui-v_m weui-dnb weui-pl5">
                           <span class="vip_a">{{$tip_count}}</span>
                           <span class="">車馬費邀請次數</span>
                       </div>
                </li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="r_content">
                <div class="oth_tx clearfix picleft">
                    <div class="qpic" style="margin-bottom: 35px;">
                        <img  class="hypic" src="@if($tometa->isAvatarHidden == 1) {{ 'makesomeerror' }} @else {{$tometa->pic}} @endif" onerror="this.src=@if ($to->engroup == 1) '/img/male-avatar.png' @else '/img/female-avatar.png' @endif">
                    </div>
                </div>
                <div class="weui-f24 picleft_font" style="color:#3c2726;"><b class="weui-f36 weui-v_t">{{ mb_substr($to->name, 0, 7) }}</b>
                	@if(!empty($tometa->city))
                	    <span class="weui-pl30 add weui-v_m">{{ head($tometa->city) }}
                	    @if($tometa->isHideArea == '0')
                	        {{ head($tometa->area) }}
                	    @endif
                	    </span>
                	@else 
                	    保密 
                	@endif
                </div>
                <p class="weui-f20" style="color:#786465;"></p>
                <div class=" weui-t_r tb clearfix">
                    <div class="huiyuan picwidth">
                        <div class="hylist">
                            <a href="/dashboard/chatShow/{{$to->id}}}" class=" weui-dnb"><img src="/images/3_06.png" width="49"> 發送訊息</a>
                        </div>
                        <div class="hylist2">
                            <form action="/dashboard/fav" method="POST">
                                {!! csrf_field() !!}
                                <input type="hidden" name="to" value="{{$to->id}}">
                                <button type="submit" style="background: none; border: none; padding: 0">
                                    <div class=" weui-dnb weui-v_m xin" style="width: 50px;height: 50px;background: url(/images/icon_14.png) center no-repeat;background-size: 100% 100%;"></div> 收藏
                                </button>
                            </form>
                        </div>
                        <div class="hylist2">
                            <form action="/dashboard/report" class="m-nav__link" method="POST">
                                {!! csrf_field() !!}
                                <input type="hidden" name="to" value="{{$to->id}}">
                                <button type="submit" style="background: none; border: none; padding: 0">
                                    <div class=" weui-dnb weui-v_m xin" style="width: 50px;height: 50px;background: url(/images/new_03.png) center no-repeat;background-size: 100% 100%;"></div> 檢舉
                                </button>
                            </form>
                        </div>
                        @php $isBlocked = \App\Models\Blocked::isBlocked($user->id, $to->id); @endphp
                        @if($isBlocked)
                            <div class="hylist2">
                                <form action="/dashboard/unblock" class="m-nav__link" method="POST">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="to" value="{{$to->id}}">
                                    <button type="submit" style="background: none; border: none; padding: 0;white-space:nowrap;">
                                        <div class=" xin weui-dnb weui-v_m" style="width: 50px;height: 50px;background: url(/images/new_05_1.png) center no-repeat;background-size: 100% 100%;"></div> 解除封鎖
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="hylist2">
                                <form action="/dashboard/block" class="m-nav__link" method="POST">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="to" value="{{$to->id}}">
                                    <button type="submit" style="background: none; border: none; padding: 0;">
                                        <div class=" xin weui-dnb weui-v_m" style="width: 50px;height: 50px;background: url(/images/new_05.png) center no-repeat;background-size: 100% 100%;"></div> 封鎖
                                    </button>
                                </form>
                            </div>
                         @endif
                    </div>
                </div>
                <div class="clearfix otn_tit huline">
                    <span class="weui-fl weui-f24 weui-pt10 weui-pb15" style="color:#3c2726;">生活照</span>
                </div>
                <div class="row weui-mt15">
                    @foreach($member_pic as $row)
                        {{-- @if($row->isHidden == 1)
                            <img src="{{ 'makesomeerror' }}" width="96px" style="margin:5px" height="96px" 
                            onerror="this.src=@if($to->engroup == 1) '/img/male-avatar.png' @else '/img/female-avatar.png' @endif">
                        @else --}}
                        <li class="hy_w">
                            <a href="{{$row->pic}}" class="hypic_1">
                                <div class="hypic_1">
                                    <img src="{{$row->pic}}" width="96px" style="margin:5px" height="96px" 
                                    onerror="this.src=@if($to->engroup == 1) '/img/male-avatar.png' @else '/img/female-avatar.png' @endif">
                                </div>
                            </a>
                        </li>
                        {{-- @endif --}}
                    @endforeach
                </div>
                <div class="clearfix weui-mt30 otn_tit ">
                    <span class="weui-fl weui-f24 weui-pt10" style="color:#3c2726;">基本資料</span>
                    <span class="weui-fr"><img src="/images/z_03.png"></span>
                </div>
                <ul class="pe_data">
                    <li class="nic"><span>暱稱</span>{{ mb_substr($to->name, 0, 7) }}</li>
                    <li class="nic">
                        <span>地區</span>
                        @if(!empty($tometa->city))
                            {{ head($tometa->city) }}
                            @if($tometa->isHideArea == '0')
                                {{ head($tometa->area) }}
                            @endif
                        @else 
                            保密 
                        @endif
                    </li>
                    <li><span>年齡</span>{{$tometa->age()}}</li>
                    <li><span>生日</span>{{ date('Y-m-d', strtotime($tometa->birthdate)) }}</li>
                    <li><span>身高</span>{{$tometa->height}}(CM)</li>
                    <li><span>體型</span>@if(isset($tometa->body) AND $tometa->body != '0' AND $tometa->body != 'null') {{ $tometa->body }} @else 不公開 @endif</li>
                    {{-- @if(!empty($tometa->weight))<li><span>體重</span>{{$tometa->weight}}(KG)</li>@endif --}}
                    <li><span>預算</span>@if(isset($tometa->budget) AND $tometa->budget != '0' AND $tometa->budget != 'null') {{ $tometa->budget }} @else 不公開 @endif</li>
                    <li><span>教育</span>@if(isset($tometa->education) AND $tometa->education != '0' AND $tometa->education != 'null') {{ $tometa->education }} @else 不公開 @endif</li>
                    <li><span>婚姻</span>{{$tometa->marriage}}</li>
                    @if($to->engroup == 2)
                        <li><span>現狀</span>{{ $tometa->situation }}</li>
                        @if(!empty($tometa->cup) && $tometa->isHideCup == '0')<li><span>CUP</span>{{$tometa->cup}}</li>@endif
                    @endif
                </ul>
                <div class="row">
                    <div class="col-md-12 col-xs-12" style="padding:30px 0px 0 0">
                        <span class="weui-dnb weui-bgcolor weui-t_c weui-p20 weui-mr10">
                            @if($tometa->smoking=='不抽')
                                <img src="/images/smoking_01.jpg" style="width:90px;height:90px">
                            @elseif($tometa->smoking=='偶爾抽')
                                <img src="/images/smoking_02.jpg" style="width:90px;height:90px">
                            @elseif($tometa->smoking=='常抽')
                                <img src="/images/smoking_03.jpg" style="width:90px;height:90px">
                            @endif
                            <p class="weui-pt10">{{$tometa->smoking}}</p>
                        </span>
                        
                        <span class="weui-dnb weui-bgcolor weui-t_c weui-p20">
                            @if($tometa->drinking=='不喝')
                                <img src="/images/drinking_01.jpg" style="width:90px;height:90px">
                            @elseif($tometa->drinking=='偶爾喝')
                                <img src="/images/drinking_02.jpg" style="width:90px;height:90px">
                            @elseif($tometa->drinking=='常喝')
                                <img src="/images/drinking_03.jpg" style="width:90px;height:90px">
                            @endif
                            <p class="weui-pt10">{{$tometa->drinking}}</p>
                        </span>
                    </div>
                </div>
                <div class="clearfix weui-mt30 otn_tit">
                    <span class="weui-fl weui-f24 weui-pt10" style="color:#3c2726;">關於我</span>
                    <span class="weui-fr"><img src="/images/z_06.png"></span>
                </div>
                <div class="weui-p20 weui-bgcolor weui-c_9" style="word-wrap: break-word;">
                    {!! nl2br($tometa->about) !!}
                </div>
                <div class="clearfix weui-mt30 otn_tit">
                    <span class="weui-fl weui-f24 weui-pt10" style="color:#3c2726;">期待約會模式</span>
                    <span class="weui-fr"><img src="/images/data_03.png"></span>
                </div>
                <div class="weui-p20 weui-mt10 weui-bgcolor weui-c_9" style="word-wrap: break-word;">
                    {!! nl2br($tometa->style) !!}
                </div>
                {{-- @if($user->isVip()) --}}
                    <div class="m_block">
                        <a href="javascript:void(0);" onclick="dh_change();" class="adziliao">進階資料</a>
                        @if($user->isVip())
                        <div style="display:none" id="div1">
                            <div class="clearfix weui-mt10 otn_tit">
                                <span class="weui-fl weui-f24 weui-pt10" style="color:#3c2726;">進階資料</span>
                                <span class="weui-fr jfefont"><img src="/images/jf.png"></span>
                            </div>
                            <ul class="advanced_data">
                                {{-- <li><span>粉絲</span>{{ $be_fav_count }}</li> --}}
                                <li><span>帳號建立時間</span>{{ substr($to->created_at,0,10) }}</li>
                                <li><span>上次登入時間</span>{{ substr($to->last_login,0,10) }}</li>
                                <li><span>被收藏次數</span>{{ $be_fav_count }}</li>
                                <li><span>車馬費邀請次數</span>{{ $tip_count }}</li>
                                <li><span>收藏會員次數</span>{{ $fav_count }}</li>
                                <li><span>瀏覽其他會員次數</span>{{ $visit_other_count }}</li>
                                <li><span>被瀏覽次數</span>{{ $be_visit_other_count }}</li>
                                <li><span>過去7天被瀏覽次數</span>{{ $be_visit_other_count_7 }}</li>
                                <li><span>發信次數</span>{{ $message_count }}</li>
                                <li><span>是否看過我</span>{{ $is_visit_mid }}</li>
                                <li><span>是否封鎖我</span>{{ $is_block_mid }}</li>
                            </ul>
                        </div>
                        @endif
                    </div>
                {{-- @endif --}}
            </div>
        </div>
    </div>
</div>
@stop

@section('javascript')
<script type="text/javascript">
function dh_change(){
    if("{{ $user->isVip() }}"==1){
        var o = document.getElementById("div1").style.display; 
        if(o=="none"){document.getElementById("div1").style.display = "";
        }else{document.getElementById("div1").style.display = "none";}
    }else{
        $('.prompt').html('');
        $('.prompt').append('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><ul class="quarx-errors"><li>需要先升級成為VIP會員才可以查看進階資料</li></ul></div>');
        $('html,body').animate({scrollTop:0}, 333);
    }
}
</script>
@stop
