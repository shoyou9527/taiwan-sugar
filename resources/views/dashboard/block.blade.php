@extends('layouts.main')

@section('app-content')
<div class="col-md-9 zlrightbg newheight03">
    <div class="p100 weui-f18" style="background-color:white;">
        <div class="lytitle ffs"><i></i>封鎖名單
        @if(!empty($_GET["r"])&&$_GET["r"]=="1") 
            <a href="/dashboard/block" class="yichu_t">完成</a>
        @else 
            <a href="/dashboard/block?r=1" class="yichu_t">解除封鎖</a>
        @endif
        </div>
        <div class="row weui-t_c weui_mt19" style="min-height: 744px;">
            @forelse ($blocks as $block)
                @php $blockedUser = \App\Models\User::findById($block->blocked_id) @endphp
                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-6 bottomline">
                    <div class="yicw">
                        <img src="{{ $blockedUser->meta_()->pic }}" class="hypic yichub"
                            onerror="this.src=@if ($blockedUser->engroup == 1) '/img/male-avatar.png' @else '/img/female-avatar.png' @endif">
                        <form action="{{ route('unblock') }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                            <input type="hidden" name="name" value="{{$blockedUser->name}}">
                            <input type="hidden" name="to" value="{{$block->blocked_id}}">
                            <div class="yichu" style="cursor: pointer;@if(!empty($_GET["r"])&&$_GET["r"]=="1") display:block; @else display:none; @endif">
                                <input type="submit" style="background: none;" value="解除"></div>
                        </form>
                        <a href="/dashboard/viewuser/{{$blockedUser->id}}" class="weui-db">
                            <p class="weui-pt15" style="white-space:nowrap;">{{$blockedUser->name}}
                                @if($blockedUser->isVip())<img src="/images/05.png" class="weui-v_t">@endif
                            </p>
                            <p class="weui-c_9 weui-f12">{{$block->created_at}}</p>
                        </a>
                    </div>
                </div>
            @empty
                沒有資料!!
            @endforelse
        </div>
    </div>
    <nav aria-label="Page navigation" class="se_page0 newpage bomtop10" style="text-align: center;">
        {!! $blocks->appends(request()->all())->render() !!}
    </nav>
</div>
@stop

@section('javascript')
<script>
    $(".yichu_t").click(function() {
        $(".yichu").toggle();
    });
</script>
@stop
