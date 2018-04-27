$(document).ready(function(){

	$('.list-item').on('click', retrieveSchoolDetails);

	$('.student-list').on('click', '.student-list-container', gotoStudentPage);
});

function gotoStudentPage(){
		
}

function retrieveSchoolDetails(){
	// for ui purposes
	$('.list-item').css('background-color', 'white');
	$(this).css('background-color', '#ddd');
	$('.school-details-container').css('display', 'inline-block');
				
	//retrieving from database using ajax
	var school_name = $(this).text();

	//retrieving school name and address
	$.ajax({
			url: "schools/get_selected_school_details",
			dataType: 'json',
			type: 'GET',
			data:{school_name: school_name},
			success: function(output_string){
				$('.school-name').text(output_string.school_name);
				$('.school-address').text(output_string.school_address);
			},
			error: function(output_string){
				console.log(output_string);
			}
		});

	//retrieving students in school
	 $.ajax({
	 	url: "schools/get_selected_school_students",
	 	dataType: 'json',
	 	type: 'GET',
	 	data:{school_name: school_name},
	 	success: function(output_string){
	 		console.log(output_string);

	 		$('.student-list').html("");

	 		for(i=0; i<output_string.count_school_students; i++){
	 			if(output_string.school_students[i]['col_student_suffix'] != null){
	 				$('.student-list').append(
			 				"<div class='student-list-container'>" +
								"<div class='item-info student-name'>" + output_string.school_students[i]['col_student_fname'] + " " + output_string.school_students[i]['col_student_mname'] + " " + output_string.school_students[i]['col_student_lname'] + " " + output_string.school_students[i]['col_student_suffix'] +  "</div>" +
								"<div class='item-info student-bday'>1997-01-01</div>" +
								"<div class='item-info student-age'>21</div>" +
								"<div class='item-info student-sex'>F</div>" +
							"</div>"
			 			);
	 			}	
	 			else{
	 				$('.student-list').append(
	 				"<div class='student-list-container'>" +
						"<div class='item-info student-name'>" + output_string.school_students[i]['col_student_fname'] + " " + output_string.school_students[i]['col_student_mname'] + " " + output_string.school_students[i]['col_student_lname'] + "</div>" +
						"<div class='item-info student-bday'>" + output_string.school_students[i]['col_student_birthday'] + "</div>" +
						"<div class='item-info student-age'>" + output_string.school_students[i]['col_student_age'] + "</div>" +
						"<div class='item-info student-sex'>" + output_string.school_students[i]['col_student_sex'] + "</div>" +
					"</div>"
	 			);
	 			}
	 		}

	 		
	 	},
	 	error: function(output_string){
	 		console.log(output_string);
	 	}
	});
}