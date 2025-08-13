<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Comment extends Model
{

    use HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['content', 'user_id', 'feedback_id'];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function feedback(): BelongsTo
    {
        return $this->belongsTo(Feedback::class);
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
