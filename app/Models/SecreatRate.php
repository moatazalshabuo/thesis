<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecreatRate extends Model
{
    use HasFactory;

    protected $fillable = ['theses_id','staff','message','rate','status'];

    public function theses()
    {
        return $this->belongsTo(Thesis::class,'theses_id');
    }

    public function Staff(){
        return $this->belongsTo(User::class,'staff');
    }
}
