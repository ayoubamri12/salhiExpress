<x-admin-layout>
    <div class="p-30">
        <h2>Edit Region</h2>
        <form action="{{ route('regions.update', $region->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="lib">Name:</label>
                <input type="text" class="form-control" name="lib" value="{{ $region->lib }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</x-admin-layout>
