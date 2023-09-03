@extends('layout.master')

@section('title')
تعديل بيانات موظف العقود
@endsection

@section('page_title')
لوحة التحكم
@endsection

@section('sub_main')
بيانات موظفي العقود
@endsection

@section('sub_title')
تعديل بيانات موظف العقود
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
                                <form action="{{route('contract.update',$contract1->id)}}" method="post" class="form needs-validation"
                                    enctype="multipart/form-data" id="kt_form">
                                    @csrf
                                    {!! csrf_field() !!}
                                    @method('PUT')
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
                                                                        value="{{$contract1->id_contract}}" />
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
                                                                        value="{{$contract1->contract_num}}" name="contract_num"
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
                                                            value="{{$contract1->contract_name}}" name="contract_name"
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
                                                            value="{{$contract1->contract_email}}" name="contract_email"
                                                                id="contract_email" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Group-->

                                                <!--begin::Group-->
                                                <div class="row">

                                           

                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-4 col-form-label" style="font-size: 1.3rem">الجنس
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-8 col-form-label">
                                                                <div class="radio-inline">
                                                                    <label class="radio radio-primary pr-5 pl-5" style="font-size: 1.3rem">
                                                                        <input type="radio" name="contract_gender" value="{{$contract1->contract_gender}}" id="contract_gender" @if($contract1->contract_gender == 'ذكر') checked @endif>
                                                                        <span></span>
                                                                        ذكر
                                                                    </label>
                                                                    <label class="radio radio-primary" style="font-size: 1.3rem">
                                                                        <input type="radio" name="contract_gender" value="{{$contract1->contract_gender }}" id="contract_gender" @if($contract1->contract_gender == 'أنثى') checked @endif>
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
                                                                        <option value="{{ $contract1->contract_status  }}" {{$contract1->contract_status == $contract1->contract_status  ? 'selected' : ''}}>{{ $contract1->contract_status}}</option>

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
                                                                        value="{{$contract1->contract_address}}" name="contract_address"
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
                                                                        value="{{$contract1->contract_mobile}}" name="contract_mobile"
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
                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">عدد الزوجات <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-calendar"></i></span>
                                                                    </div>
                                                                    <input type="number"
                                                                        class="form-control form-control-lg "
                                                                        value="{{$contract1->contract_wife}}" name="contract_wife"
                                                                        id="contract_wife" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">عدد الأبناء
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-map-marked-alt"></i></span>
                                                                    </div>
                                                                    <input type="number"
                                                                        class="form-control form-control-lg "
                                                                        value="{{$contract1->contract_son}}" name="contract_son"
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
                                                                        value="{{ date('Y-m-d', strtotime($contract1->contract_birthdate)) }}"

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
                                                                        <option value="{{ $contract1->contract_degree  }}" {{$contract1->contract_degree == $contract1->contract_degree  ? 'selected' : ''}}>{{ $contract1->contract_degree}}</option>

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
                                                                        <option value="{{ $contract2->contract_type  }}" {{$contract2->contract_type == $contract2->contract_type  ? 'selected' : ''}}>{{ $contract2->contract_type}}</option>

                                                                        <option value="عقد موازي">عقد موازي
                                                                        </option>
                                                                        <option value="عقد مقطوع"> عقد مقطوع </option>
                                                                        <option value="عقد خاص">عقد خاص </option>
                                                             
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
                                                                    <input type="text"
                                                                        class="form-control form-control-lg"
                                                                        name="contract_value" id="contract_value"
                                                                        value="{{$contract2->contract_value}}" />
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
                                                                        id="contract_start_date"  
                                                                        value="{{$contract2->contract_start_date }}" />

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
                                                                        id="contract_end_date"
                                                                        value="{{$contract2->contract_end_date }}" />
                                                                       
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
                                                                        name="operator" id="operator"
                                                                        value="{{$contract2->operator}}" />
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
                                                                        name="workplace" id="workplace" value="{{$contract2->workplace}}"/>
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
                                                                        value="{{$contract2->circle}}" />
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
                                                                        value="{{$contract2->section}}" name="section"
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
                                                                        value="{{$contract2->division}}" name="division"
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
                                                                        value="{{$contract2->named}}" name="named"
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
                                                                    name="file" id="file" value="{{$contract2->file}}" />
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Group-->
                                            </div>
                                            <!--end::Wizard Step 2-->



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



@endsection