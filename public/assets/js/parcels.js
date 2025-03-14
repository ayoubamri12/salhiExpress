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
let start, end;

function showParcelDetails(code) {
    $.ajax({
        url: `/parcels/${code}`, // Adjust this to match your route for showing parcel details
        method: 'GET',
        success: function(data) {
            console.log('Parcel details:', data);
            if (data) {
                const detailsHtml = `
                    <p><strong>Code:</strong> ${data.code}</p>
                    <p><strong>Destination:</strong> ${data.destination}</p>
                    <p><strong>Phone Number:</strong> ${data.phone_number}</p>
                    <p><strong>Name:</strong> ${data.name}</p>
                    <p><strong>State:</strong> ${data.state}</p>
                    <p><strong>Status:</strong> ${data.status}</p>
                    <p><strong>Price:</strong> ${data.price}</p>
                    <p><strong>Store:</strong> ${data.magasin}</p>
                    <p><strong>Address:</strong> ${data.address}</p>
                    <p><strong>Accessibility:</strong> ${data.accessibility}</p>
                    <p><strong>Changeable:</strong> ${data.changable}</p>
                    <p><strong>Shipping Date:</strong> ${data.shipping_date ? new Date(data.shipping_date).toLocaleDateString() : 'N/A'}</p>
                `;
                $('#parcelDetailsContent').html(detailsHtml);
                $('#parcelDetailsModal').modal('show');
            } else {
                alert('No parcel found with this code.');
            }
        },
        error: function(xhr) {
            console.error(xhr.responseText);
            alert('Failed to retrieve parcel details.');
        }
    });
}



function showDeliveryNumber(deliverymanId) {
    $.ajax({
        url: `/deliverymen/${deliverymanId}/number`, // Make sure this matches your route
        method: 'GET',
        success: function(data) {
            console.log(data); // Log the entire response

            // Check if the response contains the phone number
            if (data.phone_number) {
                // Format the number for WhatsApp
                const formattedNumber = '+212' + data.phone_number.replace(/^\+|[^0-9]/g, ''); // Remove any non-numeric characters
                const whatsappUrl = `https://wa.me/${formattedNumber}`;

                // Open the WhatsApp chat link in a new tab
                window.open(whatsappUrl, '_blank');
            } else {
                alert('No phone number found.');
            }
        },
        error: function(xhr) {
            // Log the response for better error handling
            console.error(xhr.responseText);
            alert('Failed to retrieve deliveryman information.');
        }
    });
}


function cb(st, ed) {
    $('#reportrange span').html(st.format('MMMM D, YYYY') + ' - ' + ed.format('MMMM D, YYYY'));
    start = st.format('YYYY-MM-DD')
    end = ed.format('YYYY-MM-DD')
}

$('#reportrange').daterangepicker({
    startDate: moment('2024-08-01'),
    endDate: moment(),
    ranges: {

        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), , moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
        'This Year': [moment().startOf('year'), moment()],
        'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
        'From 2022 to Now': [moment('2022-01-01'), moment()]
    },

}, cb);
cb(moment('2024-08-01'), moment());
var table = $('table#example').DataTable({
    responsive: true,
    searching: true,
    ajax: {
        url: "/api/parcels",
        type: "GET",
        dataSrc: function (json) {
            return json;
        },
        data: function (d) {
            d.code = $('#code-filter').val();
            d.created_at = [start, end];
            d.magasin = $('#magasin-filter').val();
            d.state = $('#state-filter').val();
            d.status = $('#status-filter').val();
            d.delivery = $('#delivery-filter').val();
        }, beforeSend: function () {
            $('#loaderHolder').show();
        },
        complete: function () {
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
    columns: [{
        data: null,
        render: function(data, type, row) {
            return `  <input type="checkbox" value=${row.id} class="row-checkbox">`;
        }
    },
        {
            data: "code",
            render: function (data, type, row) {
                console.log(row.deliverymen);
                return `           
                            <p>${row.code}</p>
                            <p class="badge badge-info"><i class="fa-solid fa-motorcycle"></i>
                                ${row.deliverymen.firtsName} ${row.deliverymen.lastName}</p>
                    `


            }
        },
        {
            data: 'shipping_date',
            render: function (data, type, row) {
                var createdAt = new Date(data);
                return createdAt.toLocaleDateString();
            }
        },
        {
            data: "phone_number",
            render: function (data, type, row) {
                return `           
                     
                            <p>client : ${row.Name}</p>
                            <p>${row.phone_number}</p>
                    `


            }
        },
        {
            data: "magasin"
        },
        {
            data: 'state'
            ,
            render: function (data, type, row) {
                return `            
                            ${row.state == 'payé' ? `<p class="badge badge-success">${row.state}</p>` : row.state == 'Non payé' ? `<p class="badge badge-danger">${row.state}</p>` : ` <p class="badge badge-primary">${row.state}</p>`}       
                    `
            }
        },
        {
            data: 'status'
            ,
            render: function (data, type, row) {
                return `            
                   
                            ${row.status == 'livré' ? `<p class="badge badge-success">${row.status}</p>`  : row.complaint && row.complaint.req_state == 'approved' ? `<p class="badge badge-warning p-1">${row.status} <br/><br/>${row.status=="Reporté"&& "Date : "+ new Date(row.delay).toLocaleDateString()}</p>
                                <small class="" style="color:gray;">comment :
                                     ${row.complaint.comment}</small>
                               `: ` <p class="badge badge-primary">${row.status}</p>`
                    }
                           
                    `
            }
        },
        {
            data: "destination"
        },
        {
            data: "price",
            render : (data,type,row)=>{
                return `
                    <p>${row.price} DH </p>
                `
            }
        },
        {
            data: 'qr_code',
            render: function (data, type, row) {
                let messageUrl = `{{ route('deliverymen.sendMessage', ':id') }}`;
                messageUrl = messageUrl.replace(':id', row.id);
                return `
                <div class="btn-group">
                    <button  type="button"  class="btn btn-primary btn-sm view-qr-code"
                            style="color: white;
                                font-weight: bold; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#staticBackdrop${row.code}">
                           <i class="fa fa-qrcode"></i>QR 

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
                                    <button class="btn btn-info" onclick="showParcelDetails('260994')">Show Details</button>
                                    <a class="dropdown-item" href="#" onclick="showDeliveryNumber(${row.deliverymen_id})"><i class="bx bxs-chat mr-2"></i> Chat on WhatsApp</a>
                                   
    
                                    </div>
                              </div>
                </div>
              `;
            }
        }
    ],
    initComplete: function () {
        this.api().columns().every(function () {
            var column = this;
            $('td', column.header()).each(function () {
                $(this).append('<span class="sort-icon"></span>');
            });
        });
        this.api().rows().every(function () {
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
        $(".row-checkbox").on('change', function() {
            console.log($('#shipbtn'));
            if ($(".row-checkbox:checked").length > 0)
                $('#shipbtn').show()
            else
                $('#shipbtn').hide()

        })
    }

});
$('#filter-btn').on('click', function () {
    table.ajax.reload();
});

$('#refresh-btn').on('click', function () {
    $('#code-filter').val('');
    $('#magasin-filter').val("");
    $('#state-filter').val("");
    $('#status-filter').val("");
     $('#delivery-filter').val("");
    cb(moment('2024-08-01'), moment())
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