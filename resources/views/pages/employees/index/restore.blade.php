



@can('employees.edit')
<a href="{{ route('employee.restore', $model) }}"
   title="استرجاع الموظف"
   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
   {!! theme()->getSvgIcon("icons/duotune/arrows/arr029.svg", "svg-icon-3") !!}
</a>
@endcan

