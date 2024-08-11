<style>
    .table .dropdown {
        display: inline-block;
    }

    div.row>div {
        vertical-align: middle;
        margin-bottom: 10px;
        border: none;
    }

    div.row:first div {
        border: none;
        font-size: 12px;
        letter-spacing: 1px;
        text-transform: uppercase;
        background: transparent;
    }

    div..row {
        background: #fff;
        border-radius: 10px;
    }


    .avatar {
        width: 2.75rem;
        height: 2.75rem;
        line-height: 3rem;
        border-radius: 50%;
        display: inline-block;
        background: transparent;
        position: relative;
        text-align: center;
        color: #868e96;
        font-weight: 700;
        vertical-align: bottom;
        font-size: 1rem;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .avatar-sm {
        width: 2.5rem;
        height: 2.5rem;
        font-size: 0.83333rem;
        line-height: 1.5;
    }

    .avatar-img {
        width: 100%;
        height: 100%;
        -o-object-fit: cover;
        object-fit: cover;
    }

    .avatar-blue {
        background-color: #c8d9f1;
        color: #467fcf;
    }

    .btn-icon {
        background: #fff;
    }

    .btn-icon .bx {
        font-size: 20px;
    }

    .btn .bx {
        vertical-align: middle;
        font-size: 20px;
    }

    .dropdown-menu {
        padding: 0.25rem 0;
    }

    .dropdown-item {
        padding: 0.5rem 1rem;
    }

    .badge {
        padding: 0.5em 0.75em;
    }

    .badge-success-alt {
        background-color: #d7f2c2;
        color: #7bd235;
    }

    .table a {
        color: #212529;
    }

    .table a:hover,
    .table a:focus {
        text-decoration: none;
    }

    .icon>.bx {
        display: block;
        min-width: 1.5em;
        min-height: 1.5em;
        text-align: center;
        font-size: 1.0625rem;
    }

    .btn {
        font-size: 0.9375rem;
        font-weight: 500;
        padding: 0.5rem 0.75rem;
    }


    .avatar-orange {
        background-color: orange;
        color: rgb(252, 226, 177);
    }

    p#listbtn {
        display: none;
    }



    .wrapper-info .card {
        width: 100%;
        height: 90px;
        background-color: #fff;
        padding: 10px 20px;
        display: flex;
        justify-content: space-around;
        align-items: center;
        border-left: 5px solid #3286e9;
        border-radius: 3px;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    }

    .wrapper-info .card .subject p {
        color: #909092;
    }

    .wrapper-info .card .icon {
        font-size: 25px;
        color: #3286e9;
    }

    .wrapper-info .card .icon-times {
        font-size: 28px;
        color: #c3c2c7;
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .smScreen {
            display: none;
        }

        p#listbtn {
            display: block;
            border-radius: 50%;
        }

        .text-info {
            font-size: 15px;

        }
    }

    @media (max-width: 650px) {
        .text-info {
            font-size: 13px;
        }

        .subject h3 {
            font-size: 15px;

        }
    }
    @media (max-width: 390px) {
        .text-info {
            font-size: 10px;
        }

        .subject h3 {
            font-size: 12px;

        }
    }
</style>
<x-deliver-layout>
    <div style="width: 95%;" id="grandP" class="mx-auto mt-5">

        @if ($colis->count() > 0)
            @foreach ($colis as $coli)
                @if (date('Y-m-d',strtotime($coli->updated_at)) == date("m-d"))
                <div class="parent">
                    <div class="row justify-content-around align-items-center mb-1"
                        style="border-radius: 10px;background-color: rgba(252, 172, 0, 30%);">
                        <p id="listbtn" class="badge badge-success"><i class='bx bx-plus'></i></p>
                        <p style="display: none" id="listbtn1" class="badge badge-danger"><i class='bx bx-minus'></i></p>
                        <div class="col-1">
                            <div class="avatar avatar-orange mr-3">EB</div>

                        </div>
                        <div class="col-4" style="word-wrap: break-word; overflow-wrap: break-word;">
                            <p class="">{{ $coli->Name }} </p>
                            <p class="text-muted">{{ $coli->code }}</p>
                        </div>
                        <div class="smScreen col-2">
                            <p> {{ $coli->price }}
                                DH</p>
                        </div>
                        <div class="smScreen col-2">
                            <p>{{ $coli->destination }}</p>
                        </div>
                        <div class="smScreen col-1">
                            {{ $coli->updated_at }}
                        </div>
                        <div class="smScreen col-1">
                            <div class="badge badge-success badge-success-alt">Livre</div>
                        </div>
                    </div>
                    <ul style="display: none">
                        <li class="row justify-content-around mb-1 p-1 bg-light" style="border-radius: 10px">
                            <div class="col-6">
                                Nom de Client
                            </div>
                            <div class="col-5">
                                {{ $coli->Name }}
                            </div>
                        </li>
                        <li class="row justify-content-around mb-1 p-1 bg-light" style="border-radius: 10px">
                            <div class="col-6">
                                Coli code
                            </div>
                            <div class="col-5">
                                {{ $coli->code }}
                            </div>
                        </li>
                        <li class="row justify-content-around mb-1 p-1 bg-light" style="border-radius: 10px">
                            <div class="col-6">
                                Coli Prix
                            </div>
                            <div class="col-5">
                                {{ $coli->price }}
                                DH
                            </div>
                        </li>
                        <li class="row justify-content-around mb-1 p-1 bg-light" style="border-radius: 10px">
                            <div class="col-6">
                                Coli Ville
                            </div>
                            <div class="col-5">
                                <p>{{ $coli->destination }}</p>
                            </div>
                        </li>
                        <li class="row justify-content-around mb-1 p-1 bg-light" style="border-radius: 10px">
                            <div class="col-6">
                                Date de reception
                            </div>
                            <div class="col-5">
                                {{ $coli->updated_at }}
                                DH
                            </div>
                        </li>
                    </ul>
                   
                </div>
                @endif
            @endforeach
            <div id="alrt" style="display: none;" class="wrapper-info">
                <div class="row card">
                    <div class="icon col-2"><i class="fas fa-info-circle"></i></div>
                    <div class="subject col-10">
                        <h3 class="text-primary">Info</h3>
                        <p class="text-info">there is yet no delivered parcels for today</p>
                    </div>
                </div>
            </div>
        @else
            <div class="wrapper-info">
                <div class="row card">
                    <div class="icon col-2"><i class="fas fa-info-circle"></i></div>
                    <div class="subject col-10">
                        <h3 class="text-primary">Info</h3>
                        <p class="text-info">there is yet no delivered parcels for today</p>
                    </div>
                </div>
            </div>
        @endif
    </div>


</x-deliver-layout>
<script>
    $('#listbtn').click(function() {
        $(".parent").children("ul:last").css({
            display: "block"
        });
        $("#listbtn1").css({
            display: "block"
        });
        $("#listbtn").css({
            display: "none"
        });
    })
    $('#listbtn1').click(function() {
        $(".parent").children("ul:last").css({
            display: "none"
        });
        $("#listbtn1").css({
            display: "none"
        });
        $("#listbtn").css({
            display: "block"
        });

    })
    if ($("#parent").children().length === 0) {
        console.log($("#parent").children().length);
            $("div#alrt").css("display", "block")
        }
</script>
