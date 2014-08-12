function update_reply(id){
	var update_reply_form = "update_reply_form_" + id;
	var update_reply = "update_reply_" + id;
	if (document.getElementById(update_reply_form).style.display == 'none') {
		document.getElementById(update_reply).style.display = 'none';
		document.getElementById(update_reply_form).style.display = '';
	} else {
		document.getElementById(update_reply).style.display = '';
		document.getElementById(update_reply_form).style.display = 'none';
	}
}

function reply_form(id){
	var reply_form = "reply_form_" + id;
	if (document.getElementById(reply_form).style.display == 'none') {
		document.getElementById(reply_form).style.display = '';
	} else {
		document.getElementById(reply_form).style.display = 'none';
	}
}

function tutee(){
		alert('로그인이 필요합니다.');
		window.location="/index.php/login_process/login";
}

function tutee_login(id , id2){
		if((id == "O")&&(id2 == "none")){
			window.location="/index.php/tutor_tutee_application/tutee";
		}else if(id == "X"){
			alert('지원기간이 아닙니다.');
		}else{
			alert('이미 등록하셨습니다. 마이페이지에서 수정,확인 하실 수 있습니다.');
		}
}

function tutor(){
		alert('로그인이 필요합니다.');
		window.location="/index.php/login_process/login";
}

function tutor_login(id , id2){
		if((id == "O")&&(id2 == "none")){
			window.location="/index.php/tutor_tutee_application/tutor";
		}else if(id == "X"){
			alert('지원기간이 아닙니다.');
		}else{
			alert('이미 등록하셨습니다. 마이페이지에서 수정,확인 하실 수 있습니다.');
		}
		
}

function grade_isset(grade){
	if(grade == "1"){
		alert('관리자는 지원하실 수 없습니다.');
	}else if(grade == "2"){
		alert('계급이 튜터이므로 지원하실 수 없습니다.');
	}else if(grade == "3"){
		alert('계급이 튜티이므로 지원하실 수 없습니다.');
	}
}

function selectMatch(select){
	var form = select.form;
	var value = select[select.selectedIndex].value;
	form.elements.user_email2.value = form.elements[value].value;
}


//yes no 여부 물어보는 script yes면 폼전송 no면 nothing 
function checkagain(){
	if (confirm('정말로 삭제하시겠습니까?')) {
		delete_board.submit();
	} else {
		
	}
}

function checkdelete(){
	if (confirm('정말로 삭제하시겠습니까?')) {
		var email = document.getElementById('user_email1').value+'@'+document.getElementById('user_email2').value;
		document.getElementById('user_email').value = email;
		delete_member.submit();
	} else {
		
	}
}

// 클릭시 모든 체크박스 체크하기
$(document).ready(function(){
	$('#total').click(function(){
		if ($("#total").is(":checked")) { 
		$('input:checkbox[id^=test[]]:not(checked)').attr("checked", true); 
		} else { 
		$('input:checkbox[id^=test[]]:checked').attr("checked", false); 
		} 
			
	}); 
});

function daily_form(){
	var date = document.getElementById('year').value+'-'+document.getElementById('month').value+'-'+document.getElementById('day').value;
	var tutortime = document.getElementById('time1').value+':'+document.getElementById('time2').value+'~'+document.getElementById('time3').value+':'+document.getElementById('time4').value
	document.getElementById('date').value = date;
	document.getElementById('tutor_time').value = tutortime;
	day_form.submit();
}

function en_daily_form(){
	var date = document.getElementById('year').value+'-'+document.getElementById('month').value+'-'+document.getElementById('day').value;
	var time = document.getElementById('time1').value+':'+document.getElementById('time2').value+'~'+document.getElementById('time3').value+':'+document.getElementById('time4').value
	document.getElementById('date').value = date;
	document.getElementById('time').value = time;
	day_form.submit();
}

function sign_form(){
	var phonenumber = document.getElementById('user_phonenumber1').value+' - '+document.getElementById('user_phonenumber2').value+' - '+document.getElementById('user_phonenumber3').value;
	var email = document.getElementById('user_email1').value+'@'+document.getElementById('user_email2').value
	document.getElementById('user_phonenumber').value = phonenumber;
	document.getElementById('user_email').value = email;
	insert_form.submit();
}

function modify(){
	var phonenumber = document.getElementById('user_phonenumber1').value+' - '+document.getElementById('user_phonenumber2').value+' - '+document.getElementById('user_phonenumber3').value;
	var email = document.getElementById('user_email1').value+'@'+document.getElementById('user_email2').value
	document.getElementById('user_phonenumber').value = phonenumber;
	document.getElementById('user_email').value = email;
	update_form.submit();
}

function rating(){
	for(i=1;i<=5;i++){
		var user_subject = "user_subject"+i;
		var user_grade_choose = "user_grade_choose"+i;
		var user_grade = "user_grade"+i;
		if((document.getElementById(user_subject).value == "선택하세요") || (document.getElementById(user_grade_choose).value == "선택하세요")){
			var grade = "";
			document.getElementById(user_grade).value = grade;
		}else{
			var grade = document.getElementById(user_subject).value+'/'+document.getElementById(user_grade_choose).value;
			document.getElementById(user_grade).value = grade;
		}
	}
		grade_form.submit();
}

//테이블을 엑셀로 바꾸어주는 함수 
var tableToExcel = (function(){
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()

function dynamicSelect(id1, id2){
 	if (document.getElementById && document.getElementsByTagName) {
  		var sel1 = document.getElementById(id1);
  		var sel2 = document.getElementById(id2);
  		var clone = sel2.cloneNode(true);
  		var clonedOptions = clone.getElementsByTagName("option");
  		refreshDynamicSelectOptions(sel1, sel2, clonedOptions);
  		sel1.onchange = function() {
   			refreshDynamicSelectOptions(sel1, sel2, clonedOptions);
  		};
 	}
}

function refreshDynamicSelectOptions(sel1, sel2, clonedOptions){
 	while (sel2.options.length) {
  		sel2.remove(0);
 	}
 	var pattern1 = /( |^)(select)( |$)/;
 	var pattern2 = new RegExp("( |^)(" + sel1.options[sel1.selectedIndex].value + ")( |$)");
 	for (var i = 0; i < clonedOptions.length; i++) {
  		if (clonedOptions[i].className.match(pattern1) || clonedOptions[i].className.match(pattern2)) {
  		 	sel2.appendChild(clonedOptions[i].cloneNode(true));
  		}
 	}
}

function addLoadEvent(func){
  var oldonload = window.onload;
  if (typeof window.onload != 'function') {
    window.onload = func;
  } else {
    window.onload = function() {
      if (oldonload) {
        oldonload();
      }
      func();
    }
  }
}
//-------테이블을 엑셀로 바꾸어주는 함수 


addLoadEvent(function(){
	dynamicSelect("user_subject1", "user_divide1");
});
addLoadEvent(function(){
	dynamicSelect("user_subject2", "user_divide2");
});
addLoadEvent(function(){
	dynamicSelect("user_subject3", "user_divide3");
});
addLoadEvent(function(){
	dynamicSelect("user_subject4", "user_divide4");
});
addLoadEvent(function(){
	dynamicSelect("user_subject5", "user_divide5");
});
addLoadEvent(function(){
	dynamicSelect("user_subject6", "user_divide6");
});
addLoadEvent(function(){
	dynamicSelect("user_subject7", "user_divide7");
});
addLoadEvent(function(){
	dynamicSelect("user_subject8", "user_divide8");
});
addLoadEvent(function(){
	dynamicSelect("user_subject9", "user_divide9");
});
addLoadEvent(function(){
	dynamicSelect("user_subject10", "user_subject10");
});
addLoadEvent(function(){
	dynamicSelect("user_subject11", "user_subject11");
});
addLoadEvent(function(){
	dynamicSelect("user_subject12", "user_subject12");
});
addLoadEvent(function(){
	dynamicSelect("user_subject13", "user_subject13");
});
addLoadEvent(function(){
	dynamicSelect("user_subject14", "user_subject14");
});
addLoadEvent(function(){
	dynamicSelect("user_subject15", "user_subject15");
});
addLoadEvent(function(){
	dynamicSelect("user_subject16", "user_subject16");
});
addLoadEvent(function(){
	dynamicSelect("user_subject17", "user_subject17");
});
addLoadEvent(function(){
	dynamicSelect("user_subject18", "user_subject18");
});
addLoadEvent(function(){
	dynamicSelect("user_subject19", "user_subject19");
});
addLoadEvent(function(){
	dynamicSelect("user_subject20", "user_subject20");
});




function getmonth(date){
	 var month = document.getElementById('month').value;
	 var url = "/index.php/lesson/my_attendance/"+date.value+"/"+month;
     window.location.href = url;
}

function getyear(date){
	 var year = document.getElementById('year').value;
	 var url = "/index.php/lesson/my_attendance/"+year+"/"+date.value;
     window.location.href = url;
}

function journalgetmonth(date){
	 var month = document.getElementById('month').value;
	 var url = "/index.php/lesson/daily_journal_admin/"+date.value+"/"+month;
     window.location.href = url;
}

function journalgetyear(date){
	 var year = document.getElementById('year').value;
	 var url = "/index.php/lesson/daily_journal_admin/"+year+"/"+date.value;
     window.location.href = url;
}

function dailygetmonth(date){
	 var month = document.getElementById('month').value;
	 var url = "/index.php/lesson/daily_journal/"+date.value+"/"+month;
     window.location.href = url;
}

function dailygetyear(date){
	 var year = document.getElementById('year').value;
	 var url = "/index.php/lesson/daily_journal/"+year+"/"+date.value;
     window.location.href = url;
}

function change_year_value(date){
	 var day = document.getElementById('day').value;
	 
	 document.getElementById('year').value = year.value;
	 var url = "/index.php/lesson/attendance_record/"+date.value+"/"+month+"/"+day;
     window.location.href = url;
}

function change_month_value(date){
	 var day = document.getElementById('day').value;
	 var year = document.getElementById('year').value;
	 document.getElementById('month').value = date.value;
	 var url = "/index.php/lesson/attendance_record/"+year+"/"+date.value+"/"+day;
     window.location.href = url;
}

function change_day_value(date){
	 var year = document.getElementById('year').value;
	 var month = document.getElementById('month').value;
	 document.getElementById('day').value = date.value;
	 var url = "/index.php/lesson/attendance_record/"+year+"/"+month+"/"+date.value;
     window.location.href = url;
}

function change_day(month){
	 var year = document.getElementById("last_day_of_month").selectedIndex;
	 var year_data = document.getElementsByTagName("option")[year].value;
	 var month_data = month.value;
	 var day = new Date(year_data, month_data, 0).getDate();
	 return day;
}

// ajax 수업 -> 출석부 기능
function showtutee(subject){
     var year = document.getElementById('year').value;
	 var month = document.getElementById('month').value;
	 var day = document.getElementById('day').value;
	 var form_url = "/index.php/lesson/get_user_by_divide/"+year+"/"+month+"/"+day;
	  if (subject=="") {
	    document.getElementById("txtHint").innerHTML="";
	    return;
	  } 
	  if (window.XMLHttpRequest) {
	    // code for IE7+, Firefox, Chrome, Opera, Safari
	    xmlhttp=new XMLHttpRequest();
	  } else { // code for IE6, IE5
	    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange=function() {
	    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
	    }
	  }
	  xmlhttp.open('POST',form_url,true);
	  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xmlhttp.send("subject=" + subject);
	  
}

// ajax 수업 -> 근무일지 관리
function showdaily(subject){
     var year = document.getElementById('year').value;
	 var month = document.getElementById('month').value;
	 var form_url = "/index.php/lesson/daily_journal_admin_tutorlist/"+year+"/"+month;
	  if (subject=="") {
	    document.getElementById("txtHint").innerHTML="";
	    return;
	  } 
	  if (window.XMLHttpRequest) {
	    // code for IE7+, Firefox, Chrome, Opera, Safari
	    xmlhttp=new XMLHttpRequest();
	  } else { // code for IE6, IE5
	    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange=function() {
	    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
	    }
	  }
	  xmlhttp.open('POST',form_url,true);
	  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xmlhttp.send("subject=" + subject);
	  
}

//------------ ajax 수업 -> 출석부 기능


function tutor_daily_journal(user_name){
	var user_id = document.getElementById(user_name).value;
	document.getElementById('user_id').value = user_id;
	id_form.submit();
}


function register_form(attendance){
	document.getElementById('attendance').value = attendance;
	register.submit();
}

//------------ 튜티 지원서 확인
	
function confirming_tutee_application(){

		var defaultIndex = 0;
		//지원 과목 확인
		var selIndex_subject = document.getElementById("user_subject").selectedIndex;
		var selValue_subject = document.getElementById("user_subject").options[selIndex_subject].innerHTML;
		var selValue_default_subject = document.getElementById("user_subject").options[defaultIndex].innerHTML;

		if ( selValue_subject == selValue_default_subject ){
			alert('과목을 선택하세요');
			return false;
		}
		//과목화인 후 분반 체크
		else{
			var selIndex_divide = document.getElementById("user_divide").selectedIndex;
			var selValue_divide = document.getElementById("user_divide").options[selIndex_divide].innerHTML;
			var selValue_default_divide = document.getElementById("user_divide").options[defaultIndex].innerHTML;

			if ( selValue_divide == selValue_default_divide ){
				alert('분반을 선택하세요');
				return false;
			}
			//분반 체크 후 난이도 체크
			else{
				var selIndex_level = document.getElementById("user_level").selectedIndex;
				var selValue_level = document.getElementById("user_level").options[selIndex_level].innerHTML;
				var selValue_default_level = document.getElementById("user_level").options[defaultIndex].innerHTML;

				if ( selValue_level == selValue_default_level ){
					alert('난이도를 선택하세요');
					return false;
				}
				//난이돋 체크 후 고등학교 구분 체크
				else{
					var selIndex_hs_division = document.getElementById("user_hs_division").selectedIndex;
					var selValue_hs_division = document.getElementById("user_hs_division").options[selIndex_hs_division].innerHTML;
					var selValue_default_hs_division = document.getElementById("user_hs_division").options[defaultIndex].innerHTML;
					
					if ( selValue_hs_division == selValue_default_hs_division ){
						alert('고등학교 구분을 선택하세요');
						return false;
					}
					//고등학교 구분 체크 후 고등학교 계열 체크
					else{
						var selIndex_hs_application = document.getElementById("user_hs_application").selectedIndex;
						var selValue_hs_application = document.getElementById("user_hs_application").options[selIndex_hs_application].innerHTML;
						var selValue_default_hs_application = document.getElementById("user_hs_application").options[defaultIndex].innerHTML;
						if ( selValue_hs_application == selValue_default_hs_application ){
							alert('고등학교 계열을 선택하세요');
							return false;					
						}
						//고등학교 계열 체크 후 시간 체크
						else {
							var selIndex_time = document.getElementById("user_time").selectedIndex;
							var selValue_time = document.getElementById("user_time").options[selIndex_time].innerHTML;
							var selValue_default_time = document.getElementById("user_time").options[defaultIndex].innerHTML;						

							if ( selValue_time == selValue_default_time ){
								alert('튜티 시간을 선택하세요');
								return false;
							}
							//시간 체크 후 글쓰기 박스 체크
							else {
								var user_content_application = document.getElementById('user_content_application').value;

								if ( user_content_application == ""){
									alert('지원동기 및 목표를 입력하세요')
									return false;
								}
								else	
									return true;
							}
						}		
					}
				}
			}
		}
// Function 종료	
}

//------------ 튜터 지원서 확인
	
function confirming_tutor_application(){
		
		var defaultIndex = 0;
		//지원 과목 확인
		var selIndex_subject = document.getElementById("user_subject").selectedIndex;
		var selValue_subject = document.getElementById("user_subject").options[selIndex_subject].innerHTML;
		var selValue_default_subject = document.getElementById("user_subject").options[defaultIndex].innerHTML;

		if ( selValue_subject == selValue_default_subject ){
			alert('과목을 선택하세요');
		}
		//지원 과목확인 후 지원 분야 체크
		else{
			var selIndex_subject1 = document.getElementById("user_subject1").selectedIndex;
			var selValue_subject1 = document.getElementById("user_subject1").options[selIndex_subject1].innerHTML;
			var selValue_default_subject1 = document.getElementById("user_subject1").options[defaultIndex].innerHTML;

			if ( selValue_subject1 == selValue_default_subject1 ){
				alert('지원 분야를 선택하세요');
			}
			//지원 분야 체크 후 성적 체크
			else{
				var selIndex_grade_choose1 = document.getElementById("user_grade_choose1").selectedIndex;
				var selValue_grade_choose1 = document.getElementById("user_grade_choose1").options[selIndex_grade_choose1].innerHTML;
				var selValue_default_grade_choose1 = document.getElementById("user_grade_choose1").options[defaultIndex].innerHTML;

				if ( selValue_grade_choose1 == selValue_default_grade_choose1 ){
					alert('지원 분야 성적을 선택하세요');
				}
				//성적 체크 후 시간 체크
				else{
					var selIndex_time = document.getElementById("user_time").selectedIndex;
					var selValue_time = document.getElementById("user_time").options[selIndex_time].innerHTML;
					var selValue_default_time = document.getElementById("user_time").options[defaultIndex].innerHTML;						

					if ( selValue_time == selValue_default_time ){
						alert('튜터 시간을 선택하세요');
					}
					//시간 체크 후 경력사항 체크
					else{
						var user_career = document.getElementById('user_career').value;

						if ( user_career == ""){
							alert('경력사항을 입력하세요')
						}
						//경력사항 체크 후 지원동기 체크
						else {
							var user_content_application = document.getElementById('user_content_application').value;
	
							if ( user_content_application == ""){
								alert('지원동기를 입력하세요')
							}
							//Submit
							else {
								//rating() 함수 호출
								rating();
							}
						}		
					}
				}
			}
		}
}

function write_form_check(){
	if(document.getElementById('subject').value == ""){
		alert('제목을 입력하시오');
	}else if(document.getElementById('contents').value == ""){
		alert('내용을 입력하세요');
	}else{
		write_form.submit();		
	}
//	document.write_form.contents.value = document.write_form.contents.value.replace(/\n/gi,'<br//>');		
}

//보강신청 년도 선택시 해당 년도의 1월 1일로 select box 세팅
function month_day_set(){
  var set = document.day_form;
  var date = new Date(set.year.value,set.month.value,0);
  var lastDay = date.getDate();
  makeOption('month',1,12,1);
  makeOption('day',1,lastDay,1);
}

//보강신청 월 선택시 해당 월의 1일로 select box 세팅
function day_set(){
  var set = document.day_form;
  var date = new Date(set.year.value,set.month.value,0);
  var lastDay = date.getDate();
  makeOption('day',1,lastDay,1);
}

//보강신청 년, 월, 일 select box의 option list 생성
function makeOption(list,first,last,init) {
    var count = 0;
    var set = document.day_form;
    
    set.elements[list].options.length=0;
    var str='';
    //해당 select box의 option text, value 설정
    for ( var i=first; i<=last; i++){     
      newItem = new Option(count);
      set.elements[list].options[count]=newItem;
      set.elements[list].options[count].text=i;
      set.elements[list].options[count].value=i;
      
      if(i==init) {
        set.elements[list].options[count].selected=true;
      }
      count++;
    }  
}

// Function 종료	


//change menu 
function Change_menu(){
	var changer;
	var changer_child_ul;
	changer = document.getElementById('Header_top_nav').children;

	var changer_length =changer.length;
	for(var i=1; i<changer_length; i++ ){
		changer[i].className = "Change_menulength dropdown";
	}
}

function goto_login(){
	alert('로그인이 필요합니다.');
}
function goto_apply(){
	alert('튜터 혹은 튜티를 지원하세요.');
}
function Change_Pagination(){
	var changer;
	changer = document.getElementById('Pagination').children;

	var i = changer.length-3;
	
	changer[i].style.backgroundImage = "none";
}
function Change_Pagination_class(){
	var changer_class;
	changer_class = document.getElementById('Pagination_class').children;

	var j = changer_class.length-3;
	
	changer_class[j].style.backgroundImage = "none";
}

function resize(obj) {
  obj.style.height = "1px";
  obj.style.height = (20+obj.scrollHeight)+"px";
}

$(document).ready(function() {
  $('.view_board_textarea').on( 'keyup', 'textarea', function (e){
    $(this).css('height', 'auto' );
    $(this).height( this.scrollHeight );
  });
  $('.view_board_textarea').find( 'textarea' ).keyup();
});

function Main_Notice_Margin(){
		var table	= document.getElementById('Main_Notice_Table');
		var tl = table.getElementsByTagName("tr").length;
		
		if(tl == 1){
			var row1 = table.insertRow(1);
			var row2 = table.insertRow(2);
			var row3 = table.insertRow(3);

			var cell1_1 = row1.insertCell(0);
			var cell1_2 = row1.insertCell(1);
			var cell2_1 = row2.insertCell(0);
			var cell2_2 = row2.insertCell(1);
			var cell3_1 = row3.insertCell(0);
			var cell3_2 = row3.insertCell(1);
			
			cell1_1.innerHTML = "";
			cell1_2.innerHTML = "";
			cell2_1.innerHTML = "";
			cell2_2.innerHTML = "";
			cell3_1.innerHTML = "";
			cell3_2.innerHTML = "";
			
			cell1_1.style.backgroundImage = "none";			
			cell1_1.style.border = "none";			
			cell1_2.style.border = "none";
			cell2_1.style.backgroundImage = "none";			
			cell2_1.style.border = "none";			
			cell2_2.style.border = "none";
			cell3_1.style.backgroundImage = "none";			
			cell3_1.style.border = "none";			
			cell3_2.style.border = "none";
		}
		else if(tl == 2){
			var row2 = table.insertRow(2);
			var row3 = table.insertRow(3);

			var cell2_1 = row2.insertCell(0);
			var cell2_2 = row2.insertCell(1);
			var cell3_1 = row3.insertCell(0);
			var cell3_2 = row3.insertCell(1);
			
			cell2_1.innerHTML = "";
			cell2_2.innerHTML = "";
			cell3_1.innerHTML = "";
			cell3_2.innerHTML = "";			

			cell2_1.style.backgroundImage = "none";			
			cell2_1.style.border = "none";			
			cell2_2.style.border = "none";
			cell3_1.style.backgroundImage = "none";			
			cell3_1.style.border = "none";			
			cell3_2.style.border = "none";
		}
		else if(tl == 3){
			var row3 = table.insertRow(3);

			var cell3_1 = row3.insertCell(0);
			var cell3_2 = row3.insertCell(1);
			
			cell3_1.innerHTML = "";
			cell3_2.innerHTML = "";						

			cell3_1.style.backgroundImage = "none";			
			cell3_1.style.border = "none";			
			cell3_2.style.border = "none";
		}
}
function Main_Notice_Margin2(){
		var table	= document.getElementById('Main_Notice_Table2');
		var tl = table.getElementsByTagName("tr").length;
		
		if(tl == 1){
			var row1 = table.insertRow(1);
			var row2 = table.insertRow(2);
			var row3 = table.insertRow(3);

			var cell1_1 = row1.insertCell(0);
			var cell1_2 = row1.insertCell(1);
			var cell2_1 = row2.insertCell(0);
			var cell2_2 = row2.insertCell(1);
			var cell3_1 = row3.insertCell(0);
			var cell3_2 = row3.insertCell(1);
			
			cell1_1.innerHTML = "";
			cell1_2.innerHTML = "";
			cell2_1.innerHTML = "";
			cell2_2.innerHTML = "";
			cell3_1.innerHTML = "";
			cell3_2.innerHTML = "";
			
			cell1_1.style.backgroundImage = "none";			
			cell1_1.style.border = "none";			
			cell1_2.style.border = "none";
			cell2_1.style.backgroundImage = "none";			
			cell2_1.style.border = "none";			
			cell2_2.style.border = "none";
			cell3_1.style.backgroundImage = "none";			
			cell3_1.style.border = "none";			
			cell3_2.style.border = "none";
		}
		else if(tl == 2){
			var row2 = table.insertRow(2);
			var row3 = table.insertRow(3);

			var cell2_1 = row2.insertCell(0);
			var cell2_2 = row2.insertCell(1);
			var cell3_1 = row3.insertCell(0);
			var cell3_2 = row3.insertCell(1);
			
			cell2_1.innerHTML = "";
			cell2_2.innerHTML = "";
			cell3_1.innerHTML = "";
			cell3_2.innerHTML = "";			

			cell2_1.style.backgroundImage = "none";			
			cell2_1.style.border = "none";			
			cell2_2.style.border = "none";
			cell3_1.style.backgroundImage = "none";			
			cell3_1.style.border = "none";			
			cell3_2.style.border = "none";
		}
		else if(tl == 3){
			var row3 = table.insertRow(3);

			var cell3_1 = row3.insertCell(0);
			var cell3_2 = row3.insertCell(1);
			
			cell3_1.innerHTML = "";
			cell3_2.innerHTML = "";						

			cell3_1.style.backgroundImage = "none";			
			cell3_1.style.border = "none";			
			cell3_2.style.border = "none";
		}
}
/*
//select send value
$(document).ready(function(){
 
//Initializing arrays with city names
var list1 = [];
 
var list2 = [
 {display: "1분반", value: "1분반" },
 {display: "2분반", value: "2분반" },
 {display: "3분반", value: "3분반" },
 {display: "4분반", value: "4분반" },
 {display: "5분반", value: "5분반" },
 {display: "6분반", value: "6분반" }];
 
var list3 = [
 {display: "1분반", value: "1분반" },
 {display: "2분반", value: "2분반" },
 {display: "3분반", value: "3분반" },
 {display: "4분반", value: "4분반" },
 {display: "5분반", value: "5분반" },
 {display: "6분반", value: "6분반" }];

var list4 = [
 {display: "1분반", value: "1분반" },
 {display: "2분반", value: "2분반" },
 {display: "3분반", value: "3분반" },
 {display: "4분반", value: "4분반" },
 {display: "5분반", value: "5분반" },
 {display: "6분반", value: "6분반" }];

var list5 = [
 {display: "1분반", value: "1분반" },
 {display: "2분반", value: "2분반" }];
 
var list6 = [
 {display: "1분반", value: "1분반" },
 {display: "2분반", value: "2분반" }];

var list7 = [
 {display: "1분반", value: "1분반" },
 {display: "2분반", value: "2분반" }];

var list8 = [
 {display: "1분반", value: "1분반" },
 {display: "2분반", value: "2분반" }];

var list9 = [
 {display: "1분반", value: "1분반" },
 {display: "2분반", value: "2분반" },
 {display: "3분반", value: "3분반" },
 {display: "4분반", value: "4분반" },
 {display: "5분반", value: "5분반" },
 {display: "6분반", value: "6분반" },
 {display: "7분반", value: "7분반" },
 {display: "8분반", value: "8분반" },
 {display: "9분반", value: "9분반" },
 {display: "10분반", value: "10분반" }];
 
var list10 = [
 {display: "1분반", value: "1분반" },
 {display: "2분반", value: "2분반" },
 {display: "3분반", value: "3분반" },
 {display: "4분반", value: "4분반" },
 {display: "5분반", value: "5분반" },
 {display: "6분반", value: "6분반" },
 {display: "7분반", value: "7분반" },
 {display: "8분반", value: "8분반" },
 {display: "9분반", value: "9분반" },
 {display: "10분반", value: "10분반" }];
 
var list11 = [
 {display: "1분반", value: "1분반" },
 {display: "2분반", value: "2분반" }];

var list12 = [
 {display: "1분반", value: "1분반" },
 {display: "2분반", value: "2분반" }];

var list13 = [
 {display: "1분반", value: "1분반" },
 {display: "2분반", value: "2분반" }];

var list14 = [
 {display: "1분반", value: "1분반" },
 {display: "2분반", value: "2분반" }];

var list15 = [
 {display: "1분반", value: "1분반" },
 {display: "2분반", value: "2분반" },
 {display: "3분반", value: "3분반" },
 {display: "4분반", value: "4분반" },
 {display: "5분반", value: "5분반" },
 {display: "6분반", value: "6분반" }];

var list16 = [
 {display: "1분반", value: "1분반" },
 {display: "2분반", value: "2분반" }];

var list17 = [
 {display: "1분반", value: "1분반" },
 {display: "2분반", value: "2분반" },
 {display: "3분반", value: "3분반" },
 {display: "4분반", value: "4분반" },
 {display: "5분반", value: "5분반" },
 {display: "6분반", value: "6분반" }];
//Function executes on change of first select option field
$("#user_subject1").change(function(){
 
var select = $("#user_subject1 option:selected").val();
 
switch(select){
case "1":
 user_divide1(list1);
break;
 
case "2":
 user_divide1(list2);
break;
 
case "3":
 user_divide1(list3);
break;

case "4":
 user_divide1(list4);
break;

case "5":
 user_divide1(list5);
break;

case "6":
 user_divide1(list6);
break;

case "7":
 user_divide1(list7);
break;

case "8":
 user_divide1(list8);
break;

case "9":
 user_divide1(list9);
break;

case "10":
 user_divide1(list10);
break;

case "11":
 user_divide1(list11);
break;

case "12":
 user_divide1(list12);
break;

case "13":
 user_divide1(list13);
break;

case "14":
 user_divide1(list13);
break;

case "15":
 user_divide1(list13);
break;

case "16":
 user_divide1(list13);
break;

case "17":
 user_divide1(list13);
break;

default:
 $("#user_divide1").empty();
 $("#user_divide1").append("<option>선택하세요</option>");
break;
}
});
 
//Function To List out Cities in Second Select tags
function user_divide1(arr){
 $("#user_divide1").empty();//To reset cities
 $("#user_divide1").append("<option>선택하세요</option>");
 $(arr).each(function(i){//to list cities
 $("#user_divide1").append("<option value=\""+arr[i].value+"\">"+arr[i].display+"</option>")
 }); 
}
 
});
*/

