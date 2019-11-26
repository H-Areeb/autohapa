<?php

namespace App\Http\Controllers\VehicleDetails;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\VehiclesModel\derivative;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;
use DataTables;

class derivativeController extends Controller
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
        $types = DB::select(DB::raw('select id,name from type where is_visible = 1'));
        $makes = DB::select(DB::raw('select id,name from car_make where isactiveynid = 1 '));
        $models = DB::select(DB::raw('select id,name from car_model where isactiveynid = 1 '));
        $variants = DB::select(DB::raw('select id,name from car_variant where isactiveynid = 1 '));
        
        if ($request->ajax()) {

            
            $Derivative = DB::select(DB::raw('select car_derivative.id AS id , car_derivative.name AS Derivative ,
            car_variant.name AS Variant ,
             car_model.name AS Model, car_make.name AS Make ,
             type.name AS type , car_derivative.isactiveynid AS statusid
             from car_derivative 
             INNER JOIN car_variant ON car_variant.id = car_derivative.car_variantid 
             INNER JOIN type ON type.id = car_derivative.type_id 
             INNER JOIN car_model ON car_model.id = car_derivative.car_modelid 
             INNER JOIN car_make ON car_make.id = car_derivative.car_makeid 


             where type.is_visible = 1 order by car_derivative.id DESC'));
            
            
             return Datatables::of($Derivative)
                    ->with(compact('types','makes','models','variants'))
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<button data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit"><i class="fa fa-edit"></i> Edit</button>';
   
                           $btn = $btn.'<button data-id="'.$row->id.'" data-original-title="Delete" onclick="featuredelete(this)" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
    
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
      
       return view('vehicle_details/derivative',compact('types','makes','models','variants'));
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
            'derivative_name' => 'required',
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
            'name' => $request->derivative_name,
            'type_id' => $request->select_type2,
            'car_makeid' => $request->select_make,
            'car_modelid' => $request->select_model,
            'car_variantid' => $request->select_variant,
            'ordinal' => $request->ordinal,
            'isactiveynid' => $request->status
        );
        
        derivative::create($form_data);

        return response()->json(['success'=>"Vehicle 's Derivative Add successfully!."]);
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
        if($request->make_id != null)
        {
           $makeid = $request->make_id;
        $models = DB::select(DB::raw('select id,name from car_model where isactiveynid = 1  AND car_makeid ="'.$makeid.'" '));
        return response()->json(['models'=>$models]);
        }
        if($request->model_id != null)
        {
           $modelid = $request->model_id;
        $variants = DB::select(DB::raw('select id,name from car_variant where isactiveynid = 1  AND car_modelid ="'.$modelid.'" '));
        return response()->json(['models'=>$variants]);
        }


        $typeid = $request->type_id;

        $Derivative = DB::select(DB::raw('select car_derivative.id AS id , car_derivative.name AS Derivative ,
        car_variant.name AS Variant ,car_model.name AS Model, car_make.name AS Make ,
        type.name AS type , car_derivative.isactiveynid AS statusid
        from car_derivative 
        INNER JOIN type ON type.id = car_derivative.type_id 
        INNER JOIN car_variant ON car_variant.id = car_derivative.car_variantid 
        INNER JOIN car_model ON car_model.id = car_derivative.car_modelid 
        INNER JOIN car_make ON car_make.id = car_derivative.car_makeid  
             where type.is_visible = 1 AND  car_derivative.type_id = "'.$typeid.'" order by car_derivative.id DESC'));
        
        
         return Datatables::of($Derivative)
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
            $data = derivative::where('id','=',$id)->first();

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
            'derivative_name' => 'required',
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
            'name' => $request->derivative_name,
            'type_id' => $request->select_type2,
            'car_makeid' => $request->select_make,
            'car_modelid' => $request->select_model,
            'car_variantid' => $request->select_variant,
            'ordinal' => $request->ordinal,
            'isactiveynid' => $request->status
        );
        
        derivative::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success'=>"Vehicle 's Derivative update successfully!."]);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) 
    {
        $derivative_id = $request->derivative_id;
         
        $derivativeDelete =   derivative::where('id',$derivative_id)->first();
            
         if($derivativeDelete != null)
            {
                $derivativeDelete->delete();
                return  response()->json(['success'=>"Vehicle's Derivative delete "]);
            }

        return  response()->json(['errors'=>'Derivative ID is wrong!']);

    }
}
