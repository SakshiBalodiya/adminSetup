<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\attendance;
use App\Http\Requests\StoreattendanceRequest;
use App\Http\Requests\UpdateattendanceRequest;
use Illuminate\Support\Facades\DB;
use App\Helper\StaffExport;
use Maatwebsite\Excel\Facades\Excel;
class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_index()
    {
        $attendance = DB::table('attendances as AT')
            ->leftJoin('staff as S', 'S.id', 'AT.userId')
            ->leftJoin('users as U', 'U.id', 'AT.userId')
            ->select('U.name as name', 'U.role', 'AT.date_time', 'AT.status', 'AT.created_at', 'AT.updated_at', 'U.id')
            ->get();
        return view('admin.attendance.index', compact('attendance'));
    }

    public function export($id) 
    {
       // $userId = $request->input('user_id');
        $userId = $id;
        $users=User::find($id);
        return Excel::download(new StaffExport($userId), $users->name . $userId . '.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreattendanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreattendanceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateattendanceRequest  $request
     * @param  \App\Models\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateattendanceRequest $request, attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(attendance $attendance)
    {
        //
    }
}
