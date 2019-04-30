@extends('admin.main')
@section('app-content')
<style>
.table > tbody > tr > td, .table > tbody > tr > th{
    vertical-align: middle;
}
h3{
    text-align: left;
}
</style>
<body style="padding: 15px;">
    <h1>站長公告</h1>
    <table class="table-bordered table-hover center-block text-center" id="table">
        <tr>
            <th class="text-center">內容</th>
            <th class="text-center">性別</th>
            <th class="text-center">排序(預設為1)</th>
            <th class="text-center">建立時間</th>
            <th class="text-center">更新時間</th>
            <th class="text-center">操作</th>
        </tr>
        @foreach($announce as $a)
            <form action="{{ route('admin/announcement/process') }}" id='message' method='POST'>
                {!! csrf_field() !!}
                <tr class="template">
                    <td>
                        <textarea name="content_word" class="form-control" cols="80" rows="5" class="content">{{ $a->content }}</textarea>
                    </td>
                    <td>
                        <select name="en_group" id="" class="en_group">
                            <option value="1" @if($a->en_group == 1) selected @endif>男</option>
                            <option value="2" @if($a->en_group == 2) selected @endif>女</option>
                        </select>
                    </td>
                    <td>
                        <input type="number" value="{{ $a->sequence }}" name="sequence" min="1">
                    </td>
                    <td class="created_at">{{ $a->created_at }}</td>
                    <td class="updated_at">{{ $a->updated_at }}</td>
                    <td>
                        <input type="hidden" value="{{ $a->id }}" name="id" class="id">
                        <input type="hidden" value="" name="type" class="type">
                        <input type='button' class='text-white btn btn-primary' value="修改" onclick="submitForm(this.parentNode, 'edit')">
                        <input type='button' class='text-white btn btn-danger' value="刪除" onclick="submitForm(this.parentNode, 'delete')">
                    </td>
                </tr>
            </form>
        @endforeach
    </table>
    <button onclick="newRow();" class='new text-white btn btn-success'>新增公告</button>
</body>
<script>
    function newRow(){
        $('.new').remove();
        let template = '<tr class="template">' +
            '<form action="{{ route("admin/announcement/new") }}" id="new" method="POST">' +
                '{!! csrf_field() !!}' +
                '<td>' +
                    '<textarea name="content" class="form-control" cols="80" rows="5" id="new_content">公告內容</textarea>' +
                '</td>' +
                '<td>' +
                    '<select name="en_group" id="new_engroup">' +
                        '<option value="1">男</option>' +
                        '<option value="2">女</option>' +
                    '</select>' +
                '</td>' +
                '<td>' +
                    '<input type="number" value="1" name="sequence" id="new_sequence" min="1">' +
                '</td>' +
                '<td></td>' +
                '<td></td>' +
                '<td>' +
                    '<input type="hidden" value="new">' +
                    '<button type="submit" class="text-white btn btn-primary" value="edit">新增</button>' +
                    '<input type="button" name="reset" value="重設" class="text-white btn btn-danger" id="reset123" onclick="customReset();"/>' +
                '</td>' +
            '</form>' +
        '</tr>';
        let $tr    = $('#table tr:last');
        $tr.after(template);
    }
    function customReset(){
        document.getElementById("new_content").value = "公告內容";
        document.getElementById("new_engroup").value = "1";
        document.getElementById("new_sequence").value = "1";
    }
    function submitForm(td, type) {
        if(type === 'edit'){
            let type = td.getElementsByClassName('type')[0];
            type.value = "edit";
        }
        else if(type === 'delete'){
            let type = td.getElementsByClassName('type')[0];
            type.value = "delete";
        }
        tr = td.parentElement;
        console.log(tr);
        form = tr.getElementById('message');
        console.log(form);
    }
</script>
@stop
