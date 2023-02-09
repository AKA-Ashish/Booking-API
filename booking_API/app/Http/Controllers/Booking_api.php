<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class Booking_api extends Controller
{
    public function index ($id=null)
    {
        
        $booking_id=DB::table('Booking')
        ->join('Item','booking.I_id','Item.I_id')
        ->where('Booking.U_id',$id)
        ->get();
       
       
         $mybooking=DB::table('Booking')
        ->join('Item','booking.I_id','Item.I_id')
        ->get();

        return $id?$booking_id:$booking;

    }
    public function cancel($id){
        if(isset($id)){
            
        $result=DB::table('Booking')
        ->where('B_id',$id)
        ->delete();
        
    // $result = Booking::find($id)->delete();
    
    
    if($result)
    {
        return ["result" => "record has been deleted"];
    }
    else {
        return ["result" => "record has not been deleted"];
    }

    }
    else{
        return ["result" => "id not found"];
    }

        


    }
   

    


}



