<?php

namespace App\Repositories;

use App\Models\Province;
use App\Repositories\Interfaces\ProvinceRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class ProvinceService
 * @package App\Services
 */
class ProvinceRepository extends BaseRepository implements ProvinceRepositoryInterface
{
    protected $model;
    public function __construct(Province $model)
    {
        $this->model = $model;
    }
}
