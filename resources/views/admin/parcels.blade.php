<link rel="stylesheet" href="{{asset("assets/css/parcels.css")}}">
<x-admin-layout>
  <div>
   
    <div id="loaderHolder" style="display: none" class="loading">
        <p class="loader"></p>
    </div>
    <div class="row mb-4">
        <div class="col-md-3">
            <input type="text" class="form-control" id="code-filter" placeholder="Code d'envoi">
        </div>
        <div class="col-md-3">
            <input type="date" class="form-control" id="date-filter" placeholder="Date d'expedition">
        </div>
        <div class="col-md-3">
            <select class="form-control" id="state-filter">
                <option value="">Etat</option>
                <option value="paye">Payé</option>
                <option value="Non paye">Non payé</option>
                <option value="Facture">Facture</option>
            </select>
        </div>
        <div class="col-md-3">
            <select class="form-control" id="status-filter">
                <option value="">Statut</option>
                <option value="Livre">Livré</option>
                <option value="Raporte">Raporté</option>
                <option value="Annule">Annulé</option>
                <option value="Refuse">Refusé</option>
            </select>
        </div>
        <div class="col-3 mt-1">
            <input type="text" class="form-control" id="magasin-filter" placeholder="Nom de Magasin" />
                
        </div>

        <div class="col-3 mt-1">
            <select class="form-control" id="delivery-filter">
                <option value="">Liveur</option>
                @foreach ($delmens as $delmen)
                    <option value="{{ $delmen->id }}">
                        {{ $delmen->firtsName . ' ' . $delmen->lastName }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2 mt-1">
            <button class="btn me-1" style="background-color: orange;" id="filter-btn"><i
                    class="fa-solid fa-filter"></i>Filtrer</button>
            <button class="btn btn-success mt-1 p-2" id="refresh-btn"><i class="fa-solid fa-arrows-rotate"></i></button>
        </div>
    </div>
    <div class="main-datatable"
        style="border-top:4px solid orange ;border-radius: 2px ; box-shadow: 0px 3px 3px rgb(175, 175, 175) ; background-color: white; padding: 55px;overflow-x: scroll;">

      <div class="table-responsive">
        <table id="example" class="table table-bordered table-borderedcust-datatable dataTable">
            <thead>
                <tr>
                    <th>code d&apos;envoi</th>
                    <th>Date d&apos;expedition</th>
                    <th>Telephone</th>
                    <th>Nom du magasin</th>
                    <th>Etat</th>
                    <th>Status</th>
                    <th>Ville</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table> 
      </div>
    </div>
  </div>
</x-admin-layout>
<script src="{{asset('assets/js/parcels.js')}}"></script>

