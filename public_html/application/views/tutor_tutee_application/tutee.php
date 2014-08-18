<form name="form" method="post" action="/index.php/tutor_tutee_application/tutee_insert">
<div class="col-xs-12">
	<div align="center" class = "row tutee_apply_Head" >
		<p><img src="/static/img/tutee_apply_icon2.png"> 튜티지원서</p>
	</div>
	
	<div align="center" class = "row tutee_apply_title" >
		<div class="col-xs-12">2014학년도 1학기 튜티지원서</div>
	</div>
	
	<div align="center" class = "row" id="tblMain">
		<table width="50%" cellpadding="0" cellspacing="0" style="text-align:center;" class="tutee_application_table">
			<tr >
				<td width="20%" >학번</td>
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
				<td><?echo $login_data['user_email']?></td>
			</tr> 
			<tr >
				<td >
					지원과목
				</td>
				<td>
					<label class="styled_select">
						<select name="user_subject" id="user_subject1">
							<?foreach($get_list as $lt){?>
							<option value="<?echo $lt->subject_id;?>"><? echo $lt->subject;?>
							<?}?>
						</select> 					
					</label>
				</td>
				<td >지원과목</br>수강분반</td>
				<td >
					<label class="styled_select">
						<select name="user_divide" id="user_divide1">
							<?foreach($get_sub_list as $lt){?>
							<option class="<?echo $lt->subject_id?>" value="<?echo $lt->subject_level?>"><?echo $lt->subject_level?>
							<?}?>					
						</select>
					</label>
				</td>
				<td >희망 난이도</td>
				<td >
					<label class="styled_select styled_select_user_time">
						<select name="user_level" id="user_level">
							<option>선택하세요
							<option>상
							<option>중
							<option>하
						</select>
					</label>
				</td>
			</tr>
			<tr >
				<td >고등학교</br>구분</td>
				<td >
					<label class="styled_select">
						<select name="user_hs_division" id="user_hs_division">
							<option>선택하세요
							<option>인문계
							<option>전문계
							<option>기타
						</select>
					</label>
				</td>
				<td >고등학교</br>계열</td>
				<td >
					<label class="styled_select">
						<select name="user_hs_application" id="user_hs_application">
							<option>선택하세요
							<option>이과
							<option>문과
							<option>기타
						</select>
					</label>
				</td>
				<td >튜티 가능</br>요일 및 시간</td>
				<td >
					<label class="styled_select styled_select_user_time">
						<select name="user_time" id="user_time">
							<option>선택하세요
							<option>월수(18:30~20:00)
							<option>월수(20:00~21:30)
							<option>화목(18:30~20:00)
							<option>화목(20:00~21:30)
						</select>
					</label>
				</td>
			</tr>
			<tr >
				<td height="250px" >지원동기</br>및 목표</td>
				<td colspan=5 ><textarea style="height:100%; width:100%;" type="text" name="user_content_application" id="user_content_application"></textarea></td>
			</tr>
		</table>
	</div>

	<!--버튼-->
	<div class="row tutee_apply_footer" align="center">
			<input type="button" value="취소" onclick="javascript:history.back();">
			<input type="submit" value="작성" onclick="return confirming_tutee_application();" >
	</div>
	<input type="hidden" name="user_id" value="<?=$login_data['user_id']?>" />
	<input type="hidden" name="user_number" value="<?=$login_data['user_number']?>" />
	<input type="hidden" name="user_department" value="<?=$login_data['user_department']?>" />
	<input type="hidden" name="user_name" value="<?=$login_data['user_name']?>" />
	<input type="hidden" name="user_year" value="<?=$login_data['user_year']?>" />
	<input type="hidden" name="user_number" value="<?=$login_data['user_number']?>" />
	<input type="hidden" name="user_phonenumber" value="<?=$login_data['user_phonenumber']?>" />
	<input type="hidden" name="user_email" value="<?=$login_data['user_email']?>" />
	<input type="hidden" name="user_application_subject" value="tutee" />
</div>
</form>	