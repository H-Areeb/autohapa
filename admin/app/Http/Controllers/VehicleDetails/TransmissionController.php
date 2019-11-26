<?php

namespace App\Http\Controllers\VehicleDetails;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\VehiclesModel\transmission;
use Validator;
use Auth;
use DataTables;

class TransmissionController extends Controller
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

            
            $transmission = DB::select(DB::raw('select car_lkpttransmission.id AS id , car_lkpttransmission.name AS transmission , 
            type.name AS type, car_lkpttransmission.isactiveynid AS statusid
             from car_lkpttransmission INNER JOIN type ON type.id = car_lkpttransmission.type_id where type.is_visible = 1 order by car_lkpttransmission.id desc '));
            
            
             return Datatables::of($transmission)
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
      
       return view('vehicle_details/transmission',compact('types'));
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
            'transmission' => 'required',
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
            'name' => $request->transmission,
            'type_id' => $request->select_type2,
            'isactiveynid' => $request->status,
            'ordinal' => $request->ordinal
        );
        
        transmission::create($form_data);

        return response()->json(['success'=>"Vehicle 's transmission ADD successfully!."]);
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

        $transmission = DB::select(DB::raw('select car_lkpttransmission.id AS id , car_lkpttransmission.name AS transmission , 
            type.name AS type, car_lkpttransmission.isactiveynid AS statusid
             from car_lkpttransmission INNER JOIN type ON type.id = car_lkpttransmission.type_id where type.is_visible = 1
             AND  car_lkpttransmission.type_id = "'.$typeid.'" order by car_lkpttransmission.id desc '));

        
        
        
         return Datatables::of($transmission)
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
           
            $data = transmission::where('id','=',$id)->first();

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
            'transmission' => 'required',
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
            'name' => $request->transmission,
            'type_id' => $request->select_type2,
            'isactiveynid' => $request->status,
            'ordinal'=>$request->ordinal
        );
        
        transmission::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success'=>"Vehicle 's transmission update successfully!."]);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) 
    {
        $transmission_id = $request->transmission_id;
         
        $transmissionDelete =   transmission::where('id',$transmission_id)->first();
            
         if($transmissionDelete != null)
            {
                $transmissionDelete->delete();
                return  response()->json(['success'=>"Vehicle's transmission deleted successfully!."]);
            }

        return  response()->json(['errors'=>'transmission ID is wrong!']);
    }
}
