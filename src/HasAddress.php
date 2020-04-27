<?php

namespace Viitortest\Addressable;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Viitortest\Addressable\Models\Address;

Trait HasAddress
{
    /**
     * @return MorphMany
     */
    public function address(): MorphMany
    {
        return $this->morphMany(Address::class, 'model');
    }

    /**
     * Add single or multiple address to address table
     */
    public function addAddress($request)
    {
        return $this->address()->create($request);
    }

    /**
     * Remove address to address table.
     */
    public function removeAddress()
    {
        return $this->address()->delete();
    }

    /**
     * return primary address
     */
    public function getPrimaryAddress()
    {
        return $this->address()->orderby("order")->first();
    }

    /**
     * return address
     */
    public function getAddress()
    {
        return $this->address()->orderby("order")->get();
    }
}
