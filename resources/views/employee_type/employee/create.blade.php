@extends('layout.master')

@section('title')
اضافة بيانات الموظف
@endsection

@section('page_title')
لوحة التحكم
@endsection

@section('sub_main')
بيانات الموظف
@endsection

@section('sub_title')
اضافة بيانات الموظف
@endsection

@section('css')

<style>
    .form-control {
        border: 1px solid rgb(0, 162, 255);
        justify-content: space-evenly
    }
</style>
<!--begin::Page Custom Styles(used by this page)-->
<link href="{{asset('assets/css/pages/wizard/wizard-1.css')}}" rel="stylesheet" type="text/css" />
<!--end::Page Custom Styles-->
@endsection

@section('content')

<!--begin::Container-->
<div class="container">
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
            </span>عرض قائمة الموظفين
        </a>
        <!--end::Button-->
    </div>
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-body p-0">
            <!--begin::Wizard-->
            <div class="wizard wizard-1" id="kt_wizard" data-wizard-state="first" data-wizard-clickable="false">
                <!--begin::Wizard Nav-->
                <div class="wizard-nav border-bottom">
                    <div class="wizard-steps p-8 p-lg-10">
                        <!--begin::Wizard Step 1 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                            <div class="wizard-label">
                                <i class="wizard-icon flaticon2-user"></i>
                                <h3 class="wizard-title">الملف الشخصي</h3>
                            </div>

                        </div>
                        <!--end::Wizard Step 1 Nav-->

                        <!--begin::Wizard Step 2 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                            <div class="wizard-label">
                                <i class="wizard-icon flaticon-list"></i>
                                <h3 class="wizard-title">بيانات الموظف الأساسية</h3>
                            </div>

                        </div>
                        <!--end::Wizard Step 2 Nav-->

                        <!--begin::Wizard Step 3 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                            <div class="wizard-label">
                                <i class="wizard-icon flaticon2-check-mark"></i>
                                <h3 class="wizard-title">تأكيد المعلومات</h3>
                            </div>

                        </div>
                        <!--end::Wizard Step 3 Nav-->

                    </div>
                </div>
                <!--end::Wizard Nav-->

                <!--begin::Card-->
                <div class="card card-custom card-shadowless rounded-top-0">
                    <!--begin::Body-->
                    <div class="card-body p-0">
                        <div class="row justify-content-center px-8 py-8 ">
                            <div class="col-xl-12 col-xxl-12">
                                <!--begin::Wizard ***************************************************Form***********************************************************************-->
                                <form action="{{route('employee.store')}}" method="post" class="needs-validation"
                                    enctype="multipart/form-data" id="kt_form">
                                    @csrf
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12">
                                            <!--begin::Wizard Step 1-->
                                            <div class="" data-wizard-type="step-content" data-wizard-state="current">
                                                <h5 class="text-dark font-weight-bold mb-10">بيانات المستخدم
                                                    الأساسية:</h5>

                                                <!--begin::Group-->
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">رقم الهوية
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-user"></i></span></div>
                                                                    <input type="number"
                                                                        class="form-control form-control-lg"
                                                                        name="id_employee" id="id_employee"
                                                                        placeholder="رقم الهوية" />
                                                                    {{-- <div class="invalid-feedback">Shucks, check the
                                                                        formatting
                                                                        of
                                                                        that and try again.</div> --}}
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.2rem">الرقم الوظيفي
                                                                <span class="text-danger">*</span></label>

                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-users"></i></span></div>
                                                                    <input type="number"
                                                                        class="form-control form-control-lg "
                                                                        placeholder="الرقم الوظيفي" name="employee_num"
                                                                        id="employee_num" />

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Group-->

                                                <!--begin::Group-->
                                                <div class="form-group row ">
                                                    <label class="col-form-label col-lg-2"
                                                        style="font-size: 1.3rem">الاسم بالكامل <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-lg-10">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text"><i
                                                                        class="la la-laugh"></i></span></div>
                                                            <input type="text" class="form-control form-control-lg "
                                                                placeholder="الاسم بالكامل" name="employee_name"
                                                                id="employee_name" />

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Group-->

                                                <!--begin::Group-->
                                                <div class="form-group row ">
                                                    <label class="col-form-label col-lg-2"
                                                        style="font-size: 1.3rem">البريد الالكتروني <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-lg-10">
                                                        <div class="input-group ">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text"><i
                                                                        class="la la-at"></i></span>
                                                            </div>
                                                            <input type="email" class="form-control form-control-lg "
                                                                placeholder="البريد الالكتروني" name="employee_email"
                                                                id="employee_email" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Group-->

                                                <!--begin::Group-->
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-4 col-form-label"
                                                                style="font-size: 1.3rem">الجنس
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-8 col-form-label">
                                                                <div class="radio-inline">
                                                                    <label class="radio radio-primary pr-5 pl-5"
                                                                        style="font-size: 1.3rem">
                                                                        <input type="radio" name="employee_gender"
                                                                            value="ذكر" id="employee_gender" />
                                                                        <span></span>
                                                                        ذكر
                                                                    </label>
                                                                    <label class="radio radio-primary"
                                                                        style="font-size: 1.3rem">
                                                                        <input type="radio" name="employee_gender"
                                                                            value="أنثى" id="employee_gender" />
                                                                        <span></span>
                                                                        أنثى
                                                                    </label>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">الحالة الاجتماعية <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-calendar"></i></span>
                                                                    </div>
                                                                    <select class="form-control form-control-lg"
                                                                        name="employee_status">

                                                                        <option value="">اختر</option>
                                                                        <option value="أعزب/عزباء">أعزب/عزباء </option>
                                                                        <option value="متزوج/ة">متزوج/ة </option>
                                                                        <option value="مطلق/ة">مطلق/ة</option>
                                                                        <option value="أرمل/ة"> أرمل/ة </option>

                                                                    </select>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!--end::Group-->

                                                <!--begin::Group-->
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">العنوان <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-map-marker"></i></span>
                                                                    </div>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg "
                                                                        placeholder="العنوان" name="employee_address"
                                                                        id="employee_address" />
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">موبايل
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-phone"></i></span></div>
                                                                    <input type="number"
                                                                        class="form-control form-control-lg "
                                                                        placeholder="موبايل" name="employee_mobile"
                                                                        id="employee_mobile" />
                                                                </div>
                                                                <span class="form-text text-muted">أدخل رقم موبايل صحيح
                                                                    (مثال: 0599000000)</span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Group-->

                                                <!--begin::Group-->
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">تاريخ الميلاد <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-calendar"></i></span>
                                                                    </div>
                                                                    <input type="date"
                                                                        class="form-control form-control-lg "
                                                                        placeholder="تاريخ الميلاد"
                                                                        name="employee_birthdate"
                                                                        id="employee_birthdate" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">مكان الميلاد
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-map-marked-alt"></i></span>
                                                                    </div>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg "
                                                                        placeholder="مكان الميلاد"
                                                                        name="employee_birthplace"
                                                                        id="employee_birthplace" />
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Group-->

                                            </div>
                                            <!--end::Wizard Step 1-->

                                            <!--begin::Wizard Step 2-->
                                            <div class="" data-wizard-type="step-content">
                                                <h5 class="text-dark font-weight-bold mb-10 mt-5">بيانات الموظف الأساسية
                                                </h5>
                                                <!--begin::Group-->
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">نوع التعيين <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-grip-horizontal"></i></span>
                                                                    </div>
                                                                    <select class="form-control form-control-lg"
                                                                        name="appointment_type" id="appointment_type">
                                                                        <option value="">اختر</option>
                                                                        <option value="مصنف">مصنف (مثبت) </option>
                                                                        <option value="غير مصنف">غير مصنف </option>
                                                                        {{-- <option value="عقد موازي">عقد موازي
                                                                        </option>
                                                                        <option value="عقد مقطوع"> عقد مقطوع </option>
                                                                        <option value="عقد خاص">عقد خاص </option>
                                                                        <option value="كرت عمل يومي"> كرت عمل يومي
                                                                        </option>
                                                                        <option value="رئيس البلدية"> رئيس البلدية
                                                                        </option> --}}
                                                                        <option value="متقاعد"> متقاعد</option>
                                                                    </select>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.2rem">المسمى المعتمد من الوزارة
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-calendar"></i></span>
                                                                    </div>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="named_ministry" id="named_ministry"
                                                                        placeholder="المسمى المعتمد من الوزارة" />
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <!--end::Group-->

                                                <!--begin::Group-->
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">تاريخ بدأ العمل
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-map-marked-alt"></i></span>
                                                                    </div>
                                                                    <input type="date"
                                                                        class="form-control form-control-lg"
                                                                        name="Work_start_date" id="Work_start_date" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">مرفق بدأ العمل
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-map-marked-alt"></i></span>
                                                                    </div>
                                                                    <input type="file"
                                                                        class="form-control form-control-lg"
                                                                        name="Work_start_file" id="Work_start_file" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!--end::Group-->

                                                <!--begin::Group-->
                                                <div class="row">

                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">تاريخ تعيين الوزارة
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-map-marked-alt"></i></span>
                                                                    </div>
                                                                    <input type="date"
                                                                        class="form-control form-control-lg "
                                                                        name="ministry_date_appointment"
                                                                        id="ministry_date_appointment" />
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">مرفق تعيين الوزارة
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-map-marked-alt"></i></span>
                                                                    </div>
                                                                    <input type="file"
                                                                        class="form-control form-control-lg "
                                                                        name="ministry_file_appointment"
                                                                        id="ministry_file_appointment" />
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <!--end::Group-->

                                                <!--begin::Group-->
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">تاريخ تثبيت الوزارة <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text"> <i
                                                                                class="la la-calendar"> </i></span>
                                                                    </div>
                                                                    <input type="date"
                                                                        class="form-control form-control-lg"
                                                                        name="ministry_installation_date"
                                                                        id="ministry_installation_date" />
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">مرفق تثبيت الوزارة <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text"> <i
                                                                                class="la la-calendar"> </i></span>
                                                                    </div>
                                                                    <input type="file"
                                                                        class="form-control form-control-lg"
                                                                        name="ministry_installation_file"
                                                                        id="ministry_installation_file" />
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    {{-- <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">الديانة
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text">
                                                                            <i class="la la-map-marked-alt"></i></span>
                                                                    </div>

                                                                    <select class="form-control form-control-lg"
                                                                        name="religion" id="religion">

                                                                        <option value="">اختر</option>
                                                                        <option value="مسلم">مسلم </option>
                                                                        <option value="مسيحي">مسيحي </option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                                <!--end::Group-->
                                                <!--begin::Group-->
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">الدائرة <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-calendar"></i></span>
                                                                    </div>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg "
                                                                        name="circle" id="circle"
                                                                        placeholder="الدائرة" />
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">القسم
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-map-marked-alt"></i></span>
                                                                    </div>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg "
                                                                        placeholder="القسم" name="section"
                                                                        id="section" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Group-->

                                                <!--begin::Group-->
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">الشعبة <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-calendar"> </i></span>
                                                                    </div>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg "
                                                                        placeholder="الشعبة" name="division"
                                                                        id="division" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">تكليف البلدية
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-map-marked-alt"></i></span>
                                                                    </div>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg "
                                                                        placeholder="المسمى تكليف البلدية" name="named"
                                                                        id="named" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Group-->

                                                <!--begin::Group-->
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem"> الراتب <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-money-bill-wave"></i></span>
                                                                    </div>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg "
                                                                        placeholder="الراتب" name="salary"
                                                                        id="salary" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-4 col-form-label"
                                                                style="font-size: 1.3rem">حالة الراتب
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-8 col-form-label">
                                                                <div class="radio-inline">
                                                                    <label class="radio radio-primary pr-5 pl-5"
                                                                        style="font-size: 1.3rem">
                                                                        <input type="radio" name="salary_status"
                                                                            id="salary_status" value="فعال" />
                                                                        <span></span>
                                                                        فعال
                                                                    </label>
                                                                    <label class="radio radio-primary"
                                                                        style="font-size: 1.3rem">
                                                                        <input type="radio" name="salary_status"
                                                                            id="salary_status" value="مجمد" />
                                                                        <span></span>
                                                                        مجمد
                                                                    </label>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Group-->
                                            </div>
                                            <!--end::Wizard Step 2-->

                                            <!--begin::Wizard Step 3-->
                                            <div class="" data-wizard-type="step-content">
                                                <h5 class="text-dark font-weight-bold mb-10 mt-5"
                                                    style="text-align: center">
                                                    تـــــــــــــــــــــــــــــــــــــــــــــأكــــــــــــــــــــــيــــــــــــــــــــــــــــــــــــــد
                                                    الــــــــــــــــــــــبـــــــــــــــــــــــــــــــيـــــــــــــــــــــــــانـــــــــــــــــــــــــات
                                                </h5>
                                            </div>
                                            <!--end::Wizard Step 3-->

                                            <!--begin::Wizard Actions-->
                                            <div class="d-flex justify-content-between border-top pt-2">
                                                <div class="mr-2">
                                                    <button type="button" id="prev-step"
                                                        class="btn btn-light-primary font-weight-bolder px-9 py-4"
                                                        data-wizard-type="action-prev">
                                                        السابق
                                                    </button>
                                                </div>
                                                <div>
                                                    <button type="submit"
                                                        class="btn btn-success font-weight-bolder px-9 py-4"
                                                        data-wizard-type="action-submit">
                                                        حفظ
                                                    </button>

                                                    <button type="button" id="next-step"
                                                        class="btn btn-primary font-weight-bolder px-9 py-4"
                                                        data-wizard-type="action-next">
                                                        التالي
                                                    </button>
                                                </div>
                                            </div>
                                            <!--end::Wizard Actions-->
                                        </div>
                                    </div>
                                </form>
                                <!--end::Wizard Form-->
                            </div>
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Wizard-->
        </div>
    </div>
    <!--end::Card-->
</div>
<!--end::Container-->
@endsection

@section('scripts')
<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('assets/js/pages/crud/forms/widgets/select2.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/js/pages/custom/wizard/wizard-1_mainemp.js')}}"></script>
<script src="{{asset('assets/js/pages/crud/forms/widgets/form-repeater.js')}}"></script>
<!--end::Page Scripts-->


<script>
    // انتظر تحميل الصفحة بالكامل
window.addEventListener('DOMContentLoaded', (event) => {
    // احضر حقل الدرجة العلمية
    const degreeSelect = document.getElementById('degree');

    // احضر حقول سنة التخرج والمعدل والتقدير
    const graduationLabel = document.querySelector('label[for="graduation"]');
    const graduationInput = document.getElementById('graduation');
    const graduationSpan = document.getElementById('year');
    const rateNumLabel = document.querySelector('label[for="rate_num"]');
    const rateNumInput = document.getElementById('rate_num');
    const rateSpan = document.getElementById('rate_s');
    const rateLabel = document.querySelector('label[for="rate"]');
    const rateSelect = document.getElementById('rate');
    const ratesSpan = document.getElementById('srate');
    const majorLabel = document.querySelector('label[for="majors"]');
    const majorInput = document.getElementById('majors');
    const majorSpan = document.getElementById('major_span');
    const addressLabel = document.querySelector('label[for="address_org"]');
    const addressInput = document.getElementById('address_org');
    const addressSpan = document.getElementById('address');


    // اخفاء عناصر label و span و input عند بدء التحميل
    graduationLabel.style.display = 'none';
    graduationInput.style.display = 'none';
    graduationSpan.style.display = 'none';
    rateNumLabel.style.display = 'none';
    rateNumInput.style.display = 'none';
    rateSpan.style.display = 'none';
    rateLabel.style.display = 'none';
    rateSelect.style.display = 'none';
    ratesSpan.style.display = 'none';
    majorLabel.style.display = 'none';
    majorInput.style.display = 'none';
    majorSpan.style.display = 'none';
    addressLabel.style.display = 'none';
    addressInput.style.display = 'none';
    addressSpan.style.display = 'none';

    // استمع لتغيير حقل الدرجة العلمية
    degreeSelect.addEventListener('change', (event) => {
        const selectedDegree = event.target.value;

        // إذا كانت الدرجة العلمية هي "ابتدائي" أو "اعدادي" أو "ثانوي"
        if (selectedDegree === 'ابتدائي' || selectedDegree === 'اعدادي' || selectedDegree === 'ثانوي' || selectedDegree === 'الثانوية العامة') {
            // أخفاء عناصر label و span و input
            graduationLabel.style.display = 'none';
            graduationInput.style.display = 'none';
            graduationSpan.style.display = 'none';
            rateNumLabel.style.display = 'none';
            rateNumInput.style.display = 'none';
            rateSpan.style.display = 'none';
            rateLabel.style.display = 'none';
            rateSelect.style.display = 'none';
            ratesSpan.style.display = 'none';
            majorLabel.style.display = 'none';
            majorInput.style.display = 'none';
            majorSpan.style.display = 'none';
            addressLabel.style.display = 'none';
            addressInput.style.display = 'none';
            addressSpan.style.display = 'none';

        } else {
            // إظهار عناصر label و span و input

            graduationLabel.style.display = 'block';
            graduationInput.style.display = 'block';
            graduationSpan.style.display = 'block';
            rateNumLabel.style.display = 'block';
            rateNumInput.style.display = 'block';
            rateSpan.style.display = 'block';
            rateLabel.style.display = 'block';
            rateSelect.style.display = 'block';
            ratesSpan.style.display = 'block';
            majorLabel.style.display = 'block';
            majorInput.style.display = 'block';
            majorSpan.style.display = 'block';
            addressLabel.style.display = 'block';
            addressInput.style.display = 'block';
            addressSpan.style.display = 'block';
        }
    });
});

</script>

@endsection