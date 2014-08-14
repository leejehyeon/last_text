<form class="each_page" style="margin-top:37px" name="write_form" method="post" action="/index.php/<?echo $view_name?>/write_ok" style = "font-size: 13px">
	    <table class="question_and_answer_write">
	    	<tr>
	    		<td>
	    			제목
	    		</td>
	    		<td colspan=3>
		            <input type="text" id="subject" name="subject"/>    			
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
	    			<?echo date('Y');echo '-';echo date('m');echo '-';echo date('d');?>
	    		</td>
	    	</tr>
	    	<tr>
	    		<td>
	    			과목
	    		</td>
	    		<td>
	    			<?foreach($get_list as $it){?>
						<?if(($this -> uri ->segment(4)) == ($it -> subject_id)){echo $it -> subject;}else{}?>
					<?}?>
	    		</td>
	    	</tr>
	    	<tr>
	    		<td>
	    			내용
	    		</td>
	    		<td colspan=3>
	    			<textarea type="text" id="contents" name="contents"></textarea>
	    		</td>    		
	    	</tr>
	    </table>
	    <div class="form-actions question_and_answer_write_footer">
	        	<input type="hidden" name="user_id" value="<?=$login_data['user_id']?>" />
	        	<input type="hidden" name="user_name" value="<?=$login_data['user_name']?>" />
	        	<input type="hidden" name="board_type" value="<?=$this -> uri ->segment(4)?>" />
	            <input type="button" value="취소" onclick="history.back()" />
	            <input type="button" value="작성완료" onclick="write_form_check()" />
	    </div>    
	</form>
</div>