<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationRequest extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'user_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
