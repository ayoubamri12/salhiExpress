@props(['qr_code','code'])
<div>
    <!-- Button trigger modal -->
    <button  type="button"  class="btn btn-primary btn-sm view-qr-code"
        style="color: white;
font-weight: bold; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#staticBackdrop5">
                           <i class="fa fa-qrcode"></i> View QR Code

    </button>

    <!-- Modal -->
    <div  class="modal top fade" id="staticBackdrop5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered text-center d-flex justify-content-center">
            <div class="modal-content w-100">
                <div class="modal-header">
                    <button type="button" class="border-0 btn bg-light btn-close" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer;">
                        <i class="icon ph-bold ph-x"></i>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <div class="row mb-4 text-center">
                        <h3>Code : {{$code}}</h3>
                    </div>
                    <div>
                        {{
                            QrCode::size(200)
                                    ->generate($qr_code);         
                        }}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>   
</div>
