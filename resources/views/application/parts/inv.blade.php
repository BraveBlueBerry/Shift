<!-- <div class="uk-padding uk-card uk-card-default uk-card-body uk-align-center">
    <h3>[Naam] heeft jouw uitgenodigd voor [Team]!</h3>
    <p>Met dit team gaan we een toffe app maken, doe mee!</p>
    <div class="uk-child-width-1-2" style="margin-left:10x;" uk-grid>
        <button class="uk-button uk-button-default">Accepteren</button>
        <button class="uk-button uk-button-default">Weigeren</button>
    </div>
</div> -->
<div ng-controller="invitationController" id="tabel-invites">
    <div ng-show="invitations.length > 0">
        Je hebt een uitnodiging voor een team!
        <table id="tabel-teams">
            <thead>
                <tr>
                    <th>Van wie</th>
                    <th>Voor team</th>
                    <th>Bericht</th>
                    <th>Opties</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="invitation in invitations">
                    <th>@{{invitation.team_data.owner.first_name}} @{{invitation.team_data.owner.last_name}}</th>
                    <td>@{{invitation.team_data.name}}</td>
                    <td>@{{invitation.message}}</td>
                    <td><a id="inv-acc" class="uk-icon-button" ng-click="acceptInvite(invitation.id)" uk-icon="icon:check"></a><a id="inv-dec" class="uk-icon-button" ng-click="declineInvite(invitation.id)" uk-icon="icon:close"></a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
