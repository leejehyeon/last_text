<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".grade").each(function() {
			$(this).wrap("<p class='grade_wrapper select-wrapper'></p>");
			$(this).after("<p class='holder'></p>");
		});
		$(".grade").change(function() {
			var selectedOption = $(this).find(":selected").text();
			$(this).next(".holder").text(selectedOption);
		}).trigger('change');
		$(".specialty_list").each(function() {
			$(this).wrap("<p class='specialty_wrapper select-wrapper'></p>");
			$(this).after("<p class='holder'></p>");
		});
		$(".specialty_list").change(function() {
			var selectedOption = $(this).find(":selected").text();
			$(this).next(".holder").text(selectedOption);
		}).trigger('change');
		$(".phone_first").each(function() {
			$(this).wrap("<p class='phone_wrapper select-wrapper'></p>");
			$(this).after("<p class='holder'></p>");
		});
		$(".phone_first").change(function() {
			var selectedOption = $(this).find(":selected").text();
			$(this).next(".holder").text(selectedOption);
		}).trigger('change');
		$(".email_third").each(function() {
			$(this).wrap("<p class='email_third_wrapper select-wrapper'></p>");
			$(this).after("<p class='holder'></p>");
		});
		$(".email_third").change(function() {
			var selectedOption = $(this).find(":selected").text();
			$(this).next(".holder").text(selectedOption);
		}).trigger('change');
	})
</script>
<div class="modify_page">
<!-- homepageguide detailpage join start -->
	<div>
		<form name="update_form" method="post" action="/index.php/login_process/update">
			<div>
				<table>
					<tr>
						<td class="sign_up_text"><p class="search_list_text">이름</p></td>
						<td><input class="search_list" type="text" name="user_name" id="user_name" value="<?php echo $login_data['user_name']?>"/></td>
					</tr>
					<tr>
						<td><p class="search_list_text">비밀번호</p></td>
						<td><input class="search_list"type="password" name="user_pw" id="user_pw" value="<?echo $login_data['user_pw']?>"/></td>
					</tr>
					<tr>
						<td><p class="search_list_text">학년</p></td>
						<td>
							<select class="custom_select grade" name="user_year" value="<?echo $login_data['user_year']?>">
								<option <?
								if ($login_data['user_year'] == "1학년") {echo 'selected = "selected"';
								}
							?>>1학년
								<option <?
								if ($login_data['user_year'] == "2학년") {echo 'selected = "selected"';
								}
								?>>2학년
								<option <?
								if ($login_data['user_year'] == "3학년") {echo 'selected = "selected"';
								}
								?>>3학년
								<option <?
								if ($login_data['user_year'] == "4학년") {echo 'selected = "selected"';
								}
								?>>4학년
							</select>
						</td>
					</tr>
					<tr>
						<td><p class="search_list_text">학번</p></td>
						<td><input class="search_list" type="text" name="user_number" id="user_number" value="<?echo $login_data['user_number']?>"/></td>
					</tr>
					<tr>
						<td><p class="search_list_text">학과</p></td>
						<td><select class="custom_select specialty_list" name="user_department" id="user_department">
								<option <?
								if ($login_data['user_department'] == "기계공학부") {echo 'selected = "selected"';
								}
								?>>기계공학부
								<option <?
								if ($login_data['user_department'] == "메카트로닉스공학부") {echo 'selected = "selected"';
								}
								?>>메카트로닉스공학부
								<option <?
								if ($login_data['user_department'] == "전기전자통신공학부") {echo 'selected = "selected"';
								}
								?>>전기전자통신공학부
								<option <?
								if ($login_data['user_department'] == "컴퓨터공학부") {echo 'selected = "selected"';
								}
								?>>컴퓨터공학부
								<option <?
								if ($login_data['user_department'] == "디자인공학과") {echo 'selected = "selected"';
								}
								?>>디자인공학과
								<option <?
								if ($login_data['user_department'] == "건축공학부") {echo 'selected = "selected"';
								}
								?>>건축공학부
								<option <?
								if ($login_data['user_department'] == "에너지신소재화학공학부") {echo 'selected = "selected"';
								}
								?>>에너지신소재화학공학부
								<option <?
								if ($login_data['user_department'] == "산업경영학부") {echo 'selected = "selected"';
								}
								?>>산업경영학부
							</select></td>
					</tr>
					<tr>
						<td><p class="search_list_text">핸드폰 번호</p></td>
						<td>
							<select class="custom_select phone_first" name="user_phonenumber1" id="user_phonenumber1">
								<option>010
								<option>011
								<option>016
								<option>018
								<option>019
							</select>―<input class="phone_second" type="text" name="user_phonenumber2" id="user_phonenumber2" size="4" value="<?echo substr(($login_data['user_phonenumber']),6,4)?>">―<input class="phone_second" type="text" name="user_phonenumber3" id="user_phonenumber3" size="4" value="<?echo substr(($login_data['user_phonenumber']),13,16)?>"></td>
						<input type="hidden" id="user_phonenumber" name="user_phonenumber" value="">
					</tr>
					<tr>
						<?list($user_email1, $user_email2) = preg_split('/[@]/', ($login_data['user_email'])); ?>
						<td><p class="search_list_text">이메일</p></td>
						<td><input class="email_first"  type="text" name="user_email1" id="user_email1" size="9" value="<?echo $user_email1?>"><p class="email_middle">@</p>
					<input class="email_second" type="text" name="user_email2" id="user_email2" value="<?echo $user_email2?>" onFocus = "this.value=''">
					<input type="hidden" name="nt_0004" value="직접입력">
					 <input type="hidden" name="nt_0001" value="naver.com"> <input type="hidden" name="nt_0002" value="daum.net"> <input type="hidden" name="nt_0003" value="google.com">
					 <select class="custom_select email_third" onchange="selectMatch(this);">
						<option value="nt_0004">선택</option>
						<option value="nt_0001">naver.com</option>
						<option value="nt_0002">daum.net</option>
						<option value="nt_0003">google.com</option>
					 </select>
					 <input type="hidden" id="user_id" name="user_id" value="<?echo $login_data['user_id']?>">
					 </td>
					</tr>
					<input type="hidden" id="user_email" name="user_email" value="">
				</table>
				<div class="button_area">
				<input class="join_back_button float_left" type="button" value="뒤로가기" onclick="javascript:history.back();">
				<input class="join_button float_left" type="button" value="수정완료" onclick="modify();">
				</div>
			</div>
		</form>
	</div>
	
<form method="post" action="/index.php/mypage/<?echo $login_data['user_application_subject'];?>" >
<?if($login_data['grade'] == 4){
	if($login_data['user_application_subject'] != "none"){?>
		<div class="loginpage_title_area_add">
			<p class="page_title">지원서 현황</p>
		</div>
			<p class="text_modify"><?echo $login_data['user_name'];?>님은 <?if($login_data['user_application_subject'] == "tutor"){echo '튜터';}else{echo '튜티';}?>에 지원하신 상태입니다.</p>
			<p class="text_modify2">지원서를 수정하시려면 옆에 버튼을 클릭해주세요.</p>
			<input type="hidden" id="user_id" name="user_id" value="<?echo $login_data['user_id']?>"/>
			<input type="hidden" id="user_application_subject" name="user_application_subject" value="<?echo $login_data['user_application_subject']?>"/>
			<input type="submit" class="join_button float_left" value="수정하기"/>
	<?}
	else{?>
		<div class="loginpage_title_area_add">
			<p class="page_title">지원서 현황</p>
		</div>
			<p class="text_modify"><?echo $login_data['user_name'];?>님은 미지원 상태입니다.</p>
	<?}
	}else{}
	?>
</form>
<!-- homepageguide detailpage join end -->
</div>