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
                                <h3 class="wizard-title">المؤهلات العلمية والدورات التدريبية</h3>
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
                                <form action="{{route('educational.store')}}" method="post"
                                    class="form needs-validation" enctype="multipart/form-data" id="kt_form">
                                    @csrf
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12">


                                            <!--begin::Wizard Step 1-->
                                            <div class="" data-wizard-type="step-content">
                                                <h5 class="mb-10 font-weight-bold text-dark">المؤهلات العلمية والدورات
                                                    التدريبية
                                                </h5>

                                                <input type="hidden" name="employee_id" value="{{ $employee->id }}">

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
                                                                        placeholder="المرفق" type="file" name="edu_file"
                                                                        multiple />


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
                                                                        placeholder="الدورات التدريبية"
                                                                        name="training_file" id="training_file" />
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

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
                                                                        placeholder="المؤسسة التعليمية" />
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
                                                            <label for="majors" class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">التخصص <span
                                                                    class="text-danger"></span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text" id="major_span"><i
                                                                                class="la la-calendar"></i></span>
                                                                    </div>
                                                                    <input type="text" name="majors" id="majors"
                                                                        class="form-control form-control-lg "
                                                                        placeholder="التخصص" />
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label for="address_org" class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">مكان الدراسة
                                                                <span class="text-danger"></span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group ">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text" id="address"><i
                                                                                class="la la-map-marked-alt"></i></span>
                                                                    </div>
                                                                    <input type="text" name="address_org"
                                                                        id="address_org"
                                                                        class="form-control form-control-lg "
                                                                        placeholder="مكان الدراسة" />
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label for="graduation" class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">سنة التخرج <span
                                                                    class="text-danger"></span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text" id="year"><i
                                                                                class="la la-calendar"></i></span>
                                                                    </div>
                                                                    <input type="text" name="graduation" id="graduation"
                                                                        class="form-control form-control-lg "
                                                                        placeholder="سنة التخرج" />
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-3">
                                                        <div class="form-group row">
                                                            <label for="rate_num" class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">المعدل <span
                                                                    class="text-danger">%</span></label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text" id="rate_s"><i
                                                                                class="la la-calendar"></i></span>
                                                                    </div>
                                                                    <input type="number" name="rate_num" id="rate_num"
                                                                        class="form-control form-control-lg "
                                                                        placeholder="المعدل" />
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-3">
                                                        <div class="form-group row">
                                                            <label for="rate" class="col-form-label col-lg-4"
                                                                style="font-size: 1.3rem">التقدير </label>
                                                            <div class="col-lg-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text" id="srate"><i
                                                                                class="la la-calendar"></i></span>
                                                                    </div>
                                                                    <select class="form-control form-control-lg"
                                                                        name="rate" id="rate">

                                                                        <option value="">اختر</option>
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
<script src="{{asset('assets/js/pages/custom/wizard/wizard-1_educational.js')}}"></script>
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