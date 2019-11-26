<?php

namespace App\Http\Controllers\VehicleDetails;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\VehiclesModel\models;
use Validator;
use Auth;
use DataTables;

class modelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $types = DB::select(DB::raw('select * from type where is_visible = 1'));
        $makes = DB::select(DB::raw('select * from car_make where isactiveynid = 1'));
        if ($request->ajax()) {

            
            $Models = DB::select(DB::raw('select car_model.id AS id , car_model.name AS Model , car_make.name AS Make ,
             type.name AS type , car_model.isactiveynid AS statusid
             from car_model 
             INNER JOIN type ON type.id = car_model.type_id 
             INNER JOIN car_make ON car_make.id = car_model.car_makeid 
             where type.is_visible = 1 order by car_model.id DESC'));
            
            
             return Datatables::of($Models)
                    ->with(compact('types','makes'))
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<button   data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit"><i class="fa fa-edit"></i> Edit</button>';
   
                           $btn = $btn.' <button   data-id="'.$row->id.'" data-original-title="Delete" onclick="featuredelete(this)" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
    
                        return $btn;
                    })
                    ->editColumn('type', function($row){return '<h5><span class="label label-default">'.$row->type.'</span></h5>';})
                    ->editColumn('statusid', function($row){ 
                        
                            if($row->statusid == 1)
                            {
                                $label ='<h5><span class="label label-info">Active</span></h5>';
                            }
                            else
                            { 
                                $label ='<h5><span class="label label-warning">Disabled</span></h5>';
                            }
                            
                            return $label;
                                            })
                    ->rawColumns(['type','statusid','action'])
                    ->make(true);
        }
      
       return view('vehicle_details/model',compact('types','makes'));
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
        $rules = array(
            'model_name' => 'required',
            'select_make' => 'required',
            'select_type2' => 'required',
            'ordinal' => 'required',
            'status' => 'required'
        );


        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $form_data = array(
            'name' => $request->model_name,
            'type_id' => $request->select_type2,
            'car_makeid' => $request->select_make,
            'ordinal' => $request->ordinal,
            'isactiveynid' => $request->status
        );
        
        models::create($form_data);

        return response()->json(['success'=>"Vehicle 's Model Add successfully!."]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if($request->type_id2 != null)
        {
            
            $typeid = $request->type_id2;
            $makes = DB::select(DB::raw('select id,name from car_make where isactiveynid = 1 AND type_id ="'.$typeid.'"'));
            return response()->json(['makes'=>$makes]);
        }

        $typeid = $request->type_id;

        $Models = DB::select(DB::raw('select car_model.id AS id , car_model.name AS Model , car_make.name AS Make ,
             type.name AS type , car_model.isactiveynid AS statusid
             from car_model 
             INNER JOIN type ON type.id = car_model.type_id 
             INNER JOIN car_make ON car_make.id = car_model.car_makeid 
             where type.is_visible = 1 AND  car_model.type_id = "'.$typeid.'" order by car_model.id DESC'));
        
        
         return Datatables::of($Models)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<button   data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit"><i class="fa fa-edit"></i> Edit</button>';
   
                           $btn = $btn.' <button   data-id="'.$row->id.'" data-original-title="Delete" onclick="featuredelete(this)" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
    
                        return $btn;
                    })
                    ->editColumn('type', function($row){return '<h5><span class="label label-default">'.$row->type.'</span></h5>';})
                    ->editColumn('statusid', function($row){ 
                        
                            if($row->statusid == 1)
                            {
                                $label ='<h5><span class="label label-info">Active</span></h5>';
                            }
                            else
                            { 
                                $label ='<h5><span class="label label-warning">Disabled</span></h5>';
                            }
                            
                            return $label;
                                            })
                    ->rawColumns(['type','statusid','action'])
                    ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
       
        if(request()->ajax())
        {
           
            $data = models::where('id','=',$id)->first();

            return response()->json(['data' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $rules = array(
            'model_name' => 'required',
            'select_type2' => 'required',
            'select_make' => 'required',
            'ordinal' => 'required',
            'status' => 'required'
        );


        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $form_data = array(
            'name' => $request->model_name,
            'type_id' => $request->select_type2,
            'car_makeid' => $request->select_make,
            'ordinal' => $request->ordinal,
            'isactiveynid' => $request->status
        );
        
        models::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success'=>"Vehicle 's Model update successfully!."]);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) 
    {
        $model_id = $request->model_id;
         
        $modelDelete =   models::where('id',$model_id)->first();
            
         if($modelDelete != null)
            {
                $modelDelete->delete();
                return  response()->json(['success'=>"Vehicle's Model deleted successfully!."]);
            }

        return  response()->json(['errors'=>'Model ID is wrong!']);
    }
}
