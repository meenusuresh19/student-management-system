<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentMark extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['created_at', 'updated_at','deleted_at'];
    protected $fillable = ['student_id','maths','science','history','term'];
    public function student(){
        return $this->hasOne('App\Models\Student','id','student_id');
    }
}
