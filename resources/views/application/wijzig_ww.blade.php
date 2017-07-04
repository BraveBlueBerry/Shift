<div id="content_wijzigww" class="content_right">
    <div class="uk-text-lead headText app-headerbb">Wijzig wachtwoord</div>
    <div class="page-panelbb">
        <div class="page-panel-innerbb">
            <div class="page-panel-content maskablebb" id="dashboard-containerbb">
                <div id="dashboard-overviewbb" class="dashboard-sectionbb">
                    <div class="dashboard-overviewbb">
                        <section class="dashboard-left-content">
                            <span uk-icon="icon:lock; ratio:6;" style="margin-top:100px;"></span><br /><br />
                            Wachtwoord wijzigen <br />
                            Vul je oude wachtwoord in om een nieuw wachtwoord aan te maken
                        </section>
                        <section class="dashboard-right-content">
                            <form id="form-account" ng-controller="userController" ng-submit="editPassword()" class="uk-form-horizontal">
                                <fieldset class="uk-fieldset">
                                    <!-- Oud wachtwoord gebruiker -->
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="oudww">Oud wachtwoord: </label>
                                        <div class="uk-form-controls">
                                            <input id="oudww" class="uk-input uk-form-width-large" ng-model="old_password" type="password"/>
                                        </div>
                                    </div>
                                    <!-- Nieuw wachtwoord 1 gebruiker -->
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="nieuwww">Nieuw wachtwoord: </label>
                                        <div class="uk-form-controls">
                                            <input id="nieuwww" class="uk-input uk-form-width-large" ng-mdoel="new_password_1" type="password"/>
                                        </div>
                                    </div>
                                    <!-- Nieuw wachtwoord 2 gebruiker -->
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="nieuwwwher">Herhaal wachtwoord: </label>
                                        <div class="uk-form-controls">
                                            <input id="nieuwwwher" class="uk-input uk-form-width-large" ng-mdoel="new_password_1" type="password"/>
                                        </div>
                                    </div>
                                    <!-- Submit knop -->
                                    <div class="uk-margin" >
                                        <button id="submit-button" class="uk-button uk-button-default">Wijzigingen opslaan</button>
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
