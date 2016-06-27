jQuery(document).ready(function($){
	
	$('body').on('click','.tdl-shortcode-generator',function(){
       
 
            $.magnificPopup.open({
                mainClass: 'mfp-zoom-in',
 	 		 	items: {
 	  	     		src: '#tdl-sc-generator'
  	        	},
  	         	type: 'inline',
                removalDelay: 500
	    }, 0);         
 
	}); 


});
