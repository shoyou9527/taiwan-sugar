@include('partials.header')
<link href="/css/ts_css.css" type="text/css" rel="stylesheet">
</head>

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-footer--push">
    @include('layouts.navigation')
    <div class="m-content zlleftbg nerbg">
        <div class="col-sm-12 col-xs-12 col-md-12">
            <div class="newsize newheight wjpaword">
                <div class="lytitle"><i></i>忘記密碼</div>
                <div class="m-portlet__body liuyana1 password_con">
                    <form class="m-login__form m-form" method="POST" action="/password/email">{!! csrf_field() !!}
                        <div class="form-group m-form__group">
                            <input class="form-control m-input weui-mb15" type="email" placeholder="帳號 (您的E-mail)" name="email" values="" autocomplete="off">
                            <input name="password" id="password" class="form-control m-input weui-mb15" type="password" placeholder="密碼" values="" autocomplete="off">
                            <input name="password_confirmation" id="password_confirmation" class="form-control m-input" type="password" placeholder="密碼確認" values="" autocomplete="off">
                        </div>
                        <div class="m-login__form-action">
                            <button type="submit" class="btn btn-danger m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary"> 更改密碼 </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
    @include('partials.scripts')
</body>

</html>
    <script>
        var password = document.getElementById("password")
            , confirm_password = document.getElementById("password_confirmation");

        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("密碼確認與上述密碼不相符");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>


