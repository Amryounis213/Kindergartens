<?php

namespace App\Http\Controllers;

use App\DataTables\ChildrensPayment\ChildrenPayFeesDataTable;
use App\DataTables\ChildrensPayment\TrashedDataTable;
use App\Models\Children;
use App\Models\Father;
use App\Models\PayFees;
use Illuminate\Http\Request;

class PayFeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ChildrenPayFeesDataTable $datatable)
    {
        // $childrens = Children::with(['Installment' => function($query){

        //     $query->whereHas('Installment' , function($query){
        //          $query->latest('number')->first()->where('status' ,'paid');
        //     });
        //     //  $query->latest('number')->first()->where('status' ,'paid');
        // }])->where('status', 1)->get();

            $childrens = Children::whereDoesntHave('Installment' , function($query){
                $query->where('status' , 'unpaid');
            })->get();
            return $datatable->render('pages.childrenpayment.index' , compact('childrens'));
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
        $sub = PayFees::create($request->all());
        return response()->json(['status' => 'success', 'message' => trans('تم دفع رسوم جديدة للطفل')]);
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
        
        $pay = PayFees::find($id);

        $childrens = Children::find($pay->children_id);
        return view('pages.childrenpayment.edit' , compact('childrens' , 'pay'));
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
        $sub = PayFees::find($id);
        $sub->update($request->all());
        return redirect()->route('pay-fees.index')->with('success' , 'تم تعديل الدفعة بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub = PayFees::find($id);
        $sub->delete();
        return response()->json(['status' => 'success', 'message' => 'تم الحذف بنجاح']);

    }
    public function GetTrashed(TrashedDataTable $dataTable)
    {
       
        return $dataTable->render('pages.employees.index.index');
    }


    public function RestoreTrashed($id)
    {
        $children = PayFees::withTrashed()->where('id' , $id)->first();
        $children->deleted_at = null ;
        $children->save();
        return redirect()->back()->with('success' , 'تم استرجاع الطالب بنجاح');
    }
}
