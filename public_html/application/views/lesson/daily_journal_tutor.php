<?$number = 1;
$sum = 0;
?>
<div class="col-xs-7">
	<div class="row">
		<!--튜터 일지 table의 시작 -->
		<table cellpadding="0" cellspacing="0" width="100%" id="Test3">
			<!-- 튜터 일지 제목 line -->
			<tr>
				<td style="text-align: center; font-size:25px"> <?echo $this -> uri -> segment(3); ?>년 <?echo $this -> uri -> segment(4); ?>월 튜터 일지 </td>
			</tr>
			<!-- 수업과목 -->
			<tr>
				<td> 수업 과목 : <?echo $get_subject['subject']; ?> </td>
			</tr>
			<!-- 튜터 성명 -->
			<tr>
				<td> 튜터 성명 : <?echo $user_data_by_id['user_name']; ?> </td>
			</tr>
			<!-- 튜터 학번-->
			<tr>
				<td> 튜터 학번 : <?echo $user_data_by_id['user_number']; ?> </td>
			</tr>
			<!-- 내부 Table Line-->
			<tr>
				<td><!-- 내부 Table의 시작 -->
				<table cellpadding="0" cellspacing="0" width="100%" style="text-align:center">
					<!-- 제목  Line -->
					<tr class="border">
						<td class="border" style="text-align:center; background-color:#d3d3d3;"> 번호 </td>
						<td class="border" style="text-align:center; background-color:#d3d3d3;"> 날짜 </td>
						<td colspan=2 class="border" style="text-align:center; background-color:#d3d3d3;"> 튜터링 시간 </td>
						<td class="border" style="text-align:center; background-color:#d3d3d3;"> 참여 인원 </td>
						<td class="border" style="text-align:center; background-color:#d3d3d3;"> 활동 내용 </td>
						<td class="border" style="text-align:center; background-color:#d3d3d3;"> 튜터 장소 </td>
						<td class="border" style="text-align:center; background-color:#d3d3d3;"> 비고 </td>
					</tr>
					<!-- 본문 내용 반복문 -->
					<?foreach($get_list as $lt){
					?>
					<tr class="border">
						<td class="border"> <?echo $number; ?> </td>
						<td class="border">
							<form method="post" action="/index.php/lesson/daily_journal_update/">
							<input type="submit" class="none_style_input" value="<?echo substr($lt -> date, 5, 2);
								echo "월 ";
								echo substr($lt -> date, 8, 2);
								echo "일";
								?>"/>
							<input type="hidden" name="user_id" value="<?echo $user_data_by_id['user_id'];?>" />
							<input type="hidden" name="date" value="<?echo $lt -> date;?>" />
							</form>
						</td>
						<td class="border"> <?echo $lt -> tutor_time?> </td>
						<td class="border"> <?$math = (substr($lt -> tutor_time, 6, 2) * 60 + substr($lt -> tutor_time, 9, 2)) - (substr($lt -> tutor_time, 0, 2) * 60 + substr($lt -> tutor_time, 3, 2));
							$sum += $math;
							$time = floor((int)$math / (int)60);
							$minutes = $math % 60;
						?> 
						<?echo $time?>시간 <?echo sprintf("%02d", $minutes); ?>분 </td>
						<td class="border"> <?echo $lt -> member_number?> </td>
						<td class="border"> <?echo $lt -> activity?> </td>
						<td class="border"> <?echo $lt -> classroom?> </td>
						<td class="border"> <?echo $lt -> note?> </td>
					</tr>
					<?
					$number++;
					}
					?>
					<tr class="border">
						<td colspan=3 class="border"> 총 업무시간 </td>
						<td class="border"> <?
						$time = floor((int)$sum / (int)60);
						$minutes = $sum % 60;
						?>
						<?echo $time?>시간 <?echo sprintf("%02d", $minutes); ?>분 </td>
						<td class="border"></td>
						<td class="border"></td>
						<td class="border"></td>
						<td class="border"></td>
					</tr>
				</table><!-- 내부 Table 종료 --></td>
			</tr>
			<!-- Table 아래쪽 Line-->
			<tr>
				<td style="text-align: center"> 위와 같이 <?echo $this -> uri -> segment(3); ?>년 <?echo $this -> uri -> segment(4); ?>월 MSC교육센터 튜터일지를 제출합니다. </td>
			</tr>
			<tr>
				<td style="text-align: center"> <?echo date('Y')?>년 <?echo date('m')?>월 <?echo date('d')?>일 </td>
			</tr>
			<tr>
				<td style="text-align: center"> 제출자 : <?echo $user_data_by_id['user_name']; ?>(인) </td>
	</div>
	
	<!-- 내부 Table Line 종료 -->
	<!-- Table 아래쪽 Line-->
	</div>
	<div class="col-xs-5"></div>
	<div class="row">
		<div>
			엑셀 파일로 다운로드
			<input type='button' value="excel" id="write" onclick="tableToExcel('Test3')" />
			<!-- Excel 파일 test 버튼-->
		</div>
	

