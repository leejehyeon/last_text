<div class="col-xs-8">
<div>
	
		<!-- Table Start -->
		<table cellpadding="0" cellspacing="0" width="100%" id="attendance_record_table">
			<!-- 출석부 제목 -->
			<tr>
				<td style="text-align: center; font-size:25px;">
					2014년 출석부
				</td>			
			</tr>
			<!-- 과목 및 담당 튜터 -->
			<tr>
				<td>
					*수업 과목 : 기초수학 
				</td>
			</tr>
			<tr>
				<td>
					*담당 튜터 : 박경림			
				</td>
			</tr>
			<!-- 주차 표시, 표기방법 -->
			<tr>
				<td>
					3월 1주차 
					<a style="float:right; cursor:pointer;" onclick="tableToExcel('attendance_record_table')">엑셀파일로 다운로드</a>			
				</td>
			</tr>
			<!--table 내부  주차 별 출석부 table의 반복문 시작 -->
			<?for($k=0; $k<1; $k++){?>
				<tr>
					<td>
						<table cellpadding="0" cellspacing="0" width="100%" style="font-size:11px;" class="attendance_record_inner_table">
							<!-- Table subject line -->
							<tr  style="background-color: #d3d3d3;">
								<td rowspan=3>
									번호
								</td>
								<td rowspan=3>
									학번
								</td>
								<td rowspan=3>
									이름
								</td>
								<td rowspan=3>
									학과
								</td>
								<td rowspan=3 >
									연락처
								</td>
								<td rowspan=3 >
									분반
								</td>
								<!-- 날짜별 출석현황 td 반복문 -->						
								<?for($i=0; $i<5; $i++){?>
										<td colspan=2 >
											<? echo $i+1?>일				<!-- 학번 옆 숫자 -->
										</td>
								<?}?>
							</tr>
							<tr  style="background-color: #d3d3d3;">
								<!-- 날짜별 출석현황 td 반복문 -->
								<?for($i=0; $i<5; $i++){?>			<!-- 시간 출력 반복문 -->
									<td colspan=2>
										18:00~21:30
									</td>
								<?}?>
							</tr>
							<tr  style="background-color: #d3d3d3;">
								<!-- 날짜별 출석현황 td 반복문 -->
								<?for($i=0; $i<5; $i++){?>
									<td >
										출석
									</td>
									<td >
										비고
									</td>
								<?}?>
							</tr>
							<!-- Table subject line end-->
							<!-- Table 본문 start-->
							<!-- Table 본문  tr 반복문 -->
							<?for($j=0; $j<10; $j++){?> 
								<tr >
									<td >
										<? echo $j+1?>
									</td>
									<td >
										2010136100
									</td>
									<td >
										이재호
									</td>
									<td >
										컴공
									</td>
									<td >
										010 7708 6449
									</td>
									<td >
										A분반
									</td>
									<!-- 날짜별 출석현황 td 반복문 -->
									<?for($i=0; $i<5; $i++){?>
										<td >
											O
										</td>
										<td >
	
										</td>
									<?}?>
								</tr>
							<?}?>
							<!-- 마지막 tr Line -->
							<tr >
								<td colspan=6 >
									참여인원
								</td>
								<!-- 날짜별 출석현황 td 반복문 -->
								<?for($i=0; $i<5; $i++){?>
									<td colspan=2 >
										10
									</td>
								<?}?>
							</tr>
						</table>
					</td>				
				</tr>
				<!-- 내부 테이블 포함한 <tr>태그 종료 -->
				<!-- 테이블간 간격 유지용 tr -->
				<tr>
					<td>
						(표기방법:출석/결석/지각)
					</td>
				</tr>
			<?}?>		
		</table>
		<!-- Table end -->	

		
</div>