<x-base-layout>

    @php
        $per1 = round(($employeeAtt / $employeeCount) * 100, 2);
        $per2 = round(($studentsAtt / $classplacementstudent) * 100, 2);
    @endphp
    <div id="kt_content" class="content d-flex flex-column flex-column-fluid">
        <div class="row g-5 g-xl-8">
            <!--begin::Col-->
            <div class="col-xl-4">
                <div class="col-md-12">
                    <div class="card bgi-no-repeat card-xl-stretch mb-xl-5">
                        <!--begin::Body-->
                        <div class="card-body my-3">
                            <div class="d-flex">
                                <span class="svg-icon svg-icon-success svg-icon-2x">
                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Chart-bar1.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13"
                                                  rx="1.5"/>
                                            <rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8"
                                                  rx="1.5"/>
                                            <path
                                                d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z"
                                                fill="#000000" fill-rule="nonzero"/>
                                            <rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6"
                                                  rx="1.5"/>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <a href="#" class="card-title fw-bolder text-success fs-5 mb-3 d-block">
                                    نسبة حضور الموظفين - الفترة الصباحية
                                </a>
                            </div>
                            <div class="py-1">
                                <span class="text-dark fs-1 fw-bolder me-2" data-kt-countup="true"
                                      data-kt-countup-value="{{ $per1 }}"> {{ $per1 }}</span>
                                <span class="fw-bold text-muted fs-7">%</span>
                            </div>
                            <div class="progress h-7px bg-success bg-opacity-50 mt-7">
                                <div class="progress-bar bg-success" role="progressbar"
                                     style="width: {{ $per1 }}%" aria-valuenow="{{ $per1 }}"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="card-footer">
                                <strong> الحضور / الكل :</strong>
                                <span>{{ $employeeAtt }} من اصل {{ $employeeCount }} موظف</span>
                            </div>
                        </div>
                        <!--end:: Body-->
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card bgi-no-repeat card-xl-stretch mb-xl-2">
                        <!--begin::Body-->
                        <div class="card-body my-3">
                            <div class="d-flex">
                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Chart-bar1.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13"
                                                  rx="1.5"/>
                                            <rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8"
                                                  rx="1.5"/>
                                            <path
                                                d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z"
                                                fill="#000000" fill-rule="nonzero"/>
                                            <rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6"
                                                  rx="1.5"/>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <a href="#" class="card-title fw-bolder text-primary fs-5 mb-3 d-block">
                                    نسبة حضور الموظفين - الفترة المسائية
                                </a>
                            </div>
                            <div class="py-1">
                                <span class="text-dark fs-1 fw-bolder me-2" data-kt-countup="true"
                                      data-kt-countup-value="{{ $per2 }}">{{ $per2 }}</span>
                                <span class="fw-bold text-muted fs-7">%</span>
                            </div>
                            <div class="progress h-7px bg-primary bg-opacity-50 mt-7">
                                <div class="progress-bar bg-primary" role="progressbar"
                                     style="width: {{ $per2 }}%" aria-valuenow="{{ $per2 }}"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="card-footer">
                                <strong> الحضور / الكل :</strong>
                                <span>{{ $employeeAtt }} من اصل {{ $employeeCount }} موظف</span>
                            </div>
                        </div>
                        <!--end:: Body-->
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="col-md-12">
                    <div class="card bgi-no-repeat card-xl-stretch mb-xl-5">
                        <!--begin::Body-->
                        <div class="card-body my-3">
                            <div class="d-flex">
                                <span class="svg-icon svg-icon-success svg-icon-2x">
                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Chart-bar1.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13"
                                                  rx="1.5"/>
                                            <rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8"
                                                  rx="1.5"/>
                                            <path
                                                d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z"
                                                fill="#000000" fill-rule="nonzero"/>
                                            <rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6"
                                                  rx="1.5"/>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <a href="#" class="card-title fw-bolder text-success fs-5 mb-3 d-block">
                                    نسبة حضور الطلاب - الفترة الصباحية
                                </a>
                            </div>
                            <div class="py-1">
                                <span class="text-dark fs-1 fw-bolder me-2" data-kt-countup="true"
                                      data-kt-countup-value="{{ $per1 }}"> {{ $per1 }}</span>
                                <span class="fw-bold text-muted fs-7">%</span>
                            </div>
                            <div class="progress h-7px bg-success bg-opacity-50 mt-7">
                                <div class="progress-bar bg-success" role="progressbar"
                                     style="width: {{ $per1 }}%" aria-valuenow="{{ $per1 }}"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="card-footer">
                                <strong> الحضور / الكل :</strong>
                                <span> {{ $studentsAtt }} من اصل {{ $classplacementstudent }} طالب مسكن</span>
                            </div>
                        </div>
                        <!--end:: Body-->
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card bgi-no-repeat card-xl-stretch mb-xl-2">
                        <!--begin::Body-->
                        <div class="card-body my-3">
                            <div class="d-flex">
                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Chart-bar1.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13"
                                                  rx="1.5"/>
                                            <rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8"
                                                  rx="1.5"/>
                                            <path
                                                d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z"
                                                fill="#000000" fill-rule="nonzero"/>
                                            <rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6"
                                                  rx="1.5"/>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <a href="#" class="card-title fw-bolder text-primary fs-5 mb-3 d-block">
                                    نسبة حضور الطلاب - الفترة المسائية
                                </a>
                            </div>
                            <div class="py-1">
                                <span class="text-dark fs-1 fw-bolder me-2" data-kt-countup="true"
                                      data-kt-countup-value="{{ $per2 }}">{{ $per2 }}</span>
                                <span class="fw-bold text-muted fs-7">%</span>
                            </div>
                            <div class="progress h-7px bg-primary bg-opacity-50 mt-7">
                                <div class="progress-bar bg-primary" role="progressbar"
                                     style="width: {{ $per2 }}%" aria-valuenow="{{ $per2 }}"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="card-footer">
                                <strong> الحضور / الكل :</strong>
                                <span> {{ $studentsAtt }} من اصل {{ $classplacementstudent }} طالب مسكن</span>
                            </div>

                        </div>
                        <!--end:: Body-->
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="col-md-12 row">
                    <div class="col-xl-6">
                        <!--begin::Statistics Widget 1-->
                        <div class="card  bgi-no-repeat bg-dark card-xl-stretch mb-5 mb-xl-8"
                             style="background-position: right top; background-size: 20% auto; background-image: url({{ '/demo1/media/svg/shapes/abstract-2.svg' }})">
                            <!--begin::Body-->
                            <div class="card-body">
                                <a href="#"
                                   class="card-title text-dark fw-bolder text-muted  text-hover-primary fs-7">موظفين
                                    مسكنين</a>
                                <div class="fw-bolder text-primary fs-3qx" data-kt-countup="true"
                                     data-kt-countup-value="{{ $employeeCount }}">0
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Statistics Widget 1-->
                    </div>
                    <div class="col-xl-6">
                        <!--begin::Statistics Widget 1-->
                        <div class="card  bgi-no-repeat bg-dark card-xl-stretch mb-5 mb-xl-8"
                             style="background-position: right top; background-size: 20% auto; background-image: url({{ '/demo1/media/svg/shapes/abstract-2.svg' }})">
                            <!--begin::Body-->
                            <div class="card-body">
                                <a href="#"
                                   class="card-title text-dark fw-bolder text-muted  text-hover-primary fs-7">
                                    غير مسكنين
                                </a>
                                <div class="fw-bolder text-primary fs-3qx" data-kt-countup="true"
                                     data-kt-countup-value="{{ $employeeCount }}">0
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Statistics Widget 1-->
                    </div>
                </div>
                <div class="col-md-12 row">
                    <div class="col-xl-6">
                        <div class="card boxing bgi-no-repeat card-xl-stretch mb-5 mb-xl-8"
                             style="background-position: right top; background-size: 20% auto; background-image: url({{ '/demo1/media/svg/shapes/abstract-2.svg' }})">
                            <!--begin::Body-->
                            <div class="card-body">
                                <a href="#" class="card-title text-dark fw-bolder  text-hover-primary fs-7">
                                    سائقين مسكنين
                                </a>
                                <div class="fw-bolder text-dark fs-3qx" data-kt-countup="true"
                                     data-kt-countup-value="{{ $driversCount }}">0
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card boxing bgi-no-repeat card-xl-stretch mb-5 mb-xl-8"
                             style="background-position: right top; background-size: 20% auto; background-image: url({{ '/demo1/media/svg/shapes/abstract-2.svg' }})">
                            <!--begin::Body-->
                            <div class="card-body">
                                <a href="#" class="card-title text-dark fw-bolder  text-hover-primary fs-7">
                                    غير مسكنين
                                </a>
                                <div class="fw-bolder text-dark fs-3qx" data-kt-countup="true"
                                     data-kt-countup-value="{{ $kinderCount }}">0
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                    </div>
                </div>
                <div class="col-md-12 row">
                    <div class="col-xl-6">
                        <div class="card bgi-no-repeat card-xl-stretch mb-5 mb-xl-8"
                             style="background-position: right top; background-size: 20% auto; background-image: url({{ '/demo1/media/svg/shapes/abstract-2.svg' }})">
                            <!--begin::Body-->
                            <div class="card-body">
                                <a href="#" class="card-title fw-bolder text-muted text-hover-primary fs-7">
                                    طلاب مسكنين
                                </a>
                                <div class="fw-bolder text-primary fs-3qx" data-kt-countup="true"
                                     data-kt-countup-value="{{ $classplacementstudent }}">0
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card bgi-no-repeat card-xl-stretch mb-5 mb-xl-8"
                             style="background-position: right top; background-size: 20% auto; background-image: url({{ '/demo1/media/svg/shapes/abstract-2.svg' }})">
                            <!--begin::Body-->
                            <div class="card-body">
                                <a href="#" class="card-title fw-bolder text-muted text-hover-primary fs-7">
                                    غير مسكنين
                                </a>
                                <div class="fw-bolder text-primary fs-3qx" data-kt-countup="true"
                                     data-kt-countup-value="{{ $studentsCount -  $classplacementstudent}}">0
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Col-->
        </div>
        <div class="col-xl-12">
            <div class="card mb-5 mb-xxl-8">
                <!--begin::Header-->
                <div class="card-header align-items-center border-0 mt-4">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="fw-bolder mb-2 text-dark">الأقساط المستحقة للشهر الحالي</span>
                        <span class="text-muted fw-bold fs-7"></span>
                    </h3>
                    <div class="card-toolbar">

                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-5">
                    <!--begin::Timeline-->
                    <div class="timeline-label">
                        <!--begin::Item-->
                        <div class="timeline-item ">
                            <!--begin::Label-->
                            <div class="timeline-label fw-bolder text-gray-800 fs-6">100 ₪</div>
                            <!--end::Label-->
                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-warning fs-1"></i>
                            </div>
                            <!--end::Badge-->
                            <!--begin::Text-->
                            <div class="timeline-content fw-bolder text-gray-800 ps-3">&nbsp;
                                استحقاق مالي على
                                <a href="#" class="text-primary">اسماعيل جمال محمد صلاح</a>
                            </div>
                            <!--end::Text-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="timeline-item">
                            <!--begin::Label-->
                            <div class="timeline-label fw-bolder text-gray-800 fs-6">100 ₪</div>
                            <!--end::Label-->
                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-success fs-1"></i>
                            </div>
                            <!--end::Badge-->
                            <!--begin::Content-->
                            <div class="timeline-content fw-bolder text-gray-800 ps-3">&nbsp;
                                استحقاق مالي على
                                <a href="#" class="text-primary">حسن عبد الله جمال محسن</a>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="timeline-item">
                            <!--begin::Label-->
                            <div class="timeline-label fw-bolder text-gray-800 fs-6">100 ₪</div>
                            <!--end::Label-->
                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-danger fs-1"></i>
                            </div>
                            <!--end::Badge-->
                            <!--begin::Desc-->
                            <div class="timeline-content fw-bolder text-gray-800 ps-3">&nbsp;
                                استحقاق مالي على
                                <a href="#" class="text-primary">خالد محمد هشام محمود</a>
                            </div>
                            <!--end::Desc-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="timeline-item">
                            <!--begin::Label-->
                            <div class="timeline-label fw-bolder text-gray-800 fs-6">150 ₪</div>
                            <!--end::Label-->
                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-danger fs-1"></i>
                            </div>
                            <!--end::Badge-->
                            <!--begin::Desc-->
                            <div class="timeline-content fw-bolder text-gray-800 ps-3">&nbsp;
                                استحقاق مالي على
                                <a href="#" class="text-primary">محمد سمير كمال عبد الله</a>
                            </div>
                            <!--end::Desc-->
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::Timeline-->
                </div>
                <!--end: Card Body-->
            </div>
        </div>
    </div>
    @section('styles')
        <style>
            .card-footer {
                padding: 1rem 0.25rem !important;
            }

            .boxing {
                background-color: #49c9c3;
            }

            .boxing2 {
                background-color: #49c9c3;
            }

            .boxing3 {
                background-color: #49c9c3;
            }

            .boxing4 {
                background-color: #49c9c3;
            }

        </style>
    @endsection
    @section('scripts')
        <script>
            var x1 = {{ round(88, 2) }};
            var element = document.getElementById("kt_mixed_widget_14_chart");
                //  alert(x1);
                //  console.log(element);
                //   var height = parseInt(KTUtil.css(element, 'height'));
                //   var chart = new ApexCharts(element, options);
                //   chart.render();
        </script>
    @endsection
</x-base-layout>
