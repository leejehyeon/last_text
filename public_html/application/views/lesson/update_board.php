<div class="each_page each_page_padding">
	<?if($login_data['grade'] == 1){?>
		<form action="/index.php/lesson/enrichment_study_admin/update_admin_ok?req_id=<?echo $list['board_id']?>" method="post" name="day_form">
	<?}else{?>
		<form action="/index.php/lesson/enrichment_study/update_ok?req_id=<?echo $list['board_id']?>" method="post" name="day_form">
	<?}?>	
		<fieldset>
				<p class="write_board_title">
					보 강 계 획 서
				</p>
				<p><span>제목</span>
	    	        <input type="text" class="" id="text_title" name="subject_title" value="<?=$list['subject_title'] ?>">
				</p>
	        <!--<div class="col-xs-7">-->
	        <!--</div>-->
	 	     	<p><span>이름</span>
	 	            <?echo $login_data['user_name'];?>
				</p>
	        <!--<div class="col-xs-7">-->
	        <!--</div>-->
				<table class="write_board_table">
					<tr>
						<td rowspan="2" class="view_board_tableLow">
						<p class="none_style">
							교 과 목 명
						</p></td>
						<td rowspan="2" class="view_board_tableLow2">
						<p class="none_style">
							보 강 사 유
						</p></td>
						<td colspan="3" class="view_board_tableLong">
						<p class="none_style">
							보 강 계 획
						</p></td>
					</tr>
					<tr>

						<td class="write_board_tableDate height_24">
						<p class="none_style">
							날짜
						</p></td>
						<td class="write_board_tableTime ">
						<p class="none_style">
							시간
						</p></td>
						<td class="view_board_tableLow border_right height_24">
						<p class="none_style">
							강의실
						</p></td>

					</tr>
					<tr>
						<td class="border_right">
							<label class="styled_select5">
							<select class="write_board_subject" name="subject" id="subject">
								<?foreach($get_list as $it){?>
								<?
								if (($list['subject']) == ($it -> subject_id)) {echo $it -> subject;
								} else {
								}
							?>
							<?} ?>
								<?foreach($get_list as $lt){?>
									<option value="<?echo $lt->subject_id;?>"><? echo $lt->subject;?>
										if(<?echo $lt->subject_id;?>){
											value.
										}
								<?}?>
							</select>
							</label> 
							<!--
								<input type='edit' name='subject' id="subject" style="border:0px; height:62px; margin:0px; padding:0px"/>
							-->						
						</td>
						<td class="border_right">						
							<input class="write_board_reason"type="text" id="reason" name="reason" value="<?echo $list['reason']; ?>"/></td>
						<td class="height_49 border_right enrichment_write_selectd">
							<!--<input type='text' name='year' id='year' style="width:60px;">-->
							<!--수정시작
							<select name="p_sYear" onchange=chk()>
								수정끝-->
							<label class="styled_select5">
							<select class="write_board_year" name="year" id="year" onchange="month_day_set()">
									<?for($i = 2014; $i <= 2024; $i++){?>
									<?if($i == substr($list['date'], 0, 4)){?>
										<option id="<?echo $i;?>" value="<?echo $i;?>" selected><?echo $i;?></option>
									<?}else{?>
										<option id="<?echo $i;?>" value="<?echo $i;?>"><?echo $i;?></option>
									<?
									}	
								}?>
							</select>
							</label><span class="write_board_dateMiddle">년</span>
      						<!--제현 8.1지움<select name="month" id="month" onchange=day_set()><option>년을 선택해주세요</option></select> 월
        						<select name="day" id="day"><option>월을 선택해주세요</option></select> 일-->
        						<label class="styled_select5">
        						<select class="write_board_month" name="month" id="month" onchange="day_set()">
        							<?for($i = 1; $i <= 12; $i++){
									$k = sprintf("%02d", $i);
								?>
									<?if($i == substr($list['date'], 5, 2)){?>
										<option id="<?echo $k;?>" value="<?echo $k;?>" selected><?if($i < 10){echo "0".$i;}else{echo $i;}?></option>
									<?}else{?>
										<option id="<?echo $k;?>" value="<?echo $k;?>"><?if($i < 10){echo "0".$i;}else{echo $i;}?></option>
								<?
									}	
								}?>
        						</select>
        						</label><span class="write_board_dateMiddle">월</span>
        						<label class="styled_select5">
        						<select class="write_board_day" name="day" id="day">
        					        <?for($i = 1; $i <= 31; $i++){
									$k = sprintf("%02d", $i);
								?>
									<?if($i == substr($list['date'], 8, 2)){?>
										<option id="<?echo $k;?>" value="<?echo $k;?>" selected><?if($i < 10){echo "0".$i;}else{echo $i;}?></option>
									<?}else{?>
										<option id="<?echo $k;?>" value="<?echo $k;?>"><?if($i < 10){echo "0".$i;}else{echo $i;}?></option>
								<?
									}	
								}?>
							</select></label><span class="write_board_dateMiddle">일</span>
						</td>
						<td class="border_right">
							<label class="styled_select5">
            <select class="write_board_year" id="time1">
            	<!--<option>시간
            	<?for($i=0;$i<=23;$i++){
            		$k = sprintf("%02d", $i);
						if($i<=11){
							if($i==0){?>
								<option value="<?echo $k;?>">오전 12시
							<?}else{
            			?>
            			<option value="<?echo $k;?>">오전 <?echo $k?>시
            	<?
							}
						}else{ 
							if($i==12){?>
								<option value="<?echo $i;?>">오후 12시
						<?
							}else{
								$k = sprintf("%02d",$i-12);
							?>
							<option value="<?echo $i;?>">오후 <?echo $k?>시</option>	
						<?  
							}
						}
					}
            	?>-->
            	<option>시간
            	<?for($i=0;$i<=23;$i++){
            		$k = sprintf("%02d", $i);
					if($i == substr($list['time'], 0, 3)){
						if($i<=11){
							if($i==0){?>
								<option value="<?echo $k;?>" selected>00
							<?}else{
            			?>
            			<option value="<?echo $k;?>" selected><?echo $k?>
            	<?
							}
						}else{
							if($i==12){?>
								<option value="<?echo $i;?>" selected>12
						<?
							}else{
								$k = sprintf("%02d",$i);
							?>
							<option value="<?echo $i;?>" selected><?echo $k?></option>	
						<?  
							}
						}
					}else{
						if($i<=11){
							if($i==0){?>
								<option value="<?echo $k;?>">00
							<?}else{
            			?>
            			<option value="<?echo $k;?>"><?echo $k?>
            	<?
							}
						}else{
							if($i==12){?>
								<option value="<?echo $i;?>">12
						<?
							}else{
								$k = sprintf("%02d",$i);
							?>
							<option value="<?echo $i;?>"><?echo $k?></option>	
						<?  
							}
						}
					}
			}
            	?>
            </select>
           </label>
            :
            <label class="styled_select5">
           <select class="write_board_year" id="time2">
            	<option>분
            	<?for($i=0;$i<=5;$i++){
            		if($i == substr($list['time'], 3, 2)){
					if($i == 0){
						$k = sprintf("%02d", $i);
				?>
						<option value="<?echo $k;?>" selected><?echo $k?>
					<?}else{?>
            			<option value="<?echo $i*10;?>" selected><?echo $i*10?>
            	<?
					}
				}else{
					if($i == 0){
						$k = sprintf("%02d", $i);
				?>
						<option value="<?echo $k;?>"><?echo $k?>
					<?}else{?>
            			<option value="<?echo $i*10;?>"><?echo $i*10?>
            	<?
					}
				}
			}
            	?>
            </select>
           </label>
            ~
            <label class="styled_select5">
        	<select class="write_board_year" id="time3">    
            	<!--<option>시간
            	<?for($i=0;$i<=23;$i++){
            		$k = sprintf("%02d", $i);
						if($i<=11){
							if($i==0){?>
								<option value="<?echo $k;?>">오전 12시
							<?}else{
            			?>
            			<option value="<?echo $k;?>">오전 <?echo $k?>시
            	<?
							}
						}else{
							if($i==12){?>
								<option value="<?echo $i;?>">오후 12시
						<?
							}else{
								$k = sprintf("%02d",$i-12);
							?>
							<option value="<?echo $i;?>">오후 <?echo $k?>시</option>	
						<?  
							}
						}
					}
            	?>--><option>시간
            	<?for($i=0;$i<=23;$i++){
            		$k = sprintf("%02d", $i);
					if($i == substr($list['time'], 6, 3)){
						if($i<=11){
							if($i==0){?>
								<option value="<?echo $k;?>" selected>00
							<?}else{
            			?>
            			<option value="<?echo $k;?>" selected><?echo $k?>
            	<?
							}
						}else{
							if($i==12){?>
								<option value="<?echo $i;?>" selected>12
						<?
							}else{
								$k = sprintf("%02d",$i);
							?>
							<option value="<?echo $i;?>" selected><?echo $k?></option>	
						<?  
							}
						}
					}else{
						if($i<=11){
							if($i==0){?>
								<option value="<?echo $k;?>">00
							<?}else{
            			?>
            			<option value="<?echo $k;?>"><?echo $k?>
            	<?
							}
						}else{
							if($i==12){?>
								<option value="<?echo $i;?>">12
						<?
							}else{
								$k = sprintf("%02d",$i);
							?>
							<option value="<?echo $i;?>"><?echo $k?></option>	
						<?  
							}
						}
					}
			}
            	?>
            </select>
           </label>
            :
            <label class="styled_select5">
            <select class="write_board_year" id="time4">
            	<option>분
            	<?for($i=0;$i<=5;$i++){
					if($i == 0){
						$k = sprintf("%02d", $i);
            					if($k == substr($list['time'], 9, 2)){
				?>
						<option value="<?echo $k;?>" selected><?echo $k?>
					<?}else{?>
            			<option value="<?echo $k;?>"><?echo $k?>
            	<?
					}
				}
            	?>
            </select>
           </label><!--<option value="<?echo $i*10;?>" selected><?echo $i*10?>-->
						<td class="write_board_warn border_right">
							<p class="none_style">관리자 입력<br/>튜터 입력 불가</p>
						</td>
					</tr>
				</table>
			<div>
				<p class="write_board_submit">
					위와 같이 보강계획을 제출합니다.
				</p>
			</div>
			<div class="write_board_button_area">
				<input type="button" value="취소" onclick="javascript:window.location.href = 'http://<?echo base_url();?>index.php<?echo $view_name?>'"/>
				<input type="button" value="등록" onclick="en_daily_form()"/>
			</div>
		</fieldset>
		<input type="hidden" id="user_id" name="user_id" value="<?echo $login_data['user_id'];?>" />
		<input type="hidden" id="user_name" name="user_name" value="<?echo $login_data['user_name'];?>" />
		<input type="hidden" id="date" name="date" value="" />
		<input type="hidden" id="time" name="time" value="" />
		<input type="hidden" id="classroom" name="classroom" value="none"/>
	</form>
</div>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
			<!--<div style="text-align:center">
				<table style="margin:0px 0px 20px 0px">
					<tr>
						<td rowspan="2" style="background-color:RGB(127,127,127); border:1px solid #000000">
						<p>
							<strong>교 과 목 명</strong>
						</p></td>
						<td rowspan="2" style="background-color:RGB(127,127,127);border:1px solid #000000">
						<p>
							<strong>보 강 사 유</strong>
						</p></td>
						<td colspan="3" style="background-color:RGB(127,127,127); border:1px solid #000000">
						<p style="margin:5px;">
							<strong>보 강 계 획</strong>
						</p></td>
					</tr>
					<tr>

						<td style="background-color:RGB(127,127,127);border:1px solid #000000;">
						<p style="margin:5px; width:150px;">
							<strong>날짜</strong>
						</p></td>
						<td style="background-color:RGB(127,127,127);border:1px solid #000000;">
						<p style="margin:5px; width:220px;">
							<strong>시간</strong>
						</p></td>
						<td style="background-color:RGB(127,127,127);border:1px solid #000000; width:100px;">
						<p style="margin:5px; width:100px">
							<strong>강의실</strong>
						</p></td>

					</tr>
					<tr>
						<td style="border:1px solid #000000">
							<select name="subject" id="subject">
								<?foreach($get_list as $lt){
									if($lt -> subject_id == $list['subject']){?>
										<option value="<?echo $lt->subject_id;?>" selected><? echo $lt->subject;?>
								  <?}?>
									<option value="<?echo $lt->subject_id;?>"><? echo $lt->subject;?>
								<?}?>
							</select> 
							<!--
								<input type='edit' name='subject' id="subject" style="border:0px; height:62px; margin:0px; padding:0px"/>
							-->						
						<!--</td>
						<td style="border:1px solid #000000">						
							<input type="text" id="reason" name="reason" value="<?echo $list['reason'];?>" style="border:0px; height:62px; margin:0px; padding:0px"/></td>
						<td style="border:1px solid #000000;">
							<!--<input type='text' name='year' id='year' style="width:60px;">-->
							<!--수정시작
							<select name="p_sYear" onchange=chk()>
								수정끝-->
							<!--<select name="year" id="year" onchange="month_day_set()">
									<?for($i = 2014; $i <= 2024; $i++){?>
									<?if($i == substr($list['date'], 0, 4)){?>
										<option id="<?echo $i;?>" value="<?echo $i;?>" selected><?echo $i;?></option>
									<?}else{?>
										<option id="<?echo $i;?>" value="<?echo $i;?>"><?echo $i;?></option>
									<?
									}	
								}?>
							</select>년
      						<!--제현 8.1지움<select name="month" id="month" onchange=day_set()><option>년을 선택해주세요</option></select> 월
        						<select name="day" id="day"><option>월을 선택해주세요</option></select> 일-->
        						<!--<select name="month" id="month" onchange="day_set()">
        							<?for($i = 1; $i <= 12; $i++){
									$k = sprintf("%02d", $i);
								?>
									<?if($i == substr($list['date'], 5, 2)){?>
										<option id="<?echo $k;?>" value="<?echo $k;?>" selected><?if($i < 10){echo "0".$i;}else{echo $i;}?></option>
									<?}else{?>
										<option id="<?echo $k;?>" value="<?echo $k;?>"><?if($i < 10){echo "0".$i;}else{echo $i;}?></option>
								<?
									}	
								}?>
        						</select>월
        						<select name="day" id="day">
        					        <?for($i = 1; $i <= 31; $i++){
									$k = sprintf("%02d", $i);
								?>
									<?if($i == substr($list['date'], 8, 2)){?>
										<option id="<?echo $k;?>" value="<?echo $k;?>" selected><?if($i < 10){echo "0".$i;}else{echo $i;}?></option>
									<?}else{?>
										<option id="<?echo $k;?>" value="<?echo $k;?>"><?if($i < 10){echo "0".$i;}else{echo $i;}?></option>
								<?
									}	
								}?>
							</select>일
						</td>
						<td style="border:1px solid #000000;">
            <select id="time1">
            	<option>선택
            	<?for($i=0;$i<=23;$i++){
            		$k = sprintf("%02d", $i);
						if($i<=11){
							if($i==0){
								if($i == substr($list['time'], 0, 2)){?>
									<option value="<?echo $k;?>" selected>오전 12시
								<?}else{?>
									<option value="<?echo $k;?>">오전 12시
							<?
								}
							}else{
								if($i == substr($list['time'], 0, 2)){?>
									<option value="<?echo $k;?>" selected>오전 <?echo $k?>시
								<?}else{?>
            						<option value="<?echo $k;?>">오전 <?echo $k?>시
            	<?
								}
							}
						}else{ 
							if($i==12){
								if($i == substr($list['time'], 0, 2)){?>
									<option value="<?echo $i;?>" selected>오후 12시
								<?}else{?>
									<option value="<?echo $i;?>">오후 12시
							<?}
							}else{
								$k = sprintf("%02d",$i-12);
								if($i == substr($list['time'], 0, 2)){?>
									<option value="<?echo $i;?>" selected>오후 <?echo $k?>시</option>	
								<?}else{?>
							<option value="<?echo $i;?>">오후 <?echo $k?>시</option>	
						<?  
								}
							}
						}
					}
            	?>
            </select>
            :
            <select id="time2">
            	<option>선택
            	<?for($i=0;$i<=5;$i++){
            		if($i == 0){
						$k = sprintf("%02d", $i);
						if($k == substr($list['time'], 3, 2)){?>
							<option value="<?echo $k;?>" selected><?echo $k?>분
						<?}else{?>
							<option value="<?echo $k;?>"><?echo $k?>분
						<?
						  }
						?>
            	<?}else{
            		if($i*10 == substr($list['time'], 3, 2)){?>
            			<option value="<?echo $i*10;?>" selected><?echo $i*10?>분
            		<?}else{?>
            			<option value="<?echo $i*10;?>"><?echo $i*10?>분
            	<?
						}
					}
				}
            	?>
            </select>
            ~
        	<select id="time3">
            	<option>선택
            	<?for($i=0;$i<=23;$i++){
            		$k = sprintf("%02d", $i);
						if($i<=11){
							if($i==0){
								if($i == substr($list['time'], 6, 2)){?>
									<option value="<?echo $k;?>" selected>오전 12시
								<?}else{?>
									<option value="<?echo $k;?>">오전 12시
							<?
								}
							}else{
								if($i == substr($list['time'], 6, 2)){?>
									<option value="<?echo $k;?>" selected>오전 <?echo $k?>시
								<?}else{?>
            						<option value="<?echo $k;?>">오전 <?echo $k?>시
            	<?
								}
							}
						}else{ 
							if($i==12){
								if($i == substr($list['time'], 6, 2)){?>
									<option value="<?echo $i;?>" selected>오후 12시
								<?}else{?>
									<option value="<?echo $i;?>">오후 12시
							<?}
							}else{
								$k = sprintf("%02d",$i-12);
								if($i == substr($list['time'], 6, 2)){?>
									<option value="<?echo $i;?>" selected>오후 <?echo $k?>시</option>	
								<?}else{?>
							<option value="<?echo $i;?>">오후 <?echo $k?>시</option>	
						<?  
								}
							}
						}
					}
            	?>
            </select>
            :
            <select id="time4">
            	<option>선택
            	<?for($i=0;$i<=5;$i++){
            		if($i == 0){
						$k = sprintf("%02d", $i);
						if($k == substr($list['time'], 9, 2)){?>
							<option value="<?echo $k;?>" selected><?echo $k?>분
						<?}else{?>
							<option value="<?echo $k;?>"><?echo $k?>분
						<?
						  }
						?>
            	<?}else{
            		if($i*10 == substr($list['time'], 9, 2)){?>
            			<option value="<?echo $i*10;?>" selected><?echo $i*10?>분
            		<?}else{?>
            			<option value="<?echo $i*10;?>"><?echo $i*10?>분
            	<?
						}
					}
				}
            	?>
            </select>
						<td style="border:1px solid #000000; height:62px; width:100px">
							<?if($login_data['grade'] != 1){?>
							<p style="color:red;">관리자 입력<br/>튜터 입력 불가</p>
							<?}else{?>
								<input type="text" id="classroom" name="classroom" />
							<?}?>
						</td>
					</tr>
				</table>
			</div>
			<div>
				<p style="text-align:center">
					위와 같이 보강계획을 제출합니다.
				</p>
			</div>
			<div style="text-align:right">
				<input type="button" value="수정하기" onclick="en_daily_form()"/>
				<input type="button" value="뒤로가기" onclick="javascript:window.location.href = 'http://<?echo base_url();?>index.php<?echo $view_name?>?req_id=<?echo $list['board_id']?>'"/>
			</div>
		</fieldset>
		<input type="hidden" id="board_id" name="board_id" value="<?echo $list['board_id'];?>" />
		<input type="hidden" id="date" name="date" value="" />
		<input type="hidden" id="time" name="time" value="" />
		<?if($login_data['grade'] != 1){?>
			<input type="hidden" id="classroom" name="classroom" value="none" />
		<?}else{}?>
	</form>
</div>-->