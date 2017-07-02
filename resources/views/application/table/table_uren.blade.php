<!--
Het formaat van de table is erg simpel.
De thead is eigenlijk de eerste rij, en de tbody zijn alle overige rijen.
Let bij de thead op dat je de eerste rij in TD doet, omdat hij anders niet het effect mee neemt.

Style can be edited in component.css
-->
<table id="tabel-uren">
    <thead>
        <tr>
            <th>Datum</th>
            <th>Tijd</th>
            <th>Categorie</th>
            <th>Team</th>
            <th>Omschrijving</th>
            <th>Status</th>
            <th>Opties</th>
        </tr>
    </thead>
    <tbody>
        <!-- empty row -->
        <tr>
            <th></th>
            <td></td>
            <td class="truncate"></td>
            <td class="truncate"></td>
            <td class="truncate"></td>
            <td></td>
            <td><a class="uk-icon-button" uk-icon="icon:trash"></a><a href="#wijziguur" class="uk-icon-button navbarLink"uk-icon="icon:pencil"></a></td>
        </tr>
        <!-- filled example rows -->
        <tr>
            <th>11-05-2017</th>
            <td>01:34</td>
            <td class="truncate">Project Weerstations</td>
            <td class="truncate">Tha Real Team</td>
            <td class="truncate">Niet opgegeven</td>
            <td><i class="fa fa-question-circle fa-lg" aria-hidden="true"></i></td>
            <td><a class="uk-icon-button" uk-icon="icon:trash"></a><a class="uk-icon-button"uk-icon="icon:pencil"></a></td>
        </tr>
        <tr>
            <th>10-05-2017</th>
            <td>03:00</td>
            <td class="truncate">Project Parkeergarage</td>
            <td class="truncate">Tha Real Team met een lange naam</td>
            <td class="truncate">CSS Bijgewerkt</td>
            <td style="color: #D65232;"><i class="fa fa-times-circle fa-lg" aria-hidden="true"></i></td>
            <td><a class="uk-icon-button" uk-icon="icon:trash"></a><a class="uk-icon-button"uk-icon="icon:pencil"></a></td>
        </tr>
        <tr>
            <th>08-05-2017</th>
            <td>01:00</td>
            <td class="truncate">Studie</td>
            <td class="truncate">Tha Real Team</td>
            <td class="truncate">Lezing gevolgd over Jquery, wat gebeurt er als deze tekst pauper lang wordt</td>
            <td style="color: #E676F5;"><i class="fa fa-check-circle fa-lg" aria-hidden="true"></i></td>
            <td><a class="uk-icon-button" uk-icon="icon:trash"></a><a class="uk-icon-button"uk-icon="icon:pencil"></a></td>
        </tr>
        <tr>
            <th>07-05-2017</th>
            <td>07:00</td>
            <td class="truncate">Project Parkeergarage</td>
            <td class="truncate"></td>
            <td class="truncate">Cleanup in car.java</td>
            <td style="color: #E676F5;"><i class="fa fa-check-circle fa-lg" aria-hidden="true"></i></td>
            <td><a class="uk-icon-button" uk-icon="icon:trash"></a><a class="uk-icon-button"uk-icon="icon:pencil"></a></td>
        </tr>
    </tbody>
</table>
