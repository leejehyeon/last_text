<div class="col-xs-7">
<form style="float: left;">
<select onChange="journalgetmonth(this);">
	<?for($i = 2013; $i <= 2017; $i++){?>
		<?if($i == $this -> uri -> segment(3)){?>
			<option value="<?echo $i;?>" selected><?echo $i;?>년</option>
		<?}else{?>
			<option value="<?echo $i;?>"><?echo $i;?>년</option>
	<?
		}	
	}?>
	<input type="hidden" id="year" value="<?echo $this -> uri -> segment(3);?>"/>
	<input type="hidden" id="day" value="<?echo $this -> uri -> segment(5);?>"/>
</select>
</form>

<form style="float: left;">
<select onChange="journalgetyear(this);">
	<?for($i = 1; $i <= 12; $i++){
		$k = sprintf("%02d", $i);
	?>
		<?if($i == $this -> uri -> segment(4)){?>
			<option value="<?echo $k;?>" selected><?echo $i;?>월</option>
		<?}else{?>
			<option value="<?echo $k;?>"><?echo $i;?>월</option>
	<?
		}	
	}?>
	<input type="hidden" id="month" value="<?echo $this -> uri -> segment(4);?>"/>
	<input type="hidden" id="day" value="<?echo $this -> uri -> segment(5);?>"/>
</select>
</form>
<form>
<select onChange="showdaily(this.value);">
	<?foreach($subject_list as $lt){?>
		<option value="<?echo $lt -> subject_id?>"><?echo $lt -> subject?></option>
	<?}?>
	<input type="hidden" id="year" value="<?echo $this -> uri -> segment(3);?>" />
	<input type="hidden" id="month" value="<?echo $this -> uri -> segment(4);?>" />
</select>
</form>
	<div id="txtHint"><b>위에 설정을 해주세요.</b></div>	
</div>

