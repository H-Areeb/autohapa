<?php

namespace App\Http\Controllers\VehicleDetails;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\VehiclesModel\fueltype;
use Validator;
use Auth;
use DataTables;

class FueltypeController extends Controller
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
        if ($request->ajax()) {

            
            $fuelType = DB::select(DB::raw('select car_lkptfuel_type.id AS id , car_lkptfuel_type.name AS fuelType , 
            type.name AS type, car_lkptfuel_type.isactiveynid AS statusid
             from car_lkptfuel_type INNER JOIN type ON type.id = car_lkptfuel_type.type_id where type.is_visible = 1 order by car_lkptfuel_type.id desc '));
            
            
             return Datatables::of($fuelType)
                    ->with('types',$types)
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
      
       return view('vehicle_details/fueltype',compact('types'));
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
            'fuelType' => 'required',
            'select_type2' => 'required',
            'status' => 'required'
        );


        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $form_data = array(
            'name' => $request->fuelType,
            'type_id' => $request->select_type2,
            'isactiveynid' => $request->status
        );
        
        fueltype::create($form_data);

        return response()->json(['success'=>"Vehicle 's fuelType ADD successfully!."]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $typeid = $request->type_id;

        $fuelType = DB::select(DB::raw('select car_lkptfuel_type.id AS id , car_lkptfuel_type.name AS fuelType , 
            type.name AS type, car_lkptfuel_type.isactiveynid AS statusid
             from car_lkptfuel_type INNER JOIN type ON type.id = car_lkptfuel_type.type_id where type.is_visible = 1
             AND  car_lkptfuel_type.type_id = "'.$typeid.'" order by car_lkptfuel_type.id desc '));

        
        
        
         return Datatables::of($fuelType)
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
                
                 $data = fueltype::where('id','=',$id)->first();
     
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
            'fuelType' => 'required',
            'select_type2' => 'required',
            'ordinal'=> 'required',
            'status' => 'required'
        );


        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $form_data = array(
            'name' => $request->fuelType,
            'type_id' => $request->select_type2,
            'isactiveynid' => $request->status,
            'ordinal'=>$request->ordinal
        );
        
        fueltype::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success'=>"Vehicle 's fuelType update successfully!."]);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) 
    {
        $fuelType_id = $request->fuelType_id;
         
        $fuelTypeDelete =   fueltype::where('id',$fuelType_id)->first();
            
         if($fuelTypeDelete != null)
            {
                $fuelTypeDelete->delete();
                return  response()->json(['success'=>"Vehicle's fuelType deleted successfully!."]);
            }

        return  response()->json(['errors'=>'Bodtype ID is wrong!']);
    }
}
