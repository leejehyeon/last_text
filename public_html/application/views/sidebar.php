<?
// Session grade따라 메뉴를 구성
$sidebar_content_array = array(	array(array('notice|공지사항|NOTICE','whole_notice|전체 공지사항','class_notice|수업 공지사항'),
									  array('login_process|로그인|LOGIN','login|로그인','sign_up|회원가입','search_id_pwd|아이디/비밀번호 찾기'),
									  array('site_information|사이트 정보|SITE','personal_information|개인정보 이용약관','email_collection|이메일 무단 수집거부')
									 ),
							  	array(array('notice|공지사항|NOTICE','whole_notice|전체 공지사항','class_notice|수업 공지사항'),
									  array('lesson|수업|CLASS','attendance_record_admin|출석부 관리','daily_journal_admin|근무일지 관리','enrichment_study_admin|보강신청 관리'),
									  array('administration|관리|ADMIN','tutee|튜티', 'tutor|튜터'),
									  array('question_and_answer|질의응답|Q&A','questioning_and_answering|질문 및 답변하기'),
									  array('mypage|마이페이지|MYPAGE','modify|회원수정','delete|회원탈퇴'),
									  array('site_information|사이트 정보|SITE','personal_information|개인정보 이용약관','email_collection|이메일 무단 수집거부')
									  ),
								array(array('notice|공지사항|NOTICE','whole_notice|전체 공지사항','class_notice|수업 공지사항'),
									  array('lesson|수업|CLASS','attendance_record|출석부','daily_journal|근무일지','enrichment_study|보강신청'),
									  array('question_and_answer|질의응답|Q&A','questioning_and_answering|질문 및 답변하기'),
									  array('mypage|마이페이지|MYPAGE','modify|회원수정','delete|회원탈퇴'),
									  array('site_information|사이트 정보|SITE','personal_information|개인정보 이용약관','email_collection|이메일 무단 수집거부')
							  		 ),
								array(array('notice|공지사항|NOTICE','whole_notice|전체 공지사항','class_notice|수업 공지사항'),
									  array('lesson|수업|CLASS','my_attendance|내 출결보기'),
									  array('question_and_answer|질의응답|Q&A','questioning_and_answering|질문 및 답변하기'),
									  array('mypage|마이페이지|MYPAGE','modify|회원수정','delete|회원탈퇴'),
									  array('site_information|사이트 정보|SITE','personal_information|개인정보 이용약관','email_collection|이메일 무단 수집거부')
							  		 ),
								array(array('notice|공지사항|NOTICE','whole_notice|전체 공지사항','class_notice|수업 공지사항'),
							  		  array('mypage|마이페이지|MYPAGE','modify|회원수정','delete|회원탈퇴'),
							  		  array('site_information|사이트 정보|SITE','personal_information|개인정보 이용약관','email_collection|이메일 무단 수집거부')
									 )
							  );
		if($this->session->userdata('login_data')!=NULL){
					$i=(int)$login_data['grade'];
				}else{
					$i=0;
				}
			?>
		<div class="row" id="Homepage_content_parent_div">
			<div class="sidebar">
			<?
			for($j=0;$j<=count($sidebar_content_array[$i])-1;$j++){
				/*
				 	----대매뉴 지정----
				 grade에 맞는 Array를 찾아가 "|"을 기준으로 
				 Array를 따로 나눈다. 
				 ex) 만약 이름이 $explode_top_array이고 explode를 시키면
				 $explode_top_array[0] ,$explode_top_array[1]로 나뉜다.
				*/	
				$explode_top_array = explode('|', $sidebar_content_array[$i][$j][0]);
				if($menu_title == $explode_top_array[0]){
				
					for($k=1;$k<=count($sidebar_content_array[$i][$j])-1;$k++){
						/*		
						 ----submenu 지정----
						 대메뉴 이름을 비교하여 같다면 그에 맞는 서브메뉴 지정 
						*/						
						$explode_category_top_array = explode('|', $sidebar_content_array[$i][$j][$k]);
						if($category_title == $explode_category_top_array[0]){
?>			
							<!--<p class="sidebar_title_korean"><?echo $explode_top_array[1]?></p>-->
<?							$page_title= $explode_category_top_array[1];

							if($explode_top_array[0]=="login_process" || $explode_top_array[0]=="mypage"){
								$title_area = "loginpage_title_area";
							}else if($explode_top_array[0]=="notice"){
								$title_area = "boardpage_title_area";
							}else{
								$title_area = "page_title_area";	
							}
							?><p class="sidebar_title_english"><?echo $explode_top_array[2]?></p>
								<p class="sidebar_title_korean"><?echo $explode_top_array[1]?></p><?
						}
					}
?>					
<?
						for($k=1;$k<=count($sidebar_content_array[$i][$j])-1;$k++){
							$explode_category_top_array = explode('|', $sidebar_content_array[$i][$j][$k]);
?>
<?
						if($category_title == $explode_category_top_array[0]){
?>
							<a href="/index.php/<?echo $explode_top_array[0]?>/<?if($explode_category_top_array[0]=="my_attendance"){echo $explode_category_top_array[0].'/'.date("Y/m");
							}else if($explode_category_top_array[0]=="attendance_record"){echo $explode_category_top_array[0].'/'.date("Y/m/d");
							}else if($explode_category_top_array[0]=="daily_journal"){echo $explode_category_top_array[0].'/'.date("Y/m");
							}else if($explode_category_top_array[0]=="daily_journal_admin"){echo $explode_category_top_array[0].'/'.date("Y/m");
							}else if($explode_category_top_array[0]=="questioning_and_answering"){echo $explode_category_top_array[0].'/'."2";
							}else{echo $explode_category_top_array[0];}?>"><li class="sidebar_subtitle_select"><p class="select_subtitle_line">- </p><?echo $explode_category_top_array[1]?></li></a>						
<?
						}else{?>
							<a href="/index.php/<?echo $explode_top_array[0]?>/<?if($explode_category_top_array[0]=="my_attendance"){echo $explode_category_top_array[0].'/'.date("Y/m");
							}else if($explode_category_top_array[0]=="attendance_record"){echo $explode_category_top_array[0].'/'.date("Y/m/d");
							}else if($explode_category_top_array[0]=="daily_journal"){echo $explode_category_top_array[0].'/'.date("Y/m");
							}else if($explode_category_top_array[0]=="daily_journal_admin"){echo $explode_category_top_array[0].'/'.date("Y/m");
							}else if($explode_category_top_array[0]=="questioning_and_answering"){echo $explode_category_top_array[0].'/'."2";
							}else{echo $explode_category_top_array[0];}?>"><li class="sidebar_subtitle"><p class="select_subtitle_line">- </p><?echo $explode_category_top_array[1]?></li></a>
<?						}
					}
				}
			}				
?>
</div>
	<div class="<?echo $title_area?>">
	<p class="page_title"><?echo $page_title?></p>
</div>
			
		
