<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = [
        'user_id',
        'username',
        'phone',
        'address',
        'date_of_birth',
        'profile_picture',
        'bio',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'website'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
