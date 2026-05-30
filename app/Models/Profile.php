<?php

namespace App\Models;

use App\Enums\Department;
use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Model;

#[Guarded([])]
class Profile extends Model
{
    protected $casts = [
        'department' => Department::class,
    ];
    /**
     * Get the user that owns the profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
