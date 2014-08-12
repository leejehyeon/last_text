<!--<div class="col-xs-7">-->
<!-- homepageguide login start -->
<div class="each_page login_page">
	<!-- login area -->
	<!--<p style="font-size:12.7px;font-weight: bold;color: #666666;font-family: '굴림';"> 로그인</p>-->
	<div class="login_info">* 아이디와 비밀번호를 입력하신 후 LOGIN버튼을 눌러주세요.</div>
	<div class="login_div">
		<div class='homepageguide_login_area'>
			<form action='/index.php/login_process/login_id_pw_check' method='post'>
				<!--<div class='homepageguide_input_style_public'>-->
					<div class="login_text_form">
					<table class="login_table">
						<tr>
							<td class="login_text_id"><p class="zero">아이디</p></td>
							<td>
							<input class="login_id_input" type='text' name='form_id'/>
							</td>

						</tr>
						<tr>
							<td class="login_text_pw"><span>비밀번호</span></td>
							<td>
							<input class="login_pw_input" type='password' name='form_pw'/>
							</td>
						</tr>
						<!--<tr>
							<td rowspan='2'>
							
							</td>
						</tr>-->
					</table>
				
				</div>
				
				<input type='submit' value="LOGIN" class="login_button">
				<div class="login_sub">
				<a href="/index.php/login_process/sign_up"><span class="login_join">회원가입</span></a>
					<a href="/index.php/login_process/search_id_pwd"><span class="login_search_id_pw">아이디/비밀번호 찾기</p></a>
			<!--<table>-->
				<!-- search id pwd -->
				<!--<tr>
					<td><a class="login_join" href="/index.php/login_process/sign_up">회원가입</a></td>
					<td><a class="login_search_id_pw" href="/index.php/login_process/search_id_pwd">아이디/비밀번호 찾기</a></td>
				</tr>
			</table>-->
		</div>
			</form>
		</div>

		<!--<div class='homepageguide_search_area'>-->
			
	</div>
</div>
<!-- homepageguide login end -->
</div>