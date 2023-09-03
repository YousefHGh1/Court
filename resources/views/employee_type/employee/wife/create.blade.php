@extends('layout.master')

@section('title')
اضافة بيانات الموظف - الزوج/ة
@endsection

@section('page_title')
لوحة التحكم
@endsection

@section('sub_main')
بيانات الموظف
@endsection

@section('sub_title')
اضافة بيانات الموظف - الزوج/ة
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
                                <i class="wizard-icon flaticon2-open-text-book"></i>
                                <h3 class="wizard-title"><strong>بيانات الزوج/ة</strong></h3>
                            </div>

                        </div>
                        <!--end::Wizard Step 1 Nav-->

                        <!--begin::Wizard Step 2 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                            <div class="wizard-label">
                                <i class="wizard-icon flaticon2-check-mark"></i>
                                <h3 class="wizard-title">تأكيد المعلومات</h3>
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

                                <form action="{{route('wife.store')}}" method="post" class="form needs-validation"
                                    enctype="multipart/form-data" id="kt_form">
                                    @csrf
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12">

                                            <!--begin::Wizard Step 1-->
                                            <div class="" data-wizard-type="step-content">
                                                <h5 class="mb-10 font-weight-bold text-dark">بيانات الزوج/ة
                                                </h5>


                                                <input type="hidden" name="employee_id" value="{{ $employee->id }}">



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
                                                                        placeholder="اسم الزوج/ة" />
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
                                                                        placeholder="رقم الهوية" />
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
                                                                        placeholder="تاريخ ميلادالزوج/ة" />
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
                                                                        name="date_marriage" id="date_marriage"
                                                                        placeholder="تاريخ الزواج" />
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
                                                                    {{-- <input type="file"
                                                                        class="form-control form-control-lg "
                                                                        name="wife_file" id="wife_file"
                                                                        placeholder="عقد الزواج" /> --}}
                                                                    <input type="file"
                                                                        class="form-control form-control-lg "
                                                                        name="wife_file" id="wife_file" multiple>

                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-4">
                                                        <div class="form-group row">
                                                            <label class="col-5 col-form-label"
                                                                style="font-size: 1.3rem">هل يعمل الزوج/ة
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-7 col-form-label">
                                                                <div class="radio-inline">
                                                                    <label class="radio radio-primary pr-5 pl-5"
                                                                        style="font-size: 1.3rem">
                                                                        <input type="radio" name="wife_job"
                                                                            id="wife_job" value="نعم" />
                                                                        <span></span>
                                                                        نعم
                                                                    </label>
                                                                    <label class="radio radio-primary"
                                                                        style="font-size: 1.3rem">
                                                                        <input type="radio" name="wife_job"
                                                                            id="wife_job" value="لا" />
                                                                        <span></span>
                                                                        لا
                                                                    </label>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 1-->

                                            <!--begin::Wizard Step 2-->
                                            <div class="" data-wizard-type="step-content">
                                                <h5 class="text-dark font-weight-bold mb-10 mt-5">
                                                    تـــأكيـــــــــــــــــــد
                                                    البيـــــــــــــــــــانــــــــــــــــــــــات
                                                </h5>
                                            </div>
                                            <!--end::Wizard Step 2-->


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
<script src="{{asset('assets/js/pages/custom/wizard/wizard-1_wife.js')}}"></script>
<script src="{{asset('assets/js/pages/crud/forms/widgets/form-repeater.js')}}"></script>
<!--end::Page Scripts-->
@endsection