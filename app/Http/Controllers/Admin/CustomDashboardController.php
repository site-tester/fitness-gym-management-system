<?php

namespace App\Http\Controllers\Admin;

use App\Models\MemberVisit;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\AdminController;
use Illuminate\Http\Request;


class CustomDashboardController extends AdminController
{
    public function dashboard()
    {
        parent::dashboard();

        $memberAttendance = MemberVisit::with('user')->orderBy('updated_at')->get();
        return view('vendor.backpack.theme-tabler.dashboard', compact('memberAttendance'));
    }
}
