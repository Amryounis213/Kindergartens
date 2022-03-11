<!--begin::Action--->
<?php
$rout = 'order.index';
if (auth()->user()->role_id == 9) {
    $rout = 'order.doctor';
} else if (auth()->user()->role_id == 10) {
    $rout = 'order.pharmacy';
} else if (auth()->user()->role_id == 4) {
    $rout = 'order.collections';
} else if (auth()->user()->role_id == 12) {
    $rout = 'order.lab';
} else if (auth()->user()->role_id == 13) {
    $rout = 'order.xrayRoom';
}
?>
<td class="text-end">
    <a href="{{ route($rout, $model)}}"
       title="ادارة الطلب"
       class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
        {!! theme()->getSvgIcon("icons/duotune/general/gen019.svg", "svg-icon-3") !!}
    </a>
    @can('orders.edit')
    <a href="{{ route('employees.edit', $model) }}"
       title="تعديل"
       class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
        {!! theme()->getSvgIcon("icons/duotune/art/art005.svg", "svg-icon-3") !!}
    </a>
    @endcan
    @can('orders.cancel')
    @if($model->cancel == 0)
    <a href="#"
       title="{{ __('cancel')}}" data-id="{{$model->id}}"
       class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 csl-btn">
        {!! theme()->getSvgIcon("icons/duotune/general/gen034.svg", "svg-icon-3") !!}
    </a>
    @endif
    @endcan
    @can('orders.print_ticket')
    <?php $link = route('order.print', ['order' => $model]); ?>
    <a
        href="{{route('order.print', ['order' => $model])}}"
        title="طباعة تذكرة"
        target="_blank"
        class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
        {!! theme()->getSvgIcon("icons/duotune/general/gen054.svg", "svg-icon-3") !!}
    </a>

    {{--            <a--}}
    {{--            target="popup"--}}
    {{--            title="طباعة تذكرة"--}}
    {{--            onclick="popupWindow('{{$link}}', 'test', window, 295, 378);"--}}
    {{--            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">--}}
    {{--            {!! theme()->getSvgIcon("icons/duotune/general/gen054.svg", "svg-icon-3") !!}--}}
    {{--        </a>--}}
    @endcan
    @can('orders.delete')
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
