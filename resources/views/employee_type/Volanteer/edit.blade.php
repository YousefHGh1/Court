@extends('layout.master')

@section('title')
تعديل بيانات المتدربين والمتطوعين
@endsection

@section('page_title')
لوحة التحكم
@endsection

@section('sub_main')
 بيانات المتدربين والمتطوعين
@endsection

@section('sub_title')
تعديل بيانات المتدربين والمتطوعين
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
                                <h3 class="wizard-title">بيانات المتدرب/المتطوع الأساسية</h3>
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
                                <form action="{{route('volanteer.update',$volanteer->id)}}" method="post" class="form needs-validation"
                                    enctype="multipart/form-data" id="kt_form">
                                    @csrf
                                    {!! csrf_field() !!}
                                    @method('PUT')
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12">
                                            <!--begin::Wizard Step 1-->
                                            <div class="pb-5" data-wizard-type="step-content"
                                                data-wizard-state="current">
                                                <h5 class="text-dark font-weight-bold mb-10">البيانات
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
                                                                        name="id_volanteer" id="id_volanteer"
                                                                        value="{{$volanteer->id_volanteer}}" />
                                                                    {{-- <div class="invalid-feedback">Shucks, check the
                                                                        formatting
                                                                        of
                                                                        that and try again.</div> --}}
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">

                                                    <div class="form-group row ">
                                                        <label class="col-form-label col-lg-4"
                                                            style="font-size: 1.3rem">البريد الالكتروني <span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-lg-8">
                                                            <div class="input-group ">
                                                                <div class="input-group-prepend"><span
                                                                        class="input-group-text"><i
                                                                            class="la la-at"></i></span>
                                                                </div>
                                                                <input type="email" class="form-control form-control-lg "
                                                                value="{{$volanteer->volanteer_email}}" name="volanteer_email"
                                                                    id="volanteer_email" />
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
                                                            value="{{$volanteer->volanteer_name}}" name="volanteer_name"
                                                                id="volanteer_name" />

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
                                                                        <input type="radio" name="volanteer_gender" value="{{$volanteer->volanteer_gender}}" id="volanteer_gender" @if($volanteer->volanteer_gender == 'ذكر') checked @endif>
                                                                        <span></span>
                                                                        ذكر
                                                                    </label>
                                                                    <label class="radio radio-primary" style="font-size: 1.3rem">
                                                                        <input type="radio" name="volanteer_gender" value="{{$volanteer->volanteer_gender }}" id="volanteer_gender" @if($volanteer->volanteer_gender == 'أنثى') checked @endif>
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
                                                                        name="volanteer_status" id="volanteer_status">

                                                                        <option value="">اختر</option>
                                                                        <option value="{{ $volanteer->volanteer_status  }}" {{$volanteer->volanteer_status == $volanteer->volanteer_status  ? 'selected' : ''}}>{{ $volanteer->volanteer_status}}</option>

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
                                                                        value="{{$volanteer->volanteer_address}}" name="volanteer_address"
                                                                        id="volanteer_address" />
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
                                                                        value="{{$volanteer->volanteer_mobile}}" name="volanteer_mobile"
                                                                        id="volanteer_mobile" />
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
                                                                        value="{{ date('Y-m-d', strtotime($volanteer->volanteer_birthdate)) }}"

                                                                        name="volanteer_birthdate"
                                                                        id="volanteer_birthdate" />
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
                                                                        name="volanteer_degree" id="volanteer_degree">

                                                                        <option value="">اختر</option>
                                                                        <option value="{{ $volanteer->volanteer_degree  }}" {{$volanteer->volanteer_degree == $volanteer->volanteer_degree  ? 'selected' : ''}}>{{ $volanteer->volanteer_degree}}</option>

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


                                                      <!--begin::Group-->
                                                      <div class="row">
                                                        <div class="col-xl-6">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-lg-4"
                                                                    style="font-size: 1.3rem">التخصص <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="col-lg-8">
                                                                    <div class="input-group">
                                                                        <div class="input-group-append"><span
                                                                                class="input-group-text"><i
                                                                                    class="la la-calendar"></i></span>
                                                                        </div>
                                                                        <input type="text"
                                                                            class="form-control form-control-lg "
                                                                            value="{{$volanteer->volanteer_major}}"
                                                                            name="volanteer_major"
                                                                            id="volanteer_major" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
    
                                                        <div class="col-xl-6">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-lg-4"
                                                                    style="font-size: 1.3rem">سنة التخرج
                                                                    <span class="text-danger">*</span></label>
                                                                <div class="col-lg-8">
                                                                    <div class="input-group ">
                                                                        <div class="input-group-prepend"><span
                                                                                class="input-group-text"><i
                                                                                    class="la la-map-marked-alt"></i></span>
                                                                        </div>
                                                                        <input type="text"
                                                                        class="form-control form-control-lg "
                                                                        value="{{$volanteer->volanteer_graduation}}"
                                                                        name="volanteer_graduation"
                                                                        id="volanteer_graduation" />
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
                                                <h5 class="text-dark font-weight-bold mb-10 mt-5">بيانات المتدرب/المتطوع الأساسية
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
                                                                        name="volanteer_type" id="volanteer_type">
                                                                        <option value="">اختر</option>
                                                                        <option value="{{ $volanteer1->volanteer_type  }}" {{$volanteer1->volanteer_type == $volanteer1->volanteer_type  ? 'selected' : ''}}>{{ $volanteer1->volanteer_type}}</option>

                                                                        <option value="تدريب">تدريب
                                                                        </option>
                                                                        <option value="تطوع"> تطوع </option>
                                                             
                                                                    </select>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.2rem">مدته
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-calendar"></i></span>
                                                                    </div>
                                                                    <input type="number"
                                                                        class="form-control form-control-lg"
                                                                        name="volanteer_duration" id="volanteer_duration"
                                                                        value="{{$volanteer1->volanteer_duration}}" />
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
                                                                        value="{{$volanteer1->circle}}"/>
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
                                                                        value="{{$volanteer1->section}}" name="section"
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
                                                                        value="{{$volanteer1->division}}" name="division"
                                                                        id="division" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">مجال التطوع/التدريب
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-map-marked-alt"></i></span>
                                                                    </div>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg "
                                                                        value="{{$volanteer1->named}}" name="named"
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
                                                                style="font-size: 1.3rem">تاريخ البدأ
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-map-marked-alt"></i></span>
                                                                    </div>
                                                                    <input type="date"
                                                                        class="form-control form-control-lg"
                                                                        name="volanteer_start_date" id="volanteer_start_date"
                                                                        value="{{$volanteer1->volanteer_start_date}}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">تاريخ الانتهاء
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"><i
                                                                                class="la la-map-marked-alt"></i></span>
                                                                    </div>
                                                                    <input type="date"
                                                                        class="form-control form-control-lg "
                                                                        name="volanteer_end_date"
                                                                        id="volanteer_end_date" 
                                                                        value="{{$volanteer1->volanteer_end_date}}"/>
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
                                                            style="font-size: 1.3rem">المرفقات  <span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-lg-8">
                                                            <div class="input-group">
                                                                <div class="input-group-append"><span
                                                                        class="input-group-text"> <i
                                                                            class="la la-calendar"> </i></span>
                                                                </div>
                                                                <input type="file"
                                                                    class="form-control form-control-lg"
                                                                    name="file"
                                                                    id="file"
                                                                    value="{{$volanteer1->file}}" />
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
<script src="{{asset('assets/js/pages/custom/wizard/wizard-1_volanteer.js')}}"></script>
<script src="{{asset('assets/js/pages/crud/forms/widgets/form-repeater.js')}}"></script>

<!--end::Page Scripts-->



@endsection