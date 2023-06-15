<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Uslugi extends Model
{
    use HasFactory;

    public function firstlawyer(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'lawyerone_id');
    }
}
