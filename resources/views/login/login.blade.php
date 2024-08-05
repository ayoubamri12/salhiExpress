<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/login.css')}}">
    <style>
        .h-custom {
            height: 100vh;
        }
        
    </style>
</head>
<body>
    
    <section class="vh-100">
        <div class="container-fluid h-custom">
            @if (session()->has('success'))
            <div id="alert" class="my-3 alert alert-success alert-dismissible fade show" role="alert">
                {{session("success")}}
                <button type="button" id="close" class="close button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
           
            @endif
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5 col-12 text-center">
                    <img src="{{asset('/assets/images/aloo-salhi-logo-new.png')}}" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 col-12">
                    
                    @error("email")
                    <div class="alert alert-danger" role="alert">
                       {{$message}}
                      </div>
@enderror 
                    <form action="{{url("/login/store")}}" method="POST">
                        @csrf
                        <div class="form-outline mb-4">
                            <label class="form-label" style="font-size: 18px; color: orange; font-weight: bolder" for="form3Example3">Login address :</label>
                            <input type="text" id="form3Example3" class="form-control form-control-lg" placeholder="Enter a valid Login address" value="{{old('login')}}" name="login" />
                       </div>
                        <label class="form-label" style="font-size: 18px; color: orange; font-weight: bolder" for="form3Example4">Password :</label>
                        <div class="form-outline mb-3">
                            <input type="password" id="form3Example4" class="form-control form-control-lg" placeholder="Enter password" name="password"/>
                        </div>
                       
                        <div class="text-center text-lg-start mt-4 pt-2 pb-4">
                            <button type="submit" id="sub" data-mdb-button-init data-mdb-ripple-init class="btn btn-lg button"  style="padding-left: 2.5rem; padding-right: 2.5rem; background-color: orange;">Login</button>
                    <p class="small fw-bold mt-2 pt-1 mb-0" style="font-size: 20px">Don't have an account? <a href="{{route('login.registerShown')}}" class="link-danger">Create new one</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
    </section>
    <script>
        const close = ()=>{
            document.getElementById("alert").style.display="none"
        }
        document.getElementById("close").onclick = close;

    </script>
</body>
</html>