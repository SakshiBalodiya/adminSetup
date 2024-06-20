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
                'name' => $holiday->name,
            ];
        });
        return view('admin.calender.calender', compact('calender', 'holidays'));
    }

    //     public function admin_index()
// {
//     $calender = Calender::all();
//     $holidays = $calender->map(function($holiday) {
//         return [
//             'date' => $holiday->holidays,
//             'name' => $holiday->name,
//         ];
//     });
//     return view('admin.calender.calender', compact('holidays'));
// }


    public function admin_store(Request $request)
    {
        $calender = new Calender;
        $calender->holidays = $request->input('selected_date');
        $calender->name = $request->input('name');
        $calender->save();
        return redirect('calender');
    }
}
