<x-base-layout>
    <div id="kt_content" class="content d-flex flex-column flex-column-fluid">
        <div>
            <!--begin::Patient info-->
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                    data-bs-target="#kt_account_profile_details" aria-expanded="true"
                    aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">تعديل طفل |{{$children->name}} </h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_profile_details" class="collapse show">
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9 item">
                        <form id="details_form" class="form" method="POST"
                            action="{{ route('childrens.update' ,$children->id ) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!--begin::Input group-->
                            <div class="row mb-2">
                                <!--begin::Col-->
                                <div class="col-lg-12">
                                    <!--begin::Row-->
                                    <div class="row">

                                        <label
                                        class="col-lg-2 col-form-label required fw-bold fs-6">{{ __('Full Name') }}</label>

                                    <div class="col-lg-4">
                                        <input type="text" name="name"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 name"
                                            placeholder="{{ __('Full Name') }}" value="{{ $children->name }}" />

                                    </div>


                                        <label class="col-lg-2 col-form-label required fw-bold fs-6">ولي الأمر</label>

                                        <div class="col-lg-4">
                                            <select name="father_id" aria-label="{{ __('Select') }} ولي الأمر"
                                                id="father_id" data-control="select2"
                                                data-placeholder="{{ __('Select') }} ولي الأمر .."
                                                class="form-select form-select-solid form-select-lg fw-bold">
                                                <option value="-1">{{ __('Select') }} ولي الأمر...
                                                </option>
                                                @foreach ($fathers as $father)
                                                    <option value="{{ $father->id }}"
                                                        {{ $father->id ==  $children->father_id ? 'selected' : '' }}>
                                                        {{ $father->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                       
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-2">
                                <!--begin::Col-->
                                <div class="col-lg-12">
                                    <!--begin::Row-->
                                    <div class="row">

                                        <label
                                            class="col-lg-2 col-form-label required fw-bold fs-6">{{ __('dob') }}</label>
                                        <div class="col-lg-4">
                                            <div class="position-relative d-flex align-items-center">
                                                {!! theme()->getSvgIcon('icons/duotune/general/gen014.svg', 'svg-icon svg-icon-2 position-absolute mx-4') !!}
                                                <input class="form-control form-control-solid ps-12 flatpickr-input dob"
                                                    placeholder="{{ __('Select a date') }}" name="bth_date"
                                                    type="text" value="{{ $children->bth_date }}" readonly="readonly">
                                            </div>
                                        </div>



                                        <label class="col-lg-2 col-form-label required fw-bold fs-6"> الروضة </label>

                                        <div class="col-lg-4">
                                            <select name="kindergarten_id" aria-label="{{ __('Select') }} الروضة"
                                                id="kindergarten_id" data-control="select2"
                                                data-placeholder="{{ __('Select') }} الروضة .."
                                                class="form-select form-select-solid form-select-lg fw-bold">
                                                <option value="-1">{{ __('Select') }} الروضة...
                                                </option>
                                                @foreach ($kindergartens as $kindergartens)
                                                    <option value="{{ $kindergartens->id }}"
                                                        {{ $kindergartens->id == $children->kindergarten_id ? 'selected' : '' }}>
                                                        {{ $kindergartens->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                           
                            <!--begin::Input group-->
                            <div class="row mb-2">
                                <!--begin::Col-->
                                <div class="col-lg-12">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <label
                                            class="col-lg-2 col-form-label required fw-bold fs-6">{{ __('Address') }}</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="address"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 address"
                                                placeholder="{{ __('Address') }}" value="{{ $children->address }}" />
                                        </div>
                                        <label
                                            class="col-lg-2 col-form-label required fw-bold fs-6">{{ __('Gender') }}</label>
                                        <div class="col-lg-4">
                                            <!--begin::Options-->
                                            <div class="d-flex align-items-center mt-3">
                                                <!--begin::Option-->
                                                <label class="form-check form-check-inline form-check-solid me-5">
                                                    <input class="form-check-input" name="gender" type="radio"
                                                        id="gender-male" value="1"
                                                        {{ $children->gender == 1 ? 'checked' : '' }} />
                                                    <span class="fw-bold ps-2 fs-6 gender">{{ __('Male') }} </span>
                                                </label>
                                                <!--end::Option-->
                                                <!--begin::Option-->
                                                <label class="form-check form-check-inline form-check-solid">
                                                    <input class="form-check-input" name="gender" type="radio"
                                                        id="gender-female" value="2"
                                                        {{ $children->gender == 2 ? 'checked' : '' }} />
                                                    <span class="fw-bold ps-2 fs-6">{{ __('Female') }}</span>
                                                </label>
                                                <!--end::Option-->
                                            </div>
                                            <!--end::Options-->
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-2">
                                <!--begin::Col-->
                                <div class="col-lg-12">
                                    <!--begin::Row-->
                                    <div class="row fv-plugins-icon-container">
                                        <label class="col-lg-2 col-form-label  fw-bold fs-6">الحالة</label>
                                        <div class="col-lg-4 d-flex align-items-center">
                                            <div class="form-check form-check-solid form-switch fv-row">
                                                <input type="hidden" name="status" value="0">
                                                <input class="form-check-input w-45px h-30px" type="checkbox" id="status" name="status" value="1" {{ $children->status ? 'checked' : '' }}>
                                                <label class="form-check-label" for="status"></label>
                                            </div>
                                        </div>



                                       
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="reset" id="btn-dscrd"
                                    class="btn btn-white btn-active-light-primary me-2">{{ __('Discard') }}</button>
                                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">
                                    @include(
                                        'partials.general._button-indicator',
                                        ['label' => __('Save')]
                                    )
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Patient info-->
        </div>
    </div>
    @section('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"
              integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ=="
              crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <style>
            label {
                text-align: left;
            }
        </style>
    @endsection
    @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
                integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script type="text/javascript">$(".flatpickr-input").flatpickr();</script>
        <script type="text/javascript">
        </script>
        <script>
            ////////////////////////////////////////////////
            $(document).on("DOMSubtreeModified", "#select2-clinic_id-container", function () {
                var doctor = document.getElementById("clinic_id");
                var id = doctor.value;
                var sdid = $("#s_doctor_id").val();
                $.ajax({
                    url: "{{ route('doctors.getByClinic') }}",
                    method: 'GET',
                    data: {'id': id},
                    dataType: "JSON",
                    success: function (data) {
                        $("#doctor_id").empty();
                        if (data.length > 0) {
                            $("#doctor_id").append('<option value=""> اختر الطبيب</option>');
                            for (var i = 0; i < data.length; i++) {
                                if ($('#doctor_id').find("option[value='" + data[i]['id'] + "']").length) {
                                    $('#doctor_id').val(data[i]['id']).trigger('change');
                                } else {
                                    var newOption = new Option(data[i]['first_name'] + " " + data[i]['last_name'], data[i]['id']);
                                    $('#doctor_id').append(newOption).trigger('change');
                                }
                            }
                        }
                        setSelectValue(sdid)
                    }
                });
            });

            ///////////////////////////////////////////
            function setSelectValue(value) {
                    $("#s_doctor_id").val("");
                $('#doctor_id').val(value).trigger('change');
                let title = $('#select2-doctor_id-container option:selected').text();
                $('#select2-doctor_id-container').text(title);
                $('#select2-doctor_id-container').attr('title', title);
            }
        </script>
         <script>
            document.addEventListener('DOMContentLoaded', function(e) {
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
                            bth_date: {
                                validators: {
                                    notEmpty: {
                                        message: 'تاريخ الميلاد مطلوب',
                                    },
                                },
                            },
                            father_id: {
                                validators: {
                                    required: {
                                        message: 'ولي الأمر مطلوب',
                                    },
                                },
                            },
                            kindergarten_id: {
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
                            address: {
                                validators: {
                                    notEmpty: {
                                        message: 'العنوان مطلوب',
                                    },
                                },
                            },
                            doctor_id: {
                                validators: {
                                    notEmpty: {
                                        message: 'الطبيب مطلوب',
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

