<div class="col-xs-8">
<form name="journal_form" class="form-horizontal" method="post" action="/index.php/lesson/daily_journal_update_ok" style = "font-size: 13px">
    <div class="form-group">
        <label for="text_title" class="col-xs-2 control-label">제목</label>
        <div class="col-xs-7">
            <input type="text" class="form-control" id="text_title" name="subject" value="<?echo $update_data['subject'];?>">
        </div>
       </br>
       </br>
        <label for="text_title" class="col-xs-2 control-label">날짜</label>
        <div class="col-xs-7">
        <?echo substr($update_data['date'], 0, 4);echo '년 ';echo substr($update_data['date'], 5, 2);echo '월 ';echo substr($update_data['date'], 8, 2);echo '일'?>
        <select id="year">
        	
        <?for($i = 2013; $i <= 2017; $i++){?>
			<?if($i == substr($update_data['date'], 0, 4)){?>
				<option id="<?echo $i;?>" value="<?echo $i;?>" selected><?echo $i;?>년</option>
			<?}else{?>
				<option id="<?echo $i;?>" value="<?echo $i;?>"><?echo $i;?>년</option>
			<?
			}	
		}?>
		</select>
		 <select id="month" onChange="change_day(this);">
        <?for($i = 1; $i <= 12; $i++){
		$k = sprintf("%02d", $i);
	?>
		<?if($i == substr($update_data['date'], 5, 2)){?>
			<option id="<?echo $k;?>" value="<?echo $k;?>" selected><?echo $i;?>월</option>
		<?}else{?>
			<option id="<?echo $k;?>" value="<?echo $k;?>"><?echo $i;?>월</option>
	<?
		}	
	}?>
		</select>
		 <select id="day">
		 	<?
		 	$year = date('Y');
			$month = date('m');
				for($day_month=31;$day_month>=27;$day_month--){
		  			if(checkdate($month, $day_month, $year)){
	  				$day = $day_month;
					break;
	  				}
	  			}
		 	?>
		 		<?
		 			for($i = 1; $i <= $day; $i++){
	  				$k = sprintf("%02d", $i);
		 		?>
		 	<?
	?>
		<?if($i == substr($update_data['date'], 8, 2)){?>
			<option id="<?echo $k?>" value="<?echo $k;?>" selected><?echo $i;?>일</option>
		<?}else{?>
			<option id="<?echo $k?>" value="<?echo $k;?>"><?echo $i;?>일</option>
	<?
		}	
	}?>
		</select>
        </div>
        </br>
        </br>
         <label for="text_title" class="col-xs-2 control-label">튜터링시간</label>
        <div class="col-xs-7">
            <select id="time1">
            	<option>선택
            	<?for($i=0;$i<=23;$i++){
            		$k = sprintf("%02d", $i);
						if($i<=11){
							if($i==0){
								if($i == substr($update_data['tutor_time'], 0, 2)){?>
									<option value="<?echo $k;?>" selected>오전 12시
								<?}else{?>
									<option value="<?echo $k;?>">오전 12시
							<?
								}
							}else{
								if($i == substr($update_data['tutor_time'], 0, 2)){?>
									<option value="<?echo $k;?>" selected>오전 <?echo $k?>시
								<?}else{?>
            						<option value="<?echo $k;?>">오전 <?echo $k?>시
            	<?
								}
							}
						}else{ 
							if($i==12){
								if($i == substr($update_data['tutor_time'], 0, 2)){?>
									<option value="<?echo $i;?>" selected>오후 12시
								<?}else{?>
									<option value="<?echo $i;?>">오후 12시
							<?}
							}else{
								$k = sprintf("%02d",$i-12);
								if($i == substr($update_data['tutor_time'], 0, 2)){?>
									<option value="<?echo $i;?>" selected>오후 <?echo $k?>시</option>	
								<?}else{?>
							<option value="<?echo $i;?>">오후 <?echo $k?>시</option>	
						<?  
								}
							}
						}
					}
            	?>
            </select>
            :
            <select id="time2">
            	<option>선택
            	<?for($i=1;$i<=5;$i++){
            		if($i*10 == substr($update_data['tutor_time'], 3, 2)){?>
            			<option value="<?echo $i*10;?>" selected><?echo $i*10?>분
            		<?}else{?>
            			<option value="<?echo $i*10;?>"><?echo $i*10?>분
            	<?
						}
					}
            	?>
            </select>
            ~
        	<select id="time3">
            	<option>선택
            	<?for($i=0;$i<=23;$i++){
            		$k = sprintf("%02d", $i);
						if($i<=11){
							if($i==0){
								if($i == substr($update_data['tutor_time'], 6, 2)){?>
									<option value="<?echo $k;?>" selected>오전 12시
								<?}else{?>
									<option value="<?echo $k;?>">오전 12시
							<?
								}
							}else{
								if($i == substr($update_data['tutor_time'], 6, 2)){?>
									<option value="<?echo $k;?>" selected>오전 <?echo $k?>시
								<?}else{?>
            						<option value="<?echo $k;?>">오전 <?echo $k?>시
            	<?
								}
							}
						}else{ 
							if($i==12){
								if($i == substr($update_data['tutor_time'], 6, 2)){?>
									<option value="<?echo $i;?>" selected>오후 12시
								<?}else{?>
									<option value="<?echo $i;?>">오후 12시
							<?}
							}else{
								$k = sprintf("%02d",$i-12);
								if($i == substr($update_data['tutor_time'], 6, 2)){?>
									<option value="<?echo $i;?>" selected>오후 <?echo $k?>시</option>	
								<?}else{?>
							<option value="<?echo $i;?>">오후 <?echo $k?>시</option>	
						<?  
								}
							}
						}
					}
            	?>
            </select>
            :
            <select id="time4">
            	<option>선택
            	<?for($i=1;$i<=5;$i++){
            		if($i*10 == substr($update_data['tutor_time'], 9, 2)){?>
            			<option value="<?echo $i*10;?>" selected><?echo $i*10?>분
            		<?}else{?>
            			<option value="<?echo $i*10;?>"><?echo $i*10?>분
            	<?
						}
					}
            	?>
            </select>
          </div>
           </br>
        </br>
         <label for="text_title" class="col-xs-2 control-label">튜터링장소</label>
        <div class="col-xs-7">
            <input type="text" class="form-control" value="<?echo $update_data['classroom'];?>" id="classroom" name="classroom" placeholder="튜터링 장소">
        </div>
        </br>
        </br>
         <label for="text_title" class="col-xs-2 control-label">참여인원</label>
        <div class="col-xs-7">
            <input type="text" class="form-control" value="<?echo $update_data['member_number'];?>" id="member_number" name="member_number" placeholder="인원">
        </div>
        </br>
        </br>
         <label for="text_title" class="col-xs-2 control-label">활동내용</label>
        <div class="col-xs-7">
            <textarea id = "activity" name="activity" class="form-control" rows="5" placeholder="활동내용" ><?echo $update_data['activity'];?></textarea>
        </div>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        <label for="text_body" class="col-xs-2 control-label">비고</label>
        <div class="col-xs-7">
            <textarea id = "note" name="note" class="form-control" rows="5" placeholder="비고" ><?echo $update_data['activity'];?></textarea>
        </div>
    </div>
    		<input type="hidden" id="board_id" name="board_id" value="<?echo $update_data['board_id'];?>" />
        	<input type="hidden" id="date" name="date" value="" />
        	<input type="hidden" id="tutor_time" name="tutor_time" value="" />
        	<input type="hidden" name="user_id" value="<?=$login_data['user_id']?>" />
        	<input type="hidden" name="user_number" value="<?=$login_data['user_number']?>" />
        	<input type="hidden" name="subject_id" value="<?=$login_data['subject_id']?>" />
        	<input type="hidden" name="user_name" value="<?=$login_data['user_name']?>" />
        	<input type="hidden" id="year" name="year" value="<?echo $this -> uri -> segment(3);?>" />
        	<input type="hidden" id="month" name="month" value="<?echo $this -> uri -> segment(4);?>" />
            <input type="button" value="수정하기" onclick="daily_form()">
            <input type="button" onclick="history.back()" value="취소">
</form>
</div>