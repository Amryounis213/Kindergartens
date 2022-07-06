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
            data.start_date = $('#start_date').val();
            data.end_date = $('#end_date').val();
            data.year = $('#year').val();
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
                    //console.log(data);
                    if (data != null) {
                        // $('#year').empty();
                        // $('#year').append(
                        //     ` <option value="${data.year.id}" selected> ${data.year.name} </option>  `);
                        $('#payment_amount').val('');
                        $('#Receipt_number').val('');
                        $('#notices').val('');
                        $('#payment_date').val('');
                        $('#year').prop('selectedIndex', 0);

                        var today = new Date();
                        var dd = String(today.getDate()).padStart(2, '0');
                        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                        var yyyy = today.getFullYear();

                        today = yyyy + '-' + mm + '-' + dd;
                        $('#payment_date').val(today);
                    }
                }
            });
            $.ajax({
                url: "/GetFeeData/" + id,
                method: 'GET',
                data: {
                    // 'doctor_id': id,
                    // 'identity': identity,
                },
                dataType: "JSON",
                success: function(data) {
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
                    }
                }
            });
        });
        $('#year').change(function() {
            let x = Table.DataTable().ajax.reload();

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
       
    </script>

    <script>

        $('#sub').on('click', function() {
            let x = Table.DataTable().draw();
        });
    </script>
@endsection
