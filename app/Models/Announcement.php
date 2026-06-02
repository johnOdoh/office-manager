<?php

namespace App\Models;

use App\Enums\AnnouncementType;
use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Model;

#[Guarded([])]
class Announcement extends Model
{
    protected $casts = [
        'type' => AnnouncementType::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
