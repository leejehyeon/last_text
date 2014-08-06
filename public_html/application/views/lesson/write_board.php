<div class="col-xs-9">
	<form action="/index.php/lesson/enrichment_study/write_ok" method="post" name="day_form">
		<fieldset>
			<label for="text_title" class="col-xs-2 control-label">제목</label>
        <div class="col-xs-7">
            <input type="text" class="form-control" id="text_title" name="subject_title" placeholder="제목">
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
								<?foreach($get_list as $lt){?>
									<option value="<?echo $lt->subject_id;?>"><? echo $lt->subject;?>
								<?}?>
							</select> 
							<!--
								<input type='edit' name='subject' id="subject" style="border:0px; height:62px; margin:0px; padding:0px"/>
							-->						
						</td>
						<td style="border:1px solid #000000">						
							<input type="text" id="reason" name="reason" style="border:0px; height:62px; margin:0px; padding:0px"/></td>
						<td style="border:1px solid #000000;">
							<!--<input type='text' name='year' id='year' style="width:60px;">-->
							<!--수정시작
							<select name="p_sYear" onchange=chk()>
								수정끝-->
							<select name="year" id="year" onchange="month_day_set()">
									<?for($i = 2014; $i <= 2024; $i++){?>
									<?if($i == date('Y')){?>
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
									<?if($i == date('m')){?>
										<option id="<?echo $k;?>" value="<?echo $k;?>" selected><?echo $i;?></option>
									<?}else{?>
										<option id="<?echo $k;?>" value="<?echo $k;?>"><?echo $i;?></option>
								<?
									}	
								}?>
        						</select>월
        						<select name="day" id="day">
        					        <?for($i = 1; $i <= 31; $i++){
									$k = sprintf("%02d", $i);
								?>
									<?if($i == date('d')){?>
										<option id="<?echo $k;?>" value="<?echo $k;?>" selected><?echo $i;?></option>
									<?}else{?>
										<option id="<?echo $k;?>" value="<?echo $k;?>"><?echo $i;?></option>
								<?
									}	
								}?>
							</select>일
						</td>
						<td style="border:1px solid #000000;">
            <select id="time1">
            	<option>시간
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
            	?>
            </select>
            :
           <select id="time2">
            	<option>분
            	<?for($i=0;$i<=5;$i++){
					if($i == 0){
						$k = sprintf("%02d", $i);
				?>
						<option value="<?echo $k;?>"><?echo $k?>분
					<?}else{?>
            			<option value="<?echo $i*10;?>"><?echo $i*10?>분
            	<?
					}
				}
            	?>
            </select>
            ~
        	<select id="time3">    
            	<option>시간
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
            	?>
            </select>
            :
            <select id="time4">
            	<option>분
            	<?for($i=0;$i<=5;$i++){
					if($i == 0){
						$k = sprintf("%02d", $i);
				?>
						<option value="<?echo $k;?>"><?echo $k?>분
					<?}else{?>
            			<option value="<?echo $i*10;?>"><?echo $i*10?>분
            	<?
					}
				}
            	?>
            </select>
						<td style="border:1px solid #000000; height:62px; width:100px">
							<p style="color:red;">관리자 입력<br/>튜터 입력 불가</p>
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
				<input type="button" value="제출하기" onclick="en_daily_form()"/>
				<input type="button" value="뒤로가기" onclick="javascript:window.location.href = 'http://<?echo base_url();?>index.php<?echo $view_name?>'"/>
			</div>
		</fieldset>
		<input type="hidden" id="user_id" name="user_id" value="<?echo $login_data['user_id'];?>" />
		<input type="hidden" id="user_name" name="user_name" value="<?echo $login_data['user_name'];?>" />
		<input type="hidden" id="date" name="date" value="" />
		<input type="hidden" id="time" name="time" value="" />
		<input type="hidden" id="classroom" name="classroom" value="none"/>
	</form>
</div>