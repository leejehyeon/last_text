<div class="col-xs-8">
<div>
<?$day = $this -> uri -> segment(7)?>
		<!-- Table Start -->
		<table cellpadding="0" cellspacing="0" width="100%" id="attendance_record_table">
			<!-- 출석부 제목 -->
			<tr>
				<td style="text-align: center; font-size:25px;">
					<?echo $this -> uri -> segment(5);?>년 출석부
				</td>			
			</tr>
			<!-- 과목 및 담당 튜터 -->
			<tr>
				<td>
					*수업 과목 : <?foreach($get_list as $lt){
								if($lt -> subject_id == $this -> uri ->segment(3)){
									echo $lt ->  subject?>
							<?}
							}?>
				</td>
			</tr>
			<tr>
				<td>
					*분반 : <?echo $this -> uri -> segment(4)?>분반
				</td>
			</tr>
				<td>
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
								<?for($i=$day-4;$i<=$day;$i++){?>
										<td colspan=2 >
											<? echo $i?>일				<!-- 학번 옆 숫자 -->
										</td>
								<?}?>
							</tr>
							<tr  style="background-color: #d3d3d3;">
								<!-- 날짜별 출석현황 td 반복문 -->
								<?for($i=0; $i<5; $i++){?>			<!-- 시간 출력 반복문 -->
									<td colspan=2>
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
							<?$j=1;
							$people=1;
							foreach($member_data as $lt){?>
								<tr >
									<td >
										<? echo $j?>
									</td>
									<td >
										<?echo $lt -> user_number?>
									</td>
									<td >
										<?echo $lt -> user_name?>
									</td>
									<td >
										<?echo $lt -> user_department?>
									</td>
									<td >
										<?echo $lt -> user_phonenumber?>
									</td>
									<td >
										<?echo $this -> uri -> segment(4)?>분반
									</td>
									<!-- 날짜별 출석현황 td 반복문 -->
									<?for($i=$day-4;$i<=$day;$i++){
										$i = sprintf("%02d", $i);
										foreach($get_date_list as $gt){
										if( $i == substr($gt -> date, 8,2) && $lt -> user_id == $gt -> user_id){?>
										<td>
											<?if($gt -> attendance == "출석"){
												$people++;											
												echo $gt -> attendance;
											}else{
											echo $gt -> attendance;
											}?>
										</td>
										<td>
											<?echo $gt -> reason?>
										</td>
									<?}
										
									}
									}
									$j++;
									}?>
								</tr>
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
		<table cellpadding="0" cellspacing="0" width="100%" id="attendance_record_table">
			<!-- 출석부 제목 -->
			
			<!-- 주차 표시, 표기방법 -->
			<tr>
				<td>
					<a style="float:right; cursor:pointer;" onclick="tableToExcel('attendance_record_table')">엑셀파일로 다운로드</a>			
				</td>
			</tr>
			<!--table 내부  주차 별 출석부 table의 반복문 시작 -->
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
								<?for($i=$day-4;$i<=$day;$i++){?>
								<!-- 날짜별 출석현황 td 반복문 -->						
										<td colspan=2 >
											<? echo $i?>일				<!-- 학번 옆 숫자 -->
										</td>
								</tr>
								<tr style="background-color: #d3d3d3;">
								<!-- 날짜별 출석현황 td 반복문 -->
									<td >
										출석
									</td>
									<td >
										비고
									</td>
									</tr>
								<?}?>
							
							<!-- Table subject line end-->
							<!-- Table 본문 start-->
							<!-- Table 본문  tr 반복문 -->
							<?$j=1;
							$people=1;
							foreach($member_data as $lt){?> 
								<tr >
									<td >
										<? echo $j?>
									</td>
									<td >
										<?echo $lt -> user_number?>
									</td>
									<td >
										<?echo $lt -> user_name?>
									</td>
									<td >
										<?echo $lt -> user_department?>
									</td>
									<td >
										<?echo $lt -> user_phonenumber?>
									</td>
									<td >
										<?echo $this -> uri -> segment(4)?>분반
									</td>
									<!-- 날짜별 출석현황 td 반복문 -->
									<?for($i=$day-4;$i<=$day;$i++){
										$i = sprintf("%02d", $i);
										foreach($get_date_list as $gt){
										if( $i == substr($gt -> date, 8,2) && $lt -> user_id == $gt -> user_id){?>
										<td>
											<?if($gt -> attendance == "출석"){
												$people++;											
												echo $gt -> attendance;
											}else{
											echo $gt -> attendance;
											}?>
										</td>
										<td>
											<?echo $gt -> reason?>
										</td>
									<?}
									}?>
								</tr>
								<tr >
								<td colspan=6 >
									참여인원
								</td>
								<!-- 날짜별 출석현황 td 반복문 -->
									<td colspan=2 >
										<?echo $people?>
									</td>
								</tr>
								<?$i++;
									}
							}?>
							<!-- 마지막 tr Line -->
							
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
		</table>
		<!-- Table end -->	

		
</div>