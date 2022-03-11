<!--begin::Action--->
<td class="text-end">
    @can('patients.show')
    <a href="{{ route('patient.show', $model) }}"
       title="السجل الطبي"
       class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
        {!! theme()->getSvgIcon("icons/duotune/communication/com005.svg", "svg-icon-3") !!}
    </a>
    @endcan @can('patients.edit')
    <a href="{{ route('kindergarden.edit', $model) }}"
       title="تعديل"
       class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
        {!! theme()->getSvgIcon("icons/duotune/art/art005.svg", "svg-icon-3") !!}
    </a>
    @endcan
    @can('patients.delete')
    <a data-id = "{{$model->id}}"
       title="حذف"
       class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm del_rec_btn">
        {!! theme()->getSvgIcon("icons/duotune/general/gen027.svg", "svg-icon-3") !!}
    </a>
    @endcan
</td>
<!--end::Action--->
