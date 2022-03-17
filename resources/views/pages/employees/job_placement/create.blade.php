<x-base-layout>
    @php
        if ($emp) {
            $employee = App\Models\Employee::with('JobPlacement')
                ->where('id', $emp->id)
                ->first();
        } else {
            $employee = null;
        }
    @endphp
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

                                {{-- <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6"> اسم الروضة</label>
                                    <div class="col-lg-8 fv-row">
                                        <select name="employee_id" aria-label="اختر اسم الروضة" data-control="select2"
                                            data-placeholder="اختر اسم الروضة.."
                                            class="form-select form-select-solid form-select-lg employee_id">
                                            <option value="">اختر المسمى الوظيفي...</option>
                                            @foreach ($kinder as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == ($emp->id ?? old('employee_id')) ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}

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
                                                    {{ $item->id == ($emp->id ?? old('employee_id')) ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">العام الدراسي</label>
                                    <div class="col-lg-8">
                                        <input type="text" name="year"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 address"
                                            placeholder="مثال : 2020-2021"
                                            value="{{ $employee->JobPlacement ?? null ? $employee->JobPlacement->year : old('year') }}">
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
                                                    {{ $item->id == ($employee->JobPlacement ?? null ? $employee->JobPlacement->job_id : old('job_id'))? 'selected': '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div  class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">الفترة</label>
                                    <div class="col-lg-8 fv-row">
                                        <select name="period_id" aria-label="اختر فترة الدوام." data-control="select2"
                                            data-placeholder="اختر فترة الدوام..."
                                            class="form-select form-select-solid form-select-lg period_id">
                                            <option value="">اختر فترة الدوام....</option>
                                            @foreach ($periods as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == ($employee->JobPlacement ?? null ? $employee->JobPlacement->period_id : old('period_id'))? 'selected': '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label  fw-bold fs-6">مربية شعبة</label>
                                    <div class="col-lg-8 fv-row align-items-center">
                                        <div class="col-9 col-form-label">
                                            <div class="checkbox-list">
                                                <label class="checkbox">
                                                    <input id="is_mother" name="is_mother" type="checkbox" name="Checkboxes4" value="1"
                                                    {{ ($employee->JobPlacement ?? null ? $employee->JobPlacement->is_mother : old('is_mother'))? 'checked': '' }}
                                                    />
                                                    <span></span>

                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div id="level_id" class="row mb-6">
                                    <label class="col-lg-4 col-form-label  fw-bold fs-6">المرحلة</label>
                                    <div class="col-lg-8 fv-row">
                                        <select id="level" name="level_id" aria-label="اختر المرحلة الدوام."
                                            data-control="select2" data-placeholder="اختر المرحلة الدوام..."
                                            class="form-select form-select-solid form-select-lg level_id">
                                            <option value="">اختر المرحلة الدوام....</option>
                                            @foreach ($levels as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == ($employee->JobPlacement ?? null ? $employee->JobPlacement->level_id : old('level_id'))? 'selected': '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div id="division_id" class="row mb-6">
                                    <label class="col-lg-4 col-form-label  fw-bold fs-6">الشعبة</label>
                                    <div class="col-lg-8 fv-row">
                                        <select name="division_id" aria-label="اختر الشعبة الدراسية."
                                            data-control="select2" data-placeholder="اختر الشعبة الدراسية..."
                                            class="form-select form-select-solid form-select-lg division_id">
                                            <option value="">اختر الشعبة الدراسية....</option>
                                            @foreach ($divisions as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == ($employee->JobPlacement ?? null ? $employee->JobPlacement->division_id : old('division_id'))? 'selected': '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>




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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
                integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
        
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

        <script>

           
           


            if(!$('#level').val() != '')
            {
            period = $('#division_id').hide();
            level = $('#level_id').hide();   
            checkBox = document.getElementById('is_mother').addEventListener('click', event => {
                if (event.target.checked) {
                    $('#division_id').show();
                    $('#level_id').show();
                }
                else{
                    $('#division_id').hide();
                    $('#level_id').hide();
                }
            });

            }
           

           
        </script>
    @endsection
</x-base-layout>
