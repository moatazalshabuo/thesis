<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    protected $fillable = [
        'students_id',
        'title_thesis',
        'en_title',
        'status',
        'rate1',
        'rate2',
        'descripe',
        'file',
        'created_at'
    ];

    public function students()
    {
        return $this->belongsTo(User::class, 'students_id');
    }

    public function supervisions()
    {
        return $this->hasMany(Supervision::class);
    }

}
