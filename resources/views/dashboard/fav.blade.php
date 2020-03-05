@extends('layouts.main2d')

@section('app-content')
    <div class="col-md-9 zlrightbg">
        <div class="" style="background-color:white;">
            <div class="p100 weui-f18">
                <div class="lytitle ffs"><i></i>收藏會員
                    <a href="javascript:" class="yichu_t">移除收藏</a>
                </div>
                <div class="row weui-t_c weui_mt19">
                    @foreach ($visitors as $visitor)
                        @php $favUser = \App\Models\User::findById($visitor->member_fav_id) @endphp
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-6 weui-pb20">
                            <div class="yicw">
                                <img src="{{ $favUser->meta_()->pic }}" onerror="this.src=@if($favUser->engroup == 1) '/img/male-avatar.png' @else '/img/female-avatar.png' @endif" class="hypic">
                                <div class="yichu" style="display:none;cursor: pointer;" data-uid="{{$user->id}}" data-to="{{$favUser->id}}">移除</div>
                                <a href="/dashboard/viewuser/{{$favUser->id}}" class="weui-db">
                                    <p class="weui-pt15" style="white-space:nowrap;">{{$favUser->name}} @if($favUser->isVip()) <img src="/images/05.png" class="weui-v_t"> @endif </p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <nav aria-label="Page navigation" class="se_page0">
                        {!! $visitors->render() !!}
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
            $.post('{{ route('fav/remove') }}', {
                userId: uid,
                favUserId: to,
                _token: '{{ csrf_token() }}'
            }, function (data) {
                window.location.reload();
            });
        });
    </script>
@stop