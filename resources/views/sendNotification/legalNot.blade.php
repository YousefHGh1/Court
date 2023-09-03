@extends('layout.master')

@section('title')
    إرسال وارد
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    إرسال بريد
@endsection
@section('sub_title')
    الشؤون القانونية
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
                                       وارد الشؤون القانونية</span>
                                    </h3>
                                </div>
                        <form action="{{ route('legalNot.store') }}" method="post" class="needs-validation" novalidate
                                enctype="multipart/form-data">
                              @csrf
                              {!! csrf_field() !!}
                    
                            <div class="card-body">    
                                <div class="form-group row" >
                                    <label for="sender" class="col-2 col-form-label mt-3" ><h5><strong>المرسل</strong></h5> </label>
                                    <div class="col-8">
                                      <input name="sender" type="text" class="@error('sender') is-invalid @enderror form-control mb-4 mt-3" id="sender" value="{{ Auth::user()->name }}"  />
                                    </div>
                                </div>        
                                
                             




                                <div class="form-group row">
                                    <label for="receiver" class="col-2 col-form-label"><h5><strong>المرسل إليه</strong></h5> </label>
                                    <div class="col-8">
                                    <div class="dropdown bootstrap-select form-control dropup">
                                        <select class="form-control selectpicker" data-size="7" for="reciver" name="reciver" id="reciver"
                                                title="اختر المرسل إليه..." tabindex="null" data-live-search="true" >
                                            @foreach ($user as $users)
                                                <option value="{{$users->id}}">{{$users->name}}</option>
                                            @endforeach
                                        </select>
                                    </div> 
                                    </div> 
                                </div>

                               <div class="form-group row" hidden>
                                    <div class="col-8" for="file" name="file" id="file">
                                            @foreach ($legal as $legals)
                                             <option  value="{{$legals->id}}" href="http://127.0.0.1:8000/filelegal/{{ $legals->file }}"  target="_blank">{{ $legals->file }}</option>
                                            @endforeach
                                    </div>
                                </div> 
{{--                                 
                                <div class="form-group row">
                                    <label for="file" class="col-2 col-form-label"><h5><strong>المرفق</strong></h5> </label>
                                   <div class="col-3">
                                      <a href="http://127.0.0.1:8000/filelegal/{{ $legals->file }}"  value="{{$legals->id}}"
                                          target="_blank">{{ $legals->file }}</a>    
                                    </div>
                                </div> --}}

                                <div class="form-group row">
                                    <label for="file" class="col-2 col-form-label"><h5><strong>لتغيير المرفق</strong></h5> </label>
                                    <div class="col-3">
                                        <input name="file" type="file" class="@error('file') is-invalid @enderror form-control" id="file" value="{{ $legals->file }}" /> 
                                  </div>
                                </div>

                               
                               
                                
                                        

                                <div class="form-group row">
                                    <label for="description" class="col-2 col-form-label"><h5><strong>الموضوع</strong></h5> </label>
                                    <div class="col-8">
                                        <textarea name="description"  class="summernote " id="m_summernote_1"></textarea>
                                    </div>
                                </div>  
                              </div>
                         
                               <div class="card-footer">
                                  <div class="row">
                                      <div class="col-3">                  
                                      </div>
                                      <div class="col-9">
                                        <button type="submit" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill mr-2">إرسال</button>
                                        <button type="reset" class="btn btn-danger m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill mr-2">الغاء</button>                    
                                          <a href="http://127.0.0.1:8000/legal" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                                              <span>
                                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-binoculars-fill" viewBox="0 0 16 16">
                                                  <path d="M4.5 1A1.5 1.5 0 0 0 3 2.5V3h4v-.5A1.5 1.5 0 0 0 5.5 1h-1zM7 4v1h2V4h4v.882a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V13H9v-1.5a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5V13H1V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V4h4zM1 14v.5A1.5 1.5 0 0 0 2.5 16h3A1.5 1.5 0 0 0 7 14.5V14H1zm8 0v.5a1.5 1.5 0 0 0 1.5 1.5h3a1.5 1.5 0 0 0 1.5-1.5V14H9zm4-11H9v-.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5V3z"/>
                                                </svg>
                                              <span> عرض الوارد </span>
                                              </span>
                                          </a>                    
                                      </div>
                                  </div>
                              </div>
                            </div>

                        </form>
                    </div>
                </div>  
            </div> 
        <!--end::Portlet-->
    </div>
@endsection