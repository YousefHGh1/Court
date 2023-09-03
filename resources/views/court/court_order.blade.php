@extends('layout.master')

@section('title')
طلب تنفيذي
@endsection

@section('page_title')
لوحة التحكم
@endsection

@section('sub_main')
المحكمة
@endsection

@section('sub_title')
طلب تنفيذي
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
                                {{-- <span class="d-block text-muted pt-2 font-size-sm">Set column width
                                    individually</span> --}}
                            </h3>
                        </div>

                        <div class="card-toolbar">
                            <!--begin::Button-->
                            @if ($court->action_type == 'طلب تنفيذي')
                            <button type="button" class="btn btn-light-primary font-weight-bolder print">
                                <span class="navi-icon"><i class="la la-print"></i></span>
                                طلب تنفيذي
                            </button>
                            @endif
                            <!--end::Button-->

                            <!--begin::Dropdown-->
                            {{-- تسوية --}}
                            @if ($court->action_type == 'طلب تنفيذي'||
                            $court->action_type == 'تسوية - تقسيط'||
                            // $court->action_type == 'فك حجز راتب - تقسيط' ||
                            $court->action_type == 'تسوية - دفع كامل')
                            <div class="mr-5 ml-5 btn-group">
                                <button type="button" class="btn btn-success font-weight-bolder">
                                    تسوية :
                                </button>
                                <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <ul class="nav nav-hover flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="{{ route('court.court_order', ['id' => $court->id]) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-shield-slash" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M1.093 3.093c-.465 4.275.885 7.46 2.513 9.589a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.32 11.32 0 0 0 1.733-1.525l-.745-.745a10.27 10.27 0 0 1-1.578 1.392c-.346.244-.652.42-.893.533-.12.057-.218.095-.293.118a.55.55 0 0 1-.101.025.615.615 0 0 1-.1-.025 2.348 2.348 0 0 1-.294-.118 6.141 6.141 0 0 1-.893-.533 10.725 10.725 0 0 1-2.287-2.233C3.053 10.228 1.879 7.594 2.06 4.06l-.967-.967zM3.98 1.98l-.852-.852A58.935 58.935 0 0 1 5.072.559C6.157.266 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.483 3.626-.332 6.491-1.551 8.616l-.77-.77c1.042-1.915 1.72-4.469 1.29-7.702a.48.48 0 0 0-.33-.39c-.65-.213-1.75-.56-2.836-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524a49.7 49.7 0 0 0-1.357.39zm9.666 12.374-13-13 .708-.708 13 13-.707.707z" />
                                                </svg>
                                                <span class="nav-text">قبل أمر الحجز</span>
                                            </a>
                                            <ul class="nav nav-hoverable flex-column">
                                                @if ($court->action_type == 'طلب تنفيذي')

                                                <li class="nav-item"><a class="nav-link"
                                                        href="{{ route('court.B_all_amount', ['id' => $court->id]) }}"><span
                                                            class="nav-text">دفع كامل</span></a></li>
                                                @endif
                                                      
                                                @if ($court->action_type == 'تسوية - تقسيط'||
                                                $court->action_type =='طلب تنفيذي')

                                                <li class="nav-item"><a class="nav-link"
                                                        href="{{ route('court.B_part_amount', ['id' => $court->id]) }}"><span
                                                            class="nav-text">تقسيط</span></a></li>
                                                @endif
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endif

                            {{-- منع --}}
                            @if ($court->action_type == 'طلب تنفيذي')
                            <div class="mr-5 ml-5 btn-group">
                                <button type="button" class="btn btn-danger font-weight-bolder">
                                    منع :
                                </button>
                                <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <ul class="nav nav-hover flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="{{ route('court.court_order', ['id' => $court->id]) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-sign-stop" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.16 10.08c-.931 0-1.447-.493-1.494-1.132h.653c.065.346.396.583.891.583.524 0 .83-.246.83-.62 0-.303-.203-.467-.637-.572l-.656-.164c-.61-.147-.978-.51-.978-1.078 0-.706.597-1.184 1.444-1.184.853 0 1.386.475 1.436 1.087h-.645c-.064-.32-.352-.542-.797-.542-.472 0-.77.246-.77.6 0 .261.196.437.553.522l.654.161c.673.164 1.06.487 1.06 1.11 0 .736-.574 1.228-1.544 1.228Zm9.427 2.817-13-13 .708-.708 13 13-.707.707z" />
                                                </svg>
                                                <span class="nav-text">أمر الحجز</span>
                                            </a>
                                            <ul class="nav nav-hoverable flex-column">
                                                <li class="nav-item"><a class="nav-link"
                                                        href="{{ route('court.salary_reservation', ['id' => $court->id]) }}"><span
                                                            class="nav-text">حجز راتب</span></a></li>
                                                <li class="nav-item"><a class="nav-link"
                                                        href="{{ route('court.travel_ban', ['id' => $court->id]) }}"><span
                                                            class="nav-text">حجز سفر</span></a></li>
                                                <li class="nav-item"><a class="nav-link"
                                                        href="{{ route('court.detention_order', ['id' => $court->id]) }}"><span
                                                            class="nav-text">أمر حبس</span></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endif

                            {{-- فك المنع --}}
                            @if (
                            $court->action_type == 'منع - منع سفر' ||
                            $court->action_type == 'منع - حجر راتب' ||
                            $court->action_type == 'فك حجز راتب - تقسيط' ||
                            $court->action_type == 'منع - امر حبس')
                            <div class="mr-5 ml-5 btn-group">
                                <button type="button" class="btn btn-warning font-weight-bolder">
                                    فك المنع :
                                </button>
                                <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <ul class="nav nav-hover flex-column">
                                        @if ($court->action_type == 'منع - حجر راتب'|| $court->action_type == 'فك حجز راتب - تقسيط')
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="{{ route('court.court_order', ['id' => $court->id]) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-unlock" viewBox="0 0 16 16">
                                                    <path
                                                        d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2zM3 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1H3z" />
                                                </svg>
                                                <span class="nav-text">فك حجز راتب</span>
                                            </a>
                                            <ul class="nav nav-hoverable flex-column">
                                        @if (! $court->action_type == 'فك حجز راتب - تقسيط')

                                                <li class="nav-item"><a class="nav-link"
                                                        href="{{ route('court.A_part_amount', ['id' => $court->id]) }}"><span
                                                            class="nav-text">تقسيط</span></a></li>
                                                            @endif
                                                <li class="nav-item"><a class="nav-link"
                                                        href="{{ route('court.A_all_amount', ['id' => $court->id]) }}"><span
                                                            class="nav-text">دفع كامل</span></a></li>
                                            </ul>
                                        </li>
                                        @endif

                                        @if ($court->action_type == 'منع - منع سفر')
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="{{ route('court.court_order', ['id' => $court->id]) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-unlock" viewBox="0 0 16 16">
                                                    <path
                                                        d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2zM3 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1H3z" />
                                                </svg>
                                                <span class="nav-text">فك منع سفر</span>
                                            </a>
                                            <ul class="nav nav-hoverable flex-column">
                                                <li class="nav-item"><a class="nav-link"
                                                        href="{{ route('court.A_part_amount_travel', ['id' => $court->id]) }}"><span
                                                            class="nav-text">تقسيط</span></a></li>
                                                <li class="nav-item"><a class="nav-link"
                                                        href="{{ route('court.A_all_amount_travel', ['id' => $court->id]) }}"><span
                                                            class="nav-text">دفع كامل</span></a></li>
                                            </ul>
                                        </li>
                                        @endif

                                        @if ($court->action_type == 'منع - امر حبس')
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="{{ route('court.end_detention', ['id' => $court->id]) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-unlock" viewBox="0 0 16 16">
                                                    <path
                                                        d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2zM3 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1H3z" />
                                                </svg>
                                                <span class="nav-text">انهاء أمر الحبس</span>
                                            </a>
                                        </li>
                                        @endif

                                    </ul>
                                </div>
                            </div>
                            @endif

                            {{-- فارغ --}}
                            <div class="mr-9 ml-9 btn-group">
                            </div>
                            {{--
                            <div class="mr-9 ml-9 btn-group">
                            </div> --}}

                            <!--end::Dropdown-->


                        </div>
                    </div>

                    <div class="card-body">
                        <div class="container" id="container">

                            <div class="card_print" dir="rtl">

                                <div class="mb-7 req_status_">
                                    <div class="row align-items-center my-4">
                                        <div class="col-md-3 my-md-1">
                                            <h5>
                                                السنة :
                                                <small class="text-muted">{{ date_format($court->created_at, 'Y')
                                                    }}</small>
                                            </h5>
                                        </div>
                                        <div class="col-md-3 my-md-1">
                                            <h5>
                                                رقـم الإخطار :
                                                <small class="text-muted">{{ $court->id }}</small>
                                            </h5>
                                        </div>
                                        <div class="col-md-3 my-md-1">
                                            <h5>
                                                رقـم الاشتراك :
                                                <small class="text-muted">{{ $court->jibaya_id ? $court->jibaya_id : '
                                                    --' }}</small>
                                            </h5>
                                        </div>

                                        @foreach ($court['summoners'] as $summoner)
                                        <div class="col-md-3 my-md-1 ">
                                            <h5>
                                                اســــــم المدعي :
                                                <small class="text-muted">
                                                    {{ $summoner->summoner }}

                                                </small>
                                            </h5>
                                        </div>
                                        <div class="col-md-3 my-md-1 ">
                                            <h5>
                                                رقم الهويـــة :
                                                <small class="text-muted">{{ $summoner->idno_summoner }}</small>
                                            </h5>
                                        </div>
                                        @endforeach

                                        <div class="col-md-3 my-md-1 ">
                                            <h5>
                                                المبلغ :
                                                <small class="text-muted">{{ $court->amount ? $court->amount : ' --'
                                                    }}</small>
                                            </h5>
                                        </div>

                                        @foreach ($court['defendants'] as $defendant)
                                        <div class="col-md-3 my-md-1 ">
                                            <h5>
                                                اســــــم المدعي عليه:
                                                <small class="text-muted">
                                                    {{ $defendant->defendant }}

                                                </small>
                                            </h5>
                                        </div>
                                        <div class="col-md-3 my-md-1 ">
                                            <h5>
                                                رقم الهويـــة :
                                                <small class="text-muted">{{ $defendant->idno_defendant }}</small>
                                            </h5>
                                        </div>
                                        @endforeach

                                        <div class="col-md-3 my-md-1 ">
                                            <h5>
                                                العـــنــــــــــــــــوان :
                                                <small class="text-muted">{{ $court->address ? $court->address : ' --'
                                                    }}</small>
                                            </h5>
                                        </div>

                                        <div class="col-md-3 my-md-1 ">
                                            <h5>
                                                الإجراء المنفـــــــــــــــــــــذ :
                                                <small class="text-muted">{{ $court->action_type ? $court->action_type :
                                                    ' --' }}</small>
                                            </h5>
                                        </div>

                                        <div class="col-md-3 my-md-1 ">
                                            <h5>
                                                رقم القضيـــــــــــــــــــــــــة :
                                                <small class="text-muted">{{ $court->case_num ? $court->case_num : ' --'
                                                    }}</small>
                                            </h5>
                                        </div>
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
                                            <h2 style="margin-bottom: 10px;"><u> لدى دائرة التنفيذ بمحكمة بداية شمال
                                                    غزة
                                                </u></h2>
                                            <h2 style="margin-top: 0!important;"> <u>في القضية التنفيذية رقم
                                                    ............ / 2023</u> </h2>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <!--end::Invoice header-->




                            <div style="display: flex">
                                <div style="margin-left: auto;">
                                    <h5>طالب التنفيذ : بلدية جباليا النزلة -
                                        يمثلهاالسيد/ أ.{{ $summoner->summoner }} رئيس البلدية
                                    </h5>
                                    <div style="margin-right: 45%">
                                        بممثلها القاانوني / خطاب شهاب
                                    </div>
                                </div>
                                <div>
                                    <h5> <input value="{{ $summoner->idno_summoner }}"
                                            style="text-align:center;padding:7px;border:1px solid black"></h5>
                                </div>
                            </div>

                            <h5 style="font-weight:inherit ;font-size:1.2rem ">عنوان طالب التنفيذ / جباليا البلد مقابل
                                عيادة شهداء جباليا</h5>


                            <div class="flex-container">
                                <div style="margin-left: 4%;">
                                    <h5> اسم المنفذ ضده/
                                        {{ $defendant->defendant }}</h5>
                                </div>
                                <div style="margin-right: 36%; margin-top: 10px;">
                                    <h5> <input value="{{ $defendant->idno_defendant }}"
                                            style="text-align:center;padding:10px;border:1px solid black">
                                    </h5>
                                </div>
                            </div>


                            <div style="display: flex">
                                <div class="mb-10 font-size-lg font-weight-bold">عنوان المنفذ ضده /
                                    {{ $court->address }}
                                </div>
                            </div>


                            <div style="display: flex">
                                <div style="margin-left: auto; margin-top:13px; ">
                                    <div class="checkbox-inline">
                                        <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                            <input type="checkbox" name="Checkboxes15_1" />
                                            <span></span>
                                            حكم نظامي </label>
                                        <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                            <input type="checkbox" name="Checkboxes15_1" />
                                            <span></span>
                                            حكم شرعي
                                        </label>
                                        <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                            <input type="checkbox" name="Checkboxes15_1" />
                                            <span></span>
                                            سند دين منظم
                                        </label>
                                        <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                            <input type="checkbox" name="Checkboxes15_1" />
                                            <span></span>
                                            كمبيالة </label>
                                        <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                            <input type="checkbox" name="Checkboxes15_1" />
                                            <span></span>
                                            شيك
                                        </label>
                                        <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                            <input type="checkbox" name="Checkboxes15_1" />
                                            <span></span>
                                            سند رسمي
                                        </label>
                                        <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                            <input type="checkbox" name="Checkboxes15_1" />
                                            <span></span>
                                            سند عرفي
                                        </label>
                                    </div>
                                </div>

                            </div>



                            <div style="display: flex ; padding-top:12px">
                                <div style="margin-left: 4%">
                                    <h5>رقم السند التنفيذي</h5>
                                </div>

                                <div class="checkbox-inline" style="margin-right: 5%;padding-top:12px">
                                    <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                        <input type="checkbox" name="Checkboxes15_1" />
                                        <span></span>
                                        رقم الشيك
                                    </label>
                                    <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                        <input type="checkbox" name="Checkboxes15_1" />
                                        <span></span>
                                        رقم سند الدين
                                    </label>
                                    <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                        <input type="checkbox" name="Checkboxes15_1" />
                                        <span></span>
                                        رقم الدعوى
                                    </label>
                                </div>
                            </div>



                            <style>
                                .flex-container {
                                    display: flex;
                                    align-items: center;
                                    margin-bottom: 10px;
                                }

                                h5 {
                                    margin-right: 5px;
                                    white-space: nowrap;
                                    font-size: 1.2rem;
                                }

                                input {
                                    text-align: center;
                                    padding: 5px;
                                    border: 1px solid black;
                                }
                            </style>

                            <div class="flex-container">
                                <div style="margin-left: 18px;">
                                    <h5>عدد السندات التنفيذية</h5>
                                </div>
                                <div style="margin-right: 53px; margin-top: 10px">
                                    <input type="number" />
                                </div>
                            </div>

                            <div class="flex-container">
                                <div style="margin-left: 7%;">
                                    <h5>قيمة السند التنفيذي</h5>
                                </div>
                                <div style="margin-right: 5%; margin-top: 10px">
                                    <input type="number" />
                                </div>
                            </div>

                            <div class="flex-container">
                                <div style="margin-left: 4%;">
                                    <h5>قيمة المبلغ محل التنفيذ</h5>
                                </div>
                                <div style="margin-right: 5%; margin-top: 10px">
                                    <input type="number" />
                                </div>
                            </div>

                            <div class="flex-container">
                                <div style="margin-left: 13px;">
                                    <h5>قيمة الرسوم والمصاريف</h5>
                                </div>
                                <div style="margin-right: 39px; margin-top: 10px">
                                    <input type="number" />
                                </div>
                            </div>


                            <div style="padding-right: 150px; padding-bottom: 15px;padding-top: 15px;">
                                {{ '(معزوه مشروحات رئيس قلم المحكمة المختصة)' }}</div>


                            <div style="display: flex ">
                                <div style="margin-left: 13px;">
                                    <h5>قيمة المبلغ الإجمالي المطلوب تنفيذه</h5>
                                </div>
                                <div style="margin-right:39px; margin-top:10px">
                                    <input type="number" style="text-align:center;padding:5px;border:1px solid black" />

                                </div>
                            </div>


                            <div style="display: flex ">

                                <div class="mb-5 font-size-lg font-weight-bold ">
                                    <h4> قيمة الرسوم والمصاريف
                                        التنفيذية.................................. المجموع
                                        ........................................<br /></h4>
                                    <h4> تقديم طلب التنفيذ المذكور أعلاه / وكيله بالسند التنفيذي والمرفق بهذا الطلب
                                        لتنفيذه لدى الدائرة
                                        طبقا لأحكام قانون التنفيذ الفلسطيني رقم 23 لسنة 2005 <br>
                                        تاريخ تقديم الطلب :{{ date_format($court->created_at, 'd/m/Y') }} <br></h4>

                                </div>
                            </div>


                            <div style="display: flex ">
                                <div class="mb-5 font-size-lg font-weight-bold d-flex justify-content-around">
                                    <h5> ممثلها القانوني / <br>
                                        قيمة رسم التنفيذ</h5>

                                </div>
                            </div>


                            <div style="display: flex ">

                                <style>
                                    .bottom-left {
                                        position: fixed;
                                        bottom: 2%;
                                        left: 0;
                                        text-align: left;
                                    }
                                </style>

                                <div class="bottom-left" style="text-align: center; float:left">
                                    <h4> قرار <br>
                                    </h4>
                                    <h4> لا مانع من فتح قضية تنفيذية وتحصيل الرسوم <br>
                                        من أول دفعة تسديد للمحكوم لها <br>
                                        قاضي التنفيذ
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
{{-- <script type="text/javascript">
    function printDiv() {
        var printContents = document.getElementById('print').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }
</script> --}}


<script src="{{ asset('assets/js/fancybox.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/features/miscellaneous/sweetalert2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/iziModal.min.js') }}"></script>


<script type='text/javascript'>
    $(function() {
            $(".print").on('click', function() {
                var w = window.open('Print');
                w.document.write($('.courts_print').html());
                w.document.write(
                    '<style>#courts_print_{display: block!important;}h5{margin: 10px;}/*@page { size: A5;margin: 0; }body {height: 210mm; width: 148.5mm; margin: 0;}*/</style>'
                );
                w.print();
                w.close();
                w.focus();

            });
        });
</script>
@endsection