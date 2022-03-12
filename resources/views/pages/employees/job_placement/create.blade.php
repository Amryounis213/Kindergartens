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
                        <h3 class="fw-bolder m-0">تسكين وظيفي جديد</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_profile_details" class="collapse show">
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9 item">
                        <form id="details_form" class="form" method="POST"
                            action="{{ route('jobplacement.store') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <!--begin::Input group-->
                            <div class="card-body border-top p-9">


                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6"> اسم الموظف</label>
                                    <div class="col-lg-8 fv-row">
                                        <select name="employee_id" aria-label="اختر اسم الموظف" data-control="select2"
                                            data-placeholder="اختر اسم الموظف.."
                                            class="form-select form-select-solid form-select-lg employee_id">
                                            <option value="">اختر المسمى الوظيفي...</option>
                                            @foreach ($employees as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == ($emp->id ?? old('employee_id'))  ?  'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">العام الدراسي</label>
                                    <div class="col-lg-8">
                                        <input type="text" name="year"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 address"
                                            placeholder="مثال : 2020-2021" value="">
                                    </div>
                                </div>

                                 <!--begin::Input group-->
                                 <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">المسمى الوظيفي</label>
                                    <div class="col-lg-8 fv-row">
                                        <select name="job_id" aria-label="اختر المسمى الوظيفي" data-control="select2"
                                            data-placeholder="اختر المسمى الوظيفي.."
                                            class="form-select form-select-solid form-select-lg job_id">
                                            <option value="">اختر المسمى الوظيفي...</option>
                                            @foreach ($majors as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == old('job_id') ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">الفترة</label>
                                    <div class="col-lg-8 fv-row">
                                        <select name="period_id" aria-label="اختر فترة الدوام." data-control="select2"
                                            data-placeholder="اختر فترة الدوام..."
                                            class="form-select form-select-solid form-select-lg period_id">
                                            <option value="">اختر فترة الدوام....</option>
                                            @foreach ($periods as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == old('period_id') ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                               

                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">مربية شعبة</label>
                                    <div class="col-lg-8 fv-row align-items-center">
                                        <div class="col-9 col-form-label">
                                            <div class="checkbox-list">
                                                <label class="checkbox">
                                                    <input type="checkbox"  name="Checkboxes4"/>
                                                    <span></span>
                                                    
                                                </label>
                                            </div>
                                        </div>
                                           
                                    </div>
                                </div>


                                {{-- <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">المستوى</label>
                                    <div class="col-lg-8 fv-row">
                                        <select name="period_id" aria-label="اختر فترة الدوام." data-control="select2"
                                            data-placeholder="اختر فترة الدوام..."
                                            class="form-select form-select-solid form-select-lg period_id">
                                            <option value="">اختر فترة الدوام....</option>
                                            @foreach ($periods as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == old('period_id') ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">الشعبة</label>
                                    <div class="col-lg-8 fv-row">
                                        <select name="division_id" aria-label="اختر فترة الدوام." data-control="select2"
                                            data-placeholder="اختر فترة الدوام..."
                                            class="form-select form-select-solid form-select-lg period_id">
                                            <option value="">اختر فترة الدوام....</option>
                                            @foreach ($periods as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == old('division_id') ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}




                                <!--begin::Actions-->
                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <button type="reset" id="btn-dscrd"
                                        class="btn btn-white btn-active-light-primary me-2">{{ __('Discard') }}</button>
                                    <button type="submit" class="btn btn-primary"
                                        id="kt_account_profile_details_submit">
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
                enableTime: true,
                minDate: new Date(),
                dateFormat: 'd/m/Y H:i:S',
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
                            employee_id: {
                                validators: {
                                    notEmpty: {
                                        message: 'اسم الموظف مطلوب',
                                    },
                                },
                            },
                            year: {
                                validators: {
                                    notEmpty: {
                                        message: 'السنة الدراسية مطلوبة',
                                    },
                                    stringLength: {
                                        min: 9,
                                        max: 9,
                                        message: 'اكتب التسلسل بشكل صحيح',
                                    },
                                    // regexp: {
                                    //     regexp: /^[0-9]+$/,
                                    //     message: 'رقم الهوية فقط أرقام',
                                    // },
                                },
                            },
                            job_id: {
                                validators: {
                                    notEmpty: {
                                        message: 'المسمى الوظيفي مطلوب',
                                    },
                                    
                                   
                                },
                            },
                            period_id: {
                                validators: {
                                    notEmpty: {
                                        message: 'فترة الدوام مطلوبة',
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
