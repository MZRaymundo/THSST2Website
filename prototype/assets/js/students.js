$(document).ready(function(){

	$('#btn-dropdown-schools').on('click', showHideSchoolList);
	$('.item-school').on('click', setSchoolNameAndStudents);

	//change tabs
	$('.student-list').on('click', '.list-item', retrieveStudentDetails);


});

function retrieveStudentDetails(){
	//alert($(this).text());

	var student_name = $(this).text();
	 $.ajax({
	 	url: "students/get_selected_student_details",
	 	dataType: 'json',
	 	type: 'GET',
	 	data:{student_name: student_name},
	 	success: function(output_string){
	 		console.log(output_string);

	 		$('.student-info-container').html("");
	 		$('.student-info-container').append(
	 			"<label class='student-name'>" + output_string[0]['FULLNAME'] + "</label>" + 
				"<label class='student-bday'>BIRTHDAY: " + output_string[0]['col_student_birthday'] + "</label>" + 
				"<label class='student-age'>AGE		: " + output_string[0]['col_student_age'] + "</label>" + 
				"<label class='student-sex'>SEX		: " + output_string[0]['col_student_sex'] + "</label>"
			);	 		
	 	},
	 	error: function(output_string){
	 		console.log(output_string);
	 	}
	});
}

function showHideSchoolList(){
	 //for UI purposes
	 if($('.school-list').height() === 0){
	 	$(this).css("background-image", "url(assets/images/btn-up-hover.png)");
	 	$(this).hover(function(){
        	$(this).css("background-image", "url(assets/images/btn-up.png)");
        }, function(){
        	$(this).css("background-image", "url(assets/images/btn-up-hover.png)");
    	});

		$('.school-list').animate({height: "93%"});
		$('.school-list').css("overflow-y", "auto");
	 }
	 else{
	 	$(this).css("background-image", "url(assets/images/btn-down-hover.png)");
	 	$(this).hover(function(){
        	$(this).css("background-image", "url(assets/images/btn-down.png)");
        }, function(){
        	$(this).css("background-image", "url(assets/images/btn-down-hover.png)");
    	});	

    	$('.school-list').animate({height: "0px"});
		$('.school-list').css("overflow-y", "hidden");
	 }

}

function setSchoolNameAndStudents(){
	$('.header-item').text($(this).text());

	//UI
	$('#btn-dropdown-schools').css("background-image", "url(assets/images/btn-down-hover.png)");
	$('#btn-dropdown-schools').hover(function(){
    	$(this).css("background-image", "url(assets/images/btn-down.png)");
    }, function(){
    	$('#btn-dropdown-schools').css("background-image", "url(assets/images/btn-down-hover.png)");
	});	

	$('.school-list').animate({height: "0px"});
	$('.school-list').css("overflow-y", "hidden");


	//ajax part for list of students
	//retrieving students in school
	var school_name = $(this).text();

	 $.ajax({
	 	url: "students/get_selected_school_students",
	 	dataType: 'json',
	 	type: 'GET',
	 	data:{school_name: school_name},
	 	success: function(output_string){
	 		console.log(output_string);

	 		$('.student-list').html("");
	 		
	 		for(i=0; i<output_string.count_school_students; i++){
	 			if(output_string.school_students[i]['col_student_suffix'] != null){
	 				$('.student-list').append(
			 				"<div class='list-item  item-student'><label class='list-student-name'>" + output_string.school_students[i]['col_student_fname'] + " " + output_string.school_students[i]['col_student_mname'] + " " + output_string.school_students[i]['col_student_lname'] + " " + output_string.school_students[i]['col_student_suffix'] + "</label></div>"
			 			);
	 			}	
	 			else{
	 				$('.student-list').append(
		 					"<div class='list-item  item-student'><label class='list-student-name'>" + output_string.school_students[i]['col_student_fname'] + " " + output_string.school_students[i]['col_student_mname'] + " " + output_string.school_students[i]['col_student_lname'] + "</label></div>"
		 				);
	 			}
	 		}	 		
	 	},
	 	error: function(output_string){
	 		console.log(output_string);
	 	}
	});
}