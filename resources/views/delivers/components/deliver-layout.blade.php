<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('/assets/images/aloo-salhi-logo-new.png') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/layout.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- jQuery -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
        integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
        crossorigin="anonymous"></script>
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delivery man</title>



    <title>Livreur</title>
</head>

<body>
    <div class="containercss">
        <div style="position: relative;">
            @include('delivers.layout.partials.sidebar')
        </div>
        <div class="">
            {{ $slot }}
        </div>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    $(".menu > ul > li").click(function(e) {
        // remove active from already active
        $(this).siblings().removeClass("active");
        // add active to clicked
        $(this).toggleClass("active");
        // if has sub menu open it
        $(this).find("ul").slideToggle();
        // close other sub menu if any open
        $(this).siblings().find("ul").slideUp();
        // remove active class of sub menu items
        $(this).siblings().find("ul").find("li").removeClass("active");
    });

    $(".menu-btn").click(function() {
        $(".sidebar").toggleClass("active");
        $(".containercss").toggleClass("actived");
    });
    $(document).ready(function() {
        checkScreenSize();

        $(window).resize(function() {
            checkScreenSize();
        });

        function checkScreenSize() {
            $(".menu-btn").show()

            let windowWidth = $(window).width();
            $(".sidebar").removeClass("smallScreen");
            $(".sidebar").removeClass("active");
            $(".containercss").removeClass("actived");

            if (windowWidth < 800)
                $(".sidebar").addClass("smallScreen");
            if (windowWidth <= 500) {
                $(".sidebar").addClass("active");
                $(".containercss").addClass("actived");
                $(".menu-btn").hide()
            }

        }
    });
</script>

</html>
