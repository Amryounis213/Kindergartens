<?php

namespace App\DataTables\Childrens;

use App\Models\Children;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;


class ChildrensDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     *
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('table_index', '')
            ->editColumn('added_by', function (Children $model) {
                return $model->added_by ? $model->creator->first_name . ' ' .$model->creator->last_name : __('System');
            })
            ->editColumn('period', function (Children $model) {
                return $model->ClassPlacement ? ($model->ClassPlacement->Period->name) ?? '---' : '---';
            })
            ->editColumn('division', function (Children $model) {
                return $model->ClassPlacement ? ($model->ClassPlacement->Division->name) ?? '---' : '---';
            })
            ->editColumn('level', function (Children $model) {
                return $model->ClassPlacement ? ($model->ClassPlacement->Level->name) ?? '---' : '---';
            })
            ->addColumn('status', function (Children $model) {
                return view('pages.employees.index._status', compact('model'));
            })
            ->addColumn('action', function (Children $model) {
                return view('pages.employees.index._action-menu', compact('model'));
            });
            
    }

    /**
     * Get query source of dataTable.
     *
     * @param Children $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Children $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('orders-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->stateSave(true)
            ->orderBy(0)
            ->responsive()
            ->autoWidth(false)
            ->parameters(['scrollX' => true])
            ->languageSearch('بحث:  ')
            ->languageProcessing('جاري تحميل البيانات ...')
            ->languageZeroRecords('لا يوجد بيانات')
            ->languageInfo("عرض _START_ إلى _END_ من _TOTAL_ ملفات")
            ->languageInfoEmpty("عرض 0 الى 0 من 0 ملفات")
            ->languageInfoFiltered(" | تصفية من _MAX_ اجمالي ملفات")
            ->addTableClass('align-middle table-row-dashed fs-6 gy-5');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('table_index')->title(__('#'))->addClass('text-center'),
            Column::make('name')->title(__('name'))->addClass('text-center'),
            Column::make('bth_date')->title(__('dob'))->addClass('text-center'),
            Column::make('added_by')->title(__('created by'))->addClass('text-center'),
            Column::computed('period')->title('الفترة')->addClass('text-center'),
            Column::computed('division')->title('الشعبة')->addClass('text-center'),
            Column::computed('level')->title('المستوى')->addClass('text-center'),
            Column::computed('status')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center')
                ->responsivePriority(-1)
                ->title(__('Status')),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center')
                ->responsivePriority(-1)
                ->title(__('action')),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Patients_' . date('YmdHis');
    }
}
