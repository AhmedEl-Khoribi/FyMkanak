<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Car;

class Service extends Model
{
    public function cars()
    {
    	return $this->hasMany(Car::class);
    }
}
