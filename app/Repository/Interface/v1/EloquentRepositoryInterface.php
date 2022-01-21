<?php 
namespace App\Repository\Interface\v1;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface EloquentRepositoryInterface{

  public function all(array $column=['*'], array $relation=[]):Collection;

  public function findById(
    int $modelId,
    array $column =['*'],
    array $relation =[],
    array $append = []
  ):?Model;

  public function create(array $payload):?Model;

  public function update(int $model, array $payload):bool;
}