<x-base-layout>
    @include('.layout.error')
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
                        <h3 class="fw-bolder m-0">اضافة موظف جديد </h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_profile_details" class="collapse show">
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9 item">
                        <form id="details_form" class="form" method="POST"
                            action="{{ route('employees.store') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <!--begin::Input group-->
                            <div class="row mb-2">
                                <!--begin::Col-->
                                <div class="col-lg-12">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <label
                                            class="col-lg-2 col-form-label required fw-bold fs-6">{{ __('identity no.') }}</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="identity" id="gov_identity" max="9"
                                                class="form-control form-control-lg form-control-solid item_no patient_search"
                                                placeholder="{{ __('identity no.') }}"
                                                value="{{ old('identity') }}" />
                                            <input type="hidden" value="" name="patient_id" class="search-val">
                                        </div>
                                        {{-- <div class="col-lg-1"> --}}
                                        {{-- <a class="btn btn-secondary" id="kt_gov_data_submit" style="min-width: 66px"> --}}
                                        {{-- <i class="fa fa-spinner fa-spin loader-pub" --}}
                                        {{-- style="display:none; margin-bottom: 5px"></i> --}}
                                        {{-- <span class="search-title">{{ __('Search') }}</span> --}}
                                        {{-- </a> --}}
                                        {{-- </div> --}}
                                        <label
                                            class="col-lg-2 col-form-label required fw-bold fs-6">{{ __('Full Name') }}</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="name"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 name"
                                                placeholder="{{ __('Full Name') }}" value="{{ old('name') }}" />
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
                                            class="col-lg-2 col-form-label required fw-bold fs-6">{{ __('mobile no.') }}</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="mobile"
                                                class="form-control form-control-lg form-control-solid mobile"
                                                placeholder="{{ __('mobile no.') }}" value="{{ old('mobile') }}" />
                                        </div>
                                        <label
                                            class="col-lg-2 col-form-label required fw-bold fs-6">{{ __('dob') }}</label>
                                        <div class="col-lg-4">
                                            <div class="position-relative d-flex align-items-center">
                                                {!! theme()->getSvgIcon('icons/duotune/general/gen014.svg', 'svg-icon svg-icon-2 position-absolute mx-4') !!}
                                                <input class="form-control form-control-solid ps-12 flatpickr-input dob"
                                                    placeholder="{{ __('Select a date') }}" name="bth_date"
                                                    type="text" value="{{ old('dob') }}" readonly="readonly">
                                            </div>
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
                                                placeholder="{{ __('Address') }}" value="{{ old('address') }}" />
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
                                                        {{ old('gender') == 1 ? 'checked' : '' }} />
                                                    <span class="fw-bold ps-2 fs-6 gender">{{ __('Male') }} </span>
                                                </label>
                                                <!--end::Option-->
                                                <!--begin::Option-->
                                                <label class="form-check form-check-inline form-check-solid">
                                                    <input class="form-check-input" name="gender" type="radio"
                                                        id="gender-female" value="2"
                                                        {{ old('gender') == 2 ? 'checked' : '' }} />
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
                                    <div class="row">
                                        <label class="col-lg-2 col-form-label required fw-bold fs-6">تاريخ
                                            التعيين</label>
                                        <div class="col-lg-4">
                                            <div class="position-relative d-flex align-items-center">
                                                {!! theme()->getSvgIcon('icons/duotune/general/gen014.svg', 'svg-icon svg-icon-2 position-absolute mx-4') !!}
                                                <input class="form-control form-control-solid ps-12 flatpickr-input dob"
                                                    placeholder="{{ __('Select a date') }}" name="add_date"
                                                    type="text" value="{{ old('dob') }}" readonly="readonly">
                                            </div>
                                        </div>

                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Order info-->
                            <div class="card mb-5 mb-xl-10">
                                <!--begin::Card header-->
                                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                                    data-bs-target="#kt_order_profile_details" aria-expanded="true"
                                    aria-controls="kt_order_profile_details">
                                    <!--begin::Card title-->
                                    <div class="card-title m-0">
                                        <h3 class="fw-bolder m-0">{{ __('info') }} اضافية </h3>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--begin::Card header-->
                                <!--begin::Content-->
                                <div id="kt_order_profile_details" class="collapse show">
                                    <!--begin::Card body-->
                                    <div class=" border-top pt-9">
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Col-->
                                            <div class="col-lg-12">
                                                <!--begin::Row-->
                                                <div class="row mb-2">
                                                    <label class="col-lg-2 col-form-label required fw-bold fs-6">المستوى
                                                        التعليمي</label>

                                                    <div class="col-lg-4">
                                                        <select name="education_id"
                                                            aria-label="{{ __('Select') }} المستوى التعليمي"
                                                            id="education_id" data-control="select2"
                                                            data-placeholder="{{ __('Select') }} المستوى التعليمي .."
                                                            class="form-select form-select-solid form-select-lg fw-bold">
                                                            <option value="">{{ __('Select') }} المستوى التعليمي...
                                                            </option>
                                                            @foreach ($education as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ $item->id == old('education_id') ? 'selected' : '' }}>
                                                                    {{ $item->name }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <label
                                                        class="col-lg-2 col-form-label required fw-bold fs-6">التخصص</label>
                                                    <div class="col-lg-4">
                                                        <select name="major_id"
                                                            aria-label="{{ __('Select') }} التخصص" id="major_id"
                                                            data-control="select2"
                                                            data-placeholder="{{ __('Select') }} التخصص .."
                                                            class="form-select form-select-solid form-select-lg fw-bold">
                                                            <option value="">{{ __('Select') }} التخصص...
                                                            </option>
                                                            @foreach ($majors as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ $item->id == old('major_id') ? 'selected' : '' }}>
                                                                    {{ $item->name }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <!--end::Row-->
                                                <!--begin::Row-->
                                                <div class="row mb-3">
                                                    {{-- <label
                                                        class="col-lg-2 col-form-label required fw-bold fs-6">الروضة</label>
                                                    <div class="col-lg-4">
                                                        <select name="kindergartens"
                                                            aria-label="{{ __('Select') }} الروضة" id="clinic_id"
                                                            data-control="select2"
                                                            data-placeholder="{{ __('Select') }} الروضة .."
                                                            class="form-select form-select-solid form-select-lg fw-bold"
                                                            {{ Auth::user()->kindergarten_id != null ? 'disabled' : '' }}>
                                                            <option value="">{{ __('Select') }} الروضة...
                                                            </option>
                                                            @foreach ($kinder as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ $item->id == Auth::user()->kindergarten_id ? 'selected' : '' }}>
                                                                    {{ $item->name }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div> --}}
                                                    <label
                                                                class="col-lg-2 col-form-label  fw-bold fs-6">الحالة</label>
                                                            <div class="col-lg-4 d-flex align-items-center">
                                                                <div
                                                                    class="form-check form-check-solid form-switch fv-row">
                                                                    <input type="hidden" name="status" value="0">
                                                                    <input class="form-check-input w-45px h-30px"
                                                                        type="checkbox" id="status" name="status"
                                                                        value="1">
                                                                    <label class="form-check-label"
                                                                        for="status"></label>
                                                                </div>
                                                            </div>


                                                    <label class="col-lg-2 col-form-label  fw-bold fs-6">البريد
                                                        الالكتروني (اختياري)</label>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="email"
                                                            class="form-control form-control-lg form-control-solid mobile"
                                                            placeholder="البريد" value="">
                                                        <div class="fv-plugins-message-container invalid-feedback">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Row-->
                                                <!--begin::Row-->
                                                <div class="row">

                                                    {{-- <!--begin::Col-->
                                                    <div class="col-lg-12">
                                                        <!--begin::Row-->
                                                        <div class="row fv-plugins-icon-container">
                                                            <label
                                                                class="col-lg-2 col-form-label  fw-bold fs-6">الحالة</label>
                                                            <div class="col-lg-4 d-flex align-items-center">
                                                                <div
                                                                    class="form-check form-check-solid form-switch fv-row">
                                                                    <input type="hidden" name="status" value="0">
                                                                    <input class="form-check-input w-45px h-30px"
                                                                        type="checkbox" id="status" name="status"
                                                                        value="1">
                                                                    <label class="form-check-label"
                                                                        for="status"></label>
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <!--end::Row-->
                                                    </div>
                                                    <!--end::Col--> --}}

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
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <style>
            label {
                text-align: left;
            }

            .select2-selection__placeholder {
                color: #A1A5B7;
            }

        </style>
    @endsection
    @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
                integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script type="text/javascript">
            $(".flatpickr-input").flatpickr({
                // enableTime: true,
                // minDate: new Date(),
                dateFormat: 'd/m/Y',
            });
        </script>
        <script>
            $(document).on("DOMSubtreeModified", "#select2-doctor_id-container", function() {
                let identity = document.getElementById("gov_identity").value;
                if (identity != '') {
                    let e = document.getElementById("doctor_id");
                    let id = e.value;
                    $.ajax({
                        url: "{{ route('order.patient.doctor') }}",
                        method: 'GET',
                        data: {
                            'doctor_id': id,
                            'identity': identity,
                        },
                        dataType: "JSON",
                        success: function(data) {
                            if (data != null) {
                                $("#visit_date").val(data.message);
                                if (data.pass) {
                                    $("#type").val("1").change();
                                    $("#type").prop('disabled', true);
                                } else {
                                    $("#type").prop('disabled', false);
                                }
                            }
                        }
                    });
                }
            });
            ////////////////////////////////////////////////
            $(document).on("DOMSubtreeModified", "#select2-clinic_id-container", function() {
                var e = document.getElementById("clinic_id");
                var id = e.value;
                $.ajax({
                    url: "{{ route('doctors.getByClinic') }}",
                    method: 'GET',
                    data: {
                        'id': id
                    },
                    dataType: "JSON",
                    success: function(data) {
                        $("#doctor_id").empty();
                        if (data.length > 0) {
                            $("#doctor_id").append('<option value=""> اختر الطبيب</option>');
                            for (var i = 0; i < data.length; i++) {
                                if ($('#doctor_id').find("option[value='" + data[i]['id'] + "']").length) {
                                    $('#doctor_id').val(data[i]['id']).trigger('change');
                                } else {
                                    var newOption = new Option(data[i]['first_name'] + " " + data[i][
                                        'last_name'
                                    ], data[i]['id']);
                                    $('#doctor_id').append(newOption).trigger('change');
                                }
                            }
                        }
                    }
                });
            });
        </script>
        ////////////////////////////////////////
        <script>
            document.addEventListener('DOMContentLoaded', function(e) {
                FormValidation.formValidation(
                    document.getElementById('details_form'), {
                        fields: {
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
                            bth_date: {
                                validators: {
                                    notEmpty: {
                                        message: 'تاريخ الميلاد مطلوب',
                                    },
                                },
                            },
                            add_date: {
                                validators: {
                                    notEmpty: {
                                        message: 'تاريخ التعيين مطلوب',
                                    },
                                },
                            },
                            education_id: {
                                validators: {
                                    notEmpty: {
                                        message: 'المستوى التعليمي مطلوب',
                                    },
                                },
                            },
                            major_id: {
                                validators: {
                                    notEmpty: {
                                        message: 'التخصص مطلوب',
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
                            gender: {
                                validators: {
                                    notEmpty: {
                                        message: 'الجنس مطلوب',
                                    },
                                },
                            },

                            kindergartens: {
                                validators: {
                                    notEmpty: {
                                        message: 'الروضة مطلوبة',
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
        <script>
            let enableSRB = false;
            ////////////////////////////////////////
            $(document).on("click", "#kt_gov_data_submit", function() {
                let number = $("#gov_identity").val();
                let length = number.toString().length;
                if (enableSRB && length == 9) {
                    var e = document.getElementById("gov_identity");
                    var govIdentity = e.value;
                    if (govIdentity != '') {
                        $('.loader-pub').show();
                        $('.search-title').hide();
                        $.ajax({
                            url: "{{ route('order.gov.data') }}",
                            method: 'GET',
                            data: {
                                'gov_identity': govIdentity
                            },
                            dataType: "JSON",
                            success: function(data) {
                                $('.loader-pub').hide();
                                $('.search-title').show();
                                $(".item_no").val(data['DATA'][0]['IDNO']);
                                $(".name").val(data['DATA'][0]['FNAME_ARB'] + " " + data['DATA'][0][
                                    'SNAME_ARB'
                                ] + " " + data['DATA'][0]['TNAME_ARB'] + " " + data['DATA'][0][
                                    'LNAME_ARB'
                                ]);
                                $(".dob").val(data['DATA'][0]['BIRTH_DT']);
                                $(".address").val(data['DATA'][0]['STREET_ARB']);
                                let region_cd = data['DATA'][0]['REGION_CD'];
                                let city_cd = data['DATA'][0]['CITY_CD'];
                                setSelectValue($(".states_id"), region_cd, '.states_id');
                                setSelectValue($(".cities_id"), city_cd, '.cities_id');
                                let gender_id = data['DATA'][0]['SEX_CD'];
                                if (gender_id == 1) {
                                    $("#gender-male").prop("checked", true);

                                } else {
                                    $('#gender-female').prop("checked", true);
                                }

                            }
                        });
                    }
                }

            });
            ////////////////////////////////////////
            let options = {
                source: function(request, response) {
                    $.ajax({
                        url: "{{ url('order/searchPatients') }}",
                        data: request,
                        success: function(data) {
                            response(data);
                            if (data.length === 0) {
                                enableSRB = true;
                                $('#kt_gov_data_submit').removeClass('btn-secondary');
                                $('#kt_gov_data_submit').addClass('btn-success');
                            } else {
                                enableSRB = false;
                                $('#kt_gov_data_submit').addClass('btn-secondary');
                                $('#kt_gov_data_submit').removeClass('btn-success');
                            }
                        },
                        error: function() {
                            response([]);
                        }
                    });
                },
                minLength: 1,
                ///////////////////////////////////////////
                focus: function(event, ui) {
                    let val = $(this).closest('.item').find('.search-val');
                    identity = $(this).closest('.item').find('.item_no');
                    identity.val(ui.item.label);
                    val.val(ui.item.value);
                    return false;
                },
                ///////////////////////////////////////////
                select: function(event, ui) {
                    let val = $(this).closest('.item').find('.search-val');
                    identity = $(this).closest('.item').find('.item_no');
                    let cname = $(this).closest('.item').find('.name');
                    let mobile = $(this).closest('.item').find('.mobile');
                    let dob = $(this).closest('.item').find('.dob');
                    let states_id = $(this).closest('.item').find('.states_id');
                    let cities_id = $(this).closest('.item').find('.cities_id');
                    let address = $(this).closest('.item').find('.address');
                    /////////////////////////////////////
                    setSelectValue(states_id, ui.item.states_id, '.states_id');
                    setSelectValue(cities_id, ui.item.cities_id, '.cities_id');

                    identity.val(ui.item.label);
                    val.val(ui.item.value);
                    cname.val(ui.item.name);
                    mobile.val(ui.item.mobile);
                    dob.val(ui.item.dob);

                    if (ui.item.gender == 1) {
                        $("#gender-male").prop("checked", true);

                    } else {
                        $('#gender-female').prop("checked", true);
                    }
                    address.val(ui.item.address);
                    // document.location.reload();
                    return false;
                }
            };
            ///////////////////////////////////////////
            $(".patient_search").autocomplete(options);

            ///////////////////////////////////////////
            function setSelectValue(object, value, cls) {
                object.val(value).trigger('change');
                let title = $(cls + ' option:selected').text();
                $(cls + ' .select2-selection__rendered').text(title);
                $(cls + ' .select2-selection__rendered').attr('title', title);
            }
        </script>
    @endsection
</x-base-layout>
