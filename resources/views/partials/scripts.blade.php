<script src="/js/vendors.bundle.js" type="text/javascript"></script>
<script src="/js/scripts.bundle.js" type="text/javascript"></script>
<script src="/js/messages_zh_TW.min.js"></script>
<script src="/js/jquery.twzipcode.min.js" type="text/javascript"></script>
<script src="/js/jquery.scrollUp.min.js" type="text/javascript"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-151375638-1');
</script>
<script>
    $(document).ready(function(){
        var isMobile = false;
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini|Opera Mobile|Kindle|Windows Phone|PSP|AvantGo|Atomic Web Browser|Blazer|Chrome Mobile|Dolphin|Dolfin|Doris|GO Browser|Jasmine|MicroB|Mobile Firefox|Mobile Safari|Mobile Silk|Motorola Internet Browser|NetFront|NineSky|Nokia Web Browser|Obigo|Openwave Mobile Browser|Palm Pre web browser|Polaris|PS Vita browser|Puffin|QQbrowser|SEMC Browser|Skyfire|Tear|TeaShark|UC Browser|uZard Web|wOSBrowser|Yandex.Browser mobile/i.test(navigator.userAgent)) isMobile = true;

        // 偵測手機or電腦裝置
        if(isMobile) {
            $('.device').attr("value", "1");
        }
        else {
            $('.device').attr("value", "0");
        }

        // 車馬費內容
        $('.invite').on('click', function(event) {
            var r = confirm("   車馬費說明 \n\n這筆費用是用來向女方表達見面的誠意。\n\n●若約見順利\n站方在扣除 288 手續費，交付 1500 與女方。\n\n●若有爭議(例如放鴿子)\n站方將依女方提供的證明資料，決定是否交付款項與女方。\n\n●爭議處理\n若女方提出證明文件，則交付款項予女方。\n若女方於於約見日五日內未提出相關證明文件。\n將扣除手續費後匯回男方指定帳戶。\n\n注意：此費用一經匯出，即全權交由本站裁決處置。\n本人絕無異議，若不同意請按取消鍵返回。");

            if(!r) {
                event.preventDefault();
            }
        });
    });

    $(function () {
        $.scrollUp({
            scrollDistance: 800,
            animation: 'fade',
            activeOverlay: false,
            scrollImg: {
                active: true,
                type: 'background',
                src: 'img/top.png'
            }
        });
    });
</script>
