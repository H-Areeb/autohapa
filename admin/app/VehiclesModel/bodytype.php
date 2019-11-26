<?php

namespace App\VehiclesModel;

use Illuminate\Database\Eloquent\Model;

class bodytype extends Model
{
    protected $table = 'car_lkptbody_type';

    protected $fillable = [
        'name', 'type_id', 'isactiveynid','ordinal'
       ];
}
