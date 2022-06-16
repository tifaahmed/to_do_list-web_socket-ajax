<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Status;  //belongsTo

class Task extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    protected $table = 'tasks';

    protected $fillable = [
        'name',         //required , string (max 100)
        'description',  //required , text
        'status_id',    //required , integer , unsigned , exist (statuses)
    ];

    //relation
    public function status(){
        return $this->belongsTo(Status::class,'status_id');
    }
}
