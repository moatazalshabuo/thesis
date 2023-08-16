<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervision extends Model
{
    use HasFactory;

    protected $fillable = [
        'thesis_id',
        "staff_id",
        "status",
        'order_staff'
    ];

    public function staff()
    {
        return $this->belongsTo(User::class);
    }
    public function thesis()
    {
        return $this->belongsTo(Thesis::class);
    }
    public function Staffs(){
        return User::find($this->staff_id);
    }
}
