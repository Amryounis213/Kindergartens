<!--begin::Table-->
{{ $dataTable->table() }}
<!--end::Table-->
@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
{{-- Inject Scripts --}}
@section('scripts')
    {{ $dataTable->scripts() }}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script type="text/javascript">
        $(".flatpickr-input").flatpickr();
    </script>
    <script>
        const Table = $('#patients-table');
        Table.on('preXhr.dt', function (e, settings, data) {
            data.children = $('#children_id').val();
            // data.kindergarten= $('#kindergarten_id').val();
        });
        $('#children_id').change(function () {
            let x = Table.DataTable().ajax.reload();
            let id = this.value;
            $.ajax({
                url: "GetChildrenData/" + id,
                method: 'GET',
                data: {
                    // 'doctor_id': id,
                    // 'identity': identity,
                },
                dataType: "JSON",
                success: function (data) {
                    if (data != null) {
                        $('#year').empty();
                        $('#year').append(
                            ` <option value="${data.year.id}" selected> ${data.year.name} </option>  `
                        );
                        $('#division_id').empty();
                        $('#division_id').val(data.division.name)
                        $('#level_id').empty();
                        $('#level_id').val(data.level.name)
                    }


                    if (data.children.installment.length > 0) {
                        $('#sub').prop('disabled', true);
                    } else {
                        $('#sub').removeAttr('disabled');

                    }
                }
            });
            $.ajax({
                url: "GetFeeData/" + id,
                method: 'GET',
                data: {
                    // 'doctor_id': id,
                    // 'identity': identity,
                },
                dataType: "JSON",
                success: function (data) {
                    //console.log(data);
                    if (data != null) {
                        $('#required_amount').empty();
                        let x = Number(data.sub_amount).toFixed(1);
                        $('#required_amount').append(`${x}`);
                        $('#payment_amount').empty();
                        let y = Number(data.payment_amount).toFixed(1);
                        $('#payment_amount').append(`${y}`);
                        $('#total_amount').empty();
                        let z = Number(x - y).toFixed(1);
                        $('#total_amount').append(`${z}`);


                        $('#payment_amount2').val(z);
                    }
                }
            });


        });


        // $('#kindergarten_id').change(function() {
        //     let x =Table.DataTable().ajax.reload();
        // });
    </script>
    <script>
       $('#no_of_installment').keyup(function() {
            if ($(this).val() < 8 && $(this).val() > 0 ) {
                $('#start_date').removeAttr('disabled');
            } else {
                $('#start_date').attr("disabled", true);
                $('#start_date').val('');
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#sub').on('click', function (e) {
                e.preventDefault();
                const oTable = $('#patients-table').DataTable();
                $.ajax({
                    method: "POST",
                    url: "{{ route('installments.store') }}",
                    data: {
                        "children_id": $('#children_id').val(),
                        "payment_date": $('#payment_date').val(),
                        "payment_amount": $('#payment_amount2').val(),
                        "start_date": $('#start_date').val(),
                        "no_of_installment": $('#no_of_installment').val(),
                        "notices": $('#notices').val(),
                        "year": $('#year').val(),
                    },
                    dataType: "JSON",
                    success: function (data) {
                        oTable.draw();
                        toastr.options.positionClass = 'toast-top-left';
                        toastr[data.status](data.message);

                        $('#payment_date').val('');
                        $('#payment_amount2').val('');
                        $('#start_date').val('');
                        $('#no_of_installment').val('');
                        $('#notices').val('');
                    }
                });
            });
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            const oTable = $('#patients-table').DataTable();
            $(document).on('click', ".del_rec_btn", function (e) {
                e.preventDefault();
                const id = $(this).data('id');
                let url = "{{ route('pay-fees.destroy', ':id') }}";
                url = url.replace(':id', id);
                Swal.fire({
                    title: '??????????!',
                    text: '???? ?????? ?????????? ???? ?????? ??????????????????',
                    icon: 'warning',
                    confirmButtonText: '???????? ??????',
                    confirmButtonColor: '#d33',
                    cancelButtonText: '?????? ??????????',
                    showCancelButton: true,
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: "DELETE",
                            url: url,
                            success: function (data) {
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
        $(document).on('click', '.sts-fld', function (e) {
            //e.preventDefault();
            const id = $(this).data('id');
            const checkedValue = $(this).is(":checked");
            $.ajax({
                type: "POST",
                url: "{{-- route('year-sub.status') --}}",
                data: {
                    'id': id
                },
                success: function (data) {
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
        $(document).ready(function () {
            let oTable = $('#patients-table').DataTable();
            oTable.on('order.dt search.dt', function () {
                oTable.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function (cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();
            $('#myInputSearchField').keyup(function () {
                oTable.search($(this).val()).draw();
            });
            oTable.draw();
        });
    </script>

    <script>
        $(document).on('click', ".pay", function (e) {
            const oTable = $('#patients-table').DataTable();
            id = $(this).attr('id');
            Swal.fire({
                title: '??????????!',
                text: '???? ?????? ?????????? ???? ?????? ?????????? ??',
                icon: 'info',
                iconColor: '#55DD6B',
                confirmButtonText: '???????? ??????',
                confirmButtonColor: '#55DD6B',
                cancelButtonText: '?????? ??????????',
                showCancelButton: true,
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "pay-installment/" + id,
                        method: 'GET',
                        data: {
                            // 'doctor_id': id,
                            // 'identity': identity,
                        },
                        dataType: "JSON",
                        success: function (data) {
                            console.log(data);
                            if (data != null) {
                                oTable.draw();
                                toastr.options.positionClass = 'toast-top-left';
                                toastr[data.status](data.message);
                            }

                            $.ajax({
                                url: "GetFeeData/" + data.children_id,
                                method: 'GET',
                                data: {
                                    // 'doctor_id': id,
                                    // 'identity': identity,
                                },
                                dataType: "JSON",
                                success: function (data) {
                                    //console.log(data);
                                    if (data != null) {
                                        $('#required_amount').empty();
                                        let x = Number(data.sub_amount).toFixed(1);
                                        $('#required_amount').append(`${x}`);
                                        $('#payment_amount').empty();
                                        let y = Number(data.payment_amount).toFixed(
                                            1);
                                        $('#payment_amount').append(`${y}`);
                                        $('#total_amount').empty();
                                        let z = Number(x - y).toFixed(1);
                                        $('#total_amount').append(`${z}`);
                                    }
                                }
                            });
                        }
                    });
                }
            });

        });
    </script>

    <script>
        ////////////////////////////////////////
        document.addEventListener('DOMContentLoaded', function (e) {
            FormValidation.formValidation(
                document.getElementById('details_form'), {
                    fields: {
                        year: {
                            validators: {
                                notEmpty: {
                                    message: '?????????? ???????????????? ????????????',
                                },
                            },
                        },
                        children_id: {
                            validators: {
                                notEmpty: {
                                    message: '?????? ???????????? ??????????',
                                },
                            },
                        },

                        no_of_installment: {
                            validators: {
                                notEmpty: {
                                    message: '?????? ??????????????  ??????????',
                                },

                                regexp: {
                                    regexp: /^[1-8]+$/,
                                    message: ' ??????????  ?????? ??????????',
                                },
                                stringLength: {
                                    message: '?????????????? ???? ???????? ???? 8',
                                    max: 1,
                                }
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
