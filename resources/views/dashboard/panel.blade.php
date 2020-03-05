<div class="col-sm-12 col-xs-12 col-md-3 zleft">
    <div class="zlfont">
        <img src="{{ $user->meta_()->pic }}" onerror="this.src='/images/male-avatar.png'" class="zlfont_img">
        <span>
            {{ $user->name }}
            @if($user->isVip())
                <img src="/images/05.png" class="weui-v_t">
            @endif
        </span>
    </div>
    <div class="zllist">
        <a href="{!! url('dashboard') !!}" class="info"><span>個人資料修改</span></a>
        <a href="{!! url('dashboard/search') !!}" class="search"><span>搜尋</span></a>
        <a href="{!! url('dashboard/chat') !!}" class="inbox">
            <span>收件夾</span>
            <span class="m-nav__link-badge">
                <span class="m-badge m-badge--danger">{{ \App\Models\Message::unread($user->id) }}</span>
            </span>
        </a>
        <a href="{!! url('/dashboard/history') !!}" class="footprint"><span>足跡</span></a>
        <a href="{!! url('/dashboard/board') !!}" class="board"><span>留言板</span></a>
        @if($user->isVip())
            <a href="{!! url('/dashboard/cancel') !!}" class="cancel"><span>取消VIP</span></a>
        @else
            <a href="{!! url('/dashboard/upgrade') !!}" class="cancel"><span>升級VIP</span></a>
        @endif
        <a href="{!! url('/dashboard/fav') !!}" class="favorite"><span>收藏</span></a>
        <a href="{!! url('/dashboard/block') !!}" class="block"><span>我的封鎖名單</span></a>
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
            if( href == url + '/dashboard/upgrade' ){
                $('.upgrade').prepend("<i></i>");
                $('.upgrade').addClass("zllist_on");
            }
            if( href == url + '/dashboard/upgrade' ){
                $('.upgrade').prepend("<i></i>");
                $('.upgrade').addClass("zllist_on");
            }
            if( href == url + '/dashboard/fav' ){
                $('.favorite').prepend("<i></i>");
                $('.favorite').addClass("zllist_on");
            }
            if( href == url + '/dashboard/history' ){
                $('.footprint').prepend("<i></i>");
                $('.footprint').addClass("zllist_on");
            }
            if( href == url + '/dashboard/block' ){
                $('.block').prepend("<i></i>");
                $('.block').addClass("zllist_on");
            }
        }
    );
</script>