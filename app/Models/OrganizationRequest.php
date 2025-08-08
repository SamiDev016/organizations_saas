<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationRequest extends Model
{
    protected $fillable = [
        'organization_name',
        'organization_description',
        'requested_by',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
