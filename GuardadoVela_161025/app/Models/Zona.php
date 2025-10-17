<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    //
    
    protected $connection = 'mysql';
    protected $stable = 'zona';
    protected $primaryKey = 'id_zona';
    protected $incrementing = true;
    protected $timestamps = false;


}
