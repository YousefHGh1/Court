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
            </span>عرض قائمة الموظفين</a>
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
                                <form action="{{route('employee.update',$employee->id)}}" method="post"
                                    class="form needs-validation" enctype="multipart/form-data" id="kt_form">
                                    @csrf
                                    {!! csrf_field() !!}
                                    @method('PUT')
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
                                                                        value="{{$employee->id_employee}}" />
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
                                                                        value="{{$employee->employee_num}}"
                                                                        name="employee_num" id="employee_num" />

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
                                                                value="{{$employee->employee_name}}"
                                                                name="employee_name" id="employee_name" />

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
                                                                value="{{$employee->employee_email}}"
                                                                name="employee_email" id="employee_email" />
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
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-8 col-form-label">
                                                                <div class="radio-inline">
                                                                    <label class="radio radio-primary pr-5 pl-5"
                                                                        style="font-size: 1.3rem">
                                                                        <input type="radio" name="employee_gender"
                                                                            value="{{$employee->employee_gender}}"
                                                                            id="employee_gender"
                                                                            @if($employee->employee_gender == 'ذكر')
                                                                        checked @endif>
                                                                        <span></span>
                                                                        ذكر
                                                                    </label>
                                                                    <label class="radio radio-primary"
                                                                        style="font-size: 1.3rem">
                                                                        <input type="radio" name="employee_gender"
                                                                            value="{{$employee->employee_gender }}"
                                                                            id="employee_gender"
                                                                            @if($employee->employee_gender == 'أنثى')
                                                                        checked @endif>
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
                                                                        <option
                                                                            value="{{ $employee->employee_status  }}"
                                                                            {{$employee->employee_status ==
                                                                            $employee->employee_status ? 'selected' :
                                                                            ''}}>{{ $employee->employee_status}}
                                                                        </option>

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
                                                                        value="{{$employee->employee_address}}"
                                                                        name="employee_address" id="employee_address" />
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
                                                                        value="{{$employee->employee_mobile}}"
                                                                        name="employee_mobile" id="employee_mobile" />
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
                                                                        value="{{ date('Y-m-d', strtotime($employee->employee_birthdate)) }}"
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
                                                                        value="{{$employee->employee_birthplace}}"
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
                                                                        <option
                                                                            value="{{ $maindataemp->appointment_type  }}"
                                                                            {{$maindataemp->appointment_type ==
                                                                            $maindataemp->appointment_type ? 'selected'
                                                                            :
                                                                            ''}}>{{ $maindataemp->appointment_type}}
                                                                        </option>

                                                                        <option value="مصنف">مصنف (مثبت) </option>
                                                                        <option value="غير مصنف">غير مصنف </option>

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
                                                                        value="{{$maindataemp->named_ministry}}" />
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
                                                                        name="Work_start_date" id="Work_start_date"
                                                                        value="{{ date('Y-m-d', strtotime($maindataemp->Work_start_date)) }}" />
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
                                                                        name="Work_start_file" id="Work_start_file"
                                                                        value="{{ $maindataemp->Work_start_file }}" />
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
                                                                        id="ministry_date_appointment"
                                                                        value="{{ date('Y-m-d', strtotime($maindataemp->ministry_date_appointment)) }}" />

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
                                                                        id="ministry_file_appointment"
                                                                        value="{{$maindataemp->ministry_file_appointment}}" />
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
                                                                        id="ministry_installation_date"
                                                                        value="{{ date('Y-m-d', strtotime($maindataemp->ministry_installation_date)) }}" />

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
                                                                        id="ministry_installation_file"
                                                                        value="{{$maindataemp->ministry_installation_file}}" />
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
                                                                        value="{{$maindataemp->circle}}" />
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
                                                                        value="{{$maindataemp->section}}" name="section"
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
                                                                        value="{{$maindataemp->division}}"
                                                                        name="division" id="division" />
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
                                                                        value="{{$maindataemp->named}}" name="named"
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
                                                                        value="{{$maindataemp->salary}}" name="salary"
                                                                        id="salary" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-4 col-form-label"
                                                                style="font-size: 1.3rem">حالة الراتب
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-8 col-form-label">
                                                                <div class="radio-inline">
                                                                    <label class="radio radio-primary pr-5 pl-5"
                                                                        style="font-size: 1.3rem">
                                                                        <input type="radio" name="salary_status"
                                                                            value="{{$maindataemp->salary_status}}"
                                                                            id="salary_status"
                                                                            @if($maindataemp->salary_status == 'فعال')
                                                                        checked @endif>
                                                                        <span></span>
                                                                        فعال
                                                                    </label>
                                                                    <label class="radio radio-primary"
                                                                        style="font-size: 1.3rem">
                                                                        <input type="radio" name="salary_status"
                                                                            value="{{$maindataemp->salary_status }}"
                                                                            id="salary_status"
                                                                            @if($maindataemp->salary_status == 'مجمد')
                                                                        checked @endif>
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
                                            {{-- <div class="" data-wizard-type="step-content">

                                                <div id="kt_repeater_1">
                                                    <div data-repeater-list="wifeemp" class="col-lg-12">
                                                        <div data-repeater-item class="">
                                                            <div class="row">

                                                                <div class="col-xl-10">
                                                                    <h5 class="text-dark font-weight-bold mb-10 mt-5">
                                                                        بيانات الزوج/ة
                                                                    </h5>
                                                                </div>

                                                                <div class="col-xl-1">
                                                                    <a href="javascript:;" data-repeater-delete=""
                                                                        class="btn btn-sm font-weight-bolder btn-light-danger"
                                                                        style="float: left">
                                                                        <i class="la la-trash-o"></i>
                                                                    </a>
                                                                </div>

                                                                <div class="col-xl-1">
                                                                    <a href="javascript:;" data-repeater-create=""
                                                                        class="btn btn-sm font-weight-bolder btn-light-primary"
                                                                        style="float: left">
                                                                        <i class="la la-plus"></i>
                                                                    </a>
                                                                </div>

                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xl-4">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-lg-4"
                                                                            style="font-size: 1.3rem">اسم الزوج/ة
                                                                            <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-8">
                                                                            <div class="input-group ">
                                                                                <div class="input-group-prepend"><span
                                                                                        class="input-group-text"><i
                                                                                            class="la la-map-marked-alt"></i></span>
                                                                                </div>
                                                                                <input type="text"
                                                                                    class="form-control form-control-lg"
                                                                                    name="wife_name" id="wife_name"
                                                                                    value="{{$wife->wife_name}}" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="col-xl-4">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-lg-4"
                                                                            style="font-size: 1.3rem">رقم الهوية <span
                                                                                class="text-danger">*</span></label>
                                                                        <div class="col-lg-8">
                                                                            <div class="input-group">
                                                                                <div class="input-group-append"><span
                                                                                        class="input-group-text"><i
                                                                                            class="la la-calendar"></i></span>
                                                                                </div>
                                                                                <input type="number"
                                                                                    class="form-control form-control-lg "
                                                                                    name="id_wife" id="id_wife"
                                                                                    value="{{$wife->id_wife}}" />
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-4">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-lg-5"
                                                                            style="font-size: 1.1rem">تاريخ ميلادالزوج/ة
                                                                            <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-7">
                                                                            <div class="input-group">
                                                                                <div class="input-group-append"><span
                                                                                        class="input-group-text"><i
                                                                                            class="la la-calendar"></i></span>
                                                                                </div>
                                                                                <input type="date"
                                                                                    class="form-control form-control-lg "
                                                                                    name="wife_birth" id="wife_birth"
                                                                                    value="{{$wife->wife_birth}}" />
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>




                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-4">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-lg-4"
                                                                            style="font-size: 1.3rem">تاريخ الزواج <span
                                                                                class="text-danger">*</span></label>
                                                                        <div class="col-lg-8">
                                                                            <div class="input-group">
                                                                                <div class="input-group-append"><span
                                                                                        class="input-group-text"><i
                                                                                            class="la la-calendar"></i></span>
                                                                                </div>
                                                                                <input type="date"
                                                                                    class="form-control form-control-lg "
                                                                                    name="date_marriage"
                                                                                    id="date_marriage"
                                                                                    value="{{$wife->date_marriage}}" />
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-4">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-lg-4"
                                                                            style="font-size:1.3rem"> عقد الزواج
                                                                            <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-8">
                                                                            <div class="input-group ">
                                                                                <div class="input-group-prepend"><span
                                                                                        class="input-group-text"><i
                                                                                            class="la la-map-marked-alt"></i></span>
                                                                                </div>

                                                                                <input type="file"
                                                                                    class="form-control form-control-lg "
                                                                                    name="wife_file[]" id="wife_file"
                                                                                    value="{{$wife->wife_file}}"
                                                                                    multiple>

                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>



                                                                <div class="col-xl-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-4 col-form-label"
                                                                            style="font-size: 1.3rem">هل يعمل الزوج/ة
                                                                            <span class="text-danger">*</span>
                                                                        </label>
                                                                        <div class="col-8 col-form-label">
                                                                            <div class="radio-inline">
                                                                                <label
                                                                                    class="radio radio-primary pr-5 pl-5"
                                                                                    style="font-size: 1.3rem">
                                                                                    <input type="radio" name="wife_job"
                                                                                        value="{{$wife->wife_job}}"
                                                                                        id="wife_job"
                                                                                        @if($wife->wife_job == 'نعم')
                                                                                    checked @endif>
                                                                                    <span></span>
                                                                                    نعم
                                                                                </label>
                                                                                <label class="radio radio-primary"
                                                                                    style="font-size: 1.3rem">
                                                                                    <input type="radio" name="wife_job"
                                                                                        value="{{$wife->wife_job }}"
                                                                                        id="wife_job"
                                                                                        @if($wife->wife_job == ' لا')
                                                                                    checked @endif>
                                                                                    <span></span>
                                                                                    لا
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                        </div>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div id="kt_repeater_4">
                                                    <div data-repeater-list="sonemp" class="col-lg-12">
                                                        <div data-repeater-item class="">

                                                            <div class="row">

                                                                <div class="col-xl-10">
                                                                    <h5 class="text-dark font-weight-bold mb-10 mt-5">
                                                                        بيانات الأبناء
                                                                    </h5>
                                                                </div>

                                                                <div class="col-xl-1">
                                                                    <a href="javascript:;" data-repeater-delete=""
                                                                        class="btn btn-sm font-weight-bolder btn-light-danger"
                                                                        style="float: left">
                                                                        <i class="la la-trash-o"></i>
                                                                    </a>
                                                                </div>

                                                                <div class="col-xl-1">
                                                                    <a href="javascript:;" data-repeater-create=""
                                                                        class="btn btn-sm font-weight-bolder btn-light-primary"
                                                                        style="float: left">
                                                                        <i class="la la-plus"></i>
                                                                    </a>
                                                                </div>

                                                            </div>

                                                            <div class="row ">
                                                                <div class="col-xl-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-lg-4"
                                                                            style="font-size: 1.3rem">رقم الهوية <span
                                                                                class="text-danger">*</span></label>
                                                                        <div class="col-lg-8">
                                                                            <div class="input-group">
                                                                                <div class="input-group-append"><span
                                                                                        class="input-group-text"><i
                                                                                            class="la la-calendar"></i></span>
                                                                                </div>
                                                                                <input type="number"
                                                                                    class="form-control form-control-lg "
                                                                                    value="{{$son->id_son}}"
                                                                                    name="id_son" id="id_son" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-lg-4"
                                                                            style="font-size: 1.3rem">اسم الابن/ة
                                                                            <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-8">
                                                                            <div class="input-group ">
                                                                                <div class="input-group-prepend"><span
                                                                                        class="input-group-text"><i
                                                                                            class="la la-map-marked-alt"></i></span>
                                                                                </div>
                                                                                <input type="text"
                                                                                    class="form-control form-control-lg "
                                                                                    value="{{$son->son_name}}"
                                                                                    name="son_name" id="son_name" />
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xl-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-lg-4"
                                                                            style="font-size: 1.3rem">الحالة الاجتماعية
                                                                            <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-8">
                                                                            <div class="input-group">
                                                                                <div class="input-group-append"><span
                                                                                        class="input-group-text"><i
                                                                                            class="la la-calendar"></i></span>
                                                                                </div>
                                                                                <select
                                                                                    class="form-control form-control-lg"
                                                                                    name="son_satuts" id="son_satuts">
                                                                                    <option value="">اختر</option>
                                                                                    <option
                                                                                        value="{{ $wife->son_satuts  }}"
                                                                                        {{$wife->son_satuts ==
                                                                                        $wife->son_satuts ? 'selected' :
                                                                                        ''}}>{{ $wife->son_satuts}}
                                                                                    </option>

                                                                                    <option value="أعزب/عزباء">
                                                                                        أعزب/عزباء
                                                                                    </option>
                                                                                    <option value="متزوج/ة">متزوج/ة
                                                                                    </option>
                                                                                    <option value="مطلق/ة">مطلق/ة
                                                                                    </option>
                                                                                    <option value="أرمل/ة"> أرمل/ة
                                                                                    </option>

                                                                                </select>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>




                                                                <div class="col-xl-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-4 col-form-label"
                                                                            style="font-size: 1.3rem">الجنس
                                                                            <span class="text-danger">*</span>
                                                                        </label>
                                                                        <div class="col-8 col-form-label">
                                                                            <div class="radio-inline">
                                                                                <label
                                                                                    class="radio radio-primary pr-5 pl-5"
                                                                                    style="font-size: 1.3rem">
                                                                                    <input type="radio"
                                                                                        name="son_gender"
                                                                                        value="{{$son->son_gender}}"
                                                                                        id="son_gender"
                                                                                        @if($son->son_gender == 'ذكر')
                                                                                    checked @endif>
                                                                                    <span></span>
                                                                                    ذكر
                                                                                </label>
                                                                                <label class="radio radio-primary"
                                                                                    style="font-size: 1.3rem">
                                                                                    <input type="radio"
                                                                                        name="son_gender"
                                                                                        value="{{$son->son_gender }}"
                                                                                        id="son_gender"
                                                                                        @if($son->son_gender == 'أنثى')
                                                                                    checked @endif>
                                                                                    <span></span>
                                                                                    أنثى
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xl-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-lg-4"
                                                                            style="font-size: 1.3rem"> شهادة الميلاد
                                                                            <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-8">
                                                                            <div class="input-group ">
                                                                                <div class="input-group-prepend"><span
                                                                                        class="input-group-text"><i
                                                                                            class="la la-map-marked-alt"></i></span>
                                                                                </div>
                                                                                <input type="file"
                                                                                    class="form-control form-control-lg "
                                                                                    value="{{$son->son_file}}"
                                                                                    name="son_file" id="son_file" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-lg-4"
                                                                            style="font-size: 1.3rem">تاريخ الميلاد
                                                                            <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-8">
                                                                            <div class="input-group">
                                                                                <div class="input-group-append"><span
                                                                                        class="input-group-text"><i
                                                                                            class="la la-calendar"></i></span>
                                                                                </div>
                                                                                <input type="date"
                                                                                    class="form-control form-control-lg "
                                                                                    value="{{$son->son_birth}}"
                                                                                    name="son_birth" id="son_birth" />
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                            <div class="row">

                                                                <div class="col-xl-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-4 col-form-label"
                                                                            style="font-size: 1.3rem">هل يعمل الابن/ة
                                                                            <span class="text-danger">*</span>
                                                                        </label>
                                                                        <div class="col-8 col-form-label">
                                                                            <div class="radio-inline">
                                                                                <label
                                                                                    class="radio radio-primary pr-5 pl-5"
                                                                                    style="font-size: 1.3rem">
                                                                                    <input type="radio" name="son_job"
                                                                                        value="{{$son->son_job}}"
                                                                                        id="son_job" @if($son->son_job
                                                                                    == 'نعم')
                                                                                    checked @endif>
                                                                                    <span></span>
                                                                                    نعم
                                                                                </label>
                                                                                <label class="radio radio-primary"
                                                                                    style="font-size: 1.3rem">
                                                                                    <input type="radio" name="son_job"
                                                                                        value="{{$son->son_job }}"
                                                                                        id="son_job" @if($son->son_job
                                                                                    == ' لا')
                                                                                    checked @endif>
                                                                                    <span></span>
                                                                                    لا
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="col-xl-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-4 col-form-label"
                                                                            style="font-size: 1.3rem">جامعي
                                                                            <span class="text-danger">*</span>
                                                                        </label>
                                                                        <div class="col-8 col-form-label">
                                                                            <div class="radio-inline">
                                                                                <label
                                                                                    class="radio radio-primary pr-5 pl-5"
                                                                                    style="font-size: 1.3rem">
                                                                                    <input type="radio" name="son_unv"
                                                                                        value="{{$son->son_unv}}"
                                                                                        id="son_unv" @if($son->son_unv
                                                                                    == 'نعم')
                                                                                    checked @endif>
                                                                                    <span></span>
                                                                                    نعم
                                                                                </label>
                                                                                <label class="radio radio-primary"
                                                                                    style="font-size: 1.3rem">
                                                                                    <input type="radio" name="son_unv"
                                                                                        value="{{$son->son_unv }}"
                                                                                        id="son_unv" @if($son->son_unv
                                                                                    == ' لا')
                                                                                    checked @endif>
                                                                                    <span></span>
                                                                                    لا
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xl-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-lg-4"
                                                                            style="font-size: 1.3rem">الجامعة <span
                                                                                class="text-danger">*</span></label>
                                                                        <div class="col-lg-8">
                                                                            <div class="input-group">
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"><i
                                                                                            class="la la-calendar"></i></span>
                                                                                </div>
                                                                                <input type="text"
                                                                                    class="form-control form-control-lg"
                                                                                    value="{{$son->son_unv_name}}"
                                                                                    name="son_unv_name"
                                                                                    id="son_unv_name" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-lg-4"
                                                                            style="font-size: 1.3rem">التخصص <span
                                                                                class="text-danger">*</span></label>
                                                                        <div class="col-lg-8">
                                                                            <div class="input-group">
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"><i
                                                                                            class="la la-calendar"></i></span>
                                                                                </div>
                                                                                <input type="text"
                                                                                    class="form-control form-control-lg"
                                                                                    value="{{$son->son_major}}"
                                                                                    name="son_major" id="son_major" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xl-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-lg-4"
                                                                            style="font-size: 1.3rem">بداية الدراسة
                                                                            <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-8">
                                                                            <div class="input-group">
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"><i
                                                                                            class="la la-calendar"></i></span>
                                                                                </div>
                                                                                <input type="date"
                                                                                    class="form-control form-control-lg"
                                                                                    value="{{$son->son_study_start}}"
                                                                                    name="son_study_start"
                                                                                    id="son_study_start" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label col-lg-4"
                                                                            style="font-size: 1.3rem">شهادة القيد <span
                                                                                class="text-danger">*</span></label>
                                                                        <div class="col-lg-8">
                                                                            <div class="input-group">
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"><i
                                                                                            class="la la-calendar"></i></span>
                                                                                </div>
                                                                                <input type="file"
                                                                                    class="form-control form-control-lg"
                                                                                    value="{{$son->son_unv_file}}"
                                                                                    name="son_unv_file"
                                                                                    id="son_unv_file" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>



                                            </div> --}}
                                            <!--end::Wizard Step 3-->

                                            <!--begin::Wizard Step 4-->
                                            {{-- <div class="" data-wizard-type="step-content">
                                                <h5 class="mb-10 font-weight-bold text-dark">المؤهلات العلمية والدورات
                                                    التدريبية
                                                </h5>


                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">المؤسسة التعليمية <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-calendar"></i></span>
                                                                    </div>
                                                                    <input type="text" name="educational_org"
                                                                        id="educational_org"
                                                                        class="form-control form-control-lg "
                                                                        value="{{$educational->educational_org}}" />
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">الدرجة العلمية
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-map-marked-alt"></i></span>
                                                                    </div>
                                                                    <select class="form-control form-control-lg"
                                                                        name="degree" id="degree">

                                                                        <option value="">اختر</option>
                                                                        <option value="{{ $educational->degree  }}"
                                                                            {{$educational->degree ==
                                                                            $educational->degree ? 'selected' : ''}}>{{
                                                                            $educational->degree}}</option>

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

                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">التخصص <span
                                                                    class="text-danger"></span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-calendar"></i></span>
                                                                    </div>
                                                                    <input type="text" name="majors" id="majors"
                                                                        class="form-control form-control-lg "
                                                                        value="{{$educational->majors}}" />
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">مكان الدراسة
                                                                <span class="text-danger"></span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-map-marked-alt"></i></span>
                                                                    </div>
                                                                    <input type="text" name="address_org"
                                                                        id="address_org"
                                                                        class="form-control form-control-lg "
                                                                        value="{{$educational->address_org}}" />
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">سنة التخرج <span
                                                                    class="text-danger"></span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-calendar"></i></span>
                                                                    </div>
                                                                    <input type="text" name="graduation" id="graduation"
                                                                        class="form-control form-control-lg "
                                                                        value="{{$educational->graduation}}" />
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">المعدل <span
                                                                    class="text-danger">%</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-calendar"></i></span>
                                                                    </div>
                                                                    <input type="number" name="rate_num" id="rate_num"
                                                                        class="form-control form-control-lg "
                                                                        value="{{$educational->rate_num}}" />
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-3">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">التقدير </label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-calendar"></i></span>
                                                                    </div>
                                                                    <select class="form-control form-control-lg"
                                                                        name="rate" id="rate">

                                                                        <option value="">اختر</option>
                                                                        <option value="{{ $educational->rate  }}"
                                                                            {{$educational->rate == $educational->rate ?
                                                                            'selected' : ''}}>{{ $educational->rate}}
                                                                        </option>
                                                                        <option value="ممتاز">ممتاز </option>
                                                                        <option value="جيد جدا">جيد جدا </option>
                                                                        <option value="جيد">جيد</option>
                                                                        <option value="جيد">مقبول</option>
                                                                        <option value="متوسط">متوسط</option>
                                                                    </select>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">مرفق المؤهلات العلمية </label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-calendar"></i></span>
                                                                    </div>
                                                                    <input class="form-control form-control-lg "
                                                                        value="{{$educational->edu_files}}" type="file"
                                                                        name="edu_files[]" multiple />
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">الدورات التدريبية </label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-calendar"></i></span>
                                                                    </div>
                                                                    <input type="file"
                                                                        class="form-control form-control-lg "
                                                                        value="{{$educational->training_file}}"
                                                                        name="training_file" id="training_file" />
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div> --}}
                                            <!--end::Wizard Step 4-->

                                            <!--begin::Wizard Step 5-->
                                            {{-- <div class="" data-wizard-type="step-content">
                                                <h5 class="text-dark font-weight-bold mb-10 mt-5">بيانات المعال
                                                </h5>

                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">اسم المعال
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-map-marked-alt"></i></span>
                                                                    </div>
                                                                    <input type="text" name="dependent_name"
                                                                        class="form-control form-control-lg "
                                                                        value="{{$dependent->dependent_name}}" />
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">هوية المعال <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-calendar"></i></span>
                                                                    </div>
                                                                    <input type="number" name="id_dependent"
                                                                        class="form-control form-control-lg "
                                                                        value="{{$dependent->id_dependent}}" />
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



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
                                                                    <input type="date" name="dependent_birth"
                                                                        class="form-control form-control-lg "
                                                                        value="{{ date('Y-m-d', strtotime($dependent->dependent_birth)) }}" />

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4 "
                                                                style="font-size: 1.3rem">صلة القرابة <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-balance-scale"></i></span>
                                                                    </div>

                                                                    <select class="form-control form-control-lg"
                                                                        name="relative_relation">

                                                                        <option value="">اختر</option>
                                                                        <option
                                                                            value="{{ $dependent->relative_relation}}"
                                                                            {{$dependent->relative_relation ==
                                                                            $dependent->relative_relation ? 'selected' :
                                                                            ''}}>{{ $dependent->relative_relation}}
                                                                        </option>
                                                                        <option value="أب">أب </option>
                                                                        <option value="أم">أم </option>
                                                                        <option value="أخ">أخ</option>
                                                                        <option value="أخت"> أخت </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">


                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-4 col-form-label"
                                                                style="font-size: 1.3rem">الجنس
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-8 col-form-label">
                                                                <div class="radio-inline">
                                                                    <label class="radio radio-primary pr-5 pl-5"
                                                                        style="font-size: 1.3rem">
                                                                        <input type="radio" name="dependent_gender"
                                                                            value="{{$dependent->dependent_gender}}"
                                                                            id="dependent_gender"
                                                                            @if($dependent->dependent_gender == 'ذكر')
                                                                        checked @endif>
                                                                        <span></span>
                                                                        ذكر
                                                                    </label>
                                                                    <label class="radio radio-primary"
                                                                        style="font-size: 1.3rem">
                                                                        <input type="radio" name="dependent_gender"
                                                                            value="{{$dependent->dependent_gender }}"
                                                                            id="dependent_gender"
                                                                            @if($dependent->dependent_gender == 'أنثى')
                                                                        checked @endif>
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
                                                                style="font-size: 1.3rem">مرفق
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-map-marked-alt"></i></span>
                                                                    </div>
                                                                    <input type="file" name="dependent_file"
                                                                        class="form-control form-control-lg "
                                                                        value="{{$dependent->dependent_file}}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">الملاحظات
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-map-marked-alt"></i></span>
                                                                    </div>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg "
                                                                        value="{{$dependent->notes}}" name="notes" />
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">العنوان
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-map-marked-alt"></i></span>
                                                                    </div>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg "
                                                                        value="{{$dependent->dependent_address}}"
                                                                        name="dependent_address" />
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div> --}}
                                            <!--end::Wizard Step 5-->

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


{{-- <script>
    // استدعاء الدالة عند تحميل الصفحة
    window.onload = function() {
        // العثور على عنصر الاختيار بواسطة الاسم (son_unv)
        var radio = document.getElementsByName('son_unv');

        // تعيين حدث التغيير لعنصر الاختيار
        for (var i = 0; i < radio.length; i++) {
            radio[i].addEventListener('change', function() {
                // عند تغيير الاختيار، التحقق من قيمة الاختيار المختارة
                if (this.value === 'نعم') {
                    // إظهار البيانات المرتبطة بكونه جامعي
                    document.getElementById('son_unv_name').parentNode.parentNode.parentNode.style.display = 'block';
                    document.getElementById('son_major').parentNode.parentNode.parentNode.style.display = 'block';
                    document.getElementById('son_study_start').parentNode.parentNode.parentNode.style.display = 'block';
                    document.getElementById('son_unv_file').parentNode.parentNode.parentNode.style.display = 'block';
                } else {
                    // إخفاء البيانات المرتبطة بعدم كونه  جامعي
                    document.getElementById('son_unv_name').parentNode.parentNode.parentNode.style.display = 'none';
                    document.getElementById('son_major').parentNode.parentNode.parentNode.style.display = 'none';
                    document.getElementById('son_study_start').parentNode.parentNode.parentNode.style.display = 'none';
                    document.getElementById('son_unv_file').parentNode.parentNode.parentNode.style.display = 'none';
                }
            });
        }
    };
</script>


<script>
    function duplicateFields() {
        var originalFields = document.getElementById('sonFields');
        
        // استنساخ الحقول المكررة
        var clone = originalFields.cloneNode(true);
        
        // مسح قيم الحقول المكررة
        var inputs = clone.getElementsByTagName('input');
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].value = '';
        }
        
        // إضافة زر الحذف
        var deleteButton = document.createElement('button');
        deleteButton.type = 'button';
        deleteButton.className = 'delete-button btn btn-sm font-weight-bolder btn-light-danger';
        deleteButton.innerHTML = '<i class="la la-trash-o"></i>';
        deleteButton.onclick = function() {
            this.parentNode.parentNode.removeChild(this.parentNode);
        };
        clone.appendChild(deleteButton);
        
        // إضافة الحقول المكررة إلى النموذج
        originalFields.parentNode.appendChild(clone);
    }
</script> --}}

@endsection