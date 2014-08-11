<div class="col-xs-9">
	<?if($login_data['grade'] == 1){?>
		<form action="/index.php/lesson/enrichment_study_admin/update_admin_ok?req_id=<?echo $list['board_id']?>" method="post" name="day_form">
	<?}else{?>
		<form action="/index.php/lesson/enrichment_study/update_ok?req_id=<?echo $list['board_id']?>" method="post" name="day_form">
	<?}?>	
		<fieldset>
			<label for="text_title" class="col-xs-2 control-label">제목</label>
        <div class="col-xs-7">
            <input type="text" class="form-control" id="text_title" name="subject_title" placeholder="제목" value="<?echo $list['subject_title']?>">
        </div>
        </br>
       </br>
        <label for="text_title" class="col-xs-2 control-label">이름</label>
        <div class="col-xs-7">
            <?echo $login_data['user_name'];?>
        </div>
       </br>
       </br>
			<div>
				<p style="font-size:18px; text-align:center">
					<strong>보　강　계　획　서</strong>
				</p>
			</div>
			<div style="text-align:center">
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
						</td>
						<td style="border:1px solid #000000">						
							<input type="text" id="reason" name="reason" value="<?echo $list['reason'];?>" style="border:0px; height:62px; margin:0px; padding:0px"/></td>
						<td style="border:1px solid #000000;">
							<!--<input type='text' name='year' id='year' style="width:60px;">-->
							<!--수정시작
							<select name="p_sYear" onchange=chk()>
								수정끝-->
							<select name="year" id="year" onchange="month_day_set()">
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
        						<select name="month" id="month" onchange="day_set()">
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
</div>