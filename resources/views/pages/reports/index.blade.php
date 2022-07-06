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
                            <label>اسم الطفل:</label>
                            <input id="children" name="children" type="text"
                                class="form-control datatable-input" placeholder="اسم الطفل" data-col-index="4">
                        </div>
                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <label>رقم الهوية</label>
                            <input id="identity" name="identity" type="number"
                                class="form-control datatable-input" placeholder="رقم الهوية :0000000000" data-col-index="4">
                        </div>

                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <label> تاريخ الميلاد</label>
                            {!! theme()->getSvgIcon('icons/duotune/general/gen014.svg', 'svg-icon svg-icon-2 position-absolute mx-4') !!}
                            <input id="bth_date" class="form-control  ps-12 datatable-input flatpickr-input "
                                placeholder="{{ __('Select a date') }}" name="bth_date" type="text"
                                value="{{ old('bth_date') }}" readonly>
                         
                        </div>

                        

                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <label>العام الدراسي:</label>
                            <select id="year" name="year" class="form-control datatable-input" data-col-index="2">
                                <option value="">اختيار السنة الدراسية</option>
                                @foreach ($years as $year)
                                <option value="{{$year->id}}">{{$year->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="row mb-6">
                        <div class="col-lg-4 mb-lg-0 mb-6">
                            <label>عنوان الطفل</label>
                            <input id="address" name="address" type="text"
                            class="form-control datatable-input" placeholder="ادخل العنوان" data-col-index="4">
                        </div>

                        

                        <div class="col-lg-4 mb-lg-0 mb-6">
                            <label> تاريخ التسجيل/  من </label>
                            {!! theme()->getSvgIcon('icons/duotune/general/gen014.svg', 'svg-icon svg-icon-2 position-absolute mx-4') !!}
                            <input id="start_date" class="form-control  ps-12 datatable-input flatpickr-input "
                                placeholder="{{ __('Select a date') }}" name="start_date" type="text"
                                value="{{ old('start_date') }}" readonly>
                         
                        </div>

                        <div class="col-lg-4 mb-lg-0 mb-6">
                            <label> تاريخ التسجيل/  الى </label>
                            {!! theme()->getSvgIcon('icons/duotune/general/gen014.svg', 'svg-icon svg-icon-2 position-absolute mx-4') !!}
                            <input id="end_date" class="form-control  ps-12 datatable-input flatpickr-input "
                                placeholder="{{ __('Select a date') }}" name="end_date" type="text"
                                value="{{ old('end_date') }}" readonly>
                         
                        </div>



                       
                    </div>

                    <div class="row mb-6">
                        <div class="col-lg-4 mb-lg-0 mb-6">
                            <label>اسم ولي الأمر</label>
                            <input id="father_name" name="father_name" type="text"
                            class="form-control datatable-input" placeholder="ادخل الاسم " data-col-index="4">
                        </div>

                        <div class="col-lg-4 mb-lg-0 mb-6">
                            <label>رقم هوية ولي الأمر</label>
                            <input id="father_identity" name="father_identity" type="text"
                            class="form-control datatable-input" placeholder="ادخل الرقم " data-col-index="4">
                        </div>

                        <div class="col-lg-4 mb-lg-0 mb-6">
                            <label>الرقم المحمول لولي الأمر</label>
                            <input id="mobile" name="mobile" type="text"
                            class="form-control datatable-input" placeholder="ادخل الهاتف " data-col-index="4">
                        </div>

                        

        

                       
                    </div>
                   

                    <div class="row mb-6">
                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <label>المربية:</label>
                            <select id="employee_id" name="employee_id" class="form-control datatable-input"
                                data-col-index="2">
                                <option value="">اختر مربية</option>
                                @foreach ($employees as $children)
                                    <option value="{{ $children->id }}">{{ $children->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <label>المرحلة الدراسية:</label>
                            <select id="level_id" name="level_id" class="form-control datatable-input"
                                data-col-index="2">
                                <option value="">اختر المرحلة</option>
                                @foreach ($levels as $children)
                                    <option value="{{ $children->id }}">{{ $children->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <label>الشعبة:</label>
                            <select id="division_id" name="division_id" class="form-control datatable-input"
                                data-col-index="2">
                                <option value="">اختر شعبة</option>
                                @foreach ($divisions as $children)
                                    <option value="{{ $children->id }}">{{ $children->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <label>الفترة الدراسية:</label>
                            <select id="period_id" name="period_id" class="form-control datatable-input"
                                data-col-index="2">
                                <option value="">اختر طالب</option>
                                @foreach ($periods as $children)
                                    <option value="{{ $children->id }}">{{ $children->name }}</option>
                                @endforeach
                            </select>
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
                           

                            <button class="btn btn-secondary btn-secondary--icon" type="reset" id="kt_reset">
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
                @include('pages.reports.parts._table')
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</x-base-layout>