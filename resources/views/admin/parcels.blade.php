<style>
    .badge-orange {
        background-color: orange;
    }
    .focus {
        border-color: orange;
        box-shadow: 0 0 0 0.2rem rgba(255, 69, 0, 0.25);
    }
    .badge.badge-outline-danger{
        border: .5px solid orange;
    }

</style>
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
            <select class="form-control" id="magasin-filter">
                <option value="">Nom du magasin</option>
                @foreach ($parcels as $parcel)
                    <option value="{{ $parcel->magasin }}">{{ $parcel->magasin }}</option>
                @endforeach
            </select>
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
    <div 
        style="border-top:4px solid orange ;border-radius: 2px ; box-shadow: 0px 3px 3px rgb(175, 175, 175) ; background-color: white; padding: 55px;overflow-x: scroll;">

      <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped">
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
                @foreach ($parcels as $parcel)
                    <tr>
                        <td>
                            <p>{{ $parcel->code }}</p>
                            <p class="badge badge-info"><i class="fa-solid fa-motorcycle"></i>
                                {{ $parcel->deliverymen->firtsName . ' ' . $parcel->deliverymen->lastName }}</p>
                        </td>
                        <td>{{ $parcel->created_at }}</td>
                        <td>
                            <p>{{ $parcel->Name }}</p>
                            <p>{{ $parcel->phone_number }}</p>
                        </td>
                        <td>{{ $parcel->magasin }}</td>
                        <td>
                            @if ($parcel->state == 'paye')
                                <p class="badge badge-success">{{ $parcel->state }}</p>
                            @elseif ($parcel->state == 'Non paye')
                                <p class="badge badge-danger">{{ $parcel->state }}</p>
                            @else
                                <p class="badge badge-primary">{{ $parcel->state }}</p>
                            @endif
                        </td>
                        <td>
                            @if ($parcel->status == 'Livre')
                                <p class="badge badge-success">{{ $parcel->status }}</p>
                            @elseif ($parcel->status == 'Annule')
                                <p class="badge badge-success">{{ $parcel->status }}</p>
                            @elseif ($parcel->complaint && $parcel->complaint->req_state == 'approved')
                                <p class="badge badge-danger">{{ $parcel->status }}</p>
                                <p class="badge badge-outline-danger" style="color:orange;">comment :
                                    {{ $parcel->complaint->comment }} <br> {{ $parcel->delay }}</p>
                            @else
                                <p class="badge badge-primary">{{ $parcel->status }}</p>
                            @endif
                        </td>
                        <td> {{ $parcel->destination }} </td>
                        <td> {{ $parcel->price }} DH </td>
                        <td style="width: 250px;">
                           <div class="row justify-content-around">
                            <x-details-modal></x-details-modal>
                            <div class="dropdown"> 
                                <button class="btn" style="background-color: #fe8a39;" type="button" id="btn{{$parcel->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-horizontal-rounded"></i>          
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btn{{$parcel->id}}">
                                  
                                   <x-edit-modal text="Edit Ville" :coli="$parcel">hhhh</x-edit-modal> 
                                     <x-edit-modal text="Edit Ville" :coli="$parcel">Edit Livreur</x-edit-modal> 
                                    <a class="dropdown-item text-danger" href="#"><i class="bx bxs-trash mr-2"></i> Remove</a>
                                </div>
                              </div>
                           
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table> 
      </div>
        {{ $parcels->links('pagination::bootstrap-5') }}
    </div>
  </div>
</x-admin-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const codeFilter = document.getElementById('code-filter');
        const dateFilter = document.getElementById('date-filter');
        const stateFilter = document.getElementById('state-filter');
        const statusFilter = document.getElementById('status-filter');
        const magasinFilter = document.getElementById('magasin-filter');
        const filterBtn = document.getElementById('filter-btn');
        const refreshBtn = document.getElementById('refresh-btn');
        const deliveryFilter = document.getElementById('delivery-filter');
        refreshBtn.onclick = () => {
            window.location.reload();
        }
        filterBtn.addEventListener('click', function() {
            const codeValue = codeFilter.value;
            const dateValue = dateFilter.value;
            const stateValue = stateFilter.value;
            const statusValue = statusFilter.value;
            const magasinValue = magasinFilter.value;
            const deliveryValue = deliveryFilter.value;
     
            document.querySelector("div#loaderHolder").style.display="flex";
 
            // Make an AJAX request to the server with the filter values
            fetch(
                    `/api/parcels?code=${codeValue}&date=${dateValue}&state=${stateValue}&status=${statusValue}&magasin=${magasinValue}&delivery=${deliveryValue}`
                    )
                .then(response => response.json())
                .then(data => {
                    // Update the table with the filtered data
                    const tableBody = document.querySelector('tbody');
                    tableBody.innerHTML = '';
                    console.log(data.data);
                    /*let array = []; 
                     typeof data.data == 'object'? array.push(data.data) : data.data ;
                     const returnedData = array.length ? array : data.data 
                    console.log(returnedData[0]);*/
                    data.data.forEach(parcel => {
                        // Render the table row for each parcel
                        tableBody.innerHTML += `
                        <tr>
                        <td>
                            <p>${ parcel.code }</p>
                            <p class="badge badge-info"><i class="fa-solid fa-motorcycle"></i>
                                ${parcel.deliverymen.firtsName} ${parcel.deliverymen.lastName }</p>
                        </td>
                        <td>${parcel.created_at }</td>
                        <td>
                            <p>${parcel.Name }</p>
                            <p>${parcel.phone_number }</p>
                        </td>
                        <td>${parcel.magasin }</td>
                        <td>
                            ${parcel.state == 'paye' ? `<p class="badge badge-success">${parcel.state }</p>` : parcel.state == 'No paye' ? `<p class="badge badge-danger">${parcel.state }</p>` : ` <p class="badge badge-primary">${parcel.state }</p>`}
                        </td>
                        <td>
                            ${
                                parcel.status == 'Livre' ?  `<p class="badge badge-success">${parcel.status }</p>` : parcel.status == 'Annule' ? `<p class="badge badge-success">${parcel.status }</p>`:parcel.complaint&&parcel.complaint.req_state == 'approved' ?`<p class="badge badge-danger">${parcel.status }</p>
                                <p class="badge badge-outline-danger" style="color:orange;">comment :
                                     ${parcel.complaint.comment } <br/>${parcel.delay } </p>
                               `:` <p class="badge badge-primary">${parcel.status }</p>`
                            }
                        </td>
                        <td> ${parcel.destination } </td>
                        <td> ${parcel.price } DH </td>
                        <td>
                            <div class="btn btn-danger">btn</div>
                        </td>
                    </tr>
                        `;
                        
                    });
                    document.querySelector("div#loaderHolder").style.display="none";
                })

        });
    });

    // Get the table element
   /* const $table = $('.table');

    $table.on('click', 'td', handleRowFocus);

    function handleRowFocus(event) {
        $(event.currentTarget).toggleClass('focus');
    }*/
</script>
