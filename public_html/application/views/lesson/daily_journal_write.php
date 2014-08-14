<!--<div class="col-xs-8">
<form name="day_form" class="form-horizontal" method="post" action="/index.php/lesson/daily_journal_write_ok" style = "font-size: 13px">
    <div class="form-group">
        <label for="text_title" class="col-xs-2 control-label">제목</label>
        <div class="col-xs-7">
            <input type="text" class="form-control" id="text_title" name="subject" placeholder="제목">
        </div>
       </br>
       </br>
        <label for="text_title" class="col-xs-2 control-label">날짜</label>
        <div class="col-xs-7">
        <select id="year" name="year" onchange="month_day_set()">
        <?for($i = 2014; $i <= 2024; $i++){?>
			<?if($i == date('Y')){?>
				<option id="<?echo $i;?>" value="<?echo $i;?>" selected><?echo $i;?>년</option>
			<?}else{?>
				<option id="<?echo $i;?>" value="<?echo $i;?>"><?echo $i;?>년</option>
			<?
			}	
		}?>
		</select>
		 <select id="month" name="month" onchange="day_set()">
        <?for($i = 1; $i <= 12; $i++){
		$k = sprintf("%02d", $i);
	?>
		<?if($i == date('m')){?>
			<option id="<?echo $k;?>" value="<?echo $k;?>" selected><?echo $i;?>월</option>
		<?}else{?>
			<option id="<?echo $k;?>" value="<?echo $k;?>"><?echo $i;?>월</option>
	<?
		}	
	}?>
		</select>
		 <select id="day" name="day">
		 	<?for($i = 1; $i <= 31; $i++){
				$k = sprintf("%02d", $i);
			?>
				<?if($i == date('d')){?>
					<option id="<?echo $k;?>" value="<?echo $k;?>" selected><?echo $i;?>일</option>
				<?}else{?>
					<option id="<?echo $k;?>" value="<?echo $k;?>"><?echo $i;?>일</option>
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
							if($i==0){?>
								<option value="<?echo $k;?>">오전 12시
							<?}else{
            			?>
            			<option value="<?echo $k;?>">오전 <?echo $k?>시
            	<?
							}
						}else{ 
							if($i==12){?>
								<option value="<?echo $i;?>">오후 12시
						<?
							}else{
								$k = sprintf("%02d",$i-12);
							?>
							<option value="<?echo $i;?>">오후 <?echo $k?>시</option>	
						<?  
							}
						}
					}
            	?>
            </select>
            :
            <select id="time2">
            	<option>선택
            	<?for($i=0;$i<=5;$i++){
					if($i == 0){
						$k = sprintf("%02d", $i);
				?>
						<option value="<?echo $k;?>"><?echo $k?>분
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
							if($i==0){?>
								<option value="<?echo $k;?>">오전 12시
							<?}else{
            			?>
            			<option value="<?echo $k;?>">오전 <?echo $k?>시
            	<?
							}
						}else{
							if($i==12){?>
								<option value="<?echo $i;?>">오후 12시
						<?
							}else{
								$k = sprintf("%02d",$i-12);
							?>
							<option value="<?echo $i;?>">오후 <?echo $k?>시</option>	
						<?  
							}
						}
					}
            	?>
            </select>
            :
            <select id="time4">
            	<option>선택
            	<?for($i=0;$i<=5;$i++){
					if($i == 0){
						$k = sprintf("%02d", $i);
				?>
						<option value="<?echo $k;?>"><?echo $k?>분
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
            <input type="text" class="form-control" id="classroom" name="classroom" placeholder="튜터링 장소">
        </div>
        </br>
        </br>
         <label for="text_title" class="col-xs-2 control-label">참여인원</label>
        <div class="col-xs-7">
            <input type="text" class="form-control" id="member_number" name="member_number" placeholder="인원">
        </div>
        </br>
        </br>
         <label for="text_title" class="col-xs-2 control-label">활동내용</label>
        <div class="col-xs-7">
            <textarea id = "activity" name="activity" class="form-control" rows="5" placeholder="활동내용" ></textarea>
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
            <textarea id = "note" name="note" class="form-control" rows="5" placeholder="비고" ></textarea>
        </div>
    </div>
        	<input type="hidden" id="date" name="date" value="" />
        	<input type="hidden" id="tutor_time" name="tutor_time" value="" />
        	<input type="hidden" name="user_id" value="<?=$login_data['user_id']?>" />
        	<input type="hidden" name="user_number" value="<?=$login_data['user_number']?>" />
        	<input type="hidden" name="subject_id" value="<?=$login_data['subject_id']?>" />
        	<input type="hidden" name="user_name" value="<?=$login_data['user_name']?>" />
        	<input type="hidden" id="year" name="year" value="<?echo $this -> uri -> segment(3);?>" />
        	<input type="hidden" id="month" name="month" value="<?echo $this -> uri -> segment(4);?>" />
            <input type="button" value="작성" onclick="daily_form();">
            <input type="button" onclick="history.back()" value="취소">
</form>
</div>
여기까지 진우님-->
<div class="each_page each_page_padding">
<form name="day_form" class="form-horizontal" method="post" action="/index.php/lesson/daily_journal_write_ok" style = "font-size: 13px">
<table>
					<tr>
						<td class=""><p class="daily_journal_write_text">제목</p></td>
						<td><input type="text" class="daily_journal_write_input" id="text_title" name="subject" placeholder="제목"></td>
					</tr>
					<tr>
						<td class=""><p class="daily_journal_write_text">날짜</p></td>
						<td><label class="styled_select9 margin_bottom_10">
        <select class="custom_select daily_journal_write_year_time padding_left_7"id="year">
        <?for($i = 2013; $i <= 2017; $i++){?>
			<?if($i == date('Y')){?>
				<option id="<?echo $i; ?>" value="<?echo $i; ?>" selected><?echo $i; ?></option>
			<?}else{ ?>
				<option id="<?echo $i; ?>" value="<?echo $i; ?>"><?echo $i; ?></option>
			<?
			}
			}
		?>
		</select>
		</label><span class="daily_journal_write_middle_text padding_top_3">년</span>
		<label class="styled_select9">
		 <select class="custom_select daily_journal_write_month_day" id="month" onChange="change_day(this);">
        <?for($i = 1; $i <= 12; $i++){
		$k = sprintf("%02d", $i);
	?>
		<?if($i == date('m')){?>
			<option id="<?echo $k; ?>" value="<?echo $k; ?>" selected><?
			if ($i < 10) {echo "0" . $i;
			} else {echo $i;
			}
		?></option>
		<?}else{ ?>
			<option id="<?echo $k; ?>" value="<?echo $k; ?>"><?
			if ($i < 10) {echo "0" . $i;
			} else {echo $i;
			}
		?></option>
	<?
	}
	}
?>
		</select>
		</label><span class="daily_journal_write_middle_text">월</span>
		<label class="styled_select9">
		 <select class="custom_select daily_journal_write_month_day" id="day">
		 	<?
			$year = date('Y');
			$month = date('m');
			for ($day_month = 31; $day_month >= 27; $day_month--) {
				if (checkdate($month, $day_month, $year)) {
					$day = $day_month;
					break;
				}
			}
		 	?>
		 		<?
		 			for($i = 1; $i <= $day; $i++){
	  				$k = sprintf("%02d", $i);
		 		?>
		 	<? ?>
		<?if($i == date('d')){?>
			<option id="<?echo $k?>" value="<?echo $k; ?>" selected><?
			if ($i < 10) {echo "0" . $i;
			} else {echo $i;
			}
		?></option>
		<?}else{ ?>
			<option id="<?echo $k?>" value="<?echo $k; ?>"><?
			if ($i < 10) {echo "0" . $i;
			} else {echo $i;
			}
		?></option>
	<?
	}
	}
?>
		</select>
		</label><span class="daily_journal_write_middle_text">일</span></td>
					</tr>
					<tr>
						<td class=""><p class="daily_journal_write_text">튜터링 시간</p></td>
						<td><label class="styled_select9 margin_bottom_10">
            <select class="custom_select daily_journal_write_year_time" id="time1">
            	<option>시간
            	<?for($i=0;$i<=23;$i++){
            		$k = sprintf("%02d", $i);
						if($i<=11){
							if($i==0){?>
								<option value="<?echo $k; ?>">12
							<?}else{ ?>
            			<option value="<?echo $k; ?>"> <?echo $k?>
            	<?
			}
			}else{
			if($i==12){
		?>
								<option value="<?echo $i; ?>">12
						<?
						}else{
						$k = sprintf("%02d",$i-12);
							?>
							<option value="<?echo $i; ?>"><?echo $k?></option>	
						<?
						}
						}
						}
            	?>
            </select>
            </label>
            <span class="daily_journal_write_middle_text_second">:</span>
            <label class="styled_select9">
            <select class="custom_select daily_journal_write_year_time" id="time2">
            	<option>분
            	<?for($i=1;$i<=5;$i++){
            		?>
            			<option value="<?echo $i * 10; ?>"><?echo $i*10?>
            	<?
			}
            	?>
            </select>
            </label>
            <span class="daily_journal_write_middle_text_third">~</span>
            <label class="styled_select9">
        	<select class="custom_select daily_journal_write_year_time" id="time3">
            	<option>시간
            	<?for($i=0;$i<=23;$i++){
            		$k = sprintf("%02d", $i);
						if($i<=11){
							if($i==0){?>
								<option value="<?echo $k; ?>">12
							<?}else{ ?>
            			<option value="<?echo $k; ?>"><?echo $k?>
            	<?
			}
			}else{
			if($i==12){
		?>
								<option value="<?echo $i; ?>">12
						<?
						}else{
						$k = sprintf("%02d",$i-12);
							?>
							<option value="<?echo $i; ?>"><?echo $k?></option>	
						<?
						}
						}
						}
            	?>
            </select>
            </label>
            <span class="daily_journal_write_middle_text_second">:</span>
            <label class="styled_select9">
            <select class="custom_select daily_journal_write_year_time" id="time4">
            	<option>분
            	<?for($i=1;$i<=5;$i++){
            		?>
            			<option value="<?echo $i * 10; ?>"><?echo $i*10?>
            	<?
			}
            	?>
            </select>
            </label></td>
					</tr
					><tr>
						<td ><p class="daily_journal_write_text">튜터링 장소</p></td>
						<td><input type="text" class="daily_journal_write_input" id="classroom" name="classroom" placeholder="튜터링 장소"></td>
					</tr>
					<tr>
						<td ><p class="daily_journal_write_text">참여인원</p></td>
						<td><input type="text" class="daily_journal_write_input" id="member_number" name="member_number" placeholder="인원"></td>
					</tr>
					<tr>
						<td ><p class="daily_journal_write_textarea_text">활동내용</p></td>
						<td><textarea id = "activity" name="activity" class="daily_journal_write_textarea" rows="5" placeholder="활동내용" ></textarea></td>
					</tr>
					<tr>
						<td ><p class="daily_journal_write_textarea_text">비고</p></td>
						<td><textarea id = "note" name="note" class="daily_journal_write_textarea" rows="5" placeholder="비고" ></textarea></td>
					</tr>
</table>
        	<input type="hidden" id="date" name="date" value="" />
        	<input type="hidden" id="tutor_time" name="tutor_time" value="" />
        	<input type="hidden" name="user_id" value="<?=$login_data['user_id'] ?>" />
        	<input type="hidden" name="user_number" value="<?=$login_data['user_number'] ?>" />
        	<input type="hidden" name="subject_id" value="<?=$login_data['subject_id'] ?>" />
        	<input type="hidden" name="user_name" value="<?=$login_data['user_name'] ?>" />
        	<input type="hidden" id="year" name="year" value="<?echo $this -> uri -> segment(3); ?>" />
        	<input type="hidden" id="month" name="month" value="<?echo $this -> uri -> segment(4); ?>" />
        	<div class="daily_journal_write_button_area">
            <input class="small_gray_button2" type="button" onclick="history.back()" value="취소">
            <input class="small_blue_button" type="button" value="작성" onclick="daily_form();">
            </div>
</form>
</div>
</div>