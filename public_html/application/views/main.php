<div class="Main_image" style="position:relative;">
	<img src="/static/img/Main_picture.png">
</div>

<div id="Main_row_container">
	<div class="Main_row">
	<!---------- First div -------------->
		<div>
			<!--------------공지 사항 --------------->
			<div>
				<table>
					<tr>
						<th>
							<img src='/static/img/Notice_title.png'>	
						</th>
						<th>
							<a href="http://tutor.thecakehouse.co.kr/index.php/notice/whole_notice">
							<span>more</span>
							<img src="/static/img/Notice_icon.png"></a>
						</th>
					</tr>
					<?foreach($notice_list5 as $lt){?>
						<tr>
							<td>
								<a href="http://tutor.thecakehouse.co.kr/index.php/notice/whole_notice?req_id=<?echo $lt -> board_id; ?>"><?echo $lt -> subject; ?></a>
							</td>
							<td>
								<?echo substr(($lt->reg_date),0,10);?>
							</td>					
						</tr>
					<?} ?>
				</table>
			</div>
			<!--------------수업공지 사항 --------------->
			<div>
				<table>
					<tr>
						<th>
							<img src='/static/img/Notice_title_class.png'>
						</th>
						<th>
							<a href="http://tutor.thecakehouse.co.kr/index.php/notice/whole_notice">
							<span>more</span>
							<img src="/static/img/Notice_icon.png"></a>
						</th>
					</tr>
					<?foreach($notice_list5 as $lt){?>
						<tr>
							<td>
								<a href="http://tutor.thecakehouse.co.kr/index.php/notice/whole_notice?req_id=<?echo $lt -> board_id; ?>"><?echo $lt -> subject; ?></a> 
							</td>
							<td>
								<?echo substr(($lt->reg_date),0,10);?>
							</td>					
						</tr>
					<?} ?>
				</table>			
			</div>
				
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
						<a href="http://syjeon.ancle.kr/index.php/tutor_tutee_application/tutee"><img src="/static/img/tutor_apply_icon.png" onMouseOver="this.src='/static/img/tutor_apply_icon_hover.png'" onMouseOut="this.src='/static/img/tutor_apply_icon.png'"></a>
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
						<a href="http://syjeon.ancle.kr/index.php/tutor_tutee_application/tutor" ><img src="/static/img/tutor_apply_icon.png" onMouseOver="this.src='/static/img/tutor_apply_icon_hover.png'" onMouseOut="this.src='/static/img/tutor_apply_icon.png'"></a>
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
						<img src='/static/img/Main_row_loginicon_attendance.png'>
						<img src='/static/img/Main_row_loginicon_working.png'>
						<img src='/static/img/Main_row_loginicon_reinforce.png'>
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
								<img src='/static/img/Main_row_loginicon_attendance.png'>
								<img src='/static/img/Main_row_loginicon_working.png'>
								<img src='/static/img/Main_row_loginicon_reinforce.png'>
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
								<span>튜티</span> <?echo $login_data['user_id']?>님, 반갑습니다!
								<a href="/index.php/login_process/logout">
									<input type="button" value="LOGOUT"/ class="Loginprocess_button">						
								</a>
							</p>
							<p>
								<img class="special_tutee_img" src='/static/img/Main_row_loginicon_attendance2.png'>
								<a href="/index.php/mypage/modify">
									<img src='/static/img/Main_row_loginicon_mypage.png'>
								</a>
							</p>
						</div>					
					<?}?>		
							
				<?}else{ ?>
				<div class="LOGIN_div">

					<form method="post" action="/index.php/login_process/login_id_pw_check">
						<p>
							<img src='/static/img/Main_row_rogin_title.png'>
						</p>
						
						<div class="LOGIN_div_Enter_idpw">
							<input type="text" name="form_id" class="userdata_input_box">
							<input type="password" name="form_pw" class="userdata_input_box">
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
				<img src='/static/img/Main_row_Customer'>
			</div>		
		</div>
		
	</div>
</div>



