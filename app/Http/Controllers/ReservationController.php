<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Reservation ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{

    public function reserve(Request $request) {
        $newReservation               = new Reservation();
        $newReservation->clinic_id    = $request->input('id');
        $newReservation->user_id      = $request->input('user');
        $newReservation->status       = '0';
        $success                      = $newReservation->save();

        if ($success) {
            return response()->json(['user_reserve_success'=>'Reservation request sent Successfully']);
        } else {
            return response()->json(['user_reserve_error'=>'There is something wrong .. Please try again later!']);
        }
    }

    public function userReservations() {
        $reservations = Reservation::where('user_id', Auth::user()->id)->with('clinic')->orderby('id', 'desc')->get() ;
        return view("default.user.userReservations", compact(['reservations']) );
    }

    public function delete(Request $request) {
        $reservation = Reservation::find($request->input('id')) ;            
        $success = $reservation->delete() ;

        if ($success) {
            return response()->json(['reservation_delete_success'=>'Deleted Successfully']);
        } else {
            return response()->json(['reservation_delete_error'=>'There is something wrong .. Please try again later!']);
        }
    }

    public function approve(Request $request) {
        $reservation = Reservation::find($request->input('id')) ;        
        $reservation->status = '1' ;
        $success = $reservation->save() ;

        if ($success) {
            return response()->json(['doctor_reservation_approve_success'=>'Updated Successfully']);
        } else {
            return response()->json(['doctor_reservation_approve_error'=>'There is something wrong .. Please try again later!']);
        }
    }

    public function decline(Request $request) {
        $reservation = Reservation::find($request->input('id')) ;
        $reservation->status = '0' ;
        $success = $reservation->save() ;

        if ($success) {
            return response()->json(['doctor_reservation_decline_success'=>'Updated Successfully']);
        } else {
            return response()->json(['doctor_reservation_decline_error'=>'There is something wrong .. Please try again later!']);
        }
    }


}
