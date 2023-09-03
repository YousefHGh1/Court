@extends('layout.master')

@section('title')
اضافة إجازة طارئة
@endsection

@section('page_title')
لوحة التحكم
@endsection

@section('sub_main')
الإجازات
@endsection

@section('sub_title')
اضافة إجازة طارئة
@endsection

@section('css')
<style>
    .form-control {
        border: 1px solid #63c6ff;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label"> الإجازات <i class="mr-2"></i></h3>
                    </div>
                    <div class="card-toolbar">

                        <a href="{{ url('/holiday/emergency') }}" class="btn btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <circle fill="#000000" cx="9" cy="13" r="6" />
                                        <path
                                            d="M8.8012943,7.00241933 C9.83837773,3.20768121 11.7781343,4 14,4 C17.3137083,4 20,6.6862913 20,10 C20,12.2218437 18.7923188,14.1616223 16.9973803,13.1987037 C16.9991904,13.1326638 17,13.0664274 17,13 C17,10.381722 13.418278,7 9,7 C8.93337236,7 8.86733422,7.00080962 8.8012943,7.00241933 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>عرض الإجازات</a>
                    </div>
                </div>
                <!--begin::Form-->
                <form action="{{ route('emergency.store') }}" method="post" class="form needs-validation " novalidate
                    enctype="multipart/form-data" id="kt_form">
                    @csrf
                    {!! csrf_field() !!}

                    <div class="row justify-content-center">
                        <div class="col-xl-11">
                            <!--begin::Wizard Step 1-->
                            <div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
                                <h3 class="text-dark font-weight-bold mb-10">بيانات الاجازة الطارئة</h3>

                                <!--begin::Group-->
                                {{-- <div class="form-group row ">
                                    <label class="col-form-label col-lg-2" style="font-size: 1.3rem">نوع الإجازة <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i
                                                        class="la la-laugh"></i></span></div>
                                            <select class="form-control" id="holiday_type" name="holiday_type">
                                                <option value="إجازة طارئة">إجازة طارئة </option>
                                                <option value="إجازة مرضية">إجازة مرضية </option>
                                                <option value="إجازة خارجية">إجازة خارجية </option>
                                                <option value="إجازةعادية"> إجازةعادية </option>
                                            </select>
                                        </div>
                                    </div>
                                </div> --}}
                                <!--end::Group-->

                        

                                <!--begin::Group-->
                                <div class="row">
                                    
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-4" style="font-size: 1.3rem">اسم الموظف
                                                <span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="la la-user"></i></span></div>
                                                    <select class="form-control selectpicker" data-size="7"
                                                        tabindex="null" data-live-search="true" title="أدخل الموظف"
                                                        name="employee_id" id="employee_id">
                                                        @foreach ($employee as $employees)
                                                            <option value="{{ $employees->id }}"
                                                                data-employee-num="{{ $employees->employee_num }}">
                                                                {{ $employees->employee_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                    
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-4" style="font-size: 1.2rem">الرقم
                                                الوظيفي
                                                <span class="text-danger">*</span></label>

                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="la la-users"></i></span></div>
                                                    <input type="text" id="employee_num" class="form-control"
                                                        readonly>
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
                                            <label class="col-form-label col-lg-4" style="font-size: 1.3rem">مكان
                                                الإجازة
                                                <span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="la la-map-marker"></i></span></div>
                                                    <input type="text" class="form-control" name="holiday_place"
                                                        id="holiday_place" placeholder="أدخل مكان الاجازة" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-4" style="font-size: 1.2rem">عنوان قضاء
                                                الإجازة
                                                <span class="text-danger">*</span></label>

                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="la la-map-marker"></i></span></div>
                                                    <input type="text" class="form-control" name="holiday_address"
                                                        id="holiday_address" placeholder="أدخل عنوان قضاء الاجازة" />
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
                                            <label class="col-form-label col-lg-4" style="font-size: 1.2rem">
                                                من /إلى
                                                <span class="text-danger">*</span></label>

                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="la la-calendar-alt"></i></span></div>
                                                    <div class="col-4 p-0">
                                                        <input name="start_date" type="date" class="form-control"
                                                            id="start_date" />
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i
                                                                class="la la-ellipsis-h"></i></span>
                                                    </div>
                                                    <div class="col-5 p-0">
                                                        <input name="end_date" type="date" class="form-control"
                                                            id="end_date" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-4" style="font-size: 1.2rem">الموظف البديل 
                                                <span class="text-danger">*</span></label>

                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="la la-calendar-alt"></i></span></div>
                                                    <input type="text" class="form-control" name="sub_employee"
                                                        id="sub_employee" placeholder="أدخل اسم الموظف البديل" />

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
                                            <label class="col-form-label col-lg-4" style="font-size: 1.3rem">ملاحظة
                                                <span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="la la-sticky-note"></i></span></div>
                                                    <input type="text" class="form-control" name="note" id="note"
                                                        placeholder="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-4" style="font-size: 1.2rem">المرفق
                                                <span class="text-danger">*</span></label>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="la la-chain"></i></span></div>
                                                    <input type="file" class="form-control" name="file" id="file"
                                                        placeholder="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Group-->

                                <!--begin::Group-->
                                <div class="row">
            
                                    <div class="col-xl-4">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-5" style="font-size: 1.3rem">رصيد
                                                الإجازة
                                            </label>
                                            <div class="col-lg-7">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="la la-sort"></i></span></div>
                                                    <input type="text" class="form-control " name="holiday_balance"
                                                        id="holiday_balance" placeholder="" />

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-5" style="font-size: 1.2rem">الرصيد
                                                المستنفذ
                                            </label>

                                            <div class="col-lg-7">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="la la-sort-amount-down"></i></span></div>
                                                    <input type="text" class="form-control" name="spent_balance"
                                                        id="spent_balance" placeholder="" />

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-5" style="font-size: 1.2rem">الرصيد
                                                المتبقي
                                            </label>

                                            <div class="col-lg-7">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="la la-sort-amount-up"></i></span></div>
                                                    <input type="text" class="form-control" name="remaining_balance"
                                                        id="remaining_balance" placeholder="" />

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Group-->

                            </div>
                            <!--end::Wizard Step 1-->
                        </div>

                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-6"></div>
                            <div class="col-lg-6">
                                <button type="submit" class="mr-2 btn btn-success">حفظ</button>
                                <button type="reset" class="mr-2 btn btn-danger">إلغاء</button>

                            </div>

                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card-->

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('assets/js/pages/crud/forms/widgets/form-repeater.js')}}"></script>


<script>
    $(document).ready(function() {
        $('#employee_id').change(function() {
            var selectedEmployeeNum = $(this).find(':selected').data('employee-num');
            $('#employee_num').val(selectedEmployeeNum);
        });
    });
</script>


@endsection