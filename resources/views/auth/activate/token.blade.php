@include('partials.header')
<link href="/css/ts_css.css" type="text/css" rel="stylesheet">

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
    <div class="">
        <div class="m-content zlleftbg nerbg">
            <div class="">
                <style>
                    .pj_box{
                        padding: 10px 1.4rem;
                        line-height: 30px;width:60%; margin:0 auto;
                    }
                    @media (max-width:767px){
                        .pj_box{width:100%;}
                    }
                    .pj_box h3 ,.pj_box p{
                        margin: 0;
                    }
                    .pj_box h3{
                        font-weight: bold;
                        font-size: 18px;
                        margin: 10px 0 5px;
                    }
                </style>
                <div class="col-sm-12 col-xs-12 col-md-12">
                    <div class="newsize newheight">
                        <div class="lytitle"><i></i>Email驗證</div>
                        <div class="pj_box">
                            <h3>站長的話</h3>
                            <p>
                                <a>驗證碼已經寄到你的email. <a style="color: red; font-weight: bold;">【{{ $user->email }}】</a>
                                <br><a href="{!! url('contact') !!}" style="color: red; font-weight: bold;">如果沒收到認證信/認證失敗，請點此聯繫站長。</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
    @include('partials.scripts')
</body>
</html>