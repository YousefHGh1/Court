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

    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-body p-0">
            <!--begin::Wizard-->
            <div class="wizard wizard-1" id="kt_wizard" data-wizard-state="first" data-wizard-clickable="false">
                <!--begin::Wizard Nav-->
                <div class="wizard-nav border-bottom">
                    <div class="wizard-steps p-8 p-lg-10">

                        <!--begin::Wizard Step 3 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                            <div class="wizard-label">
                                <i class="wizard-icon flaticon2-open-text-book"></i>
                                <h3 class="wizard-title"><strong>بيانات الأبناء</strong></h3>
                            </div>

                        </div>
                        <!--end::Wizard Step 3 Nav-->
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

                                <form action="{{route('son.store')}}" method="post" class="form needs-validation"
                                    enctype="multipart/form-data" id="kt_form">
                                    @csrf
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12">

                                            <!--begin::Wizard Step 1-->
                                            <div class="" data-wizard-type="step-content">
                                                <h5 class="mb-10 font-weight-bold text-dark">بيانات الأبناء</h5>

                                                <input type="hidden" name="employee_id" value="{{ $employee->id }}">

                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">رقم الهوية <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i
                                                                                class="la la-calendar"></i></span>
                                                                    </div>
                                                                    <input type="number"
                                                                        class="form-control form-control-lg"
                                                                        placeholder="رقم الهوية" name="id_son"
                                                                        id="id_son" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">اسم الابن/ة <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i
                                                                                class="la la-map-marked-alt"></i></span>
                                                                    </div>
                                                                    <input type="text"
                                                                        class="form-control form-control-lg"
                                                                        placeholder="اسم الابن/ة" name="son_name"
                                                                        id="son_name" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">الحالة الاجتماعية <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i
                                                                                class="la la-calendar"></i></span>
                                                                    </div>
                                                                    <select class="form-control form-control-lg"
                                                                        name="son_satuts" id="son_satuts">
                                                                        <option value="">اختر</option>
                                                                        <option value="أعزب/عزباء">أعزب/عزباء</option>
                                                                        <option value="متزوج/ة">متزوج/ة</option>
                                                                        <option value="مطلق/ة">مطلق/ة</option>
                                                                        <option value="أرمل/ة"> أرمل/ة</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-4 col-form-label"
                                                                style="font-size: 1.3rem">الجنس <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-8 col-form-label">
                                                                <div class="radio-inline">
                                                                    <label class="radio radio-primary pr-5 pl-5"
                                                                        style="font-size: 1.3rem">
                                                                        <input type="radio" name="son_gender"
                                                                            value="ذكر" id="son_gender_male" />
                                                                        <span></span>
                                                                        ذكر
                                                                    </label>
                                                                    <label class="radio radio-primary"
                                                                        style="font-size: 1.3rem">
                                                                        <input type="radio" name="son_gender"
                                                                            value="أنثى" id="son_gender_female" />
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
                                                                style="font-size: 1.3rem"> شهادة الميلاد <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i
                                                                                class="la la-map-marked-alt"></i></span>
                                                                    </div>
                                                                    <input type="file"
                                                                        class="form-control form-control-lg"
                                                                        placeholder="شهادة الميلاد" name="son_file"
                                                                        id="son_file" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">تاريخ الميلاد <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i
                                                                                class="la la-calendar"></i></span>
                                                                    </div>
                                                                    <input type="date"
                                                                        class="form-control form-control-lg"
                                                                        placeholder="تاريخ الميلاد" name="son_birth"
                                                                        id="son_birth" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-4 col-form-label"
                                                                style="font-size: 1.3rem">هل يعمل الابن <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-8 col-form-label">
                                                                <div class="radio-inline">
                                                                    <label class="radio radio-primary pr-5 pl-5"
                                                                        style="font-size: 1.3rem">
                                                                        <input type="radio" name="son_job" value="نعم"
                                                                            id="son_job_yes" />
                                                                        <span></span>
                                                                        نعم
                                                                    </label>
                                                                    <label class="radio radio-primary"
                                                                        style="font-size: 1.3rem">
                                                                        <input type="radio" name="son_job" value="لا"
                                                                            id="son_job_no" />
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
                                                                style="font-size: 1.3rem">جامعي <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="col-8 col-form-label">
                                                                <div class="radio-inline">
                                                                    <label class="radio radio-primary pr-5 pl-5"
                                                                        style="font-size: 1.3rem">
                                                                        <input type="radio" name="son_unv" value="نعم"
                                                                            id="son_unv_yes" />
                                                                        <span></span>
                                                                        نعم
                                                                    </label>
                                                                    <label class="radio radio-primary"
                                                                        style="font-size: 1.3rem">
                                                                        <input type="radio" name="son_unv" value="لا"
                                                                            id="son_unv_no" />
                                                                        <span></span>
                                                                        لا
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="son_unv_fields" style="display: none;">
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
                                                                            placeholder="الجامعة" name="son_unv_name"
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
                                                                            placeholder="التخصص" name="son_major"
                                                                            id="son_major" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <div class="form-group row">
                                                                <label class="col-form-label col-lg-4"
                                                                    style="font-size: 1.3rem">بداية الدراسة <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="col-lg-8">
                                                                    <div class="input-group">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i
                                                                                    class="la la-calendar"></i></span>
                                                                        </div>
                                                                        <input type="date"
                                                                            class="form-control form-control-lg"
                                                                            placeholder="بداية الدراسة"
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
                                                                            placeholder="شهادة القيد"
                                                                            name="son_unv_file" id="son_unv_file" />
                                                                    </div>
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
<script src="{{asset('assets/js/pages/custom/wizard/wizard-1_son.js')}}"></script>
<script src="{{asset('assets/js/pages/crud/forms/widgets/form-repeater.js')}}"></script>
<!--end::Page Scripts-->


<script>
    // استدعاء الدالة عند تحميل الصفحة
    window.onload = function() {
        // العثور على عنصر الاختيار بواسطة الاسم (son_unv)
        var sonUnvRadio = document.getElementsByName('son_unv');

        // تعيين حدث التغيير لعنصر الاختيار
        for (var i = 0; i < sonUnvRadio.length; i++) {
            sonUnvRadio[i].addEventListener('change', function() {
                // عند تغيير الاختيار، التحقق من قيمة الاختيار المختارة
                if (this.value === 'نعم') {
                    // إظهار الحقول المرتبطة بكونه جامعي
                    document.getElementById('son_unv_fields').style.display = 'block';
                } else {
                    // إخفاء الحقول المرتبطة بعدم كونه جامعي
                    document.getElementById('son_unv_fields').style.display = 'none';
                }
            });
        }
    };
</script>




@endsection