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
            
            data.start_date = $('#start_date').val();
            data.end_date = $('#end_date').val();
            data.year = $('#year').val();
        });

     
        $('#sub').change(function() {
            let id = this.value;
            $.ajax({
                url: "Get/" + id,
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
