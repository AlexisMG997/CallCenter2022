<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class viewSession extends Model
{
    use HasFactory;

    protected $table = 'viewSessions';

    protected $primaryKey = 'id';

    public $timestamps = false;
}
