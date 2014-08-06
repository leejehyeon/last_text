<div class="col-xs-8">
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