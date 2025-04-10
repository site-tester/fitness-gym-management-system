<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\AdminController;
use Carbon\Carbon;
use Illuminate\Http\Request;


class CustomAdminController extends AdminController
{
    public function calendarView()
    {
        $events = [];

        $appointments = Reservation::all();

        foreach ($appointments as $appointment) {
            $events[] = [
                'client' => $appointment->name,
                'title' => $appointment->service_name . ' - (' . $appointment->service_duration . ')',
                'date' => $appointment->reservation_date,
                'status' => $appointment->status,
            ];
        }
        return view('vendor.backpack.theme-tabler.booking-calendar' , compact('events'));
    }

}
