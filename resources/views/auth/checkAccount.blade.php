@include('partials.header')
<script src="/js/analytics.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="/js/js"></script>
<script>
window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());
gtag('config', 'UA-151375638-1');
</script>
<script src="/js/jquery-2.1.1.min.js" type="text/javascript"></script>
<style>
    .login_dl {
                width: 500px;
                margin: 0 auto;
                padding: 20px 0px;
                display: table;
            }
            
            .login_but {
                width: 200px !important;
                height: 40px !important;
                line-height: 40px !important;
                margin: 0 auto;
                padding: 0px;
                display: table;
                margin-top: 10px;
            }
            
            @media (max-width:767px) {
                .login_dl {
                    width: 90%;
                    margin-left: 5%;
                    padding: 20px 0px;
                }
                .login_but {
                    width: 100% !important;
                    height: 40px !important;
                    line-height: 40px !important;
                    padding: 0px !important;
                    margin-top: 10px;
                }
            }
            
            .im-caret {
                -webkit-animation: 1s blink step-end infinite;
                animation: 1s blink step-end infinite;
            }
            
            @keyframes blink {
                from,
                to {
                    border-right-color: black;
                }
                50% {
                    border-right-color: transparent;
                }
            }
            
            @-webkit-keyframes blink {
                from,
                to {
                    border-right-color: black;
                }
                50% {
                    border-right-color: transparent;
                }
            }
            
            .im-static {
                color: grey;
            }
        </style>
</head>

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-footer--push">
    @include('partials.menu_toplink')
    <div class="m-content">
        <div class="m-content zlleftbg">
            <div class="row">
                @include('dashboard.panel')
                @include('partials.sendmsgtip2')
                <div class="col-sm-12 col-xs-12 col-md-9 bgwf newheight03">
                    <div class="l_zlxc">
                        <div class="lytitle"><i></i>取消VIP</div>
                        <div class="password_con01">
                            <div class="m-login__head">
                                <h3 class="m-login__title">確認帳號密碼</h3>
                            </div>
                            <form class="m-login__form m-form" method="POST" action="/dashboard/cancelpay">
                                {!! csrf_field() !!}
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" type="email" placeholder="帳號 (您的E-mail)" name="email" values="" autocomplete="off">
                                </div>
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input m-login__form-input--last" type="password" placeholder="密碼" name="password" id="password">
                                </div>
                                <div class="m-login__form-action">
                                    <button type="submit" id="m_login_signin_submit" class="btn btn-danger m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                                        確認
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @include('partials.footer')
            <script type="text/javascript">
                var _token = '{!! Session::token() !!}';
                var _url = '{!! url("/") !!}';
            </script>
            @include('partials.scripts')
            
            <script>
                let close = document.getElementsByClassName("close-window");
                for(let i = 0, len = close.length; i < len; i++){
                    close[i].addEventListener('click', function() {
                        close[i].parentNode.parentNode.removeChild(close[i].parentNode);
                    })
                }
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
            </script>
</body>

</html>