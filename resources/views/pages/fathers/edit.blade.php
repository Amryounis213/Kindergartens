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
                    <h3 class="fw-bolder m-0">  تعديل ولي الأمر |{{$father->name}} </h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->
            <!--begin::Content-->
            <div id="kt_account_profile_details" class="collapse show">
                <!--begin::Form-->
                <form id="details_form" class="form" method="POST" action="{{ route('fathers.update' , $father->id) }}"
                      enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        
                       
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">اسم ولي الأمر</label>
                            <div class="col-lg-8">
                                <input type="text" name="name"
                                       class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 name"
                                       placeholder="اسم ولي الأمر" value="{{ $father->name }}"/>
                            </div>
                        </div>
                        <!--end::Input group-->
                      
                        <div class="row mb-6 fv-plugins-icon-container">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                <span class="required">رقم المحمول</span>
                            </label>
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="mobile" class="form-control form-control-lg form-control-solid mobile  is-valid" placeholder="رقم المحمول" value="{{ $father->mobile }}">
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                        </div>

                        
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">العنوان</label>
                            <div class="col-lg-8">
                                <input type="text" name="address" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 address" placeholder="العنوان"  value="{{ $father->address }}">
                            </div>
                        </div>
                        
                      
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">المهنة</label>
                            <div class="col-lg-8">
                                <input type="text" name="occupation" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 address" placeholder="المهنة" value="{{ $father->occupation }}">
                            </div>
                        </div>
                     
                       
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
                                        message: 'الاسم مطلوب',
                                    },
                                },
                            },
                            
                            mobile: {
                                validators: {
                                    notEmpty: {
                                        message: 'رقم الجوال مطلوب',
                                    },
                                    stringLength: {
                                        min: 10,
                                        max: 10,
                                        message: 'رقم الجوال يتكون من 10 خانات',
                                    },
                                    regexp: {
                                        regexp: /^[0-9]+$/,
                                        message: 'رقم الجوال فقط أرقام',
                                    },
                                },
                            },
                           
                            address: {
                                validators: {
                                    notEmpty: {
                                        message: 'العنوان مطلوب',
                                    },
                                },
                            },
                            occupation: {
                                validators: {
                                    notEmpty: {
                                        message: 'المهنة مطلوبة',
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
