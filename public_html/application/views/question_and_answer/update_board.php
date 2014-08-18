<div class="each_page" style="margin-top:37px">
	<form class="form-horizontal" method="post" action="/index.php<?echo $view_name?>/update_ok/<?echo $this -> uri -> segment(4);?>?req_id=<?=$list['board_id']?>" style = "font-size: 13px">
  	    <table class="question_and_answer_update">
	    	<tr>
	    		<td>
	    			제목
	    		</td>
	    		<td colspan=3>
		            <input type="text" id="subject" name="subject" value="<?=$list['subject']?>">    			
	    		</td>    		
	    	</tr>
	    	<tr>
	    		<td>
	    			작성자	
	    		</td>
	    		<td>
	    			<?echo $login_data['user_name'];?>
	    		</td>
	    		<td>
	    			등록일
	    		</td>
	    		<td>
	    			<?echo substr(($list['reg_date']),0,10)?>
	    		</td>
	    	</tr>
	    	<tr>
	    		<td>
	    			과목
	    		</td>
	    		<td colspan=3>
	    			<?foreach($get_sub_list as $it){?>
						<?if(($this -> uri ->segment(4)) == ($it -> subject_id)){echo $it -> subject;}else{}?>
					<?}?>
	    		</td>
	    	</tr>
	    	<tr>
	    		<td>
	    			내용
	    		</td>
	    		<td colspan=3>
	    			<textarea type="text" id = "text_body" name="contents"><?=$list['contents'] ?></textarea>
	    		</td>    		
	    	</tr>
	    </table>
	    <div class="notice_modify_footer">
        	<input type="hidden" name='req_id' value="<?=$list['board_id'] ?>" />
            <button type="button" onclick="history.back()">취소</button>
            <button type="submit" class="write_button">수정완료</button>
	    </div>    
  
  
  
  <!--
    <table class="notice_modify_board"> 
        <label for="text_title" class="col-xs-1 control-label">제목</label>
        
        <div class="col-xs-9">
            <input type="text" class="form-control" name="subject" placeholder="제목" value="<?=$list['subject']?>">
        </div>
    </div>
    <div class = "col-xs-2"><p class ="notice_detail_p">등록일</p></div>
   		<div class = "col-xs-3"><p class ="notice_detail_p"><?echo substr(($list['reg_date']),0,10)?></p></div>
   		<div class = "col-xs-2"><p class ="notice_detail_p">작성자</p></div>
  		<div class = "col-xs-3"><p class ="notice_detail_p"> <?echo $login_data['user_name'];?></p></div>
  	</br>
  </br>
    <div class="form-group">
        <label for="text_body" class="col-xs-1 control-label">내용</label>
        <div class="col-xs-9">
            <textarea id = "text_body" class="form-control" rows="10" placeholder="내용" name="contents"><?=$list['contents'] ?></textarea>
        </div>
    </div>
    <div class="form-actions" style="margin-top: 1%">
        <div class="col-xs-offset-1 col-xs-9">
        	<input type="hidden" name='req_id' value="<?=$list['board_id'] ?>" />
            <button type="submit" class="write_button">수정</button>
            <button type="button" onclick="history.back()">취소</button>
        </div>
    </div> 
   -->
</form>
</div>
</div>