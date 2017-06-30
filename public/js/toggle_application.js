jQuery(document).ready(function(){
    // Make list of ID's
    var ids = [];
    jQuery('#wrapperbb .content_right').each(function(){
        ids.push(jQuery(this).attr('id'));
    });
    var location = window.location + "";
    location = location.split("#");
    if(location.length >= 2){
        if(ids.indexOf('content_' + location[1]) >= 0)
            jQuery("#content_" + location[1]).show();
        else
            jQuery('#content_landing').show();
    } else {
        jQuery("#content_landing").show();
    }
    
    jQuery('.navbarIcon').click(function() {
      jQuery(".content_right").hide();
      var content = "#content_" + (jQuery(this).attr("href")).substring(1);
      jQuery(content).show();
    });

});
