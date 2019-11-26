<?php

namespace App\Http\Controllers\VehicleDetails;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\VehiclesModel\makes;
use Validator;
use Auth;
use DataTables;

class makeController extends Controller
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

            
            $Makes = DB::select(DB::raw('select car_make.id AS id , car_make.name AS Make , 
            type.name AS type, car_make.isactiveynid AS statusid
             from car_make INNER JOIN type ON type.id = car_make.type_id where type.is_visible = 1 order by car_make.id desc '));
            
            
             return Datatables::of($Makes)
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
      
       return view('vehicle_details/makes',compact('types'));
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
            'make_name' => 'required',
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
            'name' => $request->make_name,
            'type_id' => $request->select_type2,
            'ordinal'=> $request->ordinal,
            'isactiveynid' => $request->status
        );
        
        makes::create($form_data);

        return response()->json(['success'=>"Vehicle 's Make update successfully!."]);
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

        $Makes = DB::select(DB::raw('select car_make.id AS id , car_make.name AS Make , 
            type.name AS type, car_make.isactiveynid AS statusid
             from car_make INNER JOIN type ON type.id = car_make.type_id where type.is_visible = 1
             AND  car_make.type_id = "'.$typeid.'" order by car_make.id desc '));

        
        
        
         return Datatables::of($Makes)
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
            $id = $request->id;
       
            if(request()->ajax())
            {
               
                $data = makes::where('id','=',$id)->first();
    
                return response()->json(['data' => $data]);
            }
            
            
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
            'make_name' => 'required',
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
            'name' => $request->make_name,
            'type_id' => $request->select_type2,
            'ordinal'=> $request->ordinal,
            'isactiveynid' => $request->status
        );
        
        makes::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success'=>"Vehicle 's Make update successfully!."]);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) 
    {
        $make_id = $request->make_id;
         
        $makeDelete =   makes::where('id',$make_id)->first();
            
         if($makeDelete != null)
            {
                $makeDelete->delete();
                return  response()->json(['success'=>"Vehicle's Make deleted successfully!."]);
            }

        return  response()->json(['errors'=>'Make ID is wrong!']);
    }
}
