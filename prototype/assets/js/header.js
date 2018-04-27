$(document).ready(function(){
	$(".header-btn").mouseenter(displayText);
	$(".header-btn").mouseleave(hideText);


	function displayText(){
		if(this.id === "btn-profile")
			$("#lbl-profile").show();
		else if(this.id === "btn-logout")
			$("#lbl-logout").show();
	}

	function hideText(){
		$(".lbl-header").hide();	
	}
});