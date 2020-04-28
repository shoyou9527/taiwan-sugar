@extends('layouts.main')

@section('app-content')
<div class="wrap">
    <div class="container lh24 newheight">
		<div class="row">
			<div class="col-lg-10 col-md-10 col-sm-10 col-lg-push-1 col-md-push-1 col-sm-push-1">
				<div class="kajbt">
					<div class=" weui-bgf weui-box_s weui-p20">
						<h3 class="weui-f18 title weui-pl10">被封鎖了 </h3>
						<p class="weui-mt20">您已在被封鎖的會員列表中，詳情請洽站長，謝謝</p>
						<p class="weui-mt20"><a class="btn btn-success" href="{!! url('contact') !!}" role="button">聯繫站長</a></p>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>
@stop

