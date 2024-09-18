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
    .card {
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.card-header, .card-footer {
    background-color: #f8f9fa;
    padding: 10px 20px;
    border-bottom: 1px solid #ddd;
}

.card-header span, .card-footer span {
    font-weight: bold;
}

.card-body {
    padding: 20px;
}

.btn {
    margin-right: 5px;
}

.btn-sm {
    font-size: 0.9em;
    padding: 5px 10px;
}
.badge-outline-sucess{
    border: 1px solid rgb(82, 255, 47);
    color: rgb(82, 255, 47);
}
.btn-warning{
    background-color: rgb(252, 252, 67)
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
    <div id="parent" class="mt-2 mx-auto" style="width:100%;padding:15px;">
        <div class="my-1">
            <p  style="color: rgb(165, 165, 165)">Nombre de colis : {{ $colis->count() }} </p>
        </div>
        @if ($colis->count() > 0)
        <div class="filters mb-4">
            <input type="text" id="filter-phone" placeholder="Filter by Phone Number" class="form-control mb-2">
            <input type="text" id="filter-location" placeholder="Filter by Location" class="form-control mb-2">
            <button id="apply-filters" class="btn btn-primary">Apply Filters</button>
        </div>
        <div class="mb-4 w-25">
            <label for="items-per-page">Items Per Page:</label>
            <select id="items-per-page" class="form-select form-control w-auto d-inline-block">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="5" selected>5</option>
                <option value="10">10</option>
            </select>
        </div>
            @foreach ($colis as $coli)
                @if (!$coli->complaint)
                    <div>
                        <p style="color: rgb(165, 165, 165)">{{ $coli->created_at }} :</p>
                    </div>

                        <!-- Filters Section -->
                        
                        <!-- Cards Section -->
                        <div id="cards-container" class=" my-1">
                            <!-- Example Card -->
                            <div class="card" data-phone="0667639445" data-location="SAIDIA" data-price="550">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <span>📦 {{ $coli->code }}</span>
                                    <span class="badge badge-outline-sucess">Livré</span>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>📍 Salhi Berkane - (516) {{ $coli->created_at }}</span>
                                    </div>
                                    <div class="mt-3">
                                        <h5 class="mb-1"> {{ $coli->Name }}</h5>
                                        <p class="mb-1"><strong>0667639445</strong></p>
                                        <p class="mb-1">{{ $coli->destination }}</p>
                                        <h4 class="text-end">{{ $coli->price }} DH</h4>
                                    </div>
                                
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="col-5">
                                                <button class="btn btn-info btn-sm">📞 Vendeur B</button>
                                            <button class="btn btn-info btn-sm">📞 Vendeur P</button>
                                            </div>
                                           <div class="col-5">
                                            <button class="btn btn-success btn-sm">💬 Vendeur B</button>
                                            <button class="btn btn-success btn-sm">💬 Vendeur P</button>
                                           </div>
                                        </div>
                                        <div class="d-flex justify-content-start align-items-center mt-3">
                                            <button class="btn btn-primary btn-sm">🔄</button>
                                            <button class="btn btn-warning btn-sm my-1" data-bs-toggle="modal"
    data-bs-target="#staticBackdrop{{ $coli->id }}">👁️</button>
<div class="modal fade" id="staticBackdrop{{ $coli->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="border-0 btn bg-light btn-close" data-bs-dismiss="modal"
                    aria-label="Close" style="cursor: pointer;">
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
                        <small>Telephone : <a href="tel:{{ $coli->phone_number }}">{{ $coli->phone_number }}</a></small>
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
                        <span class="font-weight-bold theme-color">{{ $coli->magasin }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                                            <button class="btn btn-success btn-sm">🔧 Status</button>
                                        </div>
                                   
                                </div>
                            </div>
                            <!-- Add more cards as necessary -->
                        </div>
                    
                        <!-- Pagination Controls -->
                        
                        @endif
                        @endforeach
                        <div id="pagination-controls" class="d-flex justify-content-center mt-4">
                            <button id="prev-page"  style="background-color: orange; color: white; font-weight:bold;" class="btn me-2">Précédent</button>
                            <span id="page-info"></span>
                            <button id="next-page" style="background-color: orange; color: white; font-weight:bold;" class="btn ms-2">Suivant</button>
                        </div>
        @else
            <p class="alert alert-warning">no parcel remains</p>
        @endif
        <p id="alrt" style="display: none;" class="alert alert-warning">There is no parcels for today</p>
    </div>

    <script>
       $(document).ready(function() {
    var itemsPerPage = parseInt($('#items-per-page').val()); // Initial value from the dropdown
    var currentPage = 1;
    var totalPages = Math.ceil($('#cards-container .card').length / itemsPerPage);

    function showPage(page) {
        $('#cards-container .card').hide();
        $('#cards-container .card').slice((page - 1) * itemsPerPage, page * itemsPerPage).show();
        $('#page-info').text('Page ' + page + ' of ' + totalPages);
    }

    function updatePagination() {
        $('#prev-page').prop('disabled', currentPage === 1);
        $('#next-page').prop('disabled', currentPage === totalPages);
    }

    $('#prev-page').on('click', function() {
        if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
            updatePagination();
        }
    });

    $('#next-page').on('click', function() {
        if (currentPage < totalPages) {
            currentPage++;
            showPage(currentPage);
            updatePagination();
        }
    });

    $('#items-per-page').on('change', function() {
        itemsPerPage = parseInt($(this).val());
        totalPages = Math.ceil($('#cards-container .card').length / itemsPerPage);
        currentPage = 1;
        showPage(currentPage);
        updatePagination();
    });

    $('#apply-filters').on('click', function() {
        var phoneFilter = $('#filter-phone').val().trim();
        var locationFilter = $('#filter-location').val().toLowerCase().trim();

        $('#cards-container .card').each(function() {
            var card = $(this);
            var cardPhone = card.data('phone').toString();
            var cardLocation = card.data('location').toLowerCase();

            if ((phoneFilter === "" || cardPhone.includes(phoneFilter)) && 
                (locationFilter === "" || cardLocation.includes(locationFilter))) {
                card.show();
            } else {
                card.hide();
            }
        });

        // Update totalPages after filtering
        totalPages = Math.ceil($('#cards-container .card:visible').length / itemsPerPage);
        currentPage = 1;
        showPage(currentPage);
        updatePagination();
    });

    // Initial Setup
    showPage(currentPage);
    updatePagination();
});

    </script>
    <!--<script>
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
    </script>-->
</x-deliver-layout>
