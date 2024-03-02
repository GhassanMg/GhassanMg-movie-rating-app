<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model};
use Carbon\Carbon;
use Eloquent;

/**
 * Class BaseModel
 * @package App\Models
 *
 * @property int $id
 * @property int $base_id
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 *
 * @mixin Eloquent
 */
class BaseModel extends Model
{
    /** @var string|null */
    public string|null $relatedToCurrentUser = null;

    /** @var array */
    public array $appendsAttributes = [];

    /**
     * @var string[]
     */
    protected $appends = [];

    protected $casts = [
        'created_at' => 'datetime:M-d-y',
        'updated_at' => 'datetime:M-d-y',
        'deleted_at' => 'datetime:M-d-y',
    ];

    /**
     * @return string|null
     */
    public function getCreatedTimeAtAttribute(): string|null
    {
        if ($this->created_at) {
            return $this->created_at->format('h:i A');
        }

        return null;
    }

    /**
     * @return string|null
     */
    public function getUpdatedTimeAtAttribute(): string|null
    {
        if ($this->updated_at) {
            return $this->updated_at->format('h:i A');
        }

        return null;
    }

    /**
     * @return string|null
     */
    public function getDeletedTimeAtAttribute(): string|null
    {
        if ($this->deleted_at) {
            return $this->deleted_at->format('h:i A');
        }

        return null;
    }
}
