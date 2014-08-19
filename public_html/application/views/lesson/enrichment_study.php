<div class="each_page" style="margin-top:37px">
	<table class="whole_notice">
		<thead>
			<tr>
				<th scope="col">번호</th>
				<th scope="col">제목</th>
				<th scope="col">작성자</th>
				<th scope="col">작성일</th>
				<th scope="col">조회수</th> 
			</tr>
		</thead>
		<tbody>
			<!--
				게시물 리스트를 불러운 개수만큼 자동으로 반복해서 뿌려준다.
			-->
			<?if($get_list_count == 0){?>
				<tr><td colspan="5">해당 게시물이 없습니다.</td></tr>
			<?}else{
				if($page<5){
				$id = $get_list_count;
			}else{
				$id = $get_list_count-$page;
			}
			foreach($list as $lt){
				?>
				<tr>
					<td scope="row">
						<? echo $id;?>
					</td>
					<td>
						<a href="/index.php<?echo $view_name?>?req_id=<? echo $lt->board_id?>"><? echo $lt->subject_title;?></a>
					</td>
					<td>
						<? echo $lt->user_name;?>
					</td>
					<td>
						<? echo substr(($lt->reg_date),0,10);?>
					</td>
					<td>
						<? echo $lt->hits;?>
					</td>
				</tr>
				<?
				$id--;
				}
			}
			?>
			
		</tbody>
		</table>
			<div class="whole_notice_write">
				<a href="/index.php/<?echo $view_name?>/write_board"><img src='/static/img/enrichment_study_write_botton.png'></a>
			</div>
			<div class="whole_notice_create_links" id='Pagination'>
				<?echo $this -> pagination -> create_links();
					echo("<script language='javascript'>Change_Pagination();</script>"); 					
				?>
			</div>
</div>

