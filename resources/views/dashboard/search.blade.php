@extends('layouts.main2d')

@section('app-content')
    <link rel="stylesheet" href="/css/jquery.range.css" />
    <style>
        .toplink{ display: block}
    </style>
    <div class="m-content zlleftbg">
        <div class="row">
            <div class="col-sm-12 col-xs-12 col-md-3 zleft01">
                <div class="lytitle"><i></i>搜尋條件</div>
                <div class="se_leftbg">
                    <form action="{!! url('dashboard/search') !!}" class="m-form m-form--fit m-form--label-align-right" method="GET">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" >
                        <div class="vipfont">
                            <font>地區</font>
                            <span><input type="checkbox" name="pic" value="hasPic" class="search_inp">照片</span>
                        </div>
                        <div class="se_search" id="twzipcode">
                            <div class="twzip" data-role="county" data-name="county">
                            </div>
                            <div class="twzip" data-role="district" data-name="district">
                            </div>
                        </div>
                        @if ($user->isVip())
                            <div class="se_title">檢視</div>
                            <div class="se_but a1">
                                <a href="/dashboard/search?isvip=0" class="se_button">全部會員</a>
                                <a href="/dashboard/search?isvip=1" class="se_button01">VIP會員</a>
                            </div>
                            <div class="se_title a1">年齡</div>
                            <div class="se_wu">
                                <input class="single-slider" type="hidden" name="agefrom" value="@if(!empty($_GET['agefrom'])) {{$_GET['agefrom'] }} @else 18, 80 @endif" style="display: none;">
                            </div>
                        @endif
                        <div class="se_search">
                            <span>
                                <em>預算</em>
                                <select name="budget" class="form_co">
                                    <option selected value="">請選擇</option>
                                    <option value="基礎" @if( !empty( $_GET["budget"] ) && $_GET["budget"] == "基礎" ) selected @endif >基礎</option>
                                    <option value="進階" @if( !empty( $_GET["budget"] ) && $_GET["budget"] == "進階" ) selected @endif >進階</option>
                                    <option value="高級" @if( !empty( $_GET["budget"] ) && $_GET["budget"] == "高級" ) selected @endif >高級</option>
                                    <option value="最高" @if( !empty( $_GET["budget"] ) && $_GET["budget"] == "最高" ) selected @endif >最高</option>
                                    <option value="可商議" @if( !empty( $_GET["budget"] ) && $_GET["budget"] == "可商議" ) selected @endif >可商議</option>
                                </select>
                            </span>
                            <span>
                                <em>體型</em>
                                <select name="body" class="form_co">
                                    <option selected value="">請選擇</option>
                                    <option value="瘦" @if( !empty( $_GET["body"] ) && $_GET["body"] == "瘦" ) selected @endif >瘦</option>
                                    <option value="標準" @if( !empty( $_GET["body"] ) && $_GET["body"] == "標準" ) selected @endif >標準</option>
                                    <option value="微胖" @if( !empty( $_GET["body"] ) && $_GET["body"] == "微胖" ) selected @endif >微胖</option>
                                    <option value="胖" @if( !empty( $_GET["body"] ) && $_GET["body"] == "胖" ) selected @endif >胖</option>
                                </select>
                            </span>
                            @if ($user->engroup == 1)
                                <span>
                                    <em>CUP</em>
                                    <select name="cup" class="form_co">
                                        <option selected value="">請選擇</option>
                                        <option value="A" @if( !empty( $_GET["cup"] ) && $_GET["cup"] == "A" ) selected @endif >A</option>
                                        <option value="B" @if( !empty( $_GET["cup"] ) && $_GET["cup"] == "B" ) selected @endif >B</option>
                                        <option value="C" @if( !empty( $_GET["cup"] ) && $_GET["cup"] == "C" ) selected @endif >C</option>
                                        <option value="D" @if( !empty( $_GET["cup"] ) && $_GET["cup"] == "D" ) selected @endif >D</option>
                                        <option value="E" @if( !empty( $_GET["cup"] ) && $_GET["cup"] == "E" ) selected @endif >E</option>
                                        <option value="F" @if( !empty( $_GET["cup"] ) && $_GET["cup"] == "F" ) selected @endif >F</option>
                                    </select>
                                </span>
                            @else
                                <span>
                                    <em>婚姻</em>
                                    <select name="marriage" class="form_co">
                                        <option selected value="">請選擇</option>
                                        <option value="已婚" @if( !empty( $_GET["marriage"] ) && $_GET["marriage"] == "已婚" ) selected @endif>已婚</option>
                                        <option value="分居" @if( !empty( $_GET["marriage"] ) && $_GET["marriage"] == "分居" ) selected @endif>分居</option>
                                        <option value="單身" @if( !empty( $_GET["marriage"] ) && $_GET["marriage"] == "單身" ) selected @endif>單身</option>
                                        <option value="有女友" @if( !empty( $_GET["marriage"] ) && $_GET["marriage"] == "有女友" ) selected @endif>有女友</option>
                                    </select>
                                </span>
                            @endif
                        </div>
                        <input type="reset" value="重置" class="sebotbut">
                        <input type="submit" value="完成" class="sebotbut02">
                    </form>
                </div>
            </div>
            @php
                $district = "";
                $county = "";
                $cup = "";
                $marriage = "";
                $budget = "";
                $income = "";
                $smoking = "";
                $drinking = "";
                $photo = "";
                $ageto = "";
                $agefrom = "";
                $seqtime = "";
                $body = "";
                $umeta = $user->meta_();
                if(isset($umeta->city)){
                    $umeta->city = explode(",",$umeta->city);
                    $umeta->area = explode(",",$umeta->area);
                }
                if (isset($_GET['_token'])){
                    if (isset($_GET['district']) && $_GET['district'] != 0) $district = $_GET['district'];
                    if (isset($_GET['county']) && $_GET['county'] != 0) $county = $_GET['county'];
                    if (isset($_GET['cup'])) $cup = $_GET['cup'];
                    if (isset($_GET['marriage'])) $marriage = $_GET['marriage'];
                    if (isset($_GET['budget'])) $budget = $_GET['budget'];
                    if (isset($_GET['income'])) $income = $_GET['income'];
                    if (isset($_GET['smoking'])) $smoking = $_GET['smoking'];
                    if (isset($_GET['drinking'])) $drinking = $_GET['drinking'];
                    if (isset($_GET['pic'])) $photo = $_GET['pic'];
                    if (isset($_GET['ageto'])) $ageto = $_GET['ageto'];
                    if (isset($_GET['agefrom'])) $agefrom = $_GET['agefrom'];
                    if (isset($_GET['seqtime'])) $seqtime = $_GET['seqtime'];
                    if (isset($_GET['seqtime'])) $seqtime = $_GET['seqtime'];
                    if (isset($_GET['body'])) $body = $_GET['body'];
                }
                $vis = \App\Models\UserMeta::search($county, $district, $cup, $marriage, $budget, $income, $smoking, $drinking, $photo, $agefrom, $ageto, $user->engroup, $umeta->city, $umeta->area, $umeta->blockdomain, $umeta->blockdomainType, $seqtime, $body, $user->id);
            @endphp
            <div class="col-sm-12 col-xs-12 col-md-9 liuyan">
                <div class="serightpe">
                    <ul class="new_search">
                    @if (!empty($vis) && isset($vis) && sizeof($vis) > 0)
                        @foreach ($vis as $vi)
                            @php 
                                $visitor = $vi->user();
                                $umeta = $visitor->meta_();
                                if(isset($umeta->city)){
                                    $umeta->city = explode(",",$umeta->city);
                                    $umeta->area = explode(",",$umeta->area);
                                }
                            @endphp
                            <li class="col-sm-6 col-xs-12 col-md-6">
                                <div class="serightpe_img">
                                    <img src="@if($umeta->isAvatarHidden == 1) {{ 'makesomeerror' }} @else {{$umeta->pic}} @endif" @if ($visitor->engroup == 1) onerror="this.src='/img/male-avatar.png'" @else onerror="this.src='/img/female-avatar.png'" @endif>
                                </div>
                                <div class="serightpe_font">
                                    <h2>
                                        {{ $visitor->name }}
                                        @if($visitor->isVip())
                                            <img src="/images/05.png" class="weui-v_t">
                                        @endif
                                    </h2>
                                    <h3>
                                        @if(!empty($umeta->city))
                                            @foreach($umeta->city as $key => $cityval)
                                                @if ($loop->first)
                                                    {{$umeta->city[$key]}} {{$umeta->area[$key]}}
                                                @else
                                                    {{$umeta->city[$key]}} {{$umeta->area[$key]}}
                                                @endif
                                            @endforeach
                                        @endif
                                    </h3>
                                    <div class="setext">
                                        <h4>
                                            <span>年齡：</span>
                                            {{ $umeta->age() }}歲
                                        </h4>
                                        <h4>
                                            <span>體型：</span>
                                            {{$visitor->meta_()->body}}
                                        </h4>
                                        <h4>
                                            <span>預算：</span>
                                            {{$visitor->meta_()->budget}}
                                        </h4>
                                        @if ($user->engroup == 1)
                                            <h4>
                                                <span>CUP：</span>
                                                @if(isset($visitor->meta_()->cup))
                                                    {{$visitor->meta_()->cup}}
                                                @else
                                                    保密
                                                @endif
                                            </h4>
                                        @else
                                            <h4>
                                                <span>婚姻：</span> {{$visitor->meta_()->marriage}}
                                            </h4>
                                        @endif
                                    </div>
                                    <div class="setextbut" style="white-space: nowrap;">
                                        <form action="/dashboard/fav" method="POST">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="userId" value="{{$user->id}}">
                                            <input type="hidden" name="to" value="{{$visitor->id}}">
                                            <button type="submit" class="linklized">收藏</button>
                                            <a href="/dashboard/chatShow/{{$visitor->id}}" target="blank">發訊</a>
                                            <a href="/dashboard/viewuser/{{$visitor->id}}" class="se_bg" target="blank">更多</a>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endif
                    </ul>
                    <nav aria-label="Page navigation" class="se_page0 newpage">
                        {!! $vis->render() !!}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery.range.js"></script>
    <script type="text/javascript">
    $(function() {
        $('.single-slider').jRange({
            from: 18,
            to: 80,
            step: 1,
            scale: [18, 80],
            format: '%s',
            width: '100%',
            showLabels: true,
            showScale: true
        });
        $('.single-slider1').jRange({
            from: 130,
            to: 200,
            step: 1,
            scale: [130, 200],
            format: '%s',
            width: '100%',
            showLabels: true,
            showScale: true
        });
        $('.single-slider2').jRange({
            from: 30,
            to: 100,
            step: 1,
            scale: [30, 100],
            format: '%s',
            width: '100%',
            showLabels: true,
            showScale: true
        });
        $('#twzipcode').twzipcode({
            'detect': true,
            'css': ['form-control twzip', 'form-control twzip', 'zipcode'],
            onCountySelect: function() {
                $("select[name='district']").prepend('<option selected value="">全市</option>');
            }
        });
        $('input[name="zipcode"]').remove();

    });
    </script>
@stop