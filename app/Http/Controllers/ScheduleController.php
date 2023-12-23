<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Schedule;
use App\Models\Trip;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function schedule() {
        $Bus = Bus::all();
        $Trip = Trip::all();
        $schedules = Schedule::with(['bus', 'trip'])->get();
        return view('dashboard.schedule',[
            'schedules' => $schedules,
            'buses' => $Bus,
            'trips' => $Trip
        ]);
    }

    public function store(Request $request) {
        $store = Schedule::create([
            'bus_id' => $request->input('bus_id'),
            'trip_id' => $request->input('trip_id'),
            'departure_time' => $request->input('departure_time'),
            'fare' => $request->input('fare'),
        ]);
        if($store) {
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    // deleteSchedule
    public function deleteSchedule($id) {
        $schduleDelete = Schedule::find($id);
        if($schduleDelete) {
            $schduleDelete->delete();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    // get all schedules
    public function schedules() {
        $schedules = Schedule::with(['bus', 'trip'])->get();
        return view('userdashboard.schedules', ['schedules' => $schedules]);
    }
}
