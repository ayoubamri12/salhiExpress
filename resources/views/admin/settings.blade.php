<x-admin-layout>

    <div class="container mt-4"> <!-- Add a margin-top if you want some space from the top -->
        <h2>Paramètres</h2>

        <!-- Search and Filter Section -->
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <div>
                <p class="small fw-bold mt-2 pt-1 mb-0" style="font-size: 20px">Voulez-vous créer un compte ? <a href="{{ route('login.registerShown') }}" class="link-danger">Créer un nouveau compte</a></p>
                <a href="{{ route('accounts.index') }}" class="btn btn-info">Voir Tous les Comptes</a>
            </div>
            <div>
                <form method="GET" action="{{ route('accounts.index') }}" class="d-flex">
                    <select name="type" class="form-select me-2">
                        <option value="">Tous les Types</option>
                        <option value="livreur">Livreur</option>
                        <option value="entreprise">Entreprise</option>
                    </select>
                    <input type="text" name="search" class="form-control me-2" placeholder="Rechercher...">
                    <button type="submit" class="btn btn-primary">Rechercher</button>
                </form>
            </div>
        </div>

        <!-- Accounts Table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accounts as $account)
                    <tr>
                        <td>{{ $account->id }}</td>
                        <td>{{ $account->login }}</td>
                        <td>{{ $account->type }}</td>
                        <td>
                            <a href="{{ route('accounts.index', $account->id) }}" class="btn btn-info">Détails</a>
                         
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        {{ $accounts->links() }} <!-- Add pagination links if necessary -->
    </div>
    

    @section('styles')
    <style>
        /* Additional styles can go here */
        .container {
            margin-top: 0; /* Remove top margin if necessary */
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
    @endsection
</x-admin-layout>
