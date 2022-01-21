<?php 
namespace App\Repository\Eloquent\v1;

use App\Models\Vehicle;

use App\Repository\Interface\v1\VehicleRepositoryInterface;

class VehicleRepository extends BaseRepository implements VehicleRepositoryInterface{
  protected $model;

  public function __construct(Vehicle $model)
  {
    $this->model = $model;
  }
}