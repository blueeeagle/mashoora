<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Consultant;

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
}

