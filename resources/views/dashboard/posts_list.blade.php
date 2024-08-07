@extends('new.layouts.website')

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="format-detection" content="telephone=no" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>投稿列表</title>
		<!-- Bootstrap -->
		<link href="/posts/css/bootstrap.min.css" rel="stylesheet">
		<link href="/posts/css/bootstrap-theme.min.css" rel="stylesheet">
		<!-- owl-carousel-->
		<!--    css-->
		<link rel="stylesheet" href="/posts/css/style.css">
		<link rel="stylesheet" href="/posts/css/swiper.min.css">
		<script src="/posts/js/bootstrap.min.js"></script>
		<script src="/posts/js/jquery-2.1.1.min.js" type="text/javascript"></script>
		<script src="/posts/js/main.js" type="text/javascript"></script>


		@section('app-content')
		<!-- <div class="head hetop">
			<div class="container">
				<div class="col-sm-12 col-xs-12 col-md-12"><img src="/posts/images/icon_41.png" class="logo" />
				</div>
			</div>
		</div> -->
		<!-- <div class="head heicon">
			<div class="container">
				<div class="col-sm-12 col-xs-12 col-md-12">
					<div class="commonMenu">
						<div class="menuTop">
							<img src="/posts/images/icon_41.png" class="logo" />
							<span id="menuButton"><img src="/posts/images/icon.png" class="he_img"></span>
						</div>
						<ul id="menuList" class="change marg30">
                            <div class="comt"><img src="images/t.png"></div>
                            <div class="coheight">
							<div class="heyctop">測試系統賬號</div>
							<div class="helist">
								<ul>
									<li><a href=""><img src="/posts/images/icon_38.png">搜索</a></li>
									<li><a href=""><img src="/posts/images/icon_45.png">訊息</a><span>10</span></li>
									<li><a href=""><img src="/posts/images/icon_46.png">名單</a></li>
									<li><a href=""><img src="/posts/images/icon_48.png">我的</a></li>
								</ul>
							</div>
							<a href="" class="tcbut">LOGOUT</a>
                            </div>
						</ul>
					</div>
				</div>
			</div>
		</div> -->

		<!---->
		<div class="container matop70">
			<div class="row">
				<div class="col-sm-2 col-xs-2 col-md-2 dinone">
					<!-- <div class="leftbg">
						<div class="leftimg"><img src="/posts/images/icon_03.png">
							<h2>測試系統賬號</h2></div>
						<div class="leul">
							<ul>
									<li><a href=""><img src="/posts/images/icon_38.png">搜索</a></li>
									<li><a href=""><img src="/posts/images/icon_45.png">訊息</a><span>10</span></li>
									<li><a href=""><img src="/posts/images/icon_46.png">名單</a></li>
									<li><a href=""><img src="/posts/images/icon_48.png">我的</a></li>
								    <li><a href=""><img src="/posts/images/iconout.png">退出</a></li>
							</ul>
						</div>
					</div> -->
					@include('new.dashboard.panel')
				</div>
				<div class="col-sm-12 col-xs-12 col-md-10">
					<div class="shou"><span>投稿列表</span>
						<a href="/dashboard/posts" class="toug_but"><img src="/posts/images/tg_03.png">我要投稿</a>
					</div>
					<div class="tou_list">
                         <ul>
                             
                         @foreach($posts as $post)
						 <li>
                             <a href="/dashboard/post_detail/{{$post->pid}}">
                             <div class="tou_tx"><img src="{{$post->umpic ?? ($post->uengroup=='1' ? '/posts/images/touxiang_wm.png':'/posts/images/touxiang_w.png')}}"><span>{{$post->panonymous==true ? '匿名' : $post->uname}}</span><font>{{date('Y-m-d',strtotime($post->pupdated_at))}}</font></div>
                             <div class="tc_text"><span>{{$post->ptitle}}</span></div>
                             <div class="tc_text01">
                             @php echo $post->pcontents @endphp
                             </div>
                            </a>
                         </li>
						 @endforeach
                        </ul>
					</div>
                    
                    <div class="tc_page mabot20">
                                <nav aria-label="Page navigation">
								  {{ $posts->links() }}
                                </nav>
                                </div>
                    
                    
                    
                    
                    
				</div>

			</div>
		</div>

		<!-- <div class="bot">
			<a href="">站長開講</a> 丨
			<a href=""> 網站使用</a> 丨
			<a href=""> 使用條款</a> 丨
			<a href=""> 聯絡我們</a>
			<img src="/posts/images/bot_10.png">
		</div> -->
		@stop


	</body>


