<?php

namespace mitul\addresses\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Address extends Model
{
    /**
     * @var string
     */
    protected $table = 'address';

    /**
     * @var array
     */
    protected $fillable = [
        'formated_address', 'latitude', 'longitude', 'is_primary', 'order', 'extra_attributes'
    ];

    /**
     * Get the owner model of the address.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function model(): MorphTo
    {
        return $this->morphTo();
    }

}
