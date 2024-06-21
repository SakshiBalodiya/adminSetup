<?php

namespace App\Http\Controllers;

use App\Models\Calender;
use Illuminate\Http\Request;

class CalenderController extends Controller
{
    public function admin_index()
    {
        $calender = Calender::all();
        $holidays = $calender->map(function ($holiday) {
            return [
                'date' => $holiday->holidays,
                'events' => $holiday->events,
            ];
        });
        return view('admin.calender.calender', compact('calender', 'holidays'));
    }


    public function admin_store(Request $request)
    {
        $calender = new Calender;
        $calender->holidays = $request->input('selected_date');
        $calender->events = $request->input('events');
        $calender->save();
        return redirect('calender');
    }
}
