
	<?$i=1;?>
<div class="each_page">
	<!-- test table create -->
	<p class="excel_p">
		<a style="float:right; cursor:pointer;" onclick="tableToExcel('admin_tutee_table2','Worksheet','Tutee')">엑셀파일로 다운로드</a>
	</p>
	<table cellpadding="0" cellspacing="0" id="admin_tutee_table" class="border" width="100%" style="font-size:12px">
		<!-- Subject Line -->
		<tr>
			<th>
				연번
			</th>
			<th>
				지원과목
			</th>
			<th>
				학번
			</th>
			<th>
				학과
			</th>
			<th>
				이름
			</th>
			<th>
				학년
			</th>
			<th>
				전화
			</th>
			<th>
				이메일
			</th>
			<th>
				고등학교 구분
			</th>
			<th>
				고등학교 계열
			</th>
			<th>
				난이도
			</th>
			<th>
				튜티가능 요일
			</th>
			<th>
				지원동기 및 목표
			</th>
			<th>
				등급올리기
			</th>
		</tr>
		<!-- 본문 내용 반복문 -->
		
		<?
		foreach($get_tutee_list as $gt){
		foreach($get_list as $lt){
			if(($lt -> user_id == $gt -> user_id) && ($gt -> grade == "4")){?>
				<tr class="border">
					<td class="border">
						<?echo $i?>
					</td>
					<td class="border">
						<?foreach($get_subject as $it){?>
						<?if(($lt -> subject_id) == ($it -> subject_id)){echo $it -> subject;}else{}?>
						<?}?>
					</td>
					<td class="border">
						<?echo $lt -> user_number?>
					</td>
					<td class="border">
						<?echo $lt -> user_department?>
					</td>
					<td class="border">
						<a href="/index.php/administration/tutee/view_tutee?user_id=<?echo $lt -> user_id?>"><?echo $lt -> user_name?></a>
					</td>
					<td class="border">
						<?echo $lt -> user_year?>
					</td>
					<td class="border">
						<?echo $lt -> user_phonenumber?>
					</td>
					<td class="border">
							<?
							$email = $lt -> user_email;
							$explode_email = explode("@", $email);
							$email_first = $explode_email[0];
							if (isset($explode_email[1])) {
								$email_second = $explode_email[1];
								echo $email_first . "<br/>";
								echo "@" . $email_second . "<br/>";
							}
							?>
					</td>
					<td class="border">
						<?echo $lt -> user_hs_division?>
					</td>
					<td class="border">
						<?echo $lt -> user_hs_application?>
					</td>
					<td class="border">
						<?echo $lt -> user_level?>
					</td>
					<td class="border">
						<?echo $lt -> user_time?>
					</td>
					<td class="border">
						<textarea readonly="readonly" style="border:none; resize:none; height:100%;"><?echo $lt -> user_content_application?></textarea>
					</td>
					<td class="border">
						<form method="post" action="/index.php/administration/tutee_grade_up">
							<label class="styled_select3">
								<select name="user_subject" id="user_subject<?echo $i?>">
								<?foreach($get_subject as $st){?>
									<option value="<?echo $st->subject_id;?>"><?echo $st->subject;?>
								<?}?>
								</select>
							</label>
							<label class="styled_select3">
								<select class="tutee_subject_select" name="user_divide" id="user_divide<?echo $i?>">
								<?foreach($get_sub_list as $yt){?>
									<option class="<?echo $yt->subject_id;?>" value="<?echo $yt->subject_level;?>"><?echo $yt->subject_level;?>
								<?} ?>
								</select>
							</label>
							<label class="styled_select3">
								<select name="user_time" id="user_time" style="width : 107px;">
									<option>선택하세요
									<option>월수(18:30~20:00)
									<option>월수(20:00~21:30)
									<option>화목(18:30~20:00)
									<option>화목(20:00~21:30)
								</select>
							</label>
							<!--
							<select name="user_divide" id="user_divide1">
								<option>선택하세요</option>
							</select>
							--> 
							<input type="hidden" id="user_id" name="user_id" value="<?echo $lt -> user_id?>" />	
							<input type="hidden" id="user_application_subject" name="user_application_subject" value="check"/>
							<input type="submit" value="등급올리기" />
						</form>
					</td>
				</tr>
		<?
		$i++;
		}else{};
		}
		}?>
	</table>
<!-- excel down table -->
	<table cellpadding="0" cellspacing="0" id="admin_tutee_table2" class="border" width="100%" style="font-size:12px; display:none">
		<!-- Subject Line -->
		<tr>
			<th style="text-align:center">
				연번
			</th>
			<th style="text-align:center">
				지원과목
			</th>
			<th style="text-align:center">
				학번
			</th>
			<th style="text-align:center">
				학과
			</th>
			<th style="text-align:center">
				이름
			</th>
			<th style="text-align:center">
				학년
			</th>
			<th style="text-align:center">
				전화
			</th>
			<th style="text-align:center">
				이메일
			</th>
			<th style="text-align:center">
				고등학교 구분
			</th>
			<th style="text-align:center">
				고등학교 계열
			</th>
			<th style="text-align:center">
				난이도
			</th>
			<th style="text-align:center">
				튜티가능 요일
			</th>
			<th style="text-align:center">
				지원동기 및 목표
			</th>
		</tr>
		<!-- 본문 내용 반복문 -->
		
		<?
		foreach($get_tutee_list as $gt){
		foreach($get_list as $lt){
			if(($lt -> user_id == $gt -> user_id) && ($gt -> grade == "4")){?>
				<tr class="border" style="height:100px">
					<td class="border" style="text-align:center">
						<?echo $i?>
					</td>
					<td class="border" style="text-align:center">
						<?foreach($get_subject as $it){?>
						<?if(($lt -> subject_id) == ($it -> subject_id)){echo $it -> subject;}else{}?>
						<?}?>
					</td>
					<td class="border" style="text-align:center">
						<?echo $lt -> user_number?>
					</td>
					<td class="border" style="text-align:center">
						<?echo $lt -> user_department?>
					</td>
					<td class="border" style="text-align:center">
						<?echo $lt -> user_name?>
					</td>
					<td class="border" style="text-align:center">
						<?echo $lt -> user_year?>
					</td>
					<td class="border" style="text-align:center">
						<?echo $lt -> user_phonenumber?>
					</td>
					<td class="border" style="text-align:center">
							<?
							echo $lt -> user_email;
							?>
					</td>
					<td class="border" style="text-align:center">
						<?echo $lt -> user_hs_division?>
					</td>
					<td class="border" style="text-align:center">
						<?echo $lt -> user_hs_application?>
					</td>
					<td class="border" style="text-align:center">
						<?echo $lt -> user_level?>
					</td>
					<td class="border" style="text-align:center">
						<?echo $lt -> user_time?>
					</td>
					<td class="border">
						<?echo $lt -> user_content_application?>
					</td>
				</tr>
		<?
		$i++;
		}else{};
		}
		}?>
	</table>
<!-- excel down table -->

</select>
	<div style="float: right;margin-top: 30px;margin-left: 10px;">
	<form method="post" action="/index.php/tutor_tutee_application/change_application_off">
	<input class="gray_button_2 margin_0" type="submit" value="지원기간 아님" />
	</form>
	</div>
	<div style="float: right;margin-top: 30px;">
	<form method="post" action="/index.php/tutor_tutee_application/change_application_on">
	<input class="gray_button margin_0" type="submit" value="지원기간 중" />
	</form>
	</div>
	<div style=" float: right; margin-top: 30px; ">
	<?if($tutee_tutor_application['user_application'] == "X"){?>
		<p style=" margin-bottom: 0px; margin-top: 3px; margin-right: 20px;">현재 튜터,튜티 지원기간 아님</p>
	<?}else{?>
		<p style=" margin-bottom: 0px; margin-top: 3px; margin-right: 20px;">현재 튜터,튜티 지원기간 중</p>
	<?}?>
	</div>
</div>