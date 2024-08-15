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
<div>
    <!-- Button trigger modal -->

    <div class="container d-flex justify-content-center">

        <button type="button" class="btn" style="background-color: orange;" data-toggle="modal" data-target="#exampleModal">
            <i class="fa-solid fa-qrcode fa-beat"></i>
        </button>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Parcel Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="row g-0">

                        <div class="col-md-8 border-right">

                            <div class="status p-3">

                                <table class="table table-borderless">

                                    <tbody>
                                        <tr>

                                            <td>
                                                <div class="d-flex flex-column">

                                                    <span class="heading d-block">Hospital</span>
                                                    <span class="subheadings">Cairo Hospital</span>


                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">

                                                    <span class="heading d-block">Time/Date</span>
                                                    <span class="subheadings">5:00PM 3-12-2020</span>


                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">

                                                    <span class="heading d-block">Status</span>
                                                    <span class="subheadings"><i class="dots"></i> Booked</span>


                                                </div>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>
                                                <div class="d-flex flex-column">

                                                    <span class="heading d-block">Speciality</span>
                                                    <span class="subheadings">Dental Clinic</span>


                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">

                                                    <span class="heading d-block">Referring Doctor</span>
                                                    <span class="subheadings">Dr. Harry Pimn</span>


                                                </div>
                                            </td>
                                            <td>


                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <span class="heading d-block">Contact</span>
                                                    <span class="subheadings">52, Maria Block, Victoria Road, CA
                                                        USA</span>
                                                </div>
                                            </td>

                                            <td colspan="2">

                                                <div class="d-flex flex-column">
                                                    <span class="heading d-block">Reason of visiting</span>
                                                    <span class="subheadings">Lorem ipsum is placeholder text commonly
                                                        used in the graphic, print.</span>
                                                </div>
                                            </td>

                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <span class="heading d-block">Direction</span>
                                                    <span class="d-block subheadings">Get direction by using</span>
                                                    <span class="d-flex flex-row">

                                                        <img src="https://img.icons8.com/color/100/000000/google-maps.png"
                                                            class="rounded" width="30" />

                                                        <img src="https://img.icons8.com/color/100/000000/pittsburgh-map.png"
                                                            class="rounded" width="30" />

                                                    </span>

                                                </div>
                                            </td>

                                            <td colspan="2">

                                                <div class="d-flex flex-column">
                                                    <span class="heading d-block">Hospital Gallary</span>
                                                    <span class="d-flex flex-row gallery">

                                                        <img src="https://i.imgur.com/VfRSLTm.jpg" width="50"
                                                            class="rounded">
                                                        <img src="https://i.imgur.com/jb9Cy5h.jpg" width="50"
                                                            class="rounded">
                                                        <img src="https://i.imgur.com/vBUz4HA.jpg" width="50"
                                                            class="rounded">

                                                    </span>
                                                </div>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>



                            </div>




                        </div>
                        <div class="col-md-4">

                            <div class="p-2 text-center">

                                <div class="profile">

                                    <img src="https://i.imgur.com/VfRSLTm.jpg" width="100"
                                        class="rounded-circle img-thumbnail">

                                    <span class="d-block mt-3 font-weight-bold">Dr. Samsung Philip.</span>

                                </div>

                                <div class="about-doctor">

                                    <table class="table table-borderless">

                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex flex-column">

                                                        <span class="heading d-block">Education</span>
                                                        <span class="subheadings">University of Harward</span>


                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex flex-column">

                                                        <span class="heading d-block">Language</span>
                                                        <span class="subheadings">Spanish, English</span>


                                                    </div>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>
                                                    <div class="d-flex flex-column">

                                                        <span class="heading d-block">Organisation</span>
                                                        <span class="subheadings">Accupunture</span>


                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex flex-column">

                                                        <span class="heading d-block">Specialist</span>
                                                        <span class="subheadings">Accupunture</span>


                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>

                            </div>

                        </div>



                    </div>



                </div>

            </div>
        </div>
    </div>
</div>
