<?php

namespace App\Http\Controllers\VehicleDetails;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\VehiclesModel\bodytype;
use Validator;
use Auth;
use DataTables;

class BodytypeController extends Controller
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

            
            $bodytype = DB::select(DB::raw('select car_lkptbody_type.id AS id , car_lkptbody_type.name AS bodyType , 
            type.name AS type, car_lkptbody_type.isactiveynid AS statusid
             from car_lkptbody_type INNER JOIN type ON type.id = car_lkptbody_type.type_id where type.is_visible = 1 order by car_lkptbody_type.id desc '));
            
            
             return Datatables::of($bodytype)
                    ->with('types',$types)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<button   data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit"><i class="fa fa-edit"></i> Edit</button>';
   
                           $btn = $btn.' <button   data-id="'.$row->id.'" data-original-title="Delete" onclick="featuredelete(this)" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
    
                        return $btn;
                    })
                    ->editColumn('statusid', function($row){ 
                        
                            if($row->statusid == 1)
                            {
                                $label ='<span class="label label-info">Active</span>';
                            }
                            else
                            { 
                                $label ='<span class="label label-warning">disabled</span>';
                            }
                            
                            return $label;
                                            })
                    ->rawColumns(['statusid','action'])
                    ->make(true);
        }
      
       return view('vehicle_details/bodytype',compact('type'));
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
            'bodyType' => 'required',
            'select_type2' => 'required',
            'status' => 'required'
        );


        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $form_data = array(
            'name' => $request->bodyType,
            'type_id' => $request->select_type2,
            'isactiveynid' => $request->status
        );
        
        bodytype::create($form_data);

        return response()->json(['success'=>"Vehicle 's Bodytype ADD successfully!."]);
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

        $bodytype = DB::select(DB::raw('select car_lkptbody_type.id AS id , car_lkptbody_type.name AS bodyType , 
            type.name AS type, car_lkptbody_type.isactiveynid AS statusid
             from car_lkptbody_type INNER JOIN type ON type.id = car_lkptbody_type.type_id where type.is_visible = 1
             AND  car_lkptbody_type.type_id = "'.$typeid.'" order by car_lkptbody_type.id desc '));

        
        
        
         return Datatables::of($bodytype)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<button   data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit"><i class="fa fa-edit"></i> Edit</button>';
   
                           $btn = $btn.' <button   data-id="'.$row->id.'" data-original-title="Delete" onclick="featuredelete(this)" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
    
                        return $btn;
                    })
                    ->editColumn('statusid', function($row){ 
                        
                            if($row->statusid == 1)
                            {
                                $label ='<span class="label label-info">Active</span>';
                            }
                            else
                            { 
                                $label ='<span class="label label-warning">disabled</span>';
                            }
                            
                            return $label;
                                            })
                    ->rawColumns(['statusid','action'])
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
            
            $data = DB::select(DB::raw('select car_lkptbody_type.id AS id , car_lkptbody_type.name AS bodyType , 
            car_lkptbody_type.type_id AS type_id, car_lkptbody_type.isactiveynid AS statusid
             from car_lkptbody_type INNER JOIN type ON type.id = car_lkptbody_type.type_id where type.is_visible = 1
             AND  car_lkptbody_type.id = "'.$id.'" order by car_lkptbody_type.id desc '));

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
            'bodyType' => 'required',
            'select_type2' => 'required',
            'status' => 'required'
        );


        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $form_data = array(
            'name' => $request->bodyType,
            'type_id' => $request->select_type2,
            'isactiveynid' => $request->status
        );
        
        bodytype::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success'=>"Vehicle 's Bodytype update successfully!."]);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) 
    {
        $bodytype_id = $request->bodytype_id;
         
        $bodytypeDelete =   bodytype::where('id',$bodytype_id)->first();
            
         if($bodytypeDelete != null)
            {
                $bodytypeDelete->delete();
                return  response()->json(['success'=>"Vehicle's Bodytype deleted successfully!."]);
            }

        return  response()->json(['errors'=>'Bodtype ID is wrong!']);
    }
}
