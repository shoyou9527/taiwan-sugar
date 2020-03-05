@extends('layouts.main2d')

@section('app-content')
    <style>
        .m-content{
            background:#f8f5f0;width:100%; display:table;
        }
        .zlrightbg{
            padding:50px 0; background:url(/images/09.png) center top no-repeat #ffffff;
        }
    </style>
    <div class="col-md-9 zlrightbg">
        <div class="container_03">
            <div class="col-md-3 m_none">
                                    
                <div><img src="{{$to->meta_()->pic}}" class="weui-bod_r weui-box_s gezl" onerror="this.src=@if ($to->meta_()->engroup == 1) '/img/male-avatar.png' @else '/img/female-avatar.png' @endif"></div>
                <ul style="color:#575757;">
                    <li class="weui-pt30"><img src="/images/3_14.png" class="n_huiyuan"> <span class="weui-v_m weui-dnb weui-pl5"><span class="weui-f24 weui-f_b">{{$be_fav_count}}</span>粉絲</span></li>
                    <li class="weui-pt30"><img src="/images/3_17.png" class="n_huiyuan"> <span class="weui-v_m weui-dnb weui-pl5"><span class="weui-f24 weui-f_b">{{$be_visit_other_count}}</span>被瀏覽次數</span>
                    </li>
                    <li class="weui-pt30"><img src="/images/3_20.png" class="n_huiyuan"> <span class="weui-v_m weui-dnb weui-pl5"><span class="weui-f24 weui-f_b">{{$tip_count}}</span>車馬費邀請次數</span>
                    </li>
                </ul>
                @if($user->isVip())
                    <h3 class="weui-bb weui-pb15 weui-pt30 weui-f20 weui-pl15" style="color:#9f8e63;">進階資料</h3>
                    <div class="weui-pl15 jjzl weui-f16">
                        <dl class="weui-pt20">
                            <dt>帳號建立時間</dt>
                            <dd class="weui-c_9">{{substr($to->created_at,0,10)}}</dd>
                        </dl>
                        <dl>
                            <dt>上次登入時間</dt>
                            <dd class="weui-c_9">{{substr($to->last_login,0,10)}}</dd>
                        </dl>
                        <dl class="weui-pt20">
                            <dt>被收藏次數</dt>
                            <dd class="weui-c_9">{{$be_fav_count}}</dd>
                        </dl>
                        <dl>
                            <dt>收藏會員次數</dt>
                            <dd class="weui-c_9">{{$fav_count}}</dd>
                        </dl>
                        <dl>
                            <dt>瀏覽其他會員次數</dt>
                            <dd class="weui-c_9">{{$visit_other_count}}</dd>
                        </dl>
                        <dl>
                            <dt>被瀏覽次數</dt>
                            <dd class="weui-c_9">{{$visit_other_count}}</dd>
                        </dl>
                        <dl>
                            <dt>過去7天被瀏覽次數</dt>
                            <dd class="weui-c_9">{{$be_visit_other_count_7}}</dd>
                        </dl>
                        <dl>
                            <dt>發信次數</dt>
                            <dd class="weui-c_9">{{$message_count}}</dd>
                        </dl>
                        <dl>
                            <dt>是否看過我</dt>
                            <dd class="weui-c_9">{{$is_visit_mid}}</dd>
                        </dl>
                        <dl>
                            <dt>是否封鎖我</dt>
                            <dd class="weui-c_9">{{$is_block_mid}}</dd>
                        </dl>
                    </div>
                @endif
            </div>
            <div class="col-md-9">
                <div class="r_content">
                    <div class="oth_tx clearfix">
                        <div class="pic picleft"><img src="{{$to->meta_()->pic}}" onerror="this.src=@if ($to->meta_()->engroup == 1) '/img/male-avatar.png' @else '/img/female-avatar.png' @endif">
                        </div>
                    </div>
                    <div class="weui-f24 picleft_font" style="color:#3c2726;"><b class="weui-f36 weui-v_t">{{$to->name}}</b> <span class="weui-pl30 add weui-v_m">新北市,土城區</span></div>
                    <p class="weui-f20" style="color:#786465;"></p>
                    <div class=" weui-t_r tb clearfix">
                        <div class="huiyuan picwidth">
                            <div class="hylist">
                                <a href="/dashboard/chatShow/{{$to->id}}}" class=" weui-dnb"><img src="/images/3_06.png" width="49"> 發送訊息</a>
                            </div>
                            <div class="hylist2">
                                <form action="/dashboard/fav" method="POST">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="userId" value="{{$user->id}}">
                                    <input type="hidden" name="to" value="{{$to->id}}}">
                                    <button type="submit" style="background: none; border: none; padding: 0">
                                        <div class=" weui-dnb weui-v_m xin" style="width: 50px;height: 50px;background: url(/images/icon_14.png) center no-repeat;background-size: 100% 100%;"></div> 收藏
                                    </button>
                                </form>
                            </div>
                            <div class="hylist2">
                                <form action="/dashboard/report" class="m-nav__link" method="POST">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="userId" value="{{$user->id}}">
                                    <input type="hidden" name="to" value="{{$to->id}}}">
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
                                        <input type="hidden" name="userId" value="{{$user->id}}">
                                        <input type="hidden" name="to" value="{{$to->id}}}">
                                        <button type="submit" style="background: none; border: none; padding: 0">
                                            <div class=" xin weui-dnb weui-v_m" style="width: 50px;height: 50px;background: url(/images/new_05.png) center no-repeat;background-size: 100% 100%;"></div> 解封
                                        </button>
                                    </form>
                                </div>
                            @else
                                <div class="hylist2">
                                    <form action="/dashboard/block" class="m-nav__link" method="POST">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="userId" value="{{$user->id}}">
                                        <input type="hidden" name="to" value="{{$to->id}}}">
                                        <button type="submit" style="background: none; border: none; padding: 0">
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
                            <a href="{{$row->pic}}" target="_blank"><img src="{{$row->pic}}" width="96px" style="margin:5px" height="96px"></a>
                        @endforeach
                    </div>
                    <div class="clearfix weui-mt30 otn_tit ">
                        <span class="weui-fl weui-f24 weui-pt10" style="color:#3c2726;">關於我</span>
                        <span class="weui-fr"><img src="/images/z_03.png"></span>
                    </div>
                    <ul class="pe_data">
                        <li class="nic"><span>暱稱</span>{{$to->name}}</li>
                        <li class="nic"><span>地區</span>新北市,新店區</li>
                        <li><span>年齡</span>{{$to->meta_()->age()}}</li>
                        <li><span>生日</span>{{$to->meta_()->birthdate}}</li>
                        <li><span>身高</span>{{$to->meta_()->height}}(CM)</li>
                        <li><span>體型</span>{{$to->meta_()->body}}</li>
                        @if(!empty($to->meta_()->weight))<li><span>體重</span>{{$to->meta_()->weight}}(KG)</li>@endif
                        <li><span>預算</span>{{$to->meta_()->budget}}</li>
                        <li><span>教育</span>{{$to->meta_()->education}}</li>
                        <li><span>現狀</span>{{$to->meta_()->occupation}}</li>
                        @if(!empty($to->meta_()->marriage))<li><span>婚姻</span>{{$to->meta_()->marriage}}</li>@endif
                        @if(!empty($to->meta_()->cup) && $to->meta_()->isHideCup == '0')<li><span>CUP</span>{{$to->meta_()->cup}}</li>@endif
                    </ul>
                    <div class="row">
                        <div class="col-md-12 col-xs-12" style="padding:30px 0px 0 0">
                            <span class="weui-dnb weui-bgcolor weui-t_c weui-p20 weui-mr10">
                                <img src="/images/04.png">
                                <p class="weui-pt10">{{$to->meta_()->smoking}}</p>
                            </span>
                            <span class="weui-dnb weui-bgcolor weui-t_c weui-p20">
                                <img src="/images/03.png">
                                <p class="weui-pt10">{{$to->meta_()->drinking}}</p>
                            </span>
                        </div>
                    </div>
                    <div class="clearfix weui-mt30 otn_tit">
                        <span class="weui-fl weui-f24 weui-pt10" style="color:#3c2726;">關於我</span>
                        <span class="weui-fr"><img src="/images/z_06.png"></span>
                    </div>
                    <div class="weui-p20 weui-bgcolor weui-c_9">
                        {!! nl2br($to->meta_()->about) !!}
                    </div>
                    <div class="clearfix weui-mt30 otn_tit">
                        <span class="weui-fl weui-f24 weui-pt10" style="color:#3c2726;">期待約會模式</span>
                        <span class="weui-fr"><img src="/images/data_03.png"></span>
                    </div>
                    <div class="weui-p20 weui-mt10 weui-bgcolor weui-c_9">
                        {!! nl2br($to->meta_()->style) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    
@stop
