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
	    		<td colspan=3>
	    			<?foreach($get_sub_list as $it){?>
						<?if(($this -> uri ->segment(3)) == ($it -> subject_id)){echo $it -> subject;}else{}?>
					<?}?>
	    		</td>
	    	</tr>
	    	<tr>
	    		<td colspan=4 class="view_board_textarea" >
					<textarea readonly="readonly"><?=$list['contents'] ?></textarea>
	    		</td>    		
	    	</tr>
	  	 	<tr>
	    		<td>
	    			튜티 1
	    		</td>
	    		<td colspan=3>
	    			<form method="post" action="/index.php<?echo $view_name?>/reply_insert/<?echo $this -> uri -> segment(3);?>?req_id=<?echo $list['board_id']?>">
					<textarea type="text" id="reply_contents" name="reply_contents"></textarea>
					
					<input type="hidden" name="board_id" value="<?echo $list['board_id'];?>">
					<input type="hidden" name="user_id" value="<?echo $login_data['user_id'];?>">
					<input type="hidden" name="user_name" value="<?echo $login_data['user_name'];?>">
					<input type="submit" value="등록" />
					</form>
	    		</td>    		
	    	</tr>

	    <?if($get_all_board_count > 0){?>
	    	<?foreach($get_list as $lt){?>
	  	 	<tr class="question_reply_firsttr">
	    		<td colspan=2>
	    			<img src='/static/img/question_icon1.png'>&nbsp;&nbsp;<?echo $lt -> user_name;?> 
	    		</td>
	    		<td colspan=2>
	    			<?echo $lt -> reg_date?>
	    		</td>
	    	</tr>
	    	<tr class="question_reply_sectr">
	    		<td colspan=2>
	    			<textarea id="reply_textarea" type="text" readonly="readonly"><?echo $lt -> reply_contents;?></textarea>
	    		</td> 		
	    		<td colspan=2>
	    			<?if($login_data['user_id'] == $lt -> user_id){?>
	    			<div id="form_<?echo $lt -> reply_id?>" style="text-align:right">
	    			<input class="question_view_modify" type="button" onclick="Modify_reply('<?echo $lt -> reply_id?>')" />
					<form id="delete_reply_board_<?echo $lt -> reply_id?>" method="post" action="/index.php<?echo $view_name?>/reply_delete/<?echo $this -> uri -> segment(3);?>?req_id=<?echo $list['board_id']?>">
					<input class="question_view_delete" type="button" onclick="reply_checkagain('<?echo $lt -> reply_id?>')" />
					<input type="hidden" name="reply_id" value="<?echo $lt -> reply_id;?>">
					</form>
					</div>
					<div id="update_form_<?echo $lt -> reply_id?>" style="display:none;">
						<form name="delete_board" method="post" action="/index.php<?echo $view_name?>/reply_update/<?echo $this -> uri -> segment(3);?>?req_id=<?echo $list['board_id']?>">
							<input type="hidden" name="reply_id" value="<?echo $lt -> reply_id;?>">
							<input class="question_view_submit" value="" type="submit" /><input class="question_view_delete" type="button" onclick="Modify_reply('<?echo $lt -> reply_id?>')"/>
						</form>
					</div>
	    		<?}?>
	    		</td>  
	    	</tr>
	    	<?}?>
	    <?}else{}?>
	    </table>
	    	   	
	   	<div class="form-actions notice_view_footer">
			<a href="/index.php<?echo $view_name?>/<?echo $this -> uri -> segment(3);?>"><img src='/static/img/question_icon5.png'></a>
			
			<?if(($this->session->userdata('login_data')!=NULL)){
				if($login_data['user_id']==$list['user_id']){?>
					<a href="/index.php<?echo $view_name?>/update_board/<?echo $this -> uri -> segment(3);?>?req_id=<?echo $list['board_id']?>"><img src='/static/img/question_icon6.png'></a>
					<form name="delete_board" method="post" action="/index.php<?echo $view_name?>/reply_delete/<?echo $this -> uri -> segment(3);?>?req_id=<?echo $list['board_id']?>">
					<input type="button" value="삭제" onclick="checkagain()"/>
					</form>
				<?}else{}
			}else{}
			?>
	    </div>

