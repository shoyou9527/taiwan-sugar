@extends('layouts.main2d')

@section('app-content')
<div class="col-md-9 zlrightbg">
    <div class="" style="background-color:white;">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 style="text-align:left;" class="m-portlet__head-text">
                        檢舉會員：{{ \App\Models\User::findById($uid)->name }} - 請填寫理由
                    </h3>
                    <span style="text-align:right;" class="m-portlet__head-text">
                        <a class="btn btn-danger m-btn m-btn--air m-btn--custom" href="/user/view/{{ $uid }}"> 回去{{ \App\Models\User::findById($uid)->name }}的會員資料</a>
                    </span>
                </div>
            </div>
        </div>
        <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{ route('reportNext') }}">
            {!! csrf_field() !!}
            <input type="hidden" name="aid" value="{{ $aid }}">
            <input type="hidden" name="uid" value="{{ $uid }}">
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
                            <button type="reset" class="btn btn-outline-danger m-btn m-btn--air m-btn--custom">取消</button>
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
