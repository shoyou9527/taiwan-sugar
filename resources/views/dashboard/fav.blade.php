@extends('layouts.main')

@section('app-content')
<div class="col-md-9 zlrightbg">
    <div class="p100 weui-f18 nwpawod">
        <div class="lytitle ffs"><i></i>收藏會員
        @if(!empty($_GET["r"])&&$_GET["r"]=="1") 
            <a href="/dashboard/fav" class="yichu_t">完成</a>
        @else 
            <a href="/dashboard/fav?r=1" class="yichu_t" >移除收藏</a>
        @endif
        </div>
        <div class="row weui-t_c weui_mt19">
            @forelse ($memberfavs as $memberfav)
                @php $favUser = \App\Models\User::findById($memberfav->member_fav_id) @endphp
                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-6 weui-pb20 bottomline">
                    <div class="yicw">
                        <img src="{{ $favUser->meta_()->pic }}" class="hypic yichub" 
                            onerror="this.src=@if($favUser->engroup == 1) '/img/male-avatar.png' @else '/img/female-avatar.png' @endif" >
                        <form action="{{ route('fav/remove') }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                            <input type="hidden" name="name" value="{{$favUser->name}}">
                            <input type="hidden" name="favUserId" value="{{$favUser->id}}">
                            <div class="yichu" style="cursor: pointer;@if(!empty($_GET["r"])&&$_GET["r"]=="1") display:block; @else display:none; @endif">
                                <input type="submit" style="background: none;" value="移除"></div>
                        </form>
                        <a href="/dashboard/viewuser/{{$favUser->id}}" class="weui-db">
                            <p class="weui-pt15" style="white-space:nowrap;">{{$favUser->name}} 
                                @if($favUser->isVip()) <img src="/images/05.png" class="weui-v_t"> @endif
                            </p>
                            <p class="weui-c_9 weui-f12">{{$memberfav->created_at}}</p>
                        </a>
                    </div>
                </div>
            @empty
                沒有資料!!
            @endforelse
        </div>
    </div>
    <nav aria-label="Page navigation" class="se_page0 newpage bomtop10" style="text-align: center;">
        {!! $memberfavs->appends(request()->all())->render() !!}
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