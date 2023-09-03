@extends('layout.master')

@section('title')
بيانات الموظف
@endsection

@section('page_title')
لوحة التحكم
@endsection
@section('sub_main')
شؤوون الموظفيين
@endsection
@section('sub_title')
بيانات الموظف
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
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class=" container ">
        <div class="card-toolbar pb-5">
            <!--begin::Button-->
            <a href="{{ url('/employee') }}" class="btn btn-primary font-weight-bolder">
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <circle fill="#000000" cx="9" cy="15" r="6" />
                            <path
                                d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>عرض قائمة الموظفين</a>
            <!--end::Button-->
        </div>
        <!--begin::Row-->
        <div class="row">
            {{-- الملف الشخصي --}}
            <div class="col-xl-6">
                <!--begin::List Widget 19-->
                <div class="card card-custom  card-stretch gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-6 mb-2">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label font-weight-bold font-size-h4 text-dark-75 mb-3">الملف الشخصي</span>
                        </h3>
                        <div class="card-toolbar">
                            <a href="#" class="btn btn-light-info btn-sm font-weight-bolder font-size-sm py-3 px-6">
                                Upload
                            </a>
                        </div>
                    </div>
                    <!--end::Header-->

                    <!--begin::Body-->
                    <div class="card-body pt-2">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <!--begin::Item-->
                                    <tr>
                                        <th>الاسم</th>
                                        <th>الرقم الوظيفي</th>
                                        <th>الجنس</th>
                                    </tr>

                                    <tr>
                                        <td>{{ isset($employee->employee_name) ? $employee->employee_name : '--' }}</td>
                                        <td>{{ isset($employee->employee_num) ? $employee->employee_num : '--' }}</td>
                                        <td>{{ isset($employee->employee_gender) ? $employee->employee_gender : '--' }}
                                        </td>
                                    </tr>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <tr>
                                        <th>رقم الهوية</th>
                                        <th>عنوان الموظف</th>
                                        <th>الحالة الاجتماعية</th>
                                    </tr>

                                    <tr>
                                        <td>{{ isset($employee->id_employee) ? $employee->id_employee : '--' }}</td>
                                        <td>{{ isset($employee->employee_address) ? $employee->employee_address : '--'
                                            }}
                                        </td>
                                        <td>{{ isset($employee->employee_status) ? $employee->employee_status : '--' }}
                                        </td>
                                    </tr>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <tr>
                                        <th>رقم الهاتف</th>
                                        <th>مكان الميلاد</th>
                                        <th>تاريخ الميلاد</th>
                                    </tr>

                                    <tr>
                                        <td>{{ isset($employee->employee_mobile) ? $employee->employee_mobile : '--' }}
                                        </td>
                                        <td>{{ isset($employee->employee_birthplace) ? $employee->employee_birthplace :
                                            '--' }}
                                        </td>
                                        <td>{{ isset($employee->employee_birthdate) ? date('Y-m-d',
                                            strtotime($employee->employee_birthdate)) : '--' }}
                                        </td>
                                    </tr>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <tr>
                                        <th>رصيد الإجازة المتبقي</th>

                                    </tr>

                                    <tr>
                                        <td>{{ isset($employee->vacation_days) ? $employee->vacation_days : '--' }}
                                        </td>

                                    </tr>
                                    <!--end::Item-->



                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::List Widget 19-->
            </div>

            {{-- بيانات التوظيف --}}
            <div class="col-xl-6">
                <!--begin::List Widget 19-->
                <div class="card card-custom  card-stretch gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-6 mb-2">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label font-weight-bold font-size-h4 text-dark-75 mb-3">بيانات
                                التوظيف</span>
                        </h3>
                        <div class="card-toolbar">
                            <a href="#" class="btn btn-light-info btn-sm font-weight-bolder font-size-sm py-3 px-6">
                                Upload
                            </a>
                        </div>
                    </div>
                    <!--end::Header-->

                    <!--begin::Body-->
                    <div class="card-body pt-2">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <!--begin::Item-->
                                    <tr>
                                        <th>نوع التعيين</th>
                                        <th>المسمى المعتمد</th>
                                        <th>تاريخ بدأ العمل</th>
                                        <th>ملف بدأ العمل</th>
                                    </tr>

                                    <tr>
                                        <td>{{ isset($maindataemp->appointment_type) ? $maindataemp->appointment_type :
                                            '--' }}
                                        </td>
                                        <td>{{ isset($maindataemp->named_ministry) ? $maindataemp->named_ministry : '--'
                                            }}
                                        </td>
                                        {{-- <td>{{date('Y-m-d', strtotime($maindataemp->Work_start_date))}}</td> --}}
                                        <td>{{ isset($maindataemp->Work_start_date) ? date('Y-m-d',
                                            strtotime($maindataemp->Work_start_date)) : '--' }}
                                        </td>

                                        {{-- <td><a
                                                href="{{ asset('Work_start_files/' . $maindataemp->Work_start_file) }}"
                                                target="_blank">ملف بدأ العمل</a></td> --}}


                                        <td>
                                            @if (isset($maindataemp->Work_start_file))
                                            <a href="{{ asset('Work_start_files/' . $maindataemp->Work_start_file) }}"
                                                target="_blank">ملف بدأ العمل</a>
                                            @else
                                            --
                                            @endif
                                        </td>

                                    </tr>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <tr>
                                        <th>تاريخ تعيين الوزارة</th>
                                        <th>مرفق تعيين الوزارة</th>
                                        <th>تاريخ تثبيت الوزارة</th>
                                        <th>مرفق تثبيت الوزارة</th>
                                    </tr>

                                    <tr>
                                        <td>{{ isset($maindataemp->ministry_date_appointment)
                                            ? date('Y-m-d', strtotime($maindataemp->ministry_date_appointment))
                                            : '--' }}
                                        </td>

                                        <td>
                                            @if (isset($maindataemp->ministry_file_appointment))
                                            <a href="{{ asset('ministry_file_appointment/' . $maindataemp->ministry_file_appointment) }}"
                                                target="_blank">مرفق تعيين الوزارة</a>
                                            @else
                                            --
                                            @endif
                                        </td>

                                        <td> {{ date('Y-m-d', strtotime($maindataemp->ministry_installation_date)) }}
                                        </td>
                                        <td> <a href="{{ asset('ministry_installation_file/' . $maindataemp->ministry_installation_file) }}"
                                                target="_blank">مرفق تثبيت الوزارة</a> </td>
                                    </tr>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <tr>
                                        <th>الدائرة </th>
                                        <th>القسم</th>
                                        <th>الشعبة</th>
                                        <th>تكليف البلدية</th>

                                    </tr>

                                    <tr>
                                        <td> {{ $maindataemp->circle }}</td>
                                        <td>{{ $maindataemp->section }} </td>
                                        <td>{{ $maindataemp->division }} </td>
                                        <td>{{ $maindataemp->named }} </td>
                                    </tr>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <tr>
                                        <th>الراتب</th>
                                        <th>حالة الراتب</th>
                                        <th>أيام الإجازة</th>
                                    </tr>

                                    <tr>
                                        <td>{{ $maindataemp->salary }} </td>
                                        <td>{{ $maindataemp->salary_status }} </td>
                                        <td>{{ $maindataemp->vacation_days }} </td>
                                    </tr>
                                    <!--end::Item-->



                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::List Widget 19-->
            </div>
        </div>
        <!--end::Row-->
        @if ($employee->employee_status !== 'أعزب/عزباء')
        <!--begin::Row-->
        <div class="row">
            {{-- بيانات الأبناء --}}
            <div class="col-xl-6">
                <!--begin::List Widget 19-->
                <div class="card card-custom  card-stretch gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-6 mb-2">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label font-weight-bold font-size-h4 text-dark-75 mb-3">بيانات
                                الأبناء</span>
                        </h3>
                        <div class="card-toolbar">
                            <a href="#" class="btn btn-light-info btn-sm font-weight-bolder font-size-sm py-3 px-6">
                                Upload
                            </a>
                        </div>
                    </div>
                    <!--end::Header-->

                    <!--begin::Body-->
                    <div class="card-body pt-2">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <!--begin::Item-->
                                    <tr>
                                        <th>هوية الابن</th>
                                        <th>الاسم</th>
                                        <th>الحالة الاجتماعية</th>
                                        <th>الجنس</th>
                                    </tr>

                                    @if ($sons->count() > 0)
                                    @foreach ($sons as $son)
                                    <tr>
                                        <td>{{ $son->id_son }}</td>
                                        <td>{{ $son->son_name }}</td>
                                        <td>{{ $son->son_satuts }}</td>
                                        <td>{{ $son->son_gender }}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="4">--</td>
                                    </tr>
                                    @endif
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <tr>
                                        <th>تاريخ الميلاد</th>
                                        <th>هل يعمل الابن</th>
                                        <th>جامعي </th>
                                        <th>شهادة الميلاد</th>
                                    </tr>

                                    @if ($sons->count() > 0)
                                    @foreach ($sons as $son)
                                    <tr>
                                        <td>{{ date('Y-m-d', strtotime($son->son_birth)) }}</td>
                                        <td>{{ $son->son_job }}</td>
                                        <td>{{ $son->son_unv }}</td>
                                        <td>
                                            @if (isset($son->son_file))
                                            <a href="{{ asset('sonfile/' . $son->son_file) }}" target="_blank">شهادة
                                                الميلاد</a>
                                            @else
                                            --
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="4">--</td>
                                    </tr>
                                    @endif
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <tr>
                                        <th>الجامعة </th>
                                        <th>التخصص </th>
                                        <th>بداية الدراسة</th>
                                        <th>شهادة القيد</th>
                                    </tr>

                                    @if ($sons->count() > 0)
                                    @foreach ($sons as $son)
                                    <tr>
                                        <td>{{ $son->son_unv_name }}</td>
                                        <td>{{ $son->son_major }}</td>
                                        <td>{{ date('Y-m-d', strtotime($son->son_study_start)) }}</td>
                                        <td>
                                            @if (isset($son->son_unv_file))
                                            <a href="{{ asset('sonunvfile/' . $son->son_unv_file) }}"
                                                target="_blank">شهادة القيد</a>
                                            @else
                                            --
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="4">--</td>
                                    </tr>
                                    @endif
                                    <!--end::Item-->


                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::List Widget 19-->
            </div>

            {{-- بيانات الزوج/ة --}}
            <div class="col-xl-6">
                <!--begin::List Widget 19-->
                <div class="card card-custom  card-stretch gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-6 mb-2">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label font-weight-bold font-size-h4 text-dark-75 mb-3">بيانات
                                الزوج/ة</span>
                        </h3>
                        <div class="card-toolbar">
                            <a href="#" class="btn btn-light-info btn-sm font-weight-bolder font-size-sm py-3 px-6">
                                Upload
                            </a>
                        </div>
                    </div>
                    <!--end::Header-->

                    <!--begin::Body-->
                    <div class="card-body pt-2">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>

                                    <!--begin::Item-->
                                    <tr>
                                        <th>هوية الزوجة</th>
                                        <th>الاسم</th>
                                        <th>تاريخ الميلاد</th>

                                    </tr>

                                    @foreach ($wives as $wife)
                                    <tr>
                                        <td>{{ $wife->id_wife }}</td>
                                        <td>{{ $wife->wife_name }}</td>
                                        <td>{{ date('Y-m-d', strtotime($wife->wife_birth)) }}</td>

                                    </tr>
                                    @endforeach
                                    <!--end::Item-->


                                    <!--begin::Item-->
                                    <tr>
                                        <th>هل يعمل الزوج/ة</th>

                                        <th>تاريخ الزواج</th>
                                        <th>عقد الزواج </th>
                                    </tr>

                                    @foreach ($wives as $wife)
                                    <tr>
                                        <td>{{ $wife->wife_job }}</td>

                                        <td>{{ date('Y-m-d', strtotime($wife->date_marriage)) }}</td>
                                        <td>
                                            @if (isset($wife->wife_file))
                                            <a href="{{ asset('wifefile/' . $wife->wife_file) }}" target="_blank">عقد
                                                الزواج</a>
                                            @else
                                            --
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    <!--end::Item-->

                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::List Widget 19-->
            </div>

        </div>
        <!--end::Row-->
        @endif

        <!--begin::Row-->
        <div class="row">
            {{-- بيانات المعالين --}}
            <div class="col-xl-6">
                <!--begin::List Widget 19-->
                <div class="card card-custom  card-stretch gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-6 mb-2">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label font-weight-bold font-size-h4 text-dark-75 mb-3">بيانات
                                المعالين</span>
                        </h3>
                        <div class="card-toolbar">
                            <a href="#" class="btn btn-light-info btn-sm font-weight-bolder font-size-sm py-3 px-6">
                                Upload
                            </a>
                        </div>
                    </div>
                    <!--end::Header-->

                    <!--begin::Body-->
                    <div class="card-body pt-2">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>

                                    <!--begin::Item-->
                                    <tr>
                                        <th>اسم المعال</th>
                                        <th>هوية المعال</th>
                                        <th>تاريخ الميلاد</th>
                                    </tr>

                                    <tr>
                                        <td>{{ isset($dependent->dependent_name) ? $dependent->dependent_name : '--' }}
                                        </td>
                                        <td>{{ isset($dependent->id_dependent) ? $dependent->id_dependent : '--' }}
                                        </td>

                                        <td>{{ isset($dependent->dependent_birth) ? date('Y-m-d',
                                            strtotime($dependent->dependent_birth)) : '--' }}
                                        </td>



                                    </tr>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <tr>
                                        <th>صلة القرابة</th>
                                        <th>الجنس </th>
                                        <th>مرفق </th>
                                    </tr>

                                    <tr>
                                        <td>{{ isset($dependent->relative_relation) ? $dependent->relative_relation :
                                            '--' }}
                                        </td>
                                        <td>{{ isset($dependent->dependent_gender) ? $dependent->dependent_gender : '--'
                                            }}
                                        </td>
                                        <td>
                                            @if (isset($dependent->dependent_file))
                                            <a href="{{ asset('dependent_file/' . $dependent->dependent_file) }}"
                                                target="_blank">مرفق</a>
                                            @else
                                            --
                                            @endif
                                        </td>
                                    </tr>
                                    <!--end::Item-->

                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::List Widget 19-->
            </div>

            {{-- المؤهلات العلمية والدورات التدريبية --}}
            <div class="col-xl-6">
                <!--begin::List Widget 19-->
                <div class="card card-custom  card-stretch gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-6 mb-2">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label font-weight-bold font-size-h4 text-dark-75 mb-3">المؤهلات العلمية
                                والدورات التدريبية</span>
                        </h3>
                        <div class="card-toolbar">
                            <a href="#" class="btn btn-light-info btn-sm font-weight-bolder font-size-sm py-3 px-6">
                                Upload
                            </a>
                        </div>
                    </div>
                    <!--end::Header-->

                    <!--begin::Body-->
                    <div class="card-body pt-2">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>

                                    <!--begin::Item-->
                                    <tr>
                                        <th>مرفق المؤهلات العلمية</th>
                                        <th>الدورات التدريبية</th>
                                        <th>المؤسسة التعليمية</th>
                                    </tr>

                                    <tr>
                                        <td>
                                            @if (isset($educational->edu_file))
                                            <a href="{{ asset('edufile/' . $educational->edu_file) }}"
                                                target="_blank">المؤهلات العلمية</a>
                                            @else
                                            --
                                            @endif
                                        </td>
                                        <td>
                                            @if (isset($educational->training_file))
                                            <a href="{{ asset('trainingfile/' . $educational->training_file) }}"
                                                target="_blank">الدورات التدريبية</a>
                                            @else
                                            --
                                            @endif
                                        </td>
                                        <td>{{ isset($educational->educational_org) ? $educational->educational_org :
                                            '--' }}
                                        </td>
                                        {{-- <td>{{$educationals->educational_org}}</td> --}}

                                    </tr>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <tr>
                                        <th>الدرجة العلمية </th>
                                        <th>التخصص</th>
                                        <th>مكان الدراسة</th>
                                    </tr>

                                    <tr>
                                        <td>{{ isset($educational->degree) ? $educational->degree : '--' }}
                                        </td>
                                        <td>{{ isset($educational->majors) ? $educational->majors : '--' }}
                                        </td>
                                        <td>{{ isset($educational->address_org) ? $educational->address_org : '--' }}
                                        </td>

                                    </tr>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <tr>
                                        <th>سنة التخرج </th>
                                        <th>المعدل </th>
                                        <th>التقدير</th>

                                    </tr>

                                    <tr>
                                        <td>{{ isset($educational->graduation) ? $educational->graduation : '--' }}
                                        </td>
                                        <td>{{ isset($educational->rate) ? $educational->rate : '--' }}
                                        </td>
                                        <td>{{ isset($educational->rate_num) ? $educational->rate_num : '--' }}
                                        </td>
                                    </tr>
                                    <!--end::Item-->

                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::List Widget 19-->
            </div>

        </div>
        <!--end::Row-->



    </div>
    <!--end::Container-->
</div>
<!--end::Content-->
@endsection

@section('scripts')
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