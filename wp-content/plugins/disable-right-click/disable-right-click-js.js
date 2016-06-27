jQuery(document).ready(function($) {
    jQuery("#dialog-message").dialog({
        modal: true,
        autoOpen: false,
        width: 450,
        show: { effect: "fadeIn", duration: 500 },
        hide: { effect: "fadeOut", duration: 500 },
        buttons: {
            Ok: function() {
                jQuery( this ).dialog( "close" );
            }
        }
    });

    jQuery(document).bind("contextmenu",function(e){
        jQuery("#dialog-message" ).dialog( "open" );
        return false;
    });

});
