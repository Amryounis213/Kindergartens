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
                        <h3 class="fw-bolder m-0">تعديل طفل |{{ $children->name }} </h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_profile_details" class="collapse show">
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9 item">
                        <form id="details_form" class="form" method="POST"
                            action="{{ route('childrens.update' , $children->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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
                                                value="{{ $children->identity }}" />
                                            <input type="hidden" value="" name="children_id" class="search-val">
                                        </div>
{{--                                        <div class="col-lg-1">--}}
{{--                                            <a class="btn btn-secondary" id="kt_gov_data_submit"--}}
{{--                                                style="min-width: 66px">--}}
{{--                                                <i class="fa fa-spinner fa-spin loader-pub"--}}
{{--                                                    style="display:none; margin-bottom: 5px"></i>--}}
{{--                                                <span class="search-title">{{ __('Search') }}</span>--}}
{{--                                            </a>--}}
{{--                                        </div>--}}

                                        @php
                                            $first_name =str_replace($children->Father->name , "", $children->name);
                                            
                                        @endphp
                                        <label
                                            class="col-lg-2 col-form-label required fw-bold fs-6">{{ __('Full Name') }}</label>
                                        <div class="col-lg-2">
                                            <input type="text" name="name"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 name"
                                                placeholder="{{ __('Full Name') }}"
                                                value="{{ $first_name }}" />
                                        </div>
                                        <div class="col-lg-2">
                                            <input type="text" name="father_name"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 address typeahead"
                                                placeholder="اسم ولي الأمر" value="{{ $children->Father->name }}" />
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
                                            التسجيل</label>
                                        <div class="col-lg-4">
                                            <div class="position-relative d-flex align-items-center">
                                                {!! theme()->getSvgIcon('icons/duotune/general/gen014.svg', 'svg-icon svg-icon-2 position-absolute mx-4') !!}
                                                <input class="form-control form-control-solid ps-12 flatpickr-input dob"
                                                    placeholder="{{ __('Select a date') }}" name="add_date"
                                                    type="text" value="{{ $children->add_date }}"
                                                    readonly="readonly">
                                            </div>
                                        </div>
                                        <label
                                            class="col-lg-2 col-form-label required fw-bold fs-6">{{ __('dob') }}</label>
                                        <div class="col-lg-4">
                                            <div class="position-relative d-flex align-items-center">
                                                {!! theme()->getSvgIcon('icons/duotune/general/gen014.svg', 'svg-icon svg-icon-2 position-absolute mx-4') !!}
                                                <input class="form-control form-control-solid ps-12 flatpickr-input dob"
                                                    placeholder="{{ __('Select a date') }}" name="bth_date"
                                                    type="text" value="{{ $children->bth_date }}"
                                                    readonly="readonly">
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
                                                placeholder="{{ __('Address') }}"
                                                value="{{ $children->address }}" />
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
                            <div class="row mb-2">
                                <!--begin::Col-->
                                <div class="col-lg-12">
                                    <!--begin::Row-->
                                    <div class="row">
                                        {{-- <label
                                            class="col-lg-2 col-form-label required fw-bold fs-6">ولي أمر الطالب</label>
                                        <div class="col-lg-4">
                                            <input type="text" name="father_name"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 address typeahead"
                                                placeholder="اسم ولي الأمر" value="{{ $children->Father->name }}" />
                                        </div> --}}


                                        <label class="col-lg-2 col-form-label  fw-bold fs-6">رقم المحمول
                                            لولي أمر الطفل </label>

                                        <div class="col-lg-4">
                                            <input type="text" name="father_mob"
                                                class="form-control form-control-lg form-control-solid mobile"
                                                placeholder="  رقم المحمول لولي أمر الطفل" value="{{ $children->Father->mobile ?? '' }}">
                                            <div class="fv-plugins-message-container invalid-feedback">
                                            </div>
                                        </div>
                                      
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Col-->
                            </div>
    

                            <!--begin::Order info-->
                            <div class="card mb-5 mb-xl-10">
                                <!--begin::Card header-->
                                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                                    data-bs-target="#kt_order_profile_details" aria-expanded="true"
                                    aria-controls="kt_order_profile_details">
                                    <!--begin::Card title-->
                                    <div class="card-title m-0">
                                        <h3 class="fw-bolder m-0">بيانات ولي الأمر</h3>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--begin::Card header-->
                                <div id="kt_order_profile_details" class="collapse show">
                                    <!--begin::Card body-->
                                    <div class=" border-top pt-9">
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Col-->
                                            <div class="col-lg-12">

                                
                                                {{-- <!--begin::Row-->
                                                <div class="row mb-2">
                                                    <label class="col-lg-2 col-form-label required fw-bold fs-6">ولي امر
                                                        الطالب</label>

                                                    <div class="col-lg-4">
                                                        <select name="father_id"
                                                            aria-label="{{ __('Select') }}ولي أمر الطالب"
                                                            id="father_id"
                                                            data-placeholder="{{ __('Select') }}ولي أمر الطالب .."
                                                            class="form-select form-select-solid form-select-lg fw-bold">
                                                            <option value="">{{ __('Select') }}ولي أمر الطالب...
                                                            </option>
                                                            @foreach ($fathers as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ $item->id == $father->id ? 'selected' : '' }}>
                                                                    {{ $item->name }} </option>
                                                            @endforeach
                                                        </select>


                                                        <input type="text" name="father_name" hidden
                                                            class="form-control form-control-lg form-control-solid mobile"
                                                            placeholder="اسم ولي الأمر " value="{{$father->name}}">

                                                        <div
                                                            class="fv-plugins-message-container text-primary hint-father add_father">
                                                            <a id="add_father" href="#father_id">غير موجود ؟ اضافة اسم
                                                                جديد</a>
                                                        </div>


                                                        <div hidden
                                                            class="fv-plugins-message-container text-primary hint-father2 add_father ">
                                                            <a id="add_father2" href="#father_id">الرجوع الى قائمة</a>
                                                        </div>
                                                    </div>

                                                    <label class="col-lg-2 col-form-label  fw-bold fs-6">رقم المحمول
                                                        لولي أمر الطفل </label>

                                                    <div class="col-lg-4">
                                                        <input type="text" name="father_mob"
                                                            class="form-control form-control-lg form-control-solid mobile"
                                                            placeholder="  رقم المحمول لولي أمر الطفل" value="{{$father->mobile}}">
                                                        <div class="fv-plugins-message-container invalid-feedback">
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <!--begin::Row-->
                                                <div class="row mb-3">
                                                    <label class="col-lg-2 col-form-label  fw-bold fs-6">مهنة ولي
                                                        الأمر</label>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="occupation"
                                                            class="form-control form-control-lg form-control-solid mobile"
                                                            placeholder="مهنة ولي أمر الطفل" value="{{$father->occupation ?? ''}}">
                                                    </div>
                                                    <label class="col-lg-2 col-form-label  fw-bold fs-6">رقم هوية
                                                        لولي أمر </label>

                                                    <div class="col-lg-4">
                                                        <input type="text" name="father_identity"
                                                            class="form-control form-control-lg form-control-solid mobile"
                                                            placeholder="رقم هوية لولي أمر الطفل" value="{{$father->identity ?? ''}}">
                                                        <div class="fv-plugins-message-container invalid-feedback">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row mb-3">
                                                    <label class="col-lg-2 col-form-label  fw-bold fs-6">البلدة
                                                        الأصلية</label>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="town"
                                                            class="form-control form-control-lg form-control-solid mobile"
                                                            placeholder="اسم البلدة " value="{{$father->town ?? ''}}">
                                                    </div>
                                                    <label class="col-lg-2 col-form-label  fw-bold fs-6"> صلة قرابة ولي
                                                        الأمر
                                                    </label>

                                                    <div class="col-lg-4">
                                                        <select name="father_rel"
                                                            aria-label="{{ __('Select') }}صلة قرابة" id="father_rel"
                                                            data-placeholder="{{ __('Select') }}صلة قرابة .."
                                                            class="form-select form-select-solid form-select-lg fw-bold">
                                                            <option value="">{{ __('Select') }}صلة قرابة...
                                                            </option>
                                                            @foreach ($relations as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ $item->id == $children->father_rel ? 'selected' : '' }}>
                                                                    {{ $item->name }} </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="fv-plugins-message-container invalid-feedback">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--begin::Row-->
                                                <div class="row mb-3">
                                                    <label class="col-lg-2 col-form-label  fw-bold fs-6"> اسم والدة
                                                        الطفل</label>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="mother_name"
                                                            class="form-control form-control-lg form-control-solid mobile"
                                                            placeholder="اسم والدة الطفل" value="{{$children->mother_name}}">
                                                    </div>
                                                    <label class="col-lg-2 col-form-label  fw-bold fs-6">رقم المحمول
                                                        لوالدة الطفل </label>

                                                    <div class="col-lg-4">
                                                        <input type="text" name="mother_mob"
                                                            class="form-control form-control-lg form-control-solid mobile"
                                                            placeholder="  رقم المحمول لوالدة الطفل" value="{{$children->mother_mob}}">
                                                        <div class="fv-plugins-message-container invalid-feedback">
                                                        </div>
                                                    </div>
                                                </div>


                                                <!--end::Row-->
                                                <!--begin::Row-->




                                            </div>
                                            <!--end::Row-->





                                        </div>


                                        <!--end::Row-->
                                    </div>
                                    <!--end::Col-->
                                </div>
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
                        @include('partials.general._button-indicator', [
                            'label' => __('Save'),
                        ])
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

        </style>
    @endsection
    @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
                integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script type="text/javascript">
            $(".flatpickr-input").flatpickr();
        </script>
        <script type="text/javascript">
        </script>
        <script>
            ////////////////////////////////////////////////
            $(document).on("DOMSubtreeModified", "#select2-clinic_id-container", function() {
                var doctor = document.getElementById("clinic_id");
                var id = doctor.value;
                var sdid = $("#s_doctor_id").val();
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
                        setSelectValue(sdid)
                    }
                });
            });
            ////////////////////////////////////////////
            $('input[name=father_name]').autocomplete({
                source: function(request, cb) {
                    $.ajax({
                        url: "/GetFatherData2/" + $('input[name=father_name]').val(),
                        method: 'GET',
                        data: {
                            // 'doctor_id': id,
                            // 'identity': identity,
                        },
                        dataType: "JSON",
                        success: function(data) {
                            
                            let result;
                            result = [{
                                'label': 'جاري البحث عن نتائج',
                                'value': '',
                            }];
                           
                            if (data.length) {
                                result = $.map(data, function(obj) {
                                    return {
                                        'label': obj.name,
                                        'value': obj.name,
                                        'data': obj,
                                    }
                                });
                            }

                           return cb(result);
                        }

                    });
                },
                select: function(e, selectedData) {
                   if(selectedData.item.data)
                   {
                    $('input[name=father_mob]').val(selectedData.item.data.mobile);
                     $('input[name=occupation]').val(selectedData.item.data.occupation);
                     $('input[name=father_identity]').val(selectedData.item.data.identity);
                     $('input[name=town]').val(selectedData.item.data.town);
                   }

                }

            });
            ////////////////////////////////
            $('#add_father').on('click', function() {
                $('#father_id').attr('hidden', true);
                $('input[name=father_name]').removeAttr('hidden');
                $('.hint-father').hide();
                $('.hint-father2').removeAttr('hidden');
                // $('#add_father')


                $('#father_id').val(null);
                $('input[name=father_mob]').val(null);
                $('input[name=occupation]').val(null);
                $('input[name=father_identity]').val(null);
                $('input[name=town]').val(null);

            });


            $('#add_father2').on('click', function() {
                $('#father_id').attr('hidden', false);
                $('input[name=father_name]').attr('hidden', true);
                $('.hint-father2').attr('hidden', true);
                $('.hint-father').show();

                $('#father_id').val(null);
                $('input[name=father_mob]').val(null);
                $('input[name=occupation]').val(null);
                $('input[name=father_identity]').val(null);
                $('input[name=town]').val(null);
                // $('#add_father')

            });



            $('#father_id').change(function() {
                let id = this.value;

                $.ajax({
                    url: "/GetFatherData/" + id,
                    method: 'GET',
                    data: {
                        // 'doctor_id': id,
                        // 'identity': identity,
                    },
                    dataType: "JSON",
                    success: function(data) {

                        console.log(data);
                        if (data != null) {
                            $('input[name=father_mob]').val(data.mobile);
                            $('input[name=occupation]').val(data.occupation);
                            $('input[name=father_identity]').val(data.identity);
                            $('input[name=town]').val(data.town);
                        }
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
                                    notEmpty: {
                                        message: 'ولي الأمر مطلوب',
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
                            add_date: {
                                validators: {
                                    notEmpty: {
                                        message: 'تاريخ التسجيل مطلوب',
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
