@extends('layout.master')
@section('title')
    اضافة مستخدم
@endsection
@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    المستخدمين
@endsection
@section('sub_title')
    صفحة الإضافة
@endsection
@section('css')
<style>
    .form-label:focus {
        border-color: #df10e667;
        box-shadow: 0 0 0 0.2rem rgba(7, 125, 221, 0.25);
    }
</style>
@endsection

@section('content')
<div class="m-content">
    @include('layout.error')

        <div class="row">
            <div class="col-lg-12">
                    <!--begin::Portlet-->

                <div class="card card-custom gutter-b example example-compact ">
                            <div class="card-header">
                                    <h3 class="m-portlet__head-text">
                                        اضافة مستخدم</span>
                                    </h3>
                            </div>

                    <form action="/" method="GET" class="needs-validation" novalidate
                                enctype="multipart/form-data">
                              @csrf
                              {!! csrf_field() !!}
                        <div class="card-body">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-2 col-form-label mt-3"> الاسم </label>
                                    <div class="col-8">
                                        <input class="form-control m-input " placeholder="ادخل الاسم" type="text" value="{{ old('name') }}" name="name" id="example-text-input">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input"  class="col-2 col-form-label mt-3 ">رقم المستخدم </label>
                                    <div class="col-8">
                                        <input class="form-control m-input " placeholder="ادخل رقم المستخدم" type="number" value="{{ old('number') }}" name="number" id="number">
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                        <label for="example-text-input"  class="col-2 col-form-label mt-3 "> رقم الهوية</label>
                                        <div class="col-8">
                                            <input class="form-control m-input " placeholder="ادخل رقم الهوية" type="number" value="{{ old('indo') }}" name="indo" id="indo">
                                        </div>
                                    </div>

                                <div class="form-group m-form__group row">
                                        <label for="example-text-input"  class="col-2 col-form-label  mt-3"> القسم</label>
                                        <div class="col-8">
                                            <input class="form-control m-input " placeholder="ادخل القسم" type="text" value="{{ old('section') }}" name="section" id="section">
                                        </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label for="example-text-input"  class="col-2 col-form-label  mt-3"> الإيميل</label>
                                    <div class="col-8">
                                        <input class="form-control m-input " placeholder="ادخل الإيميل" type="email" value="{{ old('email') }}" name="email" id="email">
                                    </div>
                                </div>


                            <div class="form-group m-form__group row">
                                <label for="example-text-input"  class="col-2 col-form-label  mt-3"> كلمة المرور</label>
                                <div class="col-8">
                                    <input class="form-control m-input " placeholder="ادخل كلمة المرور" type="text" value="{{ old('password') }}" name="password" id="password">
                                </div>
                            </div>
                        </div>
                            <hr>
                            {{-- <hr> --}}
                            {{-- <div class="form-group m-form__group row">
                                <label for="example-text-input"  class="col-2 col-form-label  ">{{ ' بيانات اخرى ' }}</label>
                                <div class="col-10">
                                <textarea name="description" style="height: 400px" class="summernote" id="description"></textarea>
                                </div>
                            </div> --}}
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-3">
                                    </div>
                                    <div class="col-9">
                                        <button type="submit" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill mr-2">حفظ</button>
                                        <button type="reset" class="btn btn-danger m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill mr-2">الغاء</button>
                                        {{-- <a type="submit" herf="{{ route('diesel.create') }}" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill mr-2">حفظ و إنشاء جديد</a> --}}
                                        <a href="http://127.0.0.1:8000/diesel" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                                            <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-binoculars-fill" viewBox="0 0 16 16">
                                                <path d="M4.5 1A1.5 1.5 0 0 0 3 2.5V3h4v-.5A1.5 1.5 0 0 0 5.5 1h-1zM7 4v1h2V4h4v.882a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V13H9v-1.5a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5V13H1V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V4h4zM1 14v.5A1.5 1.5 0 0 0 2.5 16h3A1.5 1.5 0 0 0 7 14.5V14H1zm8 0v.5a1.5 1.5 0 0 0 1.5 1.5h3a1.5 1.5 0 0 0 1.5-1.5V14H9zm4-11H9v-.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5V3z"/>
                                              </svg>
                                            <span> عرض المستخدمون </span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                    </form>

                </div>

            </div>
    </div>

</div>
@endsection


