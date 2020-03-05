<div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">發信給 </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/dashboard/chat">
                    {!! csrf_field() !!}
                    <input type="hidden" name="userId" value="9926">
                    <input type="hidden" name="to" value="">
                    <textarea class="form-control m-input" name="msg" id="msg" rows="4" maxlength="200"></textarea>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">送出</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">取消</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="m_modal_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">車馬費信息給 </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/dashboard/chatpaycomment">
                    {!! csrf_field() !!}
                    <input type="hidden" name="userId" value="9926">
                    <input type="hidden" name="to" value="">
                    <textarea class="form-control m-input" name="msg" id="msg" rows="4"></textarea>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">送出</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">取消</button>
                </form>
            </div>
        </div>
    </div>
</div>