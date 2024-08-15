<style>
    .badge-orange {
        background-color: orange;
    }

    .focus {
        border-color: orange;
        box-shadow: 0 0 0 0.2rem rgba(255, 69, 0, 0.25);
    }

    .badge.badge-outline-danger {
        border: .5px solid orange;
    }

    .dataTables_wrapper {
        width: 100%;
    }

    table.dataTable {
        width: 100% !important;
    }


    .main-datatable .dataTable.no-footer {
        border-bottom: 1px solid #eee;
    }

    .main-datatable .cust-datatable thead {
        background-color: #f9f9f9;
    }

    .main-datatable .cust-datatable>thead>tr>th {
        color: #443f3f;
        padding: 16px 15px;
        vertical-align: middle;
        padding-left: 18px;
        text-align: center;
    }

    .main-datatable .cust-datatable>tbody td {
        padding: 10px 15px 10px 18px;
        color: #333232;
        font-size: 13px;
        font-weight: 500;
        word-break: break-word;
        border-color: #eee;
        text-align: center;
        vertical-align: middle;
    }

    .main-datatable .cust-datatable>tbody tr {
        border-top: none;
    }

    .main-datatable .table>tbody>tr:nth-child(even) {
        background: #f9f9f9;
    }

    .main-datatable .dropdown_icon {
        display: inline-block;
        color: #8a8a8a;
        font-size: 12px;
        border: 1px solid #d4d4d4;
        padding: 10px 11px;
        border-radius: 50%;
        cursor: pointer;
    }


    .main-datatable .actionCust a {
        display: inline-block;
        color: #8a8a8a;
        font-size: 12px;
        border: 1px solid #d4d4d4;
        padding: 10px 11px;
        margin: -9px 3px;
        border-radius: 50%;
        cursor: pointer;
    }

    .main-datatable .actionCust a i {
        color: #8e8e8e;
        margin: 2px;
    }

    .main-datatable .dropdown-menu {
        padding: 0;
        border-radius: 4px;
        box-shadow: 10px 10px 20px #c8c8c8;
        margin-top: 10px;
        left: -65px;
        top: 32px;
    }

    .main-datatable .dropdown-menu>li>a {
        display: block;
        padding: 12px 20px;
        clear: both;
        font-weight: normal;
        line-height: 1.42857;
        color: #333333;
        white-space: nowrap;
        border-bottom: 1px solid #d4d4d4;
    }

    .main-datatable .dropdown-menu>li>a:hover,
    .main-datatable .dropdown-menu>li>a:focus {
        color: #fff;
        background: #007bff;
    }

    .main-datatable .dropdown-menu>li>a:hover i {
        color: #fff;
    }

    .main-datatable .dropdown-menu:before {
        position: absolute;
        top: -7px;
        left: 78px;
        display: inline-block;
        border-right: 7px solid transparent;
        border-bottom: 7px solid #d4d4d4;
        border-left: 7px solid transparent;
        border-bottom-color: #d4d4d4;
        content: '';
    }

    .main-datatable .dropdown-menu:after {
        position: absolute;
        top: -6px;
        left: 78px;
        display: inline-block;
        border-right: 6px solid transparent;
        border-bottom: 6px solid #ffffff;
        border-left: 6px solid transparent;
        content: '';
    }

    .main-datatable .dataTables_wrapper .dataTables_paginate .paginate_button {
        color: #999999 !important;
        background-color: #f6f6f6 !important;
        border-color: #d4d4d4 !important;
        border-radius: 40px;
        margin: 5px 3px;
    }

    .main-datatable .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        color: #fff !important;
        border: 1px solid orangered !important;
        background: orange !important;
        box-shadow: none;
    }

    .main-datatable .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .main-datatable .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        color: #fff !important;
        border-color: transparent !important;
        background: orange !important;
    }

    table.dataTable tr td {
        padding: 15px !important;
        font-size: 14px !important;
        font-weight: 600px;
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
                <input type="date" class="form-control" id="date-filter" placeholder="Date d'expedition">
            </div>

            <div class="col-md-3">
                <select class="form-control" id="magasin-filter">
                    <option value="">Nom du magasin</option>

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
            style="border-top:4px solid orange ;border-bottom:4px solid orange ;border-radius: 2px ; width:95%;">
            <div class="card w-100">
                <div class="card-body">
                    <button type="button" class="btn"
                        style="background-color: #ff7023; color: white; padding: 12px 25px; cursor: pointer;"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Ajouter
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #ed5809;">
                                    <h1 class="modal-title fs-3"id="exampleModalLabel">Add new Parcels</h1>
                                    <button type="button" class="btn" style="background-color: #ed5809;"
                                        style="cursor: pointer;" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span class="fs-3" aria-hidden="true"><i class="fa fa-close"></i></span>
                                    </button>
                                </div>
                                <div class="modal-body h-50 p-5">
                                    <div class="row w-75 mx-auto justify-content-between">
                                        <a href="{{ route('parcel.create') }}" class="btn btn-info">Ajouter
                                            manuellement</a>
                                        <a href="{{ route('parcel.create_with_excel') }}" class="btn btn-success"><i
                                                class="fa-solid fa-file-excel"></i> A travers excel</a>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-datatable"
            style="border-top:4px solid orange ;border-radius: 2px ; box-shadow: 0px 3px 3px rgb(175, 175, 175) ; background-color: white; padding: 55px;">

            <div class="table-responsive">
                <table id="example" class="table table-bordered cust-datatable dataTable">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAll"></th>
                            <th>code d&apos;envoi</th>
                            <th>Date d&apos;expedition</th>
                            <th>Telephone</th>
                            <th>Nom du magasin</th>
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

<script>
    /*  // Make rows draggable
      $(".draggable").draggable({
          helper: "clone",
          start: function(event, ui) {
              $(this).addClass("dragging");
          },
          stop: function(event, ui) {
              $(this).removeClass("dragging");
          }
      });

      // Make table sortable
      $('#example tbody').sortable({
          items: '.draggable',
          cursor: 'move',
          opacity: 0.6,
          update: function(event, ui) {
              var order = $(this).sortable('toArray', { attribute: 'data-id' });
              // Here, you can handle the new order
              console.log(order);
          }
      }).disableSelection();*/
    // Get the table element
    /* const $table = $('.table');

     $table.on('click', 'td', handleRowFocus);

     function handleRowFocus(event) {
         $(event.currentTarget).toggleClass('focus');
     }*/

    var table = $('table#example').DataTable({
        responsive: true,
        searching: true,
        ajax: {
            url: "/api/free_parcels",
            type: "GET",
            dataSrc: function(json) {
                return json;
            }
        },
        columnDefs: [{
            orderable: false,
            targets: [0]
        }],
        order: [
            [1, 'asc']
        ],
        paging: true,
        pageLength: 10,
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, 'All']
        ],
        pagingType: 'simple_numbers',
        searching: false,
        columns: [{
                data: null,
                render: function(data, type, row) {
                    return `<input type="checkbox" class="row-checkbox">`;
                }
            },
            {
                data: "code"
            },
            {
                data: 'created_at',
                render: function(data, type, row) {
                    var createdAt = new Date(data);
                    return createdAt.toLocaleDateString();
                }
            },
            {
                data: "phone_number"
            },
            {
                data: "magasin"
            },
            {
                data: "destination"
            },
            {
                data: "price"
            },
            {
                data: 'qr_code',
                render: function(data, type, row) {
                    return `
                <div class="btn-group">
                    <button  type="button"  class="btn btn-primary btn-sm view-qr-code"
        style="color: white;
font-weight: bold; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#staticBackdrop${row.code}">
                           <i class="fa fa-qrcode"></i> View QR Code

    </button>

    <!-- Modal -->
    <div  class="modal top fade" id="staticBackdrop${row.code}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered text-center d-flex justify-content-center">
            <div class="modal-content w-100">
                <div class="modal-header">
                    <button type="button" class="border-0 btn bg-light btn-close" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer;">
                        <i class="icon ph-bold ph-x"></i>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <div class="row mb-4 justify-content-center">
                        <h3>Code :${row.code}</h3>
                    </div>
                    <div>
                       <canvas  class='qr_code'></canvas>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>   
                  <div class="dropdown"> 
                                <button class="btn btn-sm dropdown-toggle" style="background-color: #fe8a39;" type="button" id="btn${row.code}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-horizontal-rounded"></i>          
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btn${row.code}">
                                    <a class="dropdown-item" href="#"><i class="bx bxs-trash mr-2"></i> Remove</a>
                                    <a class="dropdown-item" href="#"><i class="bx bxs-trash mr-2"></i> Remove</a>
                                    <a class="dropdown-item text-danger" href="#"><i class="bx bxs-trash mr-2"></i> Remove</a>
                                </div>
                              </div>
                </div>
              `;
                }
            }
        ],
        initComplete: function() {
            this.api().columns().every(function() {
                var column = this;
                $('td', column.header()).each(function() {
                    $(this).append('<span class="sort-icon"></span>');
                });
            });
            this.api().rows().every(function() {
                var row = $(this.node());
                var data = this.data();
                var qrious = new QRious({
                    element: row.find('canvas.qr_code')[0],
                    value: data.qr_code,
                    size: 200,
                    foreground: '#ffa500',
                });
                //   console.log(qrious);
            });
        }

    });
    $('#filter-btn').on('click', function() {
        var code = $('#code-filter').val();
        var date = $('#date-filter').val();
        var magasin = $('#magasin-filter').val();
        var filterData = '';
        if (code) {
            filterData += `code:${code}`;
        }
        if (date) {
            if (filterData) {
                filterData += ' and ';
            }
            filterData += `date:${date}`;
        }
        if (magasin) {
            if (filterData) {
                filterData += ' and ';
            }
            filterData += `magasin:${magasin}`;
        }

        table.search(filterData, true, false).draw();
        console.log(table.search(filterData, true, false).draw());
    });
    $('#refresh-btn').on('click', function() {
        $('#code-filter').val('');
        $('#date-filter').val('');
        $('#magasin-filter').val('');
        table.search('').columns().search('').draw();
    });
    // Select all functionality
    $('#selectAll').on('click', function() {
        var rows = table.rows({
            'search': 'applied'
        }).nodes();
        $('input[type="checkbox"]', rows).prop('checked', this.checked);
    });

    // Checkbox row selection
    $('#example tbody').on('change', 'input.row-checkbox', function() {
        if (!this.checked) {
            var el = $('#selectAll').get(0);
            if (el && el.checked && ('indeterminate' in el)) {
                el.indeterminate = true;
            }
        }
    });
</script>
