



@can('division.edit')
<a href="{{ route('division.restore', $model) }}"
   title="استرجاع الشعبة"
   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
    {!! theme()->getSvgIcon("icons/duotune/arrows/arr029.svg", "svg-icon-3") !!}
</a>
@endcan

<<<<<<< HEAD
=======
@can('division.delete')
<a data-id="{{$model->id}}"
   title="حذف"
   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm del_rec_btn">
    {!! theme()->getSvgIcon("icons/duotune/general/gen027.svg", "svg-icon-3") !!}
</a>
@endcan
>>>>>>> 172b760fa8e81b90d794e4ccf2a3929081098812
