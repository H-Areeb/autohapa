<?php

namespace App\VehiclesModel;

use Illuminate\Database\Eloquent\Model;

class variants extends Model
{
    protected $table = 'car_variant';

    protected $fillable = [
        'name', 'type_id', 'car_makeid','car_modelid','isactiveynid','ordinal'
       ];
}
