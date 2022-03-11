<x-base-layout>
    <div id="kt_content" class="content d-flex flex-column flex-column-fluid">

        <div class="row g-5 g-xl-8">
            <div class="col-xl-4">
                <!--begin::Statistics Widget 1-->
                <div class="card bgi-no-repeat card-xl-stretch mb-xl-8"
                     style="background-position: right top; background-size: 30% auto; background-image: url({{'/demo1/media/svg/shapes/abstract-4.svg'}})">
                    <!--begin::Body-->
                    <div class="card-body">
                        <a @can('orders.show') href="{{route('order.index')}}" @endcan
                        class="card-title fw-bolder text-muted text-hover-primary fs-4 show-menu-bdg">طلبات الفحص الطبي</a>
                        <span class="home-crd-bdg"></span>
                        <div class="fw-bolder text-primary fs-3qx" data-kt-countup="true"
                             data-kt-countup-value="{{$ordersCount}}">0
                        </div>
                        <br>عدد طلبات العلاج المسجلة اليوم</p>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Statistics Widget 1-->
            </div>
            <div class="col-xl-4">
                <!--begin::Statistics Widget 1-->
                <div class="card bgi-no-repeat card-xl-stretch mb-xl-8"
                     style="background-position: right top; background-size: 30% auto; background-image:  url({{'/demo1/media/svg/shapes/abstract-2.svg'}})">
                    <!--begin::Body-->
                    <div class="card-body">
                        <a @can('patients.show') href="{{route('patient.index')}}" @endcan
                        class="card-title fw-bolder text-muted text-hover-primary fs-4">ملفات المرضى</a>
                        <div class="fw-bolder text-primary fs-3qx" data-kt-countup="true"
                             data-kt-countup-value="{{$patientsCount}}">0
                        </div>
                        <br>عدد ملفات المرضى المدخلة على النظام</p>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Statistics Widget 1-->
            </div>
            <div class="col-xl-4">
                <!--begin::Statistics Widget 1-->
                <div class="card bgi-no-repeat card-xl-stretch mb-5 mb-xl-8"
                     style="background-position: right top; background-size: 30% auto; background-image: url({{'/demo1/media/svg/shapes/abstract-1.svg'}})">
                    <!--begin::Body-->
                    <div class="card-body">
                        <a @can('clinics.show') href="{{route('clinic.index')}}" @endcan
                        class="card-title fw-bolder text-muted text-hover-primary fs-4">العيادات</a>
                        <div class="fw-bolder text-primary fs-3qx" data-kt-countup="true"
                             data-kt-countup-value="{{$clinicsCount}}">0
                        </div>
                        <br>عدد العيادات العاملة في المستشفى</p>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Statistics Widget 1-->
            </div>
        </div>
        <div class="row g-5 g-xl-8">
            <div class="col-xl-4">
                <!--begin::Statistics Widget 1-->
                <div class="card bgi-no-repeat card-xl-stretch mb-xl-8"
                     style="background-position: right top; background-size: 30% auto; background-image: url({{'/demo1/media/svg/shapes/abstract-3.svg'}})">
                    <!--begin::Body-->
                    <div class="card-body">
                        <a @can('checkups.show') href="{{route('checkup.index')}}" @endcan
                        class="card-title fw-bolder text-muted text-hover-primary fs-4">المختبر</a>
                        <div class="fw-bolder text-primary fs-3qx" data-kt-countup="true"
                             data-kt-countup-value="{{$checkupCount}}">0
                        </div>
                        <br>عدد تحاليل المختبر المسجلة حتى تاريخ اليوم</p>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Statistics Widget 1-->
            </div>
            <div class="col-xl-4">
                <!--begin::Statistics Widget 1-->
                <div class="card bgi-no-repeat card-xl-stretch mb-xl-8"
                     style="background-position: right top; background-size: 30% auto; background-image:  url({{'/demo1/media/svg/shapes/abstract-4.svg'}})">
                    <!--begin::Body-->
                    <div class="card-body">
                        <a @can('xrays.show') href="{{route('xray.index')}}" @endcan
                        class="card-title fw-bolder text-muted text-hover-primary fs-4">الأشعة</a>
                        <div class="fw-bolder text-primary fs-3qx" data-kt-countup="true"
                             data-kt-countup-value="{{$xrayCount}}">0
                        </div>
                        <br>عدد صور الأشعة المسجلة حتى تاريخ اليوم</p>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Statistics Widget 1-->
            </div>
            <div class="col-xl-4">
                <!--begin::Statistics Widget 1-->
                <div class="card bgi-no-repeat card-xl-stretch mb-5 mb-xl-8"
                     style="background-position: right top; background-size: 30% auto; background-image: url({{'/demo1/media/svg/shapes/abstract-2.svg'}})">
                    <!--begin::Body-->
                    <div class="card-body">
                        <a @can('medicines.show') href="{{route('medicine.index')}}" @endcan
                        class="card-title fw-bolder text-muted text-hover-primary fs-4">الصيدلية</a>
                        <div class="fw-bolder text-primary fs-3qx" data-kt-countup="true"
                             data-kt-countup-value="{{$medicineCount}}">0
                        </div>
                        <br>عدد الأدوية المسجلة حتى تاريخ اليوم</p>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Statistics Widget 1-->
            </div>
        </div>
        <!--begin::Row-->
        {{--    <div class="row gy-5 g-xl-8">--}}
        {{--        <!--begin::Col-->--}}
        {{--        <div class="col-xxl-4">--}}
        {{--            {{ theme()->getView('partials/widgets/mixed/_widget-2', array('class' => 'card-xxl-stretch', 'chartColor' => 'danger', 'chartHeight' => '200px')) }}--}}
        {{--        </div>--}}
        {{--        <!--end::Col-->--}}

        {{--        <!--begin::Col-->--}}
        {{--            <div class="col-xxl-4">--}}
        {{--                {{ theme()->getView('partials/widgets/lists/_widget-5', array('class' => 'card-xxl-stretch')) }}--}}
        {{--            </div>--}}
        {{--            <!--end::Col-->--}}

        {{--            <!--begin::Col-->--}}
        {{--            <div class="col-xxl-4">--}}
        {{--                {{ theme()->getView('partials/widgets/mixed/_widget-7', array('class' => 'card-xxl-stretch-50 mb-5 mb-xl-8', 'chartColor' => 'primary', 'chartHeight' => '150px')) }}--}}

        {{--                {{ theme()->getView('partials/widgets/mixed/_widget-10', array('class' => 'card-xxl-stretch-50 mb-5 mb-xl-8', 'chartColor' => 'primary', 'chartHeight' => '175px')) }}--}}
        {{--            </div>--}}
        {{--        <!--end::Col-->--}}
        {{--    </div>--}}
        <!- -end::Row-->

        {{--    <!--begin::Row-->--}}
        {{--    <div class="row gy-5 gx-xl-8">--}}
        {{--        <!--begin::Col-->--}}
        {{--        <div class="col-xxl-4">--}}
        {{--            {{ theme()->getView('partials/widgets/lists/_widget-3', array('class' => 'card-xxl-stretch mb-xl-3')) }}--}}
        {{--        </div>--}}
        {{--        <!--end::Col-->--}}

        {{--        <!--begin::Col-->--}}
        {{--        <div class="col-xl-8">--}}
        {{--            {{ theme()->getView('partials/widgets/tables/_widget-9', array('class' => 'card-xxl-stretch mb-5 mb-xl-8')) }}--}}
        {{--        </div>--}}
        {{--        <!--end::Col-->--}}
        {{--    </div>--}}
        {{--    <!--end::Row-->--}}

        {{--    <!--begin::Row-->--}}
        {{--    <div class="row gy-5 g-xl-8">--}}
        {{--        <!--begin::Col-->--}}
        {{--        <div class="col-xl-4">--}}
        {{--            {{ theme()->getView('partials/widgets/lists/_widget-2', array('class' => 'card-xl-stretch mb-xl-8')) }}--}}
        {{--        </div>--}}
        {{--        <!--end::Col-->--}}

        {{--        <!--begin::Col-->--}}
        {{--        <div class="col-xl-4">--}}
        {{--            {{ theme()->getView('partials/widgets/lists/_widget-6', array('class' => 'card-xl-stretch mb-xl-8')) }}--}}
        {{--        </div>--}}
        {{--        <!--end::Col-->--}}

        {{--        <!--begin::Col-->--}}
        {{--        <div class="col-xl-4">--}}
        {{--            {{ theme()->getView('partials/widgets/lists/_widget-4', array('class' => 'card-xl-stretch mb-5 mb-xl-8', 'items' => '5')) }}--}}
        {{--        </div>--}}
        {{--        <!--end::Col-->--}}
        {{--    </div>--}}
        {{--    <!--end::Row-->--}}

        {{--    <!--begin::Row-->--}}
        {{--    <div class="row g-5 gx-xxl-8">--}}
        {{--        <!--begin::Col-->--}}
        {{--        <div class="col-xxl-4">--}}
        {{--            {{ theme()->getView('partials/widgets/mixed/_widget-5', array('class' => 'card-xxl-stretch mb-xl-3', 'chartColor' => 'success', 'chartHeight' => '150px')) }}--}}
        {{--        </div>--}}
        {{--        <!--end::Col-->--}}

        {{--        <!--begin::Col-->--}}
        {{--        <div class="col-xxl-8">--}}
        {{--            {{ theme()->getView('partials/widgets/tables/_widget-5', array('class' => 'card-xxl-stretch mb-5 mb-xxl-8')) }}--}}
        {{--        </div>--}}
        {{--        <!--end::Col-->--}}
        {{--    </div>--}}
        {{--    <!--end::Row-->--}}
    </div>
</x-base-layout>

