<!--begin::Status--->
<td  class="text-end">
    @can('kindergarten.edit')
        @if ($model->status == 'paid')
            <div class="badge badge-light-success">تم الدفع</div>
        @else
            <div class="badge badge-light-danger">غير مدفوع</div>
        @endif
    @endcan
</td>
<!--end::Status--->
