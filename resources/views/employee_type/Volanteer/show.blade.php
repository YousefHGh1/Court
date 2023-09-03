@extends('layout.master')

@section('title')
بيانات المتدرب/المتطوع
@endsection

@section('page_title')
لوحة التحكم
@endsection
@section('sub_main')
المحكمة
@endsection
@section('sub_title')
بيانات المتدرب/المتطوع
@endsection
@section('css')
<style>
    .inbox-header {
        display: flex;
        justify-content: center;
    }

    .baladia {
        padding-top: 30px;
    }

    .sub-title {
        display: flex;
        justify-content: space-between;
    }

    .details {
        display: flex;
        justify-content: space-between;
    }

    input {
        border: 1px solid #000000 !important;
    }

    .btn.btn-light:hover:not(.btn-text):not(:disabled):not(.disabled),
    .btn.btn-light:focus:not(.btn-text),
    .btn.btn-light.focus:not(.btn-text) {
        border: 1px solid #000000 !important;

    }

    .btn.dropdown-toggle.btn-light.bs-placeholder {
        border: 1px solid #000000 !important;

    }
</style>

<style>
    @media print {
        #print_Button {
            display: none;
        }
    }
</style>

<style>
    .req_status_ h5 small {
        font-size: 1.2rem;
        color: #000000 !important;
    }

    .card_print {

        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        min-height: 1px;
        /*padding: 2.25rem;*/
    }

    .mb-7,
    .my-7 {
        margin-bottom: 1.75rem !important;
    }

    .align-items-center {
        -webkit-box-align: center !important;
        -ms-flex-align: center !important;
        align-items: center !important;
    }

    .row {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-left: -12.5px;
        margin-right: -12.5px;
    }

    .mb-4,
    .my-4 {
        margin-bottom: 1rem !important;
    }

    .col-md-4 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 40%;
        flex: 0 0 40%;
        max-width: 40%;
    }

    .col-md-3 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 30%;
        flex: 0 0 30%;
        max-width: 30%;
    }

    .col-md-8 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 60%;
        flex: 0 0 60%;
        max-width: 66%;
    }

    h5,
    .h5 {
        font-size: 1.25rem;
        font-weight: 600;
        margin: 7px
    }

    .small {
        font-size: 80%;
        font-weight: 400;
    }

    .text-muted {
        color: #B5B5C3 !important;
    }

    .col-md-12 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%;
    }

    .d-inline-block {
        display: inline-block !important;
    }

    .address_pen {
        text-align: center;
        border: 1px solid;
        padding: 6px 30px;
        width: max-content;
        margin: 20px auto;
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem;
    }

    small strong p {
        margin-bottom: 0 !important;
    }
</style>

@endsection

@section('content')
<!--begin::Content-->

<!--begin::Container-->
<div class="container" id="container">
    <!--begin::Invoice-->

    <div class="overflow-hidden card card-custom position-relative">
        <!--begin::Invoice header-->
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">

                <div class="card-title">
                    <h3 class="card-label">
                        تفاصيل بيانات المتدرب/المتطوع
                    </h3>
                </div>

                <div class="card-toolbar">

                    <!--begin::Button-->
                    <a class="btn btn-light-primary font-weight-bolder" href="{{url('/volanteer')}}">
                        <span class="navi-icon"><i class="la la-home"></i></span>
                        رجوع
                    </a>
                    <!--end::Button-->
                </div>
            </div>

            <div class="card-body">
                <div class="container" id="container">

                    <div class="card_print" dir="rtl">
                        <!--begin: Search Form-->
                        <!--begin::Search Form-->

                        <style>
                            .req_status_ h5 small {
                                font-size: 1.2rem;
                                color: #000000 !important;
                            }

                            .mb-7,
                            .my-7 {
                                margin-bottom: 1.75rem !important;

                            }

                            .align-items-center {
                                -webkit-box-align: center !important;
                                -ms-flex-align: center !important;
                                align-items: center !important;
                            }

                            .row {
                                display: -webkit-box;
                                display: -ms-flexbox;
                                display: flex;
                                -ms-flex-wrap: wrap;
                                flex-wrap: wrap;
                                margin-left: -12.5px;
                                margin-right: -12.5px;
                            }

                            .mb-4,
                            .my-4 {
                                margin-bottom: 1rem !important;
                            }

                            .col-md-4 {
                                -webkit-box-flex: 0;
                                -ms-flex: 0 0 40%;
                                flex: 0 0 40%;
                                max-width: 40%;
                            }

                            .col-md-3 {
                                -webkit-box-flex: 0;
                                -ms-flex: 0 0 30%;
                                flex: 0 0 30%;
                                max-width: 30%;
                                padding-bottom: 1rem !important;

                            }

                            .col-md-8 {
                                -webkit-box-flex: 0;
                                -ms-flex: 0 0 60%;
                                flex: 0 0 60%;
                                max-width: 66%;
                            }

                            h5,
                            .h5 {
                                font-size: 1.25rem;
                                font-weight: 600;
                                margin: 7px
                            }

                            .small {
                                font-size: 80%;
                                font-weight: 400;
                            }

                            .text-muted {
                                color: #B5B5C3 !important;
                            }

                            .col-md-12 {
                                -webkit-box-flex: 0;
                                -ms-flex: 0 0 100%;
                                flex: 0 0 100%;
                                max-width: 100%;
                            }

                            .d-inline-block {
                                display: inline-block !important;
                            }

                            .address_pen {
                                text-align: center;
                                border: 1px solid;
                                padding: 6px 30px;
                                width: max-content;
                                margin: 20px auto;
                            }

                            p {
                                margin-top: 0;
                                margin-bottom: 1rem;
                            }

                            small strong p {
                                margin-bottom: 0 !important;
                            }
                        </style>

                        <div class="mb-7 req_status_">
                            <h5 class="card-label">
                                <span class="d-block  pt-0  font-size-xxl" style="color: rgb(26, 115, 248)">{{$volanteer->volanteer_name}}</span>
                            </h5>

                            <div class="row align-items-center my-4">
                                
                                <div class="col-md-3 my-md-1">
                                    <h5>
                                        نوع العقد :
                                        <small class="text-muted">{{ $volanteer1->volanteer_type }}</small>
                                    </h5>
                                </div>

                                <div class="col-md-3 my-md-1">
                                    <h5>
                                        مدته :
                                        <small class="text-muted">{{ $volanteer1->volanteer_duration }}</small>
                                    </h5>
                                </div>
                           
                                   <div class="col-md-3 my-md-1">
                                    <h5>
                                        مجال التطوع/التدريب :
                                        <small class="text-muted">{{$volanteer1->named}}</small>
                                    </h5>
                                </div>
                         
                                <div class="col-md-3 my-md-1 ">
                                    <h5>
                                        الدائرة :
                                        <small class="text-muted">{{$volanteer1->circle}}</small>
                                    </h5>
                                </div>
                                <div class="col-md-3 my-md-1">
                                    <h5>
                                        القسم :
                                        <small class="text-muted">{{$volanteer1->section}}</small>
                                    </h5>
                                </div>
                                <div class="col-md-3 my-md-1">
                                    <h5>
                                        الشعبة :
                                        <small class="text-muted">{{$volanteer1->division}}</small>
                                    </h5>
                                </div>
               

                             
                                <div class="col-md-3 my-md-1">
                                    <h5>
                                        تاريخ البدأ :
                                        <small class="text-muted">{{date('Y-m-d', strtotime($volanteer1->volanteer_start_date )) }}</small>
                                    </h5>
                                </div>
                                <div class="col-md-3 my-md-1 ">
                                    <h5>
                                        تاريخ الانتهاء :
                                        <small class="text-muted">{{date('Y-m-d', strtotime($volanteer1->volanteer_end_date )) }}</small>
                                    </h5>
                                </div>
                                <div class="col-md-3 my-md-1">
                                    <h5>
                                        المرفقات :
                                        <a href="{{asset('filevolanteer/' . $volanteer1->file)}} " class="text-muted" target="_blank">{{$volanteer1->file}}</a>
                                    </h5>
                                </div>
                              
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>


<!--end::Invoice-->


<!--end::Content-->
@endsection

@section('scripts')

<script src="{{ asset('assets/js/fancybox.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/features/miscellaneous/sweetalert2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/iziModal.min.js')}}"></script>

@endsection