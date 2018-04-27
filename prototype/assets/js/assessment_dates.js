var item_id_tobe_deleted = "";

$(document).ready(function(){
	// setCurrent
	$('.main-container').scrollTop();

	//DateAndTime();
	$("#btn-cancel").click(hideOverlay);

	$('.btn-alter').on('click', showHideAlterButtons);
	//$('.student-list').on('click', '.list-item', retrieveStudentDetails);

	$('.btn-delete').on('click', deleteAssessmentWarning);
	$('#btn-add').on('click', showAssessmentFormForAdd);
	$('#btn-add').on('click', displayAddAssessmentButton);

	$('.btn-edit').on('click', showAssessmentFormForEdit);
	$('.btn-edit').on('click', displayEditAssessmentButton);

	$('#btn-no').on('click', hideOverlay);
	$('#btn-yes').on('click', deleteAssessment);

	$('#submit-btn-add-assessment').on('click', addAssessment);
	$('#submit-btn-edit-assessment').on('click', editAssessment);

	$("#select-month").on('click', setDaysInMonth);
	$("#select-year").on('click', setDaysInMonth);
});

function displayAddAssessmentButton(){
	$('#submit-btn-edit-assessment').hide();
	$('#submit-btn-add-assessment').show();
}

function displayEditAssessmentButton(){
	$('#submit-btn-edit-assessment').show();
	$('#submit-btn-add-assessment').hide();
}

function addAssessment(){
	var year 	= $("#select-year").val();
	var month 	= parseInt($("#select-month").val());
	var day 	= parseInt($("#select-day").val());
	var hour 	= $("#select-hour").val();
	var min 	= $("#select-min").val();

	if($("#select-am-pm").val() === "p.m.")
		hour = parseInt( $("#select-hour").val()) + 12;
		
	
	var school = $("#select-name-of-school").val();
	var assessment_date = year + '-' + month + '-' + day + ' ' + hour + ':' + min;
	//assessment_date = assessment_date.toISOString().replace('Z', '+08:00.000'); ->UTC Format

//	alert(school + " " + assessment_date);
	hideOverlay();
	
	$.ajax({
	 	url: "assessment_dates/addAssessment",
	 	dataType: 'json',
	 	type: 'GET',
	 	data:{school: school,
	 		  assessment_date: assessment_date},
	 	success: function(output_string){
	 	//	console.log(output_string);
	 //		alert("SUCCESS!" + output_string);

	 	},
	 	error: function(output_string){
	 		//console.log(output_string);
	 		//alert("FAILED!");

	 	}
	});

}

function deleteAssessmentWarning(){
	$('.overlay').show();
	$('#overlay-delete-assessment').show();

	$('#overlay-add-assessment').hide();

	item_id_tobe_deleted = this.id;
	//alert(item_id_tobe_deleted);
}

function showAssessmentFormForAdd(){
	$('.overlay').show();
	$('#overlay-add-assessment').show();
	$('#overlay-delete-assessment').hide();	
	setCurrentDateAndTime();
}

function showAssessmentFormForEdit(){
	setCurrentDateAndTime();

	$('.overlay').show();
	$('#overlay-add-assessment').show();
	$('#overlay-delete-assessment').hide();	
	
	var alter_id = this.id.split("_");
	var date = alter_id[0].split("-");
	item_id_tobe_deleted = alter_id[1];

	$("#select-month").val(date[1]).change();
	$("#select-day").val(date[2]).change();
	$("#select-year").val(date[0]).change();


	var school_name = $('.assessment-sched-details').children('.assessment-sched-container-school-name').html();
	var time = $('.assessment-sched-details').children('assessment-sched-container-time').html();
	var password = $('.assessment-sched-details').children('assessment-sched-container-password').html();
	

	$("#select-name-of-school").val(school_name).change();

	 // $("#select-hour").val(hour).change();
	  //$("#select-min").val(min).change();
	 // $("#select-am-pm").val(am_pm).change();
}

function editAssessment(){
	deleteAssessment();
	addAssessment();
}

function deleteAssessment(){
	 $.ajax({
	 	url: "assessment_dates/deleteAssessment",
	 	dataType: 'json',
	 	type: 'GET',
	 	data:{item_id_tobe_deleted: item_id_tobe_deleted},
	 	success: function(output_string){
	 		console.log(output_string);

	 		var assessment_sched_id = "#assessment-num-"+ item_id_tobe_deleted;
	 		$(assessment_sched_id).remove();
	 		hideOverlay();

	 	},
	 	error: function(output_string){
	 		console.log(output_string);
	 	}
	});
}

function showHideAlterButtons(){

	var className = "#alter-container-" + $(this).attr('id');

	if($(className).width() === 0){
		$(this).css("background-image", "url(assets/images/btn-left-hover.png)");
	 	$(this).hover(function(){
        	$(this).css("background-image", "url(assets/images/btn-left.png)");
        	$(this).css("background-color", "#ddd");
        }, function(){
        	$(this).css("background-image", "url(assets/images/btn-left-hover.png)");
        	$(this).css("background-color", "rgba(64, 64, 64, 1)");
    	});

    	$(className).animate({width: "125px"});
		//$('.assessment-sched-alter-buttons').animate({width: "125px"});
	 }
	 else{
	 	$(this).css("background-image", "url(assets/images/btn-right-hover.png)");
	 	$(this).hover(function(){
        	$(this).css("background-image", "url(assets/images/btn-right-hover.png)");
        	$(this).css("background-color", "rgba(64, 64, 64, 1)");
        }, function(){
        	$(this).css("background-image", "url(assets/images/btn-right.png)");
        	$(this).css("background-color", "#ddd");
    	});
    	
    	$(className).animate({width: "0px"});
    	//$('.assessment-sched-alter-buttons').animate({width: "0px"});
	 }
}


function hideOverlay(){
	$(".overlay").hide();	
	$('#overlay-delete-assessment').hide();
	$('#overlay-add-assessment').hide();
}


function setDaysInMonth(){
	var daysInMonth = new Date($("#select-year :selected").text(), $("#select-month :selected").text(), 0).getDate();

	$("#select-day").html("");

	for(i=0; i<daysInMonth; i++){
		$("#select-day").append("<option value ="+ (i+1) +">"+ (i+1) + "</option>");	
	}
}

function setCurrentDateAndTime(){
	var date = new Date();

	var year = date.getFullYear();
	var day = date.getDate();
	var month = date.getMonth() + 1;
	var hour = date.getHours();
	var min = date.getMinutes();
	var am_pm = "";

	var daysInMonth = new Date(year, month, 0).getDate();

	if(hour > 12){
		am_pm = "p.m.";
		hour -= 12;
	}
	else{
		am_pm = "a.m.";
		if(hour === 0)
			hour = 12;
	}

	for(i=0; i<12; i++){
		$("#select-month").append("<option value ="+ (i+1) +">"+ (i+1) + "</option>");
	}


	for(i=0; i<daysInMonth; i++){
		$("#select-day").append("<option value ="+ (i+1) +">"+ (i+1) + "</option>");	
	}

	for(i=year; i<year+20; i++){
		$("#select-year").append("<option value ="+ (i) +">"+ (i) + "</option>");
	}

	for(i=0; i<12; i++){
		$("#select-hour").append("<option value ="+ (i+1) +">"+ (i+1) + "</option>");
	}

	for(i=0; i<59; i++){
		$("#select-min").append("<option value ="+ (i+1) +">"+ (i+1) + "</option>");
	}


//	var daysInMonth = new Date(year, month, 0).getDate();


	$("#select-month").val(month).change();
	$("#select-day").val(day).change();
	$("#select-year").val(year).change();

	$("#select-hour").val(hour).change();
	$("#select-min").val(min).change();
	$("#select-am-pm").val(am_pm).change();
}

