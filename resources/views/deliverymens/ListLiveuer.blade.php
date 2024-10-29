<x-admin-layout>
    <div class="main-content">
        <div class="header-actions">
            <div class="search-bar">
                <div class="form-group searchInput">
                    <label for="search">Search:</label>
                    <input type="search" class="form-control" id="search" placeholder="Type to search..." onkeyup="searchTable()">
                </div>
            </div>
            <a href="{{ route('deliverymens.create') }}" class="add-new-btn">
                <i class="fa fa-plus"></i> Ajouter un livreur
            </a>
        </div>

        <div class="table-container">
            <table id="deliverymenTable" class="table table-bordered cust-datatable dataTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Region</th>
                        <th>Telephone Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($deliverymen as $deliveryman)
                    <tr>
                        <td>{{ $deliveryman->id }}</td>
                        <td>{{ $deliveryman->firstName }} {{ $deliveryman->lastName }}</td>
                        <td>{{ $deliveryman->region->lib }}</td>
                        <td>{{ $deliveryman->num }}</td>
                        <td class="table-actions">
                            <a href="{{ route('deliverymens.edit', $deliveryman->id) }}" class="actionCust" title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('deliverymens.destroy', $deliveryman->id) }}" class="actionCust" title="Delete" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this deliveryman?')) { document.getElementById('delete-form-{{ $deliveryman->id }}').submit(); }">
                                <i class="fa fa-trash"></i>
                            </a>
                            <form id="delete-form-{{ $deliveryman->id }}" action="{{ route('deliverymens.destroy', $deliveryman->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            <a href="{{ route('deliverymens.whatsapp', $deliveryman->id) }}" class="actionCust" title="WhatsApp Chat" target="_blank">
                                <i class="fa fa-whatsapp"></i>
                            </a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function searchTable() {
            let input = document.getElementById('search').value.toLowerCase();
            let table = document.getElementById('deliverymenTable');
            let tr = table.getElementsByTagName('tr');

            for (let i = 1; i < tr.length; i++) {
                let td = tr[i].getElementsByTagName('td');
                let found = false;
                for (let j = 0; j < td.length; j++) {
                    if (td[j]) {
                        if (td[j].innerHTML.toLowerCase().indexOf(input) > -1) {
                            found = true;
                            break;
                        }
                    }
                }
                tr[i].style.display = found ? "" : "none";
            }
        }
    </script>
</x-admin-layout>