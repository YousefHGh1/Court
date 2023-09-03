{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    @if (session()->has('alert.success'))
        <div class="alert alert-success">
            {{ session('alert.success') }}
        </div>
    @endif
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    أرشيف الإخطارات
                    {{--<span class="d-block text-muted pt-2 font-size-sm">Set column width individually</span>--}}
                </h3>
            </div>

        </div>

        <div class="card-body" style="padding-top: 5px!important;">
            <div class="accordion accordion-light  accordion-toggle-arrow" id="accordionExample5">
                <div class="card">
                    <div class="card-header" style="cursor: auto" id="headingOne5">
                        <div class="card-title">
                            <div  data-toggle="collapse" data-target="#collapseOne5" class="btn btn-primary advance_search font-weight-bolder"><i class="flaticon-search"></i> بحــــــث متــقـــــــــدم</div>
                        </div>
                    </div>
                    <div id="collapseOne5" class="collapse" data-parent="#accordionExample5">
                        <div class="card-body">
                            <form class="kt-form kt-form--fit mb-0">


                                <div class="row mb-0 search_input">
                                    <div class="col-lg-2 mb-6">
                                        <label>السنة:</label>
                                        <div>
                                            <select class="form-control select2" id="year" name="year">
                                                <option value=""></option>
                                                @for ($x = 2021; $x >= 2000; $x--)
                                                    <option value="{{$x}}">{{$x}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 mb-6">
                                        <label>رقم الإخطار:</label>
                                        <div>
                                            <input type="number" class="form-control datatable-input" name="name_summoner" id="name_summoner" placeholder="رقم الإخطار" data-col-index="5"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 mb-6">
                                        <label>اسم صاحب الإخطار:</label>
                                        <div>
                                            <input type="text" class="form-control datatable-input" name="name_defendant" id="name_defendant" placeholder="اكتب جزء من اسم صاحب الإخطار" data-col-index="5"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 mb-6">
                                        <label>الاسم الأول:</label>
                                        <div>
                                            <input type="text" class="form-control datatable-input" name="idno_defendant" id="idno_defendant" placeholder="الاسم الأول" data-col-index="5"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 mb-6">
                                        <label>الاسم الثاني:</label>
                                        <div>
                                            <input type="text" class="form-control datatable-input" name="voucher" id="voucher" placeholder="الاسم الثاني" data-col-index="5"/>
                                        </div>
                                    </div>
                                    {{--<div class="col-lg-2 mb-6">--}}
                                    {{--<label>الاسم الثالث:</label>--}}
                                    {{--<div>--}}
                                    {{--<input type="text" class="form-control datatable-input" name="widget" id="widget" placeholder="الاسم الثالث" data-col-index="5"/>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="col-lg-2 mb-6">
                                        <label>اسم العائلة:</label>
                                        <div>
                                            <input type="text" class="form-control datatable-input" name="jebaia_no" id="jebaia_no" placeholder="الاسم الرابع" data-col-index="5"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 mb-6">
                                        <label>رقم الهوية:</label>
                                        <div>
                                            <input type="number" class="form-control datatable-input" name="idno_summoner" id="idno_summoner" placeholder="رقم هوية صاحب الإخطار" data-col-index="5"/>
                                        </div>
                                    </div>
                                    {{--<div class="col-lg-2 mb-6">--}}
                                    {{--<label>نوع السوق:</label>--}}
                                    {{--<div>--}}
                                    {{--<select class="form-control select2" id="license_file" name="license_file">--}}
                                    {{--<option value=""></option>--}}
                                    {{--@foreach(\App\NoticeReason::all() as $item)--}}
                                    {{--<option value="{{$item->id}}">{{$item->name}}</option>--}}
                                    {{--@endforeach--}}
                                    {{--</select>--}}
                                    {{--<input type="text" class="form-control datatable-input" name="license_file" id="license_file" placeholder="ملف الترخيص" data-col-index="5"/>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="col-lg-4 mb-6">
                                        <label>التاريخ:</label>
                                        <div class="input-daterange input-group" id="kt_datepicker">
                                            <input type="text" class="form-control datatable-input" name="from_date" id="from_date" placeholder="من" data-col-index="5"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                                            </div>
                                            <input type="text" class="form-control datatable-input" name="to_date" id="to_date" placeholder="إلى" data-col-index="5"/>
                                        </div>
                                    </div>


                                    <div class="col-lg-4 mt-auto mb-auto">
                                        <button type="button" class="btn btn-primary btn-primary--icon" name="filter" id="filter" {{--id="kt_search"--}}>
						<span>
							<i class="la la-search"></i>
							<span>ابحث</span>
						</span>
                                        </button>
                                        &nbsp;&nbsp;
                                        <button type="button" class="btn btn-secondary btn-secondary--icon" name="refresh" id="refresh" {{--id="kt_reset"--}}>
						<span>
							<i class="la la-close"></i>
							<span>إعادة تعيين</span>
						</span>
                                        </button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!--begin: Search Form-->
            <!--begin::Search Form-->



            <!--end::Search Form-->
            <!--end: Search Form-->

            <!--begin: Datatable-->
        {{--<div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>--}}
        <!--end: Datatable-->

            <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                <thead>
                <tr>
                    {{--<th>الرقم</th>--}}
                    <th>السنة</th>
                    <th>رقم الإخطار</th>
                    <th>صاحب الإخطار</th>
                    <th>رقم الهوية</th>
                    <th>المبلغ المحكوم</th>
                    <th>تاريخ الإخطار</th>
                    {{--                    @if(Auth::user()->hasPermission('notice.update') || Auth::user()->hasPermission('notice.delete') || Auth::user()->hasPermission('super_admin'))--}}
                    <th>الإجراءات</th>
                    {{--@endif--}}

                </tr>
                </thead>


            </table>
        </div>
    </div>

@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('assets/css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <style>
        .dt-button-collection .dropdown-menu{
            position: relative;
        }
        /*tr td:nth-child(5){*/
        /*direction: ltr;*/
        /*}*/
        .dir_ltr{
            direction: ltr !important;
        }
        tr{
            cursor: pointer;
        }
    </style>
@endsection

{{-- Scripts Section --}}
@section('scripts')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
        var csrf = "{{csrf_token()}}";
        var DATA_URL = "{{ route('notices.data.archive') }}";
        var SITEURL = '{{URL::to('')}}';
        var from_date = -1;
        var to_date = -1;
        var voucher = -1;
        var widget = -1;
        var name_summoner = -1;
        var idno_summoner = -1;
        var name_defendant = -1;
        var idno_defendant = -1;
        var jebaia_no = -1;
        var license_file = -1;
        var year = -1;
                {{--var user_action = '{{Auth::user()->hasPermission('notice.update') || Auth::user()->hasPermission('notice.delete') || Auth::user()->hasPermission('super_admin')}}';--}}

        var update_delete_ = '{{Auth::user()->hasPermission('notice.update') && Auth::user()->hasPermission('notice.delete') || Auth::user()->hasPermission('super_admin')}}';
        var update_ = '{{Auth::user()->hasPermission('notice.update')}}';
        var delete_ = '{{Auth::user()->hasPermission('notice.delete')}}';
        {{--var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";--}}
    </script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/pages/notices/archive-json.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/features/miscellaneous/sweetalert2.js') }}" type="text/javascript"></script>
    <script>
        $('#kt_datepicker').datepicker({
            todayHighlight: true,
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>',
            },
            format : 'dd-mm-yyyy',
        });

        $('#year').select2({
            placeholder: 'اختر السنة',
            allowClear: true
        });
        $('#license_file').select2({
            placeholder: 'اختر نوع السوق',
            allowClear: true
        });

    </script>
@endsection
