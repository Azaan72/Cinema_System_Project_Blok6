<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function performance()
    {
        return $this->belongsTo(Performance::class);
    }

    
}
