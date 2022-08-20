<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;

class BookingController extends Controller
{
//Booking list
    public function index(Request $request)
    {
    

   $bookings=Booking::All();
   return view('booking.index')
   ->with('bookings',$bookings);
        

}
 public function store(StoreBookingRequest $request)
    {
        //New Booking
    $booking = new Booking();
        $booking->fullname = $request->input('fullname');
        $booking->email = $request->input('email');
      $booking->mobile = $request->input('mobile');
 $booking->description = $request->input('description');
 $booking->appointment_date = $request->input('appointment_date');
$booking->speciality = $request->input('speciality');
$booking->status = 'pending';
        $booking->save();
        flash('Appointment Booked Successfully!')->success();
        return back();
    }
    //Approve Booking
    public function approve(Request $request,$id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = $request->input('status');

        $booking->update();
           flash(' Approved Succesfully!')->success();
        return \Redirect::route('list.bookings');
    }
//Booking Delete
    public function destroy($id)
    {
      $book=Booking::findOrFail($id);
         $book->delete();
         flash('Appointment Deleted Successfully!')->success();
        return back();

     }

}
