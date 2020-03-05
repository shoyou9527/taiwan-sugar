@extends('layouts.main2d')

@section('app-content')
    <div class="col-md-9 zlrightbg">
        <div class="" style="background-color:white;">
            <div class="p100 weui-f18">
                <div class="lytitle ffs"><i></i>封鎖名單
                    <a href="javascript:" class="yichu_t">解除封鎖</a>
                </div>
                <div class="row weui-t_c weui_mt19">
                    @foreach ($blocks as $block)
                        @php $blockedUser = \App\Models\User::findById($block->blocked_id) @endphp
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-6 weui-pb20">
                            <div class="yicw">
                                <img src="{{ $blockedUser->meta_()->pic }}"
                                    @if ($blockedUser->engroup == 1)
                                        onerror="this.src='/img/male-avatar.png'" 
                                    @else
                                        onerror="this.src='/img/female-avatar.png'"
                                    @endif
                                    class="hypic">
                                <div class="yichu" style="display:none;cursor: pointer;" data-uid="{{$user->id}}" data-to="{{$block->blocked_id}}">解除</div>
                                <a href="/dashboard/viewuser/{{$blockedUser->id}}" class="weui-db">
                                    <p class="weui-pt15" style="white-space:nowrap;">{{$blockedUser->name}} @if($blockedUser->isVip()) <img src="/images/05.png" class="weui-v_t"> @endif </p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <nav aria-label="Page navigation" class="se_page0">
                        {!! $blocks->render() !!}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        $(".yichu_t").click(function() {
            $(".yichu").toggle();
        });

        $(".yichu").click(function() {
            var uid=$(this).data('uid');
            var to=$(this).data('to');
            $.post('{{ route('unblockAJAX') }}', {
                uid: uid,
                to: to,
                _token: '{{ csrf_token() }}'
            }, function (data) {
                window.location.reload();
            });
        });
    </script>
@stop
