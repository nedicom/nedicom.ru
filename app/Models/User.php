<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'lawyer',
        'name',
        'email',
        'password',
        'about',
        'lawyer',
        'speciality_one_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

        /**
     * Relation User
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lawyerSpecOne(): HasOne
    {
        return $this->hasOne(Uslugi::class, 'id', 'speciality_one_id');
    }

    public function lawyerSpecTwo(): HasOne
    {
        return $this->hasOne(Uslugi::class, 'id', 'speciality_two_id');
    }

    public function lawyerSpecThree(): HasOne
    {
        return $this->hasOne(Uslugi::class, 'id', 'speciality_three_id');
    }
}
