<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\MemberVisit;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function register(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'rfid_number' => 'required|string',
        ]);

        // Find the user by RFID number
        $user = User::where('rfid_number', $request->input('rfid_number'))->first();

        // If user is not found, redirect back with an error message
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        // Check for an existing attendance record where time_out is still null (meaning the user hasn't timed out yet)
        $attendanceRecord = MemberVisit::where('client_rfid_id', $user->rfid_number)
            ->whereNull('time_out') // Ensure we are only fetching records without a time_out
            ->first();

        if ($attendanceRecord) {
            // If there's an existing record without time_out, mark the attendance as time out
            $attendanceRecord->time_out = now();
            $attendanceRecord->save();

            // Redirect back with a success message for time out
            return redirect()->back()->with('success', 'Attendance marked as time out');
        } else {
            // Otherwise, register a new time-in record
            MemberVisit::create([
                'client_rfid_id' => $user->rfid_number,
                'timelog_date' => now(), // Assuming this is the time-in field
            ]);

            // Redirect back with a success message for time in
            return redirect()->back()->with('success', 'Attendance registered as time in');
        }
    }
}
