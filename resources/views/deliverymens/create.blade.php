@extends('layouts.app')

@section('content')
<!-- External stylesheets -->
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600&display=swap" rel="stylesheet">
<!-- Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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

    .alert {
        margin-bottom: 20px;
    }
</style>

<div class="container">
    <h2>Add New Deliveryman</h2>

    @if(session('success'))
        <script>
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.success("{{ session('success') }}");
        </script>
    @endif

    <form id="deliverymanForm" action="{{ route('deliverymens.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" required>
        </div>
        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" required>
        </div>
        <div class="form-group">
            <label for="num">Telephone Number</label>
            <input type="text" class="form-control" id="num" name="num" required>
        </div>
        <div class="form-group">
            <label for="region_id">Region</label>
            <select class="form-control" id="region_id" name="region_id" required>
                <option value="">Select a region</option>
                @foreach($regions as $region)
                    <option value="{{ $region->id }}">{{ $region->lib }}</option>
                @endforeach
            </select>
        </div>
        <!-- Hidden field to send the current user_id -->
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <button type="submit" class="btn btn-success">Create Deliveryman</button>
        <a href="{{ route('deliverymens.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<!-- Toastr and jQuery scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    document.getElementById('deliverymanForm').addEventListener('submit', function(event) {
        const firstName = document.getElementById('firstName').value.trim();
        const lastName = document.getElementById('lastName').value.trim();
        const regionId = document.getElementById('region_id').value;
        const num = document.getElementById('num').value.trim();

        let valid = true;
        let errorMessage = '';

        // Validate first name
        if (firstName === '') {
            valid = false;
            errorMessage += 'First Name is required.\n';
        } else if (!/^[a-zA-Z]+$/.test(firstName)) {
            valid = false;
            errorMessage += 'First Name must contain only letters.\n';
        }

        // Validate last name
        if (lastName === '') {
            valid = false;
            errorMessage += 'Last Name is required.\n';
        } else if (!/^[a-zA-Z]+$/.test(lastName)) {
            valid = false;
            errorMessage += 'Last Name must contain only letters.\n';
        }

        // Validate region selection
        if (regionId === '') {
            valid = false;
            errorMessage += 'Region must be selected.\n';
        }

        // Validate telephone number
        if (num === '') {
            valid = false;
            errorMessage += 'Telephone number is required.\n';
        } else if (!/^\d+$/.test(num)) {
            valid = false;
            errorMessage += 'Telephone number must contain only digits.\n';
        }

        // Show error message and prevent form submission if invalid
        if (!valid) {
            alert(errorMessage);
            event.preventDefault();
        }
    });
</script>
@endsection
