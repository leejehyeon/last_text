<div class="each_page my_attendance" style="margin-top:37px;" >
	<form style=" float: left;">
		<label class="styled_select4">
			<select onChange="getmonth(this);">
				<?for($i=2013;$i<=2017;$i++){?>
					<?if($i == $this -> uri -> segment(3)){?>
						<option value="<?echo $i;?>" selected><?echo $i;?></option>
					<?}else{?>
						<option value="<?echo $i;?>"><?echo $i;?></option>
				<?
					}	
				}?>
				<input type="hidden" id="month" value="<?echo $this -> uri -> segment(4);?>"/>
			</select>
		</label>
	<span>년</span>
	</form>
	<form>
		<label class="styled_select4">
			<select onChange="getyear(this);">
				<?for($i=1;$i<=12;$i++){
					$k = sprintf("%02d", $i);	
				?>
					<?if($i == $this -> uri -> segment(4)){?>
						<option value="<?echo $k;?>" selected><?echo $i;?></option>
					<?}else{?>
						<option value="<?echo $k;?>"><?echo $i;?></option>
				<?
					}	
				}?>
				<input type="hidden" id="year" value="<?echo $this -> uri -> segment(3);?>"/>
			</select>
		</label>
	<span>월</span>
	</form>
	<?echo $calendar;?>
</div>