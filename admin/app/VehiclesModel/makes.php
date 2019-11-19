<?php

namespace App\VehiclesModel;

use Illuminate\Database\Eloquent\Model;

class makes extends Model
{
    protected $table = 'car_make';

    protected $fillable = [
        'name', 'type_id', 'isactiveynid'
       ];
}
