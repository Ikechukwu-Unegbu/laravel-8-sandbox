<?php

namespace App\Http\Controllers;

use App\Http\Resources\VehicleResource;
// use App\Models\Vehicle;
use Illuminate\Http\Request;

use App\Repository\Interface\v1\VehicleRepositoryInterface;


class VehicleController extends Controller
{
    private $vehicleRepository;

    public function __construct(VehicleRepositoryInterface $vehicleRepository){
        $this->vehicleRepository = $vehicleRepository;
    }
    public function show(){

        //return  
        //$repo = new VehicleRepositoryInterface();
        return new VehicleResource($this->vehicleRepository->all());
        //return response()->json($this->vehicleRepository->all(), 200);
    }
}
