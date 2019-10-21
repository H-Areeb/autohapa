<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $table = 'car_ad';
    protected $fillable = [
        'isadminapproved_id'
    ];
}
