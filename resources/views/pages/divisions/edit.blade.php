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
                    <h6 class="fw-bolder m-0">تعديل الشعبة الدراسية</h6>
                    <span class="h-20px border-gray-200 border-start mx-4"></span>
                    <h3 class="fw-bolder m-0">{{ $division->name }}</h3>

                </div>

                <!--end::Card title-->
            </div>
            <!--begin::Card header-->

            <!--begin::Content-->
            <div id="kt_account_profile_details" class="collapse show">
                <!--begin::Form-->
                <form id="details_form" class="form" method="POST"
                    action="{{ route('divisions.update', $division->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        @if (Auth::user()->kindergarten_id == null)
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">الروضة</label>
                            <div class="col-lg-8 fv-row">
                                <select id="kindergarten_id" name="kindergarten_id"
                                    aria-label="اختر الروضة ." {{-- data-control="select2" --}}
                                    data-placeholder="اختر الروضة..."
                                    class="form-select form-select-solid form-select-lg period_id">
                                    <option value="">اختر الروضة....</option>
                                    @foreach ($kindergartens as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id ==($children->ClassPlacement ?? null ? $children->ClassPlacement->kindergarten_id : old('kindergarten_id'))? 'selected': '' }}
                                            }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @else
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">الروضة</label>
                            <div class="col-lg-8 fv-row">
                                <select id="kindergarten_id" name="kindergarten_id"
                                    aria-label="اختر الروضة ." {{-- data-control="select2" --}}
                                    data-placeholder="اختر الروضة..."
                                    class="form-select form-select-solid form-select-lg period_id"
                                    {{ Auth::user()->kindergarten_id != null ? 'disabled' : '' }}
                                    >
                                    <option value="">اختر الروضة....</option>
                                    @foreach ($kindergartens as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == Auth::user()->kindergarten_id ? 'selected' : '' }}>
                                            {{ $item->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif


                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6"> المستوى </label>
                                <div class="col-lg-8">
                                    <select name="level_id" aria-label="{{ __('Select') }} المستوى" id="level_id"
                                        data-control="select2" data-placeholder="{{ __('Select') }} المستوى .."
                                        class="form-select form-select-solid form-select-lg fw-bold">

                                        @foreach ($levels as $levels)
                                            <option value="{{ $levels->id }}"
                                                {{ $levels->id == $division->level_id ? 'selected' : '' }}>
                                                {{ $levels->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">اسم الشعبة</label>
                                <div class="col-lg-8">
                                    <input type="text" name="name"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 name"
                                        placeholder="اسم الشعبة" value="{{ $division->name }}" />
                                </div>
                            </div>
                            <!--end::Input group-->



                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">سعة الشعبة</label>
                                <div class="col-lg-8">
                                    <input type="text" name="max_children"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 address"
                                        placeholder="السعة" value="{{ $division->max_children }}">
                                </div>
                            </div>




                            <!--begin::Input group-->
                            <div class="row mb-0">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">الحالة</label>
                                <div class="col-lg-8 d-flex align-items-center">
                                    <div class="form-check form-check-solid form-switch fv-row">
                                        <input type="hidden" name="status" value="1">
                                        <input class="form-check-input w-45px h-30px" type="checkbox" id="status"
                                            name="status" value="1" {{ $division->status ? 'checked' : '' }} />
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
                                @include('partials.general._button-indicator', [
                                    'label' => __('Save'),
                                ])
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
        <script type="text/javascript">
            $(".flatpickr-input").flatpickr();
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function(e) {
                FormValidation.formValidation(
                    document.getElementById('details_form'), {
                        fields: {
                            name: {
                                validators: {
                                    notEmpty: {
                                        message: 'اسم الشعبة مطلوب',
                                    },
                                },
                            },

                            level_id: {
                                validators: {
                                    notEmpty: {
                                        message: 'المرحلة مطلوبة',
                                    },

                                },
                            },


                            kindergarten_id: {
                                validators: {
                                    notEmpty: {
                                        message: 'الروضة مطلوبة',
                                    },
                                },
                            },
                            max_children: {
                                validators: {
                                    notEmpty: {
                                        message: 'الحد الاقصى للشعبة مطلوب',
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
