<style>
    .form-control.is-invalid {
        border-color: #dc3545;
        padding-right: calc(1.5em + 0.75rem);
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(0.375em + 0.1875rem) center;
        background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 0.875em;
        margin-top: 0.25rem;
    }
</style>
<x-admin-layout>

    <nav  class="navbar mt-1 navbar-expand-lg bg-body-tertiary w-100">
     
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route("admin.free_parcels")}}"><i class="icon fa-solid fa-box"></i> Colis</a></li>
              <li class="breadcrumb-item active" aria-bs-current="page"><a href="{{route("parcel.edit",$parcel->id)}}"><i class="fa-solid fa-pen"></i>    edit</a></li>
            </ol>
          </nav>
     
      </nav>
      @if (session()->has('edited'))
      <script>
          toastr.options = {
              "closeButton": true,
              "debug": false,
              "newestOnTop": true,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
          };
          toastr.success("parcel has been modified successfully");

      </script>
  @endif
    <div class="mt-2 card mx-auto">
        <div class="card-header  p-3" style="background-color: orange;color:white;">
           <h3>
            Edit parcel
           </h3>
        </div>
        <div class="card-body">
            <form action="{{route("parcel.update",$parcel->id)}}" method="POST" id="parcel-form">
                @csrf
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" value="{{$parcel->code}}" id="code" name="code" class="form-control"  />
                            <label class="form-label" for="code">Code</label>
                            <div id="code-error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" value="{{$parcel->magasin}}" name="magasin" id="magasin" class="form-control"  />
                            <label class="form-label" for="form6Example2">Magasin</label>
                            <div id="magasin-error" class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>

             
          <div class="form-outline mb-4">
                    <input type="text" value="{{$parcel->phone_number}}" name="phone_number" id="phone" class="form-control"  />
                    <label class="form-label" for="phone">Telephone</label>
                    <div id="phone-error" class="invalid-feedback"></div>
                </div>

                     <div class="form-outline mb-4">
                    <input type="text" value="{{$parcel->Name}}" name="Name" id="clientName" class="form-control"  />
                    <label class="form-label" for="clientName">Destinataire</label>
                    <div id="clientName-error" class="invalid-feedback"></div>
                </div>

               <div class="form-outline mb-4">
                    <input type="number" value="{{$parcel->price}}" name="price" id="price" class="form-control"  />
                    <label class="form-label" for="price">Prix</label>
                    <div id="price-error" class="invalid-feedback"></div>
                </div>

                <div class="form-outline mb-4">
                    <select name="destination" class="form-control" id="dest" >
                        <option value="">Select a destination</option>
                        @foreach ($regions as $region)
                            <option {{$parcel->destination===$region->lib?"selected":""}} value="{{ $region->lib }}">{{ $region->lib }}</option>
                        @endforeach
                    </select>
                    <label class="form-label" for="dest">Destination</label>
                    <div id="dest-error" class="invalid-feedback"></div>
                </div>
                <!-- Submit button -->
                <button type="submit" style="background-color: orange; cursor: pointer;color;white;"
                    class="btn btn-block mb-4">Modifier</button>
            </form>
        </div>
    </div>
</x-admin-layout>
<script>
    $(document).ready(function() {
        $('#parcel-form').submit(function(event) {
            event.preventDefault(); // Prevent the form from submitting normally

            // Clear any previous errors
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback').text('');

            // Check if all  fields are filled
            let isValid = true;
            if ($('#code').val() === '') {
                $('#code').addClass('is-invalid');
                $('#code-error').text('Please enter a code.');
                isValid = false;
            }
            if ($('#magasin').val() === '') {
                $('#magasin').addClass('is-invalid');
                $('#magasin-error').text('Please enter a magasin.');
                isValid = false;
            }
            if ($('#phone').val() === '') {
                $('#phone').addClass('is-invalid');
                $('#phone-error').text('Please enter a phone number.');
                isValid = false;
            }
            if ($('#clientName').val() === '') {
                $('#clientName').addClass('is-invalid');
                $('#clientName-error').text('Please enter a destinataire name.');
                isValid = false;
            }
            if ($('#price').val() === '') {
                $('#price').addClass('is-invalid');
                $('#price-error').text('Please enter a price.');
                isValid = false;
            }
            if ($('#dest').val() === '') {
                $('#dest').addClass('is-invalid');
                $('#dest-error').text('Please select a destination.');
                isValid = false;
            }

            if (isValid) {
                // All fields are filled, submit the form
                $(this).unbind('submit').submit();
            }
        });
    });
</script>
