<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Consultant;
use App\Models\Appointment;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [];
        protected $appends = ['scheduleformate'];

    public function Consultant(){
        return $this->belongsTo(Consultant::class);
    }
    public function getScheduleformateAttribute(){
        return $this->schedule;
    }
    public function Appointment(){
        return $this->hasMany(Appointment::class);
    }
}

