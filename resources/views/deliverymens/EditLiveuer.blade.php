@extends('layouts.app')

@section('content')
<!-- External stylesheets -->
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Raleway', sans-serif;
    }

    .container {
        max-width: 600px;
        margin: 30px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        margin-bottom: 20px;
        text-align: center;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        border-radius: 30px;
        padding: 10px 15px;
        border: 1px solid #ddd;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        outline: none;
    }

    .btn {
        border-radius: 30px;
        padding: 10px 20px;
        text-transform: uppercase;
        font-weight: 600;
        transition: background 0.3s;
    }

    .btn-success {
        background-color: #28a745;
        color: white;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }
</style>

<div class="container">
    <h2>Edit Deliveryman</h2>

    <form action="{{ route('deliverymens.update', $deliveryman->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" class="form-control" value="{{ $deliveryman->firstName }}" required>
        </div>

        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" class="form-control" value="{{ $deliveryman->lastName }}" required>
        </div>
        
        <div class="form-group">
            <label for="num">Telephone Number</label>
            <input type="text" name="num" class="form-control" value="{{ $deliveryman->num }}" required>
        </div>

        <div class="form-group">
            <label for="region_id">Region</label>
            <select name="region_id" class="form-control" required>
                @foreach($regions as $region)
                    <option value="{{ $region->id }}" {{ $deliveryman->region_id == $region->id ? 'selected' : '' }}>
                        {{ $region->lib }}
                    </option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-success">Confirm</button>
        <a href="{{ route('deliverymens.index') }}" class="btn btn-secondary">Return</a>
    </form>
</div>
@endsection
