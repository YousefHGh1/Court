<div class="courts_print">
    <div dir="rtl" id="courts_print_" style="font-size: 20px;display: none">
        <div class="overflow-hidden card card-custom position-relative">
            <!--begin::Invoice header-->
            <div class="px-8 py-8 row justify-content-center ">
                <div class="col-md-9">
                    <div class="">
                        <h6 class="order-1 text-black font-weight-boldest order-md-2">
                            <h2>لدى دائرة التنفيذ
                                بمحكمة بداية شمال غزة</h2>
                            <h2> <u>في القضية التنفيذية رقم ............ / 2023</u> </h2>
                        </h6>
                    </div>
                </div>
            </div>
            <!--end::Invoice header-->
            <div class="p-5 row justify-content-center">
                <div class="col-md-12">
                    <!--begin::Invoice body-->
                    <div class="pb-5 row">
                        <div class="col-md-8 border-right-md pr-md-10 py-md-10">
                            <!--begin::عرض المراسلة-->
                            <div class="font-weight-bold d-flex justify-content-between"> طالب التنفيذ : بلدية جباليا النزلة _
                                يمثلهاالسيد/أ.{{$summoner->summoner}} رئيس البلدية<br />بممثلها القاانوني /خطاب شهاب


                                <div style="float: left;">
                                    {{-- {{ 'رقم الهوية : ' }} --}}
                                    <input type="number">
                                </div>

                            </div>
                            <!--end::عرض المراسلة-->
                            <br />

                            <!--begin::اسم الموظف-->
                            <div class=" mb-10 font-size-lg font-weight-bold d-flex justify-content-between">
                                اسم المنفذ ضده:
                                عبد الشافعي
                                {{-- @php
                                    $recipients = explode(', ', $archiveNot->reciver);
                                @endphp
                                @foreach ($recipients as $recipient)
                                    <li>{{ $recipient }} <br /></li>
                                @endforeach --}}

                                <div style="float: left;">
                                    {{ 'رقم الهوية : ' }}
                                    <input type="number">
                                </div>
                            </div>

                            <!--begin::التاريخ-->
                            <div class="mb-10 font-size-lg font-weight-bold">عنوان المنفذ ضده :
                                {{-- <td>{{ date_format($archiveNot->created_at, 'd M Y') }}</td> --}}
                            </div>
                            <!--end::التاريخ-->

                            <div class="checkbox-inline">
                                <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                    <input type="checkbox" name="Checkboxes15_1" />
                                    <span></span>
                                    حكم نظامي </label>
                                <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                    <input type="checkbox" name="Checkboxes15_1" />
                                    <span></span>
                                    حكم شرعي
                                </label>
                                <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                    <input type="checkbox" name="Checkboxes15_1" />
                                    <span></span>
                                    سند دين منظم
                                </label>
                                <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                    <input type="checkbox" name="Checkboxes15_1" />
                                    <span></span>
                                    كمبيالة </label>
                                <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                    <input type="checkbox" name="Checkboxes15_1" />
                                    <span></span>
                                    شيك
                                </label>
                                <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                    <input type="checkbox" name="Checkboxes15_1" />
                                    <span></span>
                                    سند رسمي
                                </label>
                                <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                    <input type="checkbox" name="Checkboxes15_1" />
                                    <span></span>
                                    سند عرفي
                                </label>
                            </div>
                        </div>

                    </div>


                    <div>
                        <div class=" form-group row">
                            <label for="" class="col-lg-2 col-form-label ">
                                <h6><strong>رقم السند التنفيذي:</strong></h6>
                            </label>
                            <div class="col-lg-5">
                                <div class=" checkbox-inline mt-3">
                                    <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                        <input type="checkbox" name="Checkboxes15_1" />
                                        <span></span>
                                        رقم الشيك
                                    </label>
                                    <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                        <input type="checkbox" name="Checkboxes15_1" />
                                        <span></span>
                                        رقم سند الدين
                                    </label>
                                    <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                                        <input type="checkbox" name="Checkboxes15_1" />
                                        <span></span>
                                        رقم الدعوى
                                    </label>
                                </div>
                            </div>

                        </div>




                        <div class=" font-size-lg font-weight-bold d-flex pb-5">
                            <label for="" class="col-lg-2 col-form-label ">
                                <h6><strong>عدد السندات التنفيذية:</strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group ">
                                    <input type="number" class="form-control" />
                                </div>
                            </div>
                        </div>

                        <div class=" font-size-lg font-weight-bold d-flex pb-5">
                            <label for="" class="col-lg-2 col-form-label ">
                                <h6><strong>قيمة السند التنفيذي:</strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input type="number" class="form-control" />
                                </div>
                            </div>
                        </div>


                        <div class=" font-size-lg font-weight-bold d-flex pb-5">
                            <label for="" class="col-lg-2 col-form-label ">
                                <h6><strong>قيمة المبلغ محل التنفيذ:</strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input type="number" class="form-control" />
                                </div>
                            </div>
                        </div>

                        <div class=" font-size-lg font-weight-bold d-flex pb-5">
                            <label for="" class="col-lg-2 col-form-label ">
                                <h6><strong>قيمة الرسوم والمصاريف:</strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input type="number" class="form-control" />
                                </div>
                            </div>
                        </div>

                        <div style="padding-right: 150px; padding-bottom: 15px;"> {{ '(معزوه  مشروحات رئيس قلم المحكمة المختصة)' }}</div>

                        <div class=" font-size-lg font-weight-bold d-flex justify-content-space pb-5">
                            <label for="" class="col-lg-3 col-form-label ">
                                <h6><strong>قيمة المبلغ الإجمالي المطلوب تنفيذه:</strong></h6>
                            </label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input type="number" class="form-control" />
                                </div>
                            </div>
                        </div>




                    </div>


                    <div class="mb-5 font-size-lg font-weight-bold "> قيمة الرسوم والمصاريف
                        التنفيذية.................................. المجموع
                        ........................................<br />
                        تقديم التنفيذ المذكور أعلاه / وكيله بالسند التنفيذي والمرفق بهذا الطلب لتنفيذه لدى الدائرة
                        طبقالأحكام القانون التنفيذ الفلسطيني رقم 23 لسنة 2005 <br>
                        تاريخ تقديم الطلب :{{ '' }} <br>


                    </div>


                    <div class="mb-5 font-size-lg font-weight-bold d-flex justify-content-around">
                        ممثلها القانوني / <br>
                        قيمة رسم التنفيذ

                        <div class="" style="text-align: center;">
                            قرار <br>
                            لا مانع من فتح قضية تنفيذية وتحصيل الرسوم <br>
                            من أول دفعة تسديد للمحكوم لها <br>
                            قاضي التنفيذ
                        </div>
                    </div>



                </div>


                <!--end::Invoice body-->
            </div>
        </div>
    </div>
</div>
