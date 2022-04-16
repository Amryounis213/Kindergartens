<!--begin::Table-->
{{ $dataTable->table() }}
<!--end::Table-->

{{-- Inject Scripts --}}
@section('scripts')
    {{ $dataTable->scripts() }}


    <script>
        const Table = $('#patients-table');
        Table.on('preXhr.dt', function(e, settings, data) {
            data.children = $('#children_id').val();
            // data.kindergarten= $('#kindergarten_id').val();
        });


        $('#children_id').change(function() {

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
                success: function(data) {

<<<<<<< HEAD
                    console.log(data);
                    if (data != null) {

                        

                        if (data.year != null) {
                            $('#year').empty();
                            $('#year').append(
                                ` <option value="${data.year.id}" selected> ${data.year.name} </option>  
                            `);

                            $('#division_id').empty();

                            $('#division_id').val(data.division.name)

                            $('#level_id').empty();
                            $('#level_id').val(data.level.name)


                        } else {
                            $('#division_id').empty();

                            $('#division_id').val('غير مسكن')

                            $('#level_id').empty();
                            $('#level_id').val('غير مسكن')
                        }



=======
                    //console.log(data);
                    if (data != null) {

                        $('#year').empty();
                        $('#year').append(
                            ` <option value="${data.year.id}" selected> ${data.year.name} </option>  `);



                        $('#division_id').empty();
                        $('#division_id').val(data.division.name)

                        $('#level_id').empty();
                        $('#level_id').val(data.level.name)
>>>>>>> 172b760fa8e81b90d794e4ccf2a3929081098812

                        $('#required_amount').val('');
                        $('#discount').val(0);
                        $('#discount_amount').val('');
                        $('#total').val(0);
<<<<<<< HEAD
                        $('#subscription_id').prop('selectedIndex', 0);
                        let dis = $('#discount_id');
                        dis.prop('selectedIndex', 0);
                        dis.prop("disabled", true);

=======
                        $('#subscription_id').prop('selectedIndex',0);
                        let dis =$('#discount_id');
                        dis.prop('selectedIndex',0);
                        dis.prop("disabled", true);
                        
>>>>>>> 172b760fa8e81b90d794e4ccf2a3929081098812

                    }
                }
            });


        });





        $('#subscription_id').change(function() {


            let id = this.value;

            $.ajax({
                url: "GetSubscriptionData/" + id,
                method: 'GET',
                data: {
                    // 'doctor_id': id,
                    // 'identity': identity,
                },
                dataType: "JSON",
                success: function(data) {

                    console.log(data);
                    if (data != null) {


                        $('#required_amount').empty();
                        $('#required_amount').val(data.year_subscription.price)

                        $('#discount_amount').val(0);
                        $('#discount').val(0);

                        $('#total').val(data.year_subscription.price);
                        // $('#discount_id').find('option:first').attr('selected', 'selected');
                        $("#discount_id")[0].selectedIndex = '';

                        if ($('#subscription_id').val() != '') {
                            $('#discount_id').removeAttr('disabled');
                        } else {
                            $('#discount_id').attr('disabled');

                        }

                    }
                }
            });


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

<<<<<<< HEAD

=======
                        
>>>>>>> 172b760fa8e81b90d794e4ccf2a3929081098812
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
                    url: "{{ route('children-subscriptions.store') }}",
                    data: {
                        "discount": $('#discount').val(),
                        "children_id": $('#children_id').val(),
                        "subscription_id": $('#subscription_id').val(),
<<<<<<< HEAD
                        "discount_id": $('#discount_id').val(),
                        "year": $('#year').val(),
=======
                        "discount_id" : $('#discount_id').val() ,
                        "year" : $('#year').val() ,
>>>>>>> 172b760fa8e81b90d794e4ccf2a3929081098812

                    },
                    dataType: "JSON",
                    success: function(data) {

                        oTable.draw();
                        toastr.options.positionClass = 'toast-top-left';
                        toastr[data.status](data.message);
                        $('#division_id').empty();
                        $('#level_id').empty();
                        $('#required_amount').val('');
                        $('#discount').val(0);
                        $('#discount_amount').val('');
                        $('#total').val(0);
<<<<<<< HEAD
                        $('#subscription_id').prop('selectedIndex', 0);
                        let dis = $('#discount_id');
                        dis.prop('selectedIndex', 0);
=======
                        $('#subscription_id').prop('selectedIndex',0);
                        let dis =$('#discount_id');
                        dis.prop('selectedIndex',0);
>>>>>>> 172b760fa8e81b90d794e4ccf2a3929081098812
                        dis.prop("disabled", true);
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
                let url = "{{-- route('year-sub.destroy', ":id") --}}";
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
