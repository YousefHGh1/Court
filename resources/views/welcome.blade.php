@extends('layout.master')

@section('title')
شؤون الموظفين
@endsection

@section('page_title')
لوحة التحكم
@endsection
@section('sub_main')
الرئيسة
@endsection
@section('sub_title')
شؤون الموظفين
@endsection

@section('css')
@endsection


@section('content')
<!--begin::Container-->
<div class="container">


    <!--begin::Row Employee-->
    <div class="row">
        <div class="col-lg-12 col-xxl-12">
            <!--begin::Mixed Widget 1-->
            <div class="card card-custom gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <a href="{{url('employee/create')}}"
                            class="btn btn-light-success font-weight-bolder btn-lg">الموظفين</a>
                        <span class="text-muted mt-3 font-weight-bold font-size-sm">{{ App\Models\Employee::count() +
                            App\Models\Contract1::count() + App\Models\Daily::count() }}</span>
                    </h3>
                    <div class="card-toolbar">
                        <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                            <li class="nav-item">
                                <a class="nav-link py-2 px-4 active" data-toggle="tab"
                                    href="#kt_tab_pane_12_1">الرسميين</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-2 px-4" data-toggle="tab" href="#kt_tab_pane_12_2">العقود</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-2 px-4" data-toggle="tab" href="#kt_tab_pane_12_3">اليوميين</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <!--end::Header-->

                <!--begin::Body-->
                <div class="card-body pt-2 pb-0 mt-n3">
                    <div class="tab-content mt-5" id="myTabTables12">
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade active show" id="kt_tab_pane_12_1" role="tabpanel"
                            aria-labelledby="kt_tab_pane_12_1">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table table-borderless table-vertical-center">
                                    <thead>
                                        <tr>
                                            <th class="p-0 min-w-200px"></th>
                                            <th class="p-0 min-w-120px"></th>
                                            <th class="p-0 min-w-120px"></th>
                                            <th class="p-0 min-w-120px"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employee as $employees)
                                        <tr>

                                            <td class="pl-0">
                                                <a href="#"
                                                    class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">{{
                                                    $employees->employee_name }}</a>
                                                <span class="text-muted font-weight-bold d-block">{{
                                                    $employees->employee_email }}</span>
                                            </td>
                                            <td class="text-right pr-0">
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                    {{ $employees->employee_num }}
                                                </span>
                                            </td>
                                            <td class="text-right">
                                                <span class="text-muted font-weight-bold">
                                                    {{ $employees->employee_status }}
                                                </span>
                                            </td>
                                            <td class="text-right">
                                                <span class="label label-lg label-light-primary label-inline">{{
                                                    $employees->get_appointment_type() }}</span>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Tap pane-->
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade" id="kt_tab_pane_12_2" role="tabpanel"
                            aria-labelledby="kt_tab_pane_12_1">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table table-borderless table-vertical-center">
                                    <thead>
                                        <tr>
                                            <th class="p-0 min-w-200px"></th>
                                            <th class="p-0 min-w-120px"></th>
                                            <th class="p-0 min-w-120px"></th>
                                            <th class="p-0 min-w-120px"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contract1 as $contracts)
                                        <tr>

                                            <td class="pl-0">
                                                <a href="#"
                                                    class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">{{
                                                    $contracts->contract_name }}</a>
                                                <span class="text-muted font-weight-bold d-block">{{
                                                    $contracts->contract_email }}</span>
                                            </td>
                                            <td class="text-right pr-0">
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                    {{ $contracts->contract_num }}
                                                </span>

                                            </td>
                                            <td class="text-right">
                                                <span class="text-muted font-weight-bold">
                                                    {{ $contracts->contract_status }}
                                                </span>
                                            </td>
                                            <td class="text-right">
                                                <span class="label label-lg label-light-warning label-inline">
                                                    {{ $contracts->get_contract_type() }}
                                                </span>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Tap pane-->
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade" id="kt_tab_pane_12_3" role="tabpanel"
                            aria-labelledby="kt_tab_pane_12_1">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table table-borderless table-vertical-center">
                                    <thead>
                                        <tr>
                                            <th class="p-0 min-w-200px"></th>
                                            <th class="p-0 min-w-120px"></th>
                                            <th class="p-0 min-w-120px"></th>
                                            <th class="p-0 min-w-120px"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($daily as $dailys)
                                        <tr>

                                            <td class="pl-0">
                                                <a href="#"
                                                    class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                                    {{ $dailys->daily_name }}</a>
                                                <span class="text-muted font-weight-bold d-block">
                                                    {{ $dailys->daily_mobile }}</span>
                                            </td>
                                            <td class="text-right pr-0">
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                    {{ $dailys->id_daily }}
                                                </span>

                                            </td>
                                            <td class="text-right">
                                                <span class="text-muted font-weight-bold">
                                                    {{ $dailys->daily_status }}
                                                </span>
                                            </td>
                                            <td class="text-right">
                                                <span class="label label-lg label-light-danger label-inline">
                                                    {{ $dailys->get_named() }}
                                                </span>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Tap pane-->
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 1-->
        </div>
    </div>
    <!--end::Row-->

    <!--begin::Row Volanteer-->
    <div class="row">
        <div class="col-lg-12 col-xxl-12">
            <!--begin::Mixed Widget 1-->
            <div class="card card-custom gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <a class="btn btn-light-dark font-weight-bolder btn-lg"
                            href="{{url('/volanteer/create')}}">المتطوعين و
                            المتدربين</a>
                        <span class="text-muted mt-3 font-weight-bold font-size-sm">{{ App\Models\Volanteer::count()
                            }}</span>
                    </h3>
                    <div class="card-toolbar">
                        <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                            <li class="nav-item">
                                <a class="nav-link py-2 px-4 active" data-toggle="tab"
                                    href="#kt_tab_pane_12_5">المتطوعين و المتدربين</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <!--end::Header-->

                <!--begin::Body-->
                <div class="card-body pt-2 pb-0 mt-n3">
                    <div class="tab-content mt-5" id="myTabTables12">
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade active show" id="kt_tab_pane_12_5" role="tabpanel"
                            aria-labelledby="kt_tab_pane_12_1">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table table-borderless table-vertical-center">
                                    <thead>
                                        <tr>
                                            <th class="p-0 min-w-200px"></th>
                                            <th class="p-0 min-w-120px"></th>
                                            <th class="p-0 min-w-120px"></th>
                                            <th class="p-0 min-w-120px"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($volanteer as $volanteers)
                                        <tr>

                                            <td class="pl-0">
                                                <a href="#"
                                                    class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">{{
                                                    $volanteers->volanteer_name }}</a>
                                                <span class="text-muted font-weight-bold d-block">{{
                                                    $volanteers->volanteer_email }}</span>
                                            </td>
                                            <td class="text-right pr-0">
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                    {{ $volanteers->volanteer_mobile }}
                                                </span>
                                            </td>
                                            <td class="text-right">
                                                <span class="text-muted font-weight-bold">
                                                    {{ $volanteers->volanteer_graduation }}
                                                </span>
                                            </td>
                                            <td class="text-right">
                                                <span class="label label-lg label-light-success label-inline ">
                                                    {{ $volanteers->get_type() }}</span>
                                            </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Tap pane-->

                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 1-->
        </div>
    </div>
    <!--end::Row-->

    <!--begin::Row Court-->
    <div class="row">
        <div class="col-lg-12 col-xxl-12">
            <!--begin::Mixed Widget 1-->
            <div class="card card-custom gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <a href="{{url('court/create')}}"
                            class="btn btn-light-danger font-weight-bolder btn-lg">الإخطارات</a>
                        <span class="text-muted mt-3 font-weight-bold font-size-sm">{{ App\Models\Court::count()
                            }}</span>
                    </h3>
                    <div class="card-toolbar">
                        <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                            <li class="nav-item">
                                <a class="nav-link py-2 px-4 active" data-toggle="tab"
                                    href="#kt_tab_pane_12_5">الإخطارات</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end::Header-->

                <!--begin::Body-->
                <div class="card-body pt-2 pb-0 mt-n3">
                    <div class="tab-content mt-5" id="myTabTables12">
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade active show" id="kt_tab_pane_12_5" role="tabpanel"
                            aria-labelledby="kt_tab_pane_12_1">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table table-borderless table-vertical-center">
                                    <thead>
                                        <tr>
                                            <th class="p-0 min-w-200px"></th>
                                            <th class="p-0 min-w-120px"></th>
                                            <th class="p-0 min-w-120px"></th>
                                            <th class="p-0 min-w-120px"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($court as $courts)
                                        <tr>

                                            <td class="pl-0">
                                                <a href="#"
                                                    class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">{{
                                                    $courts->jibaya_id }}</a>
                                                <span class="text-muted font-weight-bold d-block">{{
                                                    $courts->get_summoners() }}</span>
                                            </td>
                                            <td class="text-right pr-0">
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                    {{ $courts->get_defendants() }}
                                                </span>
                                            </td>
                                            <td class="text-right">
                                                <span class="text-muted font-weight-bold">
                                                    {{ $courts->amount }}
                                                </span>
                                            </td>
                                            <td class="text-right">
                                                <span class="label label-lg label-light-danger label-inline ">
                                                    {{ $courts->action_type }}</span>
                                            </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Tap pane-->

                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 1-->
        </div>
    </div>
    <!--end::Row-->

</div>
<!--end::Container-->
@endsection

@section('scripts')
@endsection