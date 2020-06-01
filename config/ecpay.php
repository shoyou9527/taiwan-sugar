<?php


/*
|--------------------------------------------------------------------------
| All users be blocked
|--------------------------------------------------------------------------
*/

// All Timer are XX(seconds)

return [
    'payment' => [
        'MerchantID' => "3137610",
        'uid' => "24470001",  //統一編號
        'HashKey' => "BOerb1FcOOjccN8o",
        'HashIV' => "KOBKiDuvxIvjCSBz",
        'ActionURL' => "https://payment.ecpay.com.tw/Cashier/AioCheckOut/V5",  //送出訂單的網址
        // 'ActionURL' => "https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5",  //送出訂單的網址(測試用)
        'ReturnURL' => "http://taiwan-sugar.net/dashboard/upgradepayEC",  //背景傳送付款結果的網址
        'postChatpayReturnURL' => "https://taiwan-sugar.net/dashboard/postChatpayEC",  //背景傳送車馬費付款結果的網址
        'PeriodReturnURL' => "http://taiwan-sugar.net/dashboard/upgradepayEC",  //背景傳送定期定額付款交易結果的網址
        'ClientBackURL' => "http://taiwan-sugar.net/dashboard", //返回商店的網址
        // 'OrderResultURL' => "http://taiwan-sugar.net/dashboard/upgradepay",  //付款結果的網址，若不設則會使用綠界的付款結果
    ],
    'payment_test' => [
        'MerchantID' => "2000132",
        'uid' => "53538851",  //統一編號
        'HashKey' => "5294y06JbISpM5x9",
        'HashIV' => "v77hoKGq4kWxNNIS",
        'ActionURL' => "https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5",  //送出訂單的網址(測試用)
        'ReturnURL' => "https://taiwan-sugar.net/dashboard/upgradepayEC",  //背景傳送付款結果的網址
        'postChatpayReturnURL' => "https://taiwan-sugar.net/dashboard/postChatpayEC",  //背景傳送車馬費付款結果的網址
        'PeriodReturnURL' => "https://taiwan-sugar.net/dashboard/upgradepayEC",  //背景傳送定期定額付款交易結果的網址
        'ClientBackURL' => "http://taiwan-sugar.net/dashboard", //返回商店的網址
        // 'OrderResultURL' => "http://taiwan-sugar.net/dashboard/upgradepay",  //付款結果的網址，若不設則會使用綠界的付款結果
    ],
];
