<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\CountryResource;
use App\Http\Resources\LocationResource;
use App\Service\AddressService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AddressController extends BaseController
{
    public $baseController;
    public $addressService;

    function __construct(BaseController $baseController, AddressService $addressService){
        $this->baseController = $baseController;
        $this->addressService = $addressService;
    }


    public function getCountry(){
        try {
            $countries = $this->addressService->getAllCountries();
            return $this->baseController->sendResponse(200, true, CountryResource::collection($countries), "All active country list");
        } catch (Exception $exception) {
            Log::error($exception);
            return $this->sendResponse(500, false, [], 'Internal Server Error. Please inform admin to check log file.');
        }
    }

    public function getLocation(Request $request){
        try {
            $locations = $this->addressService->getLocations($request->country_id);
            return $this->baseController->sendResponse(200, true, LocationResource::collection($locations), "All active location list");
        } catch (Exception $exception) {
            Log::error($exception);
            return $this->sendResponse(500, false, [], 'Internal Server Error. Please inform admin to check log file.');
        }
    }
}
