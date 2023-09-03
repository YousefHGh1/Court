@extends('layout.master')

@section('title')
حجز راتب
@endsection

@section('page_title')
المحكمة
@endsection
@section('sub_main')
طلب تنفيذي
@endsection
@section('sub_title')
حجز راتب
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
                                تفاصيل الإخطار
                                {{--<span class="d-block text-muted pt-2 font-size-sm">Set column width
                                    individually</span>--}}
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
                            <div class="card_print" dir="rtl">

                                <div class="">
                                    <h6 class="order-1 text-black font-weight-boldest order-md-2">
                                        <h2>لدى دائرة التنفيذ
                                            بمحكمة بداية شمال غزة</h2>
                                        <br>
                                        {{-- <input type="text" style="border-color: #ffffff"> --}}
                                        <h2> <u>في القضية التنفيذية رقم ............ / 2023</u> </h2>
                                    </h6>
                                </div>

                                <!--end::Invoice header-->
                                <div class="p-5 row justify-content-center">
                                    <div class="col-md-12">
                                        <!--begin::Invoice body-->
                                        <div class="pb-5 row">
                                            <div class="col-md-8 border-right-md pr-md-10 py-md-10">
                                                <!--begin::عرض المراسلة-->
                                                <div
                                                    class="  font-size-lg font-weight-bold d-flex justify-content-between">
                                                    طالب
                                                    التنفيذ : بلدية جباليا النزلة _
                                                    يمثلهاالسيد / أ.مازن النجار رئيس البلدية<br />بممثلها القاانوني
                                                    /خطاب شهاب

                                                    <div style="float: left;">
                                                        {{ 'رقم الهوية : ' }}
                                                        <input type="number">
                                                    </div>

                                                </div>
                                                <!--end::عرض المراسلة-->
                                                <br />

                                                <!--begin::اسم الموظف-->
                                                <div
                                                    class=" mb-10 font-size-lg font-weight-bold d-flex justify-content-between">
                                                    اسم المنفذ ضده:
                                                    عبد الشافعي
                                                    {{-- @php
                                                    $recipients = explode(', ', $archiveNot->reciver);
                                                    @endphp
                                                    @foreach ($recipients as $recipient)
                                                    <li>{{ $recipient }} <br /></li>
                                                    @endforeach --}}

                                                    <div style="float: left;">
                                                        {{ 'رقم الهوية : ' }}
                                                        <input type="number">
                                                    </div>
                                                </div>

                                                <!--begin::التاريخ-->
                                                {{-- <div class="mb-10 font-size-lg font-weight-bold">عنوان المنفذ ضده :

                                                </div> --}}
                                                <!--end::التاريخ-->


                                                <div class=" font-size-lg font-weight-boldest  ">
                                                    {{-- <textarea name="" id="" cols="110" rows="6"> --}}
                                                    الموضوع : إصدار قرار بحضور فريق واحد يقضي بإيقاع الحجز التنفيذي علي راتب المنفذ ضدة
                                                    لدي بنك ......................... في حدود المبلغ المكحوم به مبلغ ( ....... شيكل )علي
                                                    ذمة القضية
                                                    التنفيذية المرقومة أعلاه واشعار البنك بذلك وتحويل المبلغ المحجوزة من حساب المنفذ ضده
                                                    الي حساب طالب التنفيذ // بلدية جباليا
                                                    {{-- </textarea> --}}

                                                </div>

                                                <div class="pt-5">

                                                    <center>
                                                        <h5><strong>التفاصيل</strong></h5>
                                                    </center> <br>
                                                    <ol class="font-weight-boldest mr-5">
                                                        <li>تم رفع القضية التنفيذية المرقومة أعلاه على المستدعى ضده
                                                            (المنفذ ضده) وتم
                                                            إخطاره من
                                                            قبل .</li>
                                                        <li>المستدعى ضده لم يلتزم بإخطار المحكمة بدفع المبلغ المحكوم به
                                                            لصالح المستدعي
                                                            خلال
                                                            المهلة المحددة وقد انتهت المهلة القانونية المحددة بإخطار
                                                            تنفيذ الحكم .</li>
                                                        <li>وحيث أن المستدعى ضده يعمل موظف حكومي ويتقاضى راتب شهري من
                                                            أحد البنوك أو
                                                            البريد.</li>
                                                        <li>لذا نلتمس من الأستاذ / قاضي التنفيذ إصدار قرار بحضور فريق
                                                            واحد يقضي بإيقاع
                                                            الحجز
                                                            التنفيذي علي راتب المنفذ ضدة لدي بنك فلسطين علي ذمة القضية
                                                            التنفيذية
                                                            المرقومة أعلاه
                                                            واشعار البنك بذلك.</li>
                                                    </ol>
                                                    <h4>- كل ذلك نلتمس من مقام محكمتكم الموقرة</h4>

                                                    <center>وتفضلوا بقبول فائق الاحترام</center>

                                                </div>

                                                <div class=" pt-5 font-weight-boldest">
                                                    جبالبا تحريراً في : <input type="date">

                                                </div>

                                            </div>




                                        </div>








                                        <div class="mb-5 font-size-lg font-weight-boldest d-flex justify-content-around"
                                            style="text-align: center;">
                                            قرار <br>
                                            أقرر الاستجابة لطلب المستدعية بإيقاع الحجز التنفيذي علي <br>
                                            مبلغ ( ...... شيكل ) علي المستدعي ضده لسداد المديونية <br>
                                            لدي البنك مع أشعار البنك بذلك حسب الأصول

                                            <br>
                                            قاضي التنفيذ

                                            <div class="font-weight-boldest">

                                                المستدعي / طالبة التنفيذ<br>
                                                بلديه جباليا النزله

                                            </div>
                                        </div>



                                    </div>


                                    <!--end::Invoice body-->
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


                            <br><br>



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
                                    {{ ' الموضوع / إصدار قرار بحضور فريق واحد يقضي بإيقاع الحجز التنفيذي علي راتب
                                    المنفذ ضدة لدي بنك ......................... في حدود المبلغ المكحوم به مبلغ
                                    ( ....... شيكل )علي ذمة القضية التنفيذية المرقومة أعلاه واشعار البنك بذلك وتحويل
                                    المبلغ
                                    المحجوزة من حساب المنفذ ضده الي حساب طالب التنفيذ // بلدية جباليا' }}</div>
                            </div>
                            <hr style="width: 100%;border-color: #000;margin-top: 5px;border-top: 5px;">
                            <div style="display: flex">

                                <div>
                                    <u> {{ ' التفاصيل ' }}</u>
                                </div>
                            </div>



                            <div style="display: flex ">
                                <div class="mb-5 font-size-lg font-weight-bold ">
                                    <h4>
                                        <ol class="font-weight-boldest mr-5">
                                            <li>تم رفع القضية التنفيذية المرقومة أعلاه على المستدعى ضده (المنفذ ضده) وتم
                                                إخطاره من
                                                قبل .</li>
                                            <li>المستدعى ضده لم يلتزم بإخطار المحكمة بدفع المبلغ المحكوم به لصالح
                                                المستدعي
                                                خلال
                                                المهلة المحددة وقد انتهت المهلة القانونية المحددة بإخطار تنفيذ الحكم .
                                            </li>
                                            <li>وحيث أن المستدعى ضده يعمل موظف حكومي ويتقاضى راتب شهري من أحد البنوك أو
                                                البريد.</li>

                                        </ol>

                                        <li>لذا نلتمس من الأستاذ / قاضي التنفيذ إصدار قرار بحضور فريق واحد يقضي بإيقاع
                                            الحجز
                                            التنفيذي علي راتب المنفذ ضدة لدي بنك فلسطين علي ذمة القضية التنفيذية
                                            المرقومة أعلاه
                                            واشعار البنك بذلك.</li>
                                        <h4 style="padding-right: 30%;">وتفضلوا بقبول فائق الاحترام</h4>

                                        <br>
                                        جبالبا تحريراً في :{{ date_format($court->created_at, 'd/m/Y') }} <br>
                                    </h4>
                                </div>
                            </div>



                            <div style="display: flex ">

                                <div style="text-align: center;padding-top:6%">

                                    <h4> قرار <br>
                                    </h4>
                                    <h4> أقرر الاستجابة لطلب المستدعية بإيقاع الحجز التنفيذي علي
                                        <br>مبلغ ( ...... شيكل ) علي المستدعي ضده لسداد المديونية
                                        <br>لدي البنك مع أشعار البنك بذلك حسب الأصول

                                        <br>
                                        قاضي التنفيذ

                                    </h4>
                                </div>
                            </div>


                            <div style="display: flex ">

                                <style>
                                    .bottom-left {
                                        position: fixed;
                                        bottom: 25%;
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