/*-----------------------------------------------------------------------------------

 	Custom JS - All back-end jQuery
 
-----------------------------------------------------------------------------------*/
 
jQuery(document).ready(function() {
    
/*----------------------------------------------------------------------------------*/
/*	Portfolio Custom Fields Hide/Show
/*----------------------------------------------------------------------------------*/

    var portfolioTypeTrigger = jQuery('#tdl_port_type'),
		portfolioImage = jQuery(''),
        portfolioGallery = jQuery('#tdl-port-image'),
        portfolioVideo = jQuery('#tdl-port-video'),

        currentType = portfolioTypeTrigger.val();
        
    tdlSwitchPortfolio(currentType);

    portfolioTypeTrigger.change( function() {
       currentType = jQuery(this).val();
       
       tdlSwitchPortfolio(currentType);
    });
    
    function tdlSwitchPortfolio(currentType) {
        if( currentType === 'gallery' ) {
            tdlHideAllPortfolio(portfolioGallery);
        } else if( currentType === 'video' ) {
            tdlHideAllPortfolio(portfolioVideo);			
        } else {
            tdlHideAllPortfolio(portfolioImage);
        }
    }
    
    function tdlHideAllPortfolio(notThisOne) {
		portfolioImage.css('display', 'none');
		portfolioGallery.css('display', 'none');
		portfolioVideo.css('display', 'none');
		notThisOne.css('display', 'block');
	}




/*----------------------------------------------------------------------------------*/
/*	Image Options
/*----------------------------------------------------------------------------------*/

	var imageOptions = jQuery('#tdl-post-image');
	var imageTrigger = jQuery('#post-format-gallery');
	
	imageOptions.css('display', 'none');


/*----------------------------------------------------------------------------------*/
/*	Video Options
/*----------------------------------------------------------------------------------*/

	var videoOptions = jQuery('#tdl-post-video');
	var videoTrigger = jQuery('#post-format-video');
	
	videoOptions.css('display', 'none');

/*----------------------------------------------------------------------------------*/
/*	The Brain
/*----------------------------------------------------------------------------------*/

	var group = jQuery('#post-formats-select input');

	
	group.change( function() {
		
		if(jQuery(this).val() == 'gallery') {
			imageOptions.css('display', 'block');
			tdlHideAll(imageOptions);
			
			
		} else if(jQuery(this).val() == 'video') {
			videoOptions.css('display', 'block');
			tdlHideAll(videoOptions);
			
			
		} else {
			videoOptions.css('display', 'none');
			imageOptions.css('display', 'none');
		}
		
	});
	
		
	if(videoTrigger.is(':checked'))
		videoOptions.css('display', 'block');
		
	if(imageTrigger.is(':checked'))
		imageOptions.css('display', 'block');
		
	function tdlHideAll(notThisOne) {
		videoOptions.css('display', 'none');
		imageOptions.css('display', 'none');
		notThisOne.css('display', 'block');
	}

});