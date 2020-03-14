@extends('layouts.main2d')

@section('app-content')
<style>
    .new_line{ border-bottom:#eeeeee 1px solid !important; margin-bottom:34px !important;}
</style>

<div class="col-md-9 zlrightbg">
    <div class="p100 weui-f18">
        <div class="l_zlxc" style="margin-top:-14px; margin-bottom:8px;">
            <div class="lytitle"><i></i>足跡</div>
        </div>
        @forelse ($visitors as $visitor)
            @php 
                $histUser = \App\Models\User::findById($visitor->member_id);
            @endphp
            @if(isset($histUser))
                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-4 weui-pb20 lytitle_aa new_line">
                    <a href="/user/view/{{$histUser->id}}" style="text-align: center; vertical-align: middle!important;" class="weui-db">
                        <img src="@if($histUser->meta_()->isAvatarHidden) {{ 'makesomeerror' }} @else {{$histUser->meta_()->pic}} @endif" onerror="this.src=@if ($histUser->engroup == 1) '/img/male-avatar.png' @else '/img/female-avatar.png' @endif" height="220" class="m_img">
                        <p class="weui-pt15 hiy_id"><span class="polfont">@if ($histUser->isVip()) <img src="/images/05.png" class="weui-v_t"> @endif</span><span>{{ $histUser->name }}</span></p>
                        <p class="weui-c_9">{{ $visitor->created_at }}</p>
                    </a>
                </div>
            @endif
        @empty
            沒有資料!!
        @endforelse
        <nav aria-label="Page navigation" class="se_page0 newpage" style="text-align: center;">
            {!! $visitors->render() !!}
        </nav>
    </div>
</div>

@stop

@section ('javascript')
<script>
$(document).ready(function() {
    $('#msg').on('keyup', function() {
        if ($('#msg').val().length > 0) {
            $('#msgsnd').prop('disabled', false);
        } else {
            $('#msgsnd').prop('disabled', true);
        }
    });

    $("#showhide").click(function() {
        if ($("user-list").isHidden()) {
            $("user-list").show();
        } else {
            $("user-list").hide();
        }
    });
    setTimeout(function() {
        window.location.reload();
    }, 80000);
});
</script>
@stop