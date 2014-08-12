<form name="grade_form" method="post" action="/index.php/tutor_tutee_application/tutor_update">
<div class="col-xs-12">
	<div class="row tutee_apply_Head">
		<p>
			<img src="/static/img/tutee_apply_icon2.png"> 튜터지원서
		</p>
	</div>
	
	<div align="center" class = "row tutee_apply_title" >
		<div class="col-xs-12">2014학년도 1학기 튜터지원서</div>
	</div>
	<div class = "row" align="center"> 
		<table width="50%" cellpadding="0" cellspacing="0" style="text-align:center" class="tutor_application_table">
			<tr >
				<td width="8%" >학번</td>
				<td width="25%" ><?echo $login_data['user_number']?></td>
				<td width="8%" >학과</td>
				<td width="25%" ><?echo $login_data['user_department']?></td>
				<td width="9%" >이름</td>
				<td width="25%" ><?echo $login_data['user_name']?></td>
			</tr>
			<tr >
				<td >학년</td>
				<td ><?echo $login_data['user_year']?></td>
				<td >연락처</td>
				<td ><?echo $login_data['user_phonenumber']?></td>
				<td >이메일</td>
				<td ><?echo $login_data['user_email']?></td>
			</tr>
			<tr>
				<td colspan=2>
					지원과목
				</td>
				<td colspan=4>
				<label class="styled_select2">
					<select name="user_subject" id="user_subject">
						<?foreach($get_list as $lt){
							if($user_data['subject_id'] == $lt -> subject_id){?>
								<option value="<?echo $lt->subject_id;?>" selected><? echo $lt->subject;?>
							<?}else{?>
								<option value="<?echo $lt->subject_id;?>"><? echo $lt->subject;?>
						<?	}
						}?>
					</select> 					
				</label>
				</td>
			</tr>
			<tr>
			<td height="100px" colspan=2 rowspan=5 >지원분야 성적</td>							
			<?for($i=1;$i<=5;$i++){
				$user_grade_array = explode('/',$user_data['user_grade'.+$i]);
				?>
				<td colspan=2>
				<label class="styled_select2">
					<select name="user_subject<?echo $i;?>" id="user_subject<?echo $i;?>">
						<?foreach($get_list as $lt){
							if($lt -> subject == $user_grade_array[0]){?>
								<option selected><? echo $lt->subject;?>
							<?
							}else{
							?>
							<option><? echo $lt->subject;?>
						<?	}
						}?>
					</select>
				</label>
				</td>
				<td colspan=2>
				<label class="styled_select2">
					<select name="user_grade_choose<?echo $i;?>" id="user_grade_choose<?echo $i;?>" class="tutor_apply_second_select">
					<?if($user_grade_array[1] != ""){?>
								<option>선택하세요
							<?if($user_grade_array[1] == "A+"){?>
								<option selected>A+
							<?}else{?>
								<option>A+
							<?}?>
							<?if($user_grade_array[1] == "Ao"){?>
								<option selected>Ao
							<?}else{?>
								<option>Ao
							<?}?>
							<?if($user_grade_array[1] == "B+"){?>
								<option selected>B+
							<?}else{?>
								<option>B+
							<?}?>
							<?if($user_grade_array[1] == "Bo"){?>
								<option selected>Bo
							<?}else{?>
								<option>Bo
							<?}?>
							<?if($user_grade_array[1] == "C+"){?>
								<option selected>C+
							<?}else{?>
								<option>C+
							<?}?>
							<?if($user_grade_array[1] == "Co"){?>
								<option selected>Co
							<?}else{?>
								<option>Co
							<?}?>
							<?if($user_grade_array[1] == "D+"){?>
								<option selected>D+
							<?}else{?>
								<option>D+
							<?}?>
							<?if($user_grade_array[1] == "Do"){?>
								<option selected>Do
							<?}else{?>
								<option>Do
							<?}?>
							<?if($user_grade_array[1] == "F"){?>
								<option selected>F
							<?}else{?>
								<option>F
							<?}?>
					<?}else{?>
						<option>선택하세요
						<option>A+
						<option>Ao
						<option>B+
						<option>Bo
						<option>C+
						<option>Co
						<option>D+
						<option>Do
						<option>F
					<?}?>
					</select>
					</label>
				</td>
			</tr>
			<input type="hidden" name="user_grade<?echo $i;?>" id="user_grade<?echo $i;?>" value=" "/>
			<?}?> 
			<tr>
				<td colspan=2 height="50px" width="20%" >튜터 가능요일 및 시간</td>
				<td colspan=4 >
				<label class="styled_select2">
					<select name="user_time" id="user_time">
						<?if($user_data['user_time'] != ""){?>
							<option>선택하세요
						<?if($user_data['user_time'] == "월수(18:30~20:00)"){?>
								<option selected>월수(18:30~20:00)
							<?}else{?>
								<option>월수(18:30~20:00)
							<?}?>
						<?if($user_data['user_time'] == "월수(20:00~21:30)"){?>
								<option selected>월수(20:00~21:30)
							<?}else{?>
								<option>월수(20:00~21:30)
							<?}?>
						<?if($user_data['user_time'] == "화목(18:30~20:00)"){?>
								<option selected>화목(18:30~20:00)
							<?}else{?>
								<option>화목(18:30~20:00)
							<?}?>
						<?if($user_data['user_time'] == "화목(20:00~21:30)"){?>
								<option selected>화목(20:00~21:30)
							<?}else{?>
								<option>화목(20:00~21:30)
							<?}
						}else{?>
						<option>선택하세요
						<option>월수(18:30~20:00)
						<option>월수(20:00~21:30)
						<option>화목(18:30~20:00)
						<option>화목(20:00~21:30)
						<?}?>
					</select>
				</label>
				</td>
			</tr>
			<tr class="tutor_apply_input_tr1">
				<td>
					경력사항
				</td>
				<td colspan=5>
					<textarea style="height:100%; width:100%" type="text" name="user_career" id="user_career"><?=$user_data['user_career']?></textarea>
				</td>
			</tr>
			<tr class="tutor_apply_input_tr2">
				<td>
					지원동기</br>
					및 목표
				</td>
				<td colspan=5>
					<textarea style="height:100%; width:100%" type="text" name="user_content_application" id="user_content_application"><?=$user_data['user_content_application']?></textarea>
				</td>
			</tr>
		</table>
	</div>

	<div class = "row tutee_apply_footer" align="center">
		<input type="button" value="취소" onclick="javascript:history.back();">
		<input type="button" value="작성" onclick="rating();">
	</div>
		<input type="hidden" name="user_id" value="<?=$login_data['user_id']?>" />
		<input type="hidden" name="user_number" value="<?=$login_data['user_number']?>" />
		<input type="hidden" name="user_department" value="<?=$login_data['user_department']?>" />
		<input type="hidden" name="user_name" value="<?=$login_data['user_name']?>" />
		<input type="hidden" name="user_year" value="<?=$login_data['user_year']?>" />
		<input type="hidden" name="user_number" value="<?=$login_data['user_number']?>" />
		<input type="hidden" name="user_phonenumber" value="<?=$login_data['user_phonenumber']?>" />
		<input type="hidden" name="user_email" value="<?=$login_data['user_email']?>" />
		<input type="hidden" name="user_application_subject" value="tutor" />
	</div>
</form>