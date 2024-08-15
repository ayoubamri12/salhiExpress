<style>
    .close:focus {
        outline: 1px dotted #fff !important;
    }
.close:hover{
    cursor: pointer;
}
    .modal-body {
        padding: 0rem !important;
    }

    .modal-title {

        color: #fff;
    }

    .modal-header {

        background: orange;
        color: #fff !important;
    }

    .fa-close {
        color: #fff;
    }

    .heading {

        font-weight: 500 !important;
    }

    .subheadings {
        font-size: 12px;
        color: #9c27b0;
    }


    .dots {
        height: 10px;
        width: 10px;
        background-color: green;
        border-radius: 50%;
        display: inline-block;
        margin-right: 5px;
    }

    .gallery img {

        margin-right: 10px;
    }

    .fs-9 {
        font-size: 9px;
    }
</style>
@props(["text","coli"])
<div>
    <!-- Button trigger modal -->

    <div class="container d-flex justify-content-center">
        <button href="" class="dropdown-item" data-toggle="modal" data-target="#exampleModal{{$coli->id}}">
            <i class="bx bxs-pencil mr-2"></i> {{$text}}
        </button>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal{{$coli->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Parcel Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                  ouheigybf
                </div>

            </div>
        </div>
    </div>
</div>
