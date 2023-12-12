<?php

namespace App\Models;

use App\Casts\humandate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Questions extends Model
{
    use HasFactory;

    public function User(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    protected $casts = [
        'created_at' => humandate::class,
    ];
}
