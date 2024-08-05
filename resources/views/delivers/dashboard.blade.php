
	
<x-deliver-layout>
    <div class="container mt-5">
        <div class="row mx-auto">
            <div class="w-100">
                @foreach ($delivery[0]->colis as $coli)
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-between align-items-center mb-3">
                            <div class="col-10">
                                <p class="card-text">produite : {{$coli->product}}</p>
                            </div>
                            <div class="col-2 text-right">
                                <a href="#"><i class="icon ph-bold ph-info" style="color: orange; font-size: 35px"></i></a>
                            </div>
                        </div>
                        <div class="row w-75 mx-auto" style="gap: 2px;">
                            <div style="width: 20%;" class="mb-2">
                                <a href="#" style="font-size:35px;color: green; " class="btn border border-0 outline-0" data-mdb-ripple-init> <i class="icon ph-bold ph-check-circle"></i></a>
                            </div>
                            <div style="width: 20%;" class="mb-2">
                                <a href="#" style="font-size:35px;color: red; " class="btn border border-0 outline-0" data-mdb-ripple-init> <i class="icon ph-bold ph-x-circle"></i></a>
                            </div>
                            <div style="width: 20%;" class="mb-2">
                                <a href="#" style="font-size:35px;color: rgb(168, 168, 46); " class="btn border border-0 outline-0" data-mdb-ripple-init> <i class="icon ph-bold ph-arrow-arc-left"></i></a>
                            </div>
                            <div style="width: 20%;" class="mb-2">
                                <a href="#" style="font-size:35px;color: blue; " class="btn border border-0 outline-0" data-mdb-ripple-init> <i class="icon ph-bold ph-prohibit"></i></a>
                            </div>
                        </div>
                    </div>
                        </div>
                @endforeach
            </div>
        </div>
    </div>
</x-deliver-layout>
