<!--<?$number = 1;
$sum = 0;
?>
<div class="col-xs-7">
<form style=" float: left; ">
<select onChange="dailygetmonth(this);">
	<?for($i=2013;$i<=2017;$i++){?>
		<?if($i == $this -> uri -> segment(3)){?>
			<option value="<?echo $i; ?>" selected><?echo $i; ?></option>
		<?}else{ ?>
			<option value="<?echo $i; ?>"><?echo $i; ?></option>
	<?
	}
	}
?>
	<input type="hidden" id="month" value="<?echo $this -> uri -> segment(4); ?>"/>
</select>
</form>
<form>
<select onChange="dailygetyear(this);">
	<?for($i=1;$i<=12;$i++){
		$k = sprintf("%02d", $i);	
	?>
		<?if($i == $this -> uri -> segment(4)){?>
			<option value="<?echo $k; ?>" selected><?echo $i; ?>월</option>
		<?}else{ ?>
			<option value="<?echo $k; ?>"><?echo $i; ?>월</option>
	<?
	}
	}
?>
	<input type="hidden" id="year" value="<?echo $this -> uri -> segment(3); ?>"/>
</select>
</form>
<div>
	<div class="row">
		<!--튜터 일지 table의 시작 -->
		<!--<table cellpadding="0" cellspacing="0" width="100%" id="Test3">
			<!-- 튜터 일지 제목 line -->
			<!--<tr>
				<td style="text-align: center; font-size:25px">
					<?echo $this -> uri -> segment(3); ?>년 <?echo $this -> uri -> segment(4); ?>월 튜터 일지
				</td>
			</tr>
			<!-- 수업과목 -->
			<!--<tr>
				<td>
					수업 과목 : 
					<?foreach($get_subject as $lt){
						if($login_data['subject_id'] == $lt -> subject_id){
							 	echo $lt -> subject;?>
					<?}else{}
					}?>
				</td>
			</tr>
			<!-- 튜터 성명 -->
			<!--<tr>
				<td>
					튜터 성명 : <?echo $login_data['user_name']; ?>
				</td>
			</tr>
			<!-- 튜터 학번-->
			<!--<tr>
				<td>
					튜터 학번 : <?echo $login_data['user_number']; ?>
				</td>
			</tr>
			<!-- 내부 Table Line-->
			<!--<tr>
				<td>
					<!-- 내부 Table의 시작 -->
					<!--<table cellpadding="0" cellspacing="0" width="100%" style="text-align:center">
						<!-- 제목  Line -->
						<!--<tr class="border">
							<td class="border" style="text-align:center; background-color:#d3d3d3;">
								번호
							</td>
							<td class="border" style="text-align:center; background-color:#d3d3d3;">
								날짜
							</td>
							<td colspan=2 class="border" style="text-align:center; background-color:#d3d3d3;">
								튜터링 시간
							</td>
							<td class="border" style="text-align:center; background-color:#d3d3d3;">
								참여 인원
							</td>
							<td class="border" style="text-align:center; background-color:#d3d3d3;">
								활동 내용
							</td>
							<td class="border" style="text-align:center; background-color:#d3d3d3;">
								튜터 장소
							</td>
							<td class="border" style="text-align:center; background-color:#d3d3d3;">
								비고
							</td>						
						</tr>
						<!-- 본문 내용 반복문 -->
						<!--<?foreach($get_list as $lt){?>
							<tr class="border">
								<td class="border">
									<?echo $number; ?>
								</td>
								<td class="border">
									<?echo substr($lt -> date, 5, 2);
									echo "월 ";
									echo substr($lt -> date, 8, 2);
									echo "일";
								?>
								</td>
								<td class="border">
									<?echo $lt -> tutor_time?>
								</td>
								<td class="border">
									<?$math = (substr($lt -> tutor_time, 6, 2) * 60 + substr($lt -> tutor_time, 9, 2)) - (substr($lt -> tutor_time, 0, 2) * 60 + substr($lt -> tutor_time, 3, 2));
									$sum += $math;
									$time = floor((int)$math / (int)60);
									$minutes = $math % 60;
									?>
									<?echo $time?>시간 <?echo sprintf("%02d", $minutes); ?>분
								</td>
								<td class="border">
									<?echo $lt -> member_number?>
								</td>
								<td class="border">
									<?echo $lt -> activity?>
								</td>
								<td class="border">
									<?echo $lt -> classroom?>
								</td>
								<td class="border">
									<?echo $lt -> note?>
								</td>
							</tr>
						<?
						$number++;
						}
					?>
						<tr class="border">
							<td colspan=3 class="border">
								총 업무시간
							</td>
							<td class="border">
								<?
								$time = floor((int)$sum / (int)60);
								$minutes = $sum % 60;
								?>
								<?echo $time?>시간 <?echo sprintf("%02d", $minutes); ?>분
							</td>
							<td class="border">
							</td>
							<td class="border">
							</td>
							<td class="border">
							</td>
							<td class="border">
							</td>
						</tr>
			</div>
			<!-- 내부 Table Line 종료 -->
			<!-- Table 아래쪽 Line-->
				<!--<div class="row" style="float: right;">
					<a href="/index.php/lesson/daily_journal_write">글쓰기</a>
				</div>
		</div>-->
		<!--여기까지 진우님-->
	
<!--<div class="col-xs-7">-->

	<div class="each_page each_page_padding daily_journal_page">
		<p class="daily_journal_admin_infoText">* 다음 설정을 해주세요.</p>
			<?$number = 1;
		$sum = 0;
		?>
<form class="float_left">
	<label class="styled_select9">
<select class="custom_select daily_journal_write_year_time padding_left_7" onChange="dailygetmonth(this);">
	<?for($i=2013;$i<=2017;$i++){?>
		<?if($i == $this -> uri -> segment(3)){?>
			<option value="<?echo $i; ?>" selected><?echo $i; ?></option>
		<?}else{ ?>
			<option value="<?echo $i; ?>"><?echo $i; ?></option>
	<?
	}
	}
?>
	<input type="hidden" id="month" value="<?echo $this -> uri -> segment(4); ?>"/>
</select>
</label>
</form>
<span class="daily_journal_write_middle_text padding_top_3 float_left">년</span>
<form class="float_left">
	<label class="styled_select9">
<select class="custom_select daily_journal_write_month_day" onChange="dailygetyear(this);">
	<?for($i=1;$i<=12;$i++){
		$k = sprintf("%02d", $i);	
	?>
		<?if($i == $this -> uri -> segment(4)){?>
			<option value="<?echo $k; ?>" selected><?echo $i; ?></option>
		<?}else{ ?>
			<option value="<?echo $k; ?>"><?echo $i; ?></option>
	<?
	}
	}
?>
	<input type="hidden" id="year" value="<?echo $this -> uri -> segment(3); ?>"/>
</select>
</label>
</form>
<span class="daily_journal_write_middle_text padding_top_3 float_left">월</span>
<!--<select onChange="dailygetmonth(this);">
	<?for($i=2013;$i<=2017;$i++){?>
		<?if($i == $this -> uri -> segment(3)){?>
			<option value="<?echo $i; ?>" selected><?echo $i; ?></option>
		<?}else{ ?>
			<option value="<?echo $i; ?>"><?echo $i; ?></option>
	<?
	}
	}
?>
	<input type="hidden" id="month" value="<?echo $this -> uri -> segment(4); ?>"/>
</select>
</form>
<form>
<select onChange="dailygetyear(this);">
	<?for($i=1;$i<=12;$i++){
		$k = sprintf("%02d", $i);	
	?>
		<?if($i == $this -> uri -> segment(4)){?>
			<option value="<?echo $k; ?>" selected><?echo $i; ?>월</option>
		<?}else{ ?>
			<option value="<?echo $k; ?>"><?echo $i; ?>월</option>
	<?
	}
	}
?>
	<input type="hidden" id="year" value="<?echo $this -> uri -> segment(3); ?>"/>
</select>
</form>-->
<!--<div>
	<div class="row">-->
		<!--튜터 일지 table의 시작 -->
		<table cellpadding="0" cellspacing="0" id="Test3" style="clear:both">
			<!-- 튜터 일지 제목 line -->
			<tr>
				<td style="text-align: center; font-size:25px">
					<p class="daily_journal_title"><?echo $this -> uri -> segment(3); ?>년 <?echo $this -> uri -> segment(4); ?>월 튜터 일지</p>
				</td>
			</tr>
			<!-- 수업과목 -->
			<tr>
				<td>
					<p class="daily_journal_infoText">* 수업 과목 : <?foreach($get_subject as $lt){
						if($login_data['subject_id'] == $lt -> subject_id){
							 	echo $lt -> subject;?>
					<?}else{}
					}?></p>
				</td>
			</tr>
			<!-- 튜터 성명 -->
			<tr>
				<td>
					<p class="daily_journal_infoText">* 튜터 성명 : <?echo $login_data['user_name']; ?></p>
				</td>
			</tr>
			<!-- 튜터 학번-->
			<tr>
				<td>
					<p class="daily_journal_infoText float_left">* 튜터 학번 : <?echo $login_data['user_number']; ?></p><p class="excel_p">
		<a style="float:right; cursor:pointer;" onclick="tableToExcel('Test3')">엑셀파일로 다운로드</a>
	</p></td>
			</tr>
			<!-- 내부 Table Line-->
			<tr>
				<td>
					<!-- 내부 Table의 시작 -->
					<table class="daily_journal_table"cellpadding="0" cellspacing="0" style="text-align:center">
						<!-- 제목  Line -->
						<tr class="border">
							<td class="daily_journal_tableTitle" style="text-align:center; background-color:#d3d3d3;">
								번호
							</td>
							<td class="daily_journal_tableTitle tableTitle_date" style="text-align:center; background-color:#d3d3d3;">
								날짜
							</td>
							<td colspan=2 class="daily_journal_tableTitle tableTitle_time" style="text-align:center; background-color:#d3d3d3;">
								튜터링 시간
							</td>
							<td class="daily_journal_tableTitle tableTitle_member" style="text-align:center; background-color:#d3d3d3;">
								참여 인원
							</td>
							<td class="daily_journal_tableTitle tableTitle_place" style="text-align:center; background-color:#d3d3d3;">
								튜터 장소
							</td>
							<td class="daily_journal_tableTitle tableTitle_activity" style="text-align:center; background-color:#d3d3d3;">
								활동 내용
							</td>
							<td class="daily_journal_tableTitle tableTitle_etc" style="text-align:center; background-color:#d3d3d3;">
								비고
							</td>						
						</tr>
						<!-- 본문 내용 반복문 -->
						<?foreach($get_list as $lt){?>
							<tr class="border">
								<td class="daily_journal_tableDescript">
									<?echo $number; ?>
								</td>
								<td class="daily_journal_tableDescript">
									<?echo substr($lt -> date, 5, 2);
										echo "월 ";
										echo substr($lt -> date, 8, 2);
										echo "일";
								?>
									<!--<p class="daily_journal_dateButton"><a href="/index.php/lesson/daily_journal/<?echo substr($lt -> date,0,4); echo"/"; echo substr($lt -> date,5,2); echo"/"; echo substr($lt -> date,8,2);?>"><?echo substr($lt -> date,5,2); echo"월 "; echo substr($lt -> date,8,2); echo"일";?></a></p>
								--></td>
								<td class="daily_journal_tableDescript">
									<?echo $lt -> tutor_time?>
								</td>
								<td class="daily_journal_tableDescript">
									<?$math = (substr($lt -> tutor_time, 6, 2) * 60 + substr($lt -> tutor_time, 9, 2)) - (substr($lt -> tutor_time, 0, 2) * 60 + substr($lt -> tutor_time, 3, 2));
									$sum += $math;
									$time = floor((int)$math / (int)60);
									$minutes = $math % 60;
									?>
									<?echo $time?>시간 <?echo sprintf("%02d", $minutes); ?>분
								</td>
								<td class="daily_journal_tableDescript">
									<?echo $lt -> member_number?>
								</td>
								<td class="daily_journal_tableDescript">
									<?echo $lt -> classroom?>
								</td>
								<td class="daily_journal_tableDescript">
									<?echo $lt -> activity?>
								</td>
								<td class="daily_journal_tableDescript">
									<?echo $lt -> note?>
								</td>
							</tr>
						<?
						$number++;
						}
					?>
						<tr class="border">
							<td colspan=3 class="daily_journal_tableDescript">
								총 업무시간
							</td>
							<td class="daily_journal_tableDescript">
								<?
								$time = floor((int)$sum / (int)60);
								$minutes = $sum % 60;
								?>
								<?echo $time?>시간 <?echo sprintf("%02d", $minutes); ?>분
							</td>
							<td class="border">
							</td>
							<td class="border">
							</td>
							<td class="border">
							</td>
							<td class="border">
							</td>
						</tr>
						
					</table>
					<!-- 내부 Table 종료 -->
				</td>
			</tr>
			
			</table>
				<div class="">
					<p class="daily_journal_infoText daily_journal_submitText">위와 같이 <?echo $this -> uri -> segment(3); ?>년 <?echo $this -> uri -> segment(4); ?>월 MSC교육센터 튜터일지를 제출합니다.</p>
					<p class="daily_journal_infoText daily_journal_submitText"><?echo date('Y')?>년 <?echo date('m')?>월 <?echo date('d')?>일</p>
					<p class="daily_journal_infoText daily_journal_submitText">제출자 : <?echo $login_data['user_name']; ?>(인)</p>				
				</div>
			
				<div class="daily_journal_button_area">
					<input type="button" class="daily_journal_writeButton" onclick=window.open("/index.php/lesson/daily_journal/daily_journal_write","_self") value="글쓰기">
				</div>
			</div>
		</div>
			<!-- 내부 Table Line 종료 -->
			<!-- Table 아래쪽 Line-->
			