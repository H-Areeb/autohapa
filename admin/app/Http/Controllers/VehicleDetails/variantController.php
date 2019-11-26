<?php

namespace App\Http\Controllers\VehicleDetails;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\VehiclesModel\variants;
use Validator;
use Auth;
use DataTables;

class variantController extends Controller
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
        
        if ($request->ajax()) {

            
            $Variants = DB::select(DB::raw('select car_variant.id AS id , car_variant.name AS Variant ,
             car_model.name AS Model, car_make.name AS Make ,
             type.name AS type , car_variant.isactiveynid AS statusid
             from car_variant 
             INNER JOIN type ON type.id = car_variant.type_id 
             INNER JOIN car_model ON car_model.id = car_variant.car_modelid 
             INNER JOIN car_make ON car_make.id = car_variant.car_makeid 

             where type.is_visible = 1 order by car_variant.id DESC'));
            
            
             return Datatables::of($Variants)
                    ->with(compact('types','makes','models'))
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
      
       return view('vehicle_details/variant',compact('types','makes','models'));
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
            'variant_name' => 'required',
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
            'name' => $request->variant_name,
            'type_id' => $request->select_type2,
            'car_makeid' => $request->select_make,
            'car_modelid' => $request->select_model,
            'ordinal' => $request->ordinal,
            'isactiveynid' => $request->status
        );
        
        variants::create($form_data);

        return response()->json(['success'=>"Vehicle 's variant Add successfully!."]);
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


        $typeid = $request->type_id;

        

        $Variants = DB::select(DB::raw('select car_variant.id AS id , car_variant.name AS Variant ,
        car_model.name AS Model, car_make.name AS Make ,
        type.name AS type , car_variant.isactiveynid AS statusid
        from car_variant 
        INNER JOIN type ON type.id = car_variant.type_id 
        INNER JOIN car_model ON car_model.id = car_variant.car_modelid 
        INNER JOIN car_make ON car_make.id = car_variant.car_makeid  
             where type.is_visible = 1 AND  car_variant.type_id = "'.$typeid.'" order by car_variant.id DESC'));
        
        
         return Datatables::of($Variants)
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
            $data = variants::where('id','=',$id)->first();

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
            'variant_name' => 'required',
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
            'name' => $request->variant_name,
            'type_id' => $request->select_type2,
            'car_makeid' => $request->select_make,
            'car_modelid' => $request->select_model,
            'ordinal' => $request->ordinal,
            'isactiveynid' => $request->status
        );
        
        variants::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success'=>"Vehicle 's variant update successfully!."]);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) 
    {
        $variant_id = $request->variant_id;
         
        $variantDelete =   variants::where('id',$variant_id)->first();
            
         if($variantDelete != null)
            {
                $variantDelete->delete();
                return  response()->json(['success'=>"Vehicle's variant deleted successfully!."]);
            }

        return  response()->json(['errors'=>'variant ID is wrong!']);

    }
}
