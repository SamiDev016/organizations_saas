<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Branch extends Model
{
    protected $fillable = [
        'name',
        'type',
        'organization_id',
        'parent_branch_id',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function parentBranch()
    {
        return $this->belongsTo(Branch::class, 'parent_branch_id');
    }

    public function childrenBranches()
    {
        return $this->hasMany(Branch::class, 'parent_branch_id');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
