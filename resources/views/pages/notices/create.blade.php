{{-- Extends layout --}}
@extends('layout.master')

{{-- Content --}}
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-4 mb-1">

                        <label>البحث برقم الهوية:</label>
                        <div>
                            <select class="form-control select2" id="kt_select2_111"></select>

                        </div>
                    </div>
                    <div class="col-md-4 mb-1">
                        <label>البحث بالاسم:</label>
                        <div>
                            <select class="form-control select2" id="kt_select2_222"></select>

                        </div>
                    </div>
                    <div class="col-md-4 mb-1">

                        <label>البحث برقم الاشتراك:</label>
                        <div>

                            <select class="form-control select2" id="kt_select2_333">
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<form action="{{route('notices.store')}}" method="post" class="form card-shadowless" id="kt_form_2">
    @csrf
    <div class="row">
        <div class="col-md-5">

            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">
                        بيانات المواطن
                    </h3>

                </div>
                <!--begin::Form-->

                <div class="card-body">
                    <div class="row">
                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="">

                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>رقم الهوية</label>
                                <input type="number" class="form-control" id="identity_number" name="identity_number" placeholder="رقم الهوية" />
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>رقم الاشتراك</label>
                                <input type="number" class="form-control" id="jebaia_no" name="jebaia_no" placeholder="رقم الاشتراك" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>الاسم الأول</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" placeholder="الاسم الأول" />
                                @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>الاسم الثاني</label>
                                <input type="text" class="form-control @error('second_name') is-invalid @enderror" id="second_name" name="second_name" placeholder="الاسم الثاني" />
                                @error('second_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-xl-6">
                            <!--begin::Group-->
                            <div class="form-group">
                                <label>الاسم الثالث</label>

                                <input type="text" class="form-control @error('third_name') is-invalid @enderror" id="third_name" name="third_name" placeholder="الاسم الثالث" />
                                {{--<span class="form-text text-muted">Please enter your Postcode.</span>--}}
                                @error('third_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>الاسم الأخير</label>

                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" placeholder="الاسم الأخير" />
                                @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!--end::Group-->
                    </div>
                    <!--end::Row-->
                    <div class="form-group">
                        <label>الموبايل</label>

                        <input type="number" class="form-control" id="mobile" name="mobile" placeholder="الموبايل" />

                    </div>
                    <input class="form-control form-control-solid form-control-lg" id="SEX" name="sex" type="hidden" value="" />
                    <input class="form-control form-control-solid form-control-lg" id="SOCIAL_STATUS" name="social_status" type="hidden" value="" />

                    {{--<div class="form-group">--}}
                    {{--<label>العنوان</label>--}}

                    {{--<input type="text" class="form-control" id="address" name="address" placeholder="العنوان"/>--}}

                    {{--</div>--}}



                </div>

            </div>
        </div>
        <div class="col-md-7">
            <div class="card card-custom gutter-b example example-compact">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label>اختر السنة:</label>

                            <select class="form-control select2 select2_ @error('year') is-invalid @enderror" id="year" name="year">
                                <option value=""></option>
                                @for ($x = 2022; $x >= 2000; $x--)
                                <option value="{{$x}}">{{$x}}</option>
                                @endfor
                            </select>
                            @error('year')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="col-md-4 form-group">
                            <label>رقم الإخطار:</label>
                            <input type="number" class="form-control @error('notice_id') is-invalid @enderror" id="notice_id" name="notice_id" placeholder="رقم الإخطار" />

                            @error('notice_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group">
                            <label>اختر الشهر:</label>

                            <select class="form-control select2 select2_ @error('notice_month') is-invalid @enderror" id="notice_month" name="notice_month">
                                <option value=""></option>
                                @for ($x = 1; $x <= 12; $x++) <option value="{{$x}}">{{$x}}</option>
                                    @endfor

                            </select>
                            @error('notice_month')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="col-md-4 form-group">
                            <label>المبلغ المحكوم:</label>
                            <input type="number" class="form-control @error('fine_amount') is-invalid @enderror" id="fine_amount" name="fine_amount" placeholder="المبلغ المحكوم" />

                            @error('fine_amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group">
                            <label>تاريخ الإخطار:</label>
                            <div class="input-group date" id="kt_datetimepicker_6" data-target-input="nearest">
                                <input type="text" name="notice_date" class="form-control datetimepicker-input" placeholder="Select date & time" data-target="#kt_datetimepicker_6" />
                                <div class="input-group-append" data-target="#kt_datetimepicker_6" data-toggle="datetimepicker">
                                    <span class="input-group-text">
                                        <i class="ki ki-calendar"></i>
                                    </span>
                                </div>
                            </div>




                            {{--<label>تاريخ الإخطار:</label>--}}
                            {{--<input type="text" class="form-control @error('notice_date') is-invalid @enderror" id="kt_datepicker_1" name="notice_date" readonly/>--}}

                            {{--@error('notice_date')--}}
                            {{--<div class="invalid-feedback">{{ $message }}
                        </div>--}}
                        {{--@enderror--}}
                    </div>


                    <div class="col-md-4 form-group">
                        <label>وصف البناء:</label>
                        <input type="text" class="form-control @error('build_desc') is-invalid @enderror" id="build_desc" name="build_desc" placeholder="وصف البناء" />

                        @error('build_desc')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label>رقم البسطة:</label>
                        <input type="number" class="form-control @error('rent_no') is-invalid @enderror" id="rent_no" name="rent_no" placeholder="رقم البسطة" />

                        @error('rent_no')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-8 form-group">
                        <label>العنوان:</label>
                        <input type="text" class="form-control @error('notice_address') is-invalid @enderror" id="notice_address" name="notice_address" placeholder="العنوان" />

                        @error('notice_address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label>رقم القضية:</label>
                        <input type="text" class="form-control @error('org_file_number') is-invalid @enderror" id="org_file_number" name="org_file_number" placeholder="رقم القضية" />

                        @error('org_file_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


            </div>
            <div class="card-footer">
                <button type="button" id="save_req" class="btn btn-primary mr-2">حفظ</button>
                <button type="reset" class="btn btn-secondary">إلغاء</button>
            </div>


        </div>
    </div>

    </div>
</form>
@endsection

{{-- Styles Section --}}
@section('styles')

<style>
    .ck-editor__editable {
        direction: rtl !important;
    }

    .ck-editor__editable p {
        direction: rtl !important;
    }

    .ck-content {
        min-height: 100px;
    }

</style>
@endsection

{{-- Scripts Section --}}
@section('scripts')

<script src="{{ asset('assets/js/pages/crud/forms/widgets/select2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/crud/forms/editors/ckeditor-classic.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/crud/forms/validation/form-controls.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}" type="text/javascript"></script>
{{-- <script src="{{ asset('assets/js/pages/crud/forms/editors/summernote.js') }}" type="text/javascript"></script> --}}
<script>
    $(document).ready(function() {
        $('#year').select2({
            placeholder: 'اختر السنة'

        });
        $('#notice_month').select2({
            placeholder: 'اختر الشهر'

        });
        $('#notice_reason_id').select2({
            placeholder: 'اختر سبب الإخطار'

        });
        $('#rent_location_id').select2({
            placeholder: 'اختر نوع السوق'

        });
        //            $('#kt_datepicker_1').datepicker({
        //                dateFormat: 'dd-mm-yy'
        //            });
        $('#kt_datetimepicker_6').datetimepicker({
            defaultDate: '{{\Carbon\Carbon::now()}}'
            , format: 'YYYY-MM-DD HH:mm:ss'
            , pick12HourFormat: false
            , use24hours: true
        });
    });

</script>
<script>
    var clickcount = 0;
    $('#save_req').on('click', function(e) {
        clickcount++;
        if (clickcount == 1) {
            $('#kt_form_2').submit();
        }
    });
    $('button[type=reset]').on('click', function(e) {
        $('span.card-title').remove();
    });

</script>
<script>
    function checkid(value) {
        if (isNaN(value) || value.length != 9 || !IsValidId(value)) {
            return false;
        }
    }

    function IsValidId(id) {
        var A;
        var B = 0;
        for (var i = 0; i <= 7; i++) {
            A = parseInt(id.substring(i, i + 1));
            if ((i + 1) % 2 == 0) {
                A = A * 2;
            }
            if (A > 9) {
                A = A - 9;
            }
            B = B + A;
        }
        B = B % 10;
        B = (10 - B) % 10;
        if (B != parseInt(id.substring(8))) {
            return false;
        } else {
            return true;
        }
    }

    //        $('form input').keydown(function (e) {
    //            if (e.keyCode == 13) {
    //                e.preventDefault();
    //                return false;
    //            }
    //        });

    $('input').on("keypress", function(e) {
        if (e.keyCode == 13) {
            var inputs = $(this).parents("form").eq(0).find(":input");
            var idx = inputs.index(this);

            if (idx == inputs.length - 1) {
                inputs[0].select()
            } else {
                inputs[idx + 1].focus(); //  handles submit buttons
                inputs[idx + 1].select();
            }
            return false;
        }
    });

    /* seeeeeeeeeeeeeearch ajax */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#kt_select2_111').on('change', function() {
        var identity_number = this.value;
        $.ajax({
            type: 'get'
            , url: '{{url(' / ')}}' + '/ajaxUserDataNotice'
            , data: {
                identity_number: identity_number
            }
            , success: function(data) {
                $('#kt_select2_222').children().remove();
                $('#kt_select2_222').append(data.name);
                $('#kt_select2_333').children().remove();
                $('#user_id').val(data.IDNO.id);
                $('#identity_number').val(data.IDNO.identity_number);
                $('#mobile').val(data.IDNO.profile.mobile);
                $('#first_name').val(data.IDNO.profile.first_name);
                $('#second_name').val(data.IDNO.profile.second_name);
                $('#third_name').val(data.IDNO.profile.third_name);
                $('#last_name').val(data.IDNO.profile.last_name);

                $('#first_name , #second_name , #third_name, #last_name/*, #address, #neighborhood, #widget, #voucher, #divider, #building, #floor, #apartment, #owner, #tenant*/').attr('disabled', 'disabled');
                $('#first_name , #second_name , #third_name, #last_name/*, #address, #neighborhood, #widget, #voucher, #divider, #building, #floor, #apartment, #owner, #tenant*/').css({
                    'background-color': '#dddddd'
                    , 'color': '#7b7b7b'
                });

            }
        });
        //            }
    });
    $('#kt_select2_222').on('change', function() {
        var name = this.value;
        $.ajax({
            type: 'get'
            , url: '{{url(' / ')}}' + '/ajaxNameDataNotice'
            , data: {
                name: name
            }
            , success: function(data) {
                $('#kt_select2_111').children().remove();
                $('#kt_select2_111').append(data.identity_number);
                $('#kt_select2_333').children().remove();
                $('#user_id').val(data.IDNO.id);
                $('#identity_number').val(data.IDNO.identity_number);
                $('#mobile').val(data.IDNO.profile.mobile);
                $('#first_name').val(data.IDNO.profile.first_name);
                $('#second_name').val(data.IDNO.profile.second_name);
                $('#third_name').val(data.IDNO.profile.third_name);
                $('#last_name').val(data.IDNO.profile.last_name);

                $('#first_name , #second_name , #third_name, #last_name/*, #address, #neighborhood, #widget, #voucher, #divider, #building, #floor, #apartment, #owner, #tenant*/').attr('disabled', 'disabled');
                $('#first_name , #second_name , #third_name, #last_name/*, #address, #neighborhood, #widget, #voucher, #divider, #building, #floor, #apartment, #owner, #tenant*/').css({
                    'background-color': '#dddddd'
                    , 'color': '#7b7b7b'
                });

            }
        });
        //            }
    });
    $('#kt_select2_333').on('change', function() {
        var mokalaf = this.value;
        $.ajax({
            type: 'get'
            , url: '{{url(' / ')}}' + '/ajaxJebaiaDataNotice'
            , data: {
                mokalaf: mokalaf
            }
            , success: function(data) {
                $('#kt_select2_111').children().remove();
                $('#kt_select2_111').append(data.idNo);
                $('#kt_select2_222').children().remove();
                $('#kt_select2_222').append(data.userName);
                $('#user_id').val(data.IDNO.id);
                $('#identity_number').val(data.IDNO.identity_number);
                $('#mobile').val(data.IDNO.profile.mobile);
                $('#first_name').val(data.prof_first_name);
                $('#second_name').val(data.prof_second_name);
                $('#third_name').val(data.prof_third_name);
                $('#last_name').val(data.prof_last_name);


                $('#first_name , #second_name , #third_name, #last_name/*, #address, #neighborhood, #widget, #voucher, #divider, #building, #floor, #apartment, #owner, #tenant*/').attr('disabled', 'disabled');
                $('#first_name , #second_name , #third_name, #last_name/*, #address, #neighborhood, #widget, #voucher, #divider, #building, #floor, #apartment, #owner, #tenant*/').css({
                    'background-color': '#dddddd'
                    , 'color': '#7b7b7b'
                });
            }
        });
    });
    /* end search */


    $('form #identity_number').on('keydown blur', function(e) {

        // was it the Enter key?
        if (e.which == 13) {
            e.preventDefault();
            $(this).blur();
        }

        if (e.type == 'blur') {

            //MyFunction
            var P_DOC_ID = $("#identity_number").val();
            //                var USER__ID = $("#user_id").val();
            //                var user_id = $("#user_id").val();
            //                $('#user_id').val('');
            checkid(P_DOC_ID);
            if (checkid(P_DOC_ID) == false) {
                swal.fire({
                    title: "تحذير"
                    , text: "رقم الهوية المدخلة خاطئ .. الرجاء التأكد من الرقم"
                    , type: "warning"
                });
                $('form').trigger("reset");
                $('#identity_number').val(P_DOC_ID);
                $('.select2_').val('').trigger("change");
                $('#user_id').val('');
                $('#common_name').addClass('d-none');
                $('span.card-title').remove();
                return false;
            }
            KTApp.block(".card-shadowless", {
                overlayColor: "#000000"
                , type: "v2"
                , state: "primary"
            });
            $.ajax({
                type: 'get'
                , url: '{{url(' / ')}}' + '/ajaxUserDataNotice'
                , data: {
                    identity_number: P_DOC_ID /*,user_id: USER__ID*/
                }
                , success: function(data) {
                    $('form').trigger("reset");
                    $('.select2_').val('').trigger("change");
                    $('#common_name').addClass('d-none');
                    //                        $('#kt-ckeditor-1').val('');
                    KTApp.unblock(".card-shadowless");
                    //                        $('#kt_select2_222').children().remove();
                    //                        $('#kt_select2_222').append(data.name);
                    $('#user_id').val(data.IDNO.id);
                    $('#identity_number').val(data.IDNO.identity_number);
                    $('#jebaia_no').val(data.IDNO.jebaia_no);
                    $('#mobile').val(data.IDNO.profile.mobile);
                    $('#first_name').val(data.IDNO.profile.first_name);
                    $('#second_name').val(data.IDNO.profile.second_name);
                    $('#third_name').val(data.IDNO.profile.third_name);
                    $('#last_name').val(data.IDNO.profile.last_name);
                    //                        $('#address').val(data.IDNO.profile.address);
                    $('span.card-title').remove();
                    //                        $('.card-header').append('<span class="card-title" style="color: red;font-size: 12px;">مواطن مسجل مسبقاً، عدد طلباته ('+data.ORDERS+')</span>');

                }
                , error: function(data) {
                    $.ajax({
                        type: "GET"
                        , url: '{{route('getuserData')}}'
                        , beforeSend: function(xhr) {
                            xhr.overrideMimeType("text/plain; charset=utf-8");
                        }
                        , data: {
                            P_DOC_ID: P_DOC_ID
                        }
                        , success: function(data) {
                            var obj = JSON.parse(data);
                            $('form').trigger("reset");
                            $('.select2_').val('').trigger("change");
                            $('#common_name').addClass('d-none');
                            $('span.card-title').remove();
                            KTApp.unblock(".card-shadowless");
                            $('#identity_number').val(P_DOC_ID);
                            $('#first_name').val(obj.FNAME_ARB);
                            $('#second_name').val(obj.SNAME_ARB);
                            $('#third_name').val(obj.TNAME_ARB);
                            $('#last_name').val(obj.LNAME_ARB);
                            $('#SEX').val(obj.SEX);
                            $('#SOCIAL_STATUS').val(obj.SOCIAL_STATUS);
                            //                                $('#address').val(obj.STREET_ARB);

                            var FIRST_NAME = $("#first_name").val();
                            var SECOND_NAME = $("#second_name").val();
                            var THIRD_NAME = $("#third_name").val();
                            var LAST_NAME = $("#last_name").val();
                            var SEX = $("#SEX").val();
                            var SOCIAL_STATUS = $("#SOCIAL_STATUS").val();

                            $.ajax({
                                type: "get"
                                , url: '{{route('insertuserData')}}'
                                , beforeSend: function(xhr) {
                                    xhr.overrideMimeType("text/plain; charset=utf-8");
                                }
                                , data: {
                                    P_DOC_ID: P_DOC_ID
                                    , first_name: FIRST_NAME
                                    , second_name: SECOND_NAME
                                    , third_name: THIRD_NAME
                                    , last_name: LAST_NAME
                                    , sex: SEX
                                    , social_status: SOCIAL_STATUS,
                                    //                                user_id: user_id
                                }
                                , success: function(data) {
                                    var obj = JSON.parse(data);
                                    //                                console.log(obj)
                                    $('#user_id').val(obj.id);
                                }
                                , error: function(data) {
                                    //                                $('#user_id').val('');
                                }
                            });
                        }

                    });
                }
            });

            //EndFunction
        }

    });

</script>

<script type="text/javascript">
    $('#kt_select2_111').select2({
        placeholder: 'ابحث في الهوية'
        , ajax: {
            url: "{{ route('notices.fetch_id') }}"
            , dataType: 'json'
            , delay: 250
            , processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.identity_number
                            , id: item.identity_number
                        , }

                    })
                };
            }
            , cache: true
        }
    });

</script>
<script type="text/javascript">
    $('#kt_select2_222').select2({
        placeholder: 'ابحث في الاسم'
        , ajax: {
            url: "{{ route('notices.fetch_name') }}"
            , dataType: 'json'
            , delay: 250
            , processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.name
                            , id: item.id
                        }
                    })
                };
            }
            , cache: true
        }
    });

</script>
<script type="text/javascript">
    $('#kt_select2_333').select2({
        placeholder: 'ابحث في رقم الاشتراك'
        , ajax: {
            url: "{{ route('notices.fetch_jebaia') }}"
            , dataType: 'json'
            , delay: 250
            , processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.jebaia_no
                            , id: item.jebaia_no
                        }
                    })
                };
            },
            //                cache: true
        }
    });

</script>

<script>
    $('#join_').change(function() {
        if ($(this).is(":checked")) {
            $('#common_name').removeClass('d-none');
        } else {
            $('#common_name').addClass('d-none');
        }
    });

</script>
<script>
    $('.container-fluid .create_req_append').append('<a href="{{route('notices.index')}}" style="padding: 10px;margin-left:43px" class="btn btn-primary font-weight-bolder">' +
        '	الرجوع إلى قائمة الإخطارات</a>')

</script>


@endsection
