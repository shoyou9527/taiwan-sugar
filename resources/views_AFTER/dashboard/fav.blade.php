@extends('layouts.newmaster')

@section('app-content')

<?php
    $canPostSeconds = \App\Models\Board::getPostSeconds($user->id);
?>
<?php
$block_people =  Config::get('social.block.block-people');
$admin_email = Config::get('social.admin.email');

if (isset($to)) $orderNumber = $to->id;
else $orderNumber = "";
$code = Config::get('social.payment.code');
$umeta = $user->meta_();

?>
        <div class="photo weui-t_c">
            <img src="{{$umeta->pic}}">
            <p class="weui-pt20 weui-f18">{{$user->name}}</p>
            @if ((isset($cur) && $cur->isVip()) || $user->isVip()) 
                <p class="weui-pt10 m_p">
                    <span class="weui-pl10 weui-pr10">
                        <img src="/images/sousuo_03.png">
                        <span class="weui-v_m gj">高级会员</span>
                    </span>
                    <!-- <span class="weui-pl10 weui-pr10">
                        <img src="//images/sousuo_06.png">
                        <span class="weui-v_m bzj"> 保证金</span>
                    </span>
                    <span class="weui-pl10 weui-pr10">
                        <img src="//images/sousuo_08.png">
                        <span class="weui-v_m bwj"> 百万级</span>
                    </span> -->
                </p>
            @endif
        </div>
    </div>
</div>


<div class="container weui-pb30">
<?php $icc = 1; ?>

<div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    收藏會員
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-widget3">
                            <?php $visitors = \App\Models\MemberFav::findBySelf($user->id) ?>
                            @foreach ($visitors as $visitor)
                                <?php $favUser = \App\Models\User::findById($visitor->member_fav_id) ?>
                            <div class="m-widget3__item" @if ($icc == 1) <?php echo 'style="border-bottom: none !important; background-color: rgba(244, 164, 164, 0.7); box-shadow: 0 1px 15px 1px rgba(244, 164, 164, 0.7); padding: 16px 32px; 0px 32px"'; $icc = 0?>@else <?php $icc = 1; echo'style="border-bottom: none !important; padding: 14px 28px 0px 28px;"'; ?> @endif>
                                <div class="m-widget3__header">
                                    <div class="m-widget3__user-img">
                                        <a href="/user/view/{{$favUser->id}}"><img class="m-widget3__img" src="@if($favUser->meta_()->isAvatarHidden) {{ 'makesomeerror' }} @else {{ $favUser->meta_()->pic }} @endif" onerror="this.src='/img/male-avatar.png'" alt=""></a>
                                    </div>
                                    <div class="m-widget3__info">
                                        <span class="m-widget3__username">
                                        {{ $favUser->name }} @if ($favUser->isVip()) (VIP) @endif
                                        </span><br>
                                        <span class="m-widget3__time">
                                        {{ $visitor->created_at }}
                                        </span>
                                        <form action="{{ route('fav/remove') }}" method="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                                            <input type="hidden" name="userId" value="{{$user->id}}">
                                            <input type="hidden" name="favUserId" value="{{$favUser->id}}">
                                            <button type="submit" class="btn btn-danger">
                                                移除
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="m-widget3__body">
                                </div>
                            </div>

                            @endforeach
                        </div>
                    </div>
                    </div>

@stop