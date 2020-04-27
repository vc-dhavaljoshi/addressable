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
    public function addAddress($data)
    {
        return $this->address()->create($data);
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
        $this->load(['address' => function($query) {
           $query->orderby("order")->first();
        }]);
    }

    /**
     * return address
     */
    public function getAddress()
    {
        $this->load(['address' => function($query) {            
            $query->orderby("order");
        }]);
    }
}
