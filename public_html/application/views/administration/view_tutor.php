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
				<td ><?echo $user_data['user_email']?></td>
			</tr>
			<tr>
				<td colspan=2>
					지원과목
				</td>
				<td colspan=4>
					<?foreach($get_subject as $it){?>
						<?if(($user_data['subject_id']) == ($it -> subject_id)){echo $it -> subject;}else{}?>
					<?}?>
				</td>
			</tr>
			<tr>
			<td height="100px" colspan=2 rowspan=5 >지원분야 성적</td>							
			<?for($i=1;$i<=5;$i++){
				if($user_data['user_grade'.+$i] != ""){
					$user_grade_array = explode('/',$user_data['user_grade'.+$i]);?>
					<td colspan=2>
						<?echo $user_grade_array[0]?>
					</td>
					<td colspan=2>
						<?echo $user_grade_array[1]?>
					</td>
				<?}else{?>
					<td colspan=2>
					</td>
					<td colspan=2>
					</td>
				<?}
				?>
				
			</tr>
			<input type="hidden" name="user_grade<?echo $i;?>" id="user_grade<?echo $i;?>" value=" "/>
			<?}?> 
			<tr>
				<td colspan=2 height="50px" width="20%" >튜터 가능요일 및 시간</td>
				<td colspan=4 >
					<?echo $user_data['user_time']?>
				</td>
			</tr>
			<tr class="tutor_apply_input_tr1">
				<td>
					경력사항
				</td>
				<td colspan=5>
					<textarea readonly="readonly" style="height:100%; width:100%" type="text" name="user_career" id="user_career"><?=$user_data['user_career']?></textarea>
				</td>
			</tr>
			<tr class="tutor_apply_input_tr2">
				<td>
					지원동기</br>
					및 목표
				</td>
				<td colspan=5>
					<textarea readonly="readonly" style="height:100%; width:100%" type="text" name="user_content_application" id="user_content_application"><?=$user_data['user_content_application']?></textarea>
				</td>
			</tr>
		</table>
	</div>

	<div class = "row tutee_apply_footer" align="center">
		<input  style="background:url('/static/img/tutee_back4.png') no-repeat; margin-right:0; width:60px; height:34px;" type="button" value="목록으로" onclick="javascript:history.back();">
	</div>
</div>
