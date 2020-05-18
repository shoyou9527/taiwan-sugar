@extends('layouts.main')

@section('app-content')
<div class="col-md-9 zlrightbg wfheight">
    <div class="" style="background:url(/images/11.png) right bottom no-repeat #fff;">
        <div class="p100 weui-f18">
            <div class="lytitle ffs"><i></i>封鎖名單
                @if(!empty($_GET["r"])&&$_GET["r"]=="1") 
                    <a href="/dashboard/block?page={{ $blocks->currentPage() }}" class="yichu_t">完成</a>
                @else 
                    <a href="/dashboard/block?r=1&page={{ $blocks->currentPage() }}" class="yichu_t">解除封鎖</a>
                @endif
            </div>
            <div class="row weui-t_c weui_mt19 fs_height">
                @forelse ($blocks as $block)
                    @php $blockedUser = \App\Models\User::findById($block->blocked_id) @endphp
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-6 weui-pb20 bottomline">
                        <a href="/dashboard/viewuser/{{$blockedUser->id}}" class="weui-db">
                            <div class="n_border">
                                <img src="{{ $blockedUser->meta_()->pic }}" onerror="this.src=@if ($blockedUser->engroup == 1) '/img/male-avatar.png' @else '/img/female-avatar.png' @endif" alt="" class="hypic">
                                <form action="{{ route('unblock') }}" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                                    <input type="hidden" name="name" value="{{$blockedUser->name}}">
                                    <input type="hidden" name="to" value="{{$block->blocked_id}}">
                                    <div class="yichu" style="cursor: pointer;@if(!empty($_GET["r"])&&$_GET["r"]=="1") display:block; @else display:none; @endif">
                                        <input type="submit" style="background: none;" value="解除"></div>
                                </form>
                            </div>
                            <p class="weui-pt15 font_14">{{ mb_substr($blockedUser->name, 0, 7) }}@if($blockedUser->isVip())<img src="/images/05.png" class="weui-v_t">@endif</p>
                        </a>
                    </div>
                @empty
                    沒有資料!!
                @endforelse
            </div>
            <nav aria-label="Page navigation" class="se_page0  bomtop10" style="text-align: center; font-size:14px">
                {!! $blocks->appends(request()->all())->render() !!}
            </nav>
        </div>
    </div>
</div>
@stop

@section('javascript')
<script>
    $(".yichu_t").click(function() {
        $(".yichu").toggle();
    });
</script>
@stop
