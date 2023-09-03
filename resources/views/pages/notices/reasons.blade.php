{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    قائمة أسباب الإخطارات
                    {{--<span class="d-block text-muted pt-2 font-size-sm">Set column width individually</span>--}}
                </h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline mr-2">
                    <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"/>
        <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>		تصدير
                    </button>

                    <!--begin::Dropdown Menu-->
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <!--begin::Navigation-->
                        <ul class="navi flex-column navi-hover py-2">
                            <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                اختر أحد الخيارات:
                            </li>

                            <li class="navi-item">
                                <a href="#" class="navi-link" id="export_excel">
                                    <span class="navi-icon"><i class="la la-file-excel-o"></i></span>
                                    <span class="navi-text">إكسل</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link" id="export_print">
                                    <span class="navi-icon"><i class="la la-print"></i></span>
                                    <span class="navi-text">طباعة</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link" id="export_copy">
                                    <span class="navi-icon"><i class="la la-copy"></i></span>
                                    <span class="navi-text">نسخ</span>
                                </a>
                            </li>

                            {{--<li class="navi-item">--}}
                            {{--<a href="#" class="navi-link">--}}
                            {{--<span class="navi-icon"><i class="la la-file-text-o"></i></span>--}}
                            {{--<span class="navi-text">CSV</span>--}}
                            {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="navi-item">--}}
                            {{--<a href="#" class="navi-link" id="export_pdf">--}}
                            {{--<span class="navi-icon"><i class="la la-file-pdf-o"></i></span>--}}
                            {{--<span class="navi-text">PDF</span>--}}
                            {{--</a>--}}
                            {{--</li>--}}
                        </ul>
                        <!--end::Navigation-->
                    </div>
                    <!--end::Dropdown Menu-->
                </div>
                <!--end::Dropdown-->

                <!--begin::Button-->
                @can('create', \App\Notice::class)

                    {{--                <a href="{{route('sections.create')}}" class="btn btn-primary font-weight-bolder">--}}
                    <a href="javascript:void(0)" id="create_section" class="btn btn-primary font-weight-bolder">
	<span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <circle fill="#000000" cx="9" cy="15" r="6"/>
        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon--></span>	إنشاء سبب جديد
                    </a>
            @endcan
            <!--end::Button-->
            </div>
        </div>

        <div class="card-body">
            <!--begin: Search Form-->
            <!--begin::Search Form-->



            <!--end::Search Form-->
            <!--end: Search Form-->

            <!--begin: Datatable-->
            {{--<table class="table table-separate table-head-custom table-checkable" id="kt_datatable">--}}
            <table class="table table-bordered table-hover table-checkable" id="kt_datatable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>السبب</th>
                    <th>تاريخ إنشاء السبب</th>
                    <th>الإجراءات</th>

                </tr>
                </thead>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
    <!-- Modal Add-Edit -->
    <div class="izi-modal"
         data-iziModal-fullscreen="true"
         data-iziModal-title=""
         data-iziModal-icon=""
         data-iziModal-padding="20"
         data-iziModal-autoopen="false"
         data-iziModal-headercolor="#4e7ea3"
         id="ajax-modal">
        <form class="pen_modal" id="Form_" name="Form_">
            <input type="hidden" name="notice_id" id="notice_id">
            <div class="form-group">
                <label>السبب</label>
                <input type="text"
                       id="name"
                       class="form-control"
                       required=""
                       placeholder="أدخل السبب"
                       data-validation="required"
                       data-validation-error-msg-required="الحقل مطلوب"
                       name="name">
            </div>
            <div class="form-group mt-5">
                <button type="submit" class="btn btn-primary" id="btn-save" value="create">حفظ</button>
                <button class="btn btn-primary-outline light" data-izimodal-close>إلغاء</button>
            </div>
        </form>

    </div>
@endsection

{{-- Styles Section --}}
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/iziModal.min.css')}}"> <!-- Original -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/izi-modal.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css')}}">
    {{--    <script src="{{ asset('assets/js/jquery.min.js')}}"></script>--}}
    {{--    <script src="{{ asset('assets/js/jquery.validate.js')}}"></script>--}}

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
        var DATA_URL = "{{ route('notice_reasons.data') }}";
        var SITEURL = '{{URL::to('')}}';

        var update_delete_ = '{{Auth::user()->hasPermission('notice.update') && Auth::user()->hasPermission('notice.delete') || Auth::user()->hasPermission('super_admin')}}';
        var update_ = '{{Auth::user()->hasPermission('notice.update')}}';
        var delete_ = '{{Auth::user()->hasPermission('notice.delete')}}';
        {{--var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";--}}
    </script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/notices/reasons-json.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/features/miscellaneous/sweetalert2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/iziModal.min.js')}}"></script>

    <script>
        /* When click Add */
        $('#ajax-modal').iziModal();
        $('#create_section').click(function () {
            $('#btn-save').val("create_section");
            $('#notice_id').val('');
            $('#Form_').trigger("reset");
            $('#ajax-modal').iziModal('open');
            $('#ajax-modal').iziModal('setTitle', "إضافة سبب");
            $('#ajax-modal').iziModal('setIcon', 'fa fa-plus');

        });
        function updated_(id) {
            $.get('notice_reasons/' + id +'/edit', function (data) {
                $('#name-error').hide();
                $('#btn-save').val("update_section");
                $('#ajax-modal').iziModal('open');
                $('#ajax-modal').iziModal('setTitle', "تعديل السبب");
                $('#ajax-modal').iziModal('setIcon', 'fa fa-edit');
                $('#notice_id').val(data.id);
                $('#name').val(data.name);
            })
        }
        $(document).ready(function(){
            $("#btn-save").click(function(e){
                e.preventDefault();
                $('#btn-save').html('جاري الحفظ');
                var notice_id = $("#notice_id").val();
                var name = $("#name").val();
                $.ajax({
                    type: "POST",
                    url: '{{route('notice_reasons.store')}}',
                    data: {
                        notice_id:notice_id,
                        name:name,
                        '_token':'{{csrf_token()}}'
                    },
//                    dataType: 'json',
                    success:function(data){
                        $('#Form_').trigger("reset");
                        $('#ajax-modal').iziModal('close');
                        $('#btn-save').html('حفظ');
                        Swal.fire({
                            icon: "success",
                            title: "تم الحفظ بنجاح!",
                            showConfirmButton: false,
                            timer: 3000
                        });
                        var oTable = $('#kt_datatable').DataTable();
                        oTable.destroy();
                        KTDatatableJsonRemoteDemo.init();

                    },
                    error: function (data) {
                        $('#btn-save').html('حفظ');
                        Swal.fire({
                            icon: "error",
                            title: "خطأ!",
                            text: "لم يتم الحفظ",
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                });
            });
        });

        
    </script>
@endsection
