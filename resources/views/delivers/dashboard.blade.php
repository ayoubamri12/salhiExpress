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

    <div style="width: 95%;" class="row mt-5 mx-auto">
        <div id="session" class="w-100" style="height: 90vh ;">
            @if ($colis->count() > 0)
                @foreach ($colis as $coli)
                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="row justify-content-between align-items-center mb-3">
                                <div class="col-6">
                                    <p class="card-text">produite : {{ $coli->product }}</p>
                                </div>
                                <div class="col-4 text-right">
                                    <button type="button" style="background-color: white;" class="btn border-0 "
                                        data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i
                                            class="icon ph-bold ph-info"
                                            style="color: orange; font-size: 35px; cursor: pointer;"></i>
                                    </button>
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">

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
                                                <div class="modal-body ">
                                                    <div class="text-right"> <i class="fa fa-close close"
                                                            data-dismiss="modal"></i> </div>

                                                    <div class="px-4 py-5">

                                                        <h5 class="text-uppercase">Jonathan Adler</h5>



                                                        <h4 class="mt-5 theme-color mb-5">Thanks for your order</h4>

                                                        <span class="theme-color">Payment Summary</span>
                                                        <div class="mb-3">
                                                            <hr class="new1">
                                                        </div>

                                                        <div class="d-flex justify-content-between">
                                                            <span class="font-weight-bold">Ether Chair(Qty:1)</span>
                                                            <span class="text-muted">$1750.00</span>
                                                        </div>

                                                        <div class="d-flex justify-content-between">
                                                            <small>Shipping</small>
                                                            <small>$175.00</small>
                                                        </div>


                                                        <div class="d-flex justify-content-between">
                                                            <small>Tax</small>
                                                            <small>$200.00</small>
                                                        </div>

                                                        <div class="d-flex justify-content-between mt-3">
                                                            <span class="font-weight-bold">Total</span>
                                                            <span class="font-weight-bold theme-color">$2125.00</span>
                                                        </div>



                                                        <div class="text-center mt-5">


                                                            <button class="btn"
                                                                style="background-color: orange;">Track your
                                                                order</button>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row mx-auto justify-content-around">
                                <x-modal>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <select class="form-control" data-size="4">
                                            <option value="">Select Custom Field</option>
                                            <option value="nickname">nickname</option>
                                            <option value="first_name">first_name</option>
                                            <option value="last_name">last_name</option>
                                            <option value="syntax_highlighting">syntax_highlighting</option>
                                            <option value="_ppm_wp_password_expired">_ppm_wp_password_expired
                                            </option>
                                            <option value="_ppm_wp_delayed_reset">_ppm_wp_delayed_reset</option>
                                            <option value="wc_last_active">wc_last_active</option>
                                            <option value="last_update">last_update</option>

                                        </select>
                                        <label class="form-label" for="name4">Etat</label>
                                    </div>


                                    <!-- textarea input -->
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <textarea id="textarea4" rows="4" class="form-control"></textarea>
                                        <label class="form-label" for="textarea4">Commentainre</label>
                                    </div>

                                </x-modal>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="alert alert-warning">There is no colis fr today</p>
            @endif
        </div>
    </div>

    <script>
                if ($("#session").height() >= "500")
                    $("#session").addClass("overflow")
            
       
    </script>
</x-deliver-layout>
