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
                <div id="reportrange"
                style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%" class="form-control">
                <i class="fa fa-calendar"></i>&nbsp;
                <span></span> <i class="fa fa-caret-down"></i>
            </div>
            </div>

            <div class="col-md-3">
                <input type="text" name="magasin" id="magasin-filter" class="form-control"
                    placeholder="Nom de magasin">
            </div>
            <div class="col-md-2">
                <button class="btn me-1" style="background-color: orange;" id="filter-btn"><i
                        class="fa-solid fa-filter"></i>Filtrer</button>
                <button class="btn btn-success mt-1 p-2" id="refresh-btn"><i
                        class="fa-solid fa-arrows-rotate"></i></button>
            </div>
        </div>
        <div class="row mb-4 mx-auto"
            style="border-top:4px solid orange ;border-bottom:4px solid #333232 ;border-radius: 2px ; width:95%;">
            <div class="card w-100">
                <div class="card-body">
                    <button type="button" class="btn"
                        style="background-color: #ff7023; color: white; padding: 12px 25px; cursor: pointer;"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Adding
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: orange; color : white ;">
                                    <h1 class="modal-title fs-3"id="exampleModalLabel">Add new Parcels</h1>
                                    <button type="button" class="btn" style="background-color: #ed5809;"
                                        style="cursor: pointer;" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span class="fs-3" aria-hidden="true"><i class="fa fa-close"></i></span>
                                    </button>
                                </div>
                                <div class="modal-body h-50 p-5">
                                    <div class="row w-75 mx-auto justify-content-between">
                                        <a href="{{ route('parcel.create') }}" class="btn btn-info">Ajouter
                                            manuellement</a>
                                        <a href="{{ route('parcel.create_with_excel') }}" class="btn btn-success"><i
                                                class="fa-solid fa-file-excel"></i> A travers excel</a>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn"
                        style="background-color: #30cd15; color: white; padding: 12px 25px; cursor: pointer; display:none;"
                        id="shipbtn" data-bs-toggle="modal" data-bs-target="#delivery">
                        <i class="fa-solid fa-motorcycle"></i> shipping
                    </button>
                    <div class="modal fade" id="delivery" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: orange; color : white ;">
                                    <h1 class="modal-title fs-3"id="exampleModalLabel">Ship it to deliverymen <i
                                            class="fa-solid fa-motorcycle"></i></h1>
                                    <button type="button" style="background-color: orange;" style="cursor: pointer;"
                                        class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <span class="fs-3" aria-hidden="true"><i class="fa fa-close"></i></span>
                                    </button>
                                </div>
                                <div class="modal-body h-50 p-5">
                                    <form action="">
                                        <select class="form-control" id="delivery-filter">
                                            <option value="">Liveur</option>
                                            @foreach ($deliverymen as $delmen)
    <option value="{{ $delmen->id }}">
        {{ $delmen->firstName . ' ' . $delmen->lastName }}</option>
@endforeach                   </select>
                                        <div class="row justify-content-center mt-4">
                                            <button id="update-selected" type="button" class="btn btn-success">Ship
                                                it</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="modalCls" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-datatable"
            style="border-top:4px solid orange ;border-radius: 2px ; box-shadow: 0px 3px 3px rgb(175, 175, 175) ; background-color: white; padding: 55px;">

            <div class="table-responsive">
                <table id="example" class="table table-bordered cust-datatable dataTable">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>code d&apos;envoi</th>
                            <th>Date de creation</th>
                            <th>Telephone</th>
                            <th>Nom du magasin</th>
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

<script src="{{asset('assets/js/free_parcels.js')}}"></script>
