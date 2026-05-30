<?php

namespace App\Models;

use App\Enums\DocumentStatus;
use App\Enums\DocumentType;
use App\Enums\Priority;
use App\Models\Complaint;
use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Model;

#[Guarded([])]
class Document extends Model
{
    protected $casts = [
        'type' => DocumentType::class,
        'priority' => Priority::class,
        'status' => DocumentStatus::class,
    ];

    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }
}
