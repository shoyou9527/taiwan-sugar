@extends('layouts.main2d')

@section('app-content')
    <div class="col-sm-12 col-xs-12 col-md-9 zlrightbg">
        <div class="zlkuang">
            <div class="lytitle"><i></i>升級VIP</div>
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
                            @foreach($member_pics as $key=>$member_pic)
                                <li class="col-sm-6 col-xs-6 col-md-2">
                                    <form method="POST" action="/dashboard/imagedel">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="userId" value="{{ $user->id }}">
                                        <input type="hidden" name="imgId" value="{{$member_pic->id}}">
                                        <img src="{{$member_pic->pic}}" width="100%" height="180px">
                                        <button type="submit" style="
                                        display: block;
                                        color: #e65858;
                                        text-align: left;
                                        line-height: 30px;
                                        background:none!important;
                                        border:none; 
                                        padding:0!important;
                                        font: inherit;
                                        cursor: pointer;">刪除</button>
                                    </form>
                                </li>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
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