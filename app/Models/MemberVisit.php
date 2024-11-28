<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberVisit extends Model
{
    use HasFactory;

    protected $table = "timelogs";

    protected $fillable = [
        'client_rfid_id',
        'timelog_date',
        'time_in',
        'time_out',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'client_rfid_id', 'rfid_number');
    }
}
