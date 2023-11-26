<?php

namespace App\Http\Module\Academy\Domain\Services\Repository;

use App\Http\Module\Academy\Domain\Model\Academy;

interface AcademyRepositoryInterface
{
    public function save(Academy $academy);


}
