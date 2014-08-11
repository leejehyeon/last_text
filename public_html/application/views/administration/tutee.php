<div class="col-xs-7">
	<?$i=1;?>
<div>
	<!-- test table create -->
	<table cellpadding="0" cellspacing="0" id="test1" class="border" width="100%" style="font-size:12px">
		<!-- Subject Line -->
		<tr>
			<td class="tutee_table">
				연번
			</td>
			<td class="tutee_table">
				지원과목
			</td>
			<td class="tutee_table">
				학번
			</td>
			<td class="tutee_table">
				학과
			</td>
			<td class="tutee_table">
				이름
			</td>
			<td class="tutee_table">
				학년
			</td>
			<td class="tutee_table">
				전화
			</td>
			<td class="tutee_table">
				이메일
			</td>
			<td class="tutee_table">
				고등학교 구분
			</td>
			<td class="tutee_table">
				고등학교 계열
			</td>
			<td class="tutee_table">
				난이도
			</td>
			<td class="tutee_table">
				튜티가능 요일
			</td>
			<td class="tutee_table">
				지원동기 및 목표
			</td>
			<td class="tutee_table">
				등급올리기
			</td>
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
						<?echo $lt -> user_content_application?>
					</td>
					<td class="border">
						<form method="post" action="/index.php/administration/tutee_grade_up">
							<select name="user_subject" id="user_subject">
							<?foreach($get_subject as $st){?>
								<option value="<?echo $st->subject_id;?>"><? echo $st->subject;?>
							<?}?>
							</select>
							<select name="user_divide" id="user_divide">
							<?foreach($get_sub_list as $yt){?>
								<option class="<?echo $yt->subject_id?>" value="<?echo $yt->subject_level?>"><?echo $yt->subject_level?>
							<?}?>					
							</select> 
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
	<input type="button" value="excel로 변환하기" id="write" onclick="tableToExcel('test1')" > <!-- Excel 파일 test 버튼-->
	<div style="display: none">
	<form method="post" action="/index.php/tutor_tuti_application/change_application_on">
	<input type="submit" value="지원기간 O" />
	</form>
	<form method="post" action="/index.php/tutor_tuti_application/change_application_off">
	<input type="submit" value="지원기간 X" />
	</form>
	</div>
</div>