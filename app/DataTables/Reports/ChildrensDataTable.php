<?php

namespace App\DataTables\Reports;

use App\Models\Children;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Button;
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
           
            ->editColumn('period', function (Children $model) {
                return $model->ClassPlacement ? ($model->ClassPlacement->Period->name) ?? '---' : '---';
            })
            ->editColumn('division', function (Children $model) {
                return $model->ClassPlacement ? ($model->ClassPlacement->Division->name) ?? '---' : '---';
            })
            ->editColumn('level', function (Children $model) {
                return $model->ClassPlacement ? ($model->ClassPlacement->Level->name) ?? '---' : '---';
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
        /** REQUEST ALL ATTRIBUTE */
        $children = $this->request()->get('children');
        $identity = $this->request()->get('identity');
        $bth_date = $this->request()->get('bth_date');
        $address = $this->request()->get('address');
        $start_date = $this->request()->get('start_date');
        $end_date = $this->request()->get('end_date');
        $father_identity = $this->request()->get('father_identity');
        $employee_id = $this->request()->get('employee_id');
        $period_id = $this->request()->get('period_id');
        $level_id = $this->request()->get('level_id');
        $division_id = $this->request()->get('division_id');
        $year = $this->request()->get('year');
      

        $query = $model->newQuery();
        if(!empty($children))
        {
            $query =  $query->where('name' , 'LIKE' , '%' . $children . '%');
        }
        if(!empty($identity))
        {
            $query =  $query->where('identity' , (string)$identity);
        }

        if(!empty($bth_date))
        {
            $query =  $query->where('bth_date' , '=', Carbon::parse($bth_date)->format('Y-m-d'));
        }

        if(!empty($address))
        {
            $query =  $query->where('address' , (string)$address);
        }

        if(!empty($start_date) && !empty($end_date))
        {
            $query =  $query->whereBetween('add_date' , [$start_date , $end_date]);
        }

        if(!empty($father_identity))
        {
            $query =  $query->where('identity' , (string)$father_identity);
        }

        if(!empty($employee_id))
        {
            $query =  $query->whereHas('ClassPlacement' ,function($query) use($employee_id){
                $query->where('employee_id' , $employee_id);
            });
        }
        if(!empty($division_id))
        {
            $query =  $query->whereHas('ClassPlacement' ,function($query) use($division_id){
                $query->where('division_id' , $division_id);
            });
        }

        if(!empty($period_id))
        {
            $query =  $query->whereHas('ClassPlacement' ,function($query) use($period_id){
                $query->where('period_id' , $period_id);
            });
        }

        if(!empty($level_id))
        {
            $query =  $query->whereHas('ClassPlacement' ,function($query) use($level_id){
                $query->where('level_id' , $level_id);
            });
        }

       

      
         return $query;  
           


       // return $model->newQuery();
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
            Column::make('table_index')->title(__('#'))->addClass('text-center'),
            Column::make('name')->title(__('name'))->addClass('text-center'),
            Column::make('identity')->title(__('identity'))->addClass('text-center'),
            Column::make('bth_date')->title(__('dob'))->addClass('text-center'),
            Column::computed('period')->title('الفترة')->addClass('text-center'),
            Column::computed('division')->title('الشعبة')->addClass('text-center'),
            Column::computed('level')->title('المستوى')->addClass('text-center'),
          
          
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Childrens_' . date('YmdHis');
    }
}
