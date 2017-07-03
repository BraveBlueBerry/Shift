<script>
    function onLoad_addmember(loc){
        angular.element(jQuery('#content_addmember')[0]).scope().setActiveTeam(loc[1]);
    }
</script>
<div id="content_addmember" ng-controller="invitationController" class="content_right">
    <div class="uk-text-lead headText app-headerbb">Lid toevoegen</div>
    <div class="page-panelbb">
        <div class="page-panel-innerbb">
            <div class="page-panel-content maskablebb" id="dashboard-containerbb">
                <div id="dashboard-overviewbb" class="dashboard-sectionbb">
                    <div class="dashboard-overviewbb">
                        <section class="dashboard-left-content">
                            <i class="fa fa-user-plus fa-5x" aria-hidden="true" style="margin-top:100px;"></i><br /><br />
                            <br />
                            Hier kun je een lid toevoegen aan het team
                        </section>
                        <section class="dashboard-right-content">
                            <form id="form-account" class="uk-form-horizontal">
                                <fieldset class="uk-fieldset">
                                    <!-- Email adres member -->
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="email_newmember">Email adres van nieuw lid*</label>
                                        <div class="uk-form-controls">
                                            <input id="email_newmember" ng-model="make_invite_email" class="uk-input uk-form-width-large" type="text" placeholder="email@adres.nl"/>
                                        </div>
                                    </div>
                                    <!-- Bericht -->
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="textarea_bericht">Bericht</label>
                                        <div class="uk-form-controls">
                                            <textarea id="textarea_bericht" ng-model="make_invite_message" class="uk-textarea uk-form-width-large" rows="5" placeholder="Eventueel kan er een bericht mee gestuurd worden"></textarea>
                                        </div>
                                    </div>
                                    <!-- Submit knop -->
                                    <div class="uk-margin" >
                                        <input type='submit' ng-click="sendInvAndBack()" value='Verstuur en terug' class="no-text-transform uk-button uk-button-default" />
                                        <button type='button' ng-click="sendInvAndAgain()" id="send-inv-and-again-btn" data-message="Uitnodiging verstuurd" data-status="success" class="no-text-transform uk-button uk-button-default">Verstuur en nog een uitnodiging</button>
                                    </div>
                                </fieldset>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
