<div class="each_page">
	<form>
	<p style="float:left;margin:20px 0px 20px; 0px">과목 : 
		<label class="styled_select4">
			<select style="	width:154px;
							height:30px;
							border:solid 1px #bdbdbd;
						" id="subject_id" onChange="change_subject_id(this);">
				<?foreach($get_subject as $lt){
					if($lt ->subject_id == 1){
						continue;
					}
					if($lt -> subject_id == $this -> uri -> segment(3)){?>
						<option value="<?echo $lt -> subject_id;?>" selected><?echo $lt -> subject;?></option>
					<?}else{?>
						<option value="<?echo $lt -> subject_id;?>"><?echo $lt -> subject;?></option>
					<?}
					}?>
			</select>
		</label>
		</p>
</form>
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
						<a href="/index.php/question_and_answer/questioning_and_answering/<?echo $this -> uri ->segment(3)?>?req_id=<?echo $lt->board_id?>"><?echo $lt->subject;?></a>
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
				<div class="whole_notice_write">
					<a href="/index.php/question_and_answer/questioning_and_answering/write_board/<?echo $this -> uri -> segment(3);?>"><img src='/static/img/enrichment_study_write_botton.png'></a>
				</div>
				<div class="whole_notice_create_links">
					<?echo $this -> pagination -> create_links();?>
				</div>
</div>
</div>
