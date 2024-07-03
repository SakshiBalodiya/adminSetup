<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Holiday_Names;
use App\Models\Holidays;
use App\Models\Holidays_Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CalendarController extends Controller
{
    //
    public function admin_index()
    {
        $holidays = Holidays::leftJoin('users as U', 'U.id', 'holidays.user_id')
            ->leftjoin('holiday_names as HN', 'HN.holiday_id', 'holidays.id')
            ->select('holidays.id as id', 'U.id as user_id', 'holiday_date', 'HN.holiday_id', 'HN.name')
            ->get();
        // $holiday = $holidays->map(function ($holiday) {
        //     return [
        //         'date' => $holiday->holiday_date,
        //         'events' => $holiday->name,
        //         'id' => $holiday->id,
        //     ];
        // });
        return view('admin.calendar.calendar', compact('holidays'));
    }


    public function admin_store(Request $request)
    {
        if (!$request->has('name') || empty($request->input('name'))) {
            // If 'name' is not provided, store data in Holidays table
            $selected_dates = $request->input('selected_date');
            $datesArray = explode(',', $selected_dates);
            $datesCount = count($datesArray);
            if ($datesCount > 1) {
                foreach ($datesArray as $date) {
                    $holiday = new Holidays;
                    $holiday->holiday_date = trim($date);
                    $holiday->user_id = $request->input('user_id');
                    $holiday->save();
                }
            } else {
                $holiday = new Holidays;
                $holiday->holiday_date = $selected_dates;
                $holiday->user_id = $request->input('user_id');
                $holiday->save();
            }

        } else {

            // If 'name' is provided, store data in both Holidays and Holiday_Names tables
            $name = $request->input('name');
            $user_id = $request->input('user_id');
            $selected_dates = $request->input('selected_date');

            $holiday = Holidays::where('holiday_date', $selected_dates)
                ->where('user_id', $user_id)
                ->first();
        
            if ($holiday) {
                // Update the existing holiday
                $holiday->holiday_date = $selected_dates;
                $holiday->user_id = $user_id;
                $holiday->save();
                $holiday_names = Holiday_Names::updateOrCreate(
                    ['holiday_id' => $holiday->id],
                    ['name' => $name]
                );
            } else {
                $holiday = new Holidays;
                $holiday->holiday_date = $selected_dates;
                $holiday->user_id = $user_id;
                $holiday->save();

                $holiday_names = new Holiday_Names([
                    'holiday_id' => $holiday->id,
                    'name' => $name,
                ]);
                $holiday_names->save();
            }
        }
        return redirect('calendar');
    }


    public function admin_destroy($id)
    {
        $holiday = Holidays::find($id);
        Holiday_Names::where('holiday_id',$id)->delete();
       
        if (!$holiday) {
            return response()->json(['success' => false, 'message' => 'Holiday not found.'], 404);
        }
        
        $holiday->delete();
      
        return response()->json(['success' => true, 'message' => 'Holiday deleted successfully.']);
    }
}
