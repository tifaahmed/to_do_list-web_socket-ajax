<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;  //HasMany

class Status extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    protected $table = 'statuses';

    protected $fillable = [
        'name',         //required , string (max 50)
    ];

    //relation
    public function task(){
        return $this->HasMany(Task::class);
    }
}
