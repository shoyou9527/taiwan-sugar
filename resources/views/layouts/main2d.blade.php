@include('partials.header')
@if (!str_contains(url()->current(), '/dashboard/search'))
    {{-- 除搜尋頁外使用的css --}}
    <link href="/css/ts_css.css" type="text/css" rel="stylesheet">
@endif
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-footer--push" >
    @include('partials.menu')
    <div class="m-content">
        {{-- <style>body{background-color: #F7EEEB;}</style> 無作用--}} 
        <div class="row">
            <div class="col-md-12">
                {{-- 共用訊息提示 --}}
                @include('partials.errors')
                @include('partials.message')
            </div>
        </div>
        <div class="m-content zlleftbg">
            <div class="row">
                @if (!str_contains(url()->current(), '/dashboard/search'))
                    {{-- 除搜尋頁外左側面板 --}}
                    @include('dashboard.panel')
                @endif
                {{-- @include('partials.sendmsgtip2') 發送信息 無作用 --}}
                @yield("app-content")
            </div>
        </div>
    </div>
    @include('partials.footer')
    {{-- @include('partials.scrollup') 畫面太長點擊跳到最上面 但無引入style.bundle.css無作用 --}}
    @include('partials.scripts')
    @yield("javascript")
    {{--// 取消顯示公告用 現在無作用
    <script type="text/javascript">
        var _token = '{!! Session::token() !!}';
        var _url = '{!! url("/") !!}';
    </script>
    <script>
        let close = document.getElementsByClassName("close-window");
        for(let i = 0, len = close.length; i < len; i++){
            close[i].addEventListener('click', function() {
                close[i].parentNode.parentNode.removeChild(close[i].parentNode);
            })
        }
        @if(isset($user))
            function disableAnnounce(aid){
                $.ajax({
                    type: 'POST',
                    url: '{{ route('announceRead') }}',
                    data: { uid: "{{ $user->id }}", aid: aid, _token: "{{ csrf_token() }}"},
                    success: function(xhr, status, error){
                        console.log(xhr);
                        console.log(error);
                    },
                    error: function(xhr, status, error){
                        console.log(xhr);
                        console.log(status);
                        console.log(error);
                    }
                });
            }
        @endif
    </script>
    --}}
</body>
</html>
