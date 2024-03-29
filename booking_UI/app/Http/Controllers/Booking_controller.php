<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;




class Booking_controller extends Controller
{
    public function show_booking($id)
    {
        $response= Http::withHeaders(['Authorization'=>'Bearer '.session()->get('token'),'Accept'=>'application/json'])->get('http://127.0.0.1:8000/api/item/'.$id)->json();
        return view('book',['data'=>$response]);
        return $response;
    }
    public function make_booking(Request $request)
    {
        $response= Http::withHeaders(['Authorization'=>'Bearer '.session()->get('token')])
        ->post('http://127.0.0.1:8000/api/addbooking',[
            "I_id"=>$request->I_id,
            "I_price"=>$request->I_price,
            "U_id"=>$request->U_id
        ]);
        return view('book_successful');
    }
    public function personal_booking($id)
    {

        $response= Http::withHeaders(['Authorization'=>'Bearer '.session()->get('token')])
        ->get('http://127.0.0.1:8000/api/booking/'.$id)->json();
        
        // Passing userslogginID
          
        
        if($id == session()->get('id'))
        {
            
            return view('mybooking',['info'=>$response]); 
            
            
        }

        return redirect('/404');
        
    
    }

    // Cancelling Features
    public function cancel_booking($id)
    {
        $response= Http::withHeaders(['Authorization'=>'Bearer '.session()->get('token')])
        ->delete('http://127.0.0.1:8000/api/cancel/'.$id)->json();



        return view('cancel_confirm'); 
    }



      
  

}




  




   


   











    






  



   




