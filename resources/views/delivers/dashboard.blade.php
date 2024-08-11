<style>
    .modal-body {
        background-color: #fff;
        border-color: #fff;
    }

    .close {
        color: #000;
        cursor: pointer;
    }

    .close:hover {
        color: #000;
    }

    .theme-color {
        color: rgb(175, 122, 23);
    }

    hr.new1 {
        border-top: 2px dashed #fff;
        margin: 0.4rem 0;
    }

    #session.overflow {
        padding: 10px;
        overflow-y: scroll;
    }
</style>

<x-deliver-layout>
<div id="loaderHolder" style="display: none" class="loading">
        <p class="loader"></p>
    </div>
    @if (session()->has('success'))
        <script>
            document.querySelector("div#loaderHolder").style.display="none"

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.success("bien");

        </script>
    @endif
    <div class="row mt-5 mx-auto">
        <div id="session" class="w-100" style="height: 90vh;">
            @if ($colis->count() > 0)
                @foreach ($colis as $coli)
                    @if (!$coli->complaint && $coli->status !== 'Livre')
                        <div class="card mt-">
                            <div class="card-body">
                                <div class="row justify-content-between align-items-center mb-3">
                                    <div class="col-6 text-start">
                                        <p class="card-text" style="font-size: 15px;">{{ $coli->magasin }}</p>
                                    </div>
                                    <div class="col-4 text-right">
                                        <button type="button" style="background-color: white;" class="btn border-0"
                                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            <i class="icon ph-bold ph-info"
                                                style="color: orange; font-size: 35px; cursor: pointer;"></i>
                                        </button>
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="border-0 btn bg-light btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"
                                                            style="cursor: pointer;">
                                                            <i style="font-size: 30px;"
                                                                class="icon ph-bold ph-x text-danger"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        
                                                        <div class="px-4 py-5">
                                                            <h5 class="text-uppercase">Client : {{ $coli->Name }}</h5>
                                                            <span class="theme-color d-inline-block w-75 mx-auto">Coli
                                                                code : {{ $coli->id }}</span>
                                                            <div class="mb-3">
                                                                <hr class="new1">
                                                            </div>
                                                            <div class="d-flex justify-content-between">
                                                                <span class="font-weight-bold">Ville :
                                                                    {{ $coli->destination }}</span>
                                                                <span class="text-muted">Prix : {{ $coli->price }}
                                                                    DH</span>
                                                            </div>
                                                            <div class="d-flex justify-content-between">
                                                                <small>Telephone : <a
                                                                        href="tel:{{ $coli->phone_number }}">{{ $coli->phone_number }}</a></small>
                                                            </div>
                                                            <div class="d-flex justify-content-between">
                                                                <small>La date :</small>
                                                                <small>{{ $coli->created_at }}</small>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-3">
                                                                <span class="font-weight-bold">Magasin :</span>
                                                                <span
                                                                    class="font-weight-bold theme-color">{{ $coli->magasin }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mx-auto justify-content-around">
                                    <x-modal :coli='$coli->id'>
                                        <form action="{{ route('colis.status', ['id' => $coli->id]) }}" method="POST">
                                            @csrf
                                            <div>
                                                <div class="row justify-content-center">
                                                    <div class="col-3">
                                                        <img src="{{ asset('/assets/images/profile.png') }}"
                                                            alt="" width="70" height="70">
                                                    </div>
                                                </div>
                                                <h5 class="pt-1 my-3">
                                                    {{ auth()->user()->deliverymen->firtsName . ' ' . auth()->user()->deliverymen->lastName }}
                                                </h5>

                                                <div data-mdb-input-init class="form-outline mb-4">
                                                    <select id="status" class="form-control" name="status"
                                                        data-size="4">
                                                        <option value="">Select Status</option>
                                                        <option value="Livre">Livre</option>
                                                        <option value="Reporte">Reporte</option>
                                                        <option value="Annule">Annule</option>
                                                        <option value="Refuse">Refuse</option>
                                                    </select>
                                                    <label class="form-label" for="name4">Status</label>
                                                </div>
                                                <div id="cmt" style="display: none;" class="form-outline mb-4">
                                                    <textarea id="comment" name="comment" rows="4" class="form-control"></textarea>
                                                    <label class="form-label" for="comment">Commentaire</label>
                                                </div>


                                                <!-- Submit button -->
                                                <button type="submit" id="sub" class="btn text-light"
                                                    style="background-color: orange; cursor: pointer;">Valider</button>
                                            </div>
                                        </form>

                                    </x-modal>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <p class="alert alert-warning">no parcel remains</p>
            @endif
            <p id="alrt" style="display: none;" class="alert alert-warning">There is no colis for today</p>
        </div>
    </div>

    <script>
        if ($("#session").height() >= 500) {
            $("#session").addClass("overflow");
        }
        if ($("#session").children().length === 1) {
            $("p#alrt").css("display", "block")
            console.log($("#session").children().length);
        }

        $("#status").on("change", function() {
            if ($("#status").val() === "Reporte" || $("#status").val() === "Annule" || $("#status").val() ===
                "Refuse") {
                $("#cmt").css("display", "block");
            } else {
                $("#cmt").css("display", "none");
            }
        });
        $("#sub").click(function(){
            document.querySelector("div#loaderHolder").style.display="flex";

        })
    </script>
</x-deliver-layout>
