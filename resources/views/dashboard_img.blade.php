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
                    @if(!empty($user->meta_()->pic))
                    <div class="grxiphoto">
                        <li class="col-sm-4 col-xs-6" style="padding-top: 10px;">
                            <img src="{{$user->meta_()->pic}}" onerror="this.src=@if ($user->engroup == 1) '/img/male-avatar.png' @else '/img/female-avatar.png' @endif"
                            class="dashboard_square">
                            <form method="POST" action="{{ url("/dashboard/picdel") }}">
                                {!! csrf_field() !!}
                                <input type="hidden" name="userId" value="{{ $user->id }}">
                                <button type="submit" class="delbutton">刪除</button>
                            </form>
                        </li>
                    </div>
                    @endif
                </div>
                <div class="group">
                    <div class="grouttitle">生活照</div>
                    <form method="POST" action="/dashboard/image" enctype="multipart/form-data">
                        <div class="col-sm-5 col-xs-6 col-md-5 gr_top">
                            {!! csrf_field() !!}
                            <input type="hidden" name="userId" value="{{ $user->id }}">
                            <div class="input_field_weap input-group">
                                <input required type="file" id="images" class="custom-file-input" name="images[]">
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
                                <li class="col-xs-6 col-sm-4  col-md-3 col-lg-2">
                                    <img src="@if($user->meta_()->isAvatarHidden == 1) {{ 'makesomeerror' }} @else {{$member_pic->pic}} @endif" 
                                        onerror="this.src=@if ($user->engroup == 1) '/img/male-avatar.png' @else '/img/female-avatar.png' @endif" class="dashboard_square">
                                    <form method="POST" action="{{ url("/dashboard/imagedel") }}">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="userId" value="{{ $user->id }}">
                                        <input type="hidden" name="imgId" value="{{ $member_pic->id }}">
                                        <button type="submit" class="delbutton">刪除</button>
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
    <script type="text/javascript">
    jQuery(document).ready(function() {
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