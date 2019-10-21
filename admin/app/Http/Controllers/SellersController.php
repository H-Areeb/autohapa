<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Auth;
//use Mail;
use Illuminate\Http\Request;
use App\Sellers;


class SellersController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function view()
    {
        
        $seller = DB::table('car_user')->where('isdeleted_ynid','2')->orderBy('updated_at', 'DESC')->get();
       
        // echo "<pre>"; print_r($adsall); die;
        return view('sellers/view')->with('seller',$seller);


    }

    public function Details($seller)
    {     
        
        $sellerads =  DB::select(DB::raw('SELECT car_ad.`id` AS id , car_ad.`adtitle` AS title , car_ad.`adverttext` AS Detail ,   car_lkptColour.`name` AS color , car_variant.`name`  AS variant ,
            car_images.`name` AS image ,car_images.`ordinal`,
            car_derivative.`name` AS derivative , car_lkptfuel_type.`name` AS FuelType , 
            car_lkpttransmission.`name` AS Transmission , car_ad.`price` AS price , car_ad.`car_milage` AS milage ,
            car_ad.`contactnumber` AS contact ,car_ad.`adsubtitle` AS subtitle , car_user.`name`AS sellerName ,
            car_ad.`isadminapproved_id` AS Approved_id , car_ad.`isdeleteyn_id` AS Delete_id 
            FROM car_ad
        INNER JOIN car_lkptColour ON car_lkptColour.`id` = car_ad.`car_colourid`
        INNER JOIN car_variant ON car_ad.`car_variantid` = car_variant.`id`
        INNER JOIN car_derivative ON car_ad.`car_derivativeid` = car_derivative.`id`
        INNER JOIN car_lkptfuel_type ON car_ad.`car_fueltypeid` = car_lkptfuel_type.`id`
        INNER JOIN car_lkpttransmission ON car_ad.`car_transmissionid` = car_lkpttransmission.`id`
        INNER JOIN car_user ON car_ad.`customer_id` = car_user.`id`
        INNER JOIN car_images ON car_images.`carad_id` = car_ad.`id` AND car_images.`ordinal` = 0
            WHERE car_ad.`customer_id` = "'.$seller.'"'));
     
              foreach($sellerads as $seller)
                {
                $selleradsid = $seller->id;
                }

    $adimg = DB::select(DB::raw('select * from car_images where carad_id = "'.$selleradsid.'"'));
    
    //    return $ads;
        //  echo "<pre>"; print_r($ads);
        //  echo "</pre>";
        return view('sellers/SellerDetails',compact('sellerads','adimg'));
    }



}
