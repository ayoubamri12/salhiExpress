<style>
    @media (max-width: 600px) {
        h1 {
            font-size: 1.5em;
        }

       .ctr{
        width: 75%;
       }

        #qr-code-result {
            font-size: 1em;
        }
    }
</style>
<x-deliver-layout>
    <div class="ctr">
        <div class="card mt-5">
            <div class="card-header" style="background-color: orange;">
                <h1>Scan QR Code <i class="fa fa-qrcode"></i></h1>
            </div>
            <div class="card-body">
                <div id="qr-code-result"></div>
                <div style="display: flex;justify-content: center;">
                    <div id="qr-code-reader" style="width: 500px;"></div>
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
