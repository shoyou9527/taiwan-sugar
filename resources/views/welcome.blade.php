@include('partials.header')

<!--添加-->
    <link href="/css/owl.carousel.css" type="text/css" rel="stylesheet">
    <link href="/css/owl.theme.css" type="text/css" rel="stylesheet">
    <script src="/js/owl.carousel.min.js"></script>

<body class="bgimg">
    @if (Auth::user() && Request::path() != '/activate' && Request::path() != '/activate/send-token')
        @include('partials.menu_vipcl')
    @else
        <header class="header a1 clearfix weui-pl32 weui-pr30 weui-pt20">
            <a href="/" class="weui-fl weui-ml30 logo"><img src="/images/homeicon.png"></a>
            <ul class="weui-fl navtop weui-ml30">
                <li class="weui-fl"><a href="/contact" class="weui-white">關於我們</a></li>
            </ul>
            <a href="/login" class="weui-fr weui-white weui-pt10">登入</a>
            <a href="/register" class="weui-fr weui-white weui-mr30 weui-pt10">註冊</a>
        </header>
    @endif
    <div class="container weui-white">
        <h3 class="weui-f36 cgrs">成功人士認識魅力甜心</h3>
        <p class="weui-f18 weui-pt10">一切情感始於萬千寵愛</p>
        <p class="weui-pt30"><a href="/dashboard/search" class="btn btn-hui weui-f18">查看配對</a></p>
    </div>
    <div class="container">
        <div class="ys">
            <div class="row">
                <div class="col-md-4">
                    <img src="images/2_03.png" width="100%">
                </div>
                <div class="col-md-7">
                    <h3 class="weui-t_c weui-f18 Confid weui-pb20"><span class="weui-dnb weui-p_r">Confidentiality</span></h3>
                    <div class="weui-pl30">
                        <div class="media weui-mt30">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="images/7.png" alt="...">
                                </a>
                            </div>
                            <div class="media-body weui-pl30">
                                <h4 class="media-heading weui-f22 weui-pb10 weui-pt10">隱私</h4>
                                <div style="color:#6a6a72">您可不需留下真實資料，站台並保證絕不洩漏會員資料</div>
                            </div>
                        </div>
                        <div class="media weui-mt30 weui-pt20">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="images/1.png" alt="...">
                                </a>
                            </div>
                            <div class="media-body weui-pl30">
                                <h4 class="media-heading weui-f22 weui-pb10 weui-pt10">安全</h4>
                                <div style="color:#6a6a72">本站不會與任何其他網站交換資料。事實上，您只需要壹個電子信箱註冊，其他不需要任何留下私人資料。</div>
                            </div>
                        </div>
                        <div class="media weui-mt30 weui-pt20">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="images/2.png" alt="...">
                                </a>
                            </div>
                            <div class="media-body weui-pl30">
                                <h4 class="media-heading weui-f22 weui-pb10 weui-pt10">高品質</h4>
                                <div style="color:#6a6a72">全台最大的Sugar Daddy/Baby 包養網站，所有會員均經過嚴密的審核機制。杜絕非法以及別有用心的使用者。</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="start weui-t_c">
        <h3 class="weui-f36" style="color:#6a6a60; font-family:'Times New Roman', Times, serif">START</h3>
        <div class="weui-pl30 weui-pr30 weui-pt30">
            <div class="row">
                <div class="col-md-4 weui-pt30 zcbg1">
                    <span class="weui-dnb circle weui-white weui-bod_r50">Step 1.</span>
                    <p class="weui-pt10" style="color:#898e8a">免費註冊只要三分鐘</p>
                </div>
                <div class="col-md-4 weui-pt30 zcbg2">
                    <span class="weui-dnb circle weui-white weui-bod_r50">Step 2.</span>
                    <p class="weui-pt10" style="color:#898e8a">上傳照片及個人檔案</p>
                </div>
                <div class="col-md-4 weui-pt30">
                    <span class="weui-dnb circle weui-white weui-bod_r50">Step 3.</span>
                    <p class="weui-pt10" style="color:#898e8a">免費註冊只要三分鐘</p>
                </div>
            </div>
            <div class="weui-t_c weui-pt30"><a href="/register" class="weui-t_d weui-f18">立即註冊</a></div>
        </div>
    </div>
    <div class="howbg">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3 class="weui-f18">如果我是</h3>
                    <h3 class="weui-pl30" style="font-size: 44px;font-family:'Times New Roman', Times, serif;text-align: center;">Sugar Daddy?</h3>
                    <p class="weui-pt30 weui-lh30 weui-f16" style="color:#898e8a">
                        您職場成功，事業有成。慷慨大方且尊重女性。在這邊，我們不拐彎抹角，坦白誠懇。許多 sugar baby 希望尋找您這樣的對象，以她們的美麗與溫柔，來換取您的照顧。
                    </p>
                    <p class="weui-pt30 weui-t_c" style="margin-bottom: 50px;"><a href="/register" class="btn btn-more">了解更多</a></p>
                </div>
                <div class="col-md-7 index_male ">
                    <a href="#" class="shyimg"><img src="images/0001.png"></a>
                </div>
                <ul id="male-demo" class="owl-carousel index_hid">
                    <li class="item">
                        <a href="#" class=" weui-fr weui-db m_img"><img src="images/x_03.jpg"></a>
                    </li>
                    <li class="item">
                        <a href="#" class=" weui-fr weui-db m_img"><img src="images/x_06.jpg"></a>
                    </li>
                    <li class="item">
                        <a href="#" class=" weui-fr weui-db m_img"><img src="images/x_15.jpg"></a>
                    </li>
                    <li class="item">
                        <a href="#" class=" weui-fr weui-db m_img"><img src="images/x_13.jpg"></a>
                    </li>
                    <li class="item">
                        <a href="#" class=" weui-fr weui-db m_img"><img src="images/x_11.jpg"></a>
                    </li>
                </ul>
                <script>
                $('#male-demo').owlCarousel({
                    items: 1,
                    navigation: true,
                    navigationText: ["", ""]
                });
                </script>
            </div>
            <div class="row weui-pt30">
                <div class="col-md-6 weui-t_c weui-pt30 index_female">
                    <div class="clearfix">
                        <a href="#" class="shyimg"><img src="images/002.png"></a>
                    </div>
                </div>
                <ul id="female-demo" class="owl-carousel index_hid">
                    <li class="item">
                        <a href="#" class=" weui-fr weui-db m_img"><img src="images/x_23.jpg"></a>
                    </li>
                    <li class="item">
                        <a href="#" class=" weui-fr weui-db m_img"><img src="images/x_20.jpg"></a>
                    </li>
                    <li class="item">
                        <a href="#" class=" weui-fr weui-db m_img"><img src="images/x_27.jpg"></a>
                    </li>
                    <li class="item">
                        <a href="#" class=" weui-fr weui-db m_img"><img src="images/x_29.jpg"></a>
                    </li>
                    <li class="item">
                        <a href="#" class=" weui-fr weui-db m_img"><img src="images/x_31.jpg"></a>
                    </li>
                </ul>
                <script>
                $('#female-demo').owlCarousel({
                    items: 1,
                    navigation: true,
                    navigationText: ["", ""]
                });
                </script>
                <div class="col-md-6 weui-pt30">
                    <h3 class="weui-f18">如果我是</h3>
                    <h3 class=" weui-pl30 weui-ml30" style="font-size:50px; font-family:'Times New Roman', Times, serif">Sugar Baby?</h3>
                    <p class="weui-pt30 weui-lh30 weui-f16" style="color:#898e8a">
                        妳可能是個學生, 也可能是個上班族, 或許是某個經紀公司的模特兒. 妳期待著被有經濟能力的人來照顧,現在註冊包養/包養網,馬上尋找那位妳的貴人。
                    </p>
                    <p class="weui-pt30 weui-t_c"><a href="/register" class="btn btn-more">了解更多</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="weui-bgcolor weui-pt30 weui-pb30">
        <div class="container list_lh">
            <ul>
                <li>
                    <div class="media">
                        <div class="media-left"><a href="jacascript::void(0)"><img class="media-object photo weui-bod_r50" style="width: 80px;" src="images/x_37.jpg" alt="..."></a></div>
                        <div class="media-body weui-pl10">
                            <h4 class="media-heading weui-f16 weui-pt10"><a href="jacascript::void(0)" class="weui-f_b">糖糖</a> 19歲/ 臺北 / 大學生</h4>
                            <div class="weui-bgf weui-box_s weui-mt15 weui-pl15 weui-pt10 weui-pb10 weui-pr15 weui-lh30">我是單親家庭，從小自己負擔我的生活費，每天都為生活四處打工。在這碰上daddy後，我終於可以靜下心來學習我最愛的文學跟音樂。daddy還幫我負擔家教跟進修的費用。我很感謝這個網站。</div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="media">
                        <div class="media-left"><a href="jacascript::void(0)"><img class="media-object photo weui-bod_r50" style="width: 80px;" src="images/img15.jpg" alt="..."></a></div>
                        <div class="media-body weui-pl10">
                            <h4 class="media-heading weui-f16 weui-pt10"><a href="jacascript::void(0)" class="weui-f_b">阿龍 </a> 39歲/ 臺北 / 上班族</h4>
                            <div class="weui-bgf weui-box_s weui-mt15 weui-pl15 weui-pt10 weui-pb10 weui-pr15 weui-lh30">我是一個很普通的上班族，但我願意，也愛這些美麗的女孩子。願意付出照顧並完成她們的夢想，在這邊，包養不是有錢人的專利，你不一定要有錢，只要你大方，願意付出，就會有很多的機會。</div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="media">
                        <div class="media-left"><a href="jacascript::void(0)"><img class="media-object photo weui-bod_r50" style="width: 80px;" src="images/nv.jpg" alt="..."></a></div>
                        <div class="media-body weui-pl10">
                            <h4 class="media-heading weui-f16 weui-pt10"><a href="jacascript::void(0)" class="weui-f_b"> 小恩 </a> 25歲/ 高雄 / 上班族</h4>
                            <div class="weui-bgf weui-box_s weui-mt15 weui-pl15 weui-pt10 weui-pb10 weui-pr15 weui-lh30">我一直有出國的夢，但從小家境不允許，出國始終只能是夢想。
                                後來碰上我的 daddy，它不但在生活工做各方面照顧我，更多次帶我出國旅遊。
                                我也慢慢存下了一筆可以遊學的基金。讓我完成了我畢生的心願！</div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="media">
                        <div class="media-left"><a href="jacascript::void(0)"><img class="media-object photo weui-bod_r50" style="width: 80px;" src="images/nv1.jpg" alt="..."></a></div>
                        <div class="media-body weui-pl10">
                            <h4 class="media-heading weui-f16 weui-pt10"><a href="jacascript::void(0)" class="weui-f_b"> 紫婷 </a> 32歲/ 高雄 / 單身</h4>
                            <div class="weui-bgf weui-box_s weui-mt15 weui-pl15 weui-pt10 weui-pb10 weui-pr15 weui-lh30">遇上jeffrey是我這生最幸福的事，令我身心滿足</div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    @include('partials.footer')
    @include('partials.scripts')
    <script type="text/javascript" src="js/scroll.js"></script>
    <script type="text/javascript">
    $(function() {
        $(".list_lh").myScroll({
            speed: 40, //数值越大，速度越慢
            rowHeight: 140 //li的高度
        });
    });
    </script>
</body>

</html>