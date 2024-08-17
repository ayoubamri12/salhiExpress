<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/layout.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/layout.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="icon" href="{{ asset('/assets/images/aloo-salhi-logo-new.png') }}">
    <title>Admin</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
        integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.1.0/daterangepicker.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <title>admin</title>
</head>

<body>
    <div class="containercss">

        <div>
            @include('admin.partials.sideNav')
        </div>

        <div class="p-4">
            {{ $slot }}
        </div>
    </div>
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
                let windowWidth = $(window).width();
                $(".sidebar").removeClass("smallScreen");
                $(".sidebar").removeClass("active");
                $(".containercss").removeClass("actived");

                if (windowWidth < 800)
                    $(".sidebar").addClass("smallScreen");
                if (windowWidth <= 500) {
                    $(".sidebar").addClass("active");
                    $(".containercss").addClass("actived");
                }

            }
        });
    </script>
</body>

</html>
