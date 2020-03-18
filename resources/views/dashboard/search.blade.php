@extends('layouts.main2d')

@section('app-content')
    <style>
        .usera_radio {
            float:left;
            position: relative;
            width: 48%;
            height: 40px;
            z-index: 1;
        }
        .usera_radio label {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            width: 100%; /*選擇框的寬度*/
            height: 40px;
            z-index: 3;
            opacity: 0;
            margin: auto;
            display: inline-block;
            line-height: 40px;
            cursor: pointer;
        }
        .usera_radio input {
            cursor: pointer;
            display: inline-block;
            vertical-align: middle;
            height: 40px;
            width: 100%;
            line-height: 40px;
            margin: 0;
        }
        .usera_radio span.btn {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 40px;
            z-index: 2;
            margin: auto;
            display: inline-block;
            line-height: 30px;
            text-align: center;
            color: #d0bd9f;
            border-radius: 5px;
            background-color: #ffff;
        }
        .usera_radio span.active {
            background-color: #d0bd9f;
            color: #fff;
        }
    </style>

    <link rel="stylesheet" href="/css/jquery.range.css" />
    <style>
        /*強制顯示右上角導航列*/
        .toplink{ display: block}
    </style>
    <div class="m-content zlleftbg">
        <div class="row">
            <div class="col-sm-12 col-xs-12 col-md-3 zleft01">
                <div class="lytitle"><i></i>搜尋條件</div>
                <div class="se_leftbg">
                    <form action="{!! url('dashboard/search') !!}" class="m-form m-form--fit m-form--label-align-right" method="GET">
                        <div class="vipfont">
                            <font>地區</font>
                            <span><input type="checkbox" name="havepic" value="1" class="search_inp" @if(!empty($_GET["havepic"]) && $_GET["havepic"] == "1" ) checked @endif>照片</span>
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
                                <div class="usera_radio">
                                    <label for="usera_radio">                        
                                        <input type="radio" name="isvip" value="0" checked="true">全部會員
                                    </label>
                                    <span class="btn @if(!isset($_GET['isvip']) OR ($_GET['isvip'] != '1')) active @endif">全部會員</span>
                                </div>
                                <div class="usera_radio" style="margin-left: 4%;">
                                    <label for="usera_radio">
                                        <input type="radio" name="isvip" value="1" @if(isset($_GET['isvip']) && ($_GET['isvip'] == '1')) checked @endif>VIP會員
                                    </label>
                                    <span class="btn @if(isset($_GET['isvip']) && ($_GET['isvip'] == '1')) active @endif">VIP會員</span>
                                </div>          
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
                        <input type="reset" value="重置" class="sebotbut" onclick="location.href='{!! url('dashboard/search') !!}'">
                        <input type="submit" value="完成" class="sebotbut02">
                    </form>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12 col-md-9 liuyan">
                <div class="serightpe">
                    <ul class="new_search">
                        @forelse ($vis as $vi)
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
                                    @if($umeta->isHideArea == '0')
                                        @if(!empty($umeta->city))
                                            @foreach($umeta->city as $key => $cityval)
                                                @if ($loop->first)
                                                    {{$umeta->city[$key]}} {{$umeta->area[$key]}}
                                                @else
                                                    {{$umeta->city[$key]}} {{$umeta->area[$key]}}
                                                @endif
                                            @endforeach
                                        @endif
                                    @else
                                        保密
                                    @endif
                                    </h3>
                                    <div class="setext">
                                        <h4>
                                            <span>年齡：</span>
                                            {{ $umeta->age() }}歲
                                        </h4>
                                        <h4>
                                            <span>體型：</span>
                                            @if(isset($visitor->meta_()->body))
                                                {{$visitor->meta_()->body}}
                                            @else
                                                保密
                                            @endif
                                        </h4>
                                        <h4>
                                            <span>預算：</span>
                                            {{$visitor->meta_()->budget}}
                                        </h4>
                                        @if ($user->engroup == 1)
                                            <h4>
                                                <span>CUP：</span>
                                                @if($umeta->isHideCup == '0')
                                                    @if(isset($visitor->meta_()->cup))
                                                        {{$visitor->meta_()->cup}}
                                                    @else
                                                        保密
                                                    @endif
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
                                    <div class="setextbut">
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
                        @empty
                            沒有資料!!
                        @endforelse
                    </ul>
                    <nav aria-label="Page navigation" class="se_page0 newpage">
                        {!! $vis->appends(request()->all())->render() !!}
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
            'countySel' : "{{ $_GET['county'] or '' }}",
            'districtSel' : "{{ $_GET['district'] or '' }}",
            'css': ['form-control twzip', 'form-control twzip', 'zipcode'],
            onCountySelect: function() {
                $("select[name='district']").prepend('<option selected value="">全市</option>');
            }
        });
    });

    $(".usera_radio label").click(function() {
        $(this).siblings("span").addClass("active");
        $(this).parent().siblings("div").find("span").removeClass("active");
    });
        $('input[name="zipcode"]').remove();

    </script>
@stop