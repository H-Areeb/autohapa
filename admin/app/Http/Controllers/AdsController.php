<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Auth;
use Mail;
use Illuminate\Http\Request;
use App\Ads;

class AdsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all_ads()
    {     
        $ads = DB::table('car_ad')->where('isadminapproved_id','2')->where('isdeleteyn_id','2')->orderBy('updated_at', 'DESC')->get();
       
        // echo "<pre>"; print_r($adsall); die;
        return view('ads/all')->with('ads',$ads);
    }

    public function approvedAds()
    {     
        $ads = DB::table('car_ad')->where('isadminapproved_id','1')->orderBy('updated_at', 'DESC')->get();
        // if ($ads == '') {
        //     $ads = 'Result not found!';
        // }
        // echo "<pre>"; print_r($adsall); die;
        return view('ads/approvedAds')->with('ads',$ads);
    }
    public function deletedAds()
    {     
        $ads = DB::table('car_ad')->where('isdeleteyn_id','1')->orderBy('updated_at', 'DESC')->get();
        // if ($ads == '') {
        //     $ads = 'Result not found!';
        // }
        // echo "<pre>"; print_r($adsall); die;
        return view('ads/deletedAds')->with('ads',$ads);
    }


    public function show($Ads)
    {     
        
        $ads =  DB::select(DB::raw('SELECT car_ad.`id` AS id , car_ad.`adtitle` AS title , car_ad.`adverttext` AS Detail ,   car_lkptColour.`name` AS color , car_variant.`name`  AS variant ,
            car_images.`name` AS image ,car_images.`ordinal`,
            car_derivative.`name` AS derivative , car_lkptfuel_type.`name` AS FuelType , 
            car_lkpttransmission.`name` AS Transmission , car_ad.`price` AS price , car_ad.`car_milage` AS milage ,
            car_ad.`contactnumber` AS contact ,car_ad.`adsubtitle` AS subtitle , car_user.`name`AS sellerName ,
            car_ad.`isadminapproved_id` AS Approved_id , car_ad.`isdeleteyn_id` AS Delete_id , car_ad.`customer_id`
            FROM car_ad
        INNER JOIN car_lkptColour ON car_lkptColour.`id` = car_ad.`car_colourid`
        INNER JOIN car_variant ON car_ad.`car_variantid` = car_variant.`id`
        INNER JOIN car_derivative ON car_ad.`car_derivativeid` = car_derivative.`id`
        INNER JOIN car_lkptfuel_type ON car_ad.`car_fueltypeid` = car_lkptfuel_type.`id`
        INNER JOIN car_lkpttransmission ON car_ad.`car_transmissionid` = car_lkpttransmission.`id`
        INNER JOIN car_user ON car_ad.`customer_id` = car_user.`id`
        INNER JOIN car_images ON car_images.`carad_id` = car_ad.`id` AND car_images.`ordinal` = 0
            WHERE car_ad.`id` = "'.$Ads.'" limit 1 '));
    
    $adimg = DB::select(DB::raw('select * from car_images where carad_id = "'.$Ads.'"'));
    
    //    return $ads;
        //  echo "<pre>"; print_r($ads);
        //  echo "</pre>";
        return view('ads/show',compact('ads','adimg'));
    }


    public function approved($Ads)
    {       
        
        Ads::where('id',$Ads)->update(['isdeleteyn_id'=> '2' , 'isadminapproved_id'=> '1']);
        
        $mail = DB::select(DB::raw('SELECT car_ad.`id` AS Ad_id ,  car_ad.`isadminapproved_id` AS Approved_id,  car_ad.`adtitle` AS title, car_ad.`carregistrationnumber` AS RegNum, car_user.`name` AS SellerName , car_user.`email` AS SellerEmail 
        from car_ad
        INNER JOIN car_user ON car_ad.`customer_id` = car_user.`id` WHERE car_ad.`id` = "'.$Ads.'"'));
       
            

        $sellermail = $mail[0]->SellerEmail;

        // Send AD Approved Email
        $messageData = ['email'=>$sellermail,'name'=>$mail[0]->SellerName, 'adTitle'=>$mail[0]->title , 'RegNum'=>$mail[0]->RegNum, 'Ad_id'=>$mail[0]->Ad_id ,'Approved'=>$mail[0]->Approved_id];
        Mail::send('email.approvedEmail',$messageData,function($message) use($sellermail){
            $message->to($sellermail)->subject('Your AD Approved !');
        });
  
  
        if (Mail::failures()) {
          // return response()->Fail('Sorry! Please try again latter');
           return 'Sorry! Please try again latter'.$sellermail;
         }else{
          // return response()->success('Great! Successfully send in your mail');
           return redirect('/home/ApprovedAds')->with('success','Ad Approved and successfully send Email to Seller with name '.$mail[0]->SellerName);
         }
  
  
       
    }


    public function delete(Request $request)
    {
        
          $Ad_id = $request->input("ad_id");
          $reason = $request->input("reason");
         
             Ads::where('id',$Ad_id)->update(['isdeleteyn_id'=> '1' , 'isadminapproved_id'=> '2']);
                  
                  
            $mail = DB::select(DB::raw('SELECT car_ad.`id` AS Ad_id ,  car_ad.`isadminapproved_id` AS Approved_id,  
                            car_ad.`adtitle` AS title, car_ad.`carregistrationnumber` AS RegNum, car_user.`name` AS SellerName , car_user.`email` AS SellerEmail 
                            from car_ad
                            INNER JOIN car_user ON car_ad.`customer_id` = car_user.`id` WHERE car_ad.`id` = "'.$Ad_id.'"'));      
                  
                  

          $sellermail = $mail[0]->SellerEmail;

           // Send AD Rejected Email
          $messageData = ['email'=>$sellermail,'name'=>$mail[0]->SellerName, 'adTitle'=>$mail[0]->title ,
                            'RegNum'=>$mail[0]->RegNum, 'Ad_id'=>$Ad_id ,'reason'=>$reason,'Approved'=>$mail[0]->Approved_id];
                            
            Mail::send('email.approvedEmail',$messageData,function($message) use($sellermail){
                $message->to($sellermail)->subject('Your AD Rejected!!!');
            });
  
  
          if (Mail::failures()) {
                  // return response()->Fail('Sorry! Please try again latter');
                   return 'Sorry! Please try again latter'.$sellermail;
                 }else{
                  // return response()->success('Great! Successfully send in your mail');
                  return redirect('/home/DeletedAds')->with('success','Ad Deleted and successfully send Email to Seller with name '.$mail[0]->SellerName);
                  // return redirect('/home/ApprovedAds')->with('success','Ad Approved and successfully send Email to Seller with name '.$mail[0]->SellerName);
                 }
  
        
    }


}
