<link rel="stylesheet" href="https://cdn.datatables.net/1.10.14/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,800&display=swap" rel="stylesheet">
<style>
    .p-30 {
        padding: 30px;
    }

    .card .main-datatable {
        width: fit-content;
        height: 80vh;
        margin: auto;
        padding: 15px;
        border: 1px solid #f3f2f2;
        border-bottom: 0;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, .05);
    }

    .d-flex {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .card_body {
        background-color: white;
        border: 1px solid transparent;
        border-radius: 2px;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    }

    .main-datatable .row {
        margin: 0;
    }

    .searchInput {
        width: 50%;
        display: flex;
        align-items: center;
        position: relative;
        justify-content: flex-end;
        margin: 20px 0px;
        padding: 0px 4px;
    }

    .searchInput input {
        border: 1px solid #e5e5e5;
        border-radius: 50px;
        margin-left: 8px;
        height: 34px;
        width: 100%;
        padding: 0px 25px 0px 10px;
        transition: all .6s ease;
    }

    .searchInput label {
        color: #767676;
        font-weight: normal;
    }

    .searchInput input:placeholder-shown {
        width: 13%;
    }

    .searchInput:hover input:placeholder-shown {
        width: 100%;
        cursor: pointer;
    }

    .searchInput:after {
        font-family: 'FontAwesome';
        color: #d4d4d4;
        position: relative;
        content: "\f002";
        right: 25px;
    }

    .dim_button {
        display: inline-block;
        color: #fff;
        text-decoration: none;
        text-transform: uppercase;
        text-align: center;
        padding-top: 6px;
        background: rgb(57, 85, 136);
        margin-right: 10px;
        position: relative;
        cursor: pointer;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .createSegment a {
        margin-bottom: 0px;
        border-radius: 50px;
        background: #ffffff;
        border: 1px solid #007bff;
        color: #007bff;
        transition: all .4s ease;
    }

    .createSegment a:hover,
    .createSegment a:focus {
        transition: all .4s ease;
        background: #007bff;
        color: #fff;
    }

    .add_flex {
        display: flex;
        justify-content: flex-end;
        padding-right: 0px;
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

    .btn-group.open .dropdown-toggle {
        box-shadow: none;
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

    .btn-group i {
        color: #8e8e8e;
        margin: 2px;
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

    .dropdown-menu i {
        margin-right: 8px;
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
        border: 1px solid #3d96f5 !important;
        background: #4da3ff !important;
        box-shadow: none;
    }

    .main-datatable .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .main-datatable .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        color: #fff !important;
        border-color: transparent !important;
        background: #007bff !important;
    }

    .main-datatable .dataTables_paginate {
        padding-top: 0 !important;
        margin: 15px 10px;
        float: right !important;
    }

    .mode {
        padding: 4px 10px;
        line-height: 13px;
        color: #fff;
        font-weight: 400;
        border-radius: 1rem;
        -webkit-border-radius: 1rem;
        -moz-border-radius: 1rem;
        -ms-border-radius: 1rem;
        -o-border-radius: 1rem;
        font-size: 11px;
        letter-spacing: 0.4px;
    }

    .overflow {
        overflow-y: scroll;
    }

    .mode_on {
        background-color: #09922d;
    }

    .mode_off {
        background-color: #8b9096;
    }

    .mode_process {
        background-color: #ff8000;
    }

    .mode_done {
        background-color: #03a9f3;
    }

    @media only screen and (max-width:1200px) {
        .overflow-x {
            overflow-x: scroll;
        }

        .overflow-x::-webkit-scrollbar {
            width: 5px;
            height: 6px;
        }

        .overflow-x::-webkit-scrollbar-thumb {
            background-color: #888;
        }

        .overflow-x::-webkit-scrollbar-track {
            background-color: #f1f1f1;
        }
    }
</style>
<x-admin-layout>

    <div>
        <!-- Simplicity is an acquired taste. - Katharine Gerould -->
        <div class="p-30">
            <div class="row">
                <div class="card col-md-12 main-datatable" id="session" style="height: 90vh;">
                    <div class="card_body">
                        <div class="row d-flex">
                            <div class="col-sm-4 createSegment">
                                <a class="btn dim_button create_new"> <i class="icon ph-bold ph-plus-simple"></i> Create
                                    New</a>
                            </div>
                            <div class="col-sm-8 add_flex">
                                <div class="form-group searchInput">
                                    <label for="email">Search:</label>
                                    <input type="search" class="form-control" id="filterbox" placeholder=" ">
                                </div>
                            </div>
                        </div>
                        <div class="overflow-x">
                            <table id="example" class="table cust-datatable dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectAll"></th>

                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Vile</th>
                                        <th>Telephone</th>
                                        <th>Etat</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($colis as $coli)
                                    <tr>
                                        <td><input type="checkbox" class="row-checkbox"></td>

                                        <td>{{ $coli->id }}</td>
                                        <td>{{ $coli->Name }}</td>
                                        <td>{{ $coli->destination }}</td>
                                        <td>{{ $coli->phone_number }}</td>
                                        <td>{{ $coli->state }}</td>
                                        <td>{{ $coli->status }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu">
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        var table = $('table#example').DataTable({
            responsive: true,
            columnDefs: [{
                orderable: false,
                targets: [0]
            }],
            order: [
                [1, 'asc']
            ], // Sort by the second column (index 1) in ascending order
            paging: true,
            pageLength: 10,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ],
            pagingType: 'simple_numbers',
            searching: false
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
    </script>
</x-admin-layout>