<!--<div class="col-xs-7">-->
<!-- homepoldguide Search start -->
<!--<div>-->
<div class="each_page id_pw_search_page">
	<!-- IDSearch area -->
	<!--<p style="font-size:12.7px;font-weight: bold;color: #666666;font-family: '굴림';"> 아이디/비밀번호 찾기</p>-->
	<p class="search_title"> 아이디 찾기</p>
	<div class='homepoldguide_idsearch_area'>
		<form action='/index.php/login_process/id_search' method='post'>
			<div class='id_seach'>
				<table>
					<tr>
						<td width="90px"><p class="search_list_text">이름</p></td>
						<td><input class="search_list" type='text' name='user_name'/></td>
					</tr>
					<tr>
						<td><p class="search_list_text">학번</p></td>
						<td><input class="search_list" type='text' name='user_number'/></td>
					</tr>
					<tr>
						<td><p class="search_list_text">이메일</p></td>
						<td><input class="search_list" type='text' name='user_email1' style="width: 90px;"/> @ <input type='text' name='user_email2' style="width: 138px;"/></td>
						<!--<td rowspan='2'><input class="id_search_button" type='submit' value="아이디 찾기"></td>-->
					</tr>
				</table>
				<input class="small_green_button search_button" type='submit' value="완료">
			</div>
		</form>
	</div>
	
	<!-- PWSearch area -->
	<p class="search_title"> 비밀번호 찾기</p>
	<div class='homepoldguide_pwsearch_area'>
		<form action='/index.php/login_process/pw_search' method='post'>
			<div class='homepoldguide_input_style_public'>
				<table>
					<tr>
						<td width="110px"><p class="search_list_text">아이디</p></td>
						<td><input class="search_list" type='text' name='user_id'/></td>
					</tr>
					<tr>
						<td><p class="search_list_text">이름</p></td>
						<td><input class="search_list" type='text' name='user_name'/></td>
					</tr>
					<tr>
						<td><p class="search_list_text">이메일</p></td>
						<td><input class="search_list" type='text' name='user_email1' style="width: 91px;"/> @ <input type='text' name='user_email2' style="width: 138px;"/></td>
						<!--<td rowspan='2'><input class="id_search_button" type='submit' value="비밀번호 찾기"></td>-->
					</tr>
				</table>
			</div>
			<input class="small_green_button search_button" type='submit' value="완료">
		</form>
		<input class="gray_button"type="button" value="뒤로가기" onclick="javascript:history.back();">
	</div>
</div>
<!-- homepoldguide Search end -->

</div>