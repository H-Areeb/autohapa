<?php

namespace App\VehiclesModel;

use Illuminate\Database\Eloquent\Model;

class models extends Model
{
    protected $table = 'car_model';

    protected $fillable = [
        'name', 'type_id', 'isactiveynid','car_makeid','ordinal'
       ];
}
