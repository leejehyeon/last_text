<div class="col-xs-8">
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
			<?
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
						<a href="/index.php/notice/whole_notice/<?echo $this -> uri ->segment(3)?>?req_id=<?echo $lt->board_id?>">
							<?if((strlen($lt->subject))>40){
									echo substr(($lt->subject), 0, 38);
									echo "...";
								}
								else{
									echo $lt->subject;
								}
							?>
						</a>
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
			?>
			
		</tbody>
	</table>
	
			<?if(($this->session->userdata('login_data')!=NULL)){
				if($login_data['grade']==1){?>
				<div class="whole_notice_write">
					<a href="/index.php/notice/whole_notice/write_board"><img src='/static/img/Notice_write_icon.png'></a>
				</div>
				<?}else{}
			}else{}
			?>
				<div class="whole_notice_create_links" id="Pagination">
					<?echo $this -> pagination -> create_links();
						echo("<script language='javascript'>Change_Pagination();</script>"); 										
					?>
				</div>
</div>
</div>
