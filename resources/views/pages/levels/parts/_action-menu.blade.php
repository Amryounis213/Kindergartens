<!--begin::Action--->
<td class="text-end">
    @can('levels.edit')
        <a href="{{route('levels.edit' , $model)}}"
           title="تعديل"
           class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm mb-1">
            {!! theme()->getSvgIcon("icons/duotune/art/art005.svg", "svg-icon-3") !!}
        </a>
    @endcan
</td>
<!--end::Action--->
