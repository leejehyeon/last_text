<div class="col-xs-8">
	    <table class="notice_view_board">
	    	<tr>
	    		<td>
	    			제목
	    		</td>
	    		<td colspan=3>
		            <?=$list['subject'] ?>		
	    		</td>    		
	    	</tr>
	    	<tr>
	    		<td>
	    			작성자	
	    		</td>
	    		<td>
	    			<?=$list['user_name'] ?>
	    		</td>
	    		<td>
	    			등록일
	    		</td>
	    		<td>
	    			<?=substr(($list['reg_date']),0,10)?>
	    		</td>
	    	</tr>
	    	<tr>
	    		<td colspan=4 class="view_board_textarea" >
					<textarea readonly="readonly"><?=$list['contents'] ?></textarea>
	    		</td>    		
	    	</tr>
	    </table>

	    <div class="form-actions notice_view_footer">
			<a href="/index.php<?echo $view_name?>/<?echo $this -> uri -> segment(3);?>"><img src='/static/img/view_whole_notice_botton1.png'></a>
			<?if($login_data['grade'] == 1){?>
			<a href="/index.php<?echo $view_name?>/update_board?req_id=<?echo $list['board_id']?>"><img src='/static/img/view_whole_notice_botton2.png'></a>
			<form name="delete_board" method="post" action="/index.php<?echo $view_name?>/delete_board?req_id=<?echo $list['board_id']?>">
			<input type="button" value="삭제" onclick="checkagain()"/>
			</form>
			<?}else{}?>
	    </div>    
<!--
	<div class = "row">
    <div class = "col-xs-2"><p class ="notice_detail_p">제목</p></div>
    <div class = "col-xs-10" ><p class ="notice_detail_p"><?=$list['subject'] ?></p></div>
</div>
<div class = "row" style="padding: 1% 0 ;">
    <div class = "col-xs-2"><p class ="notice_detail_p">등록일</p></div>
    <div class = "col-xs-4"><p class ="notice_detail_p"><?=substr(($list['reg_date']),0,10)?></p></div>

    <div class = "col-xs-2"><p class ="notice_detail_p">작성자</p></div>
    <div class = "col-xs-4"><p class ="notice_detail_p"><?=$list['user_name'] ?></p></div>
</div>
<div class = "row">
    <div class = "col-xs-2"><p class ="notice_detail_p">내용</p></div>
    <div class = "col-xs-10"><p class ="notice_detail_p" style="height:300px"><?=$list['contents'] ?></p></div>
</div>
<!--if user_id == admin -->
<!--
<div>
	<a href="/index.php<?echo $view_name?>/<?echo $this -> uri -> segment(3);?>">목록</a>
</div>


<?if($login_data['grade'] == 1){?>
<a href="/index.php<?echo $view_name?>/update_board?req_id=<?echo $list['board_id']?>">수정하기</a>
<form name="delete_board" method="post" action="/index.php<?echo $view_name?>/delete_board?req_id=<?echo $list['board_id']?>">
<input type="button" value="삭제하기" onclick="checkagain()"/>
</form>
<?}else{}?>
-->
</div>
