<form class="uk-form-horizontal" style="width: 100%; margin-bottom:10px;">
    <div class="uk-grid">
        <!-- Dropdown voor filter op datum -->
        <div class="uk-width-1-3">
            <label id="filter-label" class="uk-form-label" for="sort_wnnr">Wanneer </label>
            <div id="filter-controls" class="uk-form-controls">
                <select class="uk-select" id="sort_wnnr">
                    <option>Alles</option>
                    <option>Vandaag</option>
                    <option>Afgelopen week</option>
                    <option>Afgelopen 2 weken</option>
                    <option>Afgelopen maand</option>
                </select>
            </div>
        </div>
        <!-- Dropdown voor filter op Categorie -->
        <div class="uk-width-1-3">
            <label id="filter-label" class="uk-form-label" for="sort_cat">Categorie</label>
            <div id="filter-controls" class="uk-form-controls">
                <select class="uk-select" id="sort_cat">
                    <option>Alles</option>
                    <option>Blauw</option>
                    <option>Groen</option>
                    <option>Zwart</option>
                </select>
            </div>
        </div>
        <!-- Filter knop -->
        <div class="uk-width-1-3">
            <div class="uk-margin" >
                <button id="filter-button" class="uk-button uk-button-default">Filter</button>
            </div>
        </div>
    </div>
</form>
