<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Service;

class Car extends Model
{
    public function service()
    {
    	return $this->belongsTo(Service::class);
    }
}
