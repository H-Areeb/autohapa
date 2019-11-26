<?php

namespace App\VehiclesModel;

use Illuminate\Database\Eloquent\Model;

class derivative extends Model
{
    protected $table = 'car_derivative';

    protected $fillable = [
        'name','car_variantid', 'type_id', 'car_makeid','car_modelid','isactiveynid','ordinal'
       ];
}
