<form class="form-horizontal">
    <div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal">
    		<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
    	</button>
    	<h4 class="modal-title" id="myModalLabel">添加</h4>
    </div>
    <div class="modal-body">
    		<div class="form-group">
    			<label class="col-sm-4 control-label">宝宝:</label>
    			<div class="col-sm-6">
    			    <?php 
    			        echo \Service\Common\Html::select('bid', 'bid', $babys, null, false, 'form-control');?>
    			</div>
    		</div>
    		<div class="form-group">
    			<label class="col-sm-4 control-label">标题:</label>
    			<div class="col-sm-6">
    			    <input type="text" name="title" value="" class="form-control" required />
    			</div>
    		</div>
    		<div class="form-group">
    			<label class="col-sm-4 control-label">描述:</label>
    			<div class="col-sm-6">
    			    <textarea type="text" name="desc" value="" class="form-control" required ></textarea>
    			</div>
    		</div>
    		<div class="form-group">
    			<label class="col-sm-4 control-label">拍照时间:</label>
    			<div class="col-sm-6">
    			    <input type="datetime-local" name="take_at" value="" class="form-control" required />
    			</div>
    		</div>
    		<div class="form-group">
    			<label class="col-sm-4 control-label">上传照片:</label>
    			<div class="col-sm-6">
    			    <input type="text" name="path" value="" class="form-control" required />
    			    
    			    <form method="post" action="http://upload.qiniu.com/"
                 enctype="multipart/form-data">
                  <input name="key" type="hidden" value="<resource_key>">
                  <input name="x:<custom_name>" type="hidden" value="<custom_value>">
                  <input name="token" type="hidden" value="<upload_token>">
                  <input name="file" type="file" />
              </form>
    			</div>
    		</div>
    </div>
    <div class="modal-footer">
    	<button type="button" class="btn btn-primary modelAdd" data-dismiss="modal">确定</button>
    	<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $(".modelAdd").click(function(){
            var thiz = $(this);
            var url = "{{url('manage/photo')}}";
            $.ajax({
                url : url,
                data : thiz.closest('form').serialize(),
                dataType : 'json',
                type : 'POST'
            }).done(function(data){
                if (data.code == 0) {
                  notify('提示', data.message, 'success', false, 3);
                  window.location.reload();
                } else {
                  notify('提示', data.message, 'danger');
                }
            }).fail(function(){ alert("出错啦！"); });
        });
    });
</script>