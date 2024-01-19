<?php

namespace App\Repositories\Interfaces;

/**
 * Interface DistrictServiceInterface
 * @package App\Repositories\Interfaces
 */
interface DistrictRepositoryInterface
{
    public function all();
    public function findDistrictByProvinceId(int $province_id);
}
