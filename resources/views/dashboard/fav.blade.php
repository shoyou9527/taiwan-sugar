@extends('layouts.main')

@section('app-content')
<div class="col-md-9 zlrightbg">
    <div class="" style="background:url(/images/11.png) right bottom no-repeat #fff;">
        <div class="p100 weui-f18">
            <div class="lytitle ffs"><i></i>收藏會員
                @if(!empty($_GET["r"])&&$_GET["r"]=="1") 
                    <a href="/dashboard/fav?page={{ $memberfavs->currentPage() }}" class="yichu_t">完成</a>
                @else 
                    <a href="/dashboard/fav?r=1&page={{ $memberfavs->currentPage() }}" class="yichu_t" >移除收藏</a>
                @endif
            </div>
            <div class="row weui-t_c weui_mt19">
                @forelse ($memberfavs as $memberfav)
                    @php $favUser = \App\Models\User::findById($memberfav->member_fav_id) @endphp
                    @if(isset($favUser))
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-6 weui-pb20 bottomline">
                        <a href="/dashboard/viewuser/{{$favUser->id}}" class="weui-db">
                            <div class="n_border">
                                <img src="{{ $favUser->meta_()->pic }}" onerror="this.src=@if($favUser->engroup == 1) '/img/male-avatar.png' @else '/img/female-avatar.png' @endif" alt="" class="hypic">
                                <form action="{{ route('fav/remove') }}" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                                    <input type="hidden" name="name" value="{{$favUser->name}}">
                                    <input type="hidden" name="favUserId" value="{{$favUser->id}}">
                                    <div class="yichu" style="cursor: pointer;@if(!empty($_GET["r"])&&$_GET["r"]=="1") display:block; @else display:none; @endif">
                                        <input type="submit" style="background: none;" value="移除"></div>
                                </form>
                            </div>
                            <p class="weui-pt15 font_14">{{ mb_substr($favUser->name, 0, 7) }}@if($favUser->isVip()) <img src="/images/05.png" class="weui-v_t"> @endif</p>
                        </a>
                    </div>
                    @endif
                @empty
                    沒有資料!!
                @endforelse
            </div>
            <nav aria-label="Page navigation" class="se_page0  bomtop10" style="text-align: center;font-size:14px">
                {!! $memberfavs->appends(request()->all())->render() !!}
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