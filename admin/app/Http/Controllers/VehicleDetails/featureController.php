<?php

namespace App\Http\Controllers\VehicleDetails;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\VehiclesModel\features;
use Validator;
use Auth;
use DataTables;


class featureController extends Controller
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

            
            $Features = DB::select(DB::raw('select car_feature.id AS id , car_feature.name AS Feature , 
            type.name AS type, car_feature.controltypeid AS controlid
             from car_feature INNER JOIN type ON type.id = car_feature.type_id where type.is_visible = 1 order by car_feature.id desc '));
            
            
             return Datatables::of($Features)
                    ->with('types',$types)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<button   data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit"><i class="fa fa-edit"></i> Edit</button>';
   
                           $btn = $btn.' <button   data-id="'.$row->id.'" data-original-title="Delete" onclick="featuredelete(this)" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
    
                        return $btn;
                    })
                    ->editColumn('controlid', function($row){ 
                        
                            if($row->controlid == 1)
                            {
                                $label ='<span class="label label-info">checkbox</span>';
                            }
                            elseif($row->controlid == 2)
                            {
                                $label ='<span class="label label-warning">radio button</span>';
                            }
                            else
                            { 
                                $label ='<span class="label label-success">Select box</span>';
                            }
                            
                            return $label;
                                            })
                    ->rawColumns(['controlid','action'])
                    ->make(true);
        }
      
       return view('vehicle_details/features',compact('type'));
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
            'feature_name' => 'required',
            'select_type2' => 'required',
            'control_type' => 'required'
        );


        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $form_data = array(
            'name' => $request->feature_name,
            'type_id' => $request->select_type2,
            'controltypeid' => $request->control_type
        );
        
        features::create($form_data);

        return response()->json(['success'=>'Feature Added successfully!.']);
       
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

        $Features = DB::select(DB::raw('select car_feature.id AS id , car_feature.name AS Feature , 
        type.name AS type, car_feature.controltypeid AS controlid
         from car_feature INNER JOIN type ON type.id = car_feature.type_id where 
         type.is_visible = 1 AND  car_feature.type_id = "'.$typeid.'" order by car_feature.id desc '));
        
        
         return Datatables::of($Features)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $btn = '<button   data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit"><i class="fa fa-edit"></i> Edit</button>';
   
                    $btn = $btn.' <button   data-id="'.$row->id.'" data-original-title="Delete" onclick="featuredelete(this)" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';

                    return $btn;
                })
                ->editColumn('controlid', function($row){ 
                    
                        if($row->controlid == 1)
                        {
                            $label ='<span class="label label-info">checkbox</span>';
                        }
                        elseif($row->controlid == 2)
                        {
                            $label ='<span class="label label-warning">radio button</span>';
                        }
                        else
                        { 
                            $label ='<span class="label label-success">Select box</span>';
                        }
                        
                        return $label;
                                        })
                ->rawColumns(['controlid','action'])
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
            //$data = vehicleFeatures::findOrFail($id);
            $data = DB::select(DB::raw('select car_feature.id AS id , car_feature.name AS Feature , 
            car_feature.type_id AS type_id ,
            type.name AS type, car_feature.controltypeid AS controlid
            from car_feature INNER JOIN type ON type.id = car_feature.type_id where 
            type.is_visible = 1 AND  car_feature.id = "'.$id.'" limit 1 '));
         if(count($data) > 0){
             $data = $data[0];
         }else{
             $data = NULL;
         }
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
            'feature_name' => 'required',
            'select_type2' => 'required',
            'control_type' => 'required'
        );


        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $form_data = array(
            'name' => $request->feature_name,
            'type_id' => $request->select_type2,
            'controltypeid' => $request->control_type
        );
        
        features::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success'=>'Feature update successfully!.']);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) 
    {
        $feature_id = $request->feature_id;
         
        $featureDelete =   features::where('id',$feature_id)->first();
            
         if($featureDelete != null)
            {
                $featureDelete->delete();
                return  response()->json(['success'=>'Feature deleted successfully!.']);
            }

        return  response()->json(['errors'=>'Feature ID is wrong!']);
    }
}
