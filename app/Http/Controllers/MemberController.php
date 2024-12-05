<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    //
    public function dashboard(){
        $testText = 'Member';
    }

    public function getUserDetails(User $user)
{
    // Assuming there's a Membership model related to the user
    $membership = $user->membershipDetails; // Define the relationship in the User model

    return response()->json([
        'name' => $user->name,
        'phone' => $membership->phone ?? null,
        'address' => $membership->address ?? null,
    ]);
}

}
