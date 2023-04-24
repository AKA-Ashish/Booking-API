<!DOCTYPE html>
<html lang="en">
<head>
    @include('css')
    <title>Confirm Cancellation</title>
    <style>
        .cancel{
            padding: 30px;
            text-align: center
        }

    </style>
</head>
<body style="background-color:white">
    @include('header')
   
    <div class="cancel">
        <img src="{{ asset('img/cancelled.jpg') }}" alt="Cancelled Sucessfully" />
       
        <h2 class="book_success_h2" > Booking cancelled!</h2>
        <a href="{{ url('mybooking/'.session()->get('id')) }}"><button style="width:70%; background-color:rgba(49, 114, 49, 0.97); font-size:25px;">Done</button></a>
    
    </div>
    
</body>
</html>