<div class="col-xs-12">
	<!-- 테이블 내부의 시작 -->
	
		<div class="row">
			<div>
				<table class="attendance_record_table2" style="margin-top:30px;">
					<!-- Table 제일 위쪽 Tr -->
					<tr>
						<td class="input-td">
						<input type="checkbox" id="total">
						전체 선택
						</td>
						<td>학번</td>
						<td>학생 이름</td>
						<td>출결 상황</td>
						<td>비고</td>
					</tr>
					
					<?if($divide == NULL){?>
						<tr>
							<td colspan="5">
								해당 튜티들이 없습니다.
							</td>
						</tr>
					<?}else{
					foreach($divide as $lt){
					?>
					<tr>
						<td>
						<input type="checkbox" name="chklist" value="<?echo $lt -> user_id;?>" />
						</td>
						<td>
							<?echo $lt -> user_number; ?>
						</td>
						<td><?echo $lt -> user_name; ?></td>
						<td>
							<?foreach($date as $it){
								if($lt -> user_id == $it -> user_id){
									echo $it ->  attendance?>
							<?}
							}?>
						</td>
						<td></td>
					</tr>
					<?} 
					}?>
				</table>
			</div>
		</div>
		<!--버튼-->
	<form name="insert_attendance" method="post" action="/index.php/lesson/insert_attendance" >
		<div class="row">
			<div class="col-xs-5">
				<input type="button" id="attend" value="출석" onclick="register_form(this.value);"/>
				<input type="button" id="absence" value="결석" onclick="register_form(this.value);"/>
				<input type="button" id="late" value="지각" onclick="register_form(this.value);"/>
				<input type="hidden" name="year" id="year" value="<?echo $this -> uri -> segment(3); ?>" />
				<input type="hidden" name="month" id="month" value="<?echo $this -> uri -> segment(4); ?>" />
				<input type="hidden" name="day" id="day" value="<?echo $this -> uri -> segment(5); ?>" />
				<input type="hidden" name="attendance" id="attendance" value="" />
				<input type="hidden" name="user_id" id="user_id" value="" />
				<input type="hidden" name="date" id="date" value="" />
				<input type="hidden" name="check_length" id="check_length" value="" />
			</div>
		</div>
	</form>
</div>