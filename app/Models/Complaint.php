<?php

namespace App\Models;

use App\Enums\ComplaintStatus;
use App\Enums\Priority;
use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Model;

#[Guarded([])]
class Complaint extends Model
{
    protected $casts = [
        'priority' => Priority::class,
        'status' => ComplaintStatus::class,
    ];
}
