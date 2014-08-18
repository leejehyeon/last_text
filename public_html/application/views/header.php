<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
		<!-- Latest compiled and minified JavaScript -->
		<link rel="stylesheet" href="/static/css/view.css">
		<link rel="stylesheet" href="/static/css/view2.css">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.9.1.js"></script>
		<script src="/static/js/scripts.js"></script>
		<script src="/static/js/scripts2.js"></script>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="/static/css/bootstrap.css">

		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			
			<div id="Header_div_first">

			<div class="header_Topmenu_div">
						<p>
							<a href='/index.php'>HOME</a><span>|</span>
							<?if($this->session->userdata('login_data')==NULL){?>
								<a href="/index.php/login_process/login">LOGIN</a><span>|</span>
								<a href="/index.php/login_process/login">MY PAGE</a>
							<?}else{?>
								<a href="/index.php/login_process/logout">LOGOUT</a><span>|</span>
								<a href="/index.php/mypage/modify">MY PAGE</a>
							<?}?>
						</p>
					</div>
			</div>
			<div id="Header_div_second">
				<div class="row">
					<div class="col-xs-2">
						<a href="/index.php"><img src="/static/img/Header_Logo.png" class="header_logo"/></a>
					</div>
					<div class="col-xs-8">
						<ul  id="Header_top_nav" class="nav navbar-nav navbar-left">
							<li class="dropdown">
								<a href="/index.php/notice/whole_notice" class="dropdown-toggle">NOTICE
								<p>
									공지사항
								</p></a>
								<ul class="dropdown-menu" onmouseover="changer_parent_licolor(this)" onmouseout="changer_parent_licolor_out(this)">
									<li>
										<a href="/index.php/notice/whole_notice">전체공지사항</a>
									</li>
									<li>
										<a href="/index.php/notice/class_notice">수업공지사항</a>
									</li>
								</ul>
							</li>
							<li>
								<img src='/static/img/Header_menu_vertical_line.png'>
							</li>
							<li class="dropdown">
								<a href="/index.php/
								<?if(($this->session->userdata('login_data')!=NULL)){
									if($login_data['grade']=='3'){?>
										lesson/my_attendance/<?echo date("Y/m")?>"
									<?}else if($login_data['grade']=='2'){?>
										lesson/attendance_record/<?echo date("Y/m/d")?>"
									<?}else if($login_data['grade']=='1'){?>
										lesson/attendance_record_admin/"
									<?}
									else{?>
										" onclick="goto_apply()"
									<?}
								}
								else{?>
									login_process/login/" onclick='goto_login()'
								<?}?>
								 class="dropdown-toggle">CLASS
								<p>
									수업
								</p></a>
								<?if($this->session->userdata('login_data')!=NULL){?>
								<?if($login_data['grade']=='3'){
								?>
								<ul class="dropdown-menu" onmouseover="changer_parent_licolor(this)" onmouseout="changer_parent_licolor_out(this)">
									<li>
										<a href="/index.php/lesson/my_attendance/<?echo date("Y/m"); ?>">내 출결보기</a>
									</li>
								</ul>
								<?}else if($login_data['grade']=='2'){ ?>
								<ul class="dropdown-menu" onmouseover="changer_parent_licolor(this)" onmouseout="changer_parent_licolor_out(this)">
									<li>
										<a href="/index.php/lesson/attendance_record/<?echo date("Y/m/d"); ?>">출석부</a>
									</li>
									<li>
										<a href="/index.php/lesson/daily_journal/<?echo date("Y/m"); ?>">근무일지</a>
									</li>
									<li>
										<a href="/index.php/lesson/enrichment_study">보강신청</a>
									</li>
								</ul>
								<?}else if($login_data['grade']=='1'){ ?>
								<ul class="dropdown-menu" onmouseover="changer_parent_licolor(this)" onmouseout="changer_parent_licolor_out(this)">
									<li>
										<a href="/index.php/lesson/attendance_record_admin">출석부 관리</a>
									</li>
									<li>
										<a href="/index.php/lesson/daily_journal_admin/<?echo date("Y/m");?>">근무일지 관리</a>
									</li>
									<li>
										<a href="/index.php/lesson/enrichment_study_admin">보강신청 관리</a>
									</li>
								</ul>
								<?}else{} ?>
								<?}else{} ?>
							</li>
							<li>
								<img src='/static/img/Header_menu_vertical_line.png'>
							</li>
							<li class="dropdown">
								<a href="/index.php/
								<?if($this->session->userdata('login_data')!=NULL){?>
								<?if($login_data['grade']=='3'){
								?>
								question_and_answer/questioning_and_answering/2/"
								<?} else if($login_data['grade']=='2'){
								?>
								question_and_answer/questioning_and_answering/2/"
								<?} else if($login_data['grade']=='1'){
								?>
								question_and_answer/questioning_and_answering/2/"
								<?} else{ ?>
										" onclick="goto_apply()"
									<?}}
								else{ ?>
									login_process/login/" onclick='goto_login()'
								<?}?>	
								 class="dropdown-toggle">Q&A
								<p>
									질의응답
								</p></a>
								<?if($this->session->userdata('login_data')!=NULL){?>
								<?if($login_data['grade']=='3'){
								?>
								<ul class="dropdown-menu" onmouseover="changer_parent_licolor(this)" onmouseout="changer_parent_licolor_out(this)">
									<li>
										<a href="/index.php/question_and_answer/questioning_and_answering/2/">질문 및 답변하기</a>
									</li>
								</ul>
								<?}else if($login_data['grade']=='2'){ ?>
								<ul class="dropdown-menu" onmouseover="changer_parent_licolor(this)" onmouseout="changer_parent_licolor_out(this)">
									<li>
										<a href="/index.php/question_and_answer/questioning_and_answering/2/">질문 및 답변하기</a>
									</li>
								</ul>
								<?}else if($login_data['grade']=='1'){ ?>
								<ul class="dropdown-menu" onmouseover="changer_parent_licolor(this)" onmouseout="changer_parent_licolor_out(this)">
									<li>
										<a href="/index.php/question_and_answer/questioning_and_answering/2/">질문 및 답변하기</a>
									</li>
									</li>
								</ul>
								<?}else{} ?>
								<?}else{} ?>
							</li>
							<!--								<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">SUGGESTION<p>제안</p></a>
							<?if($this->session->userdata('login_data')!=NULL){
							?>
							<?if($login_data['grade']=='3'){
							?>
							<ul class="dropdown-menu">
							<li>
							<a href="/index.php/suggestion/suggest_to_tutor">튜터에게 제안</a>
							</li>
							<li>
							<a href="/index.php/suggestion/suggest_to_admin">관리자에게 제안</a>
							</li>
							</ul>
							<?}else if($login_data['grade']=='2'){ ?>
							<ul class="dropdown-menu">
							<li>
							<a href="/index.php/suggestion/suggest_to_admin">관리자에게 제안</a>
							</li>
							</ul>
							<?}else if($login_data['grade']=='1'){ ?>
							<ul class="dropdown-menu">
							<li>
							<a href="/index.php/suggestion/view_suggestions">제안보기</a>
							</li>
							</ul>
							<?}else{} ?>
							<?}else{} ?>
							</li>
							-->
							<?if($this->session->userdata('login_data')!=NULL){?>
							<?if($login_data['grade']=='1'){?>
							<!-- 메뉴 5ea로 변경될 때 CSS 수정부분 -->
							<li>
								<img src='/static/img/Header_menu_vertical_line.png'>
							</li>
							<li  class="dropdown">
								<a href="/index.php/administration/tutee" class="dropdown-toggle">ADMIN
								<p>
									관리
								</p></a>
								<ul class="dropdown-menu" onmouseover="changer_parent_licolor(this)" onmouseout="changer_parent_licolor_out(this)">
									<li>
										<a href="/index.php/administration/tutee">튜티</a>
									</li>
									<li>
										<a href="/index.php/administration/tutor">튜터</a>
									</li>
								</ul>
							</li>
							<?	echo("<script language='javascript'>Change_menu();</script>");
								}else{}
							?>
							<?}else{} ?>
						</ul>
					</div>
					<div class="col-xs-1"></div>
				</div>
			</div>
		
<!--			<div id="Header_div_third">
				<div>
					<a href='http://tutor.thecakehouse.co.kr/index.php/login_process/login'><input type='button' value="LOGIN"></a>	
					<a href='http://tutor.thecakehouse.co.kr/index.php/mypage/modify'><input type='button' value="MY PAGE"></a>
				</div>	
			</div>
-->