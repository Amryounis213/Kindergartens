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
                            <label>نوع المصروف:</label>
                            <select id="expense_id" name="expense_id" class="form-control datatable-input"
                                data-col-index="2">
                                <option value="">اختر نوع المصروف  </option>
                                @foreach ($expenses as $incomes)
                                    <option value="{{ $incomes->id }}">{{ $incomes->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <label>اسم المستلم :</label>
                            <input name="rec_name" id="rec_name" type="text" class="form-control datatable-input"
                                placeholder="" data-col-index="4">
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
                        <div class="col-lg-2 mb-lg-0 mb-6">
                            <label>قيمة الدفعة :</label>
                            <input id="payment_amount2" name="payment_amount" type="text"
                                class="form-control datatable-input" placeholder="المبلغ المدفوع" data-col-index="4">
                        </div>
                        <div class="col-lg-2 mb-lg-0 mb-6">
                            <label>تاريخ الدفع</label>
                            {!! theme()->getSvgIcon('icons/duotune/general/gen014.svg', 'svg-icon svg-icon-2 position-absolute mx-4') !!}
                            <input id="payment_date" class="form-control  ps-12 datatable-input flatpickr-input "
                                placeholder="{{ __('Select a date') }}" name="payment_date" type="text"
                                value="{{ old('payment_date') }}" readonly>
                            {{-- <label>تاريخ الدفع</label>
                            <input id="payment_date" name="payment_date"  type="text" class="form-control datatable-input flatpickr-input" placeholder="" data-col-index="4"> --}}
                        </div>
                        <div class="col-lg-2 mb-lg-0 mb-6">
                            <label>رقم الوصل :</label>
                            <input name="Receipt_number" id="Receipt_number" type="text"
                                class="form-control datatable-input" placeholder="" data-col-index="4">
                        </div>
                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <label>ملاحظات :</label>
                            <input name="notices" id="notices" type="text" class="form-control datatable-input"
                                placeholder="" data-col-index="4">
                        </div>
                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <button class="btn btn-success btn-success--icon mt-5" id="sub">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>تسديد المصروف</span>
                                </span>
                            </button>&nbsp;&nbsp;
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
                @include('pages.expense-pay.parts._table')
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</x-base-layout>