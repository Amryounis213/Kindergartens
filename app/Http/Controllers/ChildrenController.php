<?php

namespace App\Http\Controllers;

use App\DataTables\Childrens\ChildrensDataTable;
use App\DataTables\Childrens\TrashedDataTable;
use App\Models\Children;
use App\Models\ClassPlacment;
use App\Models\Division;
use App\Models\Employee;
use App\Models\Father;
use App\Models\FatherRelation;
use App\Models\Kindergarten;
use App\Models\Level;
use App\Models\Period;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChildrenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ChildrensDataTable $dataTable)
    {
        return $dataTable->render('pages.childrens.index.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fathers = Father::select('id' , 'name')->get();
        $kinder = Kindergarten::select('id' , 'name')->get();
        $relations = FatherRelation::where('status' , 1)->get();

        return view('pages.childrens.create.create' , [
            'fathers'=>$fathers ,
             'kindergartens'=>$kinder ,
             'relations'=>$relations ,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $request->merge([
            'bth_date'=> Carbon::createFromFormat('d/m/Y', $request->bth_date)->format('Y-m-d'),
            'add_date'=> Carbon::createFromFormat('d/m/Y', $request->add_date)->format('Y-m-d'),
            'added_by'=> Auth::guard('web')->id(),
            'status'=> $request->status ?? 0 ,
        ]);
        Children::create($request->all());
        return redirect()->route('childrens.index');
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
        $children = Children::find($id);
        $fathers = Father::select('id' , 'name')->get();
        $kinder = Kindergarten::select('id' , 'name')->get();
        $relations = FatherRelation::where('status' , 1)->get();
        return view('pages.childrens.edit.edit' , [

            'children'=>$children ,
            'fathers'=>$fathers , 
            'relations'=>$relations
            
        ]);

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
        $child=Children::find($id);
        $request->merge([
            
            'bth_date'=>$request->bth_date,
            'add_date'=>$request->add_date,

            'added_by'=> Auth::guard('web')->id(),
            'status'=>1,
        ]);
        $child->update($request->all());
        return redirect()->route('childrens.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $children = Children::withTrashed()->where('id' , $id)->first();
        if($children->trashed())
        {
            $children->forceDelete();
            return response()->json(['status' => 'success', 'message' => 'تم حذف الطالب بشكل نهائي ']);
        }
        $children->delete();
        return response()->json(['status' => 'success', 'message' => 'تم الحذف بنجاح']);

    }

    
    public function classPlacementView($id=null)
    {
     
        $kinder =Kindergarten::all();
        $employee = Children::find($id);
        
        return view('pages.childrens.class_placement.create' ,[
            'childrens'=>Children::all(),
            'kinder'=>$kinder ,
            'periods'=>Period::select('id' , 'name')->get(),
            'employees'=> Employee::select('id' , 'name')->get(),
            'levels'=>Level::select('id' , 'name')->get(),
            'divisions'=>Division::select('id' ,'name')->get(),
            'emp'=>$employee,
        
        ]);
    }
    public function classPlacementStore(Request $request)
    {
        $exists = ClassPlacment::where('children_id' , $request->children_id)->exists();

        $request->merge([
            'year'=> $request->year,
        ]);
        if($exists)
        {
            //تعديل
            $class_placement =ClassPlacment::where('children_id' , $request->children_id)->first();
            $class_placement->update($request->all());
            return redirect()->route('childrens.index')->with('success' , 'تم تعديل التسكين بنجاح');

        }

        else{
            //اضافة
            ClassPlacment::create($request->all());
            return redirect()->route('childrens.index')->with('success' , 'تم التسكين بنجاح');
        }
    }


    public function status(Request $request)
    {
        $id = $request->get('id');
        $info = Children::find($id);
        return updateModelStatus($info);
    }

    public function GetTrashed(TrashedDataTable $dataTable)
    {
        $children=Children::onlyTrashed()->get();
        return $dataTable->render('pages.childrens.index.index');
    }


    public function RestoreTrashed($id)
    {
        $children = Children::withTrashed()->where('id' , $id)->first();
        $children->deleted_at = null ;
        $children->save();
        return redirect()->back()->with('success' , 'تم استرجاع الطالب بنجاح');
    }
}
