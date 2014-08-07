<!--<script language="javascript">
  var YY = 2000;
  var MM = 1; 
  var DD = 1;
  
  function makeSel(tgt,fr,to,def) {
    var cnt = 0;
    var f = document.leap;
    
    f.elements[tgt].options.length=0;
    var str='';
    
    for ( var i=fr; i<=to; i++){     
      newItem=new Option(cnt);
      f.elements[tgt].options[cnt]=newItem;
      f.elements[tgt].options[cnt].text=i;
      f.elements[tgt].options[cnt].value=i;
      
      if(i==def) {
        f.elements[tgt].options[cnt].selected=true;
      }
      cnt++;
    }  
  }
 function init() {
  makeSel('p_sYear',YY-1,YY+4,YY);
  makeSel('p_sMonth',1,12,MM); 
  chk();
 }
 function chk(){
  var f = document.leap;
  
  var sdate = new Date(f.p_sYear.value,f.p_sMonth.value,0);
  var slastDay = sdate.getDate();
  
  var edate = new Date(f.p_eYear.value,f.p_eMonth.value,0);
  var elastDay = edate.getDate();
  
  makeSel('p_sDay',1,slastDay,DD);
  makeSel('p_eDay',1,elastDay,elastDay);
 } 
 
 init();
	/*
	 function getDaysOfMonth() {
	 //var year = document.year.value;
	 var year = 2014;
	 var mon = document.leap.month.value;
	 if (mon == 2) {
	 if (year % 4 == 0) {
	 if (year % 100 == 0) {
	 if (year % 400 == 0)
	 return 29;
	 else
	 return 28;
	 } else
	 return 29;
	 } else
	 return 28;
	 }
	 if (mon == 4 || mon == 6 || mon == 9 || mon == 11)
	 return 30;
	 else
	 return 31;
	 }

	 /*function day_change() {
	 var day = rgetDaysOfMonth();
	 for (var i = 1; i <= day; i++) {
	 document.leap.day.options[i].text = i;
	 }
	 }*/
	/*
	 function day_visible() {
	 var day = rgetDaysOfMonth();
	 for (var i = 29; i <= 31; i++) {
	 if(i <= day){
	 /*if (document.leap.day.option[i].value == i)*/
	/*		return 'visible';
	 }
	 else
	 return 'none';
	 }
	 }*/
</script>-->
<div class="col-xs-9">
	<form action='/index.php/lesson/enrichment_study/reinforce' method='post' name='leap'>
		<fieldset>
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
						<input type='edit' name='subject' id="subject" style="border:0px; height:62px; margin:0px; padding:0px"/>
						</td>
						<td style="border:1px solid #000000">						<textarea name='reason' style="border:0px; height:62px; margin:0px; padding:0px"></textarea></td>
						<td style="border:1px solid #000000;">
							<!--<input type='text' name='year' id='year' style="width:60px;">-->
							<!--수정시작
							<select name="p_sYear" onchange=chk()>
								수정끝-->
							<select name="year" id="year" onchange=month_day_set()>
								<option>년</option>
								<option value="2014">2014</option>
								<option value="2015">2015</option>
								<option value="2016">2016</option>
								<option value="2017">2017</option>
								<option value="2018">2018</option>
								<option value="2019">2019</option>
								<option value="2020">2020</option>
								<option value="2021">2021</option>
								<option value="2022">2022</option>
								<option value="2023">2023</option>
								<option value="2024">2024</option>
							</select> 년
      						<select name="month" id="month" onchange=day_set()><option>년을 선택해주세요</option></select> 월
        						<select name="day" id="day"><option>년을 선택해주세요</option></select> 일
							<!--<select name="month" onchange= "day_change();" style="width:60px;">
								<option value="">월</option>
								<option value="1">1월</option>
								<option value="2">2월</option>
								<option value="3">3월</option>
								<option value="4">4월</option>
								<option value="5">5월</option>
								<option value="6">6월</option>
								<option value="7">7월</option>
								<option value="8">8월</option>
								<option value="9">9월</option>
								<option value="10">10월</option>
								<option value="11">11월</option>
								<option value="12">12월</option>
							</select>
							<select name="day" style="width:60px;">
								<option value="">일</option>
								<option value="1" >1일</option>
								<option value="2" >2일</option>
								<option value="3" >3일</option>
								<option value="4" >4일</option>
								<option value="5" >5일</option>
								<option value="6" >6일</option>
								<option value="7" >7일</option>
								<option value="8" >8일</option>
								<option value="9" >9일</option>
								<option value="10" >10일</option>
								<option value="11" >11일</option>
								<option value="12" >12일</option>
								<option value="13" >13일</option>
								<option value="14" >14일</option>
								<option value="15" >15일</option>
								<option value="16" >16일</option>
								<option value="17" >17일</option>
								<option value="18" >18일</option>
								<option value="19" >19일</option>
								<option value="20" >20일</option>
								<option value="21" >21일</option>
								<option value="22" >22일</option>
								<option value="23" >23일</option>
								<option value="24" >24일</option>
								<option value="25" >25일</option>
								<option value="26" >26일</option>
								<option value="27" >27일</option>
								<option value="28" >28일</option>
								<option value="29" style="display:day_visible();">29일</option>
								<option value="30" style="display:day_visible();">30일</option>
								<option value="31" style="display:display_visible();">31일</option>
							</select>--></td>
						<td style="border:1px solid #000000;">
						<select name="startTime" style="width:90px;" >
							<option value="">시작시간</option>
							<option value="9">09:00</option>
							<option value="10">10:00</option>
							<option value="11">11:00</option>
							<option value="12">12:00</option>
							<option value="13">13:00</option>
							<option value="14">14:00</option>
							<option value="15">15:00</option>
							<option value="16">16:00</option>
							<option value="17">17:00</option>
							<option value="18">18:00</option>
							<option value="19">19:00</option>
							<option value="20">20:00</option>
							<option value="21">21:00</option>
							<option value="22">22:00</option>
							<option value="23">23:00</option>
							<option value="24">00:00</option>

						</select><span> ~ </span>
						<select name="endTime" style="width:90px;" >
							<option value="">종료시간</option>
							<option value="9">09:00</option>
							<option value="10">10:00</option>
							<option value="11">11:00</option>
							<option value="12">12:00</option>
							<option value="13">13:00</option>
							<option value="14">14:00</option>
							<option value="15">15:00</option>
							<option value="16">16:00</option>
							<option value="17">17:00</option>
							<option value="18">18:00</option>
							<option value="19">19:00</option>
							<option value="20">20:00</option>
							<option value="21">21:00</option>
							<option value="22">22:00</option>
							<option value="23">23:00</option>
							<option value="24">00:00</option>
						</select></td>
						<td style="border:1px solid #000000; height:62px; width:100px"></td>
					</tr>
					<tr>
						<td style="font-size:10px; padding-top:20px"><?php echo form_error("subject"); ?></td>
						<td style="font-size:10px; padding-top:20px"><?php echo form_error("reason"); ?></td>
						<td style="font-size:10px; padding-top:20px"><?php echo form_error("month");
							echo form_error("day");
						?></td>
						<td style="font-size:10px; padding-top:20px"><?php echo form_error("startTime");
							echo form_error("endTime");
						?></td>
						<td style="font-size:10px; padding-top:20px"><?php echo form_error("classroom"); ?></td>
					</tr>
				</table>
			</div>
			<div>
				<p style="text-align:center">
					위와 같이 보강계획을 제출합니다.
				</p>
			</div>
			<div style="text-align:right">
				<input type='submit' value="제출하기">
			</div>
		</fieldset>
	</form>
</div>