<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicleFeatures extends Model
{
    //
    protected $table = 'car_feature';

    protected $fillable = [
        'name', 'type_id', 'controltypeid'
       ];
}
