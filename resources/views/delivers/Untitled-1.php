<div class="card my-2">
                        <div class="card-header border-0 p-0 bg-light d-flex justify-content-end">

                            <button type="button" class="btn btn-light border-0">
                                <i class="icon ph-bold ph-info"
                                    style="color: orange; font-size: 35px; cursor: pointer;"></i>
                            </button>
                            


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