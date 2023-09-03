@extends('layout.master')

@section('title')
عرض بيانات الموظفين
@endsection

@section('page_title')
لوحة التحكم
@endsection
@section('sub_main')
قائمة بيانات الموظفين
@endsection
@section('sub_title')
صفحة العرض
@endsection
@section('css')
<link href="{{ asset('assets/css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('assets/css/dataTables.foundation.min.css') }}">


<style>
    .dataTables_wrapper .dataTable th,
    .dataTables_wrapper .dataTable td {
        padding-right: 10px !important;
        margin: 10px !important;
    }

    .dataTables_wrapper .dataTable tfoot th,
    .dataTables_wrapper .dataTable thead th {
        padding-right: 0px;
        padding-left: 0px;
        text-align: right;
    }

    div.dt-buttons {
        top: 50%;
        left: 8%;
        width: 200px;
        margin-left: -100px;
        margin-top: -20px;
        text-align: center;
        padding: 1rem 0
    }

    div.dt-buttons .dt-button {
        margin: -2px !important;
    }

    .dataTables_wrapper .dataTable thead th {
        background-color: #E4E6EF;
    }

    .card-body {
        padding: 10px 12px !important;
    }
</style>
@endsection

@section('content')
<div class="container">
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="flex-wrap pb-0 border-0 card-header">
            <div class="card-title">
                <h3 class="card-label">عرض قائمة بيانات الموظفين: {{ App\Models\Employee::count() }} </h3>
                <div class="pt-3 btn-group">
                    {{-- <form action="{{ route('court.index') }}" method="GET">
                        <div class="form-group row">
                            <select name="year" id="year" class="pl-5 pr-5 form-group selectpicker">
                                <option value="">اختر السنة التي تريد عرضها</option>
                                @foreach ($years as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary font-weight-bolder">
                                اختر
                            </button>
                        </div>
                    </form> --}}
                </div>
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                <a href="{{ url('/employee/create') }}" class="btn btn-primary font-weight-bolder">
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <circle fill="#000000" cx="9" cy="15" r="6" />
                                <path
                                    d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                    fill="#000000" opacity="0.3" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>إنشاء موظف جديد</a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin:Search Date-->
            <div class="accordion accordion-light " id="accordionExample5" style="direction: rtl;">
                <div class="card">
                    <div class="card-header " id="headingOne5">
                        <div class="card-title">
                            <div data-toggle="collapse" data-target="#collapseOne5"
                                class="btn btn-primary advance_search font-weight-bolder "><i
                                    class="flaticon-search"></i>
                                بحــــــــــــث متــقـــــــــــــــــــــــدم</div>
                        </div>
                    </div>
                    <div id="collapseOne5" class="pl-5 collapse" data-parent="#accordionExample5"
                        style="direction: rtl;">
                        <div class="card-body1">
                            <div class="mb-6 col-lg-9">
                                <label>التاريخ:</label>
                                <form action="{{ url('court/searchdate') }}" method="POST" class="pr-5 form-group">
                                    @csrf
                                    <div class="input-daterange input-group">
                                        <div class="p-0 col-4">
                                            <input name="start_date" type="date" class="form-control" id="start_date" />
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                                        </div>
                                        <div class="p-0 col-4">
                                            <input name="end_date" type="date" class="form-control" id="end_date" />
                                        </div>
                                        <div class="mt-auto mb-auto col-lg-2">
                                            <input type="submit" class="btn btn-primary btn-primary--icon"
                                                value="بحث" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End:Search Date-->
            <!--begin: Datatable-->
            <table id="example" class="table dt-responsive" style="width:100%; padding:0%">
                <thead class="thead_dark">
                    <tr>
                        <th width="5%">{{ 'رقم ' }}</th>
                        <th width="5%">{{ 'الرقم الوظيفي ' }}</th>
                        <th width="5%">{{ 'الهوية ' }}</th>
                        <th width="5%">{{ 'الاسم بالكامل ' }}</th>
                        <th width="5%">{{ 'الحالة الاجتماعية ' }}</th>
                        <th width="5%">{{ 'تاريخ الميلاد ' }}</th>
                        <th width="5%">{{ 'العمر ' }}</th>
                        <th width="5%">{{ 'تاريخ التثبيت ' }}</th>
                        <th width="5%">{{ 'سنوات الخدمة ' }}</th>
                        <th width="5%">{{ 'أيام الاجازة ' }}</th>

                        <th width="12%">{{ 'الاجراءات ' }} </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($employee as $employees)
                    <tr>
                        <td>{{ $employees->id }}</td>
                        <td>{{ $employees->employee_num }}</td>
                        <td>{{ $employees->id_employee }}</td>
                        <td>{{ $employees->employee_name }}</td>
                        <td>{{ $employees->employee_status }}</td>

                        {{-- <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',
                            $employees->employee_birthdate)->format('Y-m-d') }}</td> --}}
                        {{-- <td> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',
                            $employees->ministry_installation_date())->format('Y-m-d') }}
                        </td> --}}
                        <td>{{ date('d-m-Y', strtotime($employees->employee_birthdate)) }}</td>
                        <td>{{ $employees->getAge() }}</td>

                        <td>{{ date('Y-m-d', strtotime($employees->ministry_installation_date())) }}</td>


                        <td>{{ $employees->getServiceYears() }}</td>

                        <td>{{ $employees->vacation_days }}</td>

                        {{-- <td>{{ $employees->getVacationDays() }}</td> --}}

                        {{-- الاجراءات --}}
                        <td class="pr-0">
                            {{-- اجراءات الموظف --}}
                            <div class="dropdown dropdown-inline"> <a href="javascript:;"
                                    class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3" data-toggle="dropdown">
                                    <span class="svg-icon svg-icon-md svg-icon-primary"
                                        title="اضافة باقي بيانات الموظف">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                                    fill="#000000"></path>
                                            </g>
                                        </svg> </span> </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <ul class="navi flex-column navi-hover py-2">
                                        <li
                                            class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">
                                            اجراءات الموظف: </li>
                                        @if ($employees->employee_status != 'أعزب/عزباء')
                                        <li class="navi-item"> <a href="{{ url('/wife/create/' . $employees->id) }}"
                                                class="navi-link"> <span class="navi-icon"><i
                                                        class="la la-print"></i></span> <span class="navi-text">إضافة
                                                    الزوج/ة</span> </a> </li>
                                        <li class="navi-item"> <a href="{{ url('/son/create/' . $employees->id) }}"
                                                class="navi-link"> <span class="navi-icon"><i
                                                        class="la la-copy"></i></span> <span class="navi-text">إضافة
                                                    الأبناء</span> </a> </li>
                                        @endif

                                        <li class="navi-item"> <a
                                                href="{{ url('/educational/create/' . $employees->id) }}"
                                                class="navi-link"> <span class="navi-icon"><i
                                                        class="la la-file-excel-o"></i></span> <span
                                                    class="navi-text">المؤهلات العلمية</span> </a> </li>
                                        <li class="navi-item"> <a
                                                href="{{ url('/dependent/create/' . $employees->id) }}"
                                                class="navi-link"> <span class="navi-icon"><i
                                                        class="la la-file-text-o"></i></span> <span
                                                    class="navi-text">المعالين</span> </a> </li>
                                        {{-- <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                    class="navi-icon"><i class="la la-file-pdf-o"></i></span> <span
                                                    class="navi-text">PDF</span> </a> </li> --}}
                                    </ul>
                                </div>
                            </div>

                            {{-- show --}}
                            <a href="{{ url('/employee/' . $employees->id) }}"
                                class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                <span class="svg-icon svg-icon-md svg-icon-primary" title="عرض البيانات">
                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Binocular.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M12.8434797,16 L11.1565203,16 L10.9852159,16.6393167 C10.3352654,19.064965 7.84199997,20.5044524 5.41635172,19.8545019 C2.99070348,19.2045514 1.55121603,16.711286 2.20116652,14.2856378 L3.92086709,7.86762789 C4.57081758,5.44197964 7.06408298,4.00249219 9.48973122,4.65244268 C10.5421727,4.93444352 11.4089671,5.56345262 12,6.38338695 C12.5910329,5.56345262 13.4578273,4.93444352 14.5102688,4.65244268 C16.935917,4.00249219 19.4291824,5.44197964 20.0791329,7.86762789 L21.7988335,14.2856378 C22.448784,16.711286 21.0092965,19.2045514 18.5836483,19.8545019 C16.158,20.5044524 13.6647346,19.064965 13.0147841,16.6393167 L12.8434797,16 Z M17.4563502,18.1051865 C18.9630797,18.1051865 20.1845253,16.8377967 20.1845253,15.2743923 C20.1845253,13.7109878 18.9630797,12.4435981 17.4563502,12.4435981 C15.9496207,12.4435981 14.7281751,13.7109878 14.7281751,15.2743923 C14.7281751,16.8377967 15.9496207,18.1051865 17.4563502,18.1051865 Z M6.54364977,18.1051865 C8.05037928,18.1051865 9.27182488,16.8377967 9.27182488,15.2743923 C9.27182488,13.7109878 8.05037928,12.4435981 6.54364977,12.4435981 C5.03692026,12.4435981 3.81547465,13.7109878 3.81547465,15.2743923 C3.81547465,16.8377967 5.03692026,18.1051865 6.54364977,18.1051865 Z"
                                                fill="#000000" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </a>


                            {{-- edit --}}
                            <div class="dropdown dropdown-inline"> <a href="javascript:;"
                                    class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3" data-toggle="dropdown">
                                    <span class="svg-icon svg-icon-md svg-icon-primary" title="تعديل البيانات">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) ">
                                                </path>
                                                <path
                                                    d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                            </g>
                                        </svg></span> </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <ul class="navi flex-column navi-hover py-2">
                                        <li
                                            class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">
                                            اجراءات الموظف: </li>

                                        <li class="navi-item"> <a
                                                href="{{ url('/employee/' . $employees->id . '/edit') }}"
                                                class="navi-link"> <span class="navi-icon"><i
                                                        class="la la-print"></i></span> <span class="navi-text">تعديل
                                                    بيانات الموظف</span> </a> </li>

                                        @if ($employees->employee_status != 'أعزب/عزباء')
                                        <li class="navi-item"> <a href="{{ url('/wife/' . $employees->id . '/edit') }}"
                                                class="navi-link"> <span class="navi-icon"><i
                                                        class="la la-print"></i></span> <span class="navi-text">تعديل
                                                    الزوج/ة</span> </a> </li>
                                        <li class="navi-item"> <a href="{{ url('/son/' . $employees->id . '/edit') }}"
                                                class="navi-link"> <span class="navi-icon"><i
                                                        class="la la-copy"></i></span> <span class="navi-text">تعديل
                                                    الأبناء</span> </a> </li>
                                        @endif

                                        <li class="navi-item"> <a
                                                href="{{ url('/educational/' . $employees->id . '/edit') }}"
                                                class="navi-link"> <span class="navi-icon"><i
                                                        class="la la-file-excel-o"></i></span> <span
                                                    class="navi-text">المؤهلات العلمية</span> </a> </li>
                                        <li class="navi-item"> <a
                                                href="{{ url('/dependent/' . $employees->id . '/edit') }}"
                                                class="navi-link"> <span class="navi-icon"><i
                                                        class="la la-file-text-o"></i></span> <span
                                                    class="navi-text">المعالين</span> </a> </li>
                                        {{-- <li class="navi-item"> <a href="#" class="navi-link"> <span
                                                    class="navi-icon"><i class="la la-file-pdf-o"></i></span> <span
                                                    class="navi-text">PDF</span> </a> </li> --}}
                                    </ul>
                                </div>
                            </div>

                            {{-- holiday_employee --}}
                            <a href="{{ url('/holiday_employee/' . $employees->id) }}"
                                class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                <span class="svg-icon svg-icon-md svg-icon-primary" title="عرض الإجازات">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M19,16 L19,12 C19,8.13400675 15.8659932,5 12,5 C8.13400675,5 5,8.13400675 5,12 L5,16 L19,16 Z M21,16 L3,16 L3,12 C3,7.02943725 7.02943725,3 12,3 C16.9705627,3 21,7.02943725 21,12 L21,16 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path
                                                d="M5,14 L6,14 C7.1045695,14 8,14.8954305 8,16 L8,19 C8,20.1045695 7.1045695,21 6,21 L5,21 C3.8954305,21 3,20.1045695 3,19 L3,16 C3,14.8954305 3.8954305,14 5,14 Z M18,14 L19,14 C20.1045695,14 21,14.8954305 21,16 L21,19 C21,20.1045695 20.1045695,21 19,21 L18,21 C16.8954305,21 16,20.1045695 16,19 L16,16 C16,14.8954305 16.8954305,14 18,14 Z"
                                                fill="#000000" />
                                        </g>
                                    </svg>
                                </span>
                            </a>

                            {{-- DELETE --}}
                            <form method="POST" action="{{ url('/employee' . '/' . $employees->id) }}"
                                accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }} {{ csrf_field() }}
                                <button type="submit" class="btn btn-icon btn-light btn-hover-primary btn-sm"
                                    title="حذف البيانات" onclick="return confirm('هل تريد تأكيد عملية الحذف؟؟؟')">
                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                        <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/Trash.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                    fill="#000000" fill-rule="nonzero"></path>
                                                <path
                                                    d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                    fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span></button>
                            </form>

                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/features/miscellaneous/sweetalert2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/data-json.js') }}" type="text/javascript"></script>


{{-- <script>
    $(document).ready(function() {
  $('#subMenu').on('show.bs.dropdown', function () {
    $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
  });

  $('#subMenu').on('hide.bs.dropdown', function () {
    $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
  });
});

</script> --}}
@endsection