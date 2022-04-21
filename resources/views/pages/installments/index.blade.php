<x-base-layout>
    @include('layout.error')
    <!--begin::Container-->

    @section('styles')
        <style>
            input[type="text"]:disabled {
                background: #f3f3f3;
            }

            /* Chrome, Safari, Edge, Opera */
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            /* Firefox */
            input[type=number] {
                -moz-appearance: textfield;
            }

        </style>
    @endsection

    <div id="kt_content" class="content d-flex flex-column flex-column-fluid">

        <div class="card card-custom mb-3">

            <div class="card-body">
                <!--begin: Search Form-->
                <form class="mb-5" id="details_form">
                    <div class="row mb-6">
                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <label>اسم الطالب:</label>
                            <select id="children_id" name="children_id" class="form-control datatable-input"
                                data-col-index="2">
                                <option value="">اختر طالب</option>
                                @foreach ($childrens as $children)
                                    <option value="{{ $children->id }}">{{ $children->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <label>العام الدراسي:</label>
                            <select id="year" name="year" class="form-control datatable-input" data-col-index="2">
                                <option value="">Select</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <div class="col-lg-4 mb-lg-0 mb-6">
                            <h2 class="mt-4 text-center ">المبلغ المطلوب <span class="text-success h5">(شيكل)</span>
                            </h2>
                            <h3 id="required_amount" class="h3 mt-4 text-center text-danger">00.0</h3>

                        </div>
                        <div class="col-lg-4 mb-lg-0 mb-6">
                            <h2 class="mt-4 text-center ">المبلغ المدفوع <span class="text-success h5">(شيكل)</span>
                            </h2>
                            <h3 id="payment_amount" class="h3 mt-4 text-center text-success">00.0</h3>

                        </div>

                        <div class="col-lg-4 mb-lg-0 mb-6">
                            <h2 class="mt-4 text-center ">المبلغ المتبقي <span class="text-success h5">(شيكل)</span>
                            </h2>
                            <h3 id="total_amount" class="h3 mt-4 text-center text-info">00.0</h3>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <div class="col-lg-2 mb-lg-0 mb-6">
                            <label>المبلغ المراد تقسيطه :</label>
                            <input disabled id="payment_amount2" name="payment_amount" type="text"
                                class="form-control datatable-input" placeholder="  المبلغ المراد تقسيطه"
                                data-col-index="4">
                        </div>
                        <div class="col-lg-2 mb-lg-0 mb-6">
                            <label>عدد الأقساط :</label>
                            <input min="1" max="8" name="no_of_installment" id="no_of_installment" type="number"
                                class="form-control datatable-input" placeholder="" data-col-index="4" >
                        </div>
                        <div class="col-lg-2 mb-lg-0 mb-6">
                            <label>تاريخ أول قسط</label>
                            {!! theme()->getSvgIcon('icons/duotune/general/gen014.svg', 'svg-icon svg-icon-2 position-absolute mx-4') !!}
                            <input disabled id="start_date" class="form-control   datatable-input flatpickr-input  "
                                placeholder="{{ __('Select a date') }}" name="start_date" type="text"
                                value="{{ old('start_date') }}" readonly>
                            {{-- <label>تاريخ الدفع</label>
                            <input id="payment_date" name="payment_date"  type="text" class="form-control datatable-input flatpickr-input" placeholder="" data-col-index="4"> --}}
                        </div>
                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <label>ملاحظات :</label>
                            <input name="notices" id="notices" type="text" class="form-control datatable-input"
                                placeholder="" data-col-index="4">
                        </div>
                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <button class="btn btn-primary btn-primary--icon mt-5" id="sub">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>جدولة الاقساط</span>
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
                @include('pages.installments.parts._table')
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</x-base-layout>
