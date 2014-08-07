<form name="write_form" method="post" action="/index.php/<?echo $view_name?>/write_ok" style = "font-size: 13px">
    <div class="form-group">
        <label for="text_title" class="col-xs-1 control-label">제목</label>
        <div class="col-xs-7">
            <input type="text" class="form-control" id="subject" name="subject" placeholder="제목">
        </div>
        <br/>
        <br/>
         <br/>
        <div class = "col-xs-1"><p class ="notice_detail_p">등록일</p></div>
   		<div class = "col-xs-2"><p class ="notice_detail_p"><?echo date('Y');echo '-';echo date('m');echo '-';echo date('d');?></p></div>
   		<div class = "col-xs-1"><p class ="notice_detail_p">작성자</p></div>
  		<div class = "col-xs-2"><p class ="notice_detail_p"> <?echo $login_data['user_name'];?></p></div>
   	     </br>
        </br>
        <label for="text_body" class="col-xs-1 control-label">내용</label>
        <div class="col-xs-7">
            <textarea class="form-control" rows="10" placeholder="내용" id="contents" name="contents"></textarea>
        </div> 
    </div>
    <div class="form-actions" style="margin-top: 1%">
        <div class="col-xs-offset-10 col-xs-2">
        	<input type="hidden" name="user_id" value="<?=$login_data['user_id']?>" />
        	<input type="hidden" name="user_name" value="<?=$login_data['user_name']?>" />
            <input type="button" value="작성" onclick="write_form_check()" />
            <input type="button" class="modify_button" value="취소" onclick="history.back()" />
        </div>
    </div>
</form>
</div>