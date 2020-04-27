<?php

namespace Viitortest\Addressable\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Address extends Model
{
    /**
     * @return \Illuminate\Config\Repository|mixed|string
     */
    public function getTable()
    {
        return config('addressable.tables.addressable');
    }

    /**
     * @var array
     */
    protected $fillable = [
        'formatted_address', 'latitude', 'longitude', 'order', 'extra_attributes'
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
