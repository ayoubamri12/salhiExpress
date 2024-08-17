<link rel="stylesheet" href="{{ asset('assets/css/parcels.css') }}">
<style>
    .wrapper-info .card {
        width: 100%;
        height: 90px;
        background-color: #fff;
        padding: 10px 20px;
        display: flex;
        justify-content: space-around;
        align-items: center;
        border-left: 5px solid #3286e9;
        border-radius: 3px;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    }

    .wrapper-info .card .subject p {
        color: #909092;
    }

    .wrapper-info .card .icon {
        font-size: 25px;
        color: #3286e9;
    }

    .wrapper-info .card .icon-times {
        font-size: 28px;
        color: #c3c2c7;
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .smScreen {
            display: none;
        }

        p#listbtn {
            display: block;
            border-radius: 50%;
        }

        .text-info {
            font-size: 15px;

        }
    }

    .actions {
        display: flex;
        justify-content: space-between;
        width: 100%;
        background-color: white;
        border: 1px solid white;
        border-radius: 14px;
        padding: 4px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 15px 0 rgba(0, 0, 0, 0.1);
        place-items: center;
    }

    #reject {
        background-color: rgb(241, 85, 85);
        border: 1px solid rgb(241, 85, 85);

    }

    #accept {
        background-color: rgb(39, 166, 75);
        border: 1px solid rgb(39, 166, 75);

    }

    .button {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.09), 0 6px 15px 0 rgba(0, 0, 0, 0.09);
        padding: 10px 17px 10px 17px;
        font: 15px Ubuntu;
        color: white;
        border-radius: 7px;
    }

    .button span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
    }

    .button span:after {
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
    }

    .button:hover span {
        padding-right: 25px;
    }

    .button:hover span:after {
        opacity: 1;
        right: 0;
    }

    #reject span:after {
        font-family: FontAwesome;
        content: "\f05e";
    }

    #accept span:after {
        font-family: FontAwesome;
        content: "\f0c7";
    }
   

    @media (max-width: 650px) {
        .text-info {
            font-size: 13px;
        }

        .subject h3 {
            font-size: 15px;

        }
    }

    @media (max-width: 390px) {
        .text-info {
            font-size: 10px;
        }

        .subject h3 {
            font-size: 12px;

        }
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
                <select class="form-control" id="state-filter">
                    <option value="">Etat</option>
                    <option value="payé">Payé</option>
                    <option value="Non payé">Non payé</option>
                    <option value="Facturé">Facturé</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-control" id="status-filter">
                    <option value="">Statut</option>
                    <option value="en cours">En cours</option>
                    <option value="livré">Livré</option>
                    <option value="Raporté">Raporté</option>
                    <option value="Annulé">Annulé</option>
                    <option value="Refusé">Refusé</option>
                </select>
            </div>
            <div class="col-md-3 mt-1">
                <input type="text" class="form-control" id="magasin-filter" placeholder="Nom de Magasin" />
            </div>
            <div class="col-md-3">
                <div id="reportrange"
                    style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%"
                    class="form-control">
                    <i class="fa fa-calendar"></i>&nbsp;
                    <span></span> <i class="fa fa-caret-down"></i>
                </div>
            </div>
            <div class="col-md-3 mt-1">
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
                <button class="btn btn-success mt-1 p-2" id="refresh-btn"><i
                        class="fa-solid fa-arrows-rotate"></i></button>
            </div>
        </div>
        <div class="row mb-4 mx-auto"
            style="border-top:4px solid orange ;border-bottom:4px solid #333232 ;border-radius: 2px ; width:95%; margin:auto;">
            <div class="card w-100">
                <div class="card-body">
                    <button type="button" class="btn"
                        style="color: white; background-color: rgb(83, 218, 42);
                            font-weight: bold; cursor: pointer;"
                        data-bs-toggle="modal" data-bs-target="#reporte">
                        les colis reporté <i
                            class="fa-solid fa-bell {{ $reporte->count() > 0 ? 'fa-shake' : '' }}"></i>({{ $reporte->count() }})
                    </button>
                    <div class="modal fade" id="reporte" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header p-2"
                                    style="background-color:rgb(83, 218, 42); color : white ;">
                                    <h3 class="modal-title fs-3">Colis Reporté</h3>
                                    <button type="button" class="btn" style="background-color: rgb(83, 218, 42);"
                                        style="cursor: pointer;" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span class="fs-3" aria-hidden="true"><i class="fa fa-close"></i></span>
                                    </button>
                                </div>
                                <div class="modal-body">



                                    <div>
                                        @if ($reporte->count() > 0)
                                        <div style="overflow-x: scroll;">

                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th scope="col">#</th>
                                                        <th scope="col">Livreur</th>
                                                        <th scope="col">Destinataire</th>
                                                        <th scope="col">code</th>
                                                        <th scope="col">magasin</th>
                                                        <th scope="col">Commentaire</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($reporte as $r)
                                                        <tr class="text-center">
                                                            <td>
                                                                {{ $r->id }}
                                                            </td>
                                                            <td style="width: 200px">
                                                                <small
                                                                    style="border-radius: 10px;color:white;background-color: #4ce0a3;  padding:5px;">
                                                                    <i class="fa-solid fa-motorcycle"></i>
                                                                    {{ $r->coli->deliverymen->firtsName . ' ' . $r->coli->deliverymen->lastName }}
                                                                </small>
                                                            </td>
                                                            <td>
                                                                {{$r->coli->Name}}
                                                            </td>
                                                            <td>
                                                                {{$r->coli->code}}
                                                            </td>
                                                            <td>
                                                                {{$r->coli->magasin}}
                                                            </td>
                                                            <td>
                                                                <textarea readonly cols="20" rows="2" class="form-control">
                                                        {{ $r->comment }}
                                                      </textarea>
                                                            </td>
                                                            <td>
                                                                <small
                                                                    style="border-radius: 10px;border:1px solid rgb(238, 201, 38) ;background-color: #daee6a;font-weight: 700  ;padding:5px;">
                                                                    {{ $r->status }}
                                                                </small>
    
                                                            </td>
                                                            <td>
                                                                {{ $r->created_at }}
                                                            </td>
                                                            <td class="actions">
                                                                <a href="#" class="button" id="accept"><span>
                                                                        accepter</span></a>
                                                                <a href="#" class="button" id="reject"></><span>
                                                                        refuser</span></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
    
                                                </tbody>
                                            </table>
                                        </div>
                                        @else
                                            <div class="wrapper-info">
                                                <div class="card">
                                                    <div class="row w-100 align-items-center">
                                                        <div class="icon col-2"><i class="fas fa-info-circle"></i>
                                                        </div>
                                                        <div class="subject col-10">
                                                            <h3 class="text-primary">Info</h3>
                                                            <p class="text-info">there is yet no delayed parcels </p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        @endif

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn my-3"
                        style="color: white; background-color: rgb(189, 42, 218);
                            font-weight: bold; cursor: pointer;"
                        data-bs-toggle="modal" data-bs-target="#annule">
                        les colis annulé <i
                            class="fa-solid fa-bell {{ $annule->count() > 0 ? 'fa-shake' : '' }}"></i>({{ $annule->count() }})
                    </button>
                    <div class="modal fade" id="annule" tabindex="-1" role="dialog" aria-labelledby="annule"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header p-2"
                                    style="background-color: rgb(189, 42, 218); color : white ;">
                                    <h3 class="modal-title fs-3">Colis Annulé</h3>
                                    <button type="button" class="btn"
                                        style="background-color: rgb(189, 42, 218);" style="cursor: pointer;"
                                        class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <span class="fs-3" aria-hidden="true"><i class="fa fa-close"></i></span>
                                    </button>
                                </div>
                                <div class="modal-body">



                                    <div>
                                        @if ($annule->count() > 0)
                                        <div style="overflow-x: scroll">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th scope="col">#</th>
                                                        <th scope="col">Livreur</th>
                                                        <th scope="col">Destinataire</th>
                                                        <th scope="col">code</th>
                                                        <th scope="col">magasin</th>
                                                        <th scope="col">Commentaire</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($refuse as $r)
                                                        <tr class="text-center">
                                                            <td>
                                                                {{ $r->id }}
                                                            </td>
                                                            <td style="width: 200px;">
                                                                <small
                                                                    style="border-radius: 10px;color:white;background-color: #4ce0a3;  padding:5px;">
                                                                    <i class="fa-solid fa-motorcycle"></i>
                                                                    {{ $r->coli->deliverymen->firtsName . ' ' . $r->coli->deliverymen->lastName }}
                                                                </small>
                                                            </td>
                                                            <td>
                                                                {{$r->coli->Name}}
                                                            </td>
                                                            <td>
                                                                {{$r->coli->code}}
                                                            </td>
                                                            <td>
                                                                {{$r->coli->magasin}}
                                                            </td>
                                                            <td>
                                                                <textarea readonly cols="20" rows="2" class="form-control">
                                                        {{ $r->comment }}
                                                      </textarea>
                                                            </td>
                                                            <td>
                                                                <small
                                                                    style="border-radius: 10px;border:1px solid rgb(238, 201, 38) ;background-color: #daee6a;font-weight: 700  ;padding:5px;">
                                                                    {{ $r->status }}
                                                                </small>
    
                                                            </td>
                                                            <td>
                                                                {{ $r->created_at }}
                                                            </td>
                                                            <td class="actions">
                                                                <a href="#" class="button" id="accept"><span>
                                                                        accepter</span></a>
                                                                <a href="#" class="button" id="reject"></><span>
                                                                        refuser</span></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
    
                                                </tbody>
                                            </table>
                                        </div>
                                        @else
                                            <div class="wrapper-info">
                                                <div class="card">
                                                    <div class="row w-100 align-items-center">
                                                        <div class="icon col-2"><i class="fas fa-info-circle"></i>
                                                        </div>
                                                        <div class="subject col-10">
                                                            <h3 class="text-primary">Info</h3>
                                                            <p class="text-info">there is yet no canceled parcels </p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        @endif

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn"
                        style="color: white; background-color: rgb(218, 42, 101);
                            font-weight: bold; cursor: pointer;"
                        data-bs-toggle="modal" data-bs-target="#refuse">
                        les colis refusé <i
                            class="fa-solid fa-bell {{ $refuse->count() > 0 ? 'fa-shake' : '' }}"></i>({{ $refuse->count() }})
                    </button>
                    <div class="modal fade" id="refuse" tabindex="-1" role="dialog" aria-labelledby="refuse"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header p-2"
                                    style="background-color: rgb(218, 42, 101); color : white ;">
                                    <h3 class="modal-title fs-3">Colis Refusé</h3>
                                    <button type="button" class="btn"
                                        style="background-color: rgb(218, 42, 101);" style="cursor: pointer;"
                                        class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <span class="fs-3" aria-hidden="true"><i class="fa fa-close"></i></span>
                                    </button>
                                </div>
                                <div class="modal-body">



                                    <div>
                                        @if ($refuse->count() > 0)
                                        <div style="overflow-x: scroll">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th scope="col">#</th>
                                                        <th scope="col">Livreur</th>
                                                        <th scope="col">Destinataire</th>
                                                        <th scope="col">code</th>
                                                        <th scope="col">magasin</th>
                                                        <th scope="col">Commentaire</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($refuse as $r)
                                                        <tr class="text-center">
                                                            <td>
                                                                {{ $r->id }}
                                                            </td>
                                                            <td style="width: 200px;">
                                                                <small
                                                                    style="border-radius: 10px;color:white;background-color: #4ce0a3;  padding:5px;">
                                                                    <i class="fa-solid fa-motorcycle"></i>
                                                                    {{ $r->coli->deliverymen->firtsName . ' ' . $r->coli->deliverymen->lastName }}
                                                                </small>
                                                            </td>
                                                            <td>
                                                                {{$r->coli->Name}}
                                                            </td>
                                                            <td>
                                                                {{$r->coli->code}}
                                                            </td>
                                                            <td>
                                                                {{$r->coli->magasin}}
                                                            </td>
                                                            <td>
                                                                <textarea readonly cols="20" rows="2" class="form-control">
                                                        {{ $r->comment }}
                                                      </textarea>
                                                            </td>
                                                            <td>
                                                                <small
                                                                    style="border-radius: 10px;border:1px solid rgb(238, 201, 38) ;background-color: #daee6a;font-weight: 700  ;padding:5px;">
                                                                    {{ $r->status }}
                                                                </small>

                                                            </td>
                                                            <td>
                                                                {{ $r->created_at }}
                                                            </td>
                                                            <td class="actions">
                                                                <a href="#" class="button" id="accept"><span>
                                                                        accepter</span></a>
                                                                <a href="#" class="button" id="reject"></><span>
                                                                        refuser</span></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                        @else
                                            <div class="wrapper-info">
                                                <div class="card">
                                                    <div class="row w-100 align-items-center">
                                                        <div class="icon col-2"><i class="fas fa-info-circle"></i>
                                                        </div>
                                                        <div class="subject col-10">
                                                            <h3 class="text-primary">Info</h3>
                                                            <p class="text-info">there is yet no refused parcels </p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        @endif

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="main-datatable"
        style="border-top:4px solid orange ;border-radius: 2px ; box-shadow: 0px 3px 3px rgb(175, 175, 175) ; background-color: white; padding: 55px;overflow-x: scroll;">

        <div class="table-responsive">
            <table id="example" class="table table-bordered cust-datatable dataTable">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all"></th>
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
<script src="{{ asset('assets/js/parcels.js') }}"></script>

<script></script>
