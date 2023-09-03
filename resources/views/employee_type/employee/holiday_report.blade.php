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
                        <th width="25%">{{ 'اسم الموظف ' }}</th>
                        <th width="25%">{{ 'سبب الإجازة ' }}</th>
                        <th width="25%">{{ 'تاريخ البداية ' }}</th>
                        <th width="25%">{{ 'تاريخ النهاية ' }}</th>
                    </tr>
                </thead>
            
                <tbody>
                    @foreach ($employees as $employee)
                        @foreach ($employee->normalHolidays as $holiday)
                        <tr>
                            <td>{{ $employee->employee_name }}</td>
                            <td>{{ $holiday->holiday_reason }}</td>
                            <td>{{ $holiday->start_date }}</td>
                            <td>{{ $holiday->end_date }}</td>
                        </tr>
                        @endforeach
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