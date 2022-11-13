<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class viewsessionlog extends Model
{
    use HasFactory;

    protected $table = 'viewSessionLog';

    protected $primaryKey = 'id';

    public $timestamps = false;
}
