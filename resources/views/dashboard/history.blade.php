@extends('layouts.main2d')

@section('app-content')
<div class="col-md-9 zlrightbg newheight03">
    <div class="p100 weui-f18" style="min-height: 800px;">
        <div class="l_zlxc" style="margin-top:-14px; margin-bottom:8px;">
            <div class="lytitle"><i></i>足跡</div>
        </div>
        @forelse ($visitors as $visitor)
            @php 
                $histUser = \App\Models\User::findById($visitor->member_id);
            @endphp
            @if(isset($histUser))
                <div class="col-xs-6 col-sm-3 lytitle_aa bottomline">
                    <a href="/user/view/{{$histUser->id}}" style="text-align: center; vertical-align: middle!important;" class="weui-db">
                        <img src="@if($histUser->meta_()->isAvatarHidden) {{ 'makesomeerror' }} @else {{$histUser->meta_()->pic}} @endif" onerror="this.src=@if ($histUser->engroup == 1) '/img/male-avatar.png' @else '/img/female-avatar.png' @endif" class="history_square">
                        <p class="weui-pt15">
                            <span>{{ $histUser->name }} @if($histUser->isVip()) <img src="/images/05.png" class="weui-v_t">@endif</span>
                        </p>
                        <p class="weui-c_9">{{ $visitor->created_at }}</p>
                    </a>
                </div>
            @endif
        @empty
            沒有資料!!
        @endforelse
    </div>
    <nav aria-label="Page navigation" class="se_page0 newpage" style="text-align: center;">
        {!! $visitors->render() !!}
    </nav>
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