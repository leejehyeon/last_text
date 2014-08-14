<?$i=1;?>
<div class="each_page">
	<!-- test table create -->
	<p class="excel_p">
		<a style="float:right; cursor:pointer;" onclick="tableToExcel('admin_tutor_table2','Worksheet','Tutor')">엑셀파일로 다운로드</a>
	</p>
	<form method="post" action="/index.php/">
	<table cellpadding="0" cellspacing="0" id="admin_tutor_table" class="border" width="100%" style="font-size:12px">
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
				전화번호
			</th>
			<th>
				이메일
			</th>
			<th>
			 	지원분야 성적
			</th>
			<th>
				튜티가능 요일
			</th>
			<th>
				경력사항
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
		foreach($get_tutor_list as $gt){
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
						<?echo $lt->user_number?>
					</td>
					<td class="border">
						<?echo $lt->user_department?>
					</td>
					<td class="border">
						<a href="/index.php/administration/tutor/view_tutor?user_id=<?echo $lt -> user_id?>"><?echo $lt -> user_name?></a>
					</td>
					<td class="border">
						<?echo $lt->user_year?>
					</td>
					<td class="border">
						<?echo $lt->user_phonenumber?>
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
							<?$subject_grade1 = $lt -> user_grade1;
							$explode_grade1 = explode("/", $subject_grade1);
							$subject1 = $explode_grade1[0];
							if (isset($explode_grade1[1])) {
								$grade1 = $explode_grade1[1];
								echo $subject1 . "<br/>";
								echo $grade1 . "<br/>";
							}
							?>
							<?$subject_grade2 = $lt -> user_grade2;
								$explode_grade2 = explode("/", $subject_grade2);
								$subject2 = $explode_grade2[0];
								if (isset($explode_grade2[1])) {
									$grade2 = $explode_grade2[1];
									echo $subject2 . "<br/>";
									echo $grade2 . "<br/>";
								}
							?>
							<?$subject_grade3 = $lt -> user_grade3;
								$explode_grade3 = explode("/", $subject_grade3);
								$subject3 = $explode_grade3[0];
								if (isset($explode_grade3[1])) {
									$grade3 = $explode_grade3[1];
									echo $subject3 . "<br/>";
									echo $grade3 . "<br/>";
								}
							?>
							<?$subject_grade4 = $lt -> user_grade4;
								$explode_grade4 = explode("/", $subject_grade4);
								$subject4 = $explode_grade4[0];
								if (isset($explode_grade4[1])) {
									$grade4 = $explode_grade4[1];
									echo $subject4 . "<br/>";
									echo $grade4 . "<br/>";
								}
							?>
							<?$subject_grade5 = $lt -> user_grade5;
								$explode_grade5 = explode("/", $subject_grade5);
								$subject5 = $explode_grade5[0];
								if (isset($explode_grade5[1])) {
									$grade5 = $explode_grade5[1];
									echo $subject5 . "<br/>";
									echo $grade5 . "<br/>";
								}
							?>
					</td>
					<td class="border">
						<?echo $lt->user_time?>
					</td>
					<td class="border">
						<textarea readonly="readonly" style="border:none; resize:none; height:100%;"><?echo $lt->user_career?></textarea>
					</td>
					<td class="border">
						<textarea readonly="readonly" style="border:none; resize:none; height:100%;"><?echo $lt->user_content_application?></textarea>
					</td>
					<td class="border">
						<form method="post" action="/index.php/administration/tutor_grade_up">
							<label class="styled_select3">
								<select name="user_subject" id="user_subject<?echo $i?>">
								<?foreach($get_subject as $st){?>
									<option value="<?echo $st->subject_id;?>"><? echo $st->subject;?>
								<?}?>
								</select>
							</label>
							<label class="styled_select3">
								<select name="user_divide" id="user_divide<?echo $i?>">
								<?foreach($get_sub_list as $yt){?>
									<option class="<?echo $yt->subject_id?>" value="<?echo $yt->subject_level?>"><?echo $yt->subject_level?>
								<?}?>					
								</select> 
							</label>
							<input type="hidden" id="user_id" name="user_id" value="<?echo $lt -> user_id?>" />	
							<input type="hidden" id="user_application_subject" name="user_application_subject" value="check"/>
							<input type="submit" value="등급올리기" />
						</form>
					</td>
				</tr>
		<?
		$i++;
		}
		}
		}?>
		
	</table>
	</form>
<?$k = 1;?>
<!-- 출력용 Tabel -->
	<table cellpadding="0" cellspacing="0" id="admin_tutor_table2" class="border" width="100%" style="font-size:12px; display:none; text-align:center;">
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
				전화번호
			</th>
			<th style="text-align:center">
				이메일
			</th>
			<th colspan=2 style="text-align:center">
			 	지원분야 성적
			</th>
			<th style="text-align:center">
				튜티가능 요일
			</th>
			<th style="text-align:center">
				경력사항
			</th>
			<th style="text-align:center">
				지원동기 및 목표
			</th>
		</tr>
		<!-- 본문 내용 반복문 -->
		<?
		foreach($get_tutor_list as $gt){
		foreach($get_list as $lt){
			if(($lt -> user_id == $gt -> user_id) && ($gt -> grade == "4")){?>
				<tr class="border" style="height:150px;">
					<td class="border" style="text-align:center">
						<?echo $k?>
					</td>
					<td class="border" style="text-align:center">
						<?foreach($get_subject as $it){?>
						<?if(($lt -> subject_id) == ($it -> subject_id)){echo $it -> subject;}else{}?>
						<?}?>
					</td>
					<td class="border" style="text-align:center">
						<?echo $lt->user_number?>
					</td>
					<td class="border" style="text-align:center">
						<?echo $lt->user_department?>
					</td>
					<td class="border" style="text-align:center">
						<?echo $lt -> user_name?>
					</td>
					<td class="border" style="text-align:center">
						<?echo $lt->user_year?>
					</td>
					<td class="border" style="text-align:center">
						<?echo $lt->user_phonenumber?>
					</td>
					<td class="border" style="text-align:center">
							<?echo $lt -> user_email?>
					</td>
					<td class="border">
							<?$subject_grade1 = $lt -> user_grade1;
							$explode_grade1 = explode("/", $subject_grade1);
							$subject1 = $explode_grade1[0];
							if (isset($explode_grade1[1])) {
								$grade1 = $explode_grade1[1];
								echo $subject1. "<br/>";
							}
							?>
							<?$subject_grade2 = $lt -> user_grade2;
								$explode_grade2 = explode("/", $subject_grade2);
								$subject2 = $explode_grade2[0];
								if (isset($explode_grade2[1])) {
									$grade2 = $explode_grade2[1];
									echo $subject2. "<br/>";
								}
							?>
							<?$subject_grade3 = $lt -> user_grade3;
								$explode_grade3 = explode("/", $subject_grade3);
								$subject3 = $explode_grade3[0];
								if (isset($explode_grade3[1])) {
									$grade3 = $explode_grade3[1];
									echo $subject3. "<br/>";
								}
							?>
							<?$subject_grade4 = $lt -> user_grade4;
								$explode_grade4 = explode("/", $subject_grade4);
								$subject4 = $explode_grade4[0];
								if (isset($explode_grade4[1])) {
									$grade4 = $explode_grade4[1];
									echo $subject4. "<br/>";
								}
							?>
							<?$subject_grade5 = $lt -> user_grade5;
								$explode_grade5 = explode("/", $subject_grade5);
								$subject5 = $explode_grade5[0];
								if (isset($explode_grade5[1])) {
									$grade5 = $explode_grade5[1];
									echo $subject5. "<br/>";
								}
							?>
					</td>
					<td class="border" style="text-align:center">
							<?$subject_grade1 = $lt -> user_grade1;
							$explode_grade1 = explode("/", $subject_grade1);
							$subject1 = $explode_grade1[0];
							if (isset($explode_grade1[1])) {
								$grade1 = $explode_grade1[1];
								echo $grade1. "<br/>";
							}
							?>
							<?$subject_grade2 = $lt -> user_grade2;
								$explode_grade2 = explode("/", $subject_grade2);
								$subject2 = $explode_grade2[0];
								if (isset($explode_grade2[1])) {
									$grade2 = $explode_grade2[1];
									echo $grade2 . "<br/>";
								}
							?>
							<?$subject_grade3 = $lt -> user_grade3;
								$explode_grade3 = explode("/", $subject_grade3);
								$subject3 = $explode_grade3[0];
								if (isset($explode_grade3[1])) {
									$grade3 = $explode_grade3[1];
									echo $grade3. "<br/>";
								}
							?>
							<?$subject_grade4 = $lt -> user_grade4;
								$explode_grade4 = explode("/", $subject_grade4);
								$subject4 = $explode_grade4[0];
								if (isset($explode_grade4[1])) {
									$grade4 = $explode_grade4[1];
									echo $grade4. "<br/>";
								}
							?>
							<?$subject_grade5 = $lt -> user_grade5;
								$explode_grade5 = explode("/", $subject_grade5);
								$subject5 = $explode_grade5[0];
								if (isset($explode_grade5[1])) {
									$grade5 = $explode_grade5[1];
									echo $grade5. "<br/>";
								}
							?>
					</td>
					<td class="border" style="text-align:center">
						<?echo $lt->user_time?>
					</td>
					<td class="border">
						<?echo $lt->user_career?>
					</td>
					<td class="border">
						<?echo $lt->user_content_application?>
					</td>
				</tr>
		<?
		$k++;
		}
		}
		}?>
		
	</table>
<!-- 출력용 Tabel 끝-->
	
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
	
</div>

<!--<div class="each_page">
	<?$i = 1; ?>
	<!-- test table create -->
<!--	<form method="post" action="/index.php/">
		<p class="excel_p">
		<a style="float:right; cursor:pointer;" onclick=tableToExcel('test1')>엑셀파일로 다운로드</a>
	</p>
	<table cellpadding="0" cellspacing="0" id="test1" class="tutor_table">
		<!-- Subject Line -->
<!--		<tr class="tutor_table_tr">
			<td class="tutor_index">
				연번
			</td>
			<td class="tutor_subjcet">
				지원과목
			</td>
			<td class="tutor_number">
				학번
			</td>
			<td class="tutor_department">
				학과
			</td>
			<td class="tutor_name">
				이름
			</td>
			<td class="tutor_grade">
				학년
			</td>
			<td class="tutor_phone">
				전화번호
			</td>
			<td class="tutor_date">
				이메일
			</td>
			<td class="tutor_score">
			 	지원분야 성적
			</td>
			<td class="tutor_date">
				튜티가능 요일
			</td>
			<td class="tutor_table">
				경력사항
			</td>
			<td class="tutor_table">
				지원동기 및 목표
			</td>
			<td class="tutor_table">
				등급올리기
			</td>
		</tr>
		<!-- 본문 내용 반복문 -->
<!--		<?
		foreach($get_tutor_list as $gt){
		foreach($get_list as $lt){
			if(($lt -> user_id == $gt -> user_id) && ($gt -> grade == "4")){?>
				<tr class="border">
					<td class="border tutor_index">
						<?echo $i?>
					</td>
					<td class="border tutor_subjcet">
						<?foreach($get_subject as $it){?>
						<?
						if (($lt -> subject_id) == ($it -> subject_id)) {echo $it -> subject;
						} else {
						}
						?>
						<?} ?>
					</td>
					<td class="border tutor_number">
						<p class="tutor_number"><?echo $lt->user_number?></p>
					</td>
					<td class="border tutor_department">
						<p class="tutor_department"><?echo $lt->user_department?></p>
					</td>
					<td class="border tutor_name">
						<p class="tutor_name"><?echo $lt->user_name?></p>
					</td>
					<td class="border tutor_year">
						<p class="tutor_year"><?echo $lt->user_year?></p>
					</td>
					<td class="border tutor_phonenumber">
						<p class="tutor_phonenumber">
							<?
							$phone = $lt -> user_phonenumber;
							$explode_phone = explode("-", $phone);
							$phone_first = $explode_phone[0];
							if (isset($explode_phone[1])) {
								$phone_second = $explode_phone[1];
								if (isset($explode_phone[2])) {
									$phone_third = $explode_phone[2];
									echo $phone_first . " -<br/>";
									echo $phone_second . " -<br/>";
									echo $phone_third . "<br/>";
								}

							}
							?>
						</p>
					</td>
					<td class="border tutor_email">
						<p class="tutor_email">
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
							</p>
					</td>
					<td class="tutor_score">
						<p class="tutor_score">
							<?$subject_grade1 = $lt -> user_grade1;
							$explode_grade1 = explode("/", $subject_grade1);
							$subject1 = $explode_grade1[0];
							if (isset($explode_grade1[1])) {
								$grade1 = $explode_grade1[1];
								echo $subject1 . "<br/>";
								echo $grade1 . "<br/>";
							}
							?>
							<?$subject_grade2 = $lt -> user_grade2;
								$explode_grade2 = explode("/", $subject_grade2);
								$subject2 = $explode_grade2[0];
								if (isset($explode_grade2[1])) {
									$grade2 = $explode_grade2[1];
									echo $subject2 . "<br/>";
									echo $grade2 . "<br/>";
								}
							?>
							<?$subject_grade3 = $lt -> user_grade3;
								$explode_grade3 = explode("/", $subject_grade3);
								$subject3 = $explode_grade3[0];
								if (isset($explode_grade3[1])) {
									$grade3 = $explode_grade3[1];
									echo $subject3 . "<br/>";
									echo $grade3 . "<br/>";
								}
							?>
							<?$subject_grade4 = $lt -> user_grade4;
								$explode_grade4 = explode("/", $subject_grade4);
								$subject4 = $explode_grade4[0];
								if (isset($explode_grade4[1])) {
									$grade4 = $explode_grade4[1];
									echo $subject4 . "<br/>";
									echo $grade4 . "<br/>";
								}
							?>
							<?$subject_grade5 = $lt -> user_grade5;
								$explode_grade5 = explode("/", $subject_grade5);
								$subject5 = $explode_grade5[0];
								if (isset($explode_grade5[1])) {
									$grade5 = $explode_grade5[1];
									echo $subject5 . "<br/>";
									echo $grade5 . "<br/>";
								}
							?>
						</p>
					</td>
					<td class="border tutor_date">
						<p class="tutor_date">
							<?
							$date = $lt -> user_time;
							$explode_date = explode("(", $date);
							$date_first = $explode_date[0];
							if (isset($explode_date[1])) {
								$date_zero = $explode_date[1];
								$explode_date_zero = explode("~", $date_zero);
								$date_second = $explode_date_zero[0];
								if (isset($explode_date_zero[1])) {
									$date_third = $explode_date_zero[1];
									echo $date_first . "<br/>";
									echo "(" . $date_second . "~<br/>";
									echo $date_third . "<br/>";
								}

							}
							?>
						</p>
					</td>
					<td class="border tutor_descript">
						<!--<p class="tutor_descript"><?echo $lt->user_career?></p>-->
<!--						<textarea class="tutor_descript"readonly="readonly" style="border:none; resize:none; height:100%;"><?echo $lt->user_career?></textarea>
					</td>
					<td class="border tutor_object">
						
					<textarea class="tutor_object"readonly="readonly" style="border:none; resize:none; height:100%;"><?echo $lt->user_content_application?></textarea>
						<!--<p class="tutor_object"><?echo $lt->user_content_application?></p>-->
<!--					</td>
					<td class="border tutor_indicate">
						<form method="post" action="/index.php/administration/tutor_grade_up">
							<select name="user_subject" id="user_subject<?echo $i?>">
							<?foreach($get_subject as $st){?>
								<option value="<?echo $st->subject_id;?>"><? echo $st->subject;?>
							<?}?>
							</select>
							<select class="tutee_subject_select" name="user_divide" id="user_divide<?echo $i?>">
							<?foreach($get_sub_list as $yt){?>
								<option class="<?echo $yt->subject_id?>" value="<?echo $yt->subject_level?>"><?echo $yt->subject_level?>
							<?} ?>
							</select>
							<input type="hidden" id="user_id" name="user_id" value="<?echo $lt -> user_id?>" />	
							<input type="hidden" id="user_application_subject" name="user_application_subject" value="check"/>
							<input class="tutor_subject_select" type="submit" value="등급올리기" />
						</form>
					</td>
				</tr>
		<?
		$i++;
		}
		}
		}
	?>
		
	</table>
	</form>
	<!--<input type='button' value="excel" id="write" onclick="tableToExcel('test1')" > <!-- Excel 파일 test 버튼-->
<!--</div>-->