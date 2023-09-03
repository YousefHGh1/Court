@extends('layout.master')

@section('title')
عرض الإخطارات
@endsection

@section('page_title')
لوحة التحكم
@endsection
@section('sub_main')
قائمة الإخطارات
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
        left: 10%;
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
                <h3 class="card-label">عرض قائمة الإخطارات: {{ App\Models\court::count() }} </h3>
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
                <a href="{{ url('/court/create') }}" class="btn btn-primary font-weight-bolder">
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <circle fill="#000000" cx="9" cy="15" r="6" />
                                <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>إنشاء اخطار جديد</a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin:Search Date-->
            <div class="accordion accordion-light " id="accordionExample5" style="direction: rtl;">
                <div class="card">
                    <div class="card-header " id="headingOne5">
                        <div class="card-title">
                            <div data-toggle="collapse" data-target="#collapseOne5" class="btn btn-primary advance_search font-weight-bolder "><i class="flaticon-search"></i>
                                بحــــــــــــث متــقـــــــــــــــــــــــدم</div>
                        </div>
                    </div>
                    <div id="collapseOne5" class="pl-5 collapse" data-parent="#accordionExample5" style="direction: rtl;">
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
                                            <input type="submit" class="btn btn-primary btn-primary--icon" value="بحث" />
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
                        <th width="5%">{{ 'رقم الاشتراك ' }}</th>
                        <th width="10%">{{ 'المدعي' }}</th>
                        <th width="15%">{{ 'المستدعى ضده' }}</th>
                        <th width="2%">{{ 'المبلغ' }}</th>
                        <th width="10%">{{ 'العنوان ' }} </th>
                        <th width="8%">{{ 'نوع التنفيذ ' }} </th>
                        <th width="8%">{{ 'رقم القضية ' }} </th>
                        <th width="7%">{{ 'الاجراءات ' }} </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $courtData)
                    <tr>
                        <td>{{ $courtData['court']->jibaya_id }}</td>
                        <td>
                            <ul>
                                @foreach($courtData['summoners'] as $summoner)
                                <li>{{ $summoner->summoner }} {{ $summoner->idno_summoner }}</li>

                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul>
                                @foreach($courtData['defendants'] as $defendant)
                                <li>{{ $defendant->defendant }} {{ $defendant->idno_defendant }}</li>

                                @endforeach
                            </ul>
                        </td>

                        <td>{{ $courtData['court']->amount }}</td>
                        <td>{{ $courtData['court']->address }}</td>
                        <td>{{ $courtData['court']->action_type }}</td>
                        <td>{{ $courtData['court']->case_num }}</td>

                        <td data-field="Actions" data-autohide-disabled="false" aria-label="null" class="datatable-cell">
                            <span style="overflow: visible; position: relative; width: 110px;">

                                {{-- <a href="#" onclick="confirmDelete('{{ $courtData->id }}', this)"
                                class="btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a> --}}

                                <a href="{{ url('/court/court_order/' . $courtData['court']->id) }}" title="View court"><button class="btn btn-sm btn-clean btn-icon"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                        </svg></button></a>

                                <form method="POST" action="{{ url('/court' . '/' . $courtData['court']->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }} {{ csrf_field() }}
                                    <button type="submit" class="btn btn-sm btn-clean btn-icon" title="Delete court" onclick="return confirm('هل تريد تأكيد عملية الحذف؟؟؟')"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                        </svg></button>
                                </form>

                                <a href="{{ url('/court/' . $courtData['court']->id . '/edit') }}" class="btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a>

                                {{-- <div class="dropdown dropdown-inline">
                                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
                                        <i class="la la-cog"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                        <ul class="nav nav-hoverable flex-column">

                                            <li class="nav-item">
                                                <a class="nav-link" href="#">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-slash" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M1.093 3.093c-.465 4.275.885 7.46 2.513 9.589a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.32 11.32 0 0 0 1.733-1.525l-.745-.745a10.27 10.27 0 0 1-1.578 1.392c-.346.244-.652.42-.893.533-.12.057-.218.095-.293.118a.55.55 0 0 1-.101.025.615.615 0 0 1-.1-.025 2.348 2.348 0 0 1-.294-.118 6.141 6.141 0 0 1-.893-.533 10.725 10.725 0 0 1-2.287-2.233C3.053 10.228 1.879 7.594 2.06 4.06l-.967-.967zM3.98 1.98l-.852-.852A58.935 58.935 0 0 1 5.072.559C6.157.266 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.483 3.626-.332 6.491-1.551 8.616l-.77-.77c1.042-1.915 1.72-4.469 1.29-7.702a.48.48 0 0 0-.33-.39c-.65-.213-1.75-.56-2.836-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524a49.7 49.7 0 0 0-1.357.39zm9.666 12.374-13-13 .708-.708 13 13-.707.707z" />
                                                    </svg>
                                                    <span class="nav-text">قبل أمر الحجز</span>
                                                </a>
                                                <ul class="nav nav-hoverable flex-column">
                                                    <li class="nav-item"><a class="nav-link" href="{{ url('/court/B_all_amount/' . $courtData['court']->id) }}"><span class="nav-text">دفع كامل</span></a></li>
                                                    <li class="nav-item"><a class="nav-link" href="{{ url('/court/B_part_amount/' . $courtData['court']->id) }}"><span class="nav-text">تقسيط</span></a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sign-stop" viewBox="0 0 16 16">
                                                        <path d="M3.16 10.08c-.931 0-1.447-.493-1.494-1.132h.653c.065.346.396.583.891.583.524 0 .83-.246.83-.62 0-.303-.203-.467-.637-.572l-.656-.164c-.61-.147-.978-.51-.978-1.078 0-.706.597-1.184 1.444-1.184.853 0 1.386.475 1.436 1.087h-.645c-.064-.32-.352-.542-.797-.542-.472 0-.77.246-.77.6 0 .261.196.437.553.522l.654.161c.673.164 1.06.487 1.06 1.11 0 .736-.574 1.228-1.544 1.228Zm3.427-3.51V10h-.665V6.57H4.753V6h3.006v.568H6.587Z" />
                                                        <path fill-rule="evenodd" d="M11.045 7.73v.544c0 1.131-.636 1.805-1.661 1.805-1.026 0-1.664-.674-1.664-1.805V7.73c0-1.136.638-1.807 1.664-1.807 1.025 0 1.66.674 1.66 1.807Zm-.674.547v-.553c0-.827-.422-1.234-.987-1.234-.572 0-.99.407-.99 1.234v.553c0 .83.418 1.237.99 1.237.565 0 .987-.408.987-1.237Zm1.15-2.276h1.535c.82 0 1.316.55 1.316 1.292 0 .747-.501 1.289-1.321 1.289h-.865V10h-.665V6.001Zm1.436 2.036c.463 0 .735-.272.735-.744s-.272-.741-.735-.741h-.774v1.485h.774Z" />
                                                        <path fill-rule="evenodd" d="M4.893 0a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146A.5.5 0 0 0 11.107 0H4.893ZM1 5.1 5.1 1h5.8L15 5.1v5.8L10.9 15H5.1L1 10.9V5.1Z" />
                                                    </svg>
                                                    <span class="nav-text">أمر الحجز</span>
                                                </a>
                                                <ul class="nav nav-hoverable flex-column">
                                                    <li class="nav-item"><a class="nav-link" href="{{ url('/court/salary_reservation/' . $courtData['court']->id) }}"><span class="nav-text">حجز راتب</span></a></li>
                                                    <li class="nav-item"><a class="nav-link" href="{{ url('/court/travel_ban/' . $courtData['court']->id) }}"><span class="nav-text">حجز سفر</span></a></li>
                                                    <li class="nav-item"><a class="nav-link" href="{{ url('/court/detention_order/' . $courtData['court']->id) }}"><span class="nav-text">أمر حبس</span></a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock" viewBox="0 0 16 16">
                                                        <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2zM3 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1H3z" />
                                                    </svg>
                                                    <span class="nav-text">فك حجز راتب</span>

                                                </a>
                                                <ul class="nav nav-hoverable flex-column">
                                                    <li class="nav-item"><a class="nav-link" href="{{ url('/court/A_part_amount/' . $courtData['court']->id) }}"><span class="nav-text">تقسيط</span></a></li>
                                                    <li class="nav-item"><a class="nav-link" href="{{ url('/court/A_all_amount/' . $courtData['court']->id) }}"><span class="nav-text">دفع كامل</span></a></li>

                                                </ul>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="#">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock" viewBox="0 0 16 16">
                                                        <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2zM3 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1H3z" />
                                                    </svg>
                                                    <span class="nav-text">فك منع سفر</span>

                                                </a>
                                                <ul class="nav nav-hoverable flex-column">
                                                    <li class="nav-item"><a class="nav-link" href="{{ url('/court/A_part_amount_travel/' . $courtData['court']->id) }}"><span class="nav-text">تقسيط</span></a></li>
                                                    <li class="nav-item"><a class="nav-link" href="{{ url('/court/A_all_amount_travel/' . $courtData['court']->id) }}"><span class="nav-text">دفع كامل</span></a></li>

                                                </ul>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('/court/end_detention/' . $courtData['court']->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock" viewBox="0 0 16 16">
                                                        <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2zM3 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1H3z" />
                                                    </svg>
                                                    <span class="nav-text">انهاء أمر الحبس
                                                    </span>

                                                </a>

                                            </li>
                                        </ul>
                                    </div>
                                </div> --}}

                            </span>
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
