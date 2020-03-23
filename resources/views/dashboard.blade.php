@extends('layouts.main2d')

@section('app-content')

    @php
      if (!isset($user)) {
          $umeta = null;
      } else {
          $umeta = $user->meta_();
          $umeta_block = [];
          // dd($umeta);
          if(isset($umeta->city)){
              $umeta->city = explode(",",$umeta->city);
              $umeta->area = explode(",",$umeta->area);
          }

          if(isset($umeta->blockcity)){
            $umeta->blockcity = explode(",",$umeta->blockcity);
            $umeta->blockarea = explode(",",$umeta->blockarea);
        }
      }
    @endphp

    <div class="col-sm-12 col-xs-12 col-md-9 zlrightbg">
        <div class="zlkuang">
            <div class="lytitle"><i></i>個人資料</div>
            <div class="zlxc">
                <div class="zlxctitle">上傳相片</div>
                <div class="group grline">
                    <form method="POST" action="/dashboard/header" enctype="multipart/form-data">
                        <div class="grouttitle">大頭照</div>
                        <div class="col-sm-5 col-xs-6 col-md-5 gr_top">
                            {!! csrf_field() !!}
                            <input type="hidden" name="userId" value="{{ $user->id }}">
                            <input required type="file" id="image" class="custom-file-input" value="瀏覽" name="image">
                        </div>
                        <div class="col-sm-2 col-xs-6 col-md-2"></div>
                        <div class="col-sm-3 col-xs-12 col-md-3">
                            <input type="submit" value="上傳" class="group_but">
                        </div>
                    </form>
                    <div class="grxiphoto">
                        <li class="headshot col-sm-4 col-xs-6">
                            <img src="{{$umeta->pic}}" onerror="this.src=@if ($user->engroup == 1) '/img/male-avatar.png' @else '/img/female-avatar.png' @endif" 
                            class="img_square2">
                        </li>
                    </div>
                </div>
                <div class="group">
                    <div class="grouttitle">生活照</div>
                    <form method="POST" action="/dashboard/image" enctype="multipart/form-data">
                        <div class="col-sm-5 col-xs-6 col-md-5 gr_top">
                            {!! csrf_field() !!}
                            <input type="hidden" name="userId" value="{{ $user->id }}">
                            <div class="input_field_weap input-group">
                                <input type="file" id="images" class="custom-file-input" name="images[]">
                            </div>
                        </div>
                        <div class="col-sm-2 col-xs-6 col-md-2"><a href="javascript::voide(0)" type="button" id="add_image" class="gradd" name="button">+添加</a></div>
                        <div class="col-sm-3 col-xs-12 col-md-3 grtwo">
                            <input type="submit" value="上傳" class="group_but">
                            &nbsp;&nbsp;
                            <!--<button type="reset" class="btn btn-cs" disabled>取消</button>-->
                        </div>
                    </form>
                    {{-- 迴圈生活照 --}}
                    @if(!empty($member_pics))
                        <div class="grxiphoto">
                            @foreach($member_pics as $key => $member_pic)
                                <li class="col-sm-4 col-xs-6">
                                    <img src="@if($umeta->isAvatarHidden == 1) {{ 'makesomeerror' }} @else {{$member_pic->pic}} @endif" 
                                        onerror="this.src=@if ($user->engroup == 1) '/img/male-avatar.png' @else '/img/female-avatar.png' @endif" class="img_square2">
                                    <form method="POST" action="/dashboard/imagedel">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="userId" value="{{ $user->id }}">
                                        <input type="hidden" name="imgId" value="{{$member_pic->id}}">
                                        <button type="submit" class="delbutton">刪除</button>
                                    </form>
                                </li>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="zlxctitle grtu">基本資料</div>
                <form method="POST" action="/dashboard">
                    {!! csrf_field() !!}
                    <input type="hidden" name="userId" value="{{ $user->id }}">
                    <div class="grzltable ziliwidth">
                        <div class="grbt"><i class="icon iconfont icon-tanhao"></i>必填欄位</div>
                        <div class="grrow"> <span><i class="icon iconfont icon-tanhao grrow_icon"></i>暱稱</span>
                            <font>
                                <input name="name" class="form_co" type="text" value="{{$user->name}}">
                            </font>
                        </div>
                        <div class="grrow"> <span><i class="icon iconfont icon-tanhao grrow_icon"></i>預算</span>
                            <font>
                                <select name="budget" class="form_co">
                                    <option value="0">請選擇</option>
                                    <option value="基礎" {{ ($umeta->budget == '基礎')?"selected":""  }}>基礎</option>
                                    <option value="進階" @if($umeta->budget == '進階') selected @endif>進階</option>
                                    <option value="高級" @if($umeta->budget == '高級') selected @endif>高級</option>
                                    <option value="最高" @if($umeta->budget == '最高') selected @endif>最高</option>
                                    <option value="可商議" @if($umeta->budget == '可商議') selected @endif>可商議</option>
                                </select>
                            </font>
                        </div>
                        <div class="grrow"> <span><i class="icon iconfont icon-tanhao grrow_icon"></i>身高</span>
                            <font>
                                <input class="form_co" name="height" type="number" onkeyup="this.value=this.value.replace(/\D/g,'')" id="input-height" value="{{$umeta->height}}">
                            </font>
                        </div>
                        <div class="grrow"> <span><i class="icon iconfont icon-tanhao grrow_icon"></i>地區</span>
                            <font>
                                <div class="twzipcode" id="twzipcode">
                                    @if(isset($umeta->city))
                                        @if(is_array($umeta->city))
                                            @foreach($umeta->city as $key => $cityval)
                                                <div class="twzip" data-role="county" data-name="@if($key != 0 )city{{$key}}@else{{'city'}}@endif" data-value="{{$umeta->city[$key]}}"></div>
                                                <div class="twzip fromtop a1" data-role="district" data-name="@if($key != 0 )area{{$key}}@else{{'area'}}@endif" data-value="{{$umeta->area[$key]}}"></div>
                                            @endforeach
                                        @else
                                            <div class="twzip" data-role="county" data-name="city" data-value="{{$umeta->city}}"></div>
                                            <div class="twzip fromtop a1" data-role="district" data-name="area" data-value="{{$umeta->area}}"></div>
                                        @endif
                                    @else
                                        <div class="twzip" data-role="county" data-name="city" data-value=""></div>
                                        <div class="twzip fromtop a1" data-role="district" data-name="area" data-value=""></div>
                                    @endif
                                    <div class="twzip fromright">
                                        <input type="hidden" name="isHideArea" value="0">
                                        <input type="checkbox" name="isHideArea" @if($umeta->isHideArea == true) checked @endif value="1">
                                        隱藏鄉鎮區 </div>
                            </font>
                        </div>
                    </div>
                    <div class="grrow"> <span><i class="icon iconfont icon-tanhao grrow_icon"></i>生日</span>
                        <font>
                            <input type="text" class="form-control" id="m_datepicker_1" data-date-format="yyyy-mm-dd" name="birthdate" readonly placeholder="請選擇" value="{{ $umeta->birthdate }}">
                        </font>
                    </div>
                    <div class="grrow"> <span><i class="icon iconfont icon-tanhao grrow_icon"></i>體型</span>
                        <font>
                            <select name="body" class="form_co">
                                <option value="0">請選擇</option>
                                <option value="瘦" @if($umeta->body == '瘦') selected @endif >瘦</option>
                                <option value="標準" @if($umeta->body == '標準') selected @endif >標準</option>
                                <option value="微胖" @if($umeta->body == '微胖') selected @endif>微胖</option>
                                <option value="胖" @if($umeta->body == '胖') selected @endif>胖</option>
                            </select>
                        </font>
                    </div>
                    @if($user->engroup==2)
                        <div class="grrow"> <span><i class="icon iconfont icon-tanhao grrow_icon"></i>CUP</span>
                            <font>
                                <input name="title" type="text" class="form_co" maxlength="20" value="{{ $umeta->cup }}">
                                <div class="twzip fromright">
                                    <input type="hidden" name="isHideArea" value="0">
                                    <input type="checkbox" name="isHideArea" @if($umeta->isHideCup == true) checked @endif value="1">
                                    隱藏
                                </div>
                            </font>
                        </div>
                        <div class="grrow"> <span><i class="icon iconfont icon-tanhao grrow_icon"></i>現況</span>
                            <font>
                                <select name="education" class="form_co">
                                    <option value="0">請選擇</option>
                                    <option value="老师" @if($umeta->situation == '老师') selected @endif>老师</option>
                                    <option value="高中" @if($umeta->situation == '高中') selected @endif>高中</option>
                                    <option value="打工" @if($umeta->situation == '打工') selected @endif>打工</option>
                                    <option value="研究所" @if($umeta->situation == '研究所') selected @endif>研究所</option>
                                </select>
                            </font>
                        </div>
                    @endif
                    <div class="grrow"> <span><i class="icon iconfont icon-tanhao grrow_icon"></i>婚姻</span>
                        <font>
                            <select name="marriage" class="form_co">
                                <option value="0">請選擇</option>
                                <option value="已婚">已婚</option>
                                <option value="分居">分居</option>
                                <option value="單身" selected>單身</option>
                                <option value="有女友">有女友</option>
                            </select>
                        </font>
                    </div>
                    <div class="grrow"> <span><i class="icon iconfont icon-tanhao grrow_icon"></i>抽菸</span>
                        <font>
                            <select name="smoking" class="form_co">
                                <option value="0">請選擇</option>
                                <option value="不抽" selected>不抽</option>
                                <option value="偶爾抽">偶爾抽</option>
                                <option value="常抽">常抽</option>
                            </select>
                        </font>
                    </div>
                    <div class="grrow"> <span><i class="icon iconfont icon-tanhao grrow_icon"></i>喝酒</span>
                        <font>
                            <select name="drinking" class="form_co">
                                <option value="0">請選擇</option>
                                <option value="不喝" selected>不喝</option>
                                <option value="偶爾喝">偶爾喝</option>
                                <option value="常喝">常喝</option>
                            </select>
                        </font>
                    </div>
                    <div class="grrow"> <span><i class="icon iconfont icon-tanhao grrow_icon"></i>教育</span>
                        <font>
                            <select name="education" class="form_co">
                                <option value="0">請選擇</option>
                                <option value="國中" @if($umeta->education == '國中') selected @endif>國中</option>
                                <option value="高中" @if($umeta->education == '高中') selected @endif>高中</option>
                                <option value="大學" @if($umeta->education == '大學') selected @endif>大學</option>
                                <option value="研究所" @if($umeta->education == '研究所') selected @endif>研究所</option>
                            </select>
                        </font>
                    </div>
                </div>
                <div class="zlxctitle grtu01">個人說明</div>
                <div class="grzltable01" style="margin-top:5px">
                    <div class="grrow_1">
                        <h2><i class="icon iconfont icon-tanhao grrow_icon"></i>關於我</h2>
                        <textarea name="about" rows="4" class="form_co" maxlength="300">{{ $umeta->about }}</textarea>
                    </div>
                    <div class="grrow_1">
                        <h2><i class="icon iconfont icon-tanhao grrow_icon"></i>期待約會模式</h2>
                        <textarea name="style" rows="3" maxlength="300" class="form_co">{{ $umeta->style }}</textarea>
                    </div>
                </div>
                <div class="growtext">當您的個人資料正在審核中，或審核未通過時，其他會員無法瀏覽您的資料</div>
                <input type="submit" value="儲存變更" class="cxbutton">
            </form>
        </div>
    </div>
@stop


@section ('javascript')
    <script src="/js/cropper.min.js"></script>
    <script>
    var domainJson = ({
        '請選擇': ['請選擇'],
        '資訊科技': ['軟體網路', '電信通訊', '光電光學', '半導體業', '電腦週邊', '電子相關'],
        '傳產製造': ['食品飲料', '紡織相關', '鞋類紡織', '家具家飾', '紙製製造', '印刷相關', '化學製造', '石油製造', '橡膠塑膠', '非金屬製造', '金屬製造', '機械設備', '電力機械', '運輸工具', '儀器醫材', '育樂用品', '其他製造', '物流倉儲', '營建土木', '農林漁牧', '礦業土石'],
        '工商服務': ['法律服務', '會計服務', '顧問研發', '人力仲介', '租賃業', '汽車維修', '徵信保全'],
        '民生服務': ['批發零售', '金融機構', '投資理財', '保險業', '電影業', '旅遊休閒', '美容美髮', '醫療服務', '環境衛生', '住宿服務', '餐飲服務'],
        '文教傳播': ['教育服務', '印刷出版', '藝文相關', '廣播電視', '廣告行銷', '政治社福']
    });

    setDomain(1);

    function setDomain(initial) {
        var domain = eval(domainJson);
        var type = $("#domainType").val();
        //console.log('type is ' + type);
        if (!initial) {
            $("#domain option").remove();
            $("#domain").append('<option value="0">請選擇</option>');
        }
        for (var i in domain[type]) {
            //console.log(domain[type][i]);
            if (domain[type][i] != $("#domain option:selected").val()) {
                $("#domain").append('<option value="' + domain[type][i] + '">' + domain[type][i] + '</option>');
                $("#domain").selectpicker('refresh');
            }
        }
    }

    jQuery(document).ready(function() {

        var BootstrapDatepicker = function() { var t = function() { $("#m_datepicker_1, #m_datepicker_1_validate").datepicker({ todayHighlight: !0, orientation: "bottom left", templates: { leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>' } }), $("#m_datepicker_1_modal").datepicker({ todayHighlight: !0, orientation: "bottom left", templates: { leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>' } }), $("#m_datepicker_2, #m_datepicker_2_validate").datepicker({ todayHighlight: !0, orientation: "bottom left", templates: { leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>' } }), $("#m_datepicker_2_modal").datepicker({ todayHighlight: !0, orientation: "bottom left", templates: { leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>' } }), $("#m_datepicker_3, #m_datepicker_3_validate").datepicker({ todayBtn: "linked", clearBtn: !0, todayHighlight: !0, templates: { leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>' } }), $("#m_datepicker_3_modal").datepicker({ todayBtn: "linked", clearBtn: !0, todayHighlight: !0, templates: { leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>' } }), $("#m_datepicker_4_1").datepicker({ orientation: "top left", todayHighlight: !0, templates: { leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>' } }), $("#m_datepicker_4_2").datepicker({ orientation: "top right", todayHighlight: !0, templates: { leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>' } }), $("#m_datepicker_4_3").datepicker({ orientation: "bottom left", todayHighlight: !0, templates: { leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>' } }), $("#m_datepicker_4_4").datepicker({ orientation: "bottom right", todayHighlight: !0, templates: { leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>' } }), $("#m_datepicker_5").datepicker({ todayHighlight: !0, templates: { leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>' } }), $("#m_datepicker_6").datepicker({ todayHighlight: !0, templates: { leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>' } }) }; return { init: function() { t() } } }();
        jQuery(document).ready(function() { BootstrapDatepicker.init() });
        var BootstrapSelect = function() { var t = function() { $(".m_selectpicker").selectpicker() }; return { init: function() { t() } } }();
        jQuery(document).ready(function() { BootstrapSelect.init() });

        $('.twzipcode').twzipcode({
            'detect': true,
            'css': ['form-control twzip', 'form-control twzip', 'zipcode']
        });
    });
    </script>
    <script type="text/javascript">
    jQuery(document).ready(function() {



        //Check File API support
        function uploadFiles() {
            if (window.File && window.FileList && window.FileReader) {
                var filesInput = document.getElementById("images");

                filesInput.addEventListener("change", function(event) {

                    var files = event.target.files; //FileList object
                    var output = document.getElementById("result");
                    for (var i = 0; i < files.length; i++) {
                        var file = files[i];

                        //Only pics
                        if (!file.type.match('image'))
                            continue;

                        var picReader = new FileReader();

                        picReader.addEventListener("load", function(event) {

                            var picFile = event.target;
                            var div = document.createElement("div");

                            div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                                "title='" + picFile.name + "'/>";

                            output.insertBefore(div, null);

                        });
                        //Read the image
                        picReader.readAsDataURL(file);
                    }
                });
            }
        }

        // $("#images").on("change", function() {
        //  if($("#images")[0].files.length > 2) {
        //      alert("You can select only 2 images");
        //  } else {
        //     uploadFiles();
        //  }

        var max_fields = 0; //maximum input boxes allowed
        var wrapper = $(".input_field_weap"); //Fields wrapper
        var add_button = $("#add_image"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (14 - max_fields >= x) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div><input type="file" id="images" class="custom-file-input" name="images[]" ><a href="#" class="remove_field">&nbsp;移除</a></div>'); //add input box
            } else {
                alert('最多上傳15張');
            }
        });

        $('#images').click(function(e) {
            //e.preventDefault();
            if (max_fields >= 15) {
                alert('最多上傳15張');
                e.preventDefault();
            }
        })

        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        });
    });
    </script>
@stop
