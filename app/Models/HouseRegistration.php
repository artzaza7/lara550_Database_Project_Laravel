<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseRegistration extends Model
{
    
    protected $table = 'HouseRegistration';
    public $timestamps = false;
    protected $primaryKey = 'house_registration_id';

}
