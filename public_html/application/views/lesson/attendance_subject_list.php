<div class="col-xs-12">
	<!-- 테이블 내부의 시작 -->
	
		<div class="row">
			<div>
				<table class="attendance_record_table2" style="margin-top:30px;">
					<!-- Table 제일 위쪽 Tr -->
					<tr>
						<td>번호</td>
						<td>과목</td>
						<td>분반</td>
					</tr>
					
					<?if($sub_list == NULL){?>
						<tr>
							<td colspan="3">
								해당 분반이 없습니다.
							</td>
						</tr>
					<?}else{
						$i=1;
					foreach($sub_list as $lt){
					if($lt -> subject_level == "선택하세요"){
						continue;
					}
					?>
					<tr>
						<td>
							<?echo $i;?>
						</td>
						<td>
							<?foreach($get_list as $it){
								if($lt -> subject_id == $it -> subject_id){
									echo $it ->  subject?>
							<?}
							}?>
						</td>
						<td>
							<?$level = $lt -> subject_level;
							$level = eregi_replace("[^0-9]+","",$level); ?>
							<a href="/index.php/lesson/attendance_record_admin_status/<?echo $lt -> subject_id?>/<?echo $level?>/<?echo $this -> uri -> segment(3); ?>/<?echo $this -> uri -> segment(4); ?>/<?echo $this -> uri -> segment(5); ?>"><?echo $lt -> subject_level;?></a>
						</td>
					</tr>
					
					<?$i++;
					} 
					
					}?>
				</table>
			</div>
		</div>
		<!--버튼-->
	<form name="insert_attendance" method="post" action="/index.php/lesson/insert_attendance" >
		<div class="row">
			<div class="col-xs-5">
				<input type="hidden" name="year" id="year" value="<?echo $this -> uri -> segment(3); ?>" />
				<input type="hidden" name="month" id="month" value="<?echo $this -> uri -> segment(4); ?>" />
				<input type="hidden" name="day" id="day" value="<?echo $this -> uri -> segment(5); ?>" />
				<input type="hidden" name="user_id" id="user_id" value="" />
				<input type="hidden" name="date" id="date" value="" />
				<input type="hidden" name="check_length" id="check_length" value="" />
			</div>
		</div>
	</form>
</div>