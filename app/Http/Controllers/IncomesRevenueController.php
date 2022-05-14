<?php

namespace App\Http\Controllers;

use App\DataTables\InComes\InComeRevenueDataTable;
use App\Models\Children;
use App\Models\Income;
use App\Models\IncomesRevenue;
use App\Models\Year;
use Auth;
use Illuminate\Http\Request;

class IncomesRevenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(InComeRevenueDataTable $datatable)
    {
        $years = Year::where('status' , 1)->get();
        /**
         * =========================================
         * For Children Doesnt Have Any Installments 
         * =========================================
         */
        $childrens = Children::get();
        /**
         * =========================================
         * For Children Doesnt Have Any Installments
         * And Children In Kindergarten same Manger 
         * =========================================
         */
        $incomes = Income::where('status' , 1)->get();
        if(Auth::user()->kindergarten_id != null)
        {   
            $childrens = $childrens->where('kindergarten_id' , Auth::user()->kindergarten_id)->get();
        }
        return $datatable->render('pages.IncomesRevenue.index' , compact('years' , 'childrens' , 'incomes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sub = IncomesRevenue::create($request->all());
        return response()->json(['status' => 'success', 'message' => trans('تم الدفع بنجاح ')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $income =IncomesRevenue::find($id);
        ///////////////////////////////////
        $years = Year::where('status' , 1)->get();  
        $childrens = Children::get();
        $incomes = Income::where('status' , 1)->get();
        if(Auth::user()->kindergarten_id != null)
        {   
            $childrens = $childrens->where('kindergarten_id' , Auth::user()->kindergarten_id)->get();
        }
        return view('pages.IncomesRevenue.edit' ,compact('years' , 'childrens' , 'incomes' , 'income'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $income =IncomesRevenue::find($id);
        $income->update($request->all());
        return redirect()->route('incomes-revenue.index')->with('success' , 'تم تعديل الايراد بنجاح');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
