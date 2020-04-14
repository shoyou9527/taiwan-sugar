@include('partials.header')
<link href="/css/ts_css.css" type="text/css" rel="stylesheet">
<style>
 .btn_success{
    text-align: center;
    margin: 15px 0 0;
    background: #fddfe1;
    color: #e85d59;
    font-weight: bold;
    font-size: 20px;
    width:80%;
    margin: 0 auto;
    padding: 8px 5px;
    border-radius: 10px;
  }
</style>
</head>

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-footer--push">
    <header class="header headerbg weui-pb10 weui-pt10 tophear">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid ">
                <div class="navbar-header topr">
                    <a class=" weui-fl weui-pl10 weui-pt5" href="{!! url('/') !!}"><img src="/images/homeicon.png"></a>
                </div>
            </div>
        </nav>
    </header>
    <div class="m-content">
        <div class="m-content nerbg wnheight">
            <div class="col-sm-12 col-xs-12 col-md-12">
                <div class="newsize newheight">
                    <div class="lytitle"><i></i>Email驗證</div>
                    <div class="yanzheng">
                        <h4>帳號註冊成功(請到Email信箱收信驗證)</h4>
                        <p>您已註冊成功，以下是您所填寫的註冊資料：</p>
                        <ul>
                            @if(isset($user))
                            <li><label>暱稱：</label>{{ $user->name }}</li>
                            <li><label>帳號類型：</label>@if($user->engroup == 2) 甜心寶貝 @else 甜心大哥 @endif</li>
                            <li><label>想說的一句話：</label>{{ $user->title }}</li>
                            <li><label>Email：</label>{{ $user->email }} (若Email填寫錯誤，請重新註冊)</li>
                            @endif
                            <li style="color:rgb(244, 164, 164)">若沒收到驗證信，請按下重新發送</li>
                        </ul>
                        <div style="text-align: center;margin: 15px 0 0;">
                            <button type="submit" class="btn btn-danger" onclick="location.href='{{ url('activate/send-token') }}'">重新發送</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.footer')
        @include('partials.scripts')
</body>
</html>
