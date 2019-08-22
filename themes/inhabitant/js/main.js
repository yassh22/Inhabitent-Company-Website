    
    jQuery(document).ready(function($) {

		$(document).on("scroll", function() {
			if($(document).scrollTop() > 580) {
				$(".headerWrap").addClass("active");
			} else {
				$(".headerWrap").removeClass("active");
			}
        });

        
        
	});