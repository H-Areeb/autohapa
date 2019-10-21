<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Auth;
use Mail;
use Illuminate\Http\Request;


class imageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function approveImg($carad_id,$img_id)
    {
       
         $exec = DB::table('car_images')->where('id',$img_id)->where('carad_id',$carad_id)->update(['isdeleted_ynid'=> '2' , 'isadminApproved_ynid'=> '1']);


        if($exec){
           return redirect()->back()->with('success','Ad Image Approved successfully! ');
        }
        else{
            return redirect()->back()->with('error','Ad Image NotApproved! ');
        }
        
    }


    public function rejectImg($carad_id,$img_id)
    {
        $exec =   DB::table('car_images')->where('id',$img_id)->where('carad_id',$carad_id)->update(['isdeleted_ynid'=> '1' , 'isadminApproved_ynid'=> '2']);
    
    
         if($exec){
            return redirect()->back()->with('success','Ad Image Rejected successfully! ');
         }
         else{
             return redirect()->back()->with('error','Ad Image NotRejected! ');
         }

    }








}
