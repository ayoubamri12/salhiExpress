
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
            },
            data: function(d) {
                d.code = $('#code-filter').val();
                d.created_at = $('#date-filter').val();
                d.magasin = $('#magasin-filter').val();
            },
            beforeSend: function() {
                $('#loaderHolder').show();

            },
            complete: function() {
                $('#loaderHolder').hide();
                $(".row-checkbox").on('change', function() {
                    console.log($('#shipbtn'));
                    if ($(".row-checkbox:checked").length > 0)
                        $('#shipbtn').show()
                    else
                        $('#shipbtn').hide()

                })
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
                    return `<input type="checkbox" value=${row.id} class="row-checkbox">`;
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
                                         <a href='#' style="color: white;
                                font-weight: bold; cursor: pointer;" class="btn btn-danger btn-sm" >
                                    <i class="fa-solid fa-pen-to-square"></i>          
                                </a>
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
        table.ajax.reload();
    });

    $('#refresh-btn').on('click', function() {
        $('#code-filter').val('');
        $('#date-filter').val('');
        $('#magasin-filter').val('');
        table.ajax.reload();

    });
    // Select all functionality
    $('#select-all').on('change', function() {
        $('.row-checkbox').prop('checked', this.checked);
        if ($(".row-checkbox:checked").length > 0)
            $('#shipbtn').show()
        else
            $('#shipbtn').hide()

    });
    $('#update-selected').on('click', function() {
        var selectedIds = [];
        $('.row-checkbox:checked').each(function() {
            selectedIds.push($(this).val());
        });
        console.log(selectedIds);
        if (selectedIds.length > 0) {
            $('#loaderHolder').show();
            $.ajax({
                url: '/api/set_pacels_shipped',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    ids: selectedIds,
                    delivery_id: $('#delivery-filter').val()
                },
                success: function(response) {
                    $('#modalCls').click();
                    $('#loaderHolder').hide();
                    $('#shipbtn').hide()
                    table.ajax.reload();
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
                    toastr.success("parcel has been shipped successfully");
                },
                error: function(xhr, status, error) {
                    $('#loaderHolder').hide();

                }
            });
        }
    });
