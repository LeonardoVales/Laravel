<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    const ESTADOS_CIVIS = [
        1 => 'Solteiro',
        2 => 'Casado',
        3 => 'Divorciado'
    ];
}
