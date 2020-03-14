@extends('layouts.main2d')

@section('app-content')
    @php
        $canPostSeconds = \App\Models\Board::getPostSeconds($user->id);
        $posts = \App\Models\Board::all_desc();
        $canPost = true;
    @endphp

    <div class="col-sm-12 col-xs-12 col-md-9 liuyan">
        <div class="l_zlxc">
            <div class="lytitle"><i></i>留言板</div>
            <form name="postBoard" onsubmit="return validateEmpty()" method="POST" action="/dashboard/board">
                {!! csrf_field() !!}
                <input type="hidden" name="userId" value="9926">
                <textarea class="lyform_co" rows="3" id="msg" name="msg" maxlength="80"></textarea>
                <div class="m-form__actions">
                    <button id="vipw" type="submit" class="lybutton">留言</button>
                    &ensp;&ensp;
                    <button type="reset" class="lybutton01">取消</button>
                </div>
            </form>
        </div>
        <div class="liuyannr">
            @foreach ($posts as $post)
                @php
                    $postUser = \App\Models\User::findById($post->member_id);
                    $canPost = \App\Models\Board::canPost($user->id);
                @endphp
                <li>
                    <div class="l_zright a1">
                        <div class="ly_next">
                            <div class="l_zleft"><a href="/user/view/{{$postUser->id}}"> <img src="@if($postUser->meta_()->isAvatarHidden) {{ 'makesomeerror' }} @else {{ $postUser->meta_()->pic }} @endif" class="lyphoto" onerror="this.src=@if ($postUser->engroup == 1) '/img/male-avatar.png' @else '/img/female-avatar.png' @endif"> </a> </div>
                            <h2>{{ $postUser->name }}</h2>
                            <h3>{{ $post->created_at }}</h3>
                        </div>
                    </div>
                    <div class="l_zleft_a2">
                        <h4>{{ $post->post }}</h4>
                    </div>
                    <div class="m-widget3__delete lyphoto"> </div>
                </li>
            @endforeach
        </div>
    </div>
@stop

@section ('javascript')
    <script>
    $(document).ready(function() {

        $('#msg').on('keyup', function() {
            if ($('#msg').val().length > 0) {
                $('#msgsnd').prop('disabled', false);
            } else {
                $('#msgsnd').prop('disabled', true);
            }
        });
        $("#showhide").click(function() {
            if ($("user-list").isHidden()) {
                $("user-list").show();
            } else {
                $("user-list").hide();
            }
        });

        setTimeout(function() {
            window.location.reload();
        }, 80000);
    });
    </script>
@stop