@extends('layouts.main')@section('app-content')    @php        $orderNumber = \App\Models\Vip::lastid() . $user->id;        $code = Config::get('social.payment.code');    @endphp    @if(!$user->isVip() && $user->engroup == 1)        <div class="col-sm-12 col-xs-12 col-md-9 shengjhgt bgwf">            <div class="l_zlxc">                <div class="lytitle"><i></i>升級VIP</div>                <div class="sz_vip">                    <h3>價格: 1688 $NTD / 每月</h3>                    <form class="m-form m-form--fit" action="{{ route('upgradepay_ec') }}" method=post>                        <input type="hidden" name="_token" value="{{ csrf_token() }}" >                            <input type="hidden" name="userId" value="{{$user->id}}">                            <input type=hidden name="ReturnURL" value=<?php echo Config::get('social.payment.returnURL'); ?>>                            <input type=hidden name="MerchantNumber" value="761404">                            <input type=hidden name="OrderNumber"    value="<?php echo "30".$orderNumber ?>">                            <input type=hidden name="OrgOrderNumber" value="TS-VIP({{$user->id}})">                            <input type=hidden name="ApproveFlag" value="1">                            <input type=hidden name="DepositFlag" value="1">                            <input type=hidden name="iphonepage" value="0">                            <input type=hidden name="Period" value="30">                            <input type=hidden name="Amount" value="1688">                            <input type=hidden name="op" value="AcceptPayment">                            <input type=hidden name="checksum" value="<?php print md5("761404"."30".$orderNumber.$code."1") ?>">                            <input type=hidden name="Englishmode" value="0">                            <img src="/images/VIP_03.png">                        <button type="submit" class="cxbutton02 upgradevip">購買</button>                    </form>                </div>            </div>        </div>    @elseif(!$user->isVip() && $user->engroup == 2)        <div class="col-sm-12 col-xs-12 col-md-9 newheight02 bgwf">            <div class="l_zlxc">                <div class="lytitle"><i></i>升級VIP</div>                <div class="sz_vip">                    <h2>網站專屬 VIP</h2>                    <h3>上傳大頭貼+三張生活照，即可免費升級為VIP</h3>                    <button type="submit" class="cxbutton02" onclick="location.href='{{ route('dashboard_img') }}'">立即升級</button>                </div>                <div style="width:100%;border-bottom:#eeeeee 1px solid; padding-top:15px; display:table"></div>                <div class="sz_vip">                    <h3>價格: 1688 $NTD / 每月</h3>                    <form class="m-form m-form--fit" action="{{ route('upgradepay_ec') }}" method=post>                        {!! csrf_field() !!}                        <input type="hidden" name="_token" value="{{ csrf_token() }}" >                        <input type="hidden" name="userId" value="{{$user->id}}">                        <input type=hidden name="ReturnURL" value=<?php echo Config::get('social.payment.returnURL'); ?>>                        <input type=hidden name="MerchantNumber" value="761404">                        <input type=hidden name="OrderNumber"    value="<?php echo "30".$orderNumber ?>">                        <input type=hidden name="OrgOrderNumber" value="TS-VIP({{$user->id}})">                        <input type=hidden name="ApproveFlag" value="1">                        <input type=hidden name="DepositFlag" value="1">                        <input type=hidden name="iphonepage" value="0">                        <input type=hidden name="Period" value="30">                        <input type=hidden name="Amount" value="1688">                        <input type=hidden name="op" value="AcceptPayment">                        <input type=hidden name="checksum" value="<?php print md5("761404"."30".$orderNumber.$code."1") ?>">                        <input type=hidden name="Englishmode" value="0">                        <img src="/images/VIP_03.png">                        <button type="submit" class="cxbutton02 upgradevip">購買</button>                    </form>                </div>            </div>        </div>    @endif@stop@section('javascript')<script>    $(document).ready(function(){    });    function logFormData(form){        let data = $(form).serialize();        $.ajax({            type: 'POST',            url: '{{ route('upgradepayLog') }}',            data: {                _token:"{{ csrf_token() }}",                data : data            },            dataType: 'json',            headers: {                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')            },            success: function(xhr, status, error){                console.log(xhr);                console.log(error);            },            error: function(xhr, status, error){                console.log(xhr);                console.log(status);                console.log(error);            }        });        return true;    }</script>@stop