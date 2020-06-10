<div class="col-sm-12 col-xs-12 col-md-3 zleft">

    <div class="zlfont"> 
        <div class="nzl_img">
            <img class="hypic" src="{{ $user->meta_()->pic }}" onerror="this.src=@if($user->engroup == 1) '/img/male-avatar.png' @else '/img/female-avatar.png' @endif">
        </div>
        <span>
            {{ $user->name }}
            @if($user->isVip())
                <img src="/images/05.png" class="weui-v_t">
            @endif
        </span> 
    </div>
    <div class="zllist">
        <a href="{!! url('dashboard') !!}" class="info">
            <span>個人資料修改</span>
        </a>

        <a href="{!! url('dashboard/search') !!}" class="search">
            <span>搜尋</span>
        </a>

        <a href="{!! url('dashboard/chat') !!}" class="inbox @if(str_contains(url()->current(), '/dashboard/chat')) zllist_on @endif">
            @if (str_contains(url()->current(), '/dashboard/chat'))<i></i>@endif
            <span>收件夾</span>
            <span class="m-nav__link-badge">
                <span class="m-badge m-badge--danger">{{ \App\Models\Message::unread($user->id) }}</span>
            </span>
        </a>
        

        <a href="{!! url('/dashboard/history') !!}" class="footprint @if(str_contains(url()->current(), '/dashboard/history')) zllist_on @endif">
            @if (str_contains(url()->current(), '/dashboard/history'))<i></i>@endif
            <span>足跡</span>
        </a>

        {{-- <a href="{!! url('/dashboard/board') !!}" class="board">
            <span>留言板</span>
        </a> --}}

        @if($user->isVip())
            <a href="{!! url('/dashboard/cancel') !!}" class="cancel cancelvip">
                <span>取消VIP</span>
            </a>
        @else
            <a href="{!! url('/dashboard/upgrade') !!}" class="upgrade">
                <span>升級VIP</span>
            </a>
        @endif

        <a href="{!! url('/dashboard/fav') !!}" class="favorite @if(str_contains(url()->current(), '/dashboard/fav')) zllist_on @endif">
            @if (str_contains(url()->current(), '/dashboard/fav'))<i></i>@endif
            <span>收藏</span>
        </a>

        <a href="{!! url('/dashboard/block') !!}" class="block @if(str_contains(url()->current(), '/dashboard/block')) zllist_on @endif">
            @if (str_contains(url()->current(), '/dashboard/block'))<i></i>@endif
            <span>我的封鎖名單</span>
        </a>

        <a href="{!! url('logout') !!}" class=""><span>登出</span></a>
    </div>
</div>
<script>
$(document).ready(
    function(){
        let href = window.location.href, url = "{!! url('') !!}";
        if( href == url + '/dashboard' ){
            $('.info').prepend("<i></i>");
            $('.info').addClass("zllist_on");
        }
        if( href.indexOf('chat') >= 0 ){
            $('.inbox').prepend("<i></i>");
            $('.inbox').addClass("zllist_on");
        }
        if( href == url + '/dashboard/board' ){
            $('.board').prepend("<i></i>");
            $('.board').addClass("zllist_on");
        }
        if( href == url + '/dashboard/cancel' ){
            $('.cancel').prepend("<i></i>");
            $('.cancel').addClass("zllist_on");
        }
        if( href == url + '/dashboard/upgrade' ){
            $('.upgrade').prepend("<i></i>");
            $('.upgrade').addClass("zllist_on");
        }
        if( href == url + '/dashboard_img' ){
            $('.upgrade').prepend("<i></i>");
            $('.upgrade').addClass("zllist_on");
        }
        // if( href == url + '/dashboard/fav' ){
        //     $('.favorite').prepend("<i></i>");
        //     $('.favorite').addClass("zllist_on");
        // }
        // if( href == url + '/dashboard/history' ){
        //     $('.footprint').prepend("<i></i>");
        //     $('.footprint').addClass("zllist_on");
        // }
        // if( href == url + '/dashboard/block' ){
        //     $('.block').prepend("<i></i>");
        //     $('.block').addClass("zllist_on");
        // }

        // 升級VIP內容
        $('.upgradevip').on('click', function(event) {
            var r = confirm("加入 VIP 須知。\n●加入VIP後將於每月於第一次刷卡日期自動扣款，至取消為止。\n●升級VIP之後，升級VIP的選項會變成取消VIP，取消後次月即停止扣款\n●訊息不會被過濾掉(會員可以設定拒接非VIP會員來信)\n●不受限制的收發信件(下個月起普通會員收發信件總數將受限)\n●可以觀看進階統計資料\n●可以知道訊息是否已讀\n●可以知道對方是否封鎖自己\n●您申請每月自動扣款並完成繳費，經確認繳費程序完成且已成功開啟本站相關服務設定，即視同您已經開始使用所購買之每月自動扣款\n●最短使用期為「30天」，若您申請取消時間未滿「30天」，則將被收取「30天」的費用。\n★取消 VIP 時間需要七個工作天，如下個月不續約請提前取消，以免權益受損！★");
            if(!r) {
                event.preventDefault();
            }
        });

        // 取消VIP內容
        $('.cancelvip').on('click', function(event) {
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
    }
);
</script>