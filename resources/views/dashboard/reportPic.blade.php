@extends('layouts.main')

@section('app-content')

<style type="text/css">
@media (max-width: 767px){
    .liuyan {
         min-height: 500px;
    }
}
@media (min-width: 768px) and (max-width: 991px){
    .liuyan {
         min-height: 637px;
    }
}
@media (min-width: 1200px) {
    .liuyan {
         min-height: 1070px;
    }
}
</style>
<div class="col-sm-12 col-xs-12 col-md-9 liuyan">
    <div class="l_zlxc">
        <div class="lytitle"><i></i>檢舉</div>
        <h3 style="text-align:left;padding:15px;" class="m-portlet__head-text">
            檢舉照片 - 請填寫理由
        </h3>
        <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{ route('reportPicNext') }}">
            {!! csrf_field() !!}
            <input type="hidden" name="pic" value="1">
            <input type="hidden" name="reporter_id" value="{{ $reporter_id }}">
            <input type="hidden" name="reported_pic_id" value="{{ $reported_pic_id }}">
            <input type="hidden" name="reported_user_id" value="{{ $uid }}">
            <div class="m-portlet__body">
                <div class="form-group m-form__group row">
                    <div class="col-lg-9">
                        <textarea class="form-control m-input" rows="4" id="content" required name="content" maxlength="500"></textarea>
                    </div>
                </div>

                <div class="m-form__actions">
                    <div class="row">
                        <div class="col-lg-9">
                            <button id="msgsnd" type="submit" class="btn btn-danger m-btn m-btn--air m-btn--custom">送出檢舉</button>&nbsp;&nbsp;
                            <a href="{{ url()->previous() }}">
                                <button type="button" class="btn btn-outline-danger m-btn m-btn--air m-btn--custom">
                                    <span>取消</span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@stop

@section('javascript')


@stop
