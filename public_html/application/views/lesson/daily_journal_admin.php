<!--<div class="col-xs-7">
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
여기까지 진우님-->
<div class="each_page each_page_padding2">
	<p class="daily_journal_admin_infoText">* 다음 설정을 해주세요.</p>	
<form style="float: left;">
	<label class="styled_select9">
<select class="daily_journal_admin_year custom_select" onChange="journalgetmonth(this);">
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
</form><p class="daily_journal_admin_middleText">년</p>

<form style="float: left;">
<label class="styled_select9">
<select class="daily_journal_admin_month custom_select" onChange="journalgetyear(this);">
	<?for($i = 1; $i <= 12; $i++){
		$k = sprintf("%02d", $i);
	?>
		<?if($i == $this -> uri -> segment(4)){?>
			<option value="<?echo $k;?>" selected><?if($i < 10){echo "0".$i;}else{echo $i;}?></option>
		<?}else{?>
			<option value="<?echo $k;?>"><?if($i < 10){echo "0".$i;}else{echo $i;}?></option>
	<?
		}	
	}?>
	<input type="hidden" id="month" value="<?echo $this -> uri -> segment(4);?>"/>
	<input type="hidden" id="day" value="<?echo $this -> uri -> segment(5);?>"/>
</select>
</label>
</form><p class="daily_journal_admin_middleText">월</p>
<form>
<label class="styled_select9">
<select class="daily_journal_admin_subject custom_select" onChange="showdaily(this.value);">
	<?foreach($subject_list as $lt){?>
		<option value="<?echo $lt -> subject_id?>"><?echo $lt -> subject?></option>
	<?}?>
	<input type="hidden" id="year" value="<?echo $this -> uri -> segment(3);?>" />
	<input type="hidden" id="month" value="<?echo $this -> uri -> segment(4);?>" />
</select>
</label>
</form>
	<table class="whole_notice">
		<thead>
			<tr>
				<th scope="col">번호</th>
				<th scope="col">제목</th>
				<th scope="col">작성자</th>
				<th scope="col">작성일</th>
				<!--<th scope="col">조회수</th>-->
			</tr>
		</thead>
		<tbody>
			<!--
				게시물 리스트를 불러운 개수만큼 자동으로 반복해서 뿌려준다.
			-->
			<?
			$i=$list_count;
			foreach($journal_list5 as $lt){?>
								<tr>
									<td scope="row">
										<? echo $i;?>
									</td>
									<td>
										<a href="http://syjeon.ancle.kr/index.php/lesson/daily_journal_admin/daily_journal_tutor?req_id=<?echo $lt -> board_id; ?>"><?if((strlen($lt->subject))>20){
											echo substr(($lt->subject), 0, 18);
											echo "...";
										}
										else{
											echo $lt->subject;
										}
									?></a>
									</td>
									<td>
										<? echo $lt -> user_name;?>
									</td>
									<td>
										<? echo substr(($lt->reg_date),0,10);?> 
									</td>
									<!--조회수<td>
										<? echo $lt ->hits;?>
									</td>-->
									</a>
							</tr>
					
					<?$i--;
			} ?>
		</tbody>
	</table>
	
	<div class="whole_notice_create_links">
		<?echo $this -> pagination -> create_links();?>
	</div>
</div>


