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
				<td width="25%" ><?echo $user_data['user_number']?></td>
				<td width="8%" >학과</td>
				<td width="25%" ><?echo $user_data['user_department']?></td>
				<td width="9%" >이름</td>
				<td width="25%" ><?echo $user_data['user_name']?></td>
			</tr>
			<tr >
				<td >학년</td>
				<td ><?echo $user_data['user_year']?></td>
				<td >연락처</td>
				<td ><?echo $user_data['user_phonenumber']?></td>
				<td >이메일</td>
				<td><?echo $user_data['user_email']?></td>
			</tr> 
			<tr >
				<td >
					지원과목
				</td>
				<td>	
					<?foreach($get_subject as $it){?>
						<?if(($user_data['subject_id']) == ($it -> subject_id)){echo $it -> subject;}else{}?>
					<?}?>					
				</td>
				<td >지원과목</br>수강분반</td>
				<td >
					<?echo $user_data['user_divide']?>
				</td>
				<td >희망 난이도</td>
				<td >
					<?echo $user_data['user_level']?>
				</td>
			</tr>
			<tr >
				<td >고등학교</br>구분</td>
				<td >
					<?echo $user_data['user_hs_division']?>
				</td>
				<td >고등학교</br>계열</td>
				<td >
					<?echo $user_data['user_hs_application']?>
				</td>
				<td >튜티 가능</br>요일 및 시간</td>
				<td >
					<?echo $user_data['user_time']?>
				</td>
			</tr>
			<tr >
				<td height="250px" >지원동기</br>및 목표</td>
				<td colspan=5 ><textarea readonly="readonly" style="height:100%; width:100%;" type="text" name="user_content_application" id="user_content_application"><?echo $user_data['user_content_application'];?></textarea></td>
			</tr>
		</table>
	</div>

	<!--버튼-->
	<div class="row tutee_apply_footer" align="center">
			<input style="background:url('/static/img/tutee_back4.png') no-repeat; margin-right:0; width:60px; height:34px;" type="button" value="목록으로" onclick="javascript:history.back();">
	</div>
</div>
