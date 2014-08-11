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
</script><!--<div class="col-xs-7">-->
<!-- homepageguide detailpage join start -->
<div class="sign_up_page">
<!--<div class='join_member' style="font-family: '굴림'; ">-->
	
<!--
	<div class='homepageguide_join_guide_style' style="font-size: 12px">
		<div style="border:1px solid #d0d0d0;margin-bottom: 6px;">
		</div>
	</div>
-->
	<!--<div>-->
		<form name="insert_form" method="post" >
			<fieldset>
			<div class='homepageguide_input_style'>
				<table class="member_join_table">
						<fieldset>
					<tr>
						<td class="sign_up_text"><p class="search_list_text">아이디</p></td>
						<td><input class="search_list" type="text" name="user_id" id="user_id" value="<?php echo set_value("user_id"); ?>"/><span class="sign_up_warn">*아이디는 5~12자 이내로 입력해주세요.</span></td>
						<!--<td><input type="submit" value="중복 체크" onclick="submitForm1();"></td>-->
						<td><p class="help-block"><?php echo form_error("user_id"); ?></p></td>
					</tr>
					</fieldset>
					<tr>
						<td><p class="search_list_text">비밀번호</p></td>
						<td><input class="search_list" type="password" name="user_pw" id="user_pw" value="<?php echo set_value("user_pw"); ?>"/><span class="sign_up_warn">*비밀번호는 6~17자 이내로 입력해주세요.</span></td>
						<td><p class="help-block"><?php echo form_error("user_pw"); ?></p></td>
					</tr>
					<tr>
						<td><p class="search_list_text">비밀번호 확인</p></td>
						<td><input class="search_list" type="password" name="user_pw_check" id="user_pw_check" value="<?php echo set_value("user_pw_check"); ?>"/></td>
						<td><p class="help-block"><?php echo form_error("user_pw_check"); ?></p></td>
					</tr>
					<tr>
						<td><p class="search_list_text">이름</p></td>
						<td><input class="search_list" type="text" name="user_name" id="user_name" value="<?php echo set_value("user_name"); ?>"/></td>
						<td><p class="help-block"><?php echo form_error("user_name"); ?></p></td>
					</tr>
					<tr>
						<td><p class="search_list_text">학년</p></td>
						<td><!--<div class="select_box">
							<select id="dropdown" name="user_year">
								<option>1학년
								<option>2학년
								<option>3학년
								<option>4학년
							</select>
							</div>-->
							<select class="custom_select grade" name="user_year">
								<option>1학년
								<option>2학년
								<option>3학년
								<option>4학년
							</select>
						</td>
						<td><p class="help-block"><?php echo form_error("user_year"); ?></p></td>
					</tr>
					<tr>
						<td><p class="search_list_text">학번</p></td>
						<td><input class="search_list" type="text" name="user_number" id="user_number" maxlength="10" value="<?php echo set_value("user_number"); ?>"/></td>
						<td><p class="help-block"><?php echo form_error("user_number"); ?></p></td>
					</tr>
					<tr>
						<td><p class="search_list_text">학과</p></td>
						<td><select class="custom_select specialty_list"name="user_department">
								<option>기계공학부
								<option>메카트로닉스공학부
								<option>전기전자통신공학부
								<option>컴퓨터공학부
								<option>디자인공학과
								<option>건축공학부
								<option>에너지신소재화학공학부
								<option>산업경영학부
							</select></td>
					</tr>
					<tr>
						<td><p class="search_list_text">핸드폰 번호</p></td>
						<td><label>
							<select class="custom_select phone_first" name="user_phonenumber1" id="user_phonenumber1">
								<option>010
								<option>011
								<option>016
								<option>018
								<option>019
							</select>
							</label><span class="style_none">―</span><input class="phone_second" type="text" name="user_phonenumber2" id="user_phonenumber2" maxlength="4" size="4"><span class="style_none">―</span><input class="phone_second"type="text" name="user_phonenumber3" id="user_phonenumber3" maxlength="4" size="4"></td>
						<input type="hidden" id="user_phonenumber" name="user_phonenumber" value="">
						<td><p class="help-block"><?php echo form_error("user_phonenumber"); ?></p></td>
					</tr>
					<tr>
						<td><p class="search_list_text">이메일</p></td>
						<td><input class="email_first" type="text" name="user_email1" id="user_email1" maxlength="9" size="9"><p class="email_middle">@</p><input class="email_second"type="text" name="user_email2" id="user_email2" value="직접입력" onFocus = "this.value=''">
					<input type="hidden" name="nt_0004" value="직접입력">
					 <input type="hidden" name="nt_0001" value="naver.com"> <input type="hidden" name="nt_0002" value="daum.net"> <input type="hidden" name="nt_0003" value="google.com">
					 <select class="custom_select email_third" onchange="selectMatch(this);">
						<option value="nt_0004">선택</option>
						<option value="nt_0001">naver.com</option>
						<option value="nt_0002">daum.net</option>
						<option value="nt_0003">google.com</option>
					 </select>
					 </td>
					 <input type="hidden" id="user_email" name="user_email" value="">
		
						<td><p class="help-block"><?php echo form_error("user_email"); ?></p></td>
					</tr>
					</table>
				<div class="button_area">
					<input class="join_back_button" type="button" value="뒤로가기" onclick="javascript:history.back();">
					<input class="join_button" type="button" value="회원가입" onclick="sign_form();">
				</div>
			</div>
			</fieldset>
		</form>
</div>
<!-- homepageguide detailpage join end -->
</div>
<!--</div>-->