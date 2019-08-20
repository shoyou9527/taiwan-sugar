<?php


/*
|--------------------------------------------------------------------------
| All users be blocked
|--------------------------------------------------------------------------
*/

// All Timer are XX(seconds)

return [
    'payment' => [
        'MerchantID' => "2000132",
        'uid' => "53538851",  //統一編號
        'HashKey' => "5294y06JbISpM5x9",
        'HashIV' => "v77hoKGq4kWxNNIS",
        'ActionURL' => "https://payment.ecpay.com.tw/Cashier/AioCheckOut/V5",  //送出訂單的網址
        'ReturnURL' => "http://www.sugar-garden.org/dashboard/upgradepay",  //背景傳送付款結果的網址
        'PeriodReturnURL' => "http://www.sugar-garden.org/dashboard/upgradepay",  //背景傳送定期定額付款交易結果的網址
        'ClientBackURL' => "http://www.sugar-garden.org/dashboard/upgradepay", //返回商店的網址
        // 'OrderResultURL' => "http://www.sugar-garden.org/dashboard/upgradepay",  //付款結果的網址，若不設則會使用綠界的付款結果
    ],
    'payment_test' => [
        'MerchantID' => "2000132",
        'uid' => "53538851",  //統一編號
        'HashKey' => "5294y06JbISpM5x9",
        'HashIV' => "v77hoKGq4kWxNNIS",
        'ActionURL' => "https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5",  //送出訂單的網址
        'ReturnURL' => "http://fixedip.lzong.tw/dashboard/upgradepay",  //背景傳送付款結果的網址
        'PeriodReturnURL' => "http://fixedip.lzong.tw/dashboard/upgradepay",  //背景傳送定期定額付款交易結果的網址
        'ClientBackURL' => "http://sugar.formal/dashboard", //返回商店的網址
        // 'OrderResultURL' => "http://fixedip.lzong.tw/dashboard/upgradepay",  //付款結果的網址，若不設則會使用綠界的付款結果
    ],
];