<style>
    table {
        width:100%;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 5px;
        text-align: left;
    }
    table#t01 tr:nth-child(even) {
        background-color: #eee;
    }
    table#t01 tr:nth-child(odd) {
        background-color:#fff;
    }
    /*table#t01 td:nth-child(5) {*/
        /*color: blue;*/
    /*}*/
    table#t01 th {
        background-color:#F3BEFA;
    }
</style>

<table id="t01">
    <tr>
        <th>Datum</th>
        <th>Tijd</th>
        <th>Categorie</th>
        <th>Omschrijving</th>
        <th>Status</th>
        <th>Options</th>
    </tr>
    <tr>
        <td>11-05-2017</td>
        <td>01:34</td>
        <td>Project Weerstations</td>
        <td>Niet opgegeven</td>
        <td><i class="fa fa-question-circle fa-lg" aria-hidden="true"></i></td>
        <td>Test</td>
    </tr>
    <tr>
        <td>10-05-2017</td>
        <td>03:00</td>
        <td>Project Parkeergarage</td>
        <td>CSS Bijgewerkt</td>
        <td style="color: #D65232;"><i class="fa fa-times-circle fa-lg" aria-hidden="true"></i></td>
        <td>Test</td>
    </tr>
    <tr>
        <td>08-05-2017</td>
        <td>01:00</td>
        <td>Studie</td>
        <td>Lezing gevolgd over Jquery</td>
        <td style="color: #E676F5;"><i class="fa fa-check-circle fa-lg" aria-hidden="true"></i></td>
        <td>Test</td>
    </tr>
    <tr>
        <td>07-05-2017</td>
        <td>07:00</td>
        <td>Project Parkeergarage</td>
        <td>Cleanup in car.java</td>
        <td style="color: #E676F5;"><i class="fa fa-check-circle fa-lg" aria-hidden="true"></i></td>
        <td>Test</td>
    </tr>
</table>