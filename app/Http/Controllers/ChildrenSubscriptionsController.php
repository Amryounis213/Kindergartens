<?php

namespace App\Http\Controllers;

use App\DataTables\Subscriptions\ChildrenSubscriptionsDataTable;
use App\Models\Children;
use App\Models\ChildrenSubscriptions;
use App\Models\Discount;
use App\Models\Subscriptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChildrenSubscriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ChildrenSubscriptionsDataTable $datatable)
    {
       
        $childrens = Children::select('id', 'name')->where('status', 1)->get();
        $subs = Subscriptions::whereHas('YearSubscription')->where('status', 1)->get();
        $dicsounts = Discount::get();
        return $datatable->render('pages.childrensubscriptions.index', compact('childrens', 'subs' , 'dicsounts'));
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

        $exists = ChildrenSubscriptions::where('children_id', $request->children_id)->where('subscription_id', $request->subscription_id)->exists();
        if (!$exists) {
            $requiredAmount = Subscriptions::find($request->subscription_id)->YearSubscription->price;
            $disountAmount = $requiredAmount * $request->discount / 100;
            $total = $requiredAmount - $disountAmount;
            $request->merge([
                'required_amount' => $requiredAmount,
                'total' => $total,
            ]);
            $sub = ChildrenSubscriptions::create($request->all());
            return response()->json(['status' => 'success', 'message' => trans('تم اضافة اشتراك جديد للطفل')]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'هذا الاشتراك موجود للطالب']);
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub =ChildrenSubscriptions::find($id);
        $sub->delete();
        return response()->json(['status' => 'success', 'message' => 'تم الحذف بنجاح']);

    }
}
