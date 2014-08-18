

//------------ 근무일지 글쓰기 폼체크

function confirming_daily_journal_write(){
		
		var defaultIndex = 0;
		//제목 확인
		var text_title = document.getElementById("text_title").value;

		if ( text_title == "" ){
			alert('제목을 입력하세요');
		}
		//제목확인 후 시간 체크
		else{
			var selIndex_time1 = document.getElementById("time1").selectedIndex;
			var selValue_time1 = document.getElementById("time1").options[selIndex_time1].innerHTML;
			var selValue_default_time1 = document.getElementById("time1").options[defaultIndex].innerHTML;

			if ( selValue_time1 == selValue_default_time1 ){
				alert('튜터링 가능 시간을 선택하세요');
			}
			//시간 체크
			else{
				var selIndex_time2 = document.getElementById("time2").selectedIndex;
				var selValue_time2 = document.getElementById("time2").options[selIndex_time2].innerHTML;
				var selValue_default_time2 = document.getElementById("time2").options[defaultIndex].innerHTML;

				if ( selValue_time2 == selValue_default_time2 ){
					alert('튜터링 가능 시간을 선택하세요');
				}
				//시간 체크
				else{
					var selIndex_time3 = document.getElementById("time3").selectedIndex;
					var selValue_time3 = document.getElementById("time3").options[selIndex_time3].innerHTML;
					var selValue_default_time3 = document.getElementById("time3").options[defaultIndex].innerHTML;						

					if ( selValue_time3 == selValue_default_time3 ){
						alert('튜터링 가능 시간을 선택하세요');
					}
					//시간 체크
					else{
						var selIndex_time4 = document.getElementById("time4").selectedIndex;
						var selValue_time4 = document.getElementById("time4").options[selIndex_time4].innerHTML;
						var selValue_default_time4 = document.getElementById("time4").options[defaultIndex].innerHTML;						
	
						if ( selValue_time4 == selValue_default_time4 ){
							alert('튜터링 가능 시간을 선택하세요');
						}
						else{
							var classroom = document.getElementById('classroom').value;
	
							if ( classroom == ""){
								alert('튜터링 장소를 입력하세요');
							}
							//경력사항 체크 후 지원동기 체크
							else {
								var member_number = document.getElementById('member_number').value;
		
								if ( member_number == ""){
									alert('인원을 입력하세요');
								}
								else {
									var activity = document.getElementById('activity').value;
			
									if ( activity == ""){
										alert('활동내용을 입력하세요');
									}
									else {
										var note = document.getElementById('note').value;
				
										if ( note == ""){
											alert('비고를 입력하세요');
										}
										//Submit
										else {
											//daily_form() 함수 호출
											daily_form();
										}
									}		
								}
							}
						}
					}
				}
			}
		}
	}
// ---------------------------------보강신청 글쓰기 확인
function confirming_enrichment_study_write_board(){
		
		var defaultIndex = 0;
		//제목 확인
		var text_title = document.getElementById("text_title").value;
		var subject = document.getElementById("subject").value;
		var reason = document.getElementById("reason").value;
		if ( text_title == "" ){
			alert('제목을 입력하세요');
		}
		//제목확인 후 과목 체크
		else{
			if ( subject == "" ){
			alert('보강사유를 입력하세요');
		}
			
			//제목확인 후 시간 체크
			var selIndex_subject = document.getElementById("subject").selectedIndex;
			var selValue_subject = document.getElementById("subject").options[selIndex_subject].innerHTML;
			var selValue_default_subject = document.getElementById("subject").options[defaultIndex].innerHTML;

			if ( selValue_subject == selValue_default_subject ){
				alert('튜터링 과목을 선택하세요');
			}
			else{
				var selIndex_time1 = document.getElementById("time1").selectedIndex;
				var selValue_time1 = document.getElementById("time1").options[selIndex_time1].innerHTML;
				var selValue_default_time1 = document.getElementById("time1").options[defaultIndex].innerHTML;
	
				if ( selValue_time1 == selValue_default_time1 ){
					alert('튜터링 가능 시간을 선택하세요');
				}
				//시간 체크
				else{
					var selIndex_time2 = document.getElementById("time2").selectedIndex;
					var selValue_time2 = document.getElementById("time2").options[selIndex_time2].innerHTML;
					var selValue_default_time2 = document.getElementById("time2").options[defaultIndex].innerHTML;
	
					if ( selValue_time2 == selValue_default_time2 ){
						alert('튜터링 가능 시간을 선택하세요');
					}
					//시간 체크
					else{
						var selIndex_time3 = document.getElementById("time3").selectedIndex;
						var selValue_time3 = document.getElementById("time3").options[selIndex_time3].innerHTML;
						var selValue_default_time3 = document.getElementById("time3").options[defaultIndex].innerHTML;						
	
						if ( selValue_time3 == selValue_default_time3 ){
							alert('튜터링 가능 시간을 선택하세요');
						}
						//시간 체크
						else{
							var selIndex_time4 = document.getElementById("time4").selectedIndex;
							var selValue_time4 = document.getElementById("time4").options[selIndex_time4].innerHTML;
							var selValue_default_time4 = document.getElementById("time4").options[defaultIndex].innerHTML;						
		
							if ( selValue_time4 == selValue_default_time4 ){
								alert('튜터링 가능 시간을 선택하세요');
							}
							//Submit
							else {
								//daily_form() 함수 호출
								en_daily_form();
								}
							}		
						}
					}
				}
			}
		}
