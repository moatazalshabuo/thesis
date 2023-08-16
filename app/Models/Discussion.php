<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Discussion extends Model
{
    use HasFactory;
    protected $fillable = ["file",'title', 'thesis_id'];

    public function thesis()
    {
        return $this->belongsTo(Thesis::class);
    }

    public function messages(){
        return $this->hasMany(MessageDiscussion::class,'disc_id');
    }
}
