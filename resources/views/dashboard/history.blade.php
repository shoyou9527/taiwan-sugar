@extends('layouts.main')

@section('app-content')
<div class="col-md-9 zlrightbg">
    <div class="" style="background:url(/images/11.png) right bottom no-repeat #fff;">
        <div class="p100 weui-f18">
            <div class="lytitle ffs"><i></i>足跡</div>
            <div class="row weui-t_c weui_mt19">
                @forelse ($visitors as $visitor)
                    @php 
                        $histUser = \App\Models\User::findById($visitor->member_id);
                    @endphp
                    @if(isset($histUser))
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-6 bottomline">
                            <a href="/dashboard/viewuser/{{$histUser->id}}" class="weui-db">
                                <div class="n_border">
                                    <img class="hypic yichub" src="@if($histUser->meta_()->isAvatarHidden) {{ 'makesomeerror' }} 
                                        @else {{$histUser->meta_()->pic}} 
                                        @endif" 
                                        onerror="this.src=@if ($histUser->engroup == 1) '/img/male-avatar.png' 
                                        @else '/img/female-avatar.png' 
                                        @endif">
                                </div>
                                <p class="weui-pt15 font_14">{{ mb_substr($histUser->name, 0, 7) }} 
                                    @if($histUser->isVip())<img src="/images/05.png" class="weui-v_t">@endif
                                </p>
                                <p class="weui-c_9 lytitle_aa">{{ $visitor->created_at or '2018-01-01 00:00:00' }}</p>
                            </a>
                        </div>
                    @endif
                @empty
                    沒有資料!!
                @endforelse
            </div>
            <nav aria-label="Page navigation" class="se_page0  bomtop10" style="text-align: center;font-size:14px">
                {!! $visitors->render() !!}
            </nav>
        </div>
    </div>
</div>
@stop