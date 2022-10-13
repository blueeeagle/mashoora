<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    use HasFactory;

    protected $fillable = ['communication_mode','send_to','subject','body','send_on','status'];

    public function getcommdata(){
        return $this->belongsTo(CommunicationSend::class,'id','communication_id');
    }

    
}