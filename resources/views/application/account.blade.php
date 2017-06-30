<div id="content_account" class="content_right">
    <div class="uk-text-lead headText app-headerbb">Mijn Account</div>
    <div class="page-panelbb">
        <div class="page-panel-innerbb">
            <div class="page-panel-content maskablebb" id="dashboard-containerbb">
                <div id="dashboard-overviewbb" class="dashboard-sectionbb">
                    <div class="dashboard-overviewbb">
                        <section class="dashboard-left-content">
                            <div uk-icon="icon:user; ratio:6;" style="margin-top:100px; cursor:default"></div><br /><br />
                            Dit is jouw account <br /><br />
                            Om je wachtwoord aan te passen: <br />
                            <a class="navbarLink" href="#wijzigww">klik hier</a>
                        </section>
                        <section class="dashboard-right-content">
                            <form id="form-account" class="uk-form-horizontal">
                                <fieldset class="uk-fieldset">
                                    <!-- Voornaam gebruiker -->
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="voornaam_gebruiker">Voornaam: </label>
                                        <div class="uk-form-controls">
                                            <input id="voornaam_gebruiker" class="uk-input uk-form-blank uk-form-width-large" type="text" value="{{$user->first_name}}"/>
                                        </div>
                                    </div>
                                    <!-- Achternaam gebruiker -->
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="achternaam_gebruiker">Achternaam: </label>
                                        <div class="uk-form-controls">
                                            <input id="achternaam_gebruiker" class="uk-input uk-form-blank uk-form-width-large" type="text" value="{{$user->last_name}}"/>
                                        </div>
                                    </div>
                                    <!-- Emailadres gebruiker -->
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="email_gebruiker">Email adres: </label>
                                        <div class="uk-form-controls">
                                            <input id="email_gebruiker" class="uk-input uk-form-blank uk-form-width-large" type="text" value="{{$user->email}}"/>
                                        </div>
                                    </div>
                                    <!-- Wachtwoord gebruiker -->
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="wachtwoord_gebruiker">Wachtwoord: </label>
                                        <div class="uk-form-controls">
                                            <input id="wachtwoord_gebruiker" class="uk-input uk-form-blank uk-form-width-large" type="password" value="secretpassword" disabled/>
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
