<!--begin::Action--->
@if($model->id != 1 || auth()->user()->id == 1)
<td class="text-end">
    @can('permissions.edit')
    <a href="{{ route('role.permissions', $model) }}"
       title="ادارة الصلاحيات"
       class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
        {!! theme()->getSvgIcon("icons/duotune/general/gen019.svg", "svg-icon-3") !!}
    </a>
    <a href="{{ route('role.edit', $model) }}"
       title="تعديل"
       class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
        {!! theme()->getSvgIcon("icons/duotune/art/art005.svg", "svg-icon-3") !!}
    </a>
    @endcan
    @can('permissions.delete')
    <a data-id = "{{$model->id}}"
       title="حذف"
       class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm del_rec_btn">
        {!! theme()->getSvgIcon("icons/duotune/general/gen027.svg", "svg-icon-3") !!}
    </a>
    @endcan
</td>
@endif
<!--end::Action--->

