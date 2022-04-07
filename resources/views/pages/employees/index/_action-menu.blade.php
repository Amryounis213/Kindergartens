<!--begin::Action--->
<td class="text-end">
    @can('employees.create')
        <a href="{{route('jobplacement.create', $model)}}"
           title="تسكين وظيفي"
           class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm mb-1">
            {!! theme()->getSvgIcon("icons/duotune/general/gen054.svg", "svg-icon-3") !!}
        </a>
    @endcan
    @can('employees.edit')
        <a href="{{ route('employees.edit', $model) }}"
           title="تعديل"
           class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm mb-1">
            {!! theme()->getSvgIcon("icons/duotune/art/art005.svg", "svg-icon-3") !!}
        </a>
    @endcan
    @can('employees.delete')
        <a data-id="{{$model->id}}"
           title="حذف"
           class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm del_rec_btn">
            {!! theme()->getSvgIcon("icons/duotune/general/gen027.svg", "svg-icon-3") !!}
        </a>
    @endcan
</td>
<script>
    function popupWindow(url, windowName, win, w, h) {
        const y = win.top.outerHeight / 2 + win.top.screenY - (h / 2);
        const x = win.top.outerWidth / 2 + win.top.screenX - (w / 2);
        return win.open(url, windowName, `toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=${w}, height=${h}, top=${y}, left=${x}`);
    }
</script>
<!--end::Action--->
