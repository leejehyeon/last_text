<div class="each_page" style="margin-top:37px">
	    <table class="question_and_answer_view">
	    	<tr>
	    		<td>
	    			제목
	    		</td>
	    		<td colspan=3>
		            <?=$list['subject'] ?>		
	    		</td>    		
	    	</tr>
	    	<tr>
	    		<td>
	    			작성자	
	    		</td>
	    		<td>
	    			<?=$list['user_name'] ?>
	    		</td>
	    		<td>
	    			등록일
	    		</td>
	    		<td>
	    			<?=substr(($list['reg_date']),0,10)?>
	    		</td>
	    	</tr>
	    	<tr>
	    		<td>
	    			과목
	    		</td>
	    		<td>
	    			<?foreach($get_sub_list as $it){?>
						<?if(($this -> uri ->segment(3)) == ($it -> subject_id)){echo $it -> subject;}else{}?>
					<?}?>
	    		</td>
	    	</tr>
	    	<tr>
	    		<td>
	    			내용
	    		</td>
	    		<td colspan=4 class="view_board_textarea" >
					<textarea readonly="readonly"><?=$list['contents'] ?></textarea>
	    		</td>    		
	    	</tr>
	    </table>

	    <div class="form-actions notice_view_footer">
			<a href="/index.php<?echo $view_name?>/<?echo $this -> uri -> segment(3);?>"><img src='/static/img/view_whole_notice_botton1.png'></a>
			
			<?if(($this->session->userdata('login_data')!=NULL)){
				if($login_data['user_id']==$list['user_id']){?>
					<a href="/index.php<?echo $view_name?>/update_board/<?echo $this -> uri -> segment(3);?>?req_id=<?echo $list['board_id']?>"><img src='/static/img/view_whole_notice_botton2.png'></a>
					<form name="delete_board" method="post" action="/index.php<?echo $view_name?>/delete_board/<?echo $this -> uri -> segment(3);?>?req_id=<?echo $list['board_id']?>">
					<input type="button" value="삭제" onclick="checkagain()"/>
					</form>
				<?}else{}
			}else{}
			?>
	    </div>
	    <table class="question_and_answer_view">
	  	 	<tr>
	    		<td>
	    			댓글
	    		</td>
	    		<td colspan=4>
					<textarea type="text" id="contents" name="contents"></textarea>
	    		</td>    		
	    	</tr>
	    </div>
	    </table>