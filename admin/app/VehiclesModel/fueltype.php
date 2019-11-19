<?php

namespace App\VehiclesModel;

use Illuminate\Database\Eloquent\Model;

class fueltype extends Model
{
    protected $table = 'car_lkptfuel_type';

    protected $fillable = [
        'name', 'type_id', 'isactiveynid'
       ];
}
