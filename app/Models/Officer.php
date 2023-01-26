<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'first_name','serial_no','batch_no','middle_name','last_name',
    // ];

    // Using Mutator
    public function setFirstNameAttribute($data){
        $this->attributes['first_name'] = ucwords($data);
    }
    public function setLastNameAttribute($data){
        $this->attributes['last_name'] = ucwords($data);
    }
    public function setMiddleNameAttribute($data){
        $this->attributes['middle_name'] = ucwords($data.' name');
    }
    
    // Using Accessor

    public function getFirstNameAttribute($data){
        return strtoupper($data);
    }

    public function getCreatedAtAttribute($data){
        return Carbon::parse($this->attributes['created_at'])->deffForHumans($data);
    }

}
