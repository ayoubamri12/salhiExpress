{{-- resources/views/admin/parcels/colis_a_suivre.blade.php --}}

<x-admin-layout>
    <style>
        /* Overall Table Style */
table.dataTable {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
    border: 1px solid #ddd;
    font-family: Arial, sans-serif;
}

table.dataTable thead {
    background-color: #ff7023;
    color: #fff;
    text-align: left;
}

table.dataTable thead th {
    padding: 12px;
    font-weight: bold;
    font-size: 14px;
    border-bottom: 2px solid #ddd;
}

table.dataTable tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

table.dataTable tbody tr:hover {
    background-color: #f1f1f1;
    cursor: pointer;
}

table.dataTable tbody td {
    padding: 10px;
    vertical-align: middle;
    font-size: 13px;
}

/* Button Styles */
.btn {
    border-radius: 4px;
    padding: 8px 12px;
    color: #fff;
    font-size: 13px;
    font-weight: bold;
}

.btn-primary {
    background-color: #007bff;
    border: none;
}

.btn-success {
    background-color: #28a745;
    border: none;
}

.btn-warning {
    background-color: #ffc107;
    border: none;
}

/* Custom Badge Styles */
.badge {
    padding: 5px 10px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: bold;
}

.badge-success {
    background-color: #28a745;
    color: white;
}

.badge-danger {
    background-color: #dc3545;
    color: white;
}

.badge-info {
    background-color: #17a2b8;
    color: white;
}

/* Table Checkbox Styles */
.row-checkbox {
    cursor: pointer;
    margin-right: 5px;
}

/* Modal Style Adjustments */
.modal-content {
    border-radius: 8px;
    padding: 20px;
}

.modal-header {
    background-color: #ff7023;
    color: white;
}

.modal-footer button {
    background-color: #333232;
    color: white;
}

    </style>
    <div class="main-content">
        <div class="header-actions">
            <div class="search-bar">
                <div class="form-group searchInput">
                    <label for="search">Search:</label>
                    <input type="search" class="form-control" id="search" placeholder="Type to search..." onkeyup="searchTable()">
                </div>
            </div>
            <form method="GET" action="{{ route('admin.colis_a_suivre') }}">
                <select name="zone">
                    <option value="">Select Zone</option>
                    @foreach($regions as $region)
                        <option value="{{ $region->lib }}">{{ $region->lib }}</option>
                    @endforeach
                </select>
                <button type="submit">Filter</button>
            </form>
        </div>

        <div class="table-container">
            <table id="colisTable" class="table table-bordered cust-datatable dataTable">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Destination</th>
                        <th>Phone Number</th>
                        <th>Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($parcels as $parcel)
                        <tr>
                            <td>{{ $parcel->code }}</td>
                            <td>{{ $parcel->destination }}</td>
                            <td>{{ $parcel->phone_number }}</td>
                            <td>{{ $parcel->name }}</td>
                            <td>{{ $parcel->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function searchTable() {
            let input = document.getElementById('search').value.toLowerCase();
            let table = document.getElementById('colisTable');
            let tr = table.getElementsByTagName('tr');

            for (let i = 1; i < tr.length; i++) {
                let td = tr[i].getElementsByTagName('td');
                let found = false;
                for (let j = 0; j < td.length; j++) {
                    if (td[j] && td[j].innerHTML.toLowerCase().indexOf(input) > -1) {
                        found = true;
                        break;
                    }
                }
                tr[i].style.display = found ? "" : "none";
            }
        }
    </script>
</x-admin-layout>
