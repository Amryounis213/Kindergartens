<x-base-layout>
    <div id="kt_content" class="content d-flex flex-column flex-column-fluid">
        <div>
            <!--begin::Form-->
            <form id="details_form" class="form" method="POST" action="{{ route('order.update', $order) }}"
                  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!--begin::Patient info-->
                <div class="card mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                         data-bs-target="#kt_account_profile_details" aria-expanded="true"
                         aria-controls="kt_account_profile_details">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h6 class="fw-bolder m-0">{{ __('edit') }} {{ __('order') }}</h6>
                            <span class="h-20px border-gray-200 border-start mx-4"></span>
                            <h3 class="fw-bolder m-0">{{$order->name}}</h3>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_profile_details" class="collapse show">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9 item">
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Col-->
                                <div class="col-lg-12">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <label
                                            class="col-lg-1 col-form-label required fw-bold fs-6">{{ __('identity no.') }}</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="identity"
                                                   class="form-control form-control-lg form-control-solid item_no patient_search"
                                                   placeholder="{{ __('identity no.') }}"
                                                   value="{{ old('name', $order->identity ?? '') }}"
                                                   disabled
                                            />
                                            <input type="hidden" value="{{$order->patient_id}}" name="patient_id"
                                                   class="search-val">
                                        </div>
                                        <label
                                            class="col-lg-2 col-form-label required fw-bold fs-6">{{ __('Full Name') }}</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="name"
                                                   class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 name"
                                                   placeholder="{{ __('Full Name') }}"
                                                   value="{{ old('website', $order->name ?? '') }}"/>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Col-->
                                <div class="col-lg-12">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <label
                                            class="col-lg-1 col-form-label required fw-bold fs-6">{{ __('mobile no.') }}</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="mobile"
                                                   class="form-control form-control-lg form-control-solid mobile"
                                                   placeholder="{{ __('mobile no.') }}"
                                                   value="{{ old('mobile', $order->patient ? $order->patient->mobile : '') }}"/>
                                        </div>
                                        <label
                                            class="col-lg-2 col-form-label required fw-bold fs-6">{{ __('dob') }}</label>
                                        <div class="col-lg-4">
                                            <div class="position-relative d-flex align-items-center">
                                                <!--begin::Icon-->
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                            {!! theme()->getSvgIcon("icons/duotune/general/gen014.svg", "svg-icon svg-icon-2 position-absolute mx-4") !!}
                                            <!--end::Svg Icon-->
                                                <!--end::Icon-->
                                                <!--begin::Datepicker-->
                                                <input class="form-control form-control-solid ps-12 flatpickr-input dob"
                                                       value="{{ old('dob', $order->patient ? $order->patient->dob : '') }}"
                                                       placeholder="{{ __('Select a date')}}" name="dob" type="text"
                                                       readonly="readonly">
                                                <!--end::Datepicker-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Col-->
                                <div class="col-lg-12">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <label
                                            class="col-lg-1 col-form-label required fw-bold fs-6">{{ __('State') }}</label>
                                        <div class="col-lg-4">
                                            <select name="states_id" aria-label="{{ __('Select a State') }}"
                                                    data-control="select2"
                                                    data-placeholder="{{ __('Select a State') }}.."
                                                    class="form-select form-select-solid form-select-lg states_id">
                                                <option value="">{{ __('Select a State') }}...</option>
                                                @foreach($states as $item)
                                                    <option
                                                        value=" {{$item->id}}" {{ $item->id == old('states_id', $order->patient->states_id ?? '') ? 'selected' :'' }}>
                                                        {{$item->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <label
                                            class="col-lg-2 col-form-label required fw-bold fs-6">{{ __('City') }}</label>
                                        <div class="col-lg-4">
                                            <select name="cities_id" aria-label="{{ __('Select a City') }}"
                                                    data-control="select2"
                                                    data-placeholder="{{ __('Select a City') }}.."
                                                    class="form-select form-select-solid form-select-lg cities_id">
                                                <option value="">{{ __('Select a City') }}...</option>
                                                @foreach($cities as $item)
                                                    <option
                                                        value=" {{$item->id}}" {{ $item->id == old('cities_id', $order->patient->cities_id ?? '') ? 'selected' :'' }}>
                                                        {{$item->name}}
                                                    </option>
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
                            <div class="row mb-6">
                                <!--begin::Col-->
                                <div class="col-lg-12">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <label
                                            class="col-lg-1 col-form-label fw-bold fs-6">{{ __('Address') }}</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="address"
                                                   class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 address"
                                                   placeholder="{{ __('Address') }}"
                                                   value="{{ old('dob', $order->patient ? $order->patient->address : '') }}"/>
                                        </div>
                                        <label
                                            class="col-lg-2 col-form-label required fw-bold fs-6">{{ __('Gender') }}</label>
                                        <div class="col-lg-4">
                                            <!--begin::Options-->
                                            <div class="d-flex align-items-center mt-3">
                                                <!--begin::Option-->
                                                <label class="form-check form-check-inline form-check-solid me-5">
                                                    <input class="form-check-input" name="gender" type="radio"
                                                           id="gender-male"
                                                           value="1" {{ old('gender', $order->patient ? $order->patient->gender : '') == 1 ? 'checked' : '' }}/>
                                                    <span class="fw-bold ps-2 fs-6 gender">{{ __('Male') }} </span>
                                                </label>
                                                <!--end::Option-->
                                                <!--begin::Option-->
                                                <label class="form-check form-check-inline form-check-solid">
                                                    <input class="form-check-input" name="gender" type="radio"
                                                           id="gender-female"
                                                           value="2" {{ old('gender', $order->patient ? $order->patient->gender : '') == 2 ? 'checked' : '' }}/>
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
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Patient info-->
                <!--begin::Order info-->
                <div class="card mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                         data-bs-target="#kt_order_profile_details" aria-expanded="true"
                         aria-controls="kt_order_profile_details">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">{{ __('info') }} {{ __('Reservation') }} </h3>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Content-->
                    <div id="kt_order_profile_details" class="collapse show">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Col-->
                                <div class="col-lg-12">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <label
                                            class="col-lg-1 col-form-label required fw-bold fs-6">{{ __('Clinic') }}</label>
                                        <div class="col-lg-4">
                                            <select name="clinic_id" aria-label="{{ __('Select') }} {{ __('Clinic') }}"
                                                    data-control="select2"
                                                    id="clinic_id"
                                                    data-placeholder="{{ __('Select') }} {{ __('Clinic') }} .."
                                                    class="form-select form-select-solid form-select-lg fw-bold">
                                                <option value="">{{ __('Select') }} {{ __('Clinic') }} ...</option>
                                                @foreach($clinics as $item)
                                                    <option
                                                        value="{{$item->id}}" {{ $item->id == old('clinic_id', $order->clinic_id) ? 'selected' :'' }}> {{$item->name}}  </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input value="{{ $order->doctor_id}}" id="s_doctor_id" type="hidden">
                                        <label
                                            class="col-lg-2 col-form-label required fw-bold fs-6">{{ __('doctor') }}</label>
                                        <div class="col-lg-4">
                                            <select name="doctor_id" aria-label="{{ __('Select') }} {{ __('doctor') }}"
                                                    id="doctor_id"
                                                    data-control="select2"
                                                    data-placeholder="{{ __('Select') }} {{ __('doctor') }} .."
                                                    class="form-select form-select-solid form-select-lg">
                                            </select>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Order info-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" id="btn-dscrd"
                            class="btn btn-white btn-active-light-primary me-2">{{ __('Discard') }}</button>
                    <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">
                        @include('partials.general._button-indicator', ['label' => __('Save')])
                    </button>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
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
                            dob: {
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
                            clinic_id: {
                                validators: {
                                    notEmpty: {
                                        message: 'العيادة مطلوب',
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

