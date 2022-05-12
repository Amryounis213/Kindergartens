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
        Table.on('preXhr.dt', function(e, settings, data) {
            data.children = $('#children_id').val();
            data.income_id = $('#income_id').val();
            data.year = $('#year').val();
            // data.kindergarten= $('#kindergarten_id').val();
        });
        // $('#income_id').change(function() {
        //     let x = Table.DataTable().ajax.reload();
        //     let id = this.value;
        //     $.ajax({
        //         url: "GetExpenseData/" + id,
        //         method: 'GET',
        //         data: {
        //             // 'doctor_id': id,
        //             // 'identity': identity,
        //         },
        //         dataType: "JSON",
        //         success: function(data) {
        //             //console.log(data);
        //             if (data != null) {
        //                 // $('#year').empty();
        //                 // $('#year').append(
        //                 //     ` <option value="${data.year.id}" selected> ${data.year.name} </option>  `);
        //                 $('#payment_amount2').val('');
        //                 $('#Receipt_number').val('');
        //                 $('#notices').val('');
        //                 $('#payment_date').val('');
        //                 $('#year').prop('selectedIndex', 0);

        //                 var today = new Date();
        //                 var dd = String(today.getDate()).padStart(2, '0');
        //                 var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        //                 var yyyy = today.getFullYear();

        //                 today = yyyy + '-' + mm + '-' + dd;
        //                 $('#payment_date').val(today);
        //             }
        //         }
        //     });
          
        // });

        $('#children_id').change(function() {
            let x = Table.DataTable().ajax.reload();
        });

        $('#year').change(function() {
            let x = Table.DataTable().ajax.reload();
      
        });

        let zero =$('#status_').val(0);
        $('#status_').change(function(){
        if($('#status_').val() == 0){
            $('#status_').val(1);
            $('#children_id').attr('disabled' , false);
        }else{
            $('#status_').val(0);
            $('#children_id').attr('disabled' , true);
            $('#children_id').val(null);
            Table.DataTable().ajax.reload();
        }

          
        });

        
        $('#discount_id').change(function() {
            let id = this.value;
            let sub = $('#required_amount');
            $.ajax({
                url: "GetDiscountData/" + id,
                method: 'GET',
                data: {
                    // 'doctor_id': id,
                    // 'identity': identity,
                },
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    if (data != null) {
                        $('#discount').empty();
                        $('#discount').val(data.per);
                        let r = $('#required_amount').val();
                        $('#discount_amount').val(sub.val() * data.per / 100);
                        let d = $('#discount_amount').val();
                        $('#total').val(r - d + ' شيكل');
                    }
                }
            });
        });
        $("#discount").keyup(function() {
            let discount = $(this).val();
            let x = $("#required_amount").val();
            $('#total').empty();
            let discounttotal = x * discount / 100;
            $('#total').val(x - discounttotal + ' شيكل');
        });
        // $('#kindergarten_id').change(function() {
        //     let x =Table.DataTable().ajax.reload();
        // });
    </script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#sub').on('click', function(e) {
                e.preventDefault();
                const oTable = $('#patients-table').DataTable();
                $.ajax({
                    method: "POST",
                    url: "{{ route('expenses-pay.store') }}",
                    data: {
                        "rec_name": $('#rec_name').val(),    
                        "expense_id": $('#expense_id').val(),
                        "payment_date": $('#payment_date').val(),
                        "payment_amount": $('#payment_amount2').val(),
                        "Receipt_number": $('#Receipt_number').val(),
                        "notices": $('#notices').val(),
                        "year": $('#year').val(),
                    },
                    dataType: "JSON",
                    success: function(data) {
                        oTable.draw();
                        toastr.options.positionClass = 'toast-top-left';
                        toastr[data.status](data.message);
                        $('#year').val(null),
                        $('#expense_id').val(null),
                        $('#rec_name').val('')
                        $('#payment_amount2').val('');
                        $('#Receipt_number').val('');
                        $('#notices').val('');
                        $('#payment_date').val('');


                       
                    }
                });
            });
        })
    </script>
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
                let url = "{{ route('pay-fees.destroy', ':id') }}";
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
                url: "{{-- route('year-sub.status') --}}",
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
