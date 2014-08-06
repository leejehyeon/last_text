<form name="id_form" method="post" action="/index.php/lesson/daily_journal_tutor/<?echo $this -> uri -> segment(3); ?>/<?echo $this -> uri -> segment(4); ?>">
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
</form>

