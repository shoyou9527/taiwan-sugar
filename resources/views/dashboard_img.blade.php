@extends('layouts.main')

@section('app-content')
    <div class="col-sm-12 col-xs-12 col-md-9 zlrightbg">
        <div class="zlkuang">
            <div class="lytitle"><i></i>升級VIP</div>
            <div class="zlxc">
                <div class="zlxctitle">上傳相片</div>
                <div class="group grline">
                    <div class="gx_t" >
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
                    @if(!empty($user->meta_()->pic))
                    <div class=" ge_gm">
                        <li class="hy_w01">
                            <a href="{{$user->meta_()->pic}}" class="hypic_2">
                                <img src="{{$user->meta_()->pic}}" width="96px" style="margin:5px" height="96px">
                            </a>
                            <form method="POST" action="{{ url("/dashboard/picdel") }}">
                                {!! csrf_field() !!}
                                <button type="submit" class="delbutton">刪除</button>
                            </form>
                        </li>
                     </div>
                    @endif
                </div>
                <div class="group">
                    <div class="grouttitle">生活照</div>
                    <div class="gx_t">
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
                        </div>
                    </form>
                    </div>
                    @if(!empty($member_pics))
                    <div class=" ge_gm01">
                        @foreach($member_pics as $key => $member_pic)
                        <li class="hy_w01">
                            <a href="{{$member_pic->pic}}" class="hypic_2">
                                <img src="{{$member_pic->pic}}" width="96px" style="margin:5px" height="96px" onerror="this.src=@if ($user->engroup == 1) '/img/male-avatar.png' @else '/img/female-avatar.png' @endif">
                            </a>
                            <form method="POST" action="{{ url("/dashboard/imagedel") }}">
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
            </div>
        </div>
    </div>
@stop

@section ('javascript')
    <script src="/js/cropper.min.js"></script>
    <script type="text/javascript">
    jQuery(document).ready(function() {
        var mempic = {{ count($member_pics) }};
        var max_fields = 0 + mempic; //maximum input boxes allowed
        var wrapper = $(".input_field_weap"); //Fields wrapper
        var add_button = $("#add_image"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (5 - max_fields >= x) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div><input type="file" id="images" class="custom-file-input" name="images[]" ><a href="#" class="remove_field">&nbsp;移除</a></div>'); //add input box
            } else {
                $('.prompt').html('');
                $('.alert-success').remove();
                $('.alert-danger').remove();
                $('.prompt').append('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><ul class="quarx-errors"><li>最多上傳6張</li></ul></div>');
                $('html,body').animate({scrollTop:0}, 333);
            }
        });

        $('#images').click(function(e) {
            //e.preventDefault();
            if (max_fields >= 6) {
                $('.prompt').html('');
                $('.alert-success').remove();
                $('.alert-danger').remove();
                $('.prompt').append('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><ul class="quarx-errors"><li>最多上傳6張</li></ul></div>');
                $('html,body').animate({scrollTop:0}, 333);
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