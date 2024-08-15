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
            url: "/api/parcels",
            type: "GET",
            dataSrc: function(json) {
                return json;
            },
            data: function(d) {
                d.code = $('#code-filter').val();
                d.created_at = $('#date-filter').val();
                d.magasin = $('#magasin-filter').val();
                d.state = $('#state-filter').val();
                d.status = $('#status-filter').val();
                d.delivery = $('#delivery-filter').val();
              },beforeSend: function() {
                        $('#loaderHolder').show();
                    },
                    complete: function() {
                        $('#loaderHolder').hide();
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
        columns: [
            {
                data: "code",
                render:function(data,type,row){
                    console.log(row.deliverymen);
                  return  `           
                            <p>${row.code}</p>
                            <p class="badge badge-info"><i class="fa-solid fa-motorcycle"></i>
                                ${row.deliverymen.firtsName} ${row.deliverymen.lastName }</p>
                    `    
                        
                       
                }
            },
            {
                data: 'created_at',
                render: function(data, type, row) {
                    var createdAt = new Date(data);
                    return createdAt.toLocaleDateString();
                }
            },
            {
                data: "phone_number",
                render:function(data,type,row){
                  return  `           
                     
                            <p>client : ${row.Name }</p>
                            <p>${row.phone_number }</p>
                    `    
                        
                       
                }
            },
            {
                data: "magasin"
            },
            {
                data:'state'
                ,
                render:function(data,type,row){
                    return `            
                            ${row.state == 'paye' ? `<p class="badge badge-success">${row.state }</p>` : row.state == 'Non paye' ? `<p class="badge badge-danger">${row.state }</p>` : ` <p class="badge badge-primary">${row.state }</p>`}       
                    `
                }
            },
            {
                data:'status'
                ,
                render:function(data,type,row){
                    return `            
                   
                            ${
                                row.status == 'Livre' ?  `<p class="badge badge-success">${row.status }</p>` : row.status == 'Annule' ? `<p class="badge badge-danger">${row.status }</p>`:row.complaint&&row.complaint.req_state == 'approved' ?`<p class="badge badge-warning">${row.status }</p>
                                <p class="badge badge-outline-danger" style="color:orange;">comment :
                                     ${row.complaint.comment } <br/>${row.delay } </p>
                               `:` <p class="badge badge-primary">${row.status }</p>`
                            }
                           
                    `
                }
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
                       <canvas class='qr_code'></canvas>
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
        table.ajax.reload();
    });
    
    $('#refresh-btn').on('click', function() {
        $('#code-filter').val('');
        $('#date-filter').val('');
        $('#magasin-filter').val('');
        table.ajax.reload();

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