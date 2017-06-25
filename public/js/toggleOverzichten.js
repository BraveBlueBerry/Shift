$(function() {
    $("#contentbb_overzicht").hide();
    $("#contentbb_teams").hide();
});

$(function(){
    $('#overzichtKnop').click(function() {
        $("#contentbb_landing").hide();
        $("#contentbb_teams").hide();
        $("#contentbb_overzicht").show();
    });
});

$(function(){
  $('#teamsKnop').click(function() {
      $("#contentbb_overzicht").hide();
      $("#contentbb_landing").hide();
      $("#contentbb_teams").show();
  });
});

$(function(){
    $('#landingsKnop').click(function() {
        $("#contentbb_overzicht").hide();
        $("#contentbb_teams").hide();
        $("#contentbb_landing").show();
    });
});
