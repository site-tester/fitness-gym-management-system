<?php

namespace App\Http\Controllers\Admin;

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
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found'], 404);
        }

        // Check for existing attendance record
        $attendanceRecord = MemberVisit::where('client_rfid_id', $user->id)
            ->whereNull('time_out') // Check if time_out is null
            ->first();

        if ($attendanceRecord) {
            // If attendance record exists, register time out
            $attendanceRecord->time_out = now();
            $attendanceRecord->save();
            return response()->json(['success' => true, 'message' => 'Attendance marked as time out']);
        } else {
            // Otherwise, register time in
            MemberVisit::create([
                'client_rfid_id' => $user->id,
                'timelog_date' => now(),
            ]);
            return response()->json(['success' => true, 'message' => 'Attendance registered as time in']);
        }
    }
}
