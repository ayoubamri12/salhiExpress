<x-admin-layout>
    <div class="p-30">
        <div class="row">
            <div class="card col-md-12 main-datatable">
                <div class="card_body">
                    <div class="row d-flex">
                        <div class="col-sm-4 createSegment">
                            <a href="{{ route('regions.create') }}" class="btn dim_button create_new"> <i class="icon ph-bold ph-plus-simple"></i> Create New</a>
                        </div>
                    </div>
                    <table class="table cust-datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($regions as $region)
                            <tr>
                                <td>{{ $region->id }}</td>
                                <td>{{ $region->lib }}</td>
                                <td>
                                    <a href="{{ route('regions.edit', $region->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('regions.destroy', $region->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
