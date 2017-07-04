
/*
-------------------------------------------------------------------------------------------------------------------------------------------------------
                    Toggle Application panes
-------------------------------------------------------------------------------------------------------------------------------------------------------
 */
 var ids = [];
 function swapPage(){
     var location = window.location + "";
     location = location.split("#");
     jQuery(".content_right").hide();
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
 }
jQuery(document).ready(function(){
    // Make list of ID's

    jQuery('#wrapperbb .content_right').each(function(){
        ids.push(jQuery(this).attr('id'));
    });
    swapPage();

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
var active_team_id;
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
    $scope.invitations = [];
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
            active_team_id = response.data.id;
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
            url     :   API_HOST + "/team/" + active_team_id,
            data    :   "name="+$scope.edit_team_name+"&colour="+encodeURI($scope.edit_team_colour),
            //params: {team_name: $scope.make_team_name, colour: $scope.make_team_colour},
            headers :   {'token': getCookie('token'), 'Content-Type': 'application/x-www-form-urlencoded'},

        }).then(function(response){
            $scope.teamEdited = true;
            window.location="app#teams";
            swapPage();
            $scope.reload();
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
            url     :   API_HOST + "/team/" + active_team_id + "/member/" + member_to_be_deleted,
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            console.log("Deleted a member");
        }, function(response){
            console.log("Couldn't delete this member");
        });
    }
    $scope.leaveTeam = function(team_id){

        $http({
            method  :   "DELETE",
            url     :   API_HOST + "/team/" + team_id + "/member/" + USER_ID,
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            console.log("Deleted a member");
            $scope.reload();
        }, function(response){
            console.log(response);
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

app.controller('invitationController', function($scope, $http) {
    $scope.team = false;
    $scope.invitations = [];
    $scope.team_owner_id = false;
    $scope.owner = {};

    $scope.makeInvite = function() {
        $http({
            method  :   "POST",
            url     :   API_HOST + "/invitation",
            data    :   {
                            team    :   $scope.team.id,
                            email   :   $scope.make_invite_email,
                            message :   $scope.make_invite_message
                        },
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            UIkit.notification(jQuery("#send-inv-and-again-btn").data());
            console.log("Uitnodiging verstuurd");
        },function(response){
            console.log(active_team);
            alert("Alle velden invullen aub");
        });
    }

    $scope.getInvite = function() {
        $http({
            method  :   "GET",
            url     :   API_HOST + "/invitation",
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            var invitations = response.data;

            $scope.invitations = invitations;
            for(var i = 0; i < invitations.length; i++){
                 $scope.getTeam(invitations[i].team);
            }
        },function(response){
        });
    }

    $scope.acceptInvite = function(inv_id) {
        $http({
            method  :   "DELETE",
            url     :   API_HOST + "/invitation/" + inv_id,
            headers :   {'token': getCookie('token'), 'Content-Type': 'application/x-www-form-urlencoded'},
            data    :   "response=accept"
        }).then(function(response){
            $scope.getInvite();
            jQuery('#teamsKnop')[0].click();
            console.log("Invite is geaccepteerd en verwijderd");
        },function(response){
            console.log("Error: Invite is niet verwijerd");
        });
    }
    $scope.declineInvite = function(inv_id) {
        $http({
            method  :   "DELETE",
            url     :   API_HOST + "/invitation/" + inv_id,
            headers :   {'token': getCookie('token'), 'Content-Type': 'application/x-www-form-urlencoded'},
            data    :   "response=decline"
        }).then(function(response){
            $scope.getInvite();
            jQuery('#teamsKnop')[0].click();
            console.log("Invite is afgewezen en verwijderd");
        },function(response){
            console.log("Error: Invite is niet verwijderd");
        });
    }
    $scope.getTeam = function(team_id) {

        $http({
            method  :   "GET",
            url     :   API_HOST + "/team/" + team_id,
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            var team = {};
            team.name = response.data.name;
            team.owner = response.data.owner;

            for(var i = 0; i < $scope.invitations.length; i++){
                 if($scope.invitations[i].team == team_id)
                    $scope.invitations[i].team_data = team;
            }
            $scope.getOwner(team.owner);
        });
    }
    $scope.setActiveTeam = function(team_id) {
        $http({
            method  :   "GET",
            url     :   API_HOST + "/team/" + team_id,
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            $scope.team = response.data;
            $scope.team_owner_id = $scope.team.owner;
            $scope.getOwner($scope.team_owner_id);
        },function(response){
            console.log("setActiveTeam error: ");
            console.log(response);
        });
    }

    $scope.getOwner = function (owner_id){
        $http({
            method  :   "GET",
            url     :   API_HOST + "/user/" + owner_id,
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            for(var i = 0; i < $scope.invitations.length; i++){
                if($scope.invitations[i].team_data.owner == owner_id){
                    $scope.invitations[i].team_data.owner = response.data
                }
            }
            console.log($scope.invitations);
        },function(response){
            console.log("Get owner error: ");
            console.log(response);
        });
    }

    $scope.sendInvAndBack = function() {
        $scope.makeInvite();
        jQuery('#teamsKnop')[0].click();
    }

    $scope.sendInvAndAgain = function() {
        $scope.makeInvite();

    }
});
setInterval(function(){
    angular.element(jQuery('#content_landing')[0]).scope().getInvite();
}, 5000);

app.controller('userController', function($scope, $http) {
    $scope.edit_user_first_name = USER_FN;
    $scope.edit_user_last_name = USER_LN;
    $scope.edit_user_email = USER_EMAIL;

    $scope.editAccount = function() {
        $http({
            method  :   "PUT",
            url     :   API_HOST + "/user/" + USER_ID,
            data    :   "first_name="+$scope.edit_user_first_name+"&last_name="+$scope.edit_user_last_name+"&email="+$scope.edit_user_email,
            //params: {team_name: $scope.make_team_name, colour: $scope.make_team_colour},
            headers :   {'token': getCookie('token'), 'Content-Type': 'application/x-www-form-urlencoded'},

        }).then(function(response){
            jQuery('#mijn-account-knop')[0].click();
        }, function(response){
            console.log("Couldn't edit this team");
            console.log(response);
        })
    }

    $scope.setUser = function(user_first_name, user_last_name, user_email) {
        console.log(user_first_name);
        $scope.edit_user_first_name = user_first_name;
        $scope.edit_user_last_name = user_last_name;
        $scope.edit_user_email = user_email;
    }
});

app.controller('categoryController', function($scope, $http) {
    $scope.getByID = function(category_id){

    };

    $scope.get = function(){
        $http({
            method  :   "GET",
            url     :   API_HOST + "/category",
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            console.log(response);
        },function(response){
            console.log("Get owner error: ");
            console.log(response);
        });
    }
    $scope.submit = function(){
        if(typeof $scope.name == 'undefined'){
            alert("Vul een naam in.");
            return;
        }
        if(typeof $scope.colour == 'undefined'){
            $scope.colour = "#000000";
        }
        if(typeof $scope.team == "undefined"){
            $http({
                method  :   "POST",
                url     :   API_HOST + "/category",
                data    :   {name: $scope.name, colour: $scope.colour},
                headers :   {'token': getCookie('token')}
            }).then(function(response){
                console.log(response);
            });
        }
        else{
            $http({
                method  :   "POST",
                url     :   API_HOST + "/category",
                data    :   {name: $scope.name, colour: $scope.colour, team: $scope.team},
                headers :   {'token': getCookie('token')}
            }).then(function(response){
                console.log(response);
            });
        }
    }
});
// jQuery(document).on('click', '#modal-verwijderteam .modal-button-cheat', function(){
//     angular.element(jQuery('#content_teams')[0]).scope().deleteTeam();
// });
