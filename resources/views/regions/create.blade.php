<x-admin-layout>
    <div class="p-30">
        <h2>Create Region</h2>
        <form action="{{ route('regions.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="lib">Name:</label>
                <input type="text" class="form-control" name="lib" required>
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
</x-admin-layout>
