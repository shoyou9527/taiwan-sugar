@include('partials.header')
<style>
    .lytitle {
        width: 100%;
        background: #faeded;
        line-height: 50px;
        display: table;
        color: #e65757;
        font-size: 20px;
        font-weight: bold;
    }
    .lytitle i {
        width: 4px;
        height: 20px;
        background: #e65757;
        margin-left: 20px;
        margin-right: 10px;
        display: table;
        float: left;
        margin-top: 15px;
    }
    h3.weui-t_c{
        margin-top: 0;
    }
</style>
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-footer--push">
    <header class="header headerbg weui-pb10 weui-pt10 tophear">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid ">
                <div class="navbar-header topr">
                    <a class=" weui-fl weui-pl10 weui-pt5" href="{!! url('') !!}"><img src="/images/homeicon.png"></a>
                    <a href="{!! url('login') !!}" class="weui-fr weui-white weui-mr30 weui-pt15 toprig">登入</a>
                    <a href="{!! url('register') !!}" class="weui-fr weui-white weui-mr30 weui-pt15">註冊</a>
                </div>
            </div>
        </nav>
    </header>
    <div class="newheight">
        <div class="rester_wrap weui-box_s shpa30">
            <div class="lytitle"><i></i>註冊新用戶</div>
            <div class="weui-p20">
                <form class="m-login__form m-form" method="POST" action="{!! url('register') !!}">
                    {!! csrf_field() !!}
                    <h3 class="weui-pb15 weui-t_c">帳號類型（Daddy/Baby）</h3>
                    <div class="weui-flex remind_bx">
                        <div class="weui-flex__item">
                            <div class="circle01 weui-bod_r50">
                                <label for='sex'>
                                    <div class="weui-t_c weui-f12 weui-pb5 weui-pt5">
                                        <input type="radio" name="engroup" required="required" value="1" id="sex">
                                        甜心大哥
                                    </div>
                                    <p class="weui-orange weui-f12">你願意用禮物、美食、旅行等種種方式，能愛對方，為了得到她的陪伴</p>
                                </label>
                            </div>
                        </div>
                        <div class="weui-flex__item">
                            <div class="circle01 circle02 weui-bod_r50">
                                <label for='sex1'>
                                    <div class="weui-t_c weui-f12 weui-pb5 weui-pt5">
                                        <input type="radio" id="sex1" required name="engroup" value="2">
                                        甜心寶貝
                                    </div>
                                    <p class="weui-orange weui-f12">妳想得到真愛，陪伴甜心大哥</p>
                                </label>
                            </div>
                        </div>
                    </div>
                    <h3 class="weui-pt15 weui-pb15 weui-t_c">請記住您的密碼，不要留下真名</h3>
                    <div class="weui-mt10">
                        <div class="weui-flex form01">
                            <div><img src="images/sjzc2_03.png" width="14"></div>
                            <div class="weui-flex__item weui-pl10"><input type="text" class="form02" placeholder="E-mail信箱（也是您未來的帳號）" value="" required name="email" autocomplete="off"></div>
                        </div>
                    </div>
                    <div class="weui-mt10">
                        <div class="weui-flex form01">
                            <div><img src="images/sjzc2_07.png" width="14"></div>
                            <div class="weui-flex__item weui-pl10"><input type="password" class="form02" placeholder="密碼" name="password" required></div>
                        </div>
                    </div>
                    <div class="weui-mt10">
                        <div class="weui-flex form01">
                            <div><img src="images/sjzc2_10.png" width="14"></div>
                            <div class="weui-flex__item weui-pl10"><input type="password" class="form02" required="required" placeholder="密碼確認" name="password_confirmation"></div>
                        </div>
                    </div>
                    <div class="weui-mt10">
                        <div class="weui-flex form01">
                            <div><img src="images/sjzc2_12.png" width="14"></div>
                            <div class="weui-flex__item weui-pl10"><input type="text" class="form02" placeholder="暱稱" name="name" value="" required="required"></div>
                        </div>
                    </div>
                    <div class="weui-mt10">
                        <div class="weui-flex form01">
                            <div><img src="images/sjzc2_16.png" width="14"></div>
                            <div class="weui-flex__item weui-pl10"><input type="text" class="form02" placeholder="一句話形容自己" name="title" value="" required></div>
                        </div>
                    </div>
                    <p class="weui-pt10">
                        <input type="checkbox" name="agree" id="zhengce" required>
                        <label for="zhengce" style="margin-bottom:0px;font-weight:100">
                            <span>我同意台灣甜心的使用條款和隱私政策</span>
                        </label>
                    </p>
                    <div class="row weui-pt20">
                        <div class=" col-sm-6 col-xs-6 col-md-6 col-lg-6"><button type="submit" id="m_login_signup_submit" class=" btn btn_reater01 btn-block">註冊</button></div>
                        <div class="col-sm-6 col-xs-6 col-md-6 col-lg-6"><a href="/" class="btn btn_reater02 btn-block">取消</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('partials.footer')
    @include('partials.scripts')
    <script src="/js/login.js" type="text/javascript"></script>
</body>
</html>