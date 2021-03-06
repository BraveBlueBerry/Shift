
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

/*
-------------------------------------------------------------------------------------------------------------------------------------------------------
                    TEAM Controller
-------------------------------------------------------------------------------------------------------------------------------------------------------
 */

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

    /*$scope.getTeamSelect = function(){
        $http({
            method  :   "GET",
            url     :   API_HOST + "/team",
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            var teams = [{id:0,name:"Geen team"}];
            for(var i = 0; i < response.data.length; i++){
                teams.push(response.data[i]);
            }
            $scope.teams = teams;
        },function(response){
            alert("Alle velden invullen aub");
        });
    }*/
    $scope.getOwnedTeams = function(){
        $http({
            method  :   "GET",
            url     :   API_HOST + "/team",
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            console.log(response);
            var owned_teams = [];
            for(var i = 0; i < response.data.length; i++){
                if(response.data[i].owner == USER_ID){
                    owned_teams.push(response.data[i]);
                }
            }

            $scope.owned_teams = owned_teams;
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
            location.reload();
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

/*
-------------------------------------------------------------------------------------------------------------------------------------------------------
                    INVITATION Controller
-------------------------------------------------------------------------------------------------------------------------------------------------------
 */

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

/*
-------------------------------------------------------------------------------------------------------------------------------------------------------
                    USER Controller
-------------------------------------------------------------------------------------------------------------------------------------------------------
 */

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

    $scope.editPassword = function() {

    }
});

/*
-------------------------------------------------------------------------------------------------------------------------------------------------------
                    CATEGORY Controller
-------------------------------------------------------------------------------------------------------------------------------------------------------
 */


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
    $scope.getByTeam = function(team_id){

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
                UIkit.notification(jQuery("#make-cat-btn").data());
                console.log(response);
            });
        }
        else{
            $http({
                method  :   "POST",
                url     :   API_HOST + "/team/" + $scope.team + "/category",
                data    :   {name: $scope.name, colour: $scope.colour},
                headers :   {'token': getCookie('token')}
            }).then(function(response){
                UIkit.notification(jQuery("#make-cat-btn").data());
                console.log(response);
            });
        }
    }
});


/*
-------------------------------------------------------------------------------------------------------------------------------------------------------
                    REGISTRATION Controller
-------------------------------------------------------------------------------------------------------------------------------------------------------
 */
var filter = {},
    registrationid = 0;
    filter.team = null;
    filter.category = "";
app.controller('registrationController', function($scope, $http) {
    $scope.registrations = [];
    $scope.categories = [];
    $scope.statuses = [];
    $scope.deleteRegistration = function(registration_id){
        $http({
            method  :   "DELETE",
            url     :   API_HOST + "/registration/" + registration_id,
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            location.reload();
        }, function(response){
            console.log("Couldn't delete this registration");
            console.log(response);
        });
    }
    $scope.loadRegistrations = function(){
        $scope.loaded = false;
        $http({
            method  :   "GET",
            url     :   API_HOST + "/registration",
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            $scope.registrations = response.data;
            var category_list = [];
            for(i = 0; i < $scope.registrations.length; i++){
                $scope.getCategoryNameAndColour($scope.registrations[i].category, i);
                category_list.push($scope.registrations[i].category);
                if(typeof $scope.registrations[i].team == "string"){
                    $scope.getTeamNameAndColour($scope.registrations[i].team, i);
                }
            }
            var category_list = new Set(category_list);
            $scope.categories = [];
            for(let cat of category_list){
                console.log(cat);
                $scope.getCategoryById(cat);
            }
            $scope.loaded = true;
        },function(response){
        });
    }

    $scope.loadRegistrationsForTeam = function(team_id){
        //console.log(team_id);
        $scope.loaded = false;
        $scope.getStatus();
        $http({
            method  :   "GET",
            url     :   API_HOST + "/team/" + team_id + "/registration",
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            $scope.registrations = response.data;
            for(i = 0; i < $scope.registrations.length; i++){
                $scope.getCategoryNameAndColour($scope.registrations[i].category, i);
                $scope.getUserNameOfRegistration($scope.registrations[i].user, i)
                if(typeof $scope.registrations[i].team == "string"){
                    $scope.getTeamNameAndColour($scope.registrations[i].team, i);
                }
            }
            $scope.getStatusAndUpdate();
            //console.log($scope.registrations);
            $scope.loaded = true;
        },function(response){
        });
    }

    $scope.getUserNameOfRegistration = function(user_id, index){
        $http({
            method  :   "GET",
            url     :   API_HOST + "/user/" + user_id,
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            $scope.registrations[index].user_name = response.data.first_name + " " + response.data.last_name;
        },function(response){
        });
    }

    $scope.getCategoryNameAndColour = function(category_id, index) {
        $http({
            method  :   "GET",
            url     :   API_HOST + "/category/" + category_id,
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            $scope.registrations[index].category_name = response.data.name;
            $scope.registrations[index].category_colour = response.data.colour;
        },function(response){
        });
    }
    $scope.getUserCategory = function() {
        $http({
            method  :   "GET",
            url     :   API_HOST + "/category",
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            $scope.categories = response.data;
        },function(response){

        });
    }
    $scope.getTeamCategory = function(team_id) {
        $http({
            method  :   "GET",
            url     :   API_HOST + "/team/"+team_id+"/category",
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            $scope.categories = response.data;
            //console.log($scope.categories);
        },function(response){

        });
    }
    $scope.getCategoryById = function(category_id){
        $http({
            method  :   "GET",
            url     :   API_HOST + "/category/" + category_id,
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            var temp_c = $scope.categories;
            temp_c.push(response.data);
            $scope.categories = temp_c;
            //console.log($scope.categories);
        },function(response){

        });
    }
    $scope.getStatus = function(){
        $http({
            method  :   "GET",
            url     :   API_HOST + "/status",
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            $scope.statuses = response.data;
        });
    }
    $scope.getStatusAndUpdate = function(){
        $http({
            method  :   "GET",
            url     :   API_HOST + "/status",
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            console.log(response);

            for(var i = 0; i < $scope.registrations.length; i++){
                $scope.registrations[i].status_name = response.data[$scope.registrations[i].status - 1].name;
            }
            console.log($scope.registrations);
        });
    }
    $scope.getTeamNameAndColour = function(team_id, index) {
        $http({
            method  :   "GET",
            url     :   API_HOST + "/team/" + team_id,
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            $scope.registrations[index].team_name = response.data.name;
            $scope.registrations[index].team_colour = response.data.colour;
        },function(response){
            alert("Alle velden invullen aub");
        });
    }


    $scope.changeFilter = function(){
        //alert($scope.filter_team_select);
        if(typeof $scope.filter_team_select != undefined){
            if($scope.filter_team_select != null){
                //console.log($scope.filter_team_select.id);
                filter.team = $scope.filter_team_select.id;
            }
            else{
                filter.team = null;
            }
        }
        else{
            filter.team = null;
        }

        if(typeof $scope.filter_cat_select != undefined){
            if($scope.filter_cat_select != null){
                filter.category = $scope.filter_cat_select;
            } else {
                filter.category = "";
            }
        } else {
            filter.category = "";
        }
        //console.log(filter.category);
    }
    $scope.filterRegistrations = function(item) {
        if(filter.category.id == item.category || filter.category == ""){
            if(filter.team == item.team || filter.team == null){
                var date_filter = jQuery("#sort_wnnr").val();

                if(date_filter == 0)
                    return item;
                //console.log("Here!");
                var temp = new Date();
                var then = new Date(item.year, (parseInt(item.month)-1) , (parseInt(item.day)+1), 0,0,0,0);
                //var then = new Date(2017, 07, 04,0,0,0,0)
                var now = new Date(temp.getFullYear(), temp.getMonth(), temp.getDate(),0,0,0,0);
                var diff = Math.abs(now-then);
                var allowed_diff = date_filter * 3600 * 1000;
                console.log(diff);
                if(diff < allowed_diff)
                    return item;
            }
        }
    }
    $scope.getRegistration = function(registration_id) {
        $http({
            method  :   "GET",
            url     :   API_HOST + "/registration/" + registration_id,
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            $scope.edit_registration_description = response.data.description;
            $scope.registration_date_year = response.data.year;
            $scope.registration_date_month = response.data.month;
            $scope.registration_date_day = response.data.day;
            $scope.edit_registration_date = $scope.registration_date_year + "-" + $scope.registration_date_month + "-" + $scope.registration_date_day;
            $scope.edit_registration_hours = response.data.hours;
            $scope.edit_registration_team = response.data.team;

        },function(response){
            alert("Couldn't get the registration");
        });
    }
    $scope.loadEditRegistration = function(registration_id) {
        $scope.getRegistration(registration_id);
        $scope.getUserCategory();
        registrationid = registration_id;
    }
    $scope.load = function(){
        $scope.getStatus();
        $scope.getUserCategory();
    }
    $scope.changeTeam = function(){
        var is_team;
        if(typeof $scope.team != undefined){
            if($scope.team != null){
                is_team = true;
            }
            else{
                is_team =false;
            }
        }
        else{
            is_team = false;
        }
        if(is_team){
            $scope.getTeamCategory($scope.team.id);
        }
        else{
            $scope.getUserCategory();
        }
    }
    $scope.updateRegistration = function(){
        var data_tosend = {};
        if(typeof $scope.edit_registration_hours == "undefined" || typeof $scope.edit_registration_hours == "null"){
            alert("Graag uren invullen.");
            return;
        }
        if(typeof $scope.edit_registration_description == "undefined" || typeof $scope.edit_registration_description == "null"){
            alert("Graag omschrijving invullen.");
            return;
        }
        if(jQuery('#datum_gewerkt_edit').val() == ""){
            alert("Graag datum invullen.");
            return;
        }
        if(typeof $scope.select_edit_category == "undefined" || typeof $scope.select_edit_category == "null"){
            alert("Graag een categorie selecteren.");
            return;
        }
        if(typeof $scope.edit_team != "undefined" && typeof $scope.edit_team != "null")
            data_tosend.edit_team = $scope.edit_team.id;
        if(typeof $scope.edit_status != "undefined" && typeof $scope.edit_status != "null")
            data_tosend.edit_status = $scope.edit_status.id;

        data_tosend.uren = $scope.edit_registration_hours;
        data_tosend.category = $scope.select_edit_category.id;
        var date_edit = jQuery('#datum_gewerkt_edit').val();
        var spld_edit = date_edit.split('-');
        if(spld_edit[0].length == 4)
            data_tosend.datetime = spld_edit[2] + '-' + spld_edit[1] + '-' + spld_edit[0];
        else
            data_tosend.datetime = jQuery('#datum_gewerkt_edit').val();

        data_tosend.omschrijving = $scope.edit_registration_description;
        $http({
            method  :   "PUT",
            url     :   API_HOST + "/registration/" + registrationid,
            data    :   data_tosend,
            headers :   {'token': getCookie('token'), 'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(response){
            jQuery('#overzichtKnop').trigger('click');
        });
    }
    $scope.submit = function(){
        var data = {};
        if(typeof $scope.uren == "undefined" || typeof $scope.uren == "null"){
            alert("Graag uren invullen.");
            return;
        }
        if(typeof $scope.desc == "undefined" || typeof $scope.desc == "null"){
            alert("Graag omschrijving invullen.");
            return;
        }
        if(jQuery('#datum_gewerkt').val() == ""){
            alert("Graag datum invullen.");
            return;
        }
        if(typeof $scope.select_category == "undefined" || typeof $scope.select_category == "null"){
            alert("Graag een categorie selecteren.");
            return;
        }

        if(typeof $scope.team != "undefined" && $scope.team != null)
            data.team = $scope.team.id;
        if(typeof $scope.status != "undefined" && typeof $scope.status != "null")
            data.status = $scope.status.id;

        data.uren = $scope.uren;
        data.category = $scope.select_category.id;
        var date = jQuery('#datum_gewerkt').val();
        var spld = date.split('-');
        if(spld[0].length == 4)
            data.datetime = spld[2] + '-' + spld[1] + '-' + spld[0];
        else
            data.datetime = jQuery('#datum_gewerkt').val();
        data.omschrijving = $scope.desc;

        $http({
            method  :   "POST",
            url     :   API_HOST + "/registration",
            data    :   data,
            headers :   {'token': getCookie('token')}
        }).then(function(response){
            jQuery('#overzichtKnop').trigger('click');
        });
    }
});
