<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/login.css')}}">
    <title>Document</title>
    <style>
        .select{
            width: 100%;
            padding: 10px;
            border-radius: 8px ;
            border: 0.5px solid gainsboro;
        }
        .select:focus{
            border-color: orange;
    box-shadow: 0 0 0 0.2rem rgba(255, 69, 0, 0.25);}
    .loading {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1000;
  /* Add additional styles as needed */
}
.loader {
  width: 50px;
  aspect-ratio: 1;
  border-radius: 50%;
  padding: 3px;
  background: radial-gradient(farthest-side,#ffa516 95%,#0000) 50% 0/12px 12px no-repeat,
    radial-gradient(farthest-side,#0000 calc(100% - 5px),#ffa516 calc(100% - 4px)) content-box;
  animation: l6 2s infinite ;
}
@keyframes l6 {to{transform: rotate(1turn)}}

        
    </style>
</head>

<body>
    <div id="loaderHolder" style="display: none" class="loading">
        <p class="loader"></p>
    </div>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container-fluid h-100 py-4">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-7 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4" style="color: orange">Create an account</p>

                                    <form action="{{route("register")}}" method="post" id="registrationForm" class="mx-1 mx-md-4">
                                        @csrf
                                        <div class="d-flex justify-content-between mb-4">
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0 col-5">
                                                <label class="form-label after" for="firstName">Nom : </label>
                                                <input type="text" placeholder="Votre Nom" name="firtsName" id="firstName" class="form-control" />
                                                <p id="firstNameError" style="color: red; display: none;">Please enter your first name</p>
                                            </div>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0 col-5">
                                                <label class="form-label after" for="lastName">Prenom :  </label>
                                                <input type="text" placeholder="Votre Prenom" name="lastName" id="lastName" class="form-control" />
                                                <p id="lastNameError" style="color: red; display: none;">Please enter your last name</p>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mb-4">
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <label class="form-label after" for="email">Creer une login : </label>
                                                <input type="text" name="login" placeholder="Nouveaux Login" id="email" class="form-control d-inline-block w-100" />
                                                <p id="emailError" style="color: red; display: none;">Please enter your email</p>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mb-4">
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <label class="form-label after" for="password">Password : </label>
                                                <input type="password" placeholder="Nouveaux mot de pass" id="password" class="form-control d-inline-block w-100" name="password"/>
                                                <p id="passwordError" style="color: red; display: none;">Please enter a password</p>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mb-4">
                                            <div data-mdb-input-init class="form-groupe flex-fill mb-0 w-100">
                                                <label class="form-label after" for="type">Are you ? </label>
                                                <select  class="select" name="type" id="type">
                                                    <option value="deliver">Delivery man</option>
                                                    <option value="company">Company</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="company" style="display: none" >
                                            <div class="d-flex justify-content-between mb-4">
                                                <div data-mdb-input-init class="form-outline flex-fill mb-0 col-md-5 col-sm-12 mb-sm-4">
                                                    <label class="form-label after" for="firstName">Company Name : </label>
                                                    <input type="text" class="form-control" name="company" id="companyInput" />
                                                    <p id="companyErr" style="color: red; display: none;">Please chose your company name</p>
                                                </div>
                                                <div data-mdb-input-init class="form-outline flex-fill mb-0 col-md-5 col-sm-12">
                                                    <label class="form-label after" for="lastName">RIB :  </label>
                                                    <input type="text" placeholder="Votre RIB" name="RIB" id="rib" class="form-control" />
                                                    <p id="ribErr" style="color: red; display: none;">Please enter RIB</p>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" id="submitButton" data-mdb-button-init data-mdb-ripple-init class="button btn btn-lg" style="background-color: orange">Register</button>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-5 d-flex align-items-center order-1 order-lg-2">

                                    <img src={{asset("/assets/images/aloo-salhi-logo-new.png")}}
                                        class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
    const type = document.getElementById('type');
    type.onchange = function () {
        document.getElementById('company').style.display="none";

        if(this.value === "company")
        document.getElementById('company').style.display="block";

    }
    document.getElementById('submitButton').addEventListener('click', function(event) {
        event.preventDefault();

        let firstName = document.getElementById('firstName').value.trim();
        let lastName = document.getElementById('lastName').value.trim();
        let email = document.getElementById('email').value.trim();
        let password = document.getElementById('password').value.trim();
        let rib = document.getElementById('rib').value.trim();
        let company = document.getElementById('companyInput').value.trim();

        let firstNameError = document.getElementById('firstNameError');
        let lastNameError = document.getElementById('lastNameError');
        let emailError = document.getElementById('emailError');
        let passwordError = document.getElementById('passwordError');
        let ribErr = document.getElementById('ribErr');
        let companyErr = document.getElementById('companyErr');

        // Reset error messages
        firstNameError.style.display = 'none';
        lastNameError.style.display = 'none';
        emailError.style.display = 'none';
        passwordError.style.display = 'none';
        ribErr.style.display = 'none';
        companyErr.style.display = 'none';

        let isValid = true;

        if (firstName === '') {
            firstNameError.style.display = 'block';
            isValid = false;
        }

        if (lastName === '') {
            lastNameError.style.display = 'block';
            isValid = false;
        }

        if (email === '') {
            emailError.style.display = 'block';
            isValid = false;
        }

        if (password === '') {
            passwordError.style.display = 'block';
            isValid = false;
        }
        if(type.value ==="company" ){
           if (rib === '') {
            console.log(company);

            ribErr.style.display = 'block';
            isValid = false;
        }
        if (company === '') {
            companyErr.style.display = 'block';
            isValid = false;
        }
        }

        if (isValid) {
            // All fields are filled, you can submit the form
            document.getElementById('registrationForm').submit();
            document.querySelector("div#loaderHolder").style.display="flex"
        }
    });
</script>