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
</style>

<x-deliver-layout>
    <div id="loaderHolder" style="display: none" class="loading">
        <p class="loader"></p>
    </div>
    @if (session()->has('success'))
        <script>
            document.querySelector("div#loaderHolder").style.display = "none"
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
    <div id="parent" class="mt-5 mx-auto" style="width:100%;padding:15px;">
        <div class="my-2">
            <p  style="color: rgb(165, 165, 165)">Nombre de colis : {{ $colis->count() }} </p>
        </div>
        @if ($colis->count() > 0)
            @foreach ($colis as $coli)
                @if (!$coli->complaint)
                    <div>
                        <p style="color: rgb(165, 165, 165)">Reporté a : {{ $coli->delay }} :</p>
                    </div>

                    <div class="card my-2">
                        <div class="card-header border-0 p-0 bg-light d-flex justify-content-end">

                            <button type="button" class="btn btn-light border-0" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop{{ $coli->id }}">
                                <i class="icon ph-bold ph-info"
                                    style="color: orange; font-size: 35px; cursor: pointer;"></i>
                            </button>
                            <div class="modal fade" id="staticBackdrop{{ $coli->id }}" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="border-0 btn bg-light btn-close"
                                                data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer;">
                                                <i style="font-size: 30px;" class="icon ph-bold ph-x text-danger"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="px-4 py-5">
                                                <h5 class="text-uppercase">Client : {{ $coli->Name }}</h5>
                                                <span class="theme-color d-inline-block w-75 mx-auto">Coli
                                                    code : {{ $coli->code }}</span>
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
                                                    <small><i class="fab fa-whatsapp"></i> WhatsApp :<a
                                                            href="https://wa.me/{{ $coli->phone_number }}?text=Hello%20there!"
                                                            target="_blank">{{ $coli->phone_number }}</a></small>
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
                        <div class="card-body bg-light">
                            <div class="row justify-content-start align-items-center mb-3">
                                <div class="col-6 text-start">
                                    <p style="font-size: 11px;color:gray;">Client :{{ $coli->Name }} <br> Code colis
                                        :{{ $coli->code }}</p>
                                </div>
                            </div>
                            <div class="row mx-auto justify-content-around">
                                <x-modal :coli='$coli->id'>
                                    <form action="{{ route('colis.status', ['id' => $coli->id]) }}" method="POST">
                                        @csrf
                                        <div class="">
                                            <div class="row justify-content-center">
                                                <div class="col-3">
                                                    <img src="{{ asset('/assets/images/profile.png') }}" alt=""
                                                        width="70" height="70">
                                                </div>
                                            </div>
                                            <h5 class="pt-1 my-3">
                                                {{ auth()->user()->deliverymen->firtsName . ' ' . auth()->user()->deliverymen->lastName }}
                                            </h5>

                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <select class="form-control" name="status" data-size="4">
                                                    <option value="">Select Status</option>
                                                    <option value="livré">Livré</option>
                                                    <option value="Reporté">Reporté</option>
                                                    <option value="Annulé">Annulé</option>
                                                    <option value="Refusé">Refusé</option>
                                                </select>
                                                <label class="form-label" for="name4">Status</label>
                                            </div>
                                            <div class="cmt" style="display: none; margin-bottom:20px">
                                                <textarea id="comment" name="comment" rows="4" class="form-control"></textarea>
                                                <label class="form-label" for="comment">Commentaire</label>
                                            </div>


                                            <!-- Submit button -->
                                            <button data-bs-dismiss="modal" aria-label="Close" type="submit"
                                                id="sub" class="btn text-light"
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
            <p class="alert alert-warning">no delayed parcels for today</p>
        @endif
        <p id="alrt" style="display: none;" class="alert alert-warning">no delayed parcels for today</p>
    </div>

    <script>
        if ($("#parent").children().length === 1) {
            $("p#alrt").css("display", "block")
            console.log($("#parent").children().length);
        }

        $("select[name=status]").on("change", function() {
            if ($(this).val() === "Reporté" || $(this).val() === "Annulé" || $(this).val() ===
                "Refusé") {
                $(this).parent().next("div.cmt").css("display", "block");
                console.log($(this).parent().next("div.cmt"));
            } else {
                $(this).parent().next("div.cmt").css("display", "none");
                 console.log($(this).parent().next("div.cmt"));
            }
        });

        $("#sub").click(function() {
            document.querySelector("div#loaderHolder").style.display = "flex";
        })
    </script>
</x-deliver-layout>
