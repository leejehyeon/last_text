<div class="col-xs-7">
	<div class = "row">
    <div class = "col-xs-2"><p class ="notice_detail_p">제목</p></div>
    <div class = "col-xs-10" ><p class ="notice_detail_p"><?=$list['subject_title'] ?></p></div>
</div>
<div class = "row" style="padding: 1% 0 ;">
    <div class = "col-xs-2"><p class ="notice_detail_p">등록일</p></div>
    <div class = "col-xs-4"><p class ="notice_detail_p"><?=substr(($list['reg_date']),0,10)?></p></div>

    <div class = "col-xs-2"><p class ="notice_detail_p">작성자</p></div>
    <div class = "col-xs-4"><p class ="notice_detail_p"><?=$list['user_name'] ?></p></div>
</div>
<div class = "row">
   <div>
				<p style="font-size:18px; text-align:center">
					<strong>보　강　계　획　서</strong>
				</p>
			</div>
			<div style="text-align:center">
				<table style="margin:0px 0px 20px 0px">
					<tr>
						<td rowspan="2" style="background-color:RGB(127,127,127); border:1px solid #000000">
						<p>
							<strong>교 과 목 명</strong>
						</p></td>
						<td rowspan="2" style="background-color:RGB(127,127,127);border:1px solid #000000">
						<p>
							<strong>보 강 사 유</strong>
						</p></td>
						<td colspan="3" style="background-color:RGB(127,127,127); border:1px solid #000000">
						<p style="margin:5px;">
							<strong>보 강 계 획</strong>
						</p></td>
					</tr>
					<tr>

						<td style="background-color:RGB(127,127,127);border:1px solid #000000;">
						<p style="margin:5px; width:150px;">
							<strong>날짜</strong>
						</p></td>
						<td style="background-color:RGB(127,127,127);border:1px solid #000000;">
						<p style="margin:5px; width:220px;">
							<strong>시간</strong>
						</p></td>
						<td style="background-color:RGB(127,127,127);border:1px solid #000000; width:100px;">
						<p style="margin:5px; width:100px">
							<strong>강의실</strong>
						</p></td>

					</tr>
					<tr>
						<td style="border:1px solid #000000">
							<?foreach($get_list as $it){?>
								<?if(($list['subject']) == ($it -> subject_id)){echo $it -> subject;}else{}?>
							<?}?>
							<!--
								<input type='edit' name='subject' id="subject" style="border:0px; height:62px; margin:0px; padding:0px"/>
							-->						
						</td>
						<td style="border:1px solid #000000">						
							<?echo $list['reason'];?>	
						</td>
						<td style="border:1px solid #000000;">
							<?echo substr($list['date'], 0, 4);echo '년 ';echo substr($list['date'], 5, 2);echo '월 ';echo substr($list['date'], 8, 2);echo '일';?>
						</td>
						<td style="border:1px solid #000000;">
 							<?echo substr($list['time'], 0, 3);echo substr($list['time'], 3, 2);echo ' ';echo substr($list['time'], 5, 1);echo ' ';echo substr($list['time'], 6, 3);echo substr($list['time'], 9, 2);?>           
						<td style="border:1px solid #000000; height:62px; width:100px">
							<?if($list['classroom'] == "none"){?>
								<p style="color:red;">관리자 입력<br/>튜터 입력 불가</p>
							<?}else{?>
								<p style="color:red;"><?echo $list['classroom'];?></p>
							<?}?>
						</td>
					</tr>
				</table>
			</div>
			<div>
				<p style="text-align:center">
					위와 같이 보강계획을 제출합니다.
				</p>
			</div>
</div>

<!--if user_id == admin -->
<div class = "row">
    <div class = "col-xs-offset-2"></div><div class="col-xs-9" style="margin-top: 1%; ">
    	<input type="button" value="뒤로가기" onclick="javascript:window.location.href = 'http://<?echo base_url();?>index.php<?echo $view_name?>'"/>
</div>
<?if(($login_data['user_id'] == $list['user_id']) || ($login_data['grade']==1)){?>
<a href="/index.php<?echo $view_name?>/update_board?req_id=<?echo $list['board_id']?>">수정하기</a>
<a href="/index.php<?echo $view_name?>/delete_board?req_id=<?echo $list['board_id']?>">삭제하기</a>
<?}else{}?>
</div>
