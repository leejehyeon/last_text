<div id="slideShowImages" class="Main_image" style="position:relative;">

	<img src="/static/img/Main_picture2.png">
	<img src="/static/img/Main_picture.png">
</div>
<script src="/static/js/slideShow.js"></script>

<div id="Main_row_container">
	<div class="Main_row">
	<!---------- First div -------------->
		<div>
			<!--------------공지 사항 --------------->
			<div>
				<table id="Main_Notice_Table">
					<tr>
						<th>
							<img src='/static/img/Notice_title.png'>	
						</th>
						<th>
							<a href="/index.php/notice/whole_notice">
							<span>more</span>
							<img src="/static/img/Notice_icon.png"></a>
						</th>
					</tr>
					<?foreach($notice_list3 as $lt){?>
						<tr>
							<td>
								<a href="/index.php/notice/whole_notice?req_id=<?echo $lt -> board_id; ?>">
									<?if((strlen($lt->subject))>20){
											echo substr(($lt->subject), 0, 18);
											echo "...";
										}
										else{
											echo $lt->subject;
										}
									?>
								</a>
							</td>
							<td>
								<?echo substr(($lt->reg_date),0,10);?>
							</td>					
						</tr>
					<?} ?>
				</table>
			</div>
			<?echo("<script language='javascript'>Main_Notice_Margin();</script>"); ?>
			<!--------------수업공지 사항 --------------->
			<div>
				<table id="Main_Notice_Table2">
					<tr>
						<th>
							<img src='/static/img/Notice_title_class.png'>
						</th>
						<th>
							<a href="/index.php/notice/class_notice">
							<span>more</span>
							<img src="/static/img/Notice_icon.png"></a>
						</th>
					</tr>
					<?foreach($class_notice_list3 as $lt){?>
						<tr>
							<td>
								<a href="/index.php/notice/class_notice?req_id=<?echo $lt -> board_id; ?>">
									<?if((strlen($lt->subject))>20){
											echo substr(($lt->subject), 0, 18);
											echo "...";
										}
										else{
											echo $lt->subject;
										}
									?>
								</a> 
							</td>
							<td>
								<?echo substr(($lt->reg_date),0,10);?>
							</td>					
						</tr>
					<?} ?>
				</table>			
			</div>
		<?echo("<script language='javascript'>Main_Notice_Margin2();</script>"); ?>
				
		</div>
	<!---------- second div -------------->
		<div>
			<div class="Main_row_second_div_Tutor">
				<div>
					<img src="/static/img/tutee_icon">				
				</div>
				<div>
					<p>튜<span>티</span>(Tutee)란?</p>
					<p>어려운 과목으로
					도움을 원하는
					학생이</p>
					<p>선배에게 배웁니다.</p>  
					<p>
							<img src="/static/img/tutor_apply_icon2.png" <?if($this->session->userdata('login_data')==null){?> onclick="tutee();" 
							<?}else if($login_data['grade'] == "1" || $login_data['grade'] == "2" || $login_data['grade'] == "3"){?>onclick="grade_isset('<?echo $login_data['grade'];?>')"  
							<?}else{?> onclick="tutee_login('<?echo $tutee_tutor_application['user_application']?>','<?echo $login_data['user_application_subject']?>');"<?}?>  onMouseOver="this.src='/static/img/tutor_apply_icon2_hover.png'" onMouseOut="this.src='/static/img/tutor_apply_icon2.png'">
					</p>
				</div>
			</div>
			
			<div class="Main_row_second_div_Tutee">
				<div>
					<img src="/static/img/tutor_icon">
				</div>
				<div>
					<p>튜<span>터</span>(Tutor)란?</p>
					<p>우수한 성적의
					선배가
					학습 도우미로서</p>
					<p>이끌어 줍니다.</p>
					<p>
							<img src="/static/img/tutor_apply_icon2.png" <?if($this->session->userdata('login_data')==null){?> onclick="tutor();" 
							<?}else if($login_data['grade'] == "1" || $login_data['grade'] == "2" || $login_data['grade'] == "3"){?>onclick="grade_isset('<?echo $login_data['grade'];?>')"  
							<?}else{?> onclick="tutor_login('<?echo $tutee_tutor_application['user_application']?>','<?echo $login_data['user_application_subject']?>');"<?}?> onMouseOver="this.src='/static/img/tutor_apply_icon2_hover.png'" onMouseOut="this.src='/static/img/tutor_apply_icon2.png'">
					</p>
				</div>			
			</div>
		</div>
	<!---------- third div -------------->
		<div>
			<!------------LOGIN PART --------->
			<div>
				<?if($this->session->userdata('login_data')!=NULL){?>
					<?if($login_data['grade']=='1'){
					?>
				<div class="LOGOUT_div">
					<p>
						<span>관리자</span> <?echo $login_data['user_id']?>님, 반갑습니다!
						<a href="/index.php/login_process/logout">
							<input type="button" value="LOGOUT"/ class="Loginprocess_button">						
						</a>
					</p>
					<p>
						<a href="/index.php/lesson/attendance_record_admin">
							<img src='/static/img/Main_row_loginicon_attendance.png'>
						</a>
						<a href="/index.php/lesson/daily_journal_admin/<?echo date("Y/m");?>">
							<img src='/static/img/Main_row_loginicon_working.png'>
						</a>
						<a href="/index.php/lesson/enrichment_study_admin">
							<img src='/static/img/Main_row_loginicon_reinforce.png'>
						</a>
						<a href="/index.php/mypage/modify">
							<img src='/static/img/Main_row_loginicon_mypage.png'>
						</a>
					</p>
				</div>
					<?}
					else if($login_data['grade']=='2'){
					?>
						<div class="LOGOUT_div">
							<p>
								<span>튜터</span> <?echo $login_data['user_id']?>님, 반갑습니다!
								<span>
									<a href="/index.php/login_process/logout">
										<input type="button" value="LOGOUT"/ class="Loginprocess_button">						
									</a>
								</span>
							</p>
							<p>
								<a href="/index.php/lesson/attendance_record/<?echo date("Y/m/d"); ?>">
									<img src='/static/img/Main_row_loginicon_attendance.png'>
								</a>
								<a href="/index.php/lesson/daily_journal/<?echo date("Y/m"); ?>">
									<img src='/static/img/Main_row_loginicon_working.png'>
								</a>
								<a href="/index.php/lesson/enrichment_study">
									<img src='/static/img/Main_row_loginicon_reinforce.png'>
								</a>
								<a href="/index.php/mypage/modify">
									<img src='/static/img/Main_row_loginicon_mypage.png'>
								</a>
							</p>
						</div>					
					<?}	
					else if($login_data['grade']=='3'){
					?>
						<div class="LOGOUT_div">
							<p>
								<span>튜티</span> <?echo $login_data['user_id']?>님, 반갑습니다!
								<a href="/index.php/login_process/logout">
									<input type="button" value="LOGOUT"/ class="Loginprocess_button">						
								</a>
							</p>
							<p>
								<a href="/index.php/lesson/my_attendance/<?echo date("Y/m"); ?>">
								<img class="special_tutee_img" src='/static/img/Main_row_loginicon_attendance2.png'>
								</a>
								<a href="/index.php/mypage/modify">
									<img src='/static/img/Main_row_loginicon_mypage.png'>
								</a>
							</p>
						</div>					
					<?}
						else{
					?>
						<div class="LOGOUT_div">
							<p>
								<span>일반회원</span> <?echo $login_data['user_id']?>님, 반갑습니다!
								<a href="/index.php/login_process/logout">
									<input type="button" value="LOGOUT"/ class="Loginprocess_button">						
								</a>
							</p>
							<p>
								<a href="/index.php/mypage/modify">
									<img src='/static/img/Main_row_loginicon_mypage.png'>
								</a>
							</p>
						</div>					
					<?}?>		
							
				<?}else{ ?>
				<div class="LOGIN_div2">

					<form method="post" action="/index.php/login_process/login_id_pw_check">
						<p>
							<img src='/static/img/Main_row_rogin_title.png'>
						</p>
						
						<div class="LOGIN_div_Enter_idpw">
							<input type="text" name="user_id" class="userdata_input_box">
							<input type="password" name="user_pw" class="userdata_input_box">
						</div>
						<div class="LOGIN_div_Submit">
							<input type="submit" value="LOGIN"/ class="Loginprocess_button">
						</div>
						<p>
							<a href="/index.php/login_process/sign_up">회원가입</a>
							<a href="/index.php/login_process/search_id_pwd">ID/PW 찾기</a>
						</p>
					</form>

				</div>
				<?} ?>
			</div>
			
			<!--------- customer Part -------------------->
			<div class="Main_row_custmoer">
				<p>
					<span>CUSTOMER</span> CENTER
				</p>
				<p>
					<img src='/static/img/main_row_third_picture2.png'>
					<span>이메일</span> skyb4@koreatech.ac.kr
				</p>
				<p>
					<img src='/static/img/main_row_third_picture2.png'>
					<span>문의전화</span> 041-640-8550~1
				</p>
				<p>
					메일로 문의사항을 남겨주세요
				</p>
			</div>		
		</div>
		
	</div>
</div>



