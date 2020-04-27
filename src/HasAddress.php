<?php

namespace mitul\addresses;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Mitul\Addresses\Models\Address;

Trait HasAddress
{
   
    // abstract public function morphMany($related, $name, $type = null, $id = null, $localKey = null);
    
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
     * return primary address
     */
    public function getPrimaryAddress()
    {
        $this->load(['address' => function($query) {
            $query->where("is_primary",1);
            $query->orderby("order");
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
