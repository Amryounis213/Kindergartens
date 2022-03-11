<?php

namespace App\DataTables\Levels;

use App\Models\Kindergarten;
use App\Models\Level;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class LevelsDataTable extends DataTable
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
            ->addColumn('status', function (Level $model) {
                return view('pages.kindergartens.parts._status', compact('model'));
            })
            ->editColumn('division', function (Level $model) {
                return $model->Division ? $model->Division->count() : 0;
            })
            ->addColumn('action', function (Level $model) {
                return view('pages.kindergartens.parts._action-menu', compact('model'));
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param Patient $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Level $model)
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
            ->setTableId('patients-table')
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
            Column::computed('status')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center')
                ->responsivePriority(-1)
                ->title(__('Status')),
            Column::computed('division')
                ->addClass('text-center')
                ->responsivePriority(-1)
                ->title('عدد الشعب'),
            Column::computed('action')
                ->exportable(false)
                ->printable(true)
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
