<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageDiscussion extends Model
{
    use HasFactory;
    protected $fillable = ['message','created_by',"user_id",'disc_id'];
    public function discussion()
    {
        return $this->belongsTo(Discussion::class);
    }
}
