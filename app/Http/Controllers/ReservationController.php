<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Reservation ;
use \App\Models\Doctor ;
use \App\Models\Clinic ;
use \App\Models\User ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Notification;
use App\Notifications\DoctorNotification;
use App\Notifications\ApproveUserNotification;
use App\Notifications\DeclineUserNotification;

class ReservationController extends Controller
{

    /**
     * Create clinic reservation
     */
    public function reserve(Request $request) {
        $newReservation               = new Reservation();
        $newReservation->clinic_id    = $request->input('id');
        $newReservation->user_id      = $request->input('user');
        $newReservation->status       = '0';
        $success                      = $newReservation->save();

        $currentClinic = Clinic::find($request->input('id'));
        $currentDoctor = Doctor::find($currentClinic->doctor_id);
        Notification::send($currentDoctor, new DoctorNotification());

        if ($success) {
            return response()->json(['user_reserve_success'=>'Reservation request sent Successfully']);
        } else {
            return response()->json(['user_reserve_error'=>'There is something wrong .. Please try again later!']);
        }
    }

    /**
     * get all user reservations
     * @urlParam id integer required Example: 1 
     */
    public function userReservations() {
        $reservations = Reservation::where('user_id', Auth::user()->id)->with('clinic')->orderby('id', 'desc')->get() ;
        return view("default.user.userReservations", compact(['reservations']) );
    }

    /**
     * Delete reservation by the the user
     */
    public function delete(Request $request) {
        $reservation = Reservation::find($request->input('id')) ;            
        $success = $reservation->delete() ;

        if ($success) {
            return response()->json(['reservation_delete_success'=>'Deleted Successfully']);
        } else {
            return response()->json(['reservation_delete_error'=>'There is something wrong .. Please try again later!']);
        }
    }

    /**
     * Doctor approve reservation
     */
    public function approve(Request $request) {
        $reservation = Reservation::find($request->input('id')) ;        
        $reservation->status = '1' ;
        $success = $reservation->save() ;

        $user = User::find($reservation->user_id) ;
        Notification::send($user, new ApproveUserNotification());

        if ($success) {
            return response()->json(['doctor_reservation_approve_success'=>'Updated Successfully']);
        } else {
            return response()->json(['doctor_reservation_approve_error'=>'There is something wrong .. Please try again later!']);
        }
    }

    /**
     * Doctor decline reservation
     */
    public function decline(Request $request) {
        $reservation = Reservation::find($request->input('id')) ;
        $reservation->status = '0' ;
        $success = $reservation->save() ;

        $user = User::find($reservation->user_id) ;
        Notification::send($user, new DeclineUserNotification());

        if ($success) {
            return response()->json(['doctor_reservation_decline_success'=>'Updated Successfully']);
        } else {
            return response()->json(['doctor_reservation_decline_error'=>'There is something wrong .. Please try again later!']);
        }
    }


}
