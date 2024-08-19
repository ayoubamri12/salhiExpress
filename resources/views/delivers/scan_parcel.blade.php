<style>
    @media (max-width: 600px) {
        h1 {
            font-size: 1.5em;
        }

        .ctr {
            width: 100%;
            height: 100vh;
            display: flex;
            flex: column;
            justify-content: center;
            align-items: center;
        }

        #qr-code-result {
            font-size: 1em;
        }
    }
</style>
<x-deliver-layout>
    <div class="ctr">
        <div class="card">
            <div class="card-header" style="background-color: orange;">
                <h3>Scan QR Code <i class="fa fa-qrcode"></i></h3>
            </div>
            <div class="card-body d-flex justify-content-center">
                <button type="button" class="btn"
                    style="color: white;
font-weight: bold; cursor: pointer; background-color:  rgb(83, 218, 42);"
                    data-bs-toggle="modal" data-bs-target="#staticBackdrop5">
                    <i class="fa fa-qrcode"></i> Scanning Qr Code
                </button>

                <!-- Modal -->
                <div class="modal top fade" id="staticBackdrop5" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered text-center d-flex justify-content-center">
                        <div class="modal-content w-100">
                            <div class="modal-header">
                                <button type="button" class="border-0 btn bg-light btn-close" data-bs-dismiss="modal"
                                    aria-label="Close" style="cursor: pointer;">
                                    <i class="icon ph-bold ph-x"></i>

                                </button>
                            </div>
                            <div class="modal-body p-4">
                                <div class="row justify-content-center mb-4">
                                    <h5 style="color:orange;"><i class="fa fa-qrcode"></i> Scan QR Code through camera or image</h5>
                                </div>
                                <div style="">

                                    <div id="qr-code-result"></div>
                                    <div style="box-shadow: 8px 8px gray; border-radius: 10px; display: flex;justify-content: center;">
                                        <div id="qr-code-reader" style="width: 500px;"></div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-deliver-layout>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
    const ready = document.getElementById('qr-code-reader');
    const result = document.getElementById('qr-code-result');

    function demoReady(fn) {
        if (document.readyState === "complete" || document.readyState === "interactive") {
            setTimeout(fn, 1);
        } else
            document.addEventListener("DOMContentLoaded", fn)

    }

    demoReady(function() {
        let lastResult, counter = 0;

        function onScanSuccess(decodeText, decodeResult) {
            if (decodeText !== lastResult) {
                ++counter;
                lastResult = decodeText
                console.log("qr code" + decodeText, decodeResult);
                result.innerHTML = 'you scan ' + counter + " " + decodeText
            }
        }
        let htmlscanner = new Html5QrcodeScanner("qr-code-reader", {
            fps: 20,
            qrbox: 300
        })
        htmlscanner.render(onScanSuccess);
    })
    /* const html5QrCode = new Html5Qrcode("qr-code-reader");
             const fileinput = document.getElementById('qr-input-file'); fileinput.addEventListener('change', e => {
                 if (e.target.files.length == 0) {
                     return;
                 }

                 const imageFile = e.target.files[0];
                 html5QrCode.scanFile(imageFile, true)
                     .then(decodedText => {
                         console.log(decodedText);
                     })
                     
             });*/
</script>
