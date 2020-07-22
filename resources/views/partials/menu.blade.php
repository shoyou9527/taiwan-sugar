<header class="header headerbg weui-pb10 weui-pt10">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header @if(isset($user) AND $user->meta_()->is_active!=1) topr @endif">
                @if(isset($user) AND $user->meta_()->is_active!=1)
                {{-- 若無驗證的會員只給登出文字連結 --}}
                <a href="{!! url('logout') !!}" class="weui-fr weui-white weui-mr30 weui-pt15 toprig top_zc">登出</a>
                @else
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#example-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">切换引導列</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                @endif
                <a class=" weui-fl weui-pl10 weui-pt5" href="{!! url('') !!}"><img src="/images/homeicon.png"></a>
            </div>
            <div class="navbar-collapse weui-fr collapse" id="example-navbar-collapse" style="">
                @if(Session::has('original_user'))
                    <div class="ndlrfont">
                        <a href="{{ route('escape') }}" class="m-nav__link m-dropdown__toggle">
                            回到原使用者
                        </a>
                    </div>
                @endif
                <div class="weui-fr  weui-white coleft toplink">
                    @if(isset($user) AND $user->meta_()->is_active==1)
                    <div class="conterleft">
                        <a href="{!! url('dashboard') !!}"><i><img src="/images/ic_01.png"></i><span>個人資料</span></a>
                    </div>
                    <div class="conterleft">
                        <a href="{!! url('dashboard/search') !!}"><i><img src="/images/ic_02.png"></i><span>搜尋</span></a>
                    </div>
                    <div class="conterleft">
                        <a href="{!! url('dashboard/chat') !!}"><i ><img src="/images/ic_03.png"></i><span>收件夾</span></a>
                    </div>
                    <div class="conterleft">
                        <a onclick="cl()"><i><img src="/images/ic_04.png"></i><span>VIP</span></a>
                    </div>
                    <div class="conterleft">
                        <a href="{!! url('logout') !!}"><i><img src="/images/ic_05.png"></i><span>登出</span></a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>
<div class="blbg" onclick="gmBtn1()"></div>
<div class="bl bl_tab" id="tab01">
    <img src="/images/jt.png" class="jt">
    <div class="bl_icon">
        <li>
            @if(isset($user))
                @if($user->isVip())
                    <a href="{!! url('/dashboard/cancel') !!}" class="cancelvipmenu"><img src="/images/icon_12.png">
                        <font>取消VIP</font>
                    </a>
                @else
                    <a href="{!! url('/dashboard/upgrade') !!}"><img src="/images/icon_12.png">
                        <font>升級VIP</font>
                    </a>
                @endif
            @endif
        </li>
        <li>
            <a href="{!! url('/dashboard/history') !!}"><img src="/images/icon_13.png">
                <font>足跡</font>
            </a>
        </li>
        <li>
            <a href="{!! url('/dashboard/fav') !!}"><img src="/images/icon_14.png">
                <font>收藏</font>
            </a>
        </li>
        <li>
            <a href="{!! url('/dashboard/block') !!}"><img src="/images/icon_16.png">
                <font>封鎖</font>
            </a>
        </li>
    </div>
</div>
<script>
    function cl() {
        $(".blbg").show()
        $("#tab01").show()
    }
    function gmBtn1() {
        $(".blbg").hide()
        $(".bl").hide()
    }

    // 取消VIP內容
    $('.cancelvipmenu').on('click', function(event) {
        @if(!$user->isFreeVip())
            {{--@if(isset($vipLessThan7days) && $vipLessThan7days)
                var r = confirm("取消 VIP 須知。\n●最短使用期為「30天」，若您申請取消時間未滿「30天」，則將被收取「30天」的費用。\n★取消 VIP 時間需要七個工作天，如下個月不續約請提前取消，以免權益受損！★\n★★若取消時間低於七個工作天，則下個月將會繼續扣款，並且 VIP 時間延長至下下個月為止。★★\n★★由於您於本日" + "{{ \Carbon\Carbon::now()->toDateString() }}" + "申請取消 VIP 。您每月的 VIP 扣款日期為 " + "{{ $vipRenewDay }}" + " 日。取消扣款作業需七個工作天(申請VIP時有提示)，本月取消作業不及，下個月將會進行最後一次扣款，您的 VIP 時間將會到 " + "{{ $vipNextMonth->toDateString() }}" + "。不便之處敬請見諒。★★");
            @else--}}
                var r = confirm("取消 VIP 須知。\n●最短使用期為「30天」，若您申請取消時間未滿「30天」，則將被收取「30天」的費用。\n★取消 VIP 時間需要七個工作天，如下個月不續約請提前取消，以免權益受損！★\n★★若取消時間低於七個工作天，則下個月將會繼續扣款，並且 VIP 時間延長至下下個月為止。★★");
            {{--@endif--}}

            if(!r) {
                event.preventDefault();
            }
        @endif
    });


</script>