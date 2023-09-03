@extends('layout.master')

@section('title')
منع سفر
@endsection

@section('page_title')
المحكمة
@endsection
@section('sub_main')
طلب تنفيذي
@endsection

@section('sub_title')
منع سفر
@endsection
@section('css')
<style>
    * {
        font-family:
    }

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
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container" id="container">
            <!--begin::Invoice-->

            <div class="overflow-hidden card card-custom position-relative">
                <!--begin::Invoice header-->

                <div class="card card-custom">

                    <div class="card-header flex-wrap border-0 pt-6 pb-0">

                        <div class="card-title">
                            <h3 class="card-label">
                            </h3>
                        </div>

                        <div class="card-toolbar">

                            <!--begin::Button-->
                            <button type="button" class="btn btn-light-primary font-weight-bolder print">
                                <span class="navi-icon"><i class="la la-print"></i></span>
                                طباعة
                            </button>
                            <!--end::Button-->
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="container" id="container">
                            <!--begin::Invoice-->
                            <div dir="rtl" id="courts_print" style="font-size: 20px;">
                                <!--begin::Invoice header-->
                                <div class="px-8 py-8 row justify-content-center ">
                                    <div class="col-md-8">
                                        <div class="">
                                            <h6 class="order-1 text-black font-weight-boldest order-md-2">
                                                <h2 style="margin-bottom: 10px;"><u> لدى دائرة التنفيذ بمحكمة بداية شمال
                                                        غزة </u></h2>
                                                <h2 style="margin-top: 0!important;"> <u>في القضية التنفيذية رقم
                                                        ............ / 2023</u> </h2>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Invoice header-->

                                <div style="display: flex">
                                    @foreach($court['summoners'] as $summoner)
                                    <div style="margin-left: auto;">
                                        <h5>طالب التنفيذ : بلدية جباليا النزلة -
                                            يمثلهاالسيد/ أ.{{$summoner->summoner}} رئيس البلدية
                                        </h5>
                                        <div style="margin-right: 45%">
                                            بممثلها القاانوني / خطاب شهاب
                                        </div>
                                    </div>
                                    @endforeach
                                    <div>
                                        <h5> <input value="{{$summoner->idno_summoner}}"
                                                style="text-align:center;padding:7px;border:1px solid black"></h5>
                                    </div>
                                </div>

                                {{-- <h5 style="font-weight:inherit ;font-size:1.2rem ">عنوان طالب التنفيذ / جباليا
                                    البلد مقابل عيادة شهداء جباليا</h5> --}}

                                <br>

                                <div style="display: flex">
                                    @foreach($court['defendants'] as $defendant)
                                    <div style="margin-left: auto;">
                                        <h5> اسم المنفذ ضده/
                                            {{ $defendant->defendant }}</h5>
                                        <div style="margin-right: 45%">
                                        </div>
                                    </div>
                                    @endforeach
                                    <div>
                                        <h5> <input value="{{$defendant->idno_defendant}}"
                                                style="text-align:center;padding:7px;border:1px solid black"></h5>
                                    </div>
                                </div>

                                <br>

                                <div style="display: flex">
                                    <div style="padding-right: 10px; padding-bottom: 15px;padding-top: 15px;">
                                        {{ 'الموضوع : إصدار قرار بحضور فريق واحد يقضي بمنع المستدعي ضده من السفر خارج
                                        البلاد
                                        وإشعار دائرة المعابر والحدود والجهات المختصة بذلك' }}</div>
                                </div>

                                <div style="display: flex">

                                    <div style="margin-right: 50%; font-size:24px">
                                        <u> {{ ' التفاصيل ' }}</u>
                                    </div>
                                </div>

                                <div style="display: flex ">
                                    <div class="mb-1 font-size-lg font-weight-bold ">
                                        <h4>
                                            <ol class="font-weight-boldest mr-5">
                                                <li>حيث أن المستدعية اقامت القضية التنفيذية المرقومة أعلاة ضد المستدعي
                                                    عن
                                                    بالمبلغ الوارد في القضية التنفيذية .</li>
                                                <li>حيث ان المستدعي ضده لم يحضر الي البلدية أو لم يعترض عن القضية
                                                    التنفيذية رغم
                                                    تبليغه بها حسب الاصول .</li>
                                                <li>المستدعي ضده لم يتقدم بأي طلبات من شأنها التأشير في سير القضية
                                                    التنفيذية
                                                    المرقومة أعلاه رغم تبليغه حسب الاصول .</li>
                                                <li>وحيث أن المستدعي ضدة يحاول السفر خارج البلاد أو في الارضي الفلسطينية
                                                    المحتلة
                                                    لتهرب من دفع المبلغ المستحق علية بموجب السند التنفيذي في القضية
                                                    التنفيذية
                                                    المرقومة أعلاه .</li>
                                            </ol>

                                            <li>لذا نلتمس من الأستاذ / قاضي التنفيذ إصدار قرار بحضور فريق واحد يقضي
                                                بإيقاع
                                                الحجز
                                                التنفيذي علي راتب المنفذ ضدة لدي بنك فلسطين علي ذمة القضية التنفيذية
                                                المرقومة أعلاه
                                                واشعار البنك بذلك.</li>
                                            <h4 style="">- كل ذلك نلتمس من مقام محكمتكم الموقرة</h4>
                                            <h4 style="">إصدار قرار بحضور فريق واحد يقضي بمنع المستدعي ضده من السفر خارج
                                                البلاد وإشعار
                                                دائرة المعابر والحدود والجهات المختصة بذلك حسب الاصول</h4>

                                            <center>وتفضلوا بقبول فائق الاحترام</center>

                                            <br>
                                            جبالبا تحريراً في :{{ date_format($court->created_at, 'd/m/Y') }}

                                        </h4>
                                    </div>
                                </div>

                                <div style="display: flex ">

                                    <div style="text-align: center;">

                                        <h4> قرار </h4>

                                        <h4> أقرر إجابة الطلب مع أشعار البنك ودائرة <br>
                                            المعابر والحدود بذلك حسب الأصول
                                            <br>
                                            قاضي التنفيذ
                                        </h4>
                                    </div>
                                </div>

                                <div style="display: flex ">
                                    <div class="" style="margin-right: 80%">
                                        <h4> المستدعي / طالبة التنفيذ
                                            <br> بلديه جباليا النزله
                                        </h4>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>


                    <div class="courts_print">
                        <div dir="rtl" id="courts_print_" style="font-size: 20px;display: none">
                            <!--begin::Invoice header-->
                            <div class="px-8 py-8 row justify-content-center ">
                                <div class="col-md-8">
                                    <div class="">
                                        <h6 class="order-1 text-black font-weight-boldest order-md-2">
                                            <h2 style="margin-bottom: 10px;"><u> لدى دائرة التنفيذ بمحكمة بداية شمال غزة
                                                </u></h2>
                                            <h2 style="margin-top: 0!important;"> <u>في القضية التنفيذية رقم
                                                    ............ / 2023</u> </h2>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <!--end::Invoice header-->


                            <div style="display: flex">
                                @foreach($court['summoners'] as $summoner)
                                <div style="margin-left: auto;">
                                    <h5>طالب التنفيذ : بلدية جباليا النزلة -
                                        يمثلهاالسيد/ أ.{{$summoner->summoner}} رئيس البلدية
                                    </h5>
                                    <div style="margin-right: 45%">
                                        بممثلها القاانوني / خطاب شهاب
                                    </div>
                                </div>
                                @endforeach
                                <div>
                                    <h5> <input value="{{$summoner->idno_summoner}}"
                                            style="text-align:center;padding:7px;border:1px solid black"></h5>
                                </div>
                            </div>

                            {{-- <h5 style="font-weight:inherit ;font-size:1.2rem ">عنوان طالب التنفيذ / جباليا البلد
                                مقابل عيادة شهداء جباليا</h5> --}}


                            <br>



                            <div style="display: flex">
                                @foreach($court['defendants'] as $defendant)
                                <div style="margin-left: auto;">
                                    <h5> اسم المنفذ ضده/
                                        {{ $defendant->defendant }}</h5>
                                    <div style="margin-right: 45%">
                                    </div>
                                </div>
                                @endforeach
                                <div>
                                    <h5> <input value="{{$defendant->idno_defendant}}"
                                            style="text-align:center;padding:7px;border:1px solid black"></h5>
                                </div>
                            </div>

                            <br>

                            <div style="display: flex">

                                <div style="padding-right: 10px; padding-bottom: 15px;padding-top: 15px;">
                                    {{ 'الموضوع : إصدار قرار بحضور فريق واحد يقضي بمنع المستدعي ضده من السفر خارج البلاد
                                    وإشعار دائرة المعابر والحدود والجهات المختصة بذلك' }}</div>

                            </div>
                            {{--
                            <hr style="width: 100%;border-color: #000;margin-top: 5px;border-top: 5px;"> --}}
                            <div style="display: flex">

                                <div style="margin-right: 50%; font-size:24px">
                                    <u> {{ ' التفاصيل ' }}</u>
                                </div>
                            </div>



                            <div style="display: flex ">
                                <div class="mb-1 font-size-lg font-weight-bold ">
                                    <h4>
                                        <ol class="font-weight-boldest mr-5">
                                            <li>حيث أن المستدعية اقامت القضية التنفيذية المرقومة أعلاة ضد المستدعي عن
                                                بالمبلغ الوارد في القضية التنفيذية .</li>
                                            <li>حيث ان المستدعي ضده لم يحضر الي البلدية أو لم يعترض عن القضية التنفيذية
                                                رغم
                                                تبليغه بها حسب الاصول .</li>
                                            <li>المستدعي ضده لم يتقدم بأي طلبات من شأنها التأشير في سير القضية التنفيذية
                                                المرقومة أعلاه رغم تبليغه حسب الاصول .</li>
                                            <li>وحيث أن المستدعي ضدة يحاول السفر خارج البلاد أو في الارضي الفلسطينية
                                                المحتلة
                                                لتهرب من دفع المبلغ المستحق علية بموجب السند التنفيذي في القضية
                                                التنفيذية
                                                المرقومة أعلاه .</li>
                                        </ol>

                                        <li>لذا نلتمس من الأستاذ / قاضي التنفيذ إصدار قرار بحضور فريق واحد يقضي بإيقاع
                                            الحجز
                                            التنفيذي علي راتب المنفذ ضدة لدي بنك فلسطين علي ذمة القضية التنفيذية
                                            المرقومة أعلاه
                                            واشعار البنك بذلك.</li>
                                        <h4 style="">- كل ذلك نلتمس من مقام محكمتكم الموقرة</h4>
                                        <h4 style="">إصدار قرار بحضور فريق واحد يقضي بمنع المستدعي ضده من السفر خارج
                                            البلاد وإشعار
                                            دائرة المعابر والحدود والجهات المختصة بذلك حسب الاصول</h4>

                                        <center>وتفضلوا بقبول فائق الاحترام</center>

                                        <br>
                                        جبالبا تحريراً في :{{ date_format($court->created_at, 'd/m/Y') }}

                                    </h4>
                                </div>
                            </div>


                            <div style="display: flex ">

                                <div style="text-align: center;">

                                    <h4> قرار </h4>

                                    <h4> أقرر إجابة الطلب مع أشعار البنك ودائرة <br>
                                        المعابر والحدود بذلك حسب الأصول
                                        <br>
                                        قاضي التنفيذ
                                    </h4>
                                </div>
                            </div>


                            <div style="display: flex ">

                                <style>
                                    .bottom-left {
                                        position: fixed;
                                        bottom: 5%;
                                        left: 0;
                                        text-align: left;
                                    }
                                </style>

                                <div class="bottom-left" style="text-align: center; float:left">
                                    <h4> المستدعي / طالبة التنفيذ
                                        <br> بلديه جباليا النزله
                                    </h4>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!--end::Invoice-->
            </div>
        </div>
    </div>
</div>


<!--end::Content-->
@endsection

@section('scripts')



<script src="{{ asset('assets/js/fancybox.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/features/miscellaneous/sweetalert2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/iziModal.min.js')}}"></script>


<script type='text/javascript'>
    $(function() {
        $(".print").on('click', function() {
            var w = window.open('Print');
            w.document.write($('.courts_print').html());
            w.document.write('<style>#courts_print_{display: block!important;}h5{margin: 10px;}/*@page { size: A5;margin: 0; }body {height: 210mm; width: 148.5mm; margin: 0;}*/</style>');
            w.print();
            w.close();
            w.focus();

        });
    });

</script>

@endsection