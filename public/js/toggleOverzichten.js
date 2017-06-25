jQuery(function() {
    jQuery("#contentbb_overzicht").hide();
    jQuery("#contentbb_teams").hide();
});

jQuery(function(){
    jQuery('#overzichtKnop').click(function() {
        jQuery("#contentbb_landing").hide();
        jQuery("#contentbb_teams").hide();
        jQuery("#contentbb_overzicht").show();
    });
});

jQuery(function(){
  jQuery('#teamsKnop').click(function() {
      jQuery("#contentbb_overzicht").hide();
      jQuery("#contentbb_landing").hide();
      jQuery("#contentbb_teams").show();
  });
});

jQuery(function(){
    jQuery('#landingsKnop').click(function() {
        jQuery("#contentbb_overzicht").hide();
        jQuery("#contentbb_teams").hide();
        jQuery("#contentbb_landing").show();
    });
});
