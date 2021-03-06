<!--begin::Table-->

<table class="table">

    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">اسم الطالب</th>
            <th scope="col">الفترة</th>
            <th class="text-center" scope="col">الحضور /الغياب</th>
        </tr>
    </thead>

    <tbody id="tbody">
        @foreach ($childrens as $key => $model)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>
                    <strong>{{ $model->name }}</strong>
                </td>
                <td>
                    <strong>{{ $model->ClassPlacement->Period->name}}</strong>
                    <input class="form-check-input box1" name="period_id" value="{{ $model->ClassPlacement->Period->id}}" type="hidden" >
                </td>
                <td class="text-center">
                    @can('childrens.edit')
                        <!--begin::Options-->
                        @if (!$model->attendance()->where('attendence_date', date('Y-m-d'))->first())
                            <!--begin::Option-->
                            <label class="form-check form-check-inline form-check-solid ">
                                <input class="form-check-input box1" name="attendences[{{ $model->id }}]" type="radio"
                                    id="gender-male" value="1">
                                <span class="fw-bold ps-2 fs-6 gender">حاضر </span>
                            </label>

                            <!--end::Option-->
                            <!--begin::Option-->
                            <label class="form-check form-check-inline form-check-solid">
                                <input class="form-check-input" name="attendences[{{ $model->id }}]" type="radio"
                                    id="gender-female" value="2">
                                <span class="fw-bold ps-2 fs-6">غائب</span>
                            </label>
                            <!--end::Option-->
                            <!--end::Options-->
                        @else
                        <label class="form-check form-check-inline form-check-solid">
                            @if($model->attendance()->latest()->first()->attendence_status == 1)
                            <strong class="fs-6 text-success">حاضر </strong>
                            @else
                            <strong class="fs-6 text-danger">غائب </strong>

                            @endif
                        </label>
                        @endif
                    @endcan

                </td>


            </tr>
        @endforeach

    </tbody>

</table>
<!--end::Table-->

{{-- Inject Scripts --}}
@section('scripts')
    {{-- $dataTable->scripts() --}}
    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            const oTable = $('#patients-table').DataTable();
            $(document).on('click', ".del_rec_btn", function(e) {
                e.preventDefault();
                const id = $(this).data('id');
                let url = "{{ route('patient.destroy', ':id') }}";
                url = url.replace(':id', id);

                Swal.fire({
                    title: 'تحذبر!',
                    text: 'هل أنت متأكد من حذف البيانات؟',
                    icon: 'warning',
                    confirmButtonText: 'نعم، حذف',
                    confirmButtonColor: '#d33',
                    cancelButtonText: 'لا، إلغاء',
                    showCancelButton: true,
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: "DELETE",
                            url: url,
                            success: function(data) {
                                oTable.draw();
                                toastr.options.positionClass = 'toast-top-left';
                                toastr[data.status](data.message);
                            }
                        });
                    }
                })
            });
        });
    </script> --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"
        integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w=="
        crossorigin="anonymous"></script>

    <script>
        let x = document.getElementsByClassName('typeahead');
        
        var path = "{{ route('autocomplete') }}";
        $('input.typeahead').typeahead({
            source: function(terms, process) {
                return $.get(path, {
                    terms: terms
                }, function(data) {
                    return process(data);
                });
            }
        });

        function CheckAll(className, elem) {

            var elements = document.getElementsByClassName(className);
            var l = elements.length;

            if (elem.checked) {
                for (var i = 0; i < l; i++) {
                    if (elements[i].hasAttribute('disabled')) {
                        elements[i].checked = false
                    }
                    elements[i].checked = true;
                }
            } else {
                for (var i = 0; i < l; i++) {
                    if (elements[i].hasAttribute('disabled')) {
                        elements[i].checked = true;
                    } else {
                        elements[i].checked = false;

                    }
                }
            }
        }
    </script>
@endsection
