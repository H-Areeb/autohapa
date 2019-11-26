<?php

namespace App\VehiclesModel;

use Illuminate\Database\Eloquent\Model;

class transmission extends Model
{
    protected $table = 'car_lkpttransmission';

    protected $fillable = [
        'name', 'type_id', 'isactiveynid','ordinal'
       ];
}
