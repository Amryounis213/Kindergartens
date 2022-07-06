<x-base-layout>
    @include('layout.error')
    <!--begin::Container-->
    <div id="kt_content" class="content d-flex flex-column flex-column-fluid">

        <div class="card card-custom mb-3">

            <div class="card-body">
                <!--begin: Search Form-->
                <form class="mb-5">
                    <div class="row mb-6">
                       
                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <label>العام الدراسي:</label>
                            <select id="year" name="year" class="form-control datatable-input" data-col-index="2">
                                <option value="">اختيار السنة الدراسية</option>
                                @foreach ($years as $year)
                                <option value="{{$year->id}}">{{$year->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <label> تاريخ الدفعة /  من </label>
                            {!! theme()->getSvgIcon('icons/duotune/general/gen014.svg', 'svg-icon svg-icon-2 position-absolute mx-4') !!}
                            <input id="start_date" class="form-control  ps-12 datatable-input flatpickr-input "
                                placeholder="{{ __('Select a date') }}" name="start_date" type="text"
                                value="{{ old('start_date') }}" readonly>
                         
                        </div>

                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <label> تاريخ الدفعة/  الى </label>
                            {!! theme()->getSvgIcon('icons/duotune/general/gen014.svg', 'svg-icon svg-icon-2 position-absolute mx-4') !!}
                            <input id="end_date" class="form-control  ps-12 datatable-input flatpickr-input "
                                placeholder="{{ __('Select a date') }}" name="end_date" type="text"
                                value="{{ old('end_date') }}" readonly>
                         
                        </div>


                    </div>
               


                    <div class="row mt-8">
                        <div class="col-lg-12">
                            <a class="btn btn-primary btn-primary--icon" id="sub">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>فلترة</span>
                                </span>
                            </a>&nbsp;&nbsp;
                           

                            <button class="btn btn-secondary btn-secondary--icon" type="button" id="kt_reset">
                                <span>
                                    <i class="la la-close"></i>
                                    <span>افراغ الخانات</span>
                                </span>
                            </button>
                        </div>
                    </div>


                   

                </form>
                <!--begin: Datatable-->
                <!--begin: Datatable-->

                <!--end: Datatable-->
            </div>
        </div>


        <!--begin::Card-->
        <div class="card">


            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->

                <!--begin::Card title-->


            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                @include('pages.reports.in._table')
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</x-base-layout>