<div class="each_page each_page_padding view_board_page">

				<p class="view_board_title">
					보 강 계 획 서
				</p>
	<p class ="view_board_info">제목</p>
    <p class ="view_board_info width_300"><?=$list['subject_title'] ?></p>
    <p class ="view_board_info clear_both">등록일</p>
    <p class ="view_board_info width_300"><?=substr(($list['reg_date']), 0, 10) ?></p>
    <p class ="view_board_info clear_both">작성자</p>
    <p class ="view_board_info"><?=$list['user_name'] ?></p>
				<table class="view_board_table clear_both">
					<tr class="nanumgothic-bold">
						<td class="view_board_tableLow" rowspan="2" >
						<p class="none_style">
							교 과 목 명
						</p></td>
						<td class="view_board_tableLow" rowspan="2" >
						<p class="none_style">
							보 강 사 유
						</p></td>
						<td class="view_board_tableLong" colspan="3" >
						<p class="none_style">
							보 강 계 획
						</p></td>
					</tr>
					<tr class="nanumgothic-bold">

						<td class="view_board_tableMiddle" >
						<p class="none_style">
							날짜
						</p></td>
						<td class="view_board_tableMiddle" >
						<p class="none_style">
							시간
						</p></td>
						<td class="view_board_tableLow border_right height_24" >
						<p class="none_style">
							강의실
						</p></td>

					</tr>
					<tr style="height:49px;">
						<td>
							<?foreach($get_list as $it){?>
								<?
								if (($list['subject']) == ($it -> subject_id)) {echo $it -> subject;
								} else {
								}
							?>
							<?} ?>
							<!--
								<input type='edit' name='subject' id="subject" style="border:0px; height:62px; margin:0px; padding:0px"/>
							-->						
						</td>
						<td>						
							<?echo $list['reason']; ?>	
						</td>
						<td>
							<?echo substr($list['date'], 0, 4);
							echo '년 ';
							echo substr($list['date'], 5, 2);
							echo '월 ';
							echo substr($list['date'], 8, 2);
							echo '일';
						?>
						</td>
						<td>
 							<?echo substr($list['time'], 0, 3);
							echo substr($list['time'], 3, 2);
							echo ' ';
							echo substr($list['time'], 5, 1);
							echo ' ';
							echo substr($list['time'], 6, 3);
							echo substr($list['time'], 9, 2);
						?>           
						<td>
							<?if($list['classroom'] == "none"){?>
								<p class="none_style" style="color:red;">관리자 입력<br/>튜터 입력 불가</p>
							<?}else{ ?>
								<p class="none_style" style="color:red;"><?echo $list['classroom']; ?></p>
							<?} ?>
						</td>
					</tr>
				</table>
			<div>
				<p class="view_board_submit nanumgothic-bold">
					위와 같이 보강계획을 제출합니다.
				</p>
			</div>

<!--if user_id == admin -->
<div class="view_board_button_area">
<input type="button" value="취소" onclick="javascript:window.location.href = 'http://<?echo base_url(); ?>index.php<?echo $view_name?>'"/>
<?if(($login_data['user_id'] == $list['user_id']) || ($login_data['grade']==1)){?>
<input type="button" value="수정" onclick=window.location.href="/index.php/lesson/enrichment_study/update_board?req_id=<?echo $list['board_id']?>">
<input type="button" value="삭제" onclick=window.location.href="/index.php<?echo $view_name?>/delete_board?req_id=<?echo $list['board_id']?>"/>

<!--<a href="/index.php<?echo $view_name?>/update_board?req_id=<?echo $list['board_id']?>">수정하기</a>
<a href="/index.php<?echo $view_name?>/delete_board?req_id=<?echo $list['board_id']?>">삭제하기</a>-->
<?}else{} ?>
</div>
