<?php

namespace App\DataTables\Reports;

use App\Models\ChildrenSubscriptions;
use App\Models\ExpensePay;
use App\Models\Income;
use App\Models\IncomesRevenue;
use App\Models\PayFees;
use App\Models\Subscriptions;
use Carbon\Carbon;
use Illuminate\Cache\RateLimiting\Limit;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class OutComesDatatable extends DataTable
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
        ->editColumn('outcome', function (ExpensePay $model) {
            return $model->Expense->name;
        })
        ->editColumn('year', function (ExpensePay $model) {
            return $model->Year->name;
        });
     
            
    }

    /**
     * Get query source of dataTable.
     *
     * @param ExpensePay $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ExpensePay $model)
    {
         /** REQUEST ALL ATTRIBUTE */
         $year = $this->request()->get('year');
         $start_date = $this->request()->get('start_date');
         $end_date = $this->request()->get('end_date');
         $query = $model->newQuery();

      
        if(!empty($year))
        {
            $query =  $query->where('year' , $year);
        }
        if(!empty($start_date))
        {
            $query =  $query->whereBetween('payment_date' , [$start_date , $end_date ?? Carbon::now()]);
        }

        return $query;
 
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
            ->dom('Bfrtip')
            ->responsive()
            ->autoWidth(false)
            ->parameters(['scrollX' => true])
            ->languageSearch('بحث:  ')
            ->languageProcessing('جاري تحميل البيانات ...')
            ->languageZeroRecords('لا يوجد بيانات')
            ->languageInfo("عرض _START_ إلى _END_ من _TOTAL_ ملفات")
            ->languageInfoEmpty("عرض 0 الى 0 من 0 ملفات")
            ->languageInfoFiltered(" | تصفية من _MAX_ اجمالي ملفات")
            ->addTableClass('align-middle table-row-dashed fs-6 gy-5')
            ->buttons(
                Button::make('excel') ,
                Button::make('print') ,
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [

            Column::computed('outcome')->title('المصروف')->addClass('text-center'),
            Column::make('payment_date')->title('(المصروف)تاريخ الدفعة')->addClass('text-center'),
            Column::make('payment_amount')->title('(المصروف) المبلغ المدفوع')->addClass('text-center'),
            Column::make('Receipt_number')->title('رقم الوصل')->addClass('text-center'),
            Column::computed('year')->title('العام الدراسي')->addClass('text-center'),
            Column::make('notices')->title('سبب الخصم / ملاحظات')->addClass('text-center'),
            
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
