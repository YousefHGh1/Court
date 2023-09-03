{{-- Extends layout --}}
@extends('layout.default')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/fancybox.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/iziModal.min.css')}}"> <!-- Original -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/izi-modal.min.css')}}">
    <style>
        h5{
            font-weight: 600;
        }
    </style>
@endsection
{{-- Content --}}
@section('content')

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    تفاصيل الإخطار
                    {{--<span class="d-block text-muted pt-2 font-size-sm">Set column width individually</span>--}}
                </h3>
            </div>
            <div class="card-toolbar">

                <button type="button" class="btn btn-light-primary font-weight-bolder print">
                    <span class="navi-icon"><i class="la la-print"></i></span>
                    طباعة
                </button>

            </div>
        </div>

        <div class="card-body">
            <div class="card_print" dir="rtl">
                <!--begin: Search Form-->
                <!--begin::Search Form-->

                <style>
                    .req_status_ h5 small{
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
                        margin-bottom: 1.75rem !important; }
                    .align-items-center {
                        -webkit-box-align: center !important;
                        -ms-flex-align: center !important;
                        align-items: center !important; }
                    .row {
                        display: -webkit-box;
                        display: -ms-flexbox;
                        display: flex;
                        -ms-flex-wrap: wrap;
                        flex-wrap: wrap;
                        margin-left: -12.5px;
                        margin-right: -12.5px; }
                    .mb-4,
                    .my-4 {
                        margin-bottom: 1rem !important; }
                    .col-md-4 {
                        -webkit-box-flex: 0;
                        -ms-flex: 0 0 40%;
                        flex: 0 0 40%;
                        max-width: 40%; }
                    .col-md-3 {
                        -webkit-box-flex: 0;
                        -ms-flex: 0 0 30%;
                        flex: 0 0 30%;
                        max-width: 30%; }
                    .col-md-8 {
                        -webkit-box-flex: 0;
                        -ms-flex: 0 0 60%;
                        flex: 0 0 60%;
                        max-width: 66%;
                    }

                    h5, .h5 {
                        font-size: 1.25rem; font-weight: 600;
                        margin:7px}
                    .small {
                        font-size: 80%;
                        font-weight: 400; }
                    .text-muted {
                        color: #B5B5C3 !important; }
                    .col-md-12 {
                        -webkit-box-flex: 0;
                        -ms-flex: 0 0 100%;
                        flex: 0 0 100%;
                        max-width: 100%; }
                    .d-inline-block {
                        display: inline-block !important; }
                    .address_pen{
                        text-align: center;
                        border: 1px solid;
                        padding: 6px 30px;
                        width: max-content;
                        margin: 20px auto;
                    }
                    p {
                        margin-top: 0;
                        margin-bottom: 1rem; }
                    small strong p{
                        margin-bottom: 0!important;
                    }

                </style>
                {{--<div class="img_nazla"></div>--}}
                {{--<img src="{{url('assets/nazla.PNG')}}" class="img_nazla" style="display: none;">--}}
                {{--<hr style="display: none">--}}
                {{--<h5 class="address_pen" style="display: none">طلبات الجمهور</h5>--}}
                <div class="mb-7 req_status_">
                    <div class="row align-items-center my-4">
                        <div class="col-md-3 my-md-1">
                            <h5>
                                السنة   :
                                <small class="text-muted">{{$notice->year}}</small>
                            </h5>
                        </div>
                        <div class="col-md-3 my-md-1">
                            <h5>
                                رقـم الإخطار   :
                                <small class="text-muted">{{$notice->notice_id}}</small>
                            </h5>
                        </div>
                        <div class="col-md-3 my-md-1">
                            <h5>
                                رقـم الاشتراك   :
                                <small class="text-muted">{{$notice->jebaia_no ? $notice->jebaia_no : "  --"}}</small>
                            </h5>
                        </div>
                        <div class="col-md-3 my-md-1 ">
                            <h5>
                                الاســــــم    :
                                <small class="text-muted">{{$notice->user->name}}</small>
                            </h5>
                        </div>
                        <div class="col-md-3 my-md-1 ">
                            <h5>
                                رقم الهويـــة    :
                                <small class="text-muted">{{$notice->user->identity_number ? $notice->user->identity_number : "  --"}}</small>
                            </h5>
                        </div>
                        <div class="col-md-3 my-md-1 ">
                            <h5>
                                رقم القضيـــــة    :
                                <small class="text-muted">{{$notice->rent_location_name ? $notice->rent_location_name : "  --"}}</small>
                            </h5>
                        </div>

                        <div class="col-md-3 my-md-1 ">
                            <h5>
                                رقم الجـــوال   :
                                <small class="text-muted">{{$notice->user->profile->mobile}}</small>
                            </h5>
                        </div>
                        <div class="col-md-3 my-md-1 ">
                            <h5>
                                المبلغ المحكوم    :
                                <small class="text-muted">{{$notice->fine_amount}}</small>
                            </h5>
                        </div>

                        <div class="col-md-3 my-md-1 ">
                            <h5>
                                العـــنــــــــــــــــوان    :
                                <small class="text-muted">{{$notice->notice_address ? $notice->notice_address : "  --"}}</small>
                            </h5>
                        </div>
                        {{--</div>--}}

                        {{--<div class="row align-items-center my-4">--}}
                        <div class="col-md-3 my-md-1 ">
                            <h5>
                                تاريخ الإخطار  :
                                <small class="text-muted">{{\Carbon\Carbon::parse($notice->created_at)->format('d-m-Y h:i A')}}</small>
                            </h5>
                        </div>
                        <div class="col-md-3 my-md-1 ">
                            <h5>
                                سبــب الإخطار  :
                                <small class="text-muted">{{$notice->noticeReason->name}}</small>
                            </h5>
                        </div>
                        <div class="col-md-3 my-md-1 ">
                            <h5>
                                نوع الســوق  :
                                <small class="text-muted">{{$notice->rent_location->name}}</small>
                            </h5>
                        </div>
                        {{--<div class="col-md-8 my-md-1 ">--}}
                        {{--<h5>--}}
                        {{--حالـة الطلــب    :--}}
                        {{--<small class="text-muted">{{$status}}</small>--}}
                        {{--</h5>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-4 my-md-1 ">--}}
                        {{--<h5>--}}
                        {{--رقم القطعـــة  :--}}
                        {{--<small class="text-muted">{{$requests->mokalaf->addressMokalaf->widget}}</small>--}}
                        {{--</h5>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3 my-md-1 ">--}}
                        {{--<h5>--}}
                        {{--رقم القسيمـة  :--}}
                        {{--<small class="text-muted">{{$requests->mokalaf->addressMokalaf->voucher}}</small>--}}
                        {{--</h5>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3 my-md-1 ">--}}
                        {{--<h5>--}}
                        {{--حساب الجباية  :--}}
                        {{--<small class="text-muted">{{$requests->mokalaf->jebaia_no}}</small>--}}
                        {{--</h5>--}}
                        {{--</div>--}}


                        {{--</div>--}}



                        {{--<div class="row align-items-center my-4">--}}

                        {{--<div class="col-md-6 my-md-0 ">--}}
                        {{--<h5>--}}
                        {{--رقم القسيمة  :--}}
                        {{--<small class="text-muted">{{$requests->mokalaf->addressMokalaf->voucher}}</small>--}}
                        {{--</h5>--}}
                        {{--</div> --}}
                    </div>


                </div>




            </div>
        </div>

        <div class="notices_print">
            <div  dir="rtl" id="notices_print_" style="font-size: 20px;display: none">
                <div style="display: flex">
                    <div style="text-align: center;margin-left: auto;margin-right: auto;">
                        <h5 style="margin-bottom: 0!important;">السلطة الوطنية الفلسطينية</h5>
                        <h5 style="margin-top: 0!important;">السلطة القضائية</h5>
                    </div>
                    <div style="margin-left: auto;margin-top: auto;margin-bottom: auto;"><img src="{{url('assets/court.jpeg')}}" height="60"></div>
                </div>

                <div style="text-align: center;">
                    <h5 style="margin-bottom: 0!important;">إخطار لتنفيذ حكم</h5>
                    <h5 style="text-decoration: underline;margin-top:  0!important;">دائرة إجراء محكمة بداية شمال غزة</h5>
                </div>

                <div style="display: flex">
                    <div style="margin-left: auto;">
                        <h5>إلى: <span style="text-decoration: underline;">{{$notice->user->name}}</span></h5>
                    </div>
                    <div>
                        <h5>رقم هوية: <span style="text-decoration: underline;">{{$notice->user->identity_number}}</span></h5>
                    </div>
                </div>

                <h5>العنوان: <span style="text-decoration: underline;">{{$notice->notice_address}}</span></h5>
                <h5>طبقاً للحكم الصادر ضدك من محكمة بداية شمال غزة</h5>

                <div style="display: flex">
                    <div style="margin-left: auto;">
                        <h5>لصالح/ <span style="text-decoration: underline;">بلدية جباليا النزلة</span></h5>
                    </div>
                    <div>
                        <h5>بتاريخ: <span style="text-decoration: underline;">{{\Carbon\Carbon::parse($notice->created_at)->format('d/m/Y')}}</span></h5>
                    </div>
                </div>

                <h5>نبلغك بأن تدفع لهذه الدائرة المبلغ المحكوم وقدره {{$notice->fine_amount}} شيكل</h5>

                <div style="display: flex">
                    <div style="margin-left: auto;">
                        <h5>مقابل: <span style="text-decoration: underline;">{{$notice->noticeReason->name}}</span></h5>
                    </div>
                    <div>
                        <h5>على حساب رقم: <span style="text-decoration: underline;">{{$notice->jebaia_no}}</span></h5>
                    </div>
                </div>

                <h5>لغاية فاتورة شهر <span>{{$notice->notice_month}} / {{$notice->year}} </span> بالإضافة لرسوم القضية التنفيذية.</h5>
                <h5>وفي حال تخلفك عن دفع المبلغ المذكور خلال مدة أسبوع من تاريخ استلامك لهذا الإخطار</h5>
                <h5>سيتم اتخاذ الإجراءات القانونية ضدك.</h5>

                <div style="display: flex">
                    <h5 style="margin-right: auto;">التاريخ ...../...../{{date('Y')}}</h5>
                </div>

                <div style="display: flex"><h5 style="margin-bottom: 0;">أثبت إنني في يوم</h5><span style="flex-grow: 1;border-bottom: 1px dotted currentcolor;margin: 0 0.5rem 0.25rem;"></span></div>
                <div style="display: flex"><h5 style="margin-bottom: 0;">بلغت صورة هذا الإخطار إلي</h5><span style="flex-grow: 1;border-bottom: 1px dotted currentcolor;margin: 0 0.5rem 0.25rem;"></span> </div>
                <div style="display: flex;margin: 20px 0;"><span style="flex-grow: 1;border-bottom: 1px dotted currentcolor;margin: 0 0.5rem 0.25rem;"></span></div>

                <div style="display: flex">
                    <div style="margin-right: auto;display: flex">
                        <div style="text-align: center">
                            <h5>..........................</h5>
                            <h5>المعلن إليه</h5>
                        </div>
                        <div style="text-align: center">
                            <h5>..........................</h5>
                            <h5>الشهود</h5>
                        </div>
                        <div style="text-align: center">
                            <h5>..........................</h5>
                            <h5>المباشر</h5>
                        </div>
                    </div>

                </div>

                <div style="margin-top: 30px;margin-bottom: 20px">
                    <hr style="width: 85%;border-color: #000;margin-bottom: 0;border-top: 1px;">
                    <h5 style="text-align: center;">تنبيه: يجب التوقيع على أي تغيير يحدث في هذا النموذج من المأمور الصادرة منه</h5>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- Styles Section --}}


{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('assets/js/fancybox.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/features/miscellaneous/sweetalert2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/iziModal.min.js')}}"></script>


    <script type='text/javascript'>
        $(function () {
            $(".print").on('click', function () {
                var w=window.open('Print');
                w.document.write($('.notices_print').html());
                w.document.write('<style>#notices_print_{display: block!important;}h5{margin: 10px;}/*@page { size: A5;margin: 0; }body {height: 210mm; width: 148.5mm; margin: 0;}*/</style>');
                w.print();
                w.close();
                w.focus();

            });
        });
    </script>

@endsection
