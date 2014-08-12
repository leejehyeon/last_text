<!--<div class="col-xs-7">
<form name="delete_member" method="post" action="/index.php/mypage/delete_ok" >
<label for="text_title" class="col-xs-2 control-label">아이디</label>
<div class="col-xs-7">
<p><?echo $login_data['user_id']?></p>
</div>
</br>
</br>
<label for="text_title" class="col-xs-2 control-label">비밀번호</label>
<div class="col-xs-7">
<input type="password" id="user_pw" name="user_pw" />
</div>
</br>
</br>
<label for="text_title" class="col-xs-2 control-label">이메일</label>
<td><input type="text" name="user_email1" id="user_email1" size="9">@
<input type="text" name="user_email2" id="user_email2" onFocus = "this.value=''">
<input type="hidden" name="nt_0004" value="직접입력">
<input type="hidden" name="nt_0001" value="naver.com"> <input type="hidden" name="nt_0002" value="daum.net"> <input type="hidden" name="nt_0003" value="google.com">
<select onchange="selectMatch(this);">
<option value="nt_0004">선택</option>
<option value="nt_0001">naver.com</option>
<option value="nt_0002">daum.net</option>
<option value="nt_0003">google.com</option>
</select>
<input type="hidden" name="user_email" id="user_email" value=""/>
</br>
</br>
<input type="hidden" id="user_id" name="user_id" value="<?echo $login_data['user_id'];?>" />
<input type="button" value="삭제하기" onclick="checkdelete()">
</form>
여기까지 진우님-->
<div class="each_page delete_page">
	<form name="delete_member" method="post" action="/index.php/mypage/delete_ok" >
		<!--<label for="text_title" class="search_list_text">아이디</label>-->
		<div class="delete_info">
			* 회원탈퇴를 진행하기 위해 본인 확인이 필요합니다.
		</div>
		<div class="delete_div">
			<table>
				<tr>
					<td class="delete_text">
					<p class="none_style">
						아이디
					</p></td>
					<!--<div class="col-xs-7">-->
					<td>
					<input class="search_list" type="text" id="user_id" name="user_id" />
					</td>
				</tr>
				<!--</div>-->
				<!--<label for="text_title" class="search_list_text">비밀번호</label>-->
				<tr>
					<td class="delete_text">
					<p class="none_style">
						비밀번호
					</p></td>
					<td><!--<div class="col-xs-7">-->
					<input class="search_list"type="password" id="user_pw" name="user_pw" />
					</td>
				</tr>
				<!--</div>-->
				<!--<label for="text_title" class="search_list_text">이메일</label>-->
				<tr>
					<td>
					<p class="delete_text">
						이메일
					</p></td>
					<td>
					<input class="email_first" type="text" name="user_email1" id="user_email1" maxlength="9" size="9">
					<p class="email_middle">
						@
					</p>
					<input class="email_second"type="text" name="user_email2" id="user_email2" value="직접입력" onFocus = "this.value=''">
					<input type="hidden" name="nt_0014" value="직접입력">
					<input type="hidden" name="nt_0001" value="chol.com">
					<input type="hidden" name="nt_0002" value="dreamwiz.com">
					<input type="hidden" name="nt_0003" value="empal.com">
					<input type="hidden" name="nt_0004" value="gmail.com">
					<input type="hidden" name="nt_0005" value="hanafos.com">
					<input type="hidden" name="nt_0006" value="hanmail.net">
					<input type="hidden" name="nt_0007" value="gmail.com">
					<input type="hidden" name="nt_0008" value="korea.com">
					<input type="hidden" name="nt_0009" value="lycos.co.kr">
					<input type="hidden" name="nt_0010" value="nate.com">
					<input type="hidden" name="nt_0011" value="naver.com">
					<input type="hidden" name="nt_0012" value="paran.com">
					<input type="hidden" name="nt_0013" value="yahoo.com">
					<label class="styled_select9">
						<select class="email_third" onchange="selectMatch(this);">
							<option value="nt_0014">선택</option>
							<option value="nt_0001">chol.com</option>
							<option value="nt_0002">dreamwiz.com</option>
							<option value="nt_0003">empal.com</option>
							<option value="nt_0004">gmail.com</option>
							<option value="nt_0005">hanafos.com</option>
							<option value="nt_0006">hanmail.net</option>
							<option value="nt_0007">gmail.com</option>
							<option value="nt_0008">korea.com</option>
							<option value="nt_0009">lycos.co.kr</option>
							<option value="nt_0010">nate.com</option>
							<option value="nt_0011">naver.com</option>
							<option value="nt_0012">paran.com</option>
							<option value="nt_0013">yahoo.com</option>
						</select> </label></td>
					<input type="hidden" id="user_email" name="user_email" value="">
				</tr>
			</table>
			<input type="hidden" name="user_email" id="user_email" value=""/>
			<input type="hidden" id="user_id" name="user_id" value="<?echo $login_data['user_id']; ?>" />
	</form>
</div>
<div class="delete_button_area">
	<input class="small_gray_button" type="button" value="취소" onclick="javascript:history.back()">
	<input class="small_green_button" type="button" value="완료" onclick="checkdelete()">
</div></div></div>