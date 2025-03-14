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
            font-size: 8px;
        }

        .subject h3 {
            font-size: 10px;

        }
    }
</style>
<x-deliver-layout>
    <div style="width: 95%;" id="parent" class="mx-auto mt-5">
        <div class="my-2">
            <p  style="color: rgb(165, 165, 165)">Nombre de colis : {{$colis->count() }} </p>
        </div>

        @if ($colis->count() > 0)
            @foreach ($colis as $coli)
                    <div class="wrapper-info mb-3">
                        <div class="card" style="border-left: 5px solid #ed6e09;">
                            <div class="d-flex  w-100 justify-content-between align-items-center">
                                <div class="icon col-2" style="color: orangered">
                                    @if ($coli->complaint->status === 'Reporté')
                                        <i class="fa-regular fa-clock fa-fade"></i>
                                    @else
                                        <i class="fa-solid fa-xmark fa-fade"></i>
                                    @endif
                                </div>
                                <div class="subject col-8">
                                    <h3 class="" style="color: #ed6e09;">{{ $coli->complaint->status }}</h3>
                                    <p class="" style="color: #ed6e09;">code : {{ $coli->code }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="width: fit-content; margin-top:15px ">
                            <p style="color: rgb(207, 207, 207);font-size: 13px">{{ $coli->complaint->updated_at->format('H:i') }} <i
                                    class="fa-regular fa-clock"></i>
                            </p>       
                    </div>
            @endforeach
            
        @else
            <div class="wrapper-info">
                <div class="card">
                    <div class="row w-100 align-items-center">
                        <div class="icon col-2"><i class="fas fa-info-circle"></i></div>
                    <div class="subject col-10">
                        <h3 class="text-primary">Info</h3>
                        <p class="text-info">there is yet no delayed parcels for today</p>
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
    
</script>
