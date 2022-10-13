<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Customer;
use App\Models\Consultant;

class CommunicationSend extends Model
{
    use HasFactory;

    protected $fillable = ['communication_id','customer_id','consultant_id','others'];

}

