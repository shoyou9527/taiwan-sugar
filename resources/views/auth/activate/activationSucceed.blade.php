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
        <div class="m-content wnheight nerbg">
            <div class="">
                @include('partials.sendmsgtip2')
                <style>
                    .btn_success{
                    text-align: center;
                    margin: 15px 0 0;
                    background: #fddfe1;
                    color: #e85d59;
                    font-weight: bold;
                    font-size: 20px;
                    width: 80%;
                    margin: 0 auto;
                    padding: 8px 5px;
                    border-radius: 10px;
                  }
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
                        <div class="lytitle"><i></i>驗證成功</div>
                        <div class="pj_box">
                            <h3>{{ $user->name }}註冊完成</h3>
                            <p>請再次確認您的帳號為：
                                <span style="color:rgba(244, 164, 164, 0.7)">{{ $user->email }}</span> </p>
                            <p>現在您可以正常使用您的帳號了，<a href="{!! url('login') !!}" style="color:rgb(244, 164, 164)"> 按這裡登入</a>，以開始您的第一步。
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