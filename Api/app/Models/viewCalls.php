<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class viewCalls extends Model
{
    use HasFactory;

    protected $table = 'viewCalls';

    protected $primaryKey = 'callId';

    public $timestamps = false;
}
