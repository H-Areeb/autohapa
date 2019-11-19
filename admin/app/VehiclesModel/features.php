<?php

namespace App\VehiclesModel;

use Illuminate\Database\Eloquent\Model;

class features extends Model
{
    protected $table = 'car_feature';

    protected $fillable = [
        'name', 'type_id', 'controltypeid'
       ];
}
