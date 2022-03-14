<x-base-layout>
    <div id="kt_content" class="content d-flex flex-column flex-column-fluid">
        <!--begin::Basic info-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                 data-bs-target="#kt_account_profile_details" aria-expanded="true"
                 aria-controls="kt_account_profile_details">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">تعديل السائق | {{$driver->name}}</h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->
            <!--begin::Content-->
            <div id="kt_account_profile_details" class="collapse show">
                <!--begin::Form-->
                <form id="details_form" class="form" method="POST" action="{{ route('drivers.update' , $driver->id) }}"
                      enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">اختيار الروضة</label>
                            <div class="col-lg-8 fv-row">
                                <select name="kindergarten_id" aria-label="اختر  الروضة." data-control="select2"
                                    data-placeholder="اختر  الروضة..."
                                    class="form-select form-select-solid form-select-lg period_id"
                                    {{ Auth::user()->kindergarten_id !=null ? 'disabled' :'' }}
                                    >
                                    <option value="">اختر  الروضة....</option>
                                    @foreach ($kindergartens as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $driver->kindergarten_id   ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                       
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">اسم السائق</label>
                            <div class="col-lg-8">
                                <input type="text" name="name"
                                       class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 name"
                                       placeholder="اسم السائق" value="{{ $driver->name }}"/>
                            </div>
                        </div>
                        <!--end::Input group-->
                      
                        <div class="row mb-6 fv-plugins-icon-container">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                <span class="required">رقم المحمول</span>
                            </label>
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="mobile" class="form-control form-control-lg form-control-solid mobile" placeholder="رقم المحمول" value="{{ $driver->mobile }}">
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                        </div>

                        
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">رقم الحافلة</label>
                            <div class="col-lg-8">
                                <input type="text" name="bus_no" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 address" placeholder="رقم الحافلة" value="{{ $driver->bus_no }}">
                            </div>
                        </div>
                        
                       
                      

                     
                        <!--begin::Input group-->
                        <div class="row mb-0">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">الحالة</label>
                            <div class="col-lg-8 d-flex align-items-center">
                                <div class="form-check form-check-solid form-switch fv-row">
                                    <input type="hidden" name="status" value="1">
                                    <input class="form-check-input w-45px h-30px" type="checkbox" id="status"
                                           name="status" value="1" checked/>
                                    <label class="form-check-label" for="status"></label>
                                </div>
                            </div>
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Card body-->

                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="reset"
                                class="btn btn-white btn-active-light-primary me-2">{{ __('Discard') }}</button>
                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">
                            @include('partials.general._button-indicator', ['label' => __('Save')])
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Basic info-->
    </div>
    @section('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @endsection
    @section('scripts')

        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script type="text/javascript">$(".flatpickr-input").flatpickr();</script>
        <script>
            document.addEventListener('DOMContentLoaded', function (e) {
                FormValidation.formValidation(
                    document.getElementById('details_form'), {
                        fields: {
                            name: {
                                validators: {
                                    notEmpty: {
                                        message: 'اسم الروضة مطلوب',
                                    },
                                },
                            },
                            identity: {
                                validators: {
                                    notEmpty: {
                                        message: 'رقم الهوية مطلوب',
                                    },
                                    stringLength: {
                                        min: 9,
                                        max: 9,
                                        message: 'رقم الهوية يتكون من 9 خانات',
                                    },
                                    regexp: {
                                        regexp: /^[0-9]+$/,
                                        message: 'رقم الهوية فقط أرقام',
                                    },
                                },
                            },
                            phone: {
                                validators: {
                                    notEmpty: {
                                        message: 'رقم التواصل مطلوب',
                                    },
                                    stringLength: {
                                        min: 10,
                                        max: 10,
                                        message: 'رقم التواصل يتكون من 10 خانات',
                                    },
                                    regexp: {
                                        regexp: /^[0-9]+$/,
                                        message: 'رقم التواصل فقط أرقام',
                                    },
                                },
                            },
                            address: {
                                validators: {
                                    notEmpty: {
                                        message: 'تاريخ الميلاد مطلوب',
                                    },
                                },
                            },
                            states_id: {
                                validators: {
                                    notEmpty: {
                                        message: 'المحافظة مطلوب',
                                    },
                                },
                            },
                            cities_id: {
                                validators: {
                                    notEmpty: {
                                        message: 'المدينة مطلوب',
                                    },
                                },
                            },
                            gender: {
                                validators: {
                                    notEmpty: {
                                        message: 'الجنس مطلوب',
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
