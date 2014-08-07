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

function selectMatch(select){
	var form = select.form;
	var value = select[select.selectedIndex].value;
	form.elements.user_email2.value = form.elements[value].value;
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
	journal_form.submit();
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
		var grade = document.getElementById(user_subject).value+' '+document.getElementById(user_grade_choose).value;
		document.getElementById(user_grade).value = grade;
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
dynamicSelect("user_subject", "user_divide");
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

//보강신천 년도 선택시 해당 년도의 1월 1일로 select box 세팅
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

//------------ ajax 수업 -> 출석부 기능

function register_form(attendance){
	document.getElementById('attendance').value = attendance;
	register.submit();
}


//------------ Menu 5ea로 Change
/*
function Change_menu(){
	var changer;
	var changer_child_ul;
	changer = document.getElementById('Header_top_nav').children;

	var changer_length =changer.length;
	for(var i=1; i<changer_length; i++ ){
		changer[i].className = "Change_menulength dropdown";
	}
}
*/
// dropdown-menu _ hover
function image_hover(root) {
             mainimage.src = root;
            }
   
// map mouse_hover
/*function init(){
document.getElementsByTagName('area')[0].onmouseover=function(){
document.getElementById('mapA').src='/static/img/main_tutor_image_hover.png';
this.onmouseout=function() {
document.getElementById('mapA').src='/static/img/main_tutor_image.png';
}
}
document.getElementsByTagName('area')[1].onmouseover=function(){
document.getElementById('mapA').src='/static/img/main_tutor_image_hover.png';
this.onmouseout=function() {
document.getElementById('mapA').src='/static/img/main_tutor_image.png';
}
}
document.getElementsByTagName('area')[2].onmouseover=function(){
document.getElementById('mapB').src='/static/img/main_tutee_image_hover.png';
this.onmouseout=function() {
document.getElementById('mapB').src='/static/img/main_tutee_image.png';
}
}
document.getElementsByTagName('area')[3].onmouseover=function(){ 
document.getElementById('mapA').src='/static/img/main_tutor_image_hover.png';
this.onmouseout=function() {
document.getElementById('mapA').src='/static/img/main_tutor_image.png';
}
}
}

if(window.addEventListener){
window.addEventListener('load',init,false);
}
else { 
if(window.attachEvent){
window.attachEvent('onload',init);
}
}
*/

// 08.04
// Apply_image_change
function hover_apply_icon_tutor(img){
	img.src='/static/img/tutor_apply_icon_hover';
	img.onmouseout=function(){
		img.src='/static/img/tutor_apply_icon';
	}
}
function hover_apply_icon_tutee(img){
	img.src='/static/img/tutee_apply_icon_hover';
	img.onmouseout=function(){
		img.src='/static/img/tutee_apply_icon';
	}
}
}