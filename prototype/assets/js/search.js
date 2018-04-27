$(document).ready(function(){
	//initializing shizz
	$('#btn-filter-all').css('background-color', 'rgba(64, 64, 64, 1)');
	$('#btn-filter-all').css('border-color', 'rgba(64, 64, 64, 1)');
	$('#btn-filter-all').css('color', 'white');
	$('#input-item').focus();

	$('.btn-filter').on('click', filterResults);
	$('#btn-school').on('click', filterResultsSchools);
	$('#btn-student').on('click', filterResultsStudents);

	//for searching ajax
	$('#btn-search-bar').on('click', retrieveItems);
	$('#btn-filter-all').on('click', retrieveItems);

	//sorting
	$("#radio-asc").on('click', sortAscendingOrder);
	$("#radio-desc").on('click', sortDescendingOrder);

});

function sortAscendingOrder(){
	$("#radio-desc").prop('checked', false);

    $('.search-item-container').sort(function(a, b) {
	  if (a.textContent < b.textContent) {
	    return -1;
	  } else {
	    return 1;
	  }
	}).appendTo('.search-items');
}

function sortDescendingOrder(){
	$("#radio-asc").prop('checked', false);

	$('.search-item-container').sort(function(a, b) {
	  if (a.textContent > b.textContent) {
	    return -1;
	  } else {
	    return 1;
	  }
	}).appendTo('.search-items');
}

function retrieveItems(){
	//ajax part for list of searched items
	//retrieving students in school
	var searched_item = $('#input-item').val();
	 $.ajax({
	 	url: "search/retrieveItems",
	 	dataType: 'json',
	 	type: 'GET',
	 	data:{searched_item: searched_item},
	 	success: function(output_string){
	 		console.log(output_string);

	 		$('.search-items').html("");

	 		if(output_string.count_search_results === 0)
	 			$('.search-items').append("Sorry. We can't find what you are looking for...");

	 		else{
		 		 for(i=0; i<output_string.count_search_results; i++){

		 		 		$('.search-items').append(
				 				"<div class='search-item-container' id=" + i +">" +
									"<div class='search-item-container-name'>" + output_string.search_results[i]['RESULTS'] + "</div>" + 
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

function filterResults(){
	$('.btn-filter').css('background-color', 'white');
	$('.btn-filter').css('background-color', 'white');
	$('.btn-filter').css('color', 'rgba(64, 64, 64, 1)');
	
	$('#btn-school').css('background-image', 'url(assets/images/btn-school.png)');
	$('#btn-student').css('background-image', 'url(assets/images/btn-student.png)');
	$('#btn-all')

	$(this).css('background-color', 'rgba(64, 64, 64, 1)');
	$(this).css('color', 'white');

	 if(this.id == 'btn-school')
	 	$(this).css('background-image', 'url(assets/images/btn-school-hover.png)');
	 else if(this.id == 'btn-student')
	 	$(this).css('background-image', 'url(assets/images/btn-student-hover.png)');

}

function filterResultsSchools(){
	var searched_item = $('#input-item').val();
	 $.ajax({
	 	url: "search/retrieveItems",
	 	dataType: 'json',
	 	type: 'GET',
	 	data:{searched_item: searched_item},
	 	success: function(output_string){
	 		console.log(output_string);

	 		$('.search-items').html("");

	 		if(output_string.count_search_results === 0)
	 			$('.search-items').append("Sorry. We can't find what you are looking for...");

	 		else{
		 		 for(i=0; i<output_string.count_search_results; i++){
		 		 	if(output_string.search_results[i]['IDENTIFIER'] === "School"){
		 		 		$('.search-items').append(
				 				"<div class='search-item-container' id=" + i +">" +
									"<div class='search-item-container-name'>" + output_string.search_results[i]['RESULTS'] + "</div>" + 
								"</div>"
				 			);
		 		 	}
		 		}
	 		}

	 		if($('#radio-asc').is(':checked')){
	 			sortAscendingOrder();
	 		}
	 		else
	 			sortDescendingOrder();
	 	},
	 	error: function(output_string){
	 		console.log(output_string);
	 	}
	});

}

function filterResultsStudents(){
	var searched_item = $('#input-item').val();
	 $.ajax({
	 	url: "search/retrieveItems",
	 	dataType: 'json',
	 	type: 'GET',
	 	data:{searched_item: searched_item},
	 	success: function(output_string){
	 		console.log(output_string);

	 		$('.search-items').html("");

	 		if(output_string.count_search_results === 0)
	 			$('.search-items').append("Sorry. We can't find what you are looking for...");

	 		else{
		 		 for(i=0; i<output_string.count_search_results; i++){
		 		 	if(output_string.search_results[i]['IDENTIFIER'] === "Student"){
		 		 		$('.search-items').append(
				 				"<div class='search-item-container' id=" + i +">" +
									"<div class='search-item-container-name'>" + output_string.search_results[i]['RESULTS'] + "</div>" + 
								"</div>"
				 			);
		 		 	}
		 		}
	 		}


	 		if($('#radio-asc').is(':checked')){
	 			sortAscendingOrder();
	 		}
	 		else
	 			sortDescendingOrder();
	 		
	 	},
	 	error: function(output_string){
	 		console.log(output_string);
	 	}
	});

}

