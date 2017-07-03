
/*
-------------------------------------------------------------------------------------------------------------------------------------------------------
                    Toggle Application panes
-------------------------------------------------------------------------------------------------------------------------------------------------------
 */
jQuery(document).ready(function(){
    // Make list of ID's
    var ids = [];
    jQuery('#wrapperbb .content_right').each(function(){
        ids.push(jQuery(this).attr('id'));
    });
    var location = window.location + "";
    location = location.split("#");
    if(location.length >= 2){
        var loc = location[1].split('-');
        if(ids.indexOf('content_' + loc[0]) >= 0){
            jQuery("#content_" + loc[0]).show();
            var func = "onLoad_" + loc[0];
            try{
                if(loc.length > 1)
                    window[func](loc);
                else
                    window[func]();
            }
            catch(err){

            }
        }
        else{
            jQuery('#content_landing').show();
        }
    } else {
        jQuery("#content_landing").show();
    }

    jQuery(document).on('click', '.navbarIcon, .navbarLink', function() {
        if(jQuery(this).attr('href')){
            jQuery(".content_right").hide();
            var loc = (jQuery(this).attr("href")).substring(1).split('-');
            var content = "#content_" + loc[0];
            var func = "onLoad_" + loc[0];
            jQuery(content).show();
            try{
                if(loc.length > 1)
                    window[func](loc);
                else
                    window[func]();
            }
            catch(err){

            }
        }
    });
});

/*
-------------------------------------------------------------------------------------------------------------------------------------------------------
                    Toggle Left Menu
-------------------------------------------------------------------------------------------------------------------------------------------------------
 */
var plusmenu = false; // plusmenu is hidden
var usermenu = false; // usermenu is hidden

function togglePlusMenu() {
    if(plusmenu == false){
        hideUserMenu();
        jQuery('#navbarPlus').stop().show().animate({left:'0px'}, 250);
        plusmenu = true;
    }
    else{
        hidePlusMenu();
    }
}

function hidePlusMenu(){
    jQuery('#navbarPlus').stop().animate({left: '-200px'}, 250, function(){ jQuery('#navbarPlus').hide(); });
    plusmenu = false;
}

function toggleUserMenu() {
    if(usermenu == false){
        hidePlusMenu();
        jQuery('#navbarUser').stop().show().animate({left:'0px'}, 250);
        usermenu = true;
    } else {
        hideUserMenu();
    }
}

function hideUserMenu() {
    jQuery('#navbarUser').stop().animate({left: '-200px'}, 250, function(){ jQuery('#navbarUser').hide(); });
    usermenu = false;
}

/*
-------------------------------------------------------------------------------------------------------------------------------------------------------
                    Angular Controllers
-------------------------------------------------------------------------------------------------------------------------------------------------------
 */
var app = angular.module('Shift', []);
var active_team;
var member_to_be_deleted = 0;
app.controller('menuController', function($scope, $http) {
    $scope.logoutClick = function(event) {
        $http({
            method  :   "DELETE",
            url     :   API_HOST + "/token",
            headers :   {'token': getCookie('token')}
        }); /* Assume this always works */
        deleteCookie('token');
        window.location = '/inloggen';
    }
});
app.controller('teamController', function($scope, $http) {
    $scope.loaded = false;
    $scope.teams = [];
    $scope.members_active_team = [];
    $scope.active_team = {};
    $scope.team_to_be_deleted = false;
    $scope.member_to_be_deleted = false;

    $scope.makeTeam = function(event) {
        $http({
            method  :   "POST",
            url     :   API_HOST + "/team",
            data    :   {
                            team_name:  $scope.make_team_name,
                            colour:     $scope.make_team_colour
                        },
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            jQuery('#teamsKnop')[0].click();
        },function(response){
            alert("Alle velden invullen aub");
        });
    }

    $scope.reload = function(){
        $scope.loaded = false;
        $http({
            method  :   "GET",
            url     :   API_HOST + "/team",
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            $scope.loaded = true;
            $scope.teams = response.data;
        },function(response){
            alert("Alle velden invullen aub");
        });
    }
    $scope.loadEdit = function(team_id){
        $http({
            method  :   "GET",
            url     :   API_HOST + "/team/" + team_id,
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            $scope.active_team = response.data;
            active_team = response.data.id;
            $scope.edit_team_name = response.data.name;
            $scope.edit_team_colour = response.data.colour;
            $scope.loadMembers(team_id);
        }, function(response){

        });
    }
    $scope.loadMembers = function(team_id){
        $scope.loaded = false;
        $http({
            method  :   "GET",
            url     :   API_HOST + "/team/" + team_id + "/member",
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            $scope.members_active_team = response.data;
            $scope.loaded = true;
        }, function(response){

        });
    }
    $scope.editTeam = function(){
        $scope.teamEdited = false;
        $http({
            method  :   "PUT",
            url     :   API_HOST + "/team/" + active_team,
            data    :   "team_name="+$scope.edit_team_name+"&colour="+encodeURI($scope.edit_team_colour),
            //params: {team_name: $scope.make_team_name, colour: $scope.make_team_colour},
            headers :   {'token': getCookie('token'), 'Content-Type': 'application/x-www-form-urlencoded'},

        }).then(function(response){
            $scope.teamEdited = true;
        }, function(response){
            console.log("Couldn't edit this team");
            console.log(response);
        })
    }
    $scope.deleteTeam = function(){
        $scope.deleted = false;
        $http({
            method  :   "DELETE",
            url     :   API_HOST + "/team/" + $scope.team_to_be_deleted,
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            $scope.deleted = true;
            $scope.reload();
        }, function(response){
            console.log("Couldn't delete this team");
            console.log(response);
        });
    }
    $scope.deleteMember = function(){

        $http({
            method  :   "DELETE",
            url     :   API_HOST + "/team/" + active_team + "/member/" + member_to_be_deleted,
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            console.log("Deleted a member");
        }, function(response){
            console.log("Couldn't delete this member");
        });
    }
    $scope.setTeamToBeDeleted = function(team_id){
        $scope.team_to_be_deleted = team_id;
    }
    $scope.setMemberToBeDeleted = function(member){
        $scope.member_to_be_deleted = member.id;
        $scope.current_member = member;
        member_to_be_deleted = member.id;
    }

});
jQuery(document).on('click', '#modal-verwijderteam .modal-button-cheat', function(){
    angular.element(jQuery('#content_teams')[0]).scope().deleteTeam();
});
jQuery(document).on('click', '#modal-verwijdermember .modal-button-cheat', function(){
    angular.element(jQuery('#content_teams')[0]).scope().deleteMember();
});
// jQuery(document).on('click', '#modal-verwijderteam .modal-button-cheat', function(){
//     angular.element(jQuery('#content_teams')[0]).scope().deleteTeam();
// });
