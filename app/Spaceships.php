<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spaceships extends Model
{
    // Для использования метолда ::create() в контрллеры (защита)
    protected $guarded = array();
}
