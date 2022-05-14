<x-base-layout>
    @include('layout.error')
    <div id="kt_content" class="content d-flex flex-column flex-column-fluid">
        <!--begin::Basic info-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                 data-bs-target="#kt_account_profile_details" aria-expanded="true"
                 aria-controls="kt_account_profile_details">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">تعديل الايراد المرتبط بالطفل</h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->
            <!--begin::Content-->
            <div id="kt_account_profile_details" class="collapse show">
                <!--begin::Form-->
                <form id="details_form" class="form" method="POST" action="{{ route('incomesiwithchild.update' , $income->id) }}"
                      enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!--begin::Card body-->
                <div class="card-body border-top p-9">


                    <div class="row mb-2">
                        <label
                            class="col-lg-2 col-form-label required fw-bold fs-6">نوع الايراد</label>
                        <div class="col-lg-4">
                            <select name="income_id"
                                    aria-label="{{ __('Select') }} الايراد"
                                    id="income_id"
                                    data-control="select2"
                                    data-placeholder="{{ __('Select') }} الايراد .."
                                    class="form-select form-select-solid form-select-lg fw-bold"
                            >
                                <option value="">{{ __('Select') }} الايراد...
                                </option>
                                @foreach($incomes as $item)
                                    <option
                                        value="{{$item->id}}" {{ $item->id == $income->income_id? 'selected' :'' }}> {{$item->name}}  </option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-lg-2 col-form-label required  fw-bold fs-6">  سعر الايراد  (شيكل)</label>
                        <div class="col-lg-4">
                            <input type="text" name="price"
                                   class="form-control form-control-lg form-control-solid mobile"
                                   placeholder="مثال : 100" value="{{$income->price}}">
                            <div
                                class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-2">
                        <!--begin::Col-->
                        <div class="col-lg-12">
                            <!--begin::Row-->
                            <div class="row">
                                <label class="col-lg-2 col-form-label required fw-bold fs-6">السنة الدراسية</label>
                                <div class="col-lg-4">
                                    <select name="year"
                                    aria-label="{{ __('Select') }} السنة"
                                    id="year"
                                    data-control="select2"
                                    data-placeholder="{{ __('Select') }} السنة .."
                                    class="form-select form-select-solid form-select-lg fw-bold"
                            >
                                <option value="">{{ __('Select') }} السنة...
                                </option>
                                @foreach($years as $item)
                                    <option
                                        value="{{$item->id}}" {{ $item->id == $income->year ? 'selected' :'' }}> {{$item->name}}  </option>
                                @endforeach
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
            $(document).on("click", "#kt_gov_data_submit", function () {
                $('.loader-pub').show();
                $('.search-title').hide();
                var e = document.getElementById("gov_identity");
                var govIdentity = e.value;
                $.ajax({
                    url: "{{ route('order.gov.data') }}",
                    method: 'GET',
                    data: {'gov_identity': govIdentity},
                    dataType: "JSON",
                    success: function (data) {
                        $('.loader-pub').hide();
                        $('.search-title').show();
                        $(".name").val(data['DATA'][0]['FNAME_ARB'] + " " + data['DATA'][0]['SNAME_ARB'] + " " + data['DATA'][0]['TNAME_ARB'] + " " + data['DATA'][0]['LNAME_ARB']);
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
            });

            ///////////////////////////////////////////
            function setSelectValue(object, value, cls) {
                object.val(value).trigger('change');
                let title = $(cls + ' option:selected').text();
                $(cls + ' .select2-selection__rendered').text(title);
                $(cls + ' .select2-selection__rendered').attr('title', title);
            }

            ////////////////////////////////////////
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
                                        message: 'العنوان مطلوب',
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