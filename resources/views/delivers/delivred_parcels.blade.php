<style>
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
    <div style="width: 95%;" id="parent" class="mx-auto mt-5">
        <div class="my-2">
            <p  style="color: rgb(165, 165, 165)">Nombre de colis : {{ $colis->count() }} </p>
        </div>

        @if ($colis->count() > 0)
            @foreach ($colis as $coli)
                @if (date('Y-m-d', strtotime($coli->updated_at)) == date('Y-m-d'))
                    <div class="wrapper-info mb-3">
                        <div class="card" style="border-left: 5px solid #ed6e09;">
                            <div class="row w-100 justify-content-between align-items-center">
                                <div class="icon col-2" style="color: rgb(50, 214, 50);">
                                    
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="subject col-9">
                                    <h3 class="" style="color: #ed6e09;">delivred</h3>
                                    <p class="" style="color: #ed6e09;">code : {{$coli->code }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            <div id="alrt" style="display: none;" class="wrapper-info">
                <div class="wrapper-info">
                    <div class="card">
                       <div class="row justify-content-between align-items-center w-100">
                        <div class="icon col-2"><i class="fas fa-info-circle"></i></div>
                        <div class="subject col-10">
                            <h3 class="text-primary">Info</h3>
                            <p class="text-info">there is yet no delivered parcels for today 1</p>
                        </div>
                       </div>
                    </div>
                </div>
            </div>
        @else
            <div class="wrapper-info">
                <div class="card">
                    <div class="row w-100 align-items-center">
                        <div class="icon col-2"><i class="fas fa-info-circle"></i></div>
                        <div class="subject col-10">
                            <h3 class="text-primary">Info</h3>
                            <p class="text-info">there is yet no delivered parcels for today</p>
                        </div>
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
    if ($("#parent").children().length === 1) {
        console.log($("#parent").children().length);
        $("div#alrt").css("display", "block")
    }
</script>
