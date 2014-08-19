<!--<form name="id_form" method="post" action="/index.php/lesson/daily_journal_tutor/<?echo $this -> uri -> segment(3); ?>/<?echo $this -> uri -> segment(4); ?>">
	<table width="100%" align="center" style="height:30" cellspacing="0">
		<?foreach($tutor_data as $lt){
		?>
		<tr>
			<td class="input-td">
			<input type="button" value="<?echo $lt -> user_name; ?>" onclick="tutor_daily_journal(this.value)" />
			</td>
		</tr>
		<input type="hidden" id="<?echo $lt -> user_name; ?>" value="<?echo $lt -> user_id; ?>" />
		<?} ?>
		<input type="hidden" id="user_id" name="user_id" value="" />
		<input type="hidden" name="year" value="<?echo $this -> uri -> segment(3); ?>" />
		<input type="hidden" name="month" value="<?echo $this -> uri -> segment(4); ?>" />
	</table>
</form>-->
<form name="id_form" method="post" action="/index.php/lesson/daily_journal_admin/<?echo $this -> uri -> segment(3); ?>/<?echo $this -> uri -> segment(4); ?>/daily_journal_tutor">
	<table class="whole_notice">
		<thead>
			<tr>
				<th class="width_79">번호</th>
				<!--<th scope="col">제목</th>-->
				<th class="width_116">학번</th>
				<th class="width_579">작성자</th>
				<!--<th scope="col">작성일</th>-->
				<!--<th scope="col">조회수</th>-->
			</tr>
		</thead>
		<tbody>
		<?$count_id = count($tutor_data);
		foreach($tutor_data as $lt){
		?>
		<tr>
			<td class="width_79">
				<?
				for($i=count($tutor_data);$i>=1;$i--){
					if($i==$count_id){
						echo $i;
					}
				}?>
			</td>
				<td class="width_116">
				<?echo $lt -> user_number; ?>
				</td>
				<td class="width_579">
				<input style="width:200px;"type="button" value="<?echo $lt -> user_name; ?>" onclick="tutor_daily_journal(this.value)" />
			</td>
		</tr>
		<input type="hidden" id="<?echo $lt -> user_name; ?>" value="<?echo $lt -> user_id; ?>" />
		<?$count_id--;} ?>
		<input type="hidden" id="user_id" name="user_id" value="" />
		<input type="hidden" name="year" value="<?echo $this -> uri -> segment(3); ?>" />
		<input type="hidden" name="month" value="<?echo $this -> uri -> segment(4); ?>" />
		</tbody>
	</table>
</form>