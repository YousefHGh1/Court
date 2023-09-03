@extends('layout.master')

@section('title')
تعديل إجازة عادية
@endsection

@section('page_title')
لوحة التحكم
@endsection

@section('sub_main')
الإجازات العادية
@endsection

@section('sub_title')
تعديل إجازة عادية
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
                        <h3 class="card-label"> تعديل الإجازات العادية<i class="mr-2"></i></h3>
                    </div>
                </div>
                <!--begin::Form-->
                <form action="{{ route('normal.update',$holiday->id) }}" method="post" class="form needs-validation " novalidate
                    enctype="multipart/form-data" id="kt_form">
                    @csrf
                    {!! csrf_field() !!}
                    @method('PUT')

                    <div class="row justify-content-center">
                        <div class="col-xl-11">
                            <!--begin::Wizard Step 1-->
                            <div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
                                <h3 class="text-dark font-weight-bold mb-10">بيانات الاجازة العادية</h3>

                   
{{-- 
                                <div class="form-group row p-3">
                                    <label for="sender" class="col-lg-2 col-form-label "><h6><strong>الجهة الوارد منها:</strong></h6></label>
                                    <div class="dropdown bootstrap-select form-control dropup col-lg-9" >
                                        <select class="form-control selectpicker" name="import_id" required id="import_id">
                                            <option value="option_select" disabled selected>الجهات الموردة</option>
                                            @foreach($import as $imports)
                                            <option value="{{ $imports->id }}" {{$computer->import_id == $imports->id  ? 'selected' : ''}}>{{ $imports->import_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                
                                <!--begin::Group-->
                                <div class="form-group row ">
                                    <label class="col-form-label col-lg-2" style="font-size: 1.3rem">سبب القيام بالإجازة
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i
                                                        class="la la-laugh"></i></span></div>
                                            <select class="form-control" id="holiday_reason" name="holiday_reason">
                                                <option value="{{ $holiday->holiday_reason  }}" {{$holiday->holiday_reason == $holiday->holiday_reason  ? 'selected' : ''}}>{{ $holiday->holiday_reason}}</option>
                                                <option value="علاج">علاج </option>
                                                <option value="دراسة">دراسة </option>
                                                <option value="بدون راتب">بدون راتب </option>
                                                <option value="حج"> حج </option>
                                                <option value="عمرة"> عمرة </option>
                                                <option value="أخرى"> أخرى </option>
                                                <option value="بدل أمومة"> بدل أمومة </option>
                                                <option value="خاص"> خاص </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
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
                                                    <input type="text" class="form-control " name="employee_id"
                                                        id="employee_id" value="{{ $holiday->employee_id }}" />
                                            
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-4" style="font-size: 1.2rem">رقم الموظف
                                                <span class="text-danger">*</span></label>

                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="la la-users"></i></span></div>
                                                    <input type="number" class="form-control" name="employee_num"
                                                        id="employee_num" value="{{ $holiday->employee_num }}" />
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
                                                        id="holiday_place" value="{{ $holiday->holiday_place }}"  />
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
                                                        id="holiday_address" value="{{ $holiday->holiday_address }}" />
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
                                                            id="start_date" value="{{ $holiday->start_date }}" />
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i
                                                                class="la la-ellipsis-h"></i></span>
                                                    </div>
                                                    <div class="col-5 p-0">
                                                        <input name="end_date" type="date" class="form-control"
                                                            id="end_date"  value="{{ $holiday->end_date }}"/>
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
                                                        id="sub_employee" value="{{ $holiday->sub_employee }}" />

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
                                                    value="{{ $holiday->note }}" />
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
                                                    value="{{ $holiday->file }}"/>
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
                                                        id="holiday_balance" value="{{ $holiday->holiday_balance }}" />

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
                                                        id="spent_balance" value="{{ $holiday->spent_balance }}" />
                                                        
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
                                                        id="remaining_balance" value="{{ $holiday->remaining_balance }}" />

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

@endsection