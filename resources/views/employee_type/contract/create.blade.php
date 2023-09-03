@extends('layout.master')

@section('title')
اضافة بيانات موظف العقود
@endsection

@section('page_title')
لوحة التحكم
@endsection

@section('sub_main')
بيانات موظفي العقود
@endsection

@section('sub_title')
اضافة بيانات موظف العقود
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
        <a href="{{ url('/contract') }}" class="btn btn-primary font-weight-bolder">
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
            </span>عرض قائمة موظفين العقود
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
                                <h3 class="wizard-title">بيانات موظفي العقود الأساسية</h3>
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
                                <form action="{{route('contract.store')}}" method="post" class="form needs-validation"
                                    enctype="multipart/form-data" id="kt_form">
                                    @csrf
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12">
                                            <!--begin::Wizard Step 1-->
                                            <div class="pb-5" data-wizard-type="step-content"
                                                data-wizard-state="current">
                                                <h5 class="text-dark font-weight-bold mb-10">الملف الشخصي:</h5>

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
                                                                        name="id_contract" id="id_contract"
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
                                                                        placeholder="الرقم الوظيفي" name="contract_num"
                                                                        id="contract_num" />

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
                                                                placeholder="الاسم بالكامل" name="contract_name"
                                                                id="contract_name" />

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
                                                                placeholder="البريد الالكتروني" name="contract_email"
                                                                id="contract_email" />
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
                                                                        <input type="radio" name="contract_gender"
                                                                            value="ذكر" id="contract_gender" />
                                                                        <span></span>
                                                                        ذكر
                                                                    </label>
                                                                    <label class="radio radio-primary"
                                                                        style="font-size: 1.3rem">
                                                                        <input type="radio" name="contract_gender"
                                                                            value="أنثى" id="contract_gender" />
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
                                                                        name="contract_status" id="contract_status">

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
                                                                        placeholder="العنوان" name="contract_address"
                                                                        id="contract_address" />
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
                                                                        placeholder="موبايل" name="contract_mobile"
                                                                        id="contract_mobile" />
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
                                                    <div class="col-xl-6 ">
                                                        <div class="form-group row">
                                                            <label for="contract_wife" class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">عدد الزوجات <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text" id="wife"><i
                                                                                class="la la-calendar"></i></span>
                                                                    </div>
                                                                    <input type="number"
                                                                        class="form-control form-control-lg "
                                                                        placeholder="عدد الزوجات" name="contract_wife"
                                                                        id="contract_wife" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label for="contract_son" class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">عدد الأبناء
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text" id="son"><i
                                                                                class="la la-map-marked-alt"></i></span>
                                                                    </div>
                                                                    <input type="number"
                                                                        class="form-control form-control-lg "
                                                                        placeholder="عدد الأبناء" name="contract_son"
                                                                        id="contract_son" />
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
                                                                        name="contract_birthdate"
                                                                        id="contract_birthdate" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">المؤهل العلمي
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-map-marked-alt"></i></span>
                                                                    </div>
                                                                    <select class="form-control form-control-lg"
                                                                        name="contract_degree" id="contract_degree">

                                                                        <option value="">اختر</option>
                                                                        <option value="ابتدائي">ابتدائي</option>
                                                                        <option value="اعدادي">اعدادي</option>
                                                                        <option value="ثانوي">ثانوي</option>
                                                                        <option value="الثانوية العامة">الثانوية العامة
                                                                        </option>
                                                                        <option value="دبلوم">دبلوم</option>
                                                                        <option value="البكالوريس">البكالوريس </option>
                                                                        <option value="الماجيستير">الماجيستير</option>
                                                                        <option value="الدكتوراة"> الدكتوراة </option>

                                                                    </select>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Group-->

                                            </div>
                                            <!--end::Wizard Step 1-->

                                            <!--begin::Wizard Step 2-->
                                            <div class="pb-5" data-wizard-type="step-content">
                                                <h5 class="text-dark font-weight-bold mb-10 mt-5">بيانات الموظف الأساسية
                                                </h5>
                                                <!--begin::Group-->
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">نوع العقد <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-grip-horizontal"></i></span>
                                                                    </div>
                                                                    <select class="form-control form-control-lg"
                                                                        name="contract_type" id="contract_type">
                                                                        <option value="">اختر</option>
                                                                        {{-- <option value="مصنف">مصنف (مثبت) </option>
                                                                        <option value="غير مصنف">غير مصنف </option> --}}
                                                                        <option value="عقد موازي">عقد موازي
                                                                        </option>
                                                                        <option value="عقد مقطوع"> عقد مقطوع </option>
                                                                        <option value="عقد خاص">عقد خاص </option>
                                                                        {{-- <option value="كرت عمل يومي"> كرت عمل يومي
                                                                        </option>
                                                                        <option value="رئيس البلدية"> رئيس البلدية
                                                                        </option>
                                                                        <option value="متقاعد"> متقاعد</option> --}}
                                                                    </select>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.2rem">قيمة العقد
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-calendar"></i></span>
                                                                    </div>
                                                                    <input type="number"
                                                                        class="form-control form-control-lg"
                                                                        name="contract_value" id="contract_value"
                                                                        placeholder="قيمة العقد" />
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
                                                                style="font-size: 1.3rem">تاريخ بدأ العقد
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-map-marked-alt"></i></span>
                                                                    </div>
                                                                    <input type="date"
                                                                        class="form-control form-control-lg"
                                                                        name="contract_start_date"
                                                                        id="contract_start_date" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">تاريخ انتهاء العقد
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-map-marked-alt"></i></span>
                                                                    </div>
                                                                    <input type="date"
                                                                        class="form-control form-control-lg "
                                                                        name="contract_end_date"
                                                                        id="contract_end_date" />
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
                                                                style="font-size: 1.3rem">جهة التشغيل
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-map-marked-alt"></i></span>
                                                                    </div>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg "
                                                                        name="operator" id="operator" />
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">مكان العمل
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-map-marked-alt"></i></span>
                                                                    </div>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg "
                                                                        name="workplace" id="workplace" />
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
                                                                style="font-size: 1.3rem">الوظيفة
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

                                                <div class="col-xl-6">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-4"
                                                            style="font-size: 1.3rem">المرفقات <span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-lg-8">
                                                            <div class="input-group">
                                                                <div class="input-group-append"><span
                                                                        class="input-group-text"> <i
                                                                            class="la la-calendar"> </i></span>
                                                                </div>
                                                                <input type="file" class="form-control form-control-lg"
                                                                    name="file" id="file" />
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Group-->
                                            </div>
                                            <!--end::Wizard Step 2-->

                                            <!--begin::Wizard Step 3-->
                                            <div class="" data-wizard-type="step-content">
                                                <h5 class="text-dark font-weight-bold mb-10 mt-5">
                                                    تـــأكيـــــــــــــــــــد
                                                    البيـــــــــــــــــــانــــــــــــــــــــــات
                                                </h5>
                                            </div>
                                            <!--end::Wizard Step 3-->

                                            <!--begin::Wizard Actions-->
                                            <div class="d-flex justify-content-between border-top pt-8 mt-2 ">
                                                <div class="mr-2">
                                                    <button type="button" id="prev-step"
                                                        class="btn btn-light-primary font-weight-bolder px-9 py-4"
                                                        data-wizard-type="action-prev">
                                                        السابق
                                                    </button>
                                                </div>
                                                <div>
                                                    <button type="submit" {{-- onclick="return printMokalaf();" --}}
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
<script src="{{asset('assets/js/pages/custom/wizard/wizard-1_contract.js')}}"></script>
<script src="{{asset('assets/js/pages/crud/forms/widgets/form-repeater.js')}}"></script>

<!--end::Page Scripts-->


<script>
    // انتظر تحميل الصفحة بالكامل
    window.addEventListener('DOMContentLoaded', (event) => {
        // احضر حقل الحالة الاجتماعية
        const maritalStatusSelect = document.getElementById('contract_status');
        
        // احضر حقل عدد الزوجات
        const wifeCountInput = document.getElementById('contract_wife');
        const wifeLabel = document.querySelector('label[for="contract_wife"]');
        const wifeSpan = document.getElementById('wife');
        
        // احضر حقل عدد الأبناء
        const childrenCountInput = document.getElementById('contract_son');
        const childrenLabel = document.querySelector('label[for="contract_son"]');
        const childSpan = document.getElementById('son');
        
        // اخفاء حقول عدد الزوجات وعدد الأبناء عند بدء التحميل
        wifeCountInput.style.display = 'none';
        childrenCountInput.style.display = 'none';
        childrenLabel.style.display = 'none';
        wifeLabel.style.display = 'none';
        wifeSpan.style.display = 'none';
        childSpan.style.display = 'none';

        
        // استمع لتغيير حقل الحالة الاجتماعية
        maritalStatusSelect.addEventListener('change', (event) => {
            const selectedStatus = event.target.value;
            
            // إذا كانت الحالة الاجتماعية هي "أعزب/عزباء"
            if (selectedStatus === 'أعزب/عزباء') {
                // أخفاء حقل عدد الزوجات وعدد الأبناء
                wifeCountInput.style.display = 'none';
                wifeLabel.style.display = 'none';
                childrenCountInput.style.display = 'none'; 
                childrenLabel.style.display = 'none';
                wifeSpan.style.display = 'none';
                childSpan.style.display = 'none';


            } else {
                // إظهار حقل عدد الزوجات وعدد الأبناء
                wifeCountInput.style.display = 'block';
                childrenCountInput.style.display = 'block';
                wifeLabel.style.display = 'block';
                childrenLabel.style.display = 'block';
                wifeSpan.style.display = 'block';
            childSpan.style.display = 'block';

            
            }
        });
    });
</script>

@endsection