<?php

namespace App\Http\Controllers;

use App\Models\ScheduledClass;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(){
        $bookings= auth()->user()->bookings()
            ->Upcoming()
            ->with('classType','instructor')
            ->oldest('date_time')->get();
        return view('member.upcoming')->with('bookings',$bookings);
    }
    public function create(){
        $scheduledClasses = ScheduledClass::
        whereDoesntHave('member',function ($query){
            $query->where('user_id',auth()->id());
        })->Upcoming()->with('classType','instructor')->oldest()->get();
        return view('member.book')->with('scheduledClasses',$scheduledClasses);
    }
    public function store(Request $request){
        auth()->user()->bookings()->attach($request->scheduled_class_id);
        return redirect()->route('bookings.index');
    }
    public function destroy(int $id){
        auth()->user()->bookings()->detach($id);
        return redirect()->route('bookings.index');
    }
}
