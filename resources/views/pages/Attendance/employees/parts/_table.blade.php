<!--begin::Table-->

<table class="table table-xl table-bordered">
    
    <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">اسم الموظف</th>
            <th class="text-center" scope="col">الحضور /الغياب</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($employees as $key => $model)
           <tr>
            <td>{{$key + 1}}</td>
            <td>
                <strong>{{$model->name}}</strong>
            </td>

            <td class="text-center">
                @can('patients.edit')

                    <!--begin::Options-->
                    @if (!$model->attendance()->where('attendence_date', date('Y-m-d'))->first())
                        <!--begin::Option-->
                        <label class="form-check form-check-inline form-check-solid ">
                            <input class="form-check-input" name="attendences[{{ $model->id }}]" type="radio"
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
                        <!--begin::Option-->
                        <label class="form-check form-check-inline form-check-solid ">
                            <input class="form-check-input" name="attendences[{{ $model->id }}]" disabled
                                {{ $model->attendance()->first()->attendence_status == 1 ? 'checked' : '' }} type="radio"
                                id="gender-male" value="1">
                            <span class="fw-bold ps-2 fs-6 gender">حاضر </span>
                        </label>

                        <!--end::Option-->
                        <!--begin::Option-->
                        <label class="form-check form-check-inline form-check-solid">
                            <input class="form-check-input" name="attendences{{ $model->id }}" disabled
                                {{ $model->attendance()->first()->attendence_status == 0 ? 'checked' : '' }} type="radio"
                                id="gender-female" value="2">
                            <span class="fw-bold ps-2 fs-6">غائب</span>
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
    <script type="text/javascript">
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
    </script>
    <script>
        $(document).on('click', '.sts-fld', function(e) {
            //e.preventDefault();
            const id = $(this).data('id');
            const checkedValue = $(this).is(":checked");
            $.ajax({
                type: "POST",
                url: "{{ route('patient.status') }}",
                data: {
                    'id': id
                },
                success: function(data) {
                    if (data.type === 'yes') {
                        $(this).prop("checked", checkedValue);
                    } else if (data.type === 'no') {
                        $(this).prop("checked", !checkedValue);
                    }
                    toastr.options.positionClass = 'toast-top-left';
                    toastr[data.status](data.message);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            let oTable = $('#patients-table').DataTable();
            oTable.on('order.dt search.dt', function() {
                oTable.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();
            $('#myInputSearchField').keyup(function() {
                oTable.search($(this).val()).draw();
            });
            oTable.draw();
        });
    </script>
@endsection
