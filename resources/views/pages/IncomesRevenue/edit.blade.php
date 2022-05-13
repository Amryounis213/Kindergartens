<x-base-layout>
    <div id="kt_content" class="content d-flex flex-column flex-column-fluid">
        <div class="card card-custom mb-3">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                data-bs-target="#kt_account_profile_details" aria-expanded="true"
                aria-controls="kt_account_profile_details">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0 b-1"> تعديل دفعة للايراد </h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->
            <div class="card-body">
                <!--begin: Search Form-->
                <form class="mb-5" action="{{ route('incomes-revenue.update', $income->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-6">
                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <label>نوع الايراد:</label>
                            <select id="income_id" name="income_id" class="form-control datatable-input"
                                data-col-index="2">
                                <option value="">اختر الايراد </option>
                                @foreach ($incomes as $incomes)
                                    <option value="{{ $incomes->id }}" selected>{{ $incomes->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <label>اسم الطالب:</label>
                            <select id="children_id" disabled name="children_id" class="form-control datatable-input"
                                data-col-index="2">
                                <option value="">اختر طالب</option>
                                @foreach ($childrens as $children)
                                    <option value="{{ $children->id }}"
                                        {{ $children->id == $income->children_id ? 'selected' : '' }}>
                                        {{ $children->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-1 mb-lg-0 mb-6">
                            <label>مرتبط بطفل:</label>
                            <div class="form-check form-check-solid form-switch mt-4">
                                <input data-id="{{-- $model->id --}}" class="form-check-input w-45px h-30px sts-fld"
                                    type="checkbox" id="status_{{-- $model->id --}}" name="status" value="1"
                                    {{-- old('status', $model->status ?? '') == 1 ? 'checked' : '' --}} />
                            </div>
                        </div>
                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <label>العام الدراسي:</label>
                            <select id="year" name="year" class="form-control datatable-input" data-col-index="2">
                                <option value="">اختيار السنة الدراسية</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year->id }}" selected>{{ $year->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="row mb-6">
                        <div class="col-lg-2 mb-lg-0 mb-6">
                            <label>قيمة الدفعة :</label>
                            <input id="payment_amount2" name="payment_amount" type="text"
                                class="form-control datatable-input" placeholder="المبلغ المدفوع" data-col-index="4"
                                value="{{ $income->payment_amount }}">
                        </div>
                        <div class="col-lg-2 mb-lg-0 mb-6">
                            <label>تاريخ الدفع</label>
                            {!! theme()->getSvgIcon('icons/duotune/general/gen014.svg', 'svg-icon svg-icon-2 position-absolute mx-4') !!}
                            <input id="payment_date" class="form-control  ps-12 datatable-input flatpickr-input "
                                placeholder="{{ __('Select a date') }}" name="payment_date" type="text"
                                value="{{ $income->payment_date }}" readonly>
                            {{-- <label>تاريخ الدفع</label>
                            <input id="payment_date" name="payment_date"  type="text" class="form-control datatable-input flatpickr-input" placeholder="" data-col-index="4"> --}}
                        </div>
                        <div class="col-lg-2 mb-lg-0 mb-6">
                            <label>رقم الوصل :</label>
                            <input name="Receipt_number" id="Receipt_number" type="text"
                                class="form-control datatable-input" placeholder=""
                                value="{{ $income->Receipt_number }}" data-col-index="4">
                        </div>
                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <label>ملاحظات :</label>
                            <input name="notices" id="notices" type="text" class="form-control datatable-input"
                                placeholder="" data-col-index="4" value="{{ $income->notices }}">
                        </div>
                        <div class="col-lg-3 mb-lg-0 mb-6">
                            <button class="btn btn-primary btn-primary--icon mt-5" id="sub">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>تعديل الدفعة</span>
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
    </div>
    @section('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @endsection
    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script type="text/javascript">
            $(".flatpickr-input").flatpickr();
        </script>
        <script>
            let zero = $('#status_').val(0);
            $('#status_').change(function() {
                if ($('#status_').val() == 0) {
                    $('#status_').val(1);
                    $('#children_id').attr('disabled', false);
                } else {
                    $('#status_').val(0);
                    $('#children_id').attr('disabled', true);
                    $('#children_id').val(null);
                   
                }

            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function(e) {
                FormValidation.formValidation(
                    document.getElementById('details_form'), {
                        fields: {
                            year: {
                                validators: {
                                    notEmpty: {
                                        message: 'السنة الدراسية مطلوبة',
                                    },
                                },
                            },
                            subsraction_id: {
                                validators: {
                                    notEmpty: {
                                        message: 'اسم الاشتراك مطلوب',
                                    },
                                },
                            },

                            price: {
                                validators: {
                                    notEmpty: {
                                        message: 'السعر  مطلوب',
                                    },

                                    regexp: {
                                        regexp: /^[0-9]+$/,
                                        message: ' السعر فقط أرقام',
                                    },
                                },
                            },

                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            submitButton: new FormValidation.plugins.SubmitButton(),
                            defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                            bootstrap: new FormValidation.plugins.Bootstrap5(),
                        },
                    });
            });
        </script>
    @endsection
</x-base-layout>
