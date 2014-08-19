<div class="each_page each_page_padding attendance_record">
<?	
	$year = date("Y");
	$month = date("m");
	$day = date("d");
?>

<form style="float: left;">
		<label class="styled_select4">
			<select onChange="change_year_value(this);">
				<?for($i = 2013; $i <= 2017; $i++){?>
					<?if($i == $this -> uri -> segment(3)){?>
						<option value="<?echo $i;?>" selected><?echo $i;?></option>
					<?}else{?>
						<option value="<?echo $i;?>"><?echo $i;?></option>
				<?
					}	
				}?>
				<input type="hidden" id="year" value="<?echo $this -> uri -> segment(3);?>"/>
				<input type="hidden" id="day" value="<?echo $this -> uri -> segment(5);?>"/>
			</select>
		</label>
<span>년</span>
</form>


<form style="float: left;">
		<label class="styled_select4">
			<select onChange="change_month_value(this);">
				<?for($i = 1; $i <= 12; $i++){
					$k = sprintf("%02d", $i);
				?>
					<?if($i == $this -> uri -> segment(4)){?>
						<option value="<?echo $k;?>" selected><?echo $i;?></option>
					<?}else{?>
						<option value="<?echo $k;?>"><?echo $i;?></option>
				<?
					}	
				}?>
				<input type="hidden" id="month" value="<?echo $this -> uri -> segment(4);?>"/>
				<input type="hidden" id="day" value="<?echo $this -> uri -> segment(5);?>"/>
			</select>
		</label>
	<span>월</span>
</form>


<form style="float: left">
		<label class="styled_select4">
			<select onChange="change_day_value(this);">
				<!--
				   월(month)에 맞는 일(day) 구하기
				--> 
				<?
				  $year = $this -> uri -> segment(3);
				  $month = $this -> uri -> segment(4);
				  for($day_month=31;$day_month>=27;$day_month--){
				  	if(checkdate($month, $day_month, $year)){
				  		$day = $day_month;
						break;
				  	}
				  }
				  for($i = 1; $i <= $day; $i++){
				  	$k = sprintf("%02d", $i);
				?>
					<?if($i == $this -> uri -> segment(5)){?>
						<option value="<?echo $k;?>" selected><?echo $i;?></option>
					<?}else{?>
						<option value="<?echo $k;?>"><?echo $i;?></option>
				<?
					}	
				}?>
				<input type="hidden" id="year" value="<?echo $this -> uri -> segment(3);?>"/>
				<input type="hidden" id="month" value="<?echo $this -> uri -> segment(4);?>"/>
			</select>
		</label>
<span>일</span>
</form>

	<form>
		<label class="styled_select4">
			<select name="user_subject" id="user_subject1">
			<?foreach($get_list as $lt){?>
				
				<option value="<?echo $lt -> subject_id;?>"><?echo $lt -> subject;?></option>
			<?}?>
			</select>
		</label>
		<label class="styled_select4">
			<select name="user_divide" id="user_divide1" onchange="showtutee(this.value)">
				<?foreach($get_sub_list as $lt){?>
					<option class="<?echo $lt -> subject_id?>" value="<?echo $lt -> subject_level?>"><?echo $lt ->subject_level?>
				<?}?>
			</select>
		</label>
		<input type="hidden" id="year" value="<?echo $this -> uri -> segment(3);?>" />
		<input type="hidden" id="month" value="<?echo $this -> uri -> segment(4);?>" />
		<input type="hidden" id="day" value="<?echo $this -> uri -> segment(5);?>" />
		<input type="hidden" id="date" value="" />
	</form>
	<div id="txtHint">
	<table class="attendance_record_table2" style="margin-top:30px;">
						<td class="input-td">
							<input type="checkbox" id="total">
							전체 선택
						</td>
						<td>학번</td>
						<td>학생 이름</td>
						<td>출결 상황</td>
						<td>비고</td>
		<tbody>
			<tr>
				<td colspan="5">
					위에 정보를 선택하세요.
				</td>
			</tr>
		</tbody>
	</table>
	<div>
		<img src='/static/img/attendance_record_icon1.png'>
		<img src='/static/img/attendance_record_icon2.png'>
		<img src='/static/img/attendance_record_icon3.png'>
		<img src='/static/img/attendance_record_icon4.png'>
	</div>
</div>
</div>
