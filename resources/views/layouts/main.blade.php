@include('partials.header')
<style>
    h3, h2 {
        text-align: center;
    }
    .announce-box {
        background-color: #f7eeeb;
        position: fixed;
        z-index: 999;
        left: 0;
        right: 0;
        top: 10%;
        bottom: 10%;
        margin-left: 15%;
        margin-right: 15%;
        border-width: 3px;
        border-style: dotted solid dotted;
        border-color: rgba(244, 164, 164, 0.7);
        padding: 5px;
        box-shadow: 0 1px 15px 1px rgba(113, 106, 202, .08);
        word-break: break-word;
    }
    .announce-box-small {
        background-color: #f7eeeb;
        position: fixed;
        z-index: 999;
        left: 0;
        right: 0;
        top: 25%;
        bottom: 25%;
        margin-left: 25%;
        margin-right: 25%;
        border-width: 3px;
        border-style: dotted solid dotted;
        border-color: rgba(244, 164, 164, 0.7);
        padding: 5px;
        box-shadow: 0 1px 15px 1px rgba(113, 106, 202, .08);
        word-break: break-word;
    }
    .float {
        position: absolute;
        float: left;
    }
    .m-footer {
        position: absolute;
        width: 133px;
        left: 0;
        right: 0;
        bottom: 5px;
        margin-left: auto;
        margin-right: auto;
    }
    .center {
        font-size: large;
        text-align: center;
    }
</style>
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-footer--push" >
    @include('layouts.navigation')
    <div class="m-content">
        <style>
            body{
                background-color: #F7EEEB;
            }
        </style>
        <div class="m-content zlleftbg">
            <div class="row">
                    @include('dashboard.panel')
                    @include('partials.sendmsgtip2')

                    @yield("app-content")

                @include('partials.footer')
                <script type="text/javascript">
                    var _token = '{!! Session::token() !!}';
                    var _url = '{!! url("/") !!}';
                </script>
                @include('partials.scripts')
                @yield("javascript")
            </div>
        </div>
    </div>
</body>
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
</html>
