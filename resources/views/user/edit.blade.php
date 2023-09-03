@extends('layouts.admin')
@section('title')
    اضافة عضو بلدية
@endsection
@section('sub-header')
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">لوحة التحكم</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="#" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">الرئيسية</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">اعضاء المجلس البدي</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text"> تعديل بيانات عضو مجلس بلدي</span>
                        </a>
                    </li>

                </ul>
            </div>
            <div>
                <div class=" order-j1 order-xl-2 m--align-right">
                    <button type="submit" class="btn m-btn--pill btn-success" id="update-municipal-member">
                            <span>
                                <i class="la la-plus"></i>
                                <span>تعديل</span>
                            </span>
                    </button>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    @include('admin.includes.error')

    <ul id="errors"></ul>


    <div class="m-portlet m-portlet--bordered m-portlet--unair">
        <form class="m-portlet__body" action="{{route('admin.municipalMember.update',@$getMunicipalMember->id)}}" id="update-municipal-members" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Portlet-->
                    <div class="m-portlet m-portlet--bordered m-portlet--unair">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        تعديل بيانات عضو بلدية {{@$getMunicipalMember->name}}</span>
                                    </h3>

                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body">

                            <div class="form-group m-form__group row">
                                <label for="example-text-input"  class="col-2 col-form-label  ">ادخل الاسم </label>
                                <div class="col-10">
                                    <input class="form-control m-input " placeholder="ادخل الاسم" type="text" value="{{ @$getMunicipalMember->name }}" name="name" id="example-text-input">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input"  class="col-2 col-form-label  ">ادخل التخصص الجامعي</label>
                                <div class="col-10">
                                    <input class="form-control m-input " placeholder="ادخل التخصص الجامعي" type="text" value="{{  @$getMunicipalMember->certification }}" name="certification" id="example-text-input">

                                </div>
                            </div>
                            <hr>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input"  class="col-2 col-form-label  ">ادخل المنصب الوظيفي</label>
                                <div class="col-10">
                                    <select class="form-control m-select2" id="m_select2_5" name="category_member_id">

                                    @foreach(@$category_members as $category_member)

                                            <option value="{{@$category_member->id}}" {{ $getMunicipalMember->category_member_id == $category_member->id ? 'selected' : '' }}>{{@$category_member->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input"  class="col-2 col-form-label  ">ادخل لينك فيسبوك</label>
                                <div class="col-10">
                                    <input class="form-control m-input " placeholder="ادخل لينك فيسبوك" type="text"  name="facebook" value="{{  @$getMunicipalMember->facebook }}" id="example-text-input">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input"  class="col-2 col-form-label  ">ادخل لينك تويتر</label>
                                <div class="col-10">
                                    <input class="form-control m-input " placeholder="ادخل لينك تويتر" type="text" value="{{  @$getMunicipalMember->twitter }}" name="twitter" id="example-text-input">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input"  class="col-2 col-form-label  ">ادخل لينك انستجرام</label>
                                <div class="col-10">
                                    <input class="form-control m-input " placeholder="ادخل لينك انستجرام" type="text" value="{{  @$getMunicipalMember->instagram }}"  name="instagram" id="example-text-input">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input"  class="col-2 col-form-label  ">ادخل لينك لينكدإن</label>
                                <div class="col-10">
                                    <input class="form-control m-input " placeholder="ادخل لينك لينكدإن" type="text" value="{{  @$getMunicipalMember->linkedin }}" name="linkedin" id="example-text-input">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label  ">ارفع صورة شخصية</label>
                                <div class="custom-file-upload col-3" style="height: 150px; width: 150px;">
                                    <div class="icon text-center">
                                        <img src="/assets/img/cloud-img.png" alt="">
                                        <img width="100%" height="150" src="{{ asset('storage/municipalMember/' . $getMunicipalMember->image) }}" alt="" class="img">
                                    </div>
                                    <input name="image" accept="image/*" type="file" id="news-img">
                                </div>

                            </div>
                            <hr>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input"  class="col-2 col-form-label  ">{{ 'ادخل كلمة (رؤية) الشخص' }}</label>
                                <div class="col-10">
                                    <textarea name="description" style="height: 400px" class="summernote" id="m_summernote_1">{{$getMunicipalMember->description}}</textarea>
                                </div>
                            </div>


                        </div>



                    </div>
                </div>

            </div>


        </form>
        <!--end::Portlet-->
    </div>
@endsection

@push('scripts')


    <script src="/assets/admin/municipalMember.js" type="text/javascript"></script>

    <script>

        $(document).ready(function () {
            MunicipalMember.init();
        });
    </script>



@endpush
