<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable; 

class UserDetail extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'user_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'phone_no',
        'about',
        'address',
        'city',
        'postal_code',
        'picture',
        'whatsapp',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'github',
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

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function blog()
    {
        return $this->hasMany(Blog::class, 'user_detail_id', 'id');
    }
    
}
