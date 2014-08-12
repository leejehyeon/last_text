
	<?$i=1;?>
<div class="each_page">
	<!-- test table create -->
	<p class="excel_p">
		<a style="float:right; cursor:pointer;" onclick="tableToExcel('admin_tutee_table')">엑셀파일로 다운로드</a>
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
						<?echo $lt -> user_name?>
					</td>
					<td class="border">
						<?echo $lt -> user_year?>
					</td>
					<td class="border">
						<?echo $lt -> user_phonenumber?>
					</td>
					<td class="border">
						<?echo $lt -> user_email?>
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
</select>
	<div style="float: left;margin-top: 30px;">
	<form method="post" action="/index.php/tutor_tuti_application/change_application_on">
	<input class="gray_button margin_0" type="submit" value="지원기간 O" />
	</form>
	</div>
	<div style="margin-top: 30px;margin-left: 90px;">
	<form method="post" action="/index.php/tutor_tuti_application/change_application_off">
	<input class="gray_button margin_0" type="submit" value="지원기간 X" />
	</form>
	</div>
</div>