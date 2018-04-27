$(document).ready(function(){

	$(".btn-nav").mouseenter(displayText);
	$(".btn-nav").mouseleave(hideText);


	function displayText(){
		if(this.id === "btn-search")
			$("#lbl-search").show();
		else if(this.id === "btn-assessment")
			$("#lbl-assessment").show();
		else if(this.id === "btn-school")
			$("#lbl-school").show();
		else if(this.id === "btn-student")
			$("#lbl-student").show();
	}

	function hideText(){
		$(".lbl-nav").hide();	
	}

});