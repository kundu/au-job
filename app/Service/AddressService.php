<?php

namespace App\Service;

use App\Models\Country;
use App\Models\Location;
use Illuminate\Database\Eloquent\Collection;

class AddressService
{
    /**
     * get all active country
     *
     * @return Collection
     */
    public function getAllCountries() : Collection{
        return Country::whereStatus(Country::STATUS_ENABLE)->orderBy('name', 'asc')->get();
    }


    /**
     * get all active location
     *
     * @param integer|null $countryId
     * @return Collection
     */
    public function getLocations(int $countryId = null) : Collection{
        if($countryId){
            return Location::whereStatus(Country::STATUS_ENABLE)->whereCountryId($countryId)->orderBy('name', 'asc')->get();
        }
        else{
            return Location::whereStatus(Country::STATUS_ENABLE)->orderBy('name', 'asc')->get();
        }
    }
}
